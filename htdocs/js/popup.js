function inlinePopupClose(){if($('#inline_popup')!==null)$('#inline_popup').hide()}
function inlinePopupReload(name,url,options){$.ajax({url:url,cache:false,onRequest:function(){if(options.empty_errors)$('#error').empty();$('#inline_popup_content').empty();$('#inline_popup_content').append($("<img>").attr('src',image_base+'/throbber.gif').attr('alt','Loading...'))},success:function(reponseText){$('#inline_popup_content').empty();$('#inline_popup_content').html(reponseText)}})}
function inlinePopup(event,name,url,options,text){var mx,my;if(event){mx=event.clientX;my=event.clientY}else{mx=window.event.clientX;my=window.event.clientY};var popup=$('#inline_popup'),doc=$(document),constraints={min:{x:0,y:60},max:{x:doc.width()-options.offset_x,y:doc.height()-options.offset_y}},pos={x:mx+options.offset_x,y:my+options.offset_y};pos.x=(pos.x<constraints.min.x)?constraints.min.x:pos.x;pos.x=(pos.x>constraints.max.x)?constraints.max.x:pos.x;pos.y=(pos.y<constraints.min.y)?constraints.min.y:pos.y;pos.y=(pos.y>constraints.max.y)?constraints.max.y:pos.y;if(typeof mobile!=="undefined"&&mobile){pos.x=0;pos.y=doc.scrollTop();popup.css('width','100%');popup.css('border-left','0px');popup.css('border-right','0px')};popup.css('display','block');popup.css('left',pos.x+'px');popup.css('top',pos.y+'px');if(url){inlinePopupReload(name,url,options)}else if(text){$('#inline_popup_content').html(text);$('#inline_popup').show()};return false}
/**** game/UI.js ****/
/*5cbb19fe8dc2372ce13118365df9791a*/
var UI={Throbber:$('<img alt="Wczytywanie..." title="Wczytywanie..." />').attr("src","/ds_graphic/throbber.gif"),init:function(){},ToolTip:function(el,UserOptions){var defaults={showURL:false,track:true,fade:100,delay:50,showBody:' :: '};$(el).tooltip($.extend(defaults,UserOptions))},DatePicker:function(el,UserOptions){var defaults={showButtonPanel:true,dateFormat:'yy-mm-dd',showAnim:'fold',showOtherMonths:true,selectOtherMonths:true};$(el).datepicker($.extend(defaults,UserOptions))},Draggable:function(el,UserOptions){var defaults={savepos:true,cursor:'move',handle:$(el).find("div:first"),appendTo:'body',containment:[0,60]},options=$.extend(defaults,UserOptions);$(el).draggable(options);if(options.savepos)$(el).bind('dragstop',function(event,ui){var doc=$(document),x=$(el).offset().left-doc.scrollLeft(),y=$(el).offset().top-doc.scrollTop();$.cookie('popup_pos_'+$(el).attr('id'),x+'x'+y)})},Sortable:function(el,UserOptions){var defaults={cursor:'move',handle:$(el).find("div:first"),opacity:0.6,helper:function(e,ui){ui.children().each(function(){$(this).width($(this).width())});return ui}};$(el).sortable($.extend(defaults,UserOptions))},ErrorMessage:function(message,fade_out_time){return UI.InfoMessage(message,fade_out_time,'error')},SuccessMessage:function(message,fade_out_time){return UI.InfoMessage(message,fade_out_time,'success')},InfoMessage:function(message,fade_out_time,additional_class){fade_out_time=fade_out_time||2000;if(additional_class===true)additional_class='error';$("<div/>",{"class":additional_class?"autoHideBox "+additional_class:"autoHideBox",click:function(){$(this).remove()},text:message}).appendTo("#content_value").delay(fade_out_time).fadeOut('slow',function(){$(this).remove()})},AjaxPopup:function(event,target,url,closeText,handler,UserOptions,width,height,x,y,toToggle){var topmenu_height=$(".top_bar").height(),defaults={dataType:'json'},options=$.extend(defaults,UserOptions);if(options.reload||($('#'+target).length==0)){var button=null;if(event&&(!x||!y)){if(event.srcElement){button=event.srcElement}else button=event.target;var offset=$(button).offset();if(!x)x=offset.left;if(!y)y=offset.top+$(button).height()+1};if(!height)height='auto';if(!width)width='auto';var toggleSelector='#'+target;if(typeof (toToggle)!='undefined')if(toToggle.length>0){var key;for(key in toToggle)if(toToggle.hasOwnProperty(key))toggleSelector=toggleSelector+', '+toToggle[key]};$.ajax({url:url,dataType:options.dataType,success:function(msg){var container=null;if($('#'+target).length==0){container=$('<div>').attr('id',target).addClass('popup_style').css({width:width,position:'fixed'});var menu=$('<div>').attr('id',target+'_menu').addClass('popup_menu').html($('<a>').attr("id","closelink_"+target).attr('href','#').html(closeText)),content=$('<div>').attr('id',target+'_content').addClass('popup_content').css('height',height).css('overflow-y','auto');container.append(menu).append(content);UI.Draggable(container);container.bind("dragstart",function(){document.onselectstart=function(event){event.preventDefault()}});container.bind("dragstop",function(){document.onselectstart=function(event){$(event.target).trigger('select')}});$('#ds_body').append(container);$("#closelink_"+target).click(function(event){event.preventDefault();$(toggleSelector).toggle()})}else container=$('#'+target);if(handler){handler.call(this,msg,$('#'+target+'_content'))}else $('#'+target+'_content').html(msg);if($.cookie('popup_pos_'+target)){var pos=$.cookie('popup_pos_'+target).split('x');x=parseInt(pos[0],10);y=parseInt(pos[1],10)}else $.cookie('popup_pos_'+target,x+'x'+y);if(!mobile){var popup_height=container.outerHeight(),popup_width=container.outerWidth(),window_width=$(window).width(),window_height=$(window).height();if(y+popup_height>window_height)y=window_height-popup_height;if(x+popup_width>window_width)x=window_width-popup_width;if(x<0)x=0;if(y<topmenu_height)y=topmenu_height;container.css('top',y).css('left',x);var recalcConstraints=function(container,topmenu_height){var min_y=topmenu_height,min_x=0,max_y=$(document).height()-$(container).outerHeight(),max_x=$(document).width()-$(container).outerWidth(),contain_in=[min_x,min_y,max_x,max_y];container.draggable("option","containment",contain_in)};recalcConstraints(container,topmenu_height);$(window).resize(function(){recalcConstraints(container,topmenu_height)})};if(mobile){var mobile_styles={position:'absolute',top:$(window).scrollTop()+'px',left:'0px',height:'auto',width:'auto'};container.css(mobile_styles);$('#'+target+'_content').css({height:'auto'})};container.show()}})}else $('#'+target).show()}};$(document).ready(function(){UI.init()})