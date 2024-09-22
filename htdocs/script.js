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
		mx = e.clientX;
		my = e.clientY;
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

/** 
 * Title-Tag setzen
 */
function setImageTitles() {
	//var imgs = fetch_tags(document, 'img');
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

/**
 * Im Adelshof für alle Dörfer Nichts/Maximum auswählen
 */
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

function map_popup(title, points, owner, ally, village_groups, bonus_img ,bonus_text) {
	map_move();
	
	setText(gid("info_title"), title);
	setText(gid("info_points"), points);
	if(owner != null) {
		setText(gid("info_owner"), owner);
		gid("info_owner_row").style.display = '';
		gid("info_left_row").style.display = 'none';
	}
	else {
		gid("info_owner_row").style.display = 'none';
		gid("info_left_row").style.display = '';
	}
	
	if(ally != null) {
		gid("info_ally_row").style.display = '';
		setText(gid("info_ally"), ally);
	}
	else {
		gid("info_ally_row").style.display = 'none';
	}
	
	if (bonus_img != null) {
		setText(gid("image_disp"), bonus_img);
		}
		
	if (bonus_text != null) {
		setText(gid("text_disp"), bonus_text);
		} else {
		gid("text_disp_row").style.display = 'none';
		}
	
	if(village_groups) {
		gid("info_village_groups_row").style.display = '';
		setText(gid("info_village_groups"), village_groups);
	} else {
		gid("info_village_groups_row").style.display = 'none';
	}

	var info = gid("info");
	info.style.visibility = "visible";
}

function map_kill() {
	var info = document.getElementById("info");
	info.style.visibility = "hidden";
}

function map_move() {
	var info = document.getElementById("info");
	if(window.pageYOffset)
		scrollY = window.pageYOffset;
	else
		scrollY = document.body.scrollTop;
	
	info.style.left = mx + 5 + "px";
	info.style.top = my - 100 + scrollY + "px";
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
		//tile.className = v.className;
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
	// Koordinaten auslesen
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

function selectVillage(id) {
	var href = opener.location.href;
	if(href.search(/village=\d*/) != -1) 
		href = href.replace(/village=\d*/, 'village='+id);
	else
		href += '&village='+id;
	href.replace(/action=\w*/, '');
	opener.location.href = href;
	window.close();
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

function selectGroup(group) {
	var href = location.href;
	if(href.search(/group=\d*/) != -1) 
		href = href.replace(/group=\d*/, 'group='+group);
	else
		href += '&group='+group;
	href.replace(/action=\w*/, '');
	location.href = href;
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

/**
 * @param edit ID des anzuzeigenden Edit-Elements
 * @param label ID des zu versteckenden Label-Elements
 */
function editToggle(label, edit) {
	gid(edit).style.display = '';
	gid(label).style.display = 'none';
}

function urlEncode(string) {
	return encodeURIComponent(string);
}

/**
 * 
 */
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

function $(id) {
    return document.getElementById(id);
}

function switchDisplay(name) {
    var o = $(name);
    o.style.display = (o.style.display == 'none' ? '' : 'none');
}

function insertNumId(name, num) {
    elem = $(name);
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

    $('select_count_1').innerHTML = sum;
    $('select_count_2').innerHTML = sum;

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
	$('select_all_1').innerHTML=text;
	max=max?false:true;
	countCoins();
	}