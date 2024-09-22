var timeDiff = null;
var timeStart = null;

// Mausposition

var mx = 0;
var my = 0;

var resis = new Object();
var timers = new Array();

if(document.addEventListener)
	document.addEventListener("mousemove", watchMouse, true);
else
	document.onmousemove = watchMouse;

function watchMouse(e) {
	if(e) {
		mx = e.pageX;
		my = e.pageY;
	}
	else {
		mx = window.event.x;
		my = window.event.y;
	}

	var info = document.getElementById("info");
	if(info != null && info.style.visibility == "visible") {
		map_move();
	}

	var tut = gid("tut");
	if(tut != null && tut_moving)
		tut_move();
}

function setImageTitles() {
	for (var i = 0; i < document.images.length; i++)
	{
		var image = document.images[i];
		if (!image.title && image.alt != '')
		{
			image.title = image.alt;
		}
	}
}

function setCookie(name, value) {
	document.cookie = name+"="+value;
}

function popup(url, width, height) {
	wnd = window.open(url, "popup", "width="+width + ",height="+height + ",left=150,top=150,resizable=yes");
	wnd.focus();
}

function popup_scroll(url, width, height) {
	wnd = window.open(url, "popup", "width="+width + ",height="+height + ",left=150,top=100,resizable=yes,scrollbars=yes");
	wnd.focus();
}


function addTimer(element, endTime, reload) {
	var timer = new Object();
	timer['element'] = element;
	timer['endTime'] = endTime;
	timer['reload'] = reload;
	timers.push(timer);
}

function startTimer() {
	var serverTime = getTime(document.getElementById("serverTime"));
	timeDiff = serverTime-getLocalTime();
	timeStart = serverTime;

	// Nach span mit der Klasse timer und timer_replace suchen
	var spans = document.getElementsByTagName("span");
	for(var span_id in spans) {
		var span = spans[span_id];
		if(span.className == "timer" || span.className == "timer_replace") {
			startTime = getTime(span);
			if(startTime != -1)
				addTimer(span, serverTime+startTime, (span.className == "timer"));
		}
	}

	startResTicker('wood');
	startResTicker('stone');
	startResTicker('iron');

	window.setInterval("tick()", 1000);
}

function startResTicker(resName) {
	var element = document.getElementById(resName);
	var start = parseInt(element.firstChild.nodeValue);
	var max = parseInt(document.getElementById("storage").firstChild.nodeValue);
	var prod = element.title/3600;

	var res = new Object();
	res['name'] = resName;
	res['start'] = start;
	res['max'] = max;
	res['prod'] = prod;
	resis[resName] = res;
}

function tickRes(res) {
	var resName = res['name'];
	var start = res['start'];
	var max = res['max'];
	var prod = res['prod'];

	var now = new Date();
	var time = (now.getTime()/1000+timeDiff)-timeStart;
	current = Math.min(Math.floor(start+prod*time), max);
	var element = document.getElementById(resName);
	element.firstChild.nodeValue = current;

	if(current == max) {
		element.setAttribute('class', 'warn');
	}
}

function tick() {
	tickTime();

	for(var res in resis) {
		tickRes(resis[res]);
	}

	for(var timer in timers) {
		remove = tickTimer(timers[timer]);
		if(remove) {
			timers.splice(timer, 1);
		}
	}
}

function tickTime() {
	var serverTime = document.getElementById("serverTime");
	if(serverTime != null) {
		time = getLocalTime()+timeDiff;
		formatTime(serverTime, time, true);
	}
}

function tickTimer(timer) {
	var time = timer['endTime']-(getLocalTime()+timeDiff);

	if(timer['reload'] && time < 0) {
		document.location.href = document.location.href;
		formatTime(timer['element'], 0, false);
		return true;
	}
	
	if (!timer['reload'] && time <= 0)
	{
		// Timer ausblenden und Alternativ-Text anzeigen
		var parent = timer['element'].parentNode;
		parent.nextSibling.style.display = 'inline'; // Nachfolger des Parent einblenden
		parent.parentNode.removeChild(parent); // Parent entfernen
		
		return true;
	}
	
	formatTime(timer['element'], time, false);
	return false;
}

function getLocalTime() {
	var now = new Date();
	return Math.floor(now.getTime()/1000)
}

function getTime(element) {
	// Zeit auslesen
	if(element.firstChild.nodeValue == null) return -1;
	part = element.firstChild.nodeValue.split(":");

	// Führende Nullen entfernen
	for(j=1; j<3; j++) {
		if(part[j].charAt(0) == "0")
			part[j] = part[j].substring(1, part[j].length);
	}
		
	// Zusammenfassen
	hours = parseInt(part[0]);
	minutes = parseInt(part[1]);
	seconds = parseInt(part[2]);
	time = hours*60*60+minutes*60+seconds;
	return time;
}

function formatTime(element, time, clamp) {
	// Wieder aufsplitten
	hours = Math.floor(time/3600);
	if(clamp) hours = hours%24;
	minutes = Math.floor(time/60) % 60;
	seconds = time % 60;

	timeString = hours + ":";
	if(minutes < 10)
		timeString += "0";
	timeString += minutes + ":";
	if(seconds < 10)
		timeString += "0";
	timeString += seconds;

	element.firstChild.nodeValue = timeString;
}

function selectAll(form, checked) {
	for(var i=0; i<form.length; i++) {
		form.elements[i].checked = checked;
	}
}

var max = true;
function selectAllMax(form, textMax, textNothing) {
	for(var i=0; i<form.length; i++) {
		var select = form.elements[i];
		if(select.selectedIndex != null) {
			if(max)
				select.selectedIndex = select.length-2;
			else
				select.value = 0;
		}
	}
	
	max = max ? false : true;

	anchor = document.getElementById('select_anchor_top');
	anchor.firstChild.nodeValue = max ? textMax : textNothing;
	anchor = document.getElementById('select_anchor_bottom');
	anchor.firstChild.nodeValue = max ? textMax : textNothing;

	changeBunches(form);
}

function changeBunches(form) {
	var sum = 0;
	for(var i=0; i<form.length; i++) {
		var select = form.elements[i];
		if(select.selectedIndex != null) {
			sum += parseInt(select.value);
		}
	}

	setText(gid('selectedBunches_bottom'), sum);
	setText(gid('selectedBunches_top'), sum);
}


function ask(question, href) {
	if(confirm(question) == true) {
		window.location.href = href;
	}
}

function redir(href) {
	window.location.href = href;
}

function setText(element, text) {
	var textNode = document.createTextNode(text);
	element.removeChild(element.firstChild);
	element.appendChild(textNode);
}

function map_popup(title, points, owner, ally, village_grocusto, bonus_img ,bonus_text ,graph_style ,villages_czasy) {
	map_move(graph_style);
	
	setText(gid("info_title"), title);
	setText(gid("info_points"), points);
	if(owner != '') {
		setText(gid("info_owner"), owner);
		gid("info_owner_row").style.display = '';
		gid("info_left_row").style.display = 'none';
	}
	else {
		gid("info_owner_row").style.display = 'none';
		gid("info_left_row").style.display = '';
	}
	
	if(ally != '') {
		gid("info_ally_row").style.display = '';
		setText(gid("info_ally"), ally);
	}
	else {
		gid("info_ally_row").style.display = 'none';
	}
	
	if (bonus_img != '') {
		gid("info_bonus_image_row").style.display = '';
		gid("image").src = bonus_img;
		} else {
		gid("info_bonus_image_row").style.display = 'none';
		}
		
	if (bonus_text != '') {
		gid("info_bonus_row").style.display = '';
		setText(gid("text_bonus"), bonus_text);
		} else {
		gid("info_bonus_row").style.display = 'none';
		}
	
	if(village_grocusto) {
		gid("info_village_grocusto_row").style.display = '';
		setText(gid("info_village_grocusto"), village_grocusto);
	} else {
		gid("info_village_grocusto_row").style.display = 'none';
	}
	
	if (villages_czasy) {
		gid("info_units_times_row").style.display = '';
		var row = gid('info_units_times');
		//document.getElementsById('info_units_times')[0].value = 'nhhuuh';
		} else {
		gid("info_units_times_row").style.display = 'none';
		}
	
	var info = gid("info");
	info.style.visibility = "visible";
}

function map_kill() {
	var info = document.getElementById("info");
	info.style.visibility = "hidden";
}

function map_move(graphic) {
	var info = document.getElementById("info");
		
	if (graphic != 1) {
		info.style.left = mx + 15  + "px";
		info.style.top = my + 15 + "px";
		} else {
		info.style.left = mx - 200  + "px";
		info.style.top = my - 128 + "px";
		}
}

function gid(id) {
	return document.getElementById(id);
}

function mapScroll(x, y) {
	width = 10;
	height = 10;
	url = "map.php?x="+x+"&y="+y+"&width="+width+"&height="+height;
	req = ajaxSync(url);
	villages = req.responseXML.firstChild.childNodes;
	for(var i=0; i<villages.length; i++) {
		v = villages[i];
		if(v.nodeType != 1) continue;
		if(v.nodeName != "v") continue;

		mapSetTile(3, 0, v);
	}
}

function mapSetTile(x, y, v) {
	tile = gid("tile_" + x + "_" + y);
	if(v != null) {
		alert(v.getAttribute("href"));
		tile.replaceChild(v, tile.firstChild);
	}
	else {
		img = document.createElement("img");
		img.src = "graphic/map/map_free.png";
		tile.replaceChild(img, tile.firstChild);
	}
}

function insertCoord(form, element) {
	// Koordinaten auslesen
	part = element.value.split("|");
	if(part.length != 2) return;
	x = parseInt(part[0]);
	y = parseInt(part[1]);
	form.x.value = x;
	form.y.value = y;
}

function insertCoordNew(form, element) {
	part = element.value.split(":");
	if(part.length != 3) return;
	form.con.value = parseInt(part[0]);
	form.sec.value = parseInt(part[1]);
	form.sub.value = parseInt(part[2]);
}

function insertUnit(input, count) {
	if(input.value != count)
		input.value=count;
	else
		input.value='';
}

function insertNumber(input, count) {
	if(input.value != count)
		input.value=count;
	else
		input.value='';
}

function selectTarget(x, y) {
	opener.document.forms["units"].elements["x"].value = x;
	opener.document.forms["units"].elements["y"].value = y;
	window.close();
}

function selectTargetCoord(con, sec, sub) {
	opener.document.forms["units"].elements["con"].value = con;
	opener.document.forms["units"].elements["sec"].value = sec;
	opener.document.forms["units"].elements["sub"].value = sub;
	window.close();
}

function insertAdresses(to, check) {
	opener.document.forms["header"].to.value += to;
	if(check) {
		var mass_mail = opener.document.forms["header"].mass_mail;
		if(mass_mail)
			mass_mail.checked='checked';
	}
}


function overviewShowLevel() {
	labels = overviewGetLabels();
	for(i in labels) {
		var label = labels[i];
		if(!label) continue;
		label.style.display = 'inline';
	}
}

function overviewHideLevel() {
	labels = overviewGetLabels();
	for(i in labels) {
		var label = labels[i];
		if(!label) continue;
		label.style.display = 'none';
	}
}

function overviewGetLabels() {
	labels = Array();
	labels.push(gid("l_main"));
	labels.push(gid("l_place"));
	labels.push(gid("l_wood"));
	labels.push(gid("l_stone"));
	labels.push(gid("l_iron"));
	labels.push(gid("l_wall"));
	labels.push(gid("l_farm"));
	labels.push(gid("l_hide"));

	labels.push(gid("l_storage"));
	labels.push(gid("l_market"));

	labels.push(gid("l_barracks"));
	labels.push(gid("l_stable"));
	labels.push(gid("l_garage"));
	labels.push(gid("l_church"));
	labels.push(gid("l_snob"));
	labels.push(gid("l_smith"));

	for(var i=1; i<=10; i++)
		labels.push(gid("l_"+i));
	return labels;
}

function insertMoral(moral) {
	opener.document.getElementById('moral').value = moral;
}

function resetAttackerPoints(points) {
	document.getElementById('attacker_points').value = points;
}

function resetDefenderPoints(points) {
	document.getElementById('defender_points').value = points;
}

function resetDaysPlayed(days) {
	document.getElementById('days_played').value = days;
}

function editGroup(group_id) {
	var href = opener.location.href;
	href = href.replace(/&action=edit_group&edit_group=\d+&h=([a-z0-9]+)/, '');
	href = href.replace(/&edit_group=\d+/, '');
	overview = opener.document.getElementById('overview');
	if(!overview || overview.value.search(/(combined|prod|units|buildings|tech)/) == -1) { 
		alert('In dieser Übersicht ist ein Bearbeiten der Gruppen nicht möglich. Wähle bitte eine andere Übersicht.');
	} else {
		opener.location.href = href + '&edit_group=' + group_id;
	}
	window.close();
}

function toggleExtended()
{
	var extended = document.getElementById('extended');
	if(extended.style.display == 'block') {
		extended.style.display = 'none';
		document.getElementsByName('extended')[0].value = 0;
	} else {
		extended.style.display = 'block';
		document.getElementsByName('extended')[0].value = 1;
	}
}

function resizeIGMField(type)
{
	field = document.getElementsByName('text')[0];
	old_size = parseInt(field.getAttribute('rows'));
	if(type == 'bigger') {
		field.setAttribute('rows',  old_size + 3);
	} else if(type == 'smaller') {
		if(old_size >= 4) {
			field.setAttribute('rows', old_size - 3);
		}
	}
}

function editToggle(label, edit) {
	gid(edit).style.display = '';
	gid(label).style.display = 'none';
}

function urlEncode(string) {
	return encodeURIComponent(string);
}

function editSubmit(label, labelText, edit, editInput, url) {
	var data = gid(editInput).value;
	data = urlEncode(data);

	var req = ajaxSync(url, 'text='+data);
	
	gid(edit).style.display = 'none';
	setText(gid(labelText), req.responseText);
	gid(label).style.display = '';
}

function showElement(name) {
	gid(name).style.display = '';
}

function ex(id) {
    return document.getElementById(id);
}

function switchDisplay(name) {
    var o = ex(name);
    o.style.display = (o.style.display == 'none' ? '' : 'none');
}

function insertNumId(name, num) {
    elem = ex(name);
    if (elem.value == num) {
        elem.value = '0';
    }
    else {
        elem.value = num;
    }
}

function countCoins() {
    form = document.forms['kingsage'];

    sum = 0;
    for(var i = 0; i < form.elements.length; i++) {
        var select = form.elements[i];
        if (select.selectedIndex != null) {
            sum += parseInt(select.value);
        }
    }

    ex('select_count_1').innerHTML = sum;
    ex('select_count_2').innerHTML = sum;

}

function selectCoiningNoneMax(t_max,t_nothing) {
	form=document.forms['kingsage'];
	for(var i=0 ; i < form.elements.length ; i++) {
		max_value=form.elements[i].getAttribute('max_value');
		if (max_value) {
			if (max) {
				form.elements[i].value=max_value;
				} else {
				form.elements[i].value=0;
				}
			}
		}
	text=max?t_nothing:t_max;
	ex('select_all_1').innerHTML=text;
	max=max?false:true;
	countCoins();
	}
	
function toggle_spoiler(ref) {
	var display_value=ref.parentNode.getElementsByTagName('div')[0].getElementsByTagName('span')[0].style.display;
	if(display_value == 'none') {
		ref.parentNode.getElementsByTagName('div')[0].getElementsByTagName('span')[0].style.display='block'
		} else ref.parentNode.getElementsByTagName('div')[0].getElementsByTagName('span')[0].style.display='none'
	}
	

function inlinePopupReload(name,url,options) {
	$.ajax({url:url,cache:false,onRequest:function(){if(options.empty_errors)$('#error').empty();$('#inline_popup_content').empty();$('#inline_popup_content').append($("<img>").attr('src',image_base+'/throbber.gif').attr('alt','Loading...'))},success:function(reponseText){$('#inline_popup_content').empty();$('#inline_popup_content').html(reponseText)}})
	}
function inlinePopup(event,name,url,options,text){
	var mx,my;if(event){mx=event.clientX;my=event.clientY}else{mx=window.event.clientX;my=window.event.clientY};var popup=$('#inline_popup'),doc=$(document),constraints={min:{x:0,y:60},max:{x:doc.width()-options.offset_x,y:doc.height()-options.offset_y}},pos={x:mx+options.offset_x,y:my+options.offset_y};pos.x=(pos.x<constraints.min.x)?constraints.min.x:pos.x;pos.x=(pos.x>constraints.max.x)?constraints.max.x:pos.x;pos.y=(pos.y<constraints.min.y)?constraints.min.y:pos.y;pos.y=(pos.y>constraints.max.y)?constraints.max.y:pos.y;if(typeof mobile!=="undefined"&&mobile){pos.x=0;pos.y=doc.scrollTop();popup.css('width','100%');popup.css('border-left','0px');popup.css('border-right','0px')};popup.css('display','block');popup.css('left',pos.x+'px');popup.css('top',pos.y+'px');if(url){inlinePopupReload(name,url,options)}else if(text){$('#inline_popup_content').html(text);$('#inline_popup').show()};return false
	}


/***DZIAŁANIE BB-CODES****/
(function(q,m){function la(a,b,d){if(d===m&&a.nodeType===1)if(d=a.getAttribute("data-"+b),typeof d==="string"){try{d=d==="true"?!0:d==="false"?!1:d==="null"?null:!c.isNaN(d)?parseFloat(d):Ra.test(d)?c.parseJSON(d):d}catch(e){}c.data(a,b,d)}else d=m;return d}function $(a){for(var b in a)if(b!=="toJSON")return!1;return!0}function F(){return!1}function H(){return!0}function ma(a,b,d){var e=c.extend({},d[0]);e.type=a;e.originalEvent={};e.liveFired=m;c.event.handle.call(b,e);e.isDefaultPrevented()&&d[0].preventDefault()} function Sa(a){var b,d,e,f,h,g,i,l,k,n,j,m=[];f=[];h=c._data(this,"events");if(!(a.liveFired===this||!h||!h.live||a.target.disabled||a.button&&a.type==="click")){a.namespace&&(j=RegExp("(^|\\.)"+a.namespace.split(".").join("\\.(?:.*\\.)?")+"(\\.|$)"));a.liveFired=this;var p=h.live.slice(0);for(i=0;i<p.length;i++)h=p[i],h.origType.replace(O,"")===a.type?f.push(h.selector):p.splice(i--,1);f=c(a.target).closest(f,a.currentTarget);l=0;for(k=f.length;l<k;l++){n=f[l];for(i=0;i<p.length;i++)if(h=p[i],n.selector=== h.selector&&(!j||j.test(h.namespace))&&!n.elem.disabled){g=n.elem;e=null;if(h.preType==="mouseenter"||h.preType==="mouseleave")a.type=h.preType,e=c(a.relatedTarget).closest(h.selector)[0];(!e||e!==g)&&m.push({elem:g,handleObj:h,level:n.level})}}l=0;for(k=m.length;l<k;l++){f=m[l];if(d&&f.level>d)break;a.currentTarget=f.elem;a.data=f.handleObj.data;a.handleObj=f.handleObj;j=f.handleObj.origHandler.apply(f.elem,arguments);if(j===!1||a.isPropagationStopped())if(d=f.level,j===!1&&(b=!1),a.isImmediatePropagationStopped())break}return b}} function T(a,b){return(a&&a!=="*"?a+".":"")+b.replace(Ua,"`").replace(Va,"&")}function na(a,b,d){if(c.isFunction(b))return c.grep(a,function(a,c){return!!b.call(a,c,a)===d});else if(b.nodeType)return c.grep(a,function(a){return a===b===d});else if(typeof b==="string"){var e=c.grep(a,function(a){return a.nodeType===1});if(Wa.test(b))return c.filter(b,e,!d);else b=c.filter(b,e)}return c.grep(a,function(a){return c.inArray(a,b)>=0===d})}function oa(a,b){if(b.nodeType===1&&c.hasData(a)){var d=c.expando, e=c.data(a),f=c.data(b,e);if(e=e[d]){var h=e.events,f=f[d]=c.extend({},e);if(h){delete f.handle;f.events={};for(var g in h){d=0;for(e=h[g].length;d<e;d++)c.event.add(b,g+(h[g][d].namespace?".":"")+h[g][d].namespace,h[g][d],h[g][d].data)}}}}}function pa(a,b){if(b.nodeType===1){var d=b.nodeName.toLowerCase();b.clearAttributes();b.mergeAttributes(a);if(d==="object")b.outerHTML=a.outerHTML;else if(d==="input"&&(a.type==="checkbox"||a.type==="radio")){if(a.checked)b.defaultChecked=b.checked=a.checked; if(b.value!==a.value)b.value=a.value}else if(d==="option")b.selected=a.defaultSelected;else if(d==="input"||d==="textarea")b.defaultValue=a.defaultValue;b.removeAttribute(c.expando)}}function U(a){return"getElementsByTagName"in a?a.getElementsByTagName("*"):"querySelectorAll"in a?a.querySelectorAll("*"):[]}function Xa(a,b){b.src?c.ajax({url:b.src,async:!1,dataType:"script"}):c.globalEval(b.text||b.textContent||b.innerHTML||"");b.parentNode&&b.parentNode.removeChild(b)}function qa(a,b,d){var e=b=== "width"?a.offsetWidth:a.offsetHeight;if(d==="border")return e;c.each(b==="width"?Ya:Za,function(){d||(e-=parseFloat(c.css(a,"padding"+this))||0);d==="margin"?e+=parseFloat(c.css(a,"margin"+this))||0:e-=parseFloat(c.css(a,"border"+this+"Width"))||0});return e}function ra(a){return function(b,d){var k;typeof b!=="string"&&(d=b,b="*");if(c.isFunction(d))for(var e=b.toLowerCase().split(sa),f=0,h=e.length,g,i;f<h;f++)g=e[f],(i=/^\+/.test(g))&&(g=g.substr(1)||"*"),k=a[g]=a[g]||[],g=k,g[i?"unshift":"push"](d)}} function V(a,b,c,e,f,h){f=f||b.dataTypes[0];h=h||{};h[f]=!0;for(var f=a[f],g=0,i=f?f.length:0,l=a===aa,k;g<i&&(l||!k);g++)k=f[g](b,c,e),typeof k==="string"&&(!l||h[k]?k=m:(b.dataTypes.unshift(k),k=V(a,b,c,e,k,h)));if((l||!k)&&!h["*"])k=V(a,b,c,e,"*",h);return k}function ba(a,b,d,e){if(c.isArray(b)&&b.length)c.each(b,function(b,f){d||$a.test(a)?e(a,f):ba(a+"["+(typeof f==="object"||c.isArray(f)?b:"")+"]",f,d,e)});else if(!d&&b!=null&&typeof b==="object")if(c.isArray(b)||c.isEmptyObject(b))e(a,""); else for(var f in b)ba(a+"["+f+"]",b[f],d,e);else e(a,b)}function ab(){c(q).unload(function(){for(var a in C)C[a](0,1)})}function ta(){try{return new q.XMLHttpRequest}catch(a){}}function D(a,b){var d={};c.each(ua.concat.apply([],ua.slice(0,b)),function(){d[this]=a});return d}function va(a){if(!ca[a]){var b=c("<"+a+">").appendTo("body"),d=b.css("display");b.remove();if(d==="none"||d==="")d="block";ca[a]=d}return ca[a]}function da(a){return c.isWindow(a)?a:a.nodeType===9?a.defaultView||a.parentWindow: !1}var j=q.document,c=function(){function a(){if(!b.isReady){try{j.documentElement.doScroll("left")}catch(c){setTimeout(a,1);return}b.ready()}}var b=function(a,c){return new b.fn.init(a,c,f)},c=q.jQuery,e=q.$,f,h=/^(?:[^<]*(<[\w\W]+>)[^>]*$|#([\w\-]+)$)/,g=/\S/,i=/^\s+/,l=/\s+$/,k=/\d/,n=/^<(\w+)\s*\/?>(?:<\/\1>)?$/,Ta=/^[\],:{}\s]*$/,v=/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,p=/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,s=/(?:^|:|,)(?:\s*\[)+/g,w=/(webkit)[ \/]([\w.]+)/,t=/(opera)(?:.*version)?[ \/]([\w.]+)/, L=/(msie) ([\w.]+)/,u=/(mozilla)(?:.*? rv:([\w.]+))?/,o=navigator.userAgent,y=!1,ea,fa="then done fail isResolved isRejected promise".split(" "),P,bb=Object.prototype.toString,ga=Object.prototype.hasOwnProperty,ha=Array.prototype.push,S=Array.prototype.slice,wa=String.prototype.trim,xa=Array.prototype.indexOf,ya={};b.fn=b.prototype={constructor:b,init:function(a,c,d){var e;if(!a)return this;if(a.nodeType)return this.context=this[0]=a,this.length=1,this;if(a==="body"&&!c&&j.body)return this.context= j,this[0]=j.body,this.selector="body",this.length=1,this;if(typeof a==="string")if((e=h.exec(a))&&(e[1]||!c))if(e[1])return d=(c=c instanceof b?c[0]:c)?c.ownerDocument||c:j,(a=n.exec(a))?b.isPlainObject(c)?(a=[j.createElement(a[1])],b.fn.attr.call(a,c,!0)):a=[d.createElement(a[1])]:(a=b.buildFragment([e[1]],[d]),a=(a.cacheable?b.clone(a.fragment):a.fragment).childNodes),b.merge(this,a);else{if((c=j.getElementById(e[2]))&&c.parentNode){if(c.id!==e[2])return d.find(a);this.length=1;this[0]=c}this.context= j;this.selector=a;return this}else return!c||c.jquery?(c||d).find(a):this.constructor(c).find(a);else if(b.isFunction(a))return d.ready(a);if(a.selector!==m)this.selector=a.selector,this.context=a.context;return b.makeArray(a,this)},selector:"",jquery:"1.5.1",length:0,size:function(){return this.length},toArray:function(){return S.call(this,0)},get:function(a){return a==null?this.toArray():a<0?this[this.length+a]:this[a]},pushStack:function(a,c,d){var e=this.constructor();b.isArray(a)?ha.apply(e, a):b.merge(e,a);e.prevObject=this;e.context=this.context;if(c==="find")e.selector=this.selector+(this.selector?" ":"")+d;else if(c)e.selector=this.selector+"."+c+"("+d+")";return e},each:function(a,c){return b.each(this,a,c)},ready:function(a){b.bindReady();ea.done(a);return this},eq:function(a){return a===-1?this.slice(a):this.slice(a,+a+1)},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},slice:function(){return this.pushStack(S.apply(this,arguments),"slice",S.call(arguments).join(","))}, map:function(a){return this.pushStack(b.map(this,function(b,c){return a.call(b,c,b)}))},end:function(){return this.prevObject||this.constructor(null)},push:ha,sort:[].sort,splice:[].splice};b.fn.init.prototype=b.fn;b.extend=b.fn.extend=function(){var a,c,d,e,f,o=arguments[0]||{},h=1,g=arguments.length,y=!1;typeof o==="boolean"&&(y=o,o=arguments[1]||{},h=2);typeof o!=="object"&&!b.isFunction(o)&&(o={});g===h&&(o=this,--h);for(;h<g;h++)if((a=arguments[h])!=null)for(c in a)d=o[c],e=a[c],o!==e&&(y&&e&& (b.isPlainObject(e)||(f=b.isArray(e)))?(f?(f=!1,d=d&&b.isArray(d)?d:[]):d=d&&b.isPlainObject(d)?d:{},o[c]=b.extend(y,d,e)):e!==m&&(o[c]=e));return o};b.extend({noConflict:function(a){q.$=e;if(a)q.jQuery=c;return b},isReady:!1,readyWait:1,ready:function(a){a===!0&&b.readyWait--;if(!b.readyWait||a!==!0&&!b.isReady){if(!j.body)return setTimeout(b.ready,1);b.isReady=!0;a!==!0&&--b.readyWait>0||(ea.resolveWith(j,[b]),b.fn.trigger&&b(j).trigger("ready").unbind("ready"))}},bindReady:function(){if(!y){y= !0;if(j.readyState==="complete")return setTimeout(b.ready,1);if(j.addEventListener)j.addEventListener("DOMContentLoaded",P,!1),q.addEventListener("load",b.ready,!1);else if(j.attachEvent){j.attachEvent("onreadystatechange",P);q.attachEvent("onload",b.ready);var c=!1;try{c=q.frameElement==null}catch(d){}j.documentElement.doScroll&&c&&a()}}},isFunction:function(a){return b.type(a)==="function"},isArray:Array.isArray||function(a){return b.type(a)==="array"},isWindow:function(a){return a&&typeof a=== "object"&&"setInterval"in a},isNaN:function(a){return a==null||!k.test(a)||isNaN(a)},type:function(a){return a==null?String(a):ya[bb.call(a)]||"object"},isPlainObject:function(a){if(!a||b.type(a)!=="object"||a.nodeType||b.isWindow(a))return!1;if(a.constructor&&!ga.call(a,"constructor")&&!ga.call(a.constructor.prototype,"isPrototypeOf"))return!1;for(var c in a);return c===m||ga.call(a,c)},isEmptyObject:function(a){for(var b in a)return!1;return!0},error:function(a){throw a;},parseJSON:function(a){if(typeof a!== "string"||!a)return null;a=b.trim(a);if(Ta.test(a.replace(v,"@").replace(p,"]").replace(s,"")))return q.JSON&&q.JSON.parse?q.JSON.parse(a):(new Function("return "+a))();else b.error("Invalid JSON: "+a)},parseXML:function(a,c,d){q.DOMParser?(d=new DOMParser,c=d.parseFromString(a,"text/xml")):(c=new ActiveXObject("Microsoft.XMLDOM"),c.async="false",c.loadXML(a));d=c.documentElement;(!d||!d.nodeName||d.nodeName==="parsererror")&&b.error("Invalid XML: "+a);return c},noop:function(){},globalEval:function(a){if(a&& g.test(a)){var c=j.head||j.getElementsByTagName("head")[0]||j.documentElement,d=j.createElement("script");b.support.scriptEval()?d.appendChild(j.createTextNode(a)):d.text=a;c.insertBefore(d,c.firstChild);c.removeChild(d)}},nodeName:function(a,b){return a.nodeName&&a.nodeName.toUpperCase()===b.toUpperCase()},each:function(a,c,d){var e,f=0,o=a.length,h=o===m||b.isFunction(a);if(d)if(h)for(e in a){if(c.apply(a[e],d)===!1)break}else for(;f<o;){if(c.apply(a[f++],d)===!1)break}else if(h)for(e in a){if(c.call(a[e], e,a[e])===!1)break}else for(d=a[0];f<o&&c.call(d,f,d)!==!1;d=a[++f]);return a},trim:wa?function(a){return a==null?"":wa.call(a)}:function(a){return a==null?"":a.toString().replace(i,"").replace(l,"")},makeArray:function(a,c){var d=c||[];if(a!=null){var e=b.type(a);a.length==null||e==="string"||e==="function"||e==="regexp"||b.isWindow(a)?ha.call(d,a):b.merge(d,a)}return d},inArray:function(a,b){if(b.indexOf)return b.indexOf(a);for(var c=0,d=b.length;c<d;c++)if(b[c]===a)return c;return-1},merge:function(a, b){var c=a.length,d=0;if(typeof b.length==="number")for(var e=b.length;d<e;d++)a[c++]=b[d];else for(;b[d]!==m;)a[c++]=b[d++];a.length=c;return a},grep:function(a,b,c){for(var d=[],e,c=!!c,f=0,o=a.length;f<o;f++)e=!!b(a[f],f),c!==e&&d.push(a[f]);return d},map:function(a,b,c){for(var d=[],e,f=0,o=a.length;f<o;f++)e=b(a[f],f,c),e!=null&&(d[d.length]=e);return d.concat.apply([],d)},guid:1,proxy:function(a,c,d){arguments.length===2&&(typeof c==="string"?(d=a,a=d[c],c=m):c&&!b.isFunction(c)&&(d=c,c=m)); !c&&a&&(c=function(){return a.apply(d||this,arguments)});if(a)c.guid=a.guid=a.guid||c.guid||b.guid++;return c},access:function(a,c,d,e,f,o){var h=a.length;if(typeof c==="object"){for(var g in c)b.access(a,g,c[g],e,f,d);return a}if(d!==m){e=!o&&e&&b.isFunction(d);for(g=0;g<h;g++)f(a[g],c,e?d.call(a[g],g,f(a[g],c)):d,o);return a}return h?f(a[0],c):m},now:function(){return(new Date).getTime()},_Deferred:function(){var a=[],c,d,e,f={done:function(){if(!e){var d=arguments,o,h,g,y,k;c&&(k=c,c=0);o=0;for(h= d.length;o<h;o++)g=d[o],y=b.type(g),y==="array"?f.done.apply(f,g):y==="function"&&a.push(g);k&&f.resolveWith(k[0],k[1])}return this},resolveWith:function(b,f){if(!e&&!c&&!d){d=1;try{for(;a[0];)a.shift().apply(b,f)}catch(o){throw o;}finally{c=[b,f],d=0}}return this},resolve:function(){f.resolveWith(b.isFunction(this.promise)?this.promise():this,arguments);return this},isResolved:function(){return!(!d&&!c)},cancel:function(){e=1;a=[];return this}};return f},Deferred:function(a){var c=b._Deferred(), d=b._Deferred(),e;b.extend(c,{then:function(a,b){c.done(a).fail(b);return this},fail:d.done,rejectWith:d.resolveWith,reject:d.resolve,isRejected:d.isResolved,promise:function(a){if(a==null){if(e)return e;e=a={}}for(var b=fa.length;b--;)a[fa[b]]=c[fa[b]];return a}});c.done(d.cancel).fail(c.cancel);delete c.cancel;a&&a.call(c,c);return c},when:function(a){var c=arguments.length,d=c<=1&&a&&b.isFunction(a.promise)?a:b.Deferred(),e=d.promise();if(c>1){for(var f=S.call(arguments,0),o=c,h=function(a){return function(b){f[a]= arguments.length>1?S.call(arguments,0):b;--o||d.resolveWith(e,f)}};c--;)(a=f[c])&&b.isFunction(a.promise)?a.promise().then(h(c),d.reject):--o;o||d.resolveWith(e,f)}else d!==a&&d.resolve(a);return e},uaMatch:function(a){a=a.toLowerCase();a=w.exec(a)||t.exec(a)||L.exec(a)||a.indexOf("compatible")<0&&u.exec(a)||[];return{browser:a[1]||"",version:a[2]||"0"}},sub:function(){function a(b,c){return new a.fn.init(b,c)}b.extend(!0,a,this);a.superclass=this;a.fn=a.prototype=this();a.fn.constructor=a;a.subclass= this.subclass;a.fn.init=function(d,e){e&&e instanceof b&&!(e instanceof a)&&(e=a(e));return b.fn.init.call(this,d,e,c)};a.fn.init.prototype=a.fn;var c=a(j);return a},browser:{}});ea=b._Deferred();b.each("Boolean Number String Function Array Date RegExp Object".split(" "),function(a,b){ya["[object "+b+"]"]=b.toLowerCase()});o=b.uaMatch(o);if(o.browser)b.browser[o.browser]=!0,b.browser.version=o.version;if(b.browser.webkit)b.browser.safari=!0;if(xa)b.inArray=function(a,b){return xa.call(b,a)};g.test("\u00a0")&& (i=/^[\s\xA0]+/,l=/[\s\xA0]+$/);f=b(j);j.addEventListener?P=function(){j.removeEventListener("DOMContentLoaded",P,!1);b.ready()}:j.attachEvent&&(P=function(){j.readyState==="complete"&&(j.detachEvent("onreadystatechange",P),b.ready())});return b}();(function(){c.support={};var a=j.createElement("div");a.style.display="none";a.innerHTML=" <link/><table></table><a href='/a' style='color:red;float:left;opacity:.55;'>a</a><input type='checkbox'/>";var b=a.getElementsByTagName("*"),d=a.getElementsByTagName("a")[0], e=j.createElement("select"),f=e.appendChild(j.createElement("option")),h=a.getElementsByTagName("input")[0];if(b&&b.length&&d){c.support={leadingWhitespace:a.firstChild.nodeType===3,tbody:!a.getElementsByTagName("tbody").length,htmlSerialize:!!a.getElementsByTagName("link").length,style:/red/.test(d.getAttribute("style")),hrefNormalized:d.getAttribute("href")==="/a",opacity:/^0.55$/.test(d.style.opacity),cssFloat:!!d.style.cssFloat,checkOn:h.value==="on",optSelected:f.selected,deleteExpando:!0,optDisabled:!1, checkClone:!1,noCloneEvent:!0,noCloneChecked:!0,boxModel:null,inlineBlockNeedsLayout:!1,shrinkWrapBlocks:!1,reliableHiddenOffsets:!0};h.checked=!0;c.support.noCloneChecked=h.cloneNode(!0).checked;e.disabled=!0;c.support.optDisabled=!f.disabled;var g=null;c.support.scriptEval=function(){if(g===null){var a=j.documentElement,b=j.createElement("script"),d="script"+c.now();try{b.appendChild(j.createTextNode("window."+d+"=1;"))}catch(e){}a.insertBefore(b,a.firstChild);q[d]?(g=!0,delete q[d]):g=!1;a.removeChild(b)}return g}; try{delete a.test}catch(i){c.support.deleteExpando=!1}!a.addEventListener&&a.attachEvent&&a.fireEvent&&(a.attachEvent("onclick",function k(){c.support.noCloneEvent=!1;a.detachEvent("onclick",k)}),a.cloneNode(!0).fireEvent("onclick"));a=j.createElement("div");a.innerHTML="<input type='radio' name='radiotest' checked='checked'/>";b=j.createDocumentFragment();b.appendChild(a.firstChild);c.support.checkClone=b.cloneNode(!0).cloneNode(!0).lastChild.checked;c(function(){var a=j.createElement("div"),b=j.getElementsByTagName("body")[0]; if(b){a.style.width=a.style.paddingLeft="1px";b.appendChild(a);c.boxModel=c.support.boxModel=a.offsetWidth===2;if("zoom"in a.style)a.style.display="inline",a.style.zoom=1,c.support.inlineBlockNeedsLayout=a.offsetWidth===2,a.style.display="",a.innerHTML="<div style='width:4px;'></div>",c.support.shrinkWrapBlocks=a.offsetWidth!==2;a.innerHTML="<table><tr><td style='padding:0;border:0;display:none'></td><td>t</td></tr></table>";var d=a.getElementsByTagName("td");c.support.reliableHiddenOffsets=d[0].offsetHeight=== 0;d[0].style.display="";d[1].style.display="none";c.support.reliableHiddenOffsets=c.support.reliableHiddenOffsets&&d[0].offsetHeight===0;a.innerHTML="";b.removeChild(a).style.display="none"}});b=function(a){var b=j.createElement("div"),a="on"+a;if(!b.attachEvent)return!0;var c=a in b;c||(b.setAttribute(a,"return;"),c=typeof b[a]==="function");return c};c.support.submitBubbles=b("submit");c.support.changeBubbles=b("change");a=b=d=null}})();var Ra=/^(?:\{.*\}|\[.*\])$/;c.extend({cache:{},uuid:0,expando:"jQuery"+ (c.fn.jquery+Math.random()).replace(/\D/g,""),noData:{embed:!0,object:"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",applet:!0},hasData:function(a){a=a.nodeType?c.cache[a[c.expando]]:a[c.expando];return!!a&&!$(a)},data:function(a,b,d,e){if(c.acceptData(a)){var f=c.expando,h=typeof b==="string",g=a.nodeType,i=g?c.cache:a,l=g?a[c.expando]:a[c.expando]&&c.expando;if(l&&(!e||!l||i[l][f])||!(h&&d===m)){if(!l)g?a[c.expando]=l=++c.uuid:l=c.expando;if(!i[l]&&(i[l]={},!g))i[l].toJSON=c.noop;if(typeof b==="object"|| typeof b==="function")e?i[l][f]=c.extend(i[l][f],b):i[l]=c.extend(i[l],b);a=i[l];e&&(a[f]||(a[f]={}),a=a[f]);d!==m&&(a[b]=d);if(b==="events"&&!a[b])return a[f]&&a[f].events;return h?a[b]:a}}},removeData:function(a,b,d){if(c.acceptData(a)){var e=c.expando,f=a.nodeType,h=f?c.cache:a,g=f?a[c.expando]:c.expando;if(h[g]){if(b){var i=d?h[g][e]:h[g];if(i&&(delete i[b],!$(i)))return}if(d&&(delete h[g][e],!$(h[g])))return;b=h[g][e];c.support.deleteExpando||h!=q?delete h[g]:h[g]=null;if(b){h[g]={};if(!f)h[g].toJSON= c.noop;h[g][e]=b}else f&&(c.support.deleteExpando?delete a[c.expando]:a.removeAttribute?a.removeAttribute(c.expando):a[c.expando]=null)}}},_data:function(a,b,d){return c.data(a,b,d,!0)},acceptData:function(a){if(a.nodeName){var b=c.noData[a.nodeName.toLowerCase()];if(b)return!(b===!0||a.getAttribute("classid")!==b)}return!0}});c.fn.extend({data:function(a,b){var d=null;if(typeof a==="undefined"){if(this.length&&(d=c.data(this[0]),this[0].nodeType===1))for(var e=this[0].attributes,f,h=0,g=e.length;h< g;h++)f=e[h].name,f.indexOf("data-")===0&&(f=f.substr(5),la(this[0],f,d[f]));return d}else if(typeof a==="object")return this.each(function(){c.data(this,a)});var i=a.split(".");i[1]=i[1]?"."+i[1]:"";return b===m?(d=this.triggerHandler("getData"+i[1]+"!",[i[0]]),d===m&&this.length&&(d=c.data(this[0],a),d=la(this[0],a,d)),d===m&&i[1]?this.data(i[0]):d):this.each(function(){var d=c(this),e=[i[0],b];d.triggerHandler("setData"+i[1]+"!",e);c.data(this,a,b);d.triggerHandler("changeData"+i[1]+"!",e)})}, removeData:function(a){return this.each(function(){c.removeData(this,a)})}});c.extend({queue:function(a,b,d){if(a){var b=(b||"fx")+"queue",e=c._data(a,b);if(!d)return e||[];!e||c.isArray(d)?e=c._data(a,b,c.makeArray(d)):e.push(d);return e}},dequeue:function(a,b){var b=b||"fx",d=c.queue(a,b),e=d.shift();e==="inprogress"&&(e=d.shift());e&&(b==="fx"&&d.unshift("inprogress"),e.call(a,function(){c.dequeue(a,b)}));d.length||c.removeData(a,b+"queue",!0)}});c.fn.extend({queue:function(a,b){typeof a!=="string"&& (b=a,a="fx");if(b===m)return c.queue(this[0],a);return this.each(function(){var d=c.queue(this,a,b);a==="fx"&&d[0]!=="inprogress"&&c.dequeue(this,a)})},dequeue:function(a){return this.each(function(){c.dequeue(this,a)})},delay:function(a,b){a=c.fx?c.fx.speeds[a]||a:a;b=b||"fx";return this.queue(b,function(){var d=this;setTimeout(function(){c.dequeue(d,b)},a)})},clearQueue:function(a){return this.queue(a||"fx",[])}});var za=/[\n\t\r]/g,ia=/\s+/,cb=/\r/g,db=/^(?:href|src|style)$/,eb=/^(?:button|input)$/i, fb=/^(?:button|input|object|select|textarea)$/i,gb=/^a(?:rea)?$/i,Aa=/^(?:radio|checkbox)$/i;c.props={"for":"htmlFor","class":"className",readonly:"readOnly",maxlength:"maxLength",cellspacing:"cellSpacing",rowspan:"rowSpan",colspan:"colSpan",tabindex:"tabIndex",usemap:"useMap",frameborder:"frameBorder"};c.fn.extend({attr:function(a,b){return c.access(this,a,b,!0,c.attr)},removeAttr:function(a){return this.each(function(){c.attr(this,a,"");this.nodeType===1&&this.removeAttribute(a)})},addClass:function(a){if(c.isFunction(a))return this.each(function(b){var d= c(this);d.addClass(a.call(this,b,d.attr("class")))});if(a&&typeof a==="string")for(var b=(a||"").split(ia),d=0,e=this.length;d<e;d++){var f=this[d];if(f.nodeType===1)if(f.className){for(var h=" "+f.className+" ",g=f.className,i=0,l=b.length;i<l;i++)h.indexOf(" "+b[i]+" ")<0&&(g+=" "+b[i]);f.className=c.trim(g)}else f.className=a}return this},removeClass:function(a){if(c.isFunction(a))return this.each(function(b){var d=c(this);d.removeClass(a.call(this,b,d.attr("class")))});if(a&&typeof a==="string"|| a===m)for(var b=(a||"").split(ia),d=0,e=this.length;d<e;d++){var f=this[d];if(f.nodeType===1&&f.className)if(a){for(var h=(" "+f.className+" ").replace(za," "),g=0,i=b.length;g<i;g++)h=h.replace(" "+b[g]+" "," ");f.className=c.trim(h)}else f.className=""}return this},toggleClass:function(a,b){var d=typeof a,e=typeof b==="boolean";if(c.isFunction(a))return this.each(function(d){var e=c(this);e.toggleClass(a.call(this,d,e.attr("class"),b),b)});return this.each(function(){if(d==="string")for(var f,h= 0,g=c(this),i=b,l=a.split(ia);f=l[h++];)i=e?i:!g.hasClass(f),g[i?"addClass":"removeClass"](f);else if(d==="undefined"||d==="boolean")this.className&&c._data(this,"__className__",this.className),this.className=this.className||a===!1?"":c._data(this,"__className__")||""})},hasClass:function(a){for(var a=" "+a+" ",b=0,c=this.length;b<c;b++)if((" "+this[b].className+" ").replace(za," ").indexOf(a)>-1)return!0;return!1},val:function(a){if(!arguments.length){var b=this[0];if(b){if(c.nodeName(b,"option")){var d= b.attributes.value;return!d||d.specified?b.value:b.text}if(c.nodeName(b,"select")){var d=b.selectedIndex,e=[],f=b.options,b=b.type==="select-one";if(d<0)return null;for(var h=b?d:0,g=b?d+1:f.length;h<g;h++){var i=f[h];if(i.selected&&(c.support.optDisabled?!i.disabled:i.getAttribute("disabled")===null)&&(!i.parentNode.disabled||!c.nodeName(i.parentNode,"optgroup"))){a=c(i).val();if(b)return a;e.push(a)}}if(b&&!e.length&&f.length)return c(f[d]).val();return e}if(Aa.test(b.type)&&!c.support.checkOn)return b.getAttribute("value")=== null?"on":b.value;return(b.value||"").replace(cb,"")}return m}var l=c.isFunction(a);return this.each(function(b){var d=c(this),e=a;if(this.nodeType===1)if(l&&(e=a.call(this,b,d.val())),e==null?e="":typeof e==="number"?e+="":c.isArray(e)&&(e=c.map(e,function(a){return a==null?"":a+""})),c.isArray(e)&&Aa.test(this.type))this.checked=c.inArray(d.val(),e)>=0;else if(c.nodeName(this,"select")){var f=c.makeArray(e);c("option",this).each(function(){this.selected=c.inArray(c(this).val(),f)>=0});if(!f.length)this.selectedIndex= -1}else this.value=e})}});c.extend({attrFn:{val:!0,css:!0,html:!0,text:!0,data:!0,width:!0,height:!0,offset:!0},attr:function(a,b,d,e){if(!a||a.nodeType===3||a.nodeType===8||a.nodeType===2)return m;if(e&&b in c.attrFn)return c(a)[b](d);var e=a.nodeType!==1||!c.isXMLDoc(a),f=d!==m,b=e&&c.props[b]||b;if(a.nodeType===1){var h=db.test(b);if((b in a||a[b]!==m)&&e&&!h){f&&(b==="type"&&eb.test(a.nodeName)&&a.parentNode&&c.error("type property can't be changed"),d===null?a.nodeType===1&&a.removeAttribute(b): a[b]=d);if(c.nodeName(a,"form")&&a.getAttributeNode(b))return a.getAttributeNode(b).nodeValue;if(b==="tabIndex")return(b=a.getAttributeNode("tabIndex"))&&b.specified?b.value:fb.test(a.nodeName)||gb.test(a.nodeName)&&a.href?0:m;return a[b]}if(!c.support.style&&e&&b==="style"){if(f)a.style.cssText=""+d;return a.style.cssText}f&&a.setAttribute(b,""+d);if(!a.attributes[b]&&a.hasAttribute&&!a.hasAttribute(b))return m;a=!c.support.hrefNormalized&&e&&h?a.getAttribute(b,2):a.getAttribute(b);return a===null? m:a}f&&(a[b]=d);return a[b]}});var O=/\.(.*)$/,ja=/^(?:textarea|input|select)$/i,Ua=/\./g,Va=/ /g,hb=/[^\w\s.|`]/g,ib=function(a){return a.replace(hb,"\\$&")};c.event={add:function(a,b,d,e){if(!(a.nodeType===3||a.nodeType===8)){try{c.isWindow(a)&&a!==q&&!a.frameElement&&(a=q)}catch(f){}if(d===!1)d=F;else if(!d)return;var h,g;if(d.handler)h=d,d=h.handler;if(!d.guid)d.guid=c.guid++;if(g=c._data(a)){var i=g.events,l=g.handle;if(!i)g.events=i={};if(!l)g.handle=l=function(){return typeof c!=="undefined"&& !c.event.triggered?c.event.handle.apply(l.elem,arguments):m};l.elem=a;for(var b=b.split(" "),k,n=0,j;k=b[n++];){g=h?c.extend({},h):{handler:d,data:e};k.indexOf(".")>-1?(j=k.split("."),k=j.shift(),g.namespace=j.slice(0).sort().join(".")):(j=[],g.namespace="");g.type=k;if(!g.guid)g.guid=d.guid;var v=i[k],p=c.event.special[k]||{};if(!v&&(v=i[k]=[],!p.setup||p.setup.call(a,e,j,l)===!1))a.addEventListener?a.addEventListener(k,l,!1):a.attachEvent&&a.attachEvent("on"+k,l);if(p.add&&(p.add.call(a,g),!g.handler.guid))g.handler.guid= d.guid;v.push(g);c.event.global[k]=!0}a=null}}},global:{},remove:function(a,b,d,e){if(!(a.nodeType===3||a.nodeType===8)){d===!1&&(d=F);var f,h,g=0,i,l,k,n,j,q,p=c.hasData(a)&&c._data(a),s=p&&p.events;if(p&&s){if(b&&b.type)d=b.handler,b=b.type;if(!b||typeof b==="string"&&b.charAt(0)===".")for(f in b=b||"",s)c.event.remove(a,f+b);else{for(b=b.split(" ");f=b[g++];)if(n=f,i=f.indexOf(".")<0,l=[],i||(l=f.split("."),f=l.shift(),k=RegExp("(^|\\.)"+c.map(l.slice(0).sort(),ib).join("\\.(?:.*\\.)?")+"(\\.|$)")), j=s[f])if(d){n=c.event.special[f]||{};for(h=e||0;h<j.length;h++)if(q=j[h],d.guid===q.guid){if(i||k.test(q.namespace))e==null&&j.splice(h--,1),n.remove&&n.remove.call(a,q);if(e!=null)break}if(j.length===0||e!=null&&j.length===1)(!n.teardown||n.teardown.call(a,l)===!1)&&c.removeEvent(a,f,p.handle),delete s[f]}else for(h=0;h<j.length;h++)if(q=j[h],i||k.test(q.namespace))c.event.remove(a,n,q.handler,h),j.splice(h--,1);if(c.isEmptyObject(s)){if(b=p.handle)b.elem=null;delete p.events;delete p.handle;c.isEmptyObject(p)&& c.removeData(a,m,!0)}}}}},trigger:function(a,b,d,e){var f=a.type||a;if(!e){a=typeof a==="object"?a[c.expando]?a:c.extend(c.Event(f),a):c.Event(f);if(f.indexOf("!")>=0)a.type=f=f.slice(0,-1),a.exclusive=!0;d||(a.stopPropagation(),c.event.global[f]&&c.each(c.cache,function(){var d=this[c.expando];d&&d.events&&d.events[f]&&c.event.trigger(a,b,d.handle.elem)}));if(!d||d.nodeType===3||d.nodeType===8)return m;a.result=m;a.target=d;b=c.makeArray(b);b.unshift(a)}a.currentTarget=d;(e=c._data(d,"handle"))&& e.apply(d,b);e=d.parentNode||d.ownerDocument;try{if((!d||!d.nodeName||!c.noData[d.nodeName.toLowerCase()])&&d["on"+f]&&d["on"+f].apply(d,b)===!1)a.result=!1,a.preventDefault()}catch(h){}if(!a.isPropagationStopped()&&e)c.event.trigger(a,b,e,!0);else if(!a.isDefaultPrevented()){var g,e=a.target,i=f.replace(O,""),l=c.nodeName(e,"a")&&i==="click",k=c.event.special[i]||{};if((!k._default||k._default.call(d,a)===!1)&&!l&&(!e||!e.nodeName||!c.noData[e.nodeName.toLowerCase()])){try{if(e[i])(g=e["on"+i])&& (e["on"+i]=null),c.event.triggered=!0,e[i]()}catch(j){}g&&(e["on"+i]=g);c.event.triggered=!1}}},handle:function(a){var b,d,e,f;d=[];var h=c.makeArray(arguments),a=h[0]=c.event.fix(a||q.event);a.currentTarget=this;b=a.type.indexOf(".")<0&&!a.exclusive;if(!b)e=a.type.split("."),a.type=e.shift(),d=e.slice(0).sort(),e=RegExp("(^|\\.)"+d.join("\\.(?:.*\\.)?")+"(\\.|$)");a.namespace=a.namespace||d.join(".");f=c._data(this,"events");d=(f||{})[a.type];if(f&&d){d=d.slice(0);f=0;for(var g=d.length;f<g;f++){var i= d[f];if(b||e.test(i.namespace)){a.handler=i.handler;a.data=i.data;a.handleObj=i;i=i.handler.apply(this,h);if(i!==m)a.result=i,i===!1&&(a.preventDefault(),a.stopPropagation());if(a.isImmediatePropagationStopped())break}}}return a.result},props:"altKey attrChange attrName bubbles button cancelable charCode clientX clientY ctrlKey currentTarget data detail eventPhase fromElement handler keyCode layerX layerY metaKey newValue offsetX offsetY pageX pageY prevValue relatedNode relatedTarget screenX screenY shiftKey srcElement target toElement view wheelDelta which".split(" "), fix:function(a){if(a[c.expando])return a;for(var b=a,a=c.Event(b),d=this.props.length,e;d;)e=this.props[--d],a[e]=b[e];if(!a.target)a.target=a.srcElement||j;if(a.target.nodeType===3)a.target=a.target.parentNode;if(!a.relatedTarget&&a.fromElement)a.relatedTarget=a.fromElement===a.target?a.toElement:a.fromElement;if(a.pageX==null&&a.clientX!=null)b=j.documentElement,d=j.body,a.pageX=a.clientX+(b&&b.scrollLeft||d&&d.scrollLeft||0)-(b&&b.clientLeft||d&&d.clientLeft||0),a.pageY=a.clientY+(b&&b.scrollTop|| d&&d.scrollTop||0)-(b&&b.clientTop||d&&d.clientTop||0);if(a.which==null&&(a.charCode!=null||a.keyCode!=null))a.which=a.charCode!=null?a.charCode:a.keyCode;if(!a.metaKey&&a.ctrlKey)a.metaKey=a.ctrlKey;if(!a.which&&a.button!==m)a.which=a.button&1?1:a.button&2?3:a.button&4?2:0;return a},guid:1E8,proxy:c.proxy,special:{ready:{setup:c.bindReady,teardown:c.noop},live:{add:function(a){c.event.add(this,T(a.origType,a.selector),c.extend({},a,{handler:Sa,guid:a.handler.guid}))},remove:function(a){c.event.remove(this, T(a.origType,a.selector),a)}},beforeunload:{setup:function(a,b,d){if(c.isWindow(this))this.onbeforeunload=d},teardown:function(a,b){if(this.onbeforeunload===b)this.onbeforeunload=null}}}};c.removeEvent=j.removeEventListener?function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c,!1)}:function(a,b,c){a.detachEvent&&a.detachEvent("on"+b,c)};c.Event=function(a){if(!this.preventDefault)return new c.Event(a);a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented|| a.returnValue===!1||a.getPreventDefault&&a.getPreventDefault()?H:F):this.type=a;this.timeStamp=c.now();this[c.expando]=!0};c.Event.prototype={preventDefault:function(){this.isDefaultPrevented=H;var a=this.originalEvent;if(a)a.preventDefault?a.preventDefault():a.returnValue=!1},stopPropagation:function(){this.isPropagationStopped=H;var a=this.originalEvent;if(a)a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=H;this.stopPropagation()}, isDefaultPrevented:F,isPropagationStopped:F,isImmediatePropagationStopped:F};var Ba=function(a){var b=a.relatedTarget;try{if(b===j||b.parentNode){for(;b&&b!==this;)b=b.parentNode;if(b!==this)a.type=a.data,c.event.handle.apply(this,arguments)}}catch(d){}},Ca=function(a){a.type=a.data;c.event.handle.apply(this,arguments)};c.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(a,b){c.event.special[a]={setup:function(d){c.event.add(this,b,d&&d.selector?Ca:Ba,a)},teardown:function(a){c.event.remove(this, b,a&&a.selector?Ca:Ba)}}});if(!c.support.submitBubbles)c.event.special.submit={setup:function(){if(this.nodeName&&this.nodeName.toLowerCase()!=="form")c.event.add(this,"click.specialSubmit",function(a){var b=a.target,d=b.type;(d==="submit"||d==="image")&&c(b).closest("form").length&&ma("submit",this,arguments)}),c.event.add(this,"keypress.specialSubmit",function(a){var b=a.target,d=b.type;(d==="text"||d==="password")&&c(b).closest("form").length&&a.keyCode===13&&ma("submit",this,arguments)});else return!1}, teardown:function(){c.event.remove(this,".specialSubmit")}};if(!c.support.changeBubbles){var M,Da=function(a){var b=a.type,d=a.value;if(b==="radio"||b==="checkbox")d=a.checked;else if(b==="select-multiple")d=a.selectedIndex>-1?c.map(a.options,function(a){return a.selected}).join("-"):"";else if(a.nodeName.toLowerCase()==="select")d=a.selectedIndex;return d},W=function(a,b){var d=a.target,e,f;if(ja.test(d.nodeName)&&!d.readOnly&&(e=c._data(d,"_change_data"),f=Da(d),(a.type!=="focusout"||d.type!=="radio")&& c._data(d,"_change_data",f),!(e===m||f===e)))if(e!=null||f)a.type="change",a.liveFired=m,c.event.trigger(a,b,d)};c.event.special.change={filters:{focusout:W,beforedeactivate:W,click:function(a){var b=a.target,c=b.type;(c==="radio"||c==="checkbox"||b.nodeName.toLowerCase()==="select")&&W.call(this,a)},keydown:function(a){var b=a.target,c=b.type;(a.keyCode===13&&b.nodeName.toLowerCase()!=="textarea"||a.keyCode===32&&(c==="checkbox"||c==="radio")||c==="select-multiple")&&W.call(this,a)},beforeactivate:function(a){a= a.target;c._data(a,"_change_data",Da(a))}},setup:function(){if(this.type==="file")return!1;for(var a in M)c.event.add(this,a+".specialChange",M[a]);return ja.test(this.nodeName)},teardown:function(){c.event.remove(this,".specialChange");return ja.test(this.nodeName)}};M=c.event.special.change.filters;M.focus=M.beforeactivate}j.addEventListener&&c.each({focus:"focusin",blur:"focusout"},function(a,b){function d(a){a=c.event.fix(a);a.type=b;return c.event.handle.call(this,a)}c.event.special[b]={setup:function(){this.addEventListener(a, d,!0)},teardown:function(){this.removeEventListener(a,d,!0)}}});c.each(["bind","one"],function(a,b){c.fn[b]=function(a,e,f){if(typeof a==="object"){for(var h in a)this[b](h,e,a[h],f);return this}if(c.isFunction(e)||e===!1)f=e,e=m;var g=b==="one"?c.proxy(f,function(a){c(this).unbind(a,g);return f.apply(this,arguments)}):f;if(a==="unload"&&b!=="one")this.one(a,e,f);else{h=0;for(var i=this.length;h<i;h++)c.event.add(this[h],a,g,e)}return this}});c.fn.extend({unbind:function(a,b){if(typeof a==="object"&& !a.preventDefault)for(var d in a)this.unbind(d,a[d]);else{d=0;for(var e=this.length;d<e;d++)c.event.remove(this[d],a,b)}return this},delegate:function(a,b,c,e){return this.live(b,c,e,a)},undelegate:function(a,b,c){return arguments.length===0?this.unbind("live"):this.die(b,null,c,a)},trigger:function(a,b){return this.each(function(){c.event.trigger(a,b,this)})},triggerHandler:function(a,b){if(this[0]){var d=c.Event(a);d.preventDefault();d.stopPropagation();c.event.trigger(d,b,this[0]);return d.result}}, toggle:function(a){for(var b=arguments,d=1;d<b.length;)c.proxy(a,b[d++]);return this.click(c.proxy(a,function(e){var f=(c._data(this,"lastToggle"+a.guid)||0)%d;c._data(this,"lastToggle"+a.guid,f+1);e.preventDefault();return b[f].apply(this,arguments)||!1}))},hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)}});var Ea={focus:"focusin",blur:"focusout",mouseenter:"mouseover",mouseleave:"mouseout"};c.each(["live","die"],function(a,b){c.fn[b]=function(a,e,f,h){var g,i=0,l,k,j=h||this.selector, h=h?this:c(this.context);if(typeof a==="object"&&!a.preventDefault){for(g in a)h[b](g,e,a[g],j);return this}c.isFunction(e)&&(f=e,e=m);for(a=(a||"").split(" ");(g=a[i++])!=null;)if(l=O.exec(g),k="",l&&(k=l[0],g=g.replace(O,"")),g==="hover")a.push("mouseenter"+k,"mouseleave"+k);else if(l=g,g==="focus"||g==="blur"?(a.push(Ea[g]+k),g+=k):g=(Ea[g]||g)+k,b==="live"){k=0;for(var q=h.length;k<q;k++)c.event.add(h[k],"live."+T(g,j),{data:e,selector:j,handler:f,origType:g,origHandler:f,preType:l})}else h.unbind("live."+ T(g,j),f);return this}});c.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error".split(" "),function(a,b){c.fn[b]=function(a,c){c==null&&(c=a,a=null);return arguments.length>0?this.bind(b,a,c):this.trigger(b)};c.attrFn&&(c.attrFn[b]=!0)});(function(){function a(a,b,c,d,e,f){for(var e=0,h=d.length;e<h;e++){var g=d[e];if(g){for(var i=!1,g=g[a];g;){if(g.sizcache=== c){i=d[g.sizset];break}if(g.nodeType===1&&!f)g.sizcache=c,g.sizset=e;if(g.nodeName.toLowerCase()===b){i=g;break}g=g[a]}d[e]=i}}}function b(a,b,c,d,e,f){for(var e=0,h=d.length;e<h;e++){var g=d[e];if(g){for(var i=!1,g=g[a];g;){if(g.sizcache===c){i=d[g.sizset];break}if(g.nodeType===1){if(!f)g.sizcache=c,g.sizset=e;if(typeof b!=="string"){if(g===b){i=!0;break}}else if(k.filter(b,[g]).length>0){i=g;break}}g=g[a]}d[e]=i}}}var d=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g, e=0,f=Object.prototype.toString,h=!1,g=!0,i=/\\/g,l=/\W/;[0,0].sort(function(){g=!1;return 0});var k=function(a,b,c,e){var c=c||[],h=b=b||j;if(b.nodeType!==1&&b.nodeType!==9)return[];if(!a||typeof a!=="string")return c;var g,i,l,m,p,t=!0,v=k.isXML(b),r=[],w=a;do if(d.exec(""),g=d.exec(w))if(w=g[3],r.push(g[1]),g[2]){m=g[3];break}while(g);if(r.length>1&&q.exec(a))if(r.length===2&&n.relative[r[0]])i=u(r[0]+r[1],b);else for(i=n.relative[r[0]]?[b]:k(r.shift(),b);r.length;)a=r.shift(),n.relative[a]&&(a+= r.shift()),i=u(a,i);else if(!e&&r.length>1&&b.nodeType===9&&!v&&n.match.ID.test(r[0])&&!n.match.ID.test(r[r.length-1])&&(g=k.find(r.shift(),b,v),b=g.expr?k.filter(g.expr,g.set)[0]:g.set[0]),b){g=e?{expr:r.pop(),set:s(e)}:k.find(r.pop(),r.length===1&&(r[0]==="~"||r[0]==="+")&&b.parentNode?b.parentNode:b,v);i=g.expr?k.filter(g.expr,g.set):g.set;for(r.length>0?l=s(i):t=!1;r.length;)g=p=r.pop(),n.relative[p]?g=r.pop():p="",g==null&&(g=b),n.relative[p](l,g,v)}else l=[];l||(l=i);l||k.error(p||a);if(f.call(l)=== "[object Array]")if(t)if(b&&b.nodeType===1)for(a=0;l[a]!=null;a++)l[a]&&(l[a]===!0||l[a].nodeType===1&&k.contains(b,l[a]))&&c.push(i[a]);else for(a=0;l[a]!=null;a++)l[a]&&l[a].nodeType===1&&c.push(i[a]);else c.push.apply(c,l);else s(l,c);m&&(k(m,h,c,e),k.uniqueSort(c));return c};k.uniqueSort=function(a){if(t&&(h=g,a.sort(t),h))for(var b=1;b<a.length;b++)a[b]===a[b-1]&&a.splice(b--,1);return a};k.matches=function(a,b){return k(a,null,null,b)};k.matchesSelector=function(a,b){return k(b,null,null,[a]).length> 0};k.find=function(a,b,c){var d;if(!a)return[];for(var e=0,f=n.order.length;e<f;e++){var h,g=n.order[e];if(h=n.leftMatch[g].exec(a)){var k=h[1];h.splice(1,1);if(k.substr(k.length-1)!=="\\"&&(h[1]=(h[1]||"").replace(i,""),d=n.find[g](h,b,c),d!=null)){a=a.replace(n.match[g],"");break}}}d||(d=typeof b.getElementsByTagName!=="undefined"?b.getElementsByTagName("*"):[]);return{set:d,expr:a}};k.filter=function(a,b,c,d){for(var e,f,h=a,g=[],i=b,l=b&&b[0]&&k.isXML(b[0]);a&&b.length;){for(var j in n.filter)if((e= n.leftMatch[j].exec(a))!=null&&e[2]){var p,r,q=n.filter[j];r=e[1];f=!1;e.splice(1,1);if(r.substr(r.length-1)!=="\\"){i===g&&(g=[]);if(n.preFilter[j])if(e=n.preFilter[j](e,i,c,g,d,l)){if(e===!0)continue}else f=p=!0;if(e)for(var s=0;(r=i[s])!=null;s++)if(r){p=q(r,e,s,i);var t=d^!!p;c&&p!=null?t?f=!0:i[s]=!1:t&&(g.push(r),f=!0)}if(p!==m){c||(i=g);a=a.replace(n.match[j],"");if(!f)return[];break}}}if(a===h)if(f==null)k.error(a);else break;h=a}return i};k.error=function(a){throw"Syntax error, unrecognized expression: "+ a;};var n=k.selectors={order:["ID","NAME","TAG"],match:{ID:/#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,CLASS:/\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,NAME:/\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,ATTR:/\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(?:(['"])(.*?)\3|(#?(?:[\w\u00c0-\uFFFF\-]|\\.)*)|)|)\s*\]/,TAG:/^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,CHILD:/:(only|nth|last|first)-child(?:\(\s*(even|odd|(?:[+\-]?\d+|(?:[+\-]?\d*)?n\s*(?:[+\-]\s*\d+)?))\s*\))?/,POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/, PSEUDO:/:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/},leftMatch:{},attrMap:{"class":"className","for":"htmlFor"},attrHandle:{href:function(a){return a.getAttribute("href")},type:function(a){return a.getAttribute("type")}},relative:{"+":function(a,b){var c=typeof b==="string",d=c&&!l.test(b),c=c&&!d;d&&(b=b.toLowerCase());for(var d=0,e=a.length,f;d<e;d++)if(f=a[d]){for(;(f=f.previousSibling)&&f.nodeType!==1;);a[d]=c||f&&f.nodeName.toLowerCase()===b?f||!1:f===b}c&&k.filter(b, a,!0)},">":function(a,b){var c,d=typeof b==="string",e=0,f=a.length;if(d&&!l.test(b))for(b=b.toLowerCase();e<f;e++){if(c=a[e])c=c.parentNode,a[e]=c.nodeName.toLowerCase()===b?c:!1}else{for(;e<f;e++)(c=a[e])&&(a[e]=d?c.parentNode:c.parentNode===b);d&&k.filter(b,a,!0)}},"":function(c,d,f){var h,g=e++,i=b;typeof d==="string"&&!l.test(d)&&(h=d=d.toLowerCase(),i=a);i("parentNode",d,g,c,h,f)},"~":function(c,d,f){var h,g=e++,i=b;typeof d==="string"&&!l.test(d)&&(h=d=d.toLowerCase(),i=a);i("previousSibling", d,g,c,h,f)}},find:{ID:function(a,b,c){if(typeof b.getElementById!=="undefined"&&!c)return(a=b.getElementById(a[1]))&&a.parentNode?[a]:[]},NAME:function(a,b){if(typeof b.getElementsByName!=="undefined"){for(var c=[],d=b.getElementsByName(a[1]),e=0,f=d.length;e<f;e++)d[e].getAttribute("name")===a[1]&&c.push(d[e]);return c.length===0?null:c}},TAG:function(a,b){if(typeof b.getElementsByTagName!=="undefined")return b.getElementsByTagName(a[1])}},preFilter:{CLASS:function(a,b,c,d,e,f){a=" "+a[1].replace(i, "")+" ";if(f)return a;for(var f=0,h;(h=b[f])!=null;f++)h&&(e^(h.className&&(" "+h.className+" ").replace(/[\t\n\r]/g," ").indexOf(a)>=0)?c||d.push(h):c&&(b[f]=!1));return!1},ID:function(a){return a[1].replace(i,"")},TAG:function(a){return a[1].replace(i,"").toLowerCase()},CHILD:function(a){if(a[1]==="nth"){a[2]||k.error(a[0]);a[2]=a[2].replace(/^\+|\s*/g,"");var b=/(-?)(\d*)(?:n([+\-]?\d*))?/.exec(a[2]==="even"&&"2n"||a[2]==="odd"&&"2n+1"||!/\D/.test(a[2])&&"0n+"+a[2]||a[2]);a[2]=b[1]+(b[2]||1)-0; a[3]=b[3]-0}else a[2]&&k.error(a[0]);a[0]=e++;return a},ATTR:function(a,b,c,d,e,f){b=a[1]=a[1].replace(i,"");!f&&n.attrMap[b]&&(a[1]=n.attrMap[b]);a[4]=(a[4]||a[5]||"").replace(i,"");a[2]==="~="&&(a[4]=" "+a[4]+" ");return a},PSEUDO:function(a,b,c,e,f){if(a[1]==="not")if((d.exec(a[3])||"").length>1||/^\w/.test(a[3]))a[3]=k(a[3],null,null,b);else return a=k.filter(a[3],b,c,1^f),c||e.push.apply(e,a),!1;else if(n.match.POS.test(a[0])||n.match.CHILD.test(a[0]))return!0;return a},POS:function(a){a.unshift(!0); return a}},filters:{enabled:function(a){return a.disabled===!1&&a.type!=="hidden"},disabled:function(a){return a.disabled===!0},checked:function(a){return a.checked===!0},selected:function(a){return a.selected===!0},parent:function(a){return!!a.firstChild},empty:function(a){return!a.firstChild},has:function(a,b,c){return!!k(c[3],a).length},header:function(a){return/h\d/i.test(a.nodeName)},text:function(a){return"text"===a.getAttribute("type")},radio:function(a){return"radio"===a.type},checkbox:function(a){return"checkbox"=== a.type},file:function(a){return"file"===a.type},password:function(a){return"password"===a.type},submit:function(a){return"submit"===a.type},image:function(a){return"image"===a.type},reset:function(a){return"reset"===a.type},button:function(a){return"button"===a.type||a.nodeName.toLowerCase()==="button"},input:function(a){return/input|select|textarea|button/i.test(a.nodeName)}},setFilters:{first:function(a,b){return b===0},last:function(a,b,c,d){return b===d.length-1},even:function(a,b){return b%2=== 0},odd:function(a,b){return b%2===1},lt:function(a,b,c){return b<c[3]-0},gt:function(a,b,c){return b>c[3]-0},nth:function(a,b,c){return c[3]-0===b},eq:function(a,b,c){return c[3]-0===b}},filter:{PSEUDO:function(a,b,c,d){var e=b[1],f=n.filters[e];if(f)return f(a,c,b,d);else if(e==="contains")return(a.textContent||a.innerText||k.getText([a])||"").indexOf(b[3])>=0;else if(e==="not"){b=b[3];c=0;for(d=b.length;c<d;c++)if(b[c]===a)return!1;return!0}else k.error(e)},CHILD:function(a,b){var c=b[1],d=a;switch(c){case "only":case "first":for(;d= d.previousSibling;)if(d.nodeType===1)return!1;if(c==="first")return!0;d=a;case "last":for(;d=d.nextSibling;)if(d.nodeType===1)return!1;return!0;case "nth":var c=b[2],e=b[3];if(c===1&&e===0)return!0;var f=b[0],h=a.parentNode;if(h&&(h.sizcache!==f||!a.nodeIndex)){for(var g=0,d=h.firstChild;d;d=d.nextSibling)if(d.nodeType===1)d.nodeIndex=++g;h.sizcache=f}d=a.nodeIndex-e;return c===0?d===0:d%c===0&&d/c>=0}},ID:function(a,b){return a.nodeType===1&&a.getAttribute("id")===b},TAG:function(a,b){return b=== "*"&&a.nodeType===1||a.nodeName.toLowerCase()===b},CLASS:function(a,b){return(" "+(a.className||a.getAttribute("class"))+" ").indexOf(b)>-1},ATTR:function(a,b){var c=b[1],c=n.attrHandle[c]?n.attrHandle[c](a):a[c]!=null?a[c]:a.getAttribute(c),d=c+"",e=b[2],f=b[4];return c==null?e==="!=":e==="="?d===f:e==="*="?d.indexOf(f)>=0:e==="~="?(" "+d+" ").indexOf(f)>=0:!f?d&&c!==!1:e==="!="?d!==f:e==="^="?d.indexOf(f)===0:e==="$="?d.substr(d.length-f.length)===f:e==="|="?d===f||d.substr(0,f.length+1)===f+"-": !1},POS:function(a,b,c,d){var e=n.setFilters[b[2]];if(e)return e(a,c,b,d)}}},q=n.match.POS,v=function(a,b){return"\\"+(b-0+1)},p;for(p in n.match)n.match[p]=RegExp(n.match[p].source+/(?![^\[]*\])(?![^\(]*\))/.source),n.leftMatch[p]=RegExp(/(^(?:.|\r|\n)*?)/.source+n.match[p].source.replace(/\\(\d+)/g,v));var s=function(a,b){a=Array.prototype.slice.call(a,0);if(b)return b.push.apply(b,a),b;return a};try{Array.prototype.slice.call(j.documentElement.childNodes,0)}catch(w){s=function(a,b){var c=0,d=b|| [];if(f.call(a)==="[object Array]")Array.prototype.push.apply(d,a);else if(typeof a.length==="number")for(var e=a.length;c<e;c++)d.push(a[c]);else for(;a[c];c++)d.push(a[c]);return d}}var t,L;j.documentElement.compareDocumentPosition?t=function(a,b){if(a===b)return h=!0,0;if(!a.compareDocumentPosition||!b.compareDocumentPosition)return a.compareDocumentPosition?-1:1;return a.compareDocumentPosition(b)&4?-1:1}:(t=function(a,b){var c,d,e=[],f=[];c=a.parentNode;d=b.parentNode;var g=c;if(a===b)return h= !0,0;else if(c===d)return L(a,b);else if(c){if(!d)return 1}else return-1;for(;g;)e.unshift(g),g=g.parentNode;for(g=d;g;)f.unshift(g),g=g.parentNode;c=e.length;d=f.length;for(g=0;g<c&&g<d;g++)if(e[g]!==f[g])return L(e[g],f[g]);return g===c?L(a,f[g],-1):L(e[g],b,1)},L=function(a,b,c){if(a===b)return c;for(a=a.nextSibling;a;){if(a===b)return-1;a=a.nextSibling}return 1});k.getText=function(a){for(var b="",c,d=0;a[d];d++)c=a[d],c.nodeType===3||c.nodeType===4?b+=c.nodeValue:c.nodeType!==8&&(b+=k.getText(c.childNodes)); return b};(function(){var a=j.createElement("div"),b="script"+(new Date).getTime(),c=j.documentElement;a.innerHTML="<a name='"+b+"'/>";c.insertBefore(a,c.firstChild);if(j.getElementById(b))n.find.ID=function(a,b,c){if(typeof b.getElementById!=="undefined"&&!c)return(b=b.getElementById(a[1]))?b.id===a[1]||typeof b.getAttributeNode!=="undefined"&&b.getAttributeNode("id").nodeValue===a[1]?[b]:m:[]},n.filter.ID=function(a,b){var c=typeof a.getAttributeNode!=="undefined"&&a.getAttributeNode("id");return a.nodeType=== 1&&c&&c.nodeValue===b};c.removeChild(a);c=a=null})();(function(){var a=j.createElement("div");a.appendChild(j.createComment(""));if(a.getElementsByTagName("*").length>0)n.find.TAG=function(a,b){var c=b.getElementsByTagName(a[1]);if(a[1]==="*"){for(var d=[],e=0;c[e];e++)c[e].nodeType===1&&d.push(c[e]);c=d}return c};a.innerHTML="<a href='#'></a>";if(a.firstChild&&typeof a.firstChild.getAttribute!=="undefined"&&a.firstChild.getAttribute("href")!=="#")n.attrHandle.href=function(a){return a.getAttribute("href", 2)};a=null})();j.querySelectorAll&&function(){var a=k,b=j.createElement("div");b.innerHTML="<p class='TEST'></p>";if(!(b.querySelectorAll&&b.querySelectorAll(".TEST").length===0)){k=function(b,c,d,e){c=c||j;if(!e&&!k.isXML(c)){var f=/^(\w+$)|^\.([\w\-]+$)|^#([\w\-]+$)/.exec(b);if(f&&(c.nodeType===1||c.nodeType===9))if(f[1])return s(c.getElementsByTagName(b),d);else if(f[2]&&n.find.CLASS&&c.getElementsByClassName)return s(c.getElementsByClassName(f[2]),d);if(c.nodeType===9){if(b==="body"&&c.body)return s([c.body], d);else if(f&&f[3]){var g=c.getElementById(f[3]);if(g&&g.parentNode){if(g.id===f[3])return s([g],d)}else return s([],d)}try{return s(c.querySelectorAll(b),d)}catch(h){}}else if(c.nodeType===1&&c.nodeName.toLowerCase()!=="object"){var f=c,i=(g=c.getAttribute("id"))||"__sizzle__",l=c.parentNode,m=/^\s*[+~]/.test(b);g?i=i.replace(/'/g,"\\$&"):c.setAttribute("id",i);if(m&&l)c=c.parentNode;try{if(!m||l)return s(c.querySelectorAll("[id='"+i+"'] "+b),d)}catch(p){}finally{g||f.removeAttribute("id")}}}return a(b, c,d,e)};for(var c in a)k[c]=a[c];b=null}}();(function(){var a=j.documentElement,b=a.matchesSelector||a.mozMatchesSelector||a.webkitMatchesSelector||a.msMatchesSelector,c=!1;try{b.call(j.documentElement,"[test!='']:sizzle")}catch(d){c=!0}if(b)k.matchesSelector=function(a,d){d=d.replace(/\=\s*([^'"\]]*)\s*\]/g,"='$1']");if(!k.isXML(a))try{if(c||!n.match.PSEUDO.test(d)&&!/!=/.test(d))return b.call(a,d)}catch(e){}return k(d,null,null,[a]).length>0}})();(function(){var a=j.createElement("div");a.innerHTML= "<div class='test e'></div><div class='test'></div>";if(a.getElementsByClassName&&a.getElementsByClassName("e").length!==0&&(a.lastChild.className="e",a.getElementsByClassName("e").length!==1))n.order.splice(1,0,"CLASS"),n.find.CLASS=function(a,b,c){if(typeof b.getElementsByClassName!=="undefined"&&!c)return b.getElementsByClassName(a[1])},a=null})();k.contains=j.documentElement.contains?function(a,b){return a!==b&&(a.contains?a.contains(b):!0)}:j.documentElement.compareDocumentPosition?function(a, b){return!!(a.compareDocumentPosition(b)&16)}:function(){return!1};k.isXML=function(a){return(a=(a?a.ownerDocument||a:0).documentElement)?a.nodeName!=="HTML":!1};var u=function(a,b){for(var c,d=[],e="",f=b.nodeType?[b]:b;c=n.match.PSEUDO.exec(a);)e+=c[0],a=a.replace(n.match.PSEUDO,"");a=n.relative[a]?a+"*":a;c=0;for(var g=f.length;c<g;c++)k(a,f[c],d);return k.filter(e,d)};c.find=k;c.expr=k.selectors;c.expr[":"]=c.expr.filters;c.unique=k.uniqueSort;c.text=k.getText;c.isXMLDoc=k.isXML;c.contains=k.contains})(); var jb=/Until$/,kb=/^(?:parents|prevUntil|prevAll)/,lb=/,/,Wa=/^.[^:#\[\.,]*$/,mb=Array.prototype.slice,nb=c.expr.match.POS,ob={children:!0,contents:!0,next:!0,prev:!0};c.fn.extend({find:function(a){for(var b=this.pushStack("","find",a),d=0,e=0,f=this.length;e<f;e++)if(d=b.length,c.find(a,this[e],b),e>0)for(var h=d;h<b.length;h++)for(var g=0;g<d;g++)if(b[g]===b[h]){b.splice(h--,1);break}return b},has:function(a){var b=c(a);return this.filter(function(){for(var a=0,e=b.length;a<e;a++)if(c.contains(this, b[a]))return!0})},not:function(a){return this.pushStack(na(this,a,!1),"not",a)},filter:function(a){return this.pushStack(na(this,a,!0),"filter",a)},is:function(a){return!!a&&c.filter(a,this).length>0},closest:function(a,b){var d=[],e,f,h=this[0];if(c.isArray(a)){var g,i={},l=1;if(h&&a.length){e=0;for(f=a.length;e<f;e++)g=a[e],i[g]||(i[g]=c.expr.match.POS.test(g)?c(g,b||this.context):g);for(;h&&h.ownerDocument&&h!==b;){for(g in i)e=i[g],(e.jquery?e.index(h)>-1:c(h).is(e))&&d.push({selector:g,elem:h, level:l});h=h.parentNode;l++}}return d}g=nb.test(a)?c(a,b||this.context):null;e=0;for(f=this.length;e<f;e++)for(h=this[e];h;)if(g?g.index(h)>-1:c.find.matchesSelector(h,a)){d.push(h);break}else if(h=h.parentNode,!h||!h.ownerDocument||h===b)break;d=d.length>1?c.unique(d):d;return this.pushStack(d,"closest",a)},index:function(a){if(!a||typeof a==="string")return c.inArray(this[0],a?c(a):this.parent().children());return c.inArray(a.jquery?a[0]:a,this)},add:function(a,b){var d=typeof a==="string"?c(a, b):c.makeArray(a),e=c.merge(this.get(),d);return this.pushStack(!d[0]||!d[0].parentNode||d[0].parentNode.nodeType===11||!e[0]||!e[0].parentNode||e[0].parentNode.nodeType===11?e:c.unique(e))},andSelf:function(){return this.add(this.prevObject)}});c.each({parent:function(a){return(a=a.parentNode)&&a.nodeType!==11?a:null},parents:function(a){return c.dir(a,"parentNode")},parentsUntil:function(a,b,d){return c.dir(a,"parentNode",d)},next:function(a){return c.nth(a,2,"nextSibling")},prev:function(a){return c.nth(a, 2,"previousSibling")},nextAll:function(a){return c.dir(a,"nextSibling")},prevAll:function(a){return c.dir(a,"previousSibling")},nextUntil:function(a,b,d){return c.dir(a,"nextSibling",d)},prevUntil:function(a,b,d){return c.dir(a,"previousSibling",d)},siblings:function(a){return c.sibling(a.parentNode.firstChild,a)},children:function(a){return c.sibling(a.firstChild)},contents:function(a){return c.nodeName(a,"iframe")?a.contentDocument||a.contentWindow.document:c.makeArray(a.childNodes)}},function(a, b){c.fn[a]=function(d,e){var f=c.map(this,b,d),h=mb.call(arguments);jb.test(a)||(e=d);e&&typeof e==="string"&&(f=c.filter(e,f));f=this.length>1&&!ob[a]?c.unique(f):f;if((this.length>1||lb.test(e))&&kb.test(a))f=f.reverse();return this.pushStack(f,a,h.join(","))}});c.extend({filter:function(a,b,d){d&&(a=":not("+a+")");return b.length===1?c.find.matchesSelector(b[0],a)?[b[0]]:[]:c.find.matches(a,b)},dir:function(a,b,d){for(var e=[],a=a[b];a&&a.nodeType!==9&&(d===m||a.nodeType!==1||!c(a).is(d));)a.nodeType=== 1&&e.push(a),a=a[b];return e},nth:function(a,b,c){for(var b=b||1,e=0;a;a=a[c])if(a.nodeType===1&&++e===b)break;return a},sibling:function(a,b){for(var c=[];a;a=a.nextSibling)a.nodeType===1&&a!==b&&c.push(a);return c}});var pb=/ jQuery\d+="(?:\d+|null)"/g,ka=/^\s+/,Fa=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,Ga=/<([\w:]+)/,qb=/<tbody/i,rb=/<|&#?\w+;/,Ha=/<(?:script|object|embed|option|style)/i,Ia=/checked\s*(?:[^=]|=\s*.checked.)/i,u={option:[1,"<select multiple='multiple'>", "</select>"],legend:[1,"<fieldset>","</fieldset>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],area:[1,"<map>","</map>"],_default:[0,"",""]};u.optgroup=u.option;u.tbody=u.tfoot=u.colgroup=u.caption=u.thead;u.th=u.td;if(!c.support.htmlSerialize)u._default=[1,"div<div>","</div>"];c.fn.extend({text:function(a){if(c.isFunction(a))return this.each(function(b){var d= c(this);d.text(a.call(this,b,d.text()))});if(typeof a!=="object"&&a!==m)return this.empty().append((this[0]&&this[0].ownerDocument||j).createTextNode(a));return c.text(this)},wrapAll:function(a){if(c.isFunction(a))return this.each(function(b){c(this).wrapAll(a.call(this,b))});if(this[0]){var b=c(a,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&b.insertBefore(this[0]);b.map(function(){for(var a=this;a.firstChild&&a.firstChild.nodeType===1;)a=a.firstChild;return a}).append(this)}return this}, wrapInner:function(a){if(c.isFunction(a))return this.each(function(b){c(this).wrapInner(a.call(this,b))});return this.each(function(){var b=c(this),d=b.contents();d.length?d.wrapAll(a):b.append(a)})},wrap:function(a){return this.each(function(){c(this).wrapAll(a)})},unwrap:function(){return this.parent().each(function(){c.nodeName(this,"body")||c(this).replaceWith(this.childNodes)}).end()},append:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.appendChild(a)})},prepend:function(){return this.domManip(arguments, !0,function(a){this.nodeType===1&&this.insertBefore(a,this.firstChild)})},before:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this)});else if(arguments.length){var a=c(arguments[0]);a.push.apply(a,this.toArray());return this.pushStack(a,"before",arguments)}},after:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this.nextSibling)});else if(arguments.length){var a= this.pushStack(this,"after",arguments);a.push.apply(a,c(arguments[0]).toArray());return a}},remove:function(a,b){for(var d=0,e;(e=this[d])!=null;d++)if(!a||c.filter(a,[e]).length)!b&&e.nodeType===1&&(c.cleanData(e.getElementsByTagName("*")),c.cleanData([e])),e.parentNode&&e.parentNode.removeChild(e);return this},empty:function(){for(var a=0,b;(b=this[a])!=null;a++)for(b.nodeType===1&&c.cleanData(b.getElementsByTagName("*"));b.firstChild;)b.removeChild(b.firstChild);return this},clone:function(a,b){a= a==null?!1:a;b=b==null?a:b;return this.map(function(){return c.clone(this,a,b)})},html:function(a){if(a===m)return this[0]&&this[0].nodeType===1?this[0].innerHTML.replace(pb,""):null;else if(typeof a==="string"&&!Ha.test(a)&&(c.support.leadingWhitespace||!ka.test(a))&&!u[(Ga.exec(a)||["",""])[1].toLowerCase()]){a=a.replace(Fa,"<$1></$2>");try{for(var b=0,d=this.length;b<d;b++)if(this[b].nodeType===1)c.cleanData(this[b].getElementsByTagName("*")),this[b].innerHTML=a}catch(e){this.empty().append(a)}}else c.isFunction(a)? this.each(function(b){var d=c(this);d.html(a.call(this,b,d.html()))}):this.empty().append(a);return this},replaceWith:function(a){if(this[0]&&this[0].parentNode){if(c.isFunction(a))return this.each(function(b){var d=c(this),e=d.html();d.replaceWith(a.call(this,b,e))});typeof a!=="string"&&(a=c(a).detach());return this.each(function(){var b=this.nextSibling,d=this.parentNode;c(this).remove();b?c(b).before(a):c(d).append(a)})}else return this.pushStack(c(c.isFunction(a)?a():a),"replaceWith",a)},detach:function(a){return this.remove(a, !0)},domManip:function(a,b,d){var e,f,h,g=a[0],i=[];if(!c.support.checkClone&&arguments.length===3&&typeof g==="string"&&Ia.test(g))return this.each(function(){c(this).domManip(a,b,d,!0)});if(c.isFunction(g))return this.each(function(e){var f=c(this);a[0]=g.call(this,e,b?f.html():m);f.domManip(a,b,d)});if(this[0]){e=g&&g.parentNode;e=c.support.parentNode&&e&&e.nodeType===11&&e.childNodes.length===this.length?{fragment:e}:c.buildFragment(a,this,i);h=e.fragment;if(f=h.childNodes.length===1?h=h.firstChild: h.firstChild){b=b&&c.nodeName(f,"tr");f=0;for(var l=this.length,k=l-1;f<l;f++)d.call(b?c.nodeName(this[f],"table")?this[f].getElementsByTagName("tbody")[0]||this[f].appendChild(this[f].ownerDocument.createElement("tbody")):this[f]:this[f],e.cacheable||l>1&&f<k?c.clone(h,!0,!0):h)}i.length&&c.each(i,Xa)}return this}});c.buildFragment=function(a,b,d){var e,f,h,b=b&&b[0]?b[0].ownerDocument||b[0]:j;if(a.length===1&&typeof a[0]==="string"&&a[0].length<512&&b===j&&a[0].charAt(0)==="<"&&!Ha.test(a[0])&& (c.support.checkClone||!Ia.test(a[0])))f=!0,(h=c.fragments[a[0]])&&h!==1&&(e=h);e||(e=b.createDocumentFragment(),c.clean(a,b,e,d));f&&(c.fragments[a[0]]=h?e:1);return{fragment:e,cacheable:f}};c.fragments={};c.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){c.fn[a]=function(d){var e=[],d=c(d),f=this.length===1&&this[0].parentNode;if(f&&f.nodeType===11&&f.childNodes.length===1&&d.length===1)return d[b](this[0]),this;else{for(var f= 0,h=d.length;f<h;f++){var g=(f>0?this.clone(!0):this).get();c(d[f])[b](g);e=e.concat(g)}return this.pushStack(e,a,d.selector)}}});c.extend({clone:function(a,b,d){var e=a.cloneNode(!0),f,h,g;if((!c.support.noCloneEvent||!c.support.noCloneChecked)&&(a.nodeType===1||a.nodeType===11)&&!c.isXMLDoc(a)){pa(a,e);f=U(a);h=U(e);for(g=0;f[g];++g)pa(f[g],h[g])}if(b&&(oa(a,e),d)){f=U(a);h=U(e);for(g=0;f[g];++g)oa(f[g],h[g])}return e},clean:function(a,b,d,e){b=b||j;typeof b.createElement==="undefined"&&(b=b.ownerDocument|| b[0]&&b[0].ownerDocument||j);for(var f=[],h=0,g;(g=a[h])!=null;h++)if(typeof g==="number"&&(g+=""),g){if(typeof g==="string"&&!rb.test(g))g=b.createTextNode(g);else if(typeof g==="string"){g=g.replace(Fa,"<$1></$2>");var i=(Ga.exec(g)||["",""])[1].toLowerCase(),l=u[i]||u._default,k=l[0],n=b.createElement("div");for(n.innerHTML=l[1]+g+l[2];k--;)n=n.lastChild;if(!c.support.tbody){k=qb.test(g);i=i==="table"&&!k?n.firstChild&&n.firstChild.childNodes:l[1]==="<table>"&&!k?n.childNodes:[];for(l=i.length- 1;l>=0;--l)c.nodeName(i[l],"tbody")&&!i[l].childNodes.length&&i[l].parentNode.removeChild(i[l])}!c.support.leadingWhitespace&&ka.test(g)&&n.insertBefore(b.createTextNode(ka.exec(g)[0]),n.firstChild);g=n.childNodes}g.nodeType?f.push(g):f=c.merge(f,g)}if(d)for(h=0;f[h];h++)e&&c.nodeName(f[h],"script")&&(!f[h].type||f[h].type.toLowerCase()==="text/javascript")?e.push(f[h].parentNode?f[h].parentNode.removeChild(f[h]):f[h]):(f[h].nodeType===1&&f.splice.apply(f,[h+1,0].concat(c.makeArray(f[h].getElementsByTagName("script")))), d.appendChild(f[h]));return f},cleanData:function(a){for(var b,d,e=c.cache,f=c.expando,h=c.event.special,g=c.support.deleteExpando,i=0,l;(l=a[i])!=null;i++)if(!l.nodeName||!c.noData[l.nodeName.toLowerCase()])if(d=l[c.expando]){if((b=e[d]&&e[d][f])&&b.events){for(var k in b.events)h[k]?c.event.remove(l,k):c.removeEvent(l,k,b.handle);if(b.handle)b.handle.elem=null}g?delete l[c.expando]:l.removeAttribute&&l.removeAttribute(c.expando);delete e[d]}}});var Ja=/alpha\([^)]*\)/i,sb=/opacity=([^)]*)/,tb=/-([a-z])/ig, ub=/([A-Z])/g,Ka=/^-?\d+(?:px)?$/i,vb=/^-?\d/,wb={position:"absolute",visibility:"hidden",display:"block"},Ya=["Left","Right"],Za=["Top","Bottom"],G,z,X,xb=function(a,b){return b.toUpperCase()};c.fn.css=function(a,b){if(arguments.length===2&&b===m)return this;return c.access(this,a,b,!0,function(a,b,f){return f!==m?c.style(a,b,f):c.css(a,b)})};c.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=G(a,"opacity","opacity");return c===""?"1":c}else return a.style.opacity}}},cssNumber:{zIndex:!0, fontWeight:!0,opacity:!0,zoom:!0,lineHeight:!0},cssProps:{"float":c.support.cssFloat?"cssFloat":"styleFloat"},style:function(a,b,d,e){if(a&&!(a.nodeType===3||a.nodeType===8||!a.style)){var f,h=c.camelCase(b),g=a.style,i=c.cssHooks[h],b=c.cssProps[h]||h;if(d!==m){if(!(typeof d==="number"&&isNaN(d)||d==null))if(typeof d==="number"&&!c.cssNumber[h]&&(d+="px"),!i||!("set"in i)||(d=i.set(a,d))!==m)try{g[b]=d}catch(l){}}else{if(i&&"get"in i&&(f=i.get(a,!1,e))!==m)return f;return g[b]}}},css:function(a, b,d){var e,f=c.camelCase(b),h=c.cssHooks[f],b=c.cssProps[f]||f;if(h&&"get"in h&&(e=h.get(a,!0,d))!==m)return e;else if(G)return G(a,b,f)},swap:function(a,b,c){var e={},f;for(f in b)e[f]=a.style[f],a.style[f]=b[f];c.call(a);for(f in b)a.style[f]=e[f]},camelCase:function(a){return a.replace(tb,xb)}});c.curCSS=c.css;c.each(["height","width"],function(a,b){c.cssHooks[b]={get:function(a,e,f){var h;if(e){a.offsetWidth!==0?h=qa(a,b,f):c.swap(a,wb,function(){h=qa(a,b,f)});if(h<=0&&(h=G(a,b,b),h==="0px"&& X&&(h=X(a,b,b)),h!=null))return h===""||h==="auto"?"0px":h;if(h<0||h==null)return h=a.style[b],h===""||h==="auto"?"0px":h;return typeof h==="string"?h:h+"px"}},set:function(a,b){if(Ka.test(b)){if(b=parseFloat(b),b>=0)return b+"px"}else return b}}});if(!c.support.opacity)c.cssHooks.opacity={get:function(a,b){return sb.test((b&&a.currentStyle?a.currentStyle.filter:a.style.filter)||"")?parseFloat(RegExp.$1)/100+"":b?"1":""},set:function(a,b){var d=a.style;d.zoom=1;var e=c.isNaN(b)?"":"alpha(opacity="+ b*100+")",f=d.filter||"";d.filter=Ja.test(f)?f.replace(Ja,e):d.filter+" "+e}};j.defaultView&&j.defaultView.getComputedStyle&&(z=function(a,b,d){var e,d=d.replace(ub,"-$1").toLowerCase();if(!(b=a.ownerDocument.defaultView))return m;if(b=b.getComputedStyle(a,null))e=b.getPropertyValue(d),e===""&&!c.contains(a.ownerDocument.documentElement,a)&&(e=c.style(a,d));return e});j.documentElement.currentStyle&&(X=function(a,b){var c,e=a.currentStyle&&a.currentStyle[b],f=a.runtimeStyle&&a.runtimeStyle[b],h=a.style; if(!Ka.test(e)&&vb.test(e)){c=h.left;if(f)a.runtimeStyle.left=a.currentStyle.left;h.left=b==="fontSize"?"1em":e||0;e=h.pixelLeft+"px";h.left=c;if(f)a.runtimeStyle.left=f}return e===""?"auto":e});G=z||X;if(c.expr&&c.expr.filters)c.expr.filters.hidden=function(a){var b=a.offsetHeight;return a.offsetWidth===0&&b===0||!c.support.reliableHiddenOffsets&&(a.style.display||c.css(a,"display"))==="none"},c.expr.filters.visible=function(a){return!c.expr.filters.hidden(a)};var yb=/%20/g,$a=/\[\]$/,La=/\r?\n/g, zb=/#.*$/,Ab=/^(.*?):[ \t]*([^\r\n]*)\r?$/mg,Bb=/^(?:color|date|datetime|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,Cb=/^(?:GET|HEAD)$/,Db=/^\/\//,Ma=/\?/,Eb=/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,Fb=/^(?:select|textarea)/i,sa=/\s+/,Gb=/([?&])_=[^&]*/,Hb=/(^|\-)([a-z])/g,Ib=function(a,b,c){return b+c.toUpperCase()},Na=/^([\w\+\.\-]+:)\/\/([^\/?#:]*)(?::(\d+))?/,Oa=c.fn.load,aa={},Pa={},B,E;try{B=j.location.href}catch(Ob){B=j.createElement("a"),B.href= "",B=B.href}E=Na.exec(B.toLowerCase());c.fn.extend({load:function(a,b,d){if(typeof a!=="string"&&Oa)return Oa.apply(this,arguments);else if(!this.length)return this;var e=a.indexOf(" ");if(e>=0)var f=a.slice(e,a.length),a=a.slice(0,e);e="GET";b&&(c.isFunction(b)?(d=b,b=m):typeof b==="object"&&(b=c.param(b,c.ajaxSettings.traditional),e="POST"));var h=this;c.ajax({url:a,type:e,dataType:"html",data:b,complete:function(a,b,e){e=a.responseText;a.isResolved()&&(a.done(function(a){e=a}),h.html(f?c("<div>").append(e.replace(Eb, "")).find(f):e));d&&h.each(d,[e,b,a])}});return this},serialize:function(){return c.param(this.serializeArray())},serializeArray:function(){return this.map(function(){return this.elements?c.makeArray(this.elements):this}).filter(function(){return this.name&&!this.disabled&&(this.checked||Fb.test(this.nodeName)||Bb.test(this.type))}).map(function(a,b){var d=c(this).val();return d==null?null:c.isArray(d)?c.map(d,function(a){return{name:b.name,value:a.replace(La,"\r\n")}}):{name:b.name,value:d.replace(La, "\r\n")}}).get()}});c.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "),function(a,b){c.fn[b]=function(a){return this.bind(b,a)}});c.each(["get","post"],function(a,b){c[b]=function(a,e,f,h){c.isFunction(e)&&(h=h||f,f=e,e=m);return c.ajax({type:b,url:a,data:e,success:f,dataType:h})}});c.extend({getScript:function(a,b){return c.get(a,m,b,"script")},getJSON:function(a,b,d){return c.get(a,b,d,"json")},ajaxSetup:function(a,b){b?c.extend(!0,a,c.ajaxSettings,b):(b=a,a=c.extend(!0, c.ajaxSettings,b));for(var d in{context:1,url:1})d in b?a[d]=b[d]:d in c.ajaxSettings&&(a[d]=c.ajaxSettings[d]);return a},ajaxSettings:{url:B,isLocal:/(?:^file|^widget|\-extension):$/.test(E[1]),global:!0,type:"GET",contentType:"application/x-www-form-urlencoded",processData:!0,async:!0,accepts:{xml:"application/xml, text/xml",html:"text/html",text:"text/plain",json:"application/json, text/javascript","*":"*/*"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText"}, converters:{"* text":q.String,"text html":!0,"text json":c.parseJSON,"text xml":c.parseXML}},ajaxPrefilter:ra(aa),ajaxTransport:ra(Pa),ajax:function(a,b){function d(a,b,d,j){if(t!==2){t=2;s&&clearTimeout(s);p=m;q=j||"";o.readyState=a?4:0;var n,v,w;if(d){var j=e,z=o,y=j.contents,r=j.dataTypes,B=j.responseFields,A,x,I,E;for(x in B)x in d&&(z[B[x]]=d[x]);for(;r[0]==="*";)r.shift(),A===m&&(A=j.mimeType||z.getResponseHeader("content-type"));if(A)for(x in y)if(y[x]&&y[x].test(A)){r.unshift(x);break}if(r[0]in d)I=r[0];else{for(x in d){if(!r[0]||j.converters[x+" "+r[0]]){I=x;break}E||(E=x)}I=I||E}I?(I!==r[0]&&r.unshift(I),d=d[I]):d=void 0}else d=m;if(a>=200&&a<300||a===304){if(e.ifModified){if(A=o.getResponseHeader("Last-Modified"))c.lastModified[k]=A;if(A=o.getResponseHeader("Etag"))c.etag[k]=A}if(a===304)b="notmodified",n=!0;else try{A=e;A.dataFilter&&(d=A.dataFilter(d,A.dataType));var F=A.dataTypes;x={};var C,D,M=F.length,G,J=F[0],Q,H,K,N,R;for(C=1;C<M;C++){if(C===1)for(D in A.converters)typeof D=== "string"&&(x[D.toLowerCase()]=A.converters[D]);Q=J;J=F[C];if(J==="*")J=Q;else if(Q!=="*"&&Q!==J){H=Q+" "+J;K=x[H]||x["* "+J];if(!K)for(N in R=m,x)if(G=N.split(" "),G[0]===Q||G[0]==="*")if(R=x[G[1]+" "+J]){N=x[N];N===!0?K=R:R===!0&&(K=N);break}!K&&!R&&c.error("No conversion from "+H.replace(" "," to "));K!==!0&&(d=K?K(d):R(N(d)))}}v=d;b="success";n=!0}catch(O){b="parsererror",w=O}}else if(w=b,!b||a)b="error",a<0&&(a=0);o.status=a;o.statusText=b;n?g.resolveWith(f,[v,b,o]):g.rejectWith(f,[o,b,w]);o.statusCode(l); l=m;u&&h.trigger("ajax"+(n?"Success":"Error"),[o,e,n?v:w]);i.resolveWith(f,[o,b]);u&&(h.trigger("ajaxComplete",[o,e]),--c.active||c.event.trigger("ajaxStop"))}}typeof a==="object"&&(b=a,a=m);var b=b||{},e=c.ajaxSetup({},b),f=e.context||e,h=f!==e&&(f.nodeType||f instanceof c)?c(f):c.event,g=c.Deferred(),i=c._Deferred(),l=e.statusCode||{},k,j={},q,v,p,s,w,t=0,u,z,o={readyState:0,setRequestHeader:function(a,b){t||(j[a.toLowerCase().replace(Hb,Ib)]=b);return this},getAllResponseHeaders:function(){return t=== 2?q:null},getResponseHeader:function(a){var b;if(t===2){if(!v)for(v={};b=Ab.exec(q);)v[b[1].toLowerCase()]=b[2];b=v[a.toLowerCase()]}return b===m?null:b},overrideMimeType:function(a){if(!t)e.mimeType=a;return this},abort:function(a){a=a||"abort";p&&p.abort(a);d(0,a);return this}};g.promise(o);o.success=o.done;o.error=o.fail;o.complete=i.done;o.statusCode=function(a){if(a){var b;if(t<2)for(b in a)l[b]=[l[b],a[b]];else b=a[o.status],o.then(b,b)}return this};e.url=((a||e.url)+"").replace(zb,"").replace(Db, E[1]+"//");e.dataTypes=c.trim(e.dataType||"*").toLowerCase().split(sa);if(!e.crossDomain)w=Na.exec(e.url.toLowerCase()),e.crossDomain=!(!w||!(w[1]!=E[1]||w[2]!=E[2]||(w[3]||(w[1]==="http:"?80:443))!=(E[3]||(E[1]==="http:"?80:443))));if(e.data&&e.processData&&typeof e.data!=="string")e.data=c.param(e.data,e.traditional);V(aa,e,b,o);if(t===2)return!1;u=e.global;e.type=e.type.toUpperCase();e.hasContent=!Cb.test(e.type);u&&c.active++===0&&c.event.trigger("ajaxStart");if(!e.hasContent&&(e.data&&(e.url+= (Ma.test(e.url)?"&":"?")+e.data),k=e.url,e.cache===!1)){w=c.now();var y=e.url.replace(Gb,"$1_="+w);e.url=y+(y===e.url?(Ma.test(e.url)?"&":"?")+"_="+w:"")}if(e.data&&e.hasContent&&e.contentType!==!1||b.contentType)j["Content-Type"]=e.contentType;e.ifModified&&(k=k||e.url,c.lastModified[k]&&(j["If-Modified-Since"]=c.lastModified[k]),c.etag[k]&&(j["If-None-Match"]=c.etag[k]));j.Accept=e.dataTypes[0]&&e.accepts[e.dataTypes[0]]?e.accepts[e.dataTypes[0]]+(e.dataTypes[0]!=="*"?", */*; q=0.01":""):e.accepts["*"]; for(z in e.headers)o.setRequestHeader(z,e.headers[z]);if(e.beforeSend&&(e.beforeSend.call(f,o,e)===!1||t===2))return o.abort(),!1;for(z in{success:1,error:1,complete:1})o[z](e[z]);if(p=V(Pa,e,b,o)){o.readyState=1;u&&h.trigger("ajaxSend",[o,e]);e.async&&e.timeout>0&&(s=setTimeout(function(){o.abort("timeout")},e.timeout));try{t=1,p.send(j,d)}catch(B){status<2?d(-1,B):c.error(B)}}else d(-1,"No Transport");return o},param:function(a,b){var d=[],e=function(a,b){b=c.isFunction(b)?b():b;d[d.length]=encodeURIComponent(a)+ "="+encodeURIComponent(b)};if(b===m)b=c.ajaxSettings.traditional;if(c.isArray(a)||a.jquery&&!c.isPlainObject(a))c.each(a,function(){e(this.name,this.value)});else for(var f in a)ba(f,a[f],b,e);return d.join("&").replace(yb,"+")}});c.extend({active:0,lastModified:{},etag:{}});var Jb=c.now(),Y=/(\=)\?(&|$)|()\?\?()/i;c.ajaxSetup({jsonp:"callback",jsonpCallback:function(){return c.expando+"_"+Jb++}});c.ajaxPrefilter("json jsonp",function(a,b,d){var e=typeof a.data==="string";if(a.dataTypes[0]==="jsonp"|| b.jsonpCallback||b.jsonp!=null||a.jsonp!==!1&&(Y.test(a.url)||e&&Y.test(a.data))){var f,h=a.jsonpCallback=c.isFunction(a.jsonpCallback)?a.jsonpCallback():a.jsonpCallback,g=q[h],b=a.url,i=a.data,l="$1"+h+"$2",k=function(){q[h]=g;if(f&&c.isFunction(g))q[h](f[0])};a.jsonp!==!1&&(b=b.replace(Y,l),a.url===b&&(e&&(i=i.replace(Y,l)),a.data===i&&(b+=(/\?/.test(b)?"&":"?")+a.jsonp+"="+h)));a.url=b;a.data=i;q[h]=function(a){f=[a]};d.then(k,k);a.converters["script json"]=function(){f||c.error(h+" was not called"); return f[0]};a.dataTypes[0]="json";return"script"}});c.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/javascript|ecmascript/},converters:{"text script":function(a){c.globalEval(a);return a}}});c.ajaxPrefilter("script",function(a){if(a.cache===m)a.cache=!1;if(a.crossDomain)a.type="GET",a.global=!1});c.ajaxTransport("script",function(a){if(a.crossDomain){var b,c=j.head||j.getElementsByTagName("head")[0]||j.documentElement; return{send:function(e,f){b=j.createElement("script");b.async="async";if(a.scriptCharset)b.charset=a.scriptCharset;b.src=a.url;b.onload=b.onreadystatechange=function(a,e){if(!b.readyState||/loaded|complete/.test(b.readyState))b.onload=b.onreadystatechange=null,c&&b.parentNode&&c.removeChild(b),b=m,e||f(200,"success")};c.insertBefore(b,c.firstChild)},abort:function(){if(b)b.onload(0,1)}}}});var Kb=c.now(),C;c.ajaxSettings.xhr=q.ActiveXObject?function(){var a;if(!(a=!this.isLocal&&ta()))a:{try{a=new q.ActiveXObject("Microsoft.XMLHTTP"); break a}catch(b){}a=void 0}return a}:ta;z=c.ajaxSettings.xhr();c.support.ajax=!!z;c.support.cors=z&&"withCredentials"in z;z=m;c.support.ajax&&c.ajaxTransport(function(a){if(!a.crossDomain||c.support.cors){var b;return{send:function(d,e){var f=a.xhr(),h,g;a.username?f.open(a.type,a.url,a.async,a.username,a.password):f.open(a.type,a.url,a.async);if(a.xhrFields)for(g in a.xhrFields)f[g]=a.xhrFields[g];a.mimeType&&f.overrideMimeType&&f.overrideMimeType(a.mimeType);if((!a.crossDomain||a.hasContent)&&!d["X-Requested-With"])d["X-Requested-With"]= "XMLHttpRequest";try{for(g in d)f.setRequestHeader(g,d[g])}catch(i){}f.send(a.hasContent&&a.data||null);b=function(d,g){var i,j,q,p,s;try{if(b&&(g||f.readyState===4)){b=m;if(h)f.onreadystatechange=c.noop,delete C[h];if(g)f.readyState!==4&&f.abort();else{i=f.status;q=f.getAllResponseHeaders();p={};if((s=f.responseXML)&&s.documentElement)p.xml=s;p.text=f.responseText;try{j=f.statusText}catch(w){j=""}!i&&a.isLocal&&!a.crossDomain?i=p.text?200:404:i===1223&&(i=204)}}}catch(t){g||e(-1,t)}p&&e(i,j,p,q)}; !a.async||f.readyState===4?b():(C||(C={},ab()),h=Kb++,f.onreadystatechange=C[h]=b)},abort:function(){b&&b(0,1)}}}});var ca={},Lb=/^(?:toggle|show|hide)$/,Mb=/^([+\-]=)?([\d+.\-]+)([a-z%]*)$/i,Z,ua=[["height","marginTop","marginBottom","paddingTop","paddingBottom"],["width","marginLeft","marginRight","paddingLeft","paddingRight"],["opacity"]];c.fn.extend({show:function(a,b,d){if(a||a===0)return this.animate(D("show",3),a,b,d);else{for(var d=0,e=this.length;d<e;d++){a=this[d];b=a.style.display;if(!c._data(a, "olddisplay")&&b==="none")b=a.style.display="";b===""&&c.css(a,"display")==="none"&&c._data(a,"olddisplay",va(a.nodeName))}for(d=0;d<e;d++)if(a=this[d],b=a.style.display,b===""||b==="none")a.style.display=c._data(a,"olddisplay")||"";return this}},hide:function(a,b,d){if(a||a===0)return this.animate(D("hide",3),a,b,d);else{a=0;for(b=this.length;a<b;a++)d=c.css(this[a],"display"),d!=="none"&&!c._data(this[a],"olddisplay")&&c._data(this[a],"olddisplay",d);for(a=0;a<b;a++)this[a].style.display="none"; return this}},_toggle:c.fn.toggle,toggle:function(a,b,d){var e=typeof a==="boolean";c.isFunction(a)&&c.isFunction(b)?this._toggle.apply(this,arguments):a==null||e?this.each(function(){var b=e?a:c(this).is(":hidden");c(this)[b?"show":"hide"]()}):this.animate(D("toggle",3),a,b,d);return this},fadeTo:function(a,b,c,e){return this.filter(":hidden").css("opacity",0).show().end().animate({opacity:b},a,c,e)},animate:function(a,b,d,e){var f=c.speed(b,d,e);if(c.isEmptyObject(a))return this.each(f.complete); return this[f.queue===!1?"each":"queue"](function(){var b=c.extend({},f),d,e=this.nodeType===1,l=e&&c(this).is(":hidden"),k=this;for(d in a){var j=c.camelCase(d);d!==j&&(a[j]=a[d],delete a[d],d=j);if(a[d]==="hide"&&l||a[d]==="show"&&!l)return b.complete.call(this);if(e&&(d==="height"||d==="width"))if(b.overflow=[this.style.overflow,this.style.overflowX,this.style.overflowY],c.css(this,"display")==="inline"&&c.css(this,"float")==="none")c.support.inlineBlockNeedsLayout?va(this.nodeName)==="inline"? this.style.display="inline-block":(this.style.display="inline",this.style.zoom=1):this.style.display="inline-block";if(c.isArray(a[d]))(b.specialEasing=b.specialEasing||{})[d]=a[d][1],a[d]=a[d][0]}if(b.overflow!=null)this.style.overflow="hidden";b.curAnim=c.extend({},a);c.each(a,function(d,e){var f=new c.fx(k,b,d);if(Lb.test(e))f[e==="toggle"?l?"show":"hide":e](a);else{var g=Mb.exec(e),i=f.cur();if(g){var j=parseFloat(g[2]),m=g[3]||(c.cssNumber[d]?"":"px");m!=="px"&&(c.style(k,d,(j||1)+m),i*=(j|| 1)/f.cur(),c.style(k,d,i+m));g[1]&&(j=(g[1]==="-="?-1:1)*j+i);f.custom(i,j,m)}else f.custom(i,e,"")}});return!0})},stop:function(a,b){var d=c.timers;a&&this.queue([]);this.each(function(){for(var a=d.length-1;a>=0;a--)if(d[a].elem===this){if(b)d[a](!0);d.splice(a,1)}});b||this.dequeue();return this}});c.each({slideDown:D("show",1),slideUp:D("hide",1),slideToggle:D("toggle",1),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){c.fn[a]=function(a,c,f){return this.animate(b, a,c,f)}});c.extend({speed:function(a,b,d){var e=a&&typeof a==="object"?c.extend({},a):{complete:d||!d&&b||c.isFunction(a)&&a,duration:a,easing:d&&b||b&&!c.isFunction(b)&&b};e.duration=c.fx.off?0:typeof e.duration==="number"?e.duration:e.duration in c.fx.speeds?c.fx.speeds[e.duration]:c.fx.speeds._default;e.old=e.complete;e.complete=function(){e.queue!==!1&&c(this).dequeue();c.isFunction(e.old)&&e.old.call(this)};return e},easing:{linear:function(a,b,c,e){return c+e*a},swing:function(a,b,c,e){return(-Math.cos(a* Math.PI)/2+0.5)*e+c}},timers:[],fx:function(a,b,c){this.options=b;this.elem=a;this.prop=c;if(!b.orig)b.orig={}}});c.fx.prototype={update:function(){this.options.step&&this.options.step.call(this.elem,this.now,this);(c.fx.step[this.prop]||c.fx.step._default)(this)},cur:function(){if(this.elem[this.prop]!=null&&(!this.elem.style||this.elem.style[this.prop]==null))return this.elem[this.prop];var a,b=c.css(this.elem,this.prop);return isNaN(a=parseFloat(b))?!b||b==="auto"?0:b:a},custom:function(a,b,d){function e(a){return f.step(a)} var f=this,h=c.fx;this.startTime=c.now();this.start=a;this.end=b;this.unit=d||this.unit||(c.cssNumber[this.prop]?"":"px");this.now=this.start;this.pos=this.state=0;e.elem=this.elem;e()&&c.timers.push(e)&&!Z&&(Z=setInterval(h.tick,h.interval))},show:function(){this.options.orig[this.prop]=c.style(this.elem,this.prop);this.options.show=!0;this.custom(this.prop==="width"||this.prop==="height"?1:0,this.cur());c(this.elem).show()},hide:function(){this.options.orig[this.prop]=c.style(this.elem,this.prop); this.options.hide=!0;this.custom(this.cur(),0)},step:function(a){var b=c.now(),d=!0;if(a||b>=this.options.duration+this.startTime){this.now=this.end;this.pos=this.state=1;this.update();this.options.curAnim[this.prop]=!0;for(var e in this.options.curAnim)this.options.curAnim[e]!==!0&&(d=!1);if(d){if(this.options.overflow!=null&&!c.support.shrinkWrapBlocks){var f=this.elem,h=this.options;c.each(["","X","Y"],function(a,b){f.style["overflow"+b]=h.overflow[a]})}this.options.hide&&c(this.elem).hide();if(this.options.hide|| this.options.show)for(var g in this.options.curAnim)c.style(this.elem,g,this.options.orig[g]);this.options.complete.call(this.elem)}return!1}else a=b-this.startTime,this.state=a/this.options.duration,b=this.options.easing||(c.easing.swing?"swing":"linear"),this.pos=c.easing[this.options.specialEasing&&this.options.specialEasing[this.prop]||b](this.state,a,0,1,this.options.duration),this.now=this.start+(this.end-this.start)*this.pos,this.update();return!0}};c.extend(c.fx,{tick:function(){for(var a= c.timers,b=0;b<a.length;b++)a[b]()||a.splice(b--,1);a.length||c.fx.stop()},interval:13,stop:function(){clearInterval(Z);Z=null},speeds:{slow:600,fast:200,_default:400},step:{opacity:function(a){c.style(a.elem,"opacity",a.now)},_default:function(a){a.elem.style&&a.elem.style[a.prop]!=null?a.elem.style[a.prop]=(a.prop==="width"||a.prop==="height"?Math.max(0,a.now):a.now)+a.unit:a.elem[a.prop]=a.now}}});if(c.expr&&c.expr.filters)c.expr.filters.animated=function(a){return c.grep(c.timers,function(b){return a=== b.elem}).length};var Nb=/^t(?:able|d|h)$/i,Qa=/^(?:body|html)$/i;c.fn.offset="getBoundingClientRect"in j.documentElement?function(a){var b=this[0],d;if(a)return this.each(function(b){c.offset.setOffset(this,a,b)});if(!b||!b.ownerDocument)return null;if(b===b.ownerDocument.body)return c.offset.bodyOffset(b);try{d=b.getBoundingClientRect()}catch(e){}var f=b.ownerDocument,h=f.documentElement;if(!d||!c.contains(h,b))return d?{top:d.top,left:d.left}:{top:0,left:0};b=f.body;f=da(f);return{top:d.top+(f.pageYOffset|| c.support.boxModel&&h.scrollTop||b.scrollTop)-(h.clientTop||b.clientTop||0),left:d.left+(f.pageXOffset||c.support.boxModel&&h.scrollLeft||b.scrollLeft)-(h.clientLeft||b.clientLeft||0)}}:function(a){var b=this[0];if(a)return this.each(function(b){c.offset.setOffset(this,a,b)});if(!b||!b.ownerDocument)return null;if(b===b.ownerDocument.body)return c.offset.bodyOffset(b);c.offset.initialize();var d,e=b.offsetParent,f=b.ownerDocument,h=f.documentElement,g=f.body;d=(f=f.defaultView)?f.getComputedStyle(b, null):b.currentStyle;for(var i=b.offsetTop,j=b.offsetLeft;(b=b.parentNode)&&b!==g&&b!==h;){if(c.offset.supportsFixedPosition&&d.position==="fixed")break;d=f?f.getComputedStyle(b,null):b.currentStyle;i-=b.scrollTop;j-=b.scrollLeft;if(b===e){i+=b.offsetTop;j+=b.offsetLeft;if(c.offset.doesNotAddBorder&&(!c.offset.doesAddBorderForTableAndCells||!Nb.test(b.nodeName)))i+=parseFloat(d.borderTopWidth)||0,j+=parseFloat(d.borderLeftWidth)||0;e=b.offsetParent}c.offset.subtractsBorderForOverflowNotVisible&&d.overflow!== "visible"&&(i+=parseFloat(d.borderTopWidth)||0,j+=parseFloat(d.borderLeftWidth)||0)}if(d.position==="relative"||d.position==="static")i+=g.offsetTop,j+=g.offsetLeft;c.offset.supportsFixedPosition&&d.position==="fixed"&&(i+=Math.max(h.scrollTop,g.scrollTop),j+=Math.max(h.scrollLeft,g.scrollLeft));return{top:i,left:j}};c.offset={initialize:function(){var a=j.body,b=j.createElement("div"),d,e,f,h=parseFloat(c.css(a,"marginTop"))||0;c.extend(b.style,{position:"absolute",top:0,left:0,margin:0,border:0, width:"1px",height:"1px",visibility:"hidden"});b.innerHTML="<div style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;'><div></div></div><table style='position:absolute;top:0;left:0;margin:0;border:5px solid #000;padding:0;width:1px;height:1px;' cellpadding='0' cellspacing='0'><tr><td></td></tr></table>";a.insertBefore(b,a.firstChild);d=b.firstChild;e=d.firstChild;f=d.nextSibling.firstChild.firstChild;this.doesNotAddBorder=e.offsetTop!==5;this.doesAddBorderForTableAndCells= f.offsetTop===5;e.style.position="fixed";e.style.top="20px";this.supportsFixedPosition=e.offsetTop===20||e.offsetTop===15;e.style.position=e.style.top="";d.style.overflow="hidden";d.style.position="relative";this.subtractsBorderForOverflowNotVisible=e.offsetTop===-5;this.doesNotIncludeMarginInBodyOffset=a.offsetTop!==h;a.removeChild(b);c.offset.initialize=c.noop},bodyOffset:function(a){var b=a.offsetTop,d=a.offsetLeft;c.offset.initialize();c.offset.doesNotIncludeMarginInBodyOffset&&(b+=parseFloat(c.css(a, "marginTop"))||0,d+=parseFloat(c.css(a,"marginLeft"))||0);return{top:b,left:d}},setOffset:function(a,b,d){var e=c.css(a,"position");if(e==="static")a.style.position="relative";var f=c(a),h=f.offset(),g=c.css(a,"top"),i=c.css(a,"left"),j=e==="absolute"&&c.inArray("auto",[g,i])>-1,e={},k={};j&&(k=f.position());g=j?k.top:parseInt(g,10)||0;i=j?k.left:parseInt(i,10)||0;c.isFunction(b)&&(b=b.call(a,d,h));if(b.top!=null)e.top=b.top-h.top+g;if(b.left!=null)e.left=b.left-h.left+i;"using"in b?b.using.call(a, e):f.css(e)}};c.fn.extend({position:function(){if(!this[0])return null;var a=this[0],b=this.offsetParent(),d=this.offset(),e=Qa.test(b[0].nodeName)?{top:0,left:0}:b.offset();d.top-=parseFloat(c.css(a,"marginTop"))||0;d.left-=parseFloat(c.css(a,"marginLeft"))||0;e.top+=parseFloat(c.css(b[0],"borderTopWidth"))||0;e.left+=parseFloat(c.css(b[0],"borderLeftWidth"))||0;return{top:d.top-e.top,left:d.left-e.left}},offsetParent:function(){return this.map(function(){for(var a=this.offsetParent||j.body;a&&!Qa.test(a.nodeName)&& c.css(a,"position")==="static";)a=a.offsetParent;return a})}});c.each(["Left","Top"],function(a,b){var d="scroll"+b;c.fn[d]=function(b){var f=this[0],h;if(!f)return null;return b!==m?this.each(function(){(h=da(this))?h.scrollTo(!a?b:c(h).scrollLeft(),a?b:c(h).scrollTop()):this[d]=b}):(h=da(f))?"pageXOffset"in h?h[a?"pageYOffset":"pageXOffset"]:c.support.boxModel&&h.document.documentElement[d]||h.document.body[d]:f[d]}});c.each(["Height","Width"],function(a,b){var d=b.toLowerCase();c.fn["inner"+b]= function(){return this[0]?parseFloat(c.css(this[0],d,"padding")):null};c.fn["outer"+b]=function(a){return this[0]?parseFloat(c.css(this[0],d,a?"margin":"border")):null};c.fn[d]=function(a){var f=this[0];if(!f)return a==null?null:this;if(c.isFunction(a))return this.each(function(b){var f=c(this);f[d](a.call(this,b,f[d]()))});if(c.isWindow(f)){var h=f.document.documentElement["client"+b];return f.document.compatMode==="CSS1Compat"&&h||f.document.body["client"+b]||h}else return f.nodeType===9?Math.max(f.documentElement["client"+ b],f.body["scroll"+b],f.documentElement["scroll"+b],f.body["offset"+b],f.documentElement["offset"+b]):a===m?(f=c.css(f,d),h=parseFloat(f),c.isNaN(h)?f:h):this.css(d,typeof a==="string"?a:a+"px")}});q.jQuery=q.$=c})(window);



var BBCodes={target:null,ajax_unit_url:null,ajax_building_url:null,init:function(options){BBCodes.target=$(options.target);BBCodes.ajax_unit_url=options.ajax_unit_url;BBCodes.ajax_building_url=options.ajax_building_url},insert:function(start_tag,end_tag,force_place_outside){var input=BBCodes.target[0];input.focus();if(typeof document.selection!='undefined'){var range=document.selection.createRange(),ins_text=range.text;range.text=start_tag+ins_text+end_tag;range=document.selection.createRange();if(ins_text.length>0||true==force_place_outside){range.moveStart('character',start_tag.length+ins_text.length+end_tag.length)}else range.move('character',-end_tag.length);range.select()}else if(typeof input.selectionStart!='undefined'){var start=input.selectionStart,end=input.selectionEnd,ins_text=input.value.substring(start,end),scroll_pos=input.scrollTop;input.value=input.value.substr(0,start)+start_tag+ins_text+end_tag+input.value.substr(end);var pos;if(ins_text.length>0||true===force_place_outside){pos=start+start_tag.length+ins_text.length+end_tag.length}else pos=start+start_tag.length;input.setSelectionRange(start+start_tag.length,end+start_tag.length);input.scrollTop=scroll_pos};return false},colorPickerToggle:function(assign){var inp=$('#bb_color_picker_tx').first();inp.unbind('keyup').keyup(function(){var inp=$('#bb_color_picker_tx').first(),g=$('#bb_color_picker_preview').first();try{g.css('color',inp.val())}catch(e){}});if(assign){BBCodes.insert('[color='+$(inp).val()+']','[/color]');$('#bb_color_picker').toggle();return false};var colors=[$('#bb_color_picker_c0').first(),$('#bb_color_picker_c1').first(),$('#bb_color_picker_c2').first(),$('#bb_color_picker_c3').first(),$('#bb_color_picker_c4').first(),$('#bb_color_picker_c5').first()];colors[0].data('rgb',[255,0,0]);colors[1].data('rgb',[255,255,0]);colors[2].data('rgb',[0,255,0]);colors[3].data('rgb',[0,255,255]);colors[4].data('rgb',[0,0,255]);colors[5].data('rgb',[255,0,255]);for(var i=0;i<=5;i++)colors[i].unbind('click').click(function(){BBCodes.colorPickColor($(this).data('rgb'))});BBCodes.colorPickColor(colors[0].data('rgb'));$('#bb_color_picker').toggle();return false},colorPickColor:function(col){for(var l=0;l<6;l++)for(var h=1;h<6;h++){var cell=$('#bb_color_picker_'+h+l).first();if(!cell)alert('bb_color_picker_'+h+l);var ll=l/3.0,hh=h/4.5;hh=Math.pow(hh,0.5);var light=Math.max(0,255*ll-255),r=Math.floor(Math.max(0,Math.min(255,(col[0]*ll*hh+255*(1-hh))+light))),g=Math.floor(Math.max(0,Math.min(255,(col[1]*ll*hh+255*(1-hh))+light))),b=Math.floor(Math.max(0,Math.min(255,(col[2]*ll*hh+255*(1-hh))+light)));cell.css('background-color','rgb('+r+','+g+','+b+')');cell.data('rgb',[r,g,b]);cell.unbind('click').click(function(){BBCodes.colorSetColor($(this).data('rgb'))})}},colorSetColor:function(color){var g=$('#bb_color_picker_preview').first(),inp=$('#bb_color_picker_tx').first();g.css('color','rgb('+color[0]+','+color[1]+','+color[2]+')');var rr=color[0].toString(16),gg=color[1].toString(16),bb=color[2].toString(16);rr=rr.length<2?'0'+rr:rr;gg=gg.length<2?'0'+gg:gg;bb=bb.length<2?'0'+bb:bb;inp.val('#'+rr+gg+bb)},placePopcusto:function(){var sizeButton=$('#bb_button_size > span'),colorButton=$('#bb_button_color > span'),sizePopup=$('#bb_sizes'),colorPopup=$('#bb_color_picker'),window_width=$(document).width();if(!window_width)window_width=document.body.clientWidth;if(sizeButton.length>0)sizePopup.offset({left:sizeButton.offset().left,top:sizeButton.offset().top+sizeButton.height()+2});if(colorButton.length>0){var x=colorButton.offset().left+colorButton.width()-colorPopup.width();if(/MSIE 7/.test(navigator.userAgent))x=x-200;colorPopup.offset({left:x,top:colorButton.offset().top+colorButton.height()+2})}},closePopcusto:function(){$('#bb_sizes').hide();$('#bb_color_picker').hide()},setTarget:function(target){BBCodes.target=target},ajaxPopupToggle:function(event,popupId,url){var picker=$('#'+popupId);if(picker&&picker.is(':visible')){picker.hide()}else UI.AjaxPopup(event,popupId,url,'ZamknÄ�Ä�',null,null,200)},unitPickerToggle:function(event){BBCodes.ajaxPopupToggle(event,'unit_picker',BBCodes.ajax_unit_url)},buildingPickerToggle:function(event){BBCodes.ajaxPopupToggle(event,'building_picker',BBCodes.ajax_building_url)}}

