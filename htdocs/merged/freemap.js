function FreeMap(e,t,i,s,o){var n=this;if(this.el={},this.el.root=e,this.el.container=document.createElement("div"),$(this.el.container).attr("style","position: absolute; left:0px; top:0px; z-index:1; overflow:visible"),this.el.container.setAttribute("id",e.id+"_container"),e.appendChild(this.el.container),this.size=[$(e).width(),$(e).height()],this.scale=t,this.sectorSize=i,this.pos=[-1,-1],this.handler=s,s.onClick){var r=this;$.browser.msie?$(this.el.root).mousedown(function(e){r._downEl=2==e.which?0:1}).mouseup(function(e){return 1!=r._downEl||r._handleClick(e)?(r._downEl=0,!0):(r._downEl=2,!1)}).click(function(e){if(2==r._downEl)return!1}):$(this.el.root).click(function(e){return 2==e.which||r._handleClick(e)})}return this._lastTopLeftSector=[0,0],this._lastBottomRightSector=[0,0],this._visibleSectors={},this._loadedSectors={},this.viewport=[0,0,0,0],this.bias=o,this._handleClick=function(e){if(this.mover&&this.mover.moveDirty)return!1;var t=this.coordByEvent(e);return this.handler.onClick(t[0],t[1],e)},this.coordByPixel=function(e,t,i){return!0===i?[e/this.scale[0],t/this.scale[1]]:[Math.floor(e/this.scale[0]),Math.floor(t/this.scale[1])]},this.pixelByCoord=function(e,t){return[e*this.scale[0],t*this.scale[1]]},this.sectorByPixel=function(e,t){return[Math.floor(e/this.scale[0]/this.sectorSize),Math.floor(t/this.scale[1]/this.sectorSize)]},this.coordByEvent=function(e){var t=$(this.el.root).offset(),i=[e.pageX-t.left+this.pos[0],e.pageY-t.top+this.pos[1]];return[Math.floor(i[0]/this.scale[0]),Math.floor(i[1]/this.scale[1])]},this.centerPos=function(e,t,i){var s=e*this.scale[0]-this.size[0]/2+this.scale[0]/2,o=t*this.scale[1]-this.size[1]/2+this.scale[1]/2;return!0===i&&(s-=s%this.scale[0],o-=o%this.scale[1]),this.setPosPixel(s,o)},this.setPos=function(e,t){return this.setPosPixel(e*this.scale[0],t*this.scale[1])},this.setPosPixel=function(e,t){if(e==this.pos[0]&&t==this.pos[1])return 0;if(isNaN(e)||isNaN(t))return 0;var i=this.handler.scrollBound.x_min*this.scale[0],s=this.handler.scrollBound.x_max*this.scale[0]-this.size[0]+this.scale[0];e=Math.min(Math.max(e,i),s);var o=this.handler.scrollBound.y_min*this.scale[1],r=this.handler.scrollBound.y_max*this.scale[1]-this.size[1]+this.scale[1];t=Math.min(Math.max(t,o),r),this.pos[0]=e,this.pos[1]=t,this.handler.onMovePixel&&this.handler.onMovePixel(e,t);var h=0,a=[e+this.size[0],t+this.size[1]],l=this.sectorByPixel(e,t),d=this.sectorByPixel(a[0],a[1]);if(!compareCoord(this._lastTopLeftSector,l)||!compareCoord(this._lastBottomRightSector,d)){for(var c=[],u=[],p=l[0];p<=d[0];p++)for(var v=l[1];v<=d[1];v++){var m=p+"_"+v;if(!(M=this._loadedSectors[m])){M={id:m,visible:!1,loaded:!0,sx:p,sy:v,x:p*this.sectorSize,y:v*this.sectorSize,_elements:[],_element_root:null,_map:n,appendElement:function(e,t,i){e.style.left=t*this._map.scale[0]+"px",e.style.top=i*this._map.scale[1]+"px",this._elements.push(e),void 0===this.dom_fragment?this._element_root.appendChild(e):this.dom_fragment.appendChild(e)},spawn:function(){this.visible||(this._map.el.container.appendChild(this._element_root),this.visible=!0)},despawn:function(e){this.visible&&(this._map.el.container.removeChild(this._element_root),!0===e&&(this._element_root=null),this.visible=!1)}};var _=document.createElement("div");_.style.width=this.scale[0]*this.sectorSize+"px",_.style.height=this.scale[1]*this.sectorSize+"px",_.style.position="absolute",_.style.left=p*this.sectorSize*this.scale[0]-this.bias+"px",_.style.top=v*this.sectorSize*this.scale[1]-this.bias+"px",M._element_root=_,M.spawn(),(!this.handler.scrollBound||M.x>=this.handler.scrollBound.x_min-this.sectorSize&&M.y>=this.handler.scrollBound.y_min-this.sectorSize&&M.x<this.handler.scrollBound.x_max&&M.y<this.handler.scrollBound.y_max)&&u.push(M)}c.push(M)}if(u.length)if(h=u.length,this.handler.loadSectors)this.handler.loadSectors(u);else for(var g=0;g<h;g++)this.handler.loadSector(u[g]);if(c.length){this.handler.preLoad&&this.handler.preLoad(c.length);var f={},w=c.length;for(g=0;g<w;g++){var M;(M=c[g]).loaded&&M.spawn(),f[M.id]=M,this._loadedSectors[M.id]=M}for(var g in this._visibleSectors)if(this._visibleSectors.hasOwnProperty(g)){var x=this._visibleSectors[g];void 0===f[x.id]&&(x.despawn(),delete this._loadedSectors[g])}this.handler.postLoad&&this.handler.postLoad(),this._visibleSectors=f}}var y=this.getCenter();return this.lastCenterCoordPos&&compareCoord(y,this.lastCenterCoordPos)||(this.handler.onMove&&this.handler.onMove(y[0],y[1]),this.lastCenterCoordPos=y,this.recalcViewport()),e-=this.bias,t-=this.bias,this.el.container.style.left=-e+"px",this.el.container.style.top=-t+"px",h},this.getCenter=function(){return this.coordByPixel(this.pos[0]+this.size[0]/2,this.pos[1]+this.size[1]/2)},this.getLevelForVillagePoints=function(e){for(var t=[300,1e3,3e3,9e3,11e3],i=1,s=0;s<t.length&&!(e<t[s]);s++)i++;return i},this.getViewportTileDimensions=function(){return{width:TWMap.map.size[0]/TWMap.map.scale[0],height:TWMap.map.size[1]/TWMap.map.scale[1]}},this.getViewport=function(){return{top_left_tile:{coord_x:this.viewport[0],coord_y:this.viewport[1]},bottom_right_tile:{coord_x:this.viewport[2],coord_y:this.viewport[3]}}},this.recalcViewport=function(){var e=this.pos[0],t=this.pos[1],i=this.coordByPixel(e,t),s=this.coordByPixel(e+this.size[0],t+this.size[1]);this.viewport=[i[0],i[1],s[0],s[1]]},this.inViewport=function(e,t){return e>=this.viewport[0]&&t>=this.viewport[1]&&e<=this.viewport[2]&&t<=this.viewport[3]},this.createMover=function(e){this.mover=new FreeMapMover(this),this.mover.setSpeed(e)},this.reload=function(e,t){if(!t){for(var i in this._loadedSectors){if(this._loadedSectors.hasOwnProperty(i))this._loadedSectors[i].despawn(!0)}this._loadedSectors={}}if(this._visibleSectors={},this.handler.onReload&&this.handler.onReload(),!1!==e){var s=this.pos[0],o=this.pos[1];this.pos=[0,0],this.setPosPixel(s,o)}},this._resizeElements=[],this._resizeTargetPosition=[],this.resize=function(e,t,i){if(void 0===e){var s=$(this.el.root).parent();e=s.width(),t=s.height()}var o=[[],[]],n=this.getCenter();if(2&i||(o[0].push(this.el.root),o[1].push(this.el.root)),this.handler.hasOwnProperty("getResizableElements")){var r=this.handler.getResizableElements();o[0]=o[0].concat(r[0]),o[1]=o[1].concat(r[1])}this.size=[e,t],this.handler.hasOwnProperty("onResize")&&this.handler.onResize(e,t),1&i?($(o[0]).animate({width:e+"px"},{duration:400,queue:!1}),$(o[1]).animate({height:t+"px"},{duration:400,queue:!1})):($(o[0]).width(e),$(o[1]).height(t)),2&i||(this.centerPos(n[0],n[1],!1),this.recalcViewport())},this._lastResizeSize=0,this.createResizer=function(e,t,i){i=i||1,$(this.el.root).resizable({grid:[i*this.scale[0],i*this.scale[1]],minWidth:e[0]*this.scale[0],maxWidth:t[0]*this.scale[0],minHeight:e[1]*this.scale[1],maxHeight:t[1]*this.scale[1],handles:"se",zIndex:13,start:$.proxy(function(e,t){this.handler.hasOwnProperty("onResizeBegin")&&this.handler.onResizeBegin(),TWMap.busy=!0,this._resizeTargetPosition=this.getCenter()},this),stop:$.proxy(function(){TWMap.busy=!1,this.centerPos(this._resizeTargetPosition[0],this._resizeTargetPosition[1],!1),this.handler.hasOwnProperty("onResizeEnd")&&this.handler.onResizeEnd()},this)}).resize($.proxy(function(){var e=$(this.el.root),t=1e5*e.width()+e.height();t!=this._lastResizeSize&&(this._lastResizeSize=t,this.resize(e.width(),e.height(),2),this.pos=[0,0],this.centerPos(this._resizeTargetPosition[0],this._resizeTargetPosition[1],!1),this.recalcViewport())},n))},this.effects={beaconVillage:function(e,t){if(TWMap.map.inViewport(e,t)){var i=$('<div class="center_beacon"></div>'),s=$('<div class="map_beacon_container"></div>'),o=TWMap.map.getViewport().top_left_tile,n=(e-o.coord_x+.5)*TWMap.tileSize[0],r=(t-o.coord_y+.5)*TWMap.tileSize[1];s.css({top:r+"px",left:n+"px"}).append(i),$("#special_effects_container").append(s),setTimeout(function(){Modernizr.cssanimations&&i.addClass("end"),setTimeout(function(){s.remove()},600)},100)}}},!0}function FreeMapMover(e){this.moveDirty=!1,this.allowDrag=!0,this.dragHandler=null,this.dragBeginHandler=null,this.dragEndHandler=null,this.dragBeginPosition=[],this.fixTouchEvent=function(e){return e.changedTouches&&(e.clientX=e.changedTouches[0].clientX,e.clientY=e.changedTouches[0].clientY,e.pageX=e.changedTouches[0].pageX,e.pageY=e.changedTouches[0].pageY),e},this.handleMouseDown=function(e){if(null!=this.touchIdentifier)return e.preventDefault(),!1;if((e=this.fixTouchEvent(e)).changedTouches&&(this.touchIdentifier=e.changedTouches[0].identifier),this.containerPos=[-(parseInt(this._map.el.container.style.left)-this._map.bias),-(parseInt(this._map.el.container.style.top)-this._map.bias)],this.mousePos=[e.clientX,e.clientY],this.moveDirty=!1,this.crappy_browser?(this._el.setCapture(),this._el.attachEvent("onmousemove",this._eventHandleMouseMove),this._el.attachEvent("onmouseup",this._eventHandleMouseUp),this._el.attachEvent("onlosecapture",this._eventHandleMouseUp)):(window.addEventListener("touchmove",this._eventHandleMouseMove,!0),window.addEventListener("mousemove",this._eventHandleMouseMove,!0),window.addEventListener("touchend",this._eventHandleMouseUp,!0),window.addEventListener("mouseup",this._eventHandleMouseUp,!0),e.preventDefault()),!1!==this.useDragTimer){var t=this;this.dragTimer=setInterval(function(){t.IEDragTimer()},this.useDragTimer),this.dragBeginPosition=[e.clientX,e.clientY],this.lastMousePositionForTimer=[e.clientX,e.clientY]}},this.handleMouseUp=function(e){if(e.changedTouches&&e.changedTouches[0].identifier!=this.touchIdentifier)return!1;if(this.touchIdentifier=null,this.crappy_browser?(this._el.releaseCapture(),this._el.detachEvent("onmousemove",this._eventHandleMouseMove),this._el.detachEvent("onmouseup",this._eventHandleMouseUp),this._el.detachEvent("onlosecapture",this._eventHandleMouseUp)):(window.removeEventListener("touchmove",this._eventHandleMouseMove,!0),window.removeEventListener("mousemove",this._eventHandleMouseMove,!0),window.removeEventListener("touchend",this._eventHandleMouseMove,!0),window.removeEventListener("mouseup",this._eventHandleMouseUp,!0)),!1!==this.useDragTimer&&(clearInterval(this.dragTimer),this.dragTimer=void 0),this.moveDirty&&(this.allowDrag&&this._map.handler.hasOwnProperty("onDragEnd")?this._map.handler.onDragEnd():this.dragEndHandler&&this.dragEndHandler()),!this.moveDirty&&e.changedTouches&&this._map.handler.onClick){e=this.fixTouchEvent(e);var t={};t.pageX=e.changedTouches[0].pageX,t.pageY=e.changedTouches[0].pageY;var i=this._map.coordByEvent(t);e.stopPropagation(),this._map.handler.onClick(i[0],i[1])}return setTimeout(jQuery.proxy(function(){this.moveDirty=!1},this),50),e.returnValue=!1,e.preventDefault&&e.preventDefault(),!1},this.IEDragTimer=function(){var e={clientX:this.lastMousePositionForTimer[0],clientY:this.lastMousePositionForTimer[1]};0==e.clientX&&0==e.clientY||this.handleMouseMove(e,!0)},navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)?this.useDragTimer=100:$.browser.webkit|$.browser.safari?this.useDragTimer=40:$.browser.mozilla?this.useDragTimer=40:$.browser.msie?this.useDragTimer=60:$.browser.opera?this.useDragTimer=30:this.useDragTimer=60,this.handleMouseMove=function(e,t){if(e.changedTouches&&e.changedTouches[0].identifier!=this.touchIdentifier)return!1;if(e=this.fixTouchEvent(e),!1!==this.useDragTimer&&void 0===t)return this.lastMousePositionForTimer=[e.clientX,e.clientY],!1;var i=[e.clientX-this.mousePos[0],e.clientY-this.mousePos[1]];this.mousePos=[e.clientX,e.clientY];var s=[this.containerPos[0]-i[0]*this._speed,this.containerPos[1]-i[1]*this._speed];if(this._map.handler.scrollBound){var o=this._map.handler.scrollBound,n=this._map.coordByPixel(s[0],s[1],!0);n[0]<o.x_min&&i[0]>0&&(i[0]=0),n[1]<o.y_min&&i[1]>0&&(i[1]=0);var r=this._map.coordByPixel(s[0]+this._map.size[0],s[1]+this._map.size[1]);r[0]>o.x_max&&i[0]<0&&(i[0]=0),r[1]>o.y_max&&i[1]<0&&(i[1]=0)}return 0==i[0]&&0==i[1]||0!=this.moveDirty||(this.allowDrag&&this._map.handler.onDragBegin?this._map.handler.onDragBegin():this.dragBeginHandler&&this.dragBeginHandler(),this.moveDirty=!0),this.allowDrag?(this.containerPos[0]-=i[0]*this._speed,this.containerPos[1]-=i[1]*this._speed,this._map.setPosPixel(this.containerPos[0],this.containerPos[1]),!1):(this.moveDirty&&this.dragHandler&&this.dragHandler(this.dragBeginPosition,this.mousePos,i),!1)},this.setSpeed=function(e){this._speed=e},this.preventDrag=function(e,t,i){!0===e||!1===e?(this.allowDrag=!e,this.dragHandler=null,this.dragEndHandler=null,$(this._el).css("cursor","move")):(this.allowDrag=!1,this.dragHandler=e,this.dragBeginHandler=t,this.dragEndHandler=i,$(this._el).css("cursor","default"))};var t=document.createElement("div");t.setAttribute("id",e.el.root.id+"_mover"),$(t).addClass("needsclick"),$(t).attr("style",'position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 12; background-image: url("/graphic/map/empty.png"); cursor: move; -moz-user-select: none;'),this.crappy_browser=t.setCapture&&t.detachEvent;var i=this;this._eventHandleMouseDown=function(e){return i.handleMouseDown(e)},this._eventHandleMouseMove=function(e){return i.handleMouseMove(e)},this._eventHandleMouseUp=function(e){return i.handleMouseUp(e)},this._speed=1,this.crappy_browser?t.attachEvent("onmousedown",this._eventHandleMouseDown):(t.addEventListener("touchstart",this._eventHandleMouseDown,!0),t.addEventListener("mousedown",this._eventHandleMouseDown,!0)),this._map=e,this._el=t,e.el.mover=t,e.el.root.appendChild(t)}function compareCoord(e,t){return e[0]==t[0]&&e[1]==t[1]}