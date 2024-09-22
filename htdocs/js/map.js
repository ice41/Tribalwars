function minMap(div,coordToPixelScale,sectorSize,userHandler,bias){var _self_map=this;this.el={};this.el.root=div;this.el.container=document.createElement('div');$(this.el.container).attr('style','position: absolute; left:0px; top:0px; z-index:1; overflow:visible');this.el.container.setAttribute('id',div.id+'_container');div.appendChild(this.el.container);this.size=[parseInt(div.style.width),parseInt(div.style.height)];this.scale=coordToPixelScale;this.sectorSize=sectorSize;this.pos=[-1,-1];this.handler=userHandler;if(userHandler.onClick){var _me=this;if($.browser.msie){$(this.el.root).mousedown(function(e){_me._downEl=(e.which==2?0:1)}).mouseup(function(e){if(_me._downEl==1)if(!_me._handleClick(e)){_me._downEl=2;return false};_me._downEl=0;return true}).click(function(e){if(_me._downEl==2)return false})}else $(this.el.root).click(function(e){if(e.which==2)return true;return _me._handleClick(e)})};this._lastTopLeftSector=[0,0];this._lastBottomRightSector=[0,0];this._visibleSectors={};this._loadedSectors={};this.viewport=[0,0,0,0];this.bias=bias;this._handleClick=function(e){if(this.mover&&this.mover.moveDirty)return false;var pos=this.coordByEvent(e);return this.handler.onClick(pos[0],pos[1],e)};this.coordByPixel=function(x,y,use_float){if(use_float===true){return[x/this.scale[0],y/this.scale[1]]}else return[Math.floor(x/this.scale[0]),Math.floor(y/this.scale[1])]};this.pixelByCoord=function(x,y){return[(x*this.scale[0]),(y*this.scale[1])]};this.sectorByPixel=function(x,y){return[Math.floor(x/this.scale[0]/this.sectorSize),Math.floor(y/this.scale[1]/this.sectorSize)]};this.coordByEvent=function(event){var off=$(this.el.root).offset(),pos=[event.pageX-off.left+this.pos[0],event.pageY-off.top+this.pos[1]],x=Math.floor(pos[0]/this.scale[0]),y=Math.floor(pos[1]/this.scale[1]);return[x,y]};this.centerPos=function(x,y,fix_to_square){var px=x*this.scale[0]-this.size[0]/2+this.scale[0]/2,py=y*this.scale[1]-this.size[1]/2+this.scale[1]/2;if(fix_to_square===true){px-=(px%this.scale[0]);py-=(py%this.scale[1])};px=Math.max(px,this.handler.scrollBound[0]*this.scale[0]);py=Math.max(py,this.handler.scrollBound[1]*this.scale[1]);return this.setPosPixel(px,py)};this.setPos=function(x,y){return this.setPosPixel(x*this.scale[0],y*this.scale[1])};this.setPosPixel=function(x,y){if(x==this.pos[0]&&y==this.pos[1])return 0;if(this.handler.onMovePixel)this.handler.onMovePixel(x,y);var new_sect_count=0,posBR=[x+this.size[0],y+this.size[1]],sTL=this.sectorByPixel(x,y),sBR=this.sectorByPixel(posBR[0],posBR[1]);if(!compareCoord(this._lastTopLeftSector,sTL)||!compareCoord(this._lastBottomRightSector,sBR)){var _sectors=[],load_sectors=[];for(var sx=sTL[0];sx<=sBR[0];sx++)for(var sy=sTL[1];sy<=sBR[1];sy++){var sectorID=sx+'_'+sy,sector=this._loadedSectors[sectorID];if(!sector){sector={id:sectorID,visible:false,loaded:true,sx:sx,sy:sy,x:sx*this.sectorSize,y:sy*this.sectorSize,_elements:[],_element_root:null,_map:_self_map,appendElement:function(el,x,y){el.style.left=(x*this._map.scale[0])+'px';el.style.top=(y*this._map.scale[1])+'px';this._elements.push(el);if(this.dom_fragment===undefined){this._element_root.appendChild(el)}else this.dom_fragment.appendChild(el)},spawn:function(){if(this.visible)return;this._map.el.container.appendChild(this._element_root);this.visible=true},despawn:function(force_rem){if(!this.visible)return;this._map.el.container.removeChild(this._element_root);if(force_rem===true)this._element_root=null;this.visible=false}};var r=document.createElement('div');r.style.width=(this.scale[0]*this.sectorSize)+'px';r.style.height=(this.scale[1]*this.sectorSize)+'px';r.style.position='absolute';r.style.left=((sx*this.sectorSize)*this.scale[0]-this.bias)+'px';r.style.top=((sy*this.sectorSize)*this.scale[1]-this.bias)+'px';sector._element_root=r;sector.spawn();if(!this.handler.scrollBound||(sector.x>=(this.handler.scrollBound[0]-this.sectorSize)&&sector.y>=(this.handler.scrollBound[1]-this.sectorSize)&&sector.x<this.handler.scrollBound[2]&&sector.y<this.handler.scrollBound[3]))load_sectors.push(sector)};_sectors.push(sector)};if(load_sectors.length){new_sect_count=load_sectors.length;if(this.handler.loadSectors){this.handler.loadSectors(load_sectors)}else for(var idx in load_sectors)this.handler.loadSector(load_sectors[idx])};if(_sectors.length){if(this.handler.preLoad)this.handler.preLoad(_sectors.length);var _newVisibleSectors={};for(var idx in _sectors){var sector=_sectors[idx];if(sector.loaded)sector.spawn();_newVisibleSectors[sector.id]=sector;this._loadedSectors[sector.id]=sector};for(var idx in this._visibleSectors){var it_sect=this._visibleSectors[idx];if(_newVisibleSectors[it_sect.id]===undefined){it_sect.despawn();delete this._loadedSectors[idx]}};if(this.handler.postLoad)this.handler.postLoad();this._visibleSectors=_newVisibleSectors}};this.pos[0]=x;this.pos[1]=y;var coordPos=this.coordByPixel(x+this.size[0]/2,y+this.size[1]/2);if((!this.lastCenterCoordPos||!compareCoord(coordPos,this.lastCenterCoordPos))){if(this.handler.onMove)this.handler.onMove(coordPos[0],coordPos[1]);this.lastCenterCoordPos=coordPos;this.recalcViewport()};x-=this.bias;y-=this.bias;this.el.container.style.left=-x+'px';this.el.container.style.top=-y+'px';return new_sect_count};this.recalcViewport=function(){var x=this.pos[0],y=this.pos[1],coordTopLeft=this.coordByPixel(x,y),coordBottomRight=this.coordByPixel(x+this.size[0],y+this.size[1]);this.viewport=[coordTopLeft[0],coordTopLeft[1],coordBottomRight[0],coordBottomRight[1]]};this.inViewport=function(x,y){return x>=this.viewport[0]&&y>=this.viewport[1]&&x<=this.viewport[2]&&y<=this.viewport[3]};this.createMover=function(speed){this.mover=new FreeMapMover(this);this.mover.setSpeed(speed)};this.reload=function(set_pos){for(var idx in this._loadedSectors){var sector=this._loadedSectors[idx];sector.despawn(true)};this._loadedSectors={};this._visibleSectors={};if(this.handler.onReload)this.handler.onReload();if(set_pos!==false){var x=this.pos[0],y=this.pos[1];this.pos=[0,0];this.setPosPixel(x,y)}};return true}
function FreeMapMover(map){this.mouseLastPosition=[];this.moveDirty=false;this.fixTouchEvent=function(event){if(event.changedTouches){event.clientX=event.changedTouches[0].clientX;event.clientY=event.changedTouches[0].clientY;event.pageX=event.changedTouches[0].pageX;event.pageY=event.changedTouches[0].pageY};return event};this.handleMouseDown=function(event){if(this.touchIdentifier!=null){event.preventDefault();return false};event=this.fixTouchEvent(event);if(event.changedTouches)this.touchIdentifier=event.changedTouches[0].identifier;this.containerPos=[-(parseInt(this._map.el.container.style.left)-this._map.bias),-(parseInt(this._map.el.container.style.top)-this._map.bias)];this.mousePos=[event.clientX,event.clientY];this.moveDirty=false;if(this.crappy_browser){this._el.setCapture();this._el.attachEvent('onmousemove',this._eventHandleMouseMove);this._el.attachEvent('onmouseup',this._eventHandleMouseUp);this._el.attachEvent('onlosecapture',this._eventHandleMouseUp)}else{window.addEventListener('touchmove',this._eventHandleMouseMove,true);window.addEventListener('mousemove',this._eventHandleMouseMove,true);window.addEventListener('touchend',this._eventHandleMouseUp,true);window.addEventListener('mouseup',this._eventHandleMouseUp,true);event.preventDefault()};if(this.useDragTimer!==false){var _me=this;this.dragTimer=setInterval(function(){_me.IEDragTimer()},this.useDragTimer);this.lastMousePositionForTimer=[event.clientX,event.clientY]}};this.handleMouseUp=function(event){if(event.changedTouches&&event.changedTouches[0].identifier!=this.touchIdentifier)return false;this.touchIdentifier=null;if(this.crappy_browser){this._el.releaseCapture();this._el.detachEvent('onmousemove',this._eventHandleMouseMove);this._el.detachEvent('onmouseup',this._eventHandleMouseUp);this._el.detachEvent('onlosecapture',this._eventHandleMouseUp)}else{window.removeEventListener('touchmove',this._eventHandleMouseMove,true);window.removeEventListener('mousemove',this._eventHandleMouseMove,true);window.removeEventListener('touchend',this._eventHandleMouseMove,true);window.removeEventListener('mouseup',this._eventHandleMouseUp,true)};if(this.useDragTimer!==false){clearInterval(this.dragTimer);this.dragTimer=undefined};if(this._map.handler.onDragEnd)this._map.handler.onDragEnd();if(!this.moveDirty&&event.changedTouches&&this._map.handler.onClick){event=this.fixTouchEvent(event);var _ev={};_ev.pageX=event.changedTouches[0].pageX;_ev.pageY=event.changedTouches[0].pageY;var pos=this._map.coordByEvent(_ev);this._map.handler.onClick(pos[0],pos[1])};return false};this.IEDragTimer=function(){var ev={clientX:this.lastMousePositionForTimer[0],clientY:this.lastMousePositionForTimer[1]};if(ev.clientX==0&&ev.clientY==0)return;this.handleMouseMove(ev,true)};if(navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)){this.useDragTimer=100}else if($.browser.webkit|$.browser.safari){this.useDragTimer=40}else if($.browser.mozilla){this.useDragTimer=40}else if($.browser.msie){this.useDragTimer=60}else if($.browser.opera){this.useDragTimer=30}else this.useDragTimer=60;this.handleMouseMove=function(event,is_timer_call){if(event.changedTouches&&event.changedTouches[0].identifier!=this.touchIdentifier)return false;event=this.fixTouchEvent(event);if(this.useDragTimer!==false&&is_timer_call===undefined){this.lastMousePositionForTimer=[event.clientX,event.clientY];return false};var diff=[event.clientX-this.mousePos[0],event.clientY-this.mousePos[1]];this.mousePos=[event.clientX,event.clientY];var pos=[this.containerPos[0]-diff[0]*this._speed,this.containerPos[1]-diff[1]*this._speed];if(this._map.handler.scrollBound){var limit=this._map.handler.scrollBound,nTL=this._map.coordByPixel(pos[0],pos[1],true);if(nTL[0]<limit[0]&&diff[0]>0)diff[0]=0;if(nTL[1]<limit[1]&&diff[1]>0)diff[1]=0;var nBR=this._map.coordByPixel(pos[0]+this._map.size[0],pos[1]+this._map.size[1]);if(nBR[0]>limit[2]&&diff[0]<0)diff[0]=0;if(nBR[1]>limit[3]&&diff[1]<0)diff[1]=0};if((diff[0]!=0||diff[1]!=0)&&this.moveDirty==false){if(this._map.handler.onDragBegin)this._map.handler.onDragBegin();this.moveDirty=true};this.containerPos[0]-=diff[0]*this._speed;this.containerPos[1]-=diff[1]*this._speed;this._map.setPosPixel(this.containerPos[0],this.containerPos[1]);return false};this.setSpeed=function(speed){this._speed=speed};var el=document.createElement('div');el.setAttribute('id',map.el.root.id+'_mover');$(el).attr('style','position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 11; background-image: url("http://cdn.dwar.ro/graphic/map/empty.png"); cursor: move; -moz-user-select: none;');this.crappy_browser=(el.setCapture&&el.detachEvent);var _this=this;this._eventHandleMouseDown=function(event){return _this.handleMouseDown(event)};this._eventHandleMouseMove=function(event){return _this.handleMouseMove(event)};this._eventHandleMouseUp=function(event){return _this.handleMouseUp(event)};this._speed=1;if(this.crappy_browser){el.attachEvent('onmousedown',this._eventHandleMouseDown)}else{el.addEventListener('touchstart',this._eventHandleMouseDown,true);el.addEventListener('mousedown',this._eventHandleMouseDown,true)};this._map=map;this._el=el;map.el.mover=el;map.el.root.appendChild(el)}
function compareCoord(a,b){return(a[0]==b[0]&&a[1]==b[1])}

var WD = {
    map: null,
    minimap: null,
    json_eid: null,
    mobile: false,
    mapSubSectorSize: 5,
    strings: {},
    urls: {},
    scriptMode: false,
    villages: {},
    players: {},
    allies: {},
    targets: [],
    pos: [],
    currentCon: null,
    colors: {},
    currentVillage: null,
    graphics: 'graphic/map/',
    playerGroups: {},
    allyGroups: {},
    villageGroups: {},
    allyGroups: {},
    ownGroups: {},
    villageIcons: {},
    commandIcons: {},
    allyRelations: {},
    reservations: {},
    scrollBound: [0, 0, 1000, 1000],
    images: {0: 'vil_1n.png',1: 'vil_2n.png',2: 'vil_4n.png',3: 'vil_4n.png',4: 'vil_5n.png',5: 'vil_6n.png',6: 'left_1n.jpg',7: 'left_2n.jpg',8: 'left_4n.jpg',9: 'left_4n.jpg',10: 'left_5n.jpg',11: 'left_6n.jpg',12: 'grass1.png',13: 'grass2.png',14: 'grass3.png',15: 'grass4.png',16: 'grass5.png',17: 'grass6.png',18: 'grass7.png',19: 'grass8.png'},
    mapHandler: {
        _loadedSectors: {},
        loadSector: function (sector) {
            var sx = sector.x - (sector.x % 20),
                sy = sector.y - (sector.y % 20),
                sectorID = sx + '_' + sy,
                subSectorID = sector.x + '_' + sector.y;
            var _sectorData = this._loadedSectors[sectorID];
            if (_sectorData) {
                if (_sectorData.data) {
                    this.spawnSector(_sectorData.data, sector)
                } else _sectorData.queue.push(sector);
                return
            };
            this._loadedSectors[sx + '_' + sy] = {
                queue: []
            };
            var _me = this;
            $.ajax({
                type: 'GET',
                url: 'json_map.php?x='+sx + '&y=' + sy,
                dataType: 'json',
                success: function (data) {
                    var sectorData = _me._loadedSectors[sx + '_' + sy];
                    sectorData.data = data;
                    var village_ids = [];
                    
                    for (var x in data.villages) {
                        
                        x = parseInt(x);
                        for (var y in data.villages[x]) {
                            y = parseInt(y);
                            var v = data.villages[x][y];
                            if (v[2] === 0) v[2] = WD.strings.barbarianVillage;
                            WD.villages[(sx + x) * 1000 + sy + y] = {
                                id: v[0],
                                img: v[1],
                                name: v[2],
                                points: v[3],
                                owner: v[4],
                                mood: v[5],
                                bonus: v[6]
                            };
                           
                            village_ids.push(v[0])
                        }
                    };
                    if (WD.scriptMode) WD.popup.loadVillage(village_ids.join(','));
                    for (var player_id in data.players) {
                        var v = data.players[player_id];
                        WD.players[player_id] = {
                            name: v[0],
                            points: v[1],
                            ally: v[2],
                            newbie: v[3]
                        }
                    };
                    for (var ally_id in data.allies) {
                        var v = data.allies[ally_id];
                        WD.allies[ally_id] = {
                            name: v[0],
                            points: v[1],
                            tag: v[2]
                        }
                    };
                    _me.spawnSector(data, sector);
                    for (var i in sectorData.queue) _me.spawnSector(data, sectorData.queue[i]);
                    sectorData.queue = []
                }
            })
        },
        onMovePixel: function (x, y) {
            if (!WD.busy && WD.minimap) {
                var rx = (x + WD.map.size[0] / 2) / WD.map.scale[0],
                    ry = (y + WD.map.size[1] / 2) / WD.map.scale[1];
                WD.busy = true;
                WD.minimap.centerPos(rx, ry);
                WD.busy = false
            };
            x -= WD.map.bias;
            y -= WD.map.bias;
            WD.map_el_coordy.style.top = -y + 'px';
            WD.map_el_coordx.style.left = -x + 'px';
            WD.context.hide()
        },
        onMove: function (x, y) {
            WD.pos = [x, y];
            var cymax = Math.min(1000, y + 20);
            for (var cy = Math.max(0, y - 20); cy < cymax; cy++) {
                if (WD._coord_el_y_active[cy]) continue;
                WD._coord_el_y_active[cy] = true;
                WD.map_el_coordy.appendChild(WD._coord_el_y[cy])
            };
            var cxmax = Math.min(1000, x + 20);
            for (var cx = Math.max(0, x - 20); cx < cxmax; cx++) {
                if (WD._coord_el_x_active[cx]) continue;
                WD._coord_el_x_active[cx] = true;
                WD.map_el_coordx.appendChild(WD._coord_el_x[cx])
            };
            if (WD.busy) return;
            WD.busy = false;
            var con = WD.con.continentByXY(WD.pos[0], WD.pos[1]);
            if (con != WD.currentCon) $('#continent_id').html(con);
            WD.busy = false
        },
        onDragBegin: function () {
            WD.popup.unregister()
        },
        onDragEnd: function () {
            WD.popup.register()
        },
        onClick: function (x, y, e) {
            var village = WD.villages[x * 1000 + y];
            if (village) {
                if (!WD.context.enabled) {
                    if (!e || $.browser.msie) window.location.href = WD.urls.villageInfo.replace(/__village__/, village.id);
                    return true
                };
                WD.context.spawn(village, x, y)
            } else WD.context.hide();
            return false
        },
        _createBorder: function (isConBorder) {
            var el = document.createElement('div');
            if (isConBorder) {
                el.className = 'map_con_border'
            } else el.className = 'map_border';
            if (WD.night && !WD.classic_gfx) el.className += '_night';
            el.style.zIndex = '3';
            el.style.position = 'absolute';
            return el
        },
        spawnSector: function (data, sector) {
            var beginX = sector.x - data.x,
                endX = beginX + WD.mapSubSectorSize,
                beginY = sector.y - data.y,
                endY = beginY + WD.mapSubSectorSize,
                el_border = this._createBorder(sector.x % 100 == 0);
            el_border.style.width = '1px';
            el_border.style.height = (WD.mapSubSectorSize * WD.tileSize[1]) + 'px';
            sector.appendElement(el_border, 0, 0);
            el_border = this._createBorder(sector.y % 100 == 0);
            el_border.style.height = '1px';
            el_border.style.width = (WD.mapSubSectorSize * WD.tileSize[0]) + 'px';
            sector.appendElement(el_border, 0, 0);
            for (var x in data.tiles) {
                x = parseInt(x);
                if (x < beginX || x >= endX) continue;
                for (var y in data.tiles[x]) {
                    y = parseInt(y);
                    if (y < beginY || y >= endY) continue;
                    var el = document.createElement('img');
                    el.style.position = 'absolute';
                    el.style.zIndex = '2';
                    var v = WD.villages[(data.x + x) * 1000 + data.y + y];
                    if (v) {
                        var owner = v.owner,
                            ally = (v.owner > 0 && WD.players[v.owner]) ? WD.players[v.owner].ally : 0;
                        if (v.owner == 0) {
                            if (WD.villageGroups[v.id]) {
                                var circle = document.createElement('canvas');
                                if (circle.getContext) {
                                    circle.style.position = 'absolute';
                                    circle.width = 18;
                                    circle.height = 18;
                                    circle.style.zIndex = '4';
                                    circle.style.marginTop = '0px';
                                    circle.style.marginLeft = '0px';
                                    sector.appendElement(circle, x - beginX, y - beginY);
                                    var ctx = circle.getContext("2d");
                                    ctx.fillStyle = WD.villageGroups[v.id];
                                    ctx.strokeStyle = "#000000";
                                    ctx.beginPath();
                                    ctx.arc(5, 5, 3.3, 0, Math.PI * 2, false);
                                    ctx.fill();
                                    ctx.stroke()
                                } else {
                                    var el_img = document.createElement('img');
                                    el_img.style.position = 'absolute';
                                    el_img.style.width = '6px';
                                    el_img.style.height = '6px';
                                    el_img.style.zIndex = '4';
                                    el_img.style.marginTop = '3px';
                                    el_img.style.marginLeft = '0px';
                                    el_img.style.border = '0px';
                                    el_img.style.backgroundColor = WD.villageGroups[v.id];
                                    sector.appendElement(el_img, x - beginX, y - beginY)
                                }
                            }
                        } else if (v.id == game_data.village.id) {
                            el.style.backgroundColor = WD.colors['this']
                        } else if (WD.ownGroups[v.id]) {
                            el.style.backgroundColor = WD.ownGroups[v.id]
                        } else if (WD.playerGroups[owner]) {
                            el.style.backgroundColor = WD.playerGroups[owner]
                        } else if (owner == game_data.player.id) {
                            el.style.backgroundColor = WD.colors.player
                        } else if (ally && WD.allyGroups[ally]) {
                            el.style.backgroundColor = WD.allyGroups[ally]
                        } else if (game_data.player.ally_id > 0 && ally == game_data.player.ally_id) {
                            el.style.backgroundColor = WD.colors.ally
                        } else if (WD.allyRelations[ally]) {
                            el.style.backgroundColor = WD.colors[WD.allyRelations[ally]]
                        } else if (WD.villageGroups[v.id]) {
                            el.style.backgroundColor = WD.villageGroups[v.id]
                        } else el.style.backgroundColor = WD.colors.other;
                        el.id = 'map_village_' + v.id;
                      //  alert(WD.images[v.img]);
                        el.setAttribute('src', WD.graphics + WD.images[v.img]);
                        if (WD.villageIcons[v.id]) {
                            var inf = WD.villageIcons[v.id];
                            for (var i = 0; i < inf.length; i++) {
                                var el_img = document.createElement('img');
                                el_img.style.position = 'absolute';
                                el_img.style.width = '18px';
                                el_img.style.height = '18px';
                                el_img.style.zIndex = '4';
                                el_img.style.marginTop = '18px';
                                el_img.style.marginLeft = (i * 20) + 'px';
                                el_img.id = 'map_icons_' + v.id;
                                el_img.style.backgroundColor = inf[i].c;
                                el_img.src = inf[i].img ? inf[i].img : 'js/game/blank-16x22.png';
                             //   alert(el_img);
                                sector.appendElement(el_img, x - beginX, y - beginY)
                            }
                        };
                        if (WD.commandIcons[v.id]) {
                            var inf = WD.commandIcons[v.id];
                            for (var i = 0; i < inf.length; i++) {
                                var el_img = document.createElement('img');
                                el_img.style.position = 'absolute';
                                el_img.style.zIndex = '4';
                                el_img.style.marginTop = '0px';
                                el_img.style.marginLeft = (32 - i * 20) + 'px';
                                el_img.id = 'map_cmdicons_' + v.id;
                                el_img.src = 'js/game/' + inf[i].img + '.png';
                                sector.appendElement(el_img, x - beginX, y - beginY)
                            }
                        };
                        $(el).mouseout(WD.popup.hide())
                    } else el.setAttribute('src', WD.graphics + WD.images[data.tiles[x][y]]);
                    sector.appendElement(el, x - beginX, y - beginY)
                }
            }
        }
    },
    minimapHandler: {
        loadSector: function (sector) {
            var el = document.createElement('img');
            el.style.position = 'absolute';
            var vid = '';
            if (game_data && game_data.village) vid = '&village_id=' + game_data.village.id;
            tmp_y = sector.y+25;
            tmp_x = sector.x+25;
            el.setAttribute('src', 'minimap.php?id='+act_vid+'&x=' + tmp_x + '&y=' + tmp_y);
            sector.appendElement(el, 0, 0)
        },
        onMovePixel: function (x, y) {
            if (WD.busy) return;
            WD.busy = true;
            if (WD.map) {
                var rx = (x + WD.minimap.size[0] / 2) / WD.minimap.scale[0],
                    ry = (y + WD.minimap.size[1] / 2) / WD.minimap.scale[1];
                WD.map.centerPos(rx, ry)
            };
            var con = WD.con.continentByXY(WD.pos[0], WD.pos[1]);
            if (con != WD.currentCon) $('#continent_id').html(con);
            WD.busy = false
        },
        onClick: function (x, y) {
            WD.focus(x, y)
        }
    },
    getMinimapScrollBound: function () {
        var r = [this.scrollBound[0], this.scrollBound[1], this.scrollBound[2], this.scrollBound[3]];
        r[0] -= ~~ ((this.minimapWidth / this.minimap.scale[0] - this.size[0]) / 2);
        r[1] -= ~~ ((this.minimapHeight / this.minimap.scale[1] - this.size[1]) / 2);
        r[2] += Math.ceil((this.minimapWidth / this.minimap.scale[0] - this.size[0]) / 2);
        r[3] += Math.ceil((this.minimapHeight / this.minimap.scale[1] - this.size[1]) / 2);
        return r
    },
    init: function () {
        $('#map_blend').hide();
        this.mapHandler.scrollBound = this.scrollBound;
        var map = new minMap(document.getElementById('map'), this.tileSize, this.mapSubSectorSize, this.mapHandler, 26500);
        if (!$.browser.msie) map.createMover(this.mobile ? 1 : 2);
        this.map = map;
        this.map_el_coordx = document.getElementById('map_coord_x');
        this.map_el_coordy = document.getElementById('map_coord_y');
        var minimap = new minMap(document.getElementById('minimap'), [5, 5], 45, this.minimapHandler, 0);
        minimap.createMover(1);
        this.minimap = minimap;
        this.minimapWidth = $('#minimap').width();
        this.minimapHeight = $('#minimap').height();
        this.minimapHandler.scrollBound = this.getMinimapScrollBound();
        this.scaleViewport(this.size[0], this.size[1]);
        this._coord_el_y = [];
        this._coord_el_y_active = [];
        this._coord_el_x = [];
        this._coord_el_x_active = [];
        for (var c = 0; c < 1000; c++) {
            var el;
            el = document.createElement('div');
            el.style.height = this.map.scale[1] + 'px';
            el.style.lineHeight = this.map.scale[1] + 'px';
            el.style.verticalAlign = 'middle';
            el.style.position = 'absolute';
            el.style.top = (c * this.map.scale[1] - this.map.bias) + 'px';
            el.style.left = '0px';
            el.innerHTML = c;
            this._coord_el_y.push(el);
            this._coord_el_y_active.push(false);
            el = document.createElement('div');
            el.style.width = this.map.scale[0] + 'px';
            el.style.textAlign = 'center';
            el.style.position = 'absolute';
            el.style.left = (c * this.map.scale[0] - this.map.bias) + 'px';
            el.style.top = '0px';
            el.innerHTML = c;
            this._coord_el_x.push(el);
            this._coord_el_x_active.push(false)
        };
        this.popup.init();
        this.strings.newbieProt = $('#newbieProt').val();
        this.strings.barbarianVillage = $('#barbarianVillage').val();
        this.strings.pointFormat = $('#pointFormat').val();
        this.strings.villageFormat = $('#villageFormat').val();
        this.strings.villageNotes = $('#villageNotes').val();
        WD.currentCon = WD.con.continentByXY(WD.pos[0], WD.pos[1]);
        for (var res in WD.reservations) {
           
            if (!WD.villageIcons[res]) WD.villageIcons[res] = [];
            var img = 'graphic/map/command/reserved.png';
            WD.villageIcons[res].unshift({
                img: img
            })
        }
    },
    focus: function (x, y) {
        x = Math.max(x, (this.scrollBound[0] + this.size[0] / 2));
        y = Math.max(y, (this.scrollBound[1] + this.size[1] / 2));
        x = Math.min(x, ((this.scrollBound[2] + 1) - this.size[0] / 2));
        y = Math.min(y, ((this.scrollBound[3] + 1) - this.size[1] / 2));
        if (WD.map) WD.map.centerPos(x, y, true);
        WD.pos = [x, y]
    },
    scrolling: false,
    scrollBlock: function (x, y) {
        if (this.scrolling) return;
        this.scrolling = true;
        var dst = [WD.pos[0] + WD.size[0] * x, WD.pos[1] + WD.size[1] * y],
            scrollTID = setInterval(function () {
                if ((x == -1 && WD.map.viewport[0] <= WD.scrollBound[0]) || (y == -1 && WD.map.viewport[1] <= WD.scrollBound[1]) || (x == 1 && WD.map.viewport[2] >= WD.scrollBound[2]) || (y == 1 && WD.map.viewport[3] >= WD.scrollBound[3])) {
                    clearInterval(scrollTID);
                    WD.scrolling = false;
                    return
                };
                if ((x > 0 && WD.pos[0] >= dst[0]) || (x < 0 && WD.pos[0] <= dst[0]) || (y > 0 && WD.pos[1] >= dst[1]) || (y < 0 && WD.pos[1] <= dst[1])) {
                    clearInterval(scrollTID);
                    WD.scrolling = false;
                    return
                };
                var p = [WD.pos[0], WD.pos[1]];
                if (WD.pos[0] != dst[0]) p[0] += x;
                if (WD.pos[1] != dst[1]) p[1] += y;
                WD.focus(p[0], p[1])
            }, 30)
    },
    notifyMapSize: function (isAuto) {
        var mapsize = this.size.join('x');
        if (!mobile) {
            $.ajax({
                url: this.urls.sizeSave,
                data: 'map_size=' + mapsize,
                type: 'GET'
            })
        } else if (isAuto) {
            $.cookie("mobile_mapsize", 0, {
                expires: 7
            })
        } else $.cookie("mobile_mapsize", mapsize, {
            expires: 7
        })
    },
    scaleViewport: function (mapCoordWidth, mapCoordHeight) {
        var vpEl = document.getElementById('minimap_viewport'),
            vpWidth = Math.floor(mapCoordWidth * WD.minimap.scale[0]),
            vpHeight = Math.floor(mapCoordHeight * WD.minimap.scale[1]);
        vpEl.style.width = vpWidth + 'px';
        vpEl.style.height = vpHeight + 'px';
        vpEl.style.left = ~~ ((this.minimapWidth / 2 - vpWidth / 2)) + 'px';
        vpEl.style.top = ~~ ((this.minimapHeight / 2 - vpHeight / 2)) + 'px'
    },
    _resizeID: null,
    resize: function (size, smooth) {
        if (this._resizeID != null) clearInterval(this._resizeID);
        var dstWidth;
        if (size == 0) {
            WD.autoPixelSize = $(window).width() - 100;
            WD.size = Math.ceil(WD.autoPixelSize / WD.tileSize[0]);
            WD.autoSize = WD.size;
            size = WD.autoSize;
            dstWidth = WD.autoPixelSize;
            var isAuto = true
        } else {
            dstWidth = size * this.map.scale[0];
            var isAuto = false
        };
        var dstHeight = size * this.map.scale[1],
            dstPos = WD.pos;
        if ($.browser.msie) smooth = false;
        if (smooth) {
            $(this.map.el.root).animate({
                width: dstWidth + 'px',
                height: dstHeight + 'px'
            }, 200)
        } else {
            $(this.map.el.root).height(dstHeight);
            $(this.map.el.root).width(dstWidth)
        };
        this.resizeElements(dstWidth, dstHeight, smooth);
        WD.size = [size, size];
        this.notifyMapSize(isAuto);
        if (smooth) {
            this._resizeID = setInterval(function () {
                var s = WD.resizeSub(dstPos);
                if (dstWidth == s[0] && dstHeight == s[1]) {
                    WD.minimapHandler.scrollBound = WD.getMinimapScrollBound();
                    WD.map.pos = [0, 0];
                    WD.map.centerPos(dstPos[0], dstPos[1]);
                    clearInterval(WD._resizeID);
                    return
                }
            }, 20)
        } else this.resizeSub(dstPos)
    },
    resizeSub: function (dstPos) {
        var dstEl = this.map.el.root,
            curWidth = parseInt(dstEl.style.width),
            curHeight = parseInt(dstEl.style.height);
        WD.map.size = [curWidth, curHeight];
        WD.map.centerPos(dstPos[0], dstPos[1]);
        WD.scaleViewport(curWidth, curHeight);
        this.map.recalcViewport();
        return [curWidth, curHeight]
    },
    resizeElements: function (dstWidth, dstHeight, smooth) {
        if (smooth) {
            $('#map_coord_x_wrap').animate({
                width: dstWidth + 'px'
            }, 200);
            $('#map_coord_y_wrap').animate({
                height: dstHeight + 'px'
            }, 200)
        } else {
            $('#map_coord_x_wrap').width(dstWidth);
            $('#map_coord_y_wrap').height(dstHeight)
        };
        WD.popup.register()
    },
    popup: {
        attackDots: ['', '/dots/green.png', '/dots/yellow.png', '/dots/red.png', '/dots/blue.png'],
        attackMaxLoot: ['/max_loot/0.png', '/max_loot/1.png'],
        _px: 0,
        _py: 0,
        init: function () {
            this._cache = {};
            this.el = $('#map_popup');
            $(this.el).mousemove(function (event) {
                return WD.popup.handleMouseMove(event)
            });
            this.register();
            var _me = this;
            $(WD.map.el.root).mouseout(function () {
                _me.hide()
            });
            this._loadingText = $('#info_extra_info').find('td').html()
        },
        _isAwayFromContext: function (x, y) {
            if (WD.context._curFocus == -1) return true;
            var c_x = Math.floor(WD.context._curFocus / 1000),
                c_y = WD.context._curFocus % 1000,
                diff = [Math.abs(x - c_x), Math.abs(y - c_y)];
            return diff[0] >= 2 || diff[1] >= 2
        },
        loadVillage: function (village_id) {
            $.ajax({
                url: WD.urls.villagePopup.replace(/__village__/, village_id),
                dataType: 'json',
                type: 'GET',
                success: function (data) {
                    return WD.popup.receivedPopupInformation(data)
                }
            });
            this._cache[village_id] = 'notanobject'
        },
        handleMouseMove: function (event) {
            if (this != WD.popup) return false;
            var pos = WD.map.coordByEvent(event),
                x = pos[0],
                y = pos[1],
                coordidx = x * 1000 + y,
                village = WD.villages[coordidx];
            if (village && WD.map.inViewport(x, y) && this._isAwayFromContext(x, y)) {
                WD.context.hide();
                WD.map.el.root.href = WD.urls.ctx.mp_info.replace(/__village__/, village.id);
                this._currentVillage = village.id;
                if (WD.map.el.mover) WD.map.el.mover.style.cursor = 'pointer';
                this._px = event.pageX;
                this._py = event.pageY;
                if (this._x != x || this._y != y) {
                    var owner = WD.players[village.owner];
                    $('#map_popup').find('tr:gt(1)').hide();
                    $('#info_bonus_image_row').hide();
                    if (this.extraInfo && WD.popup.popupOtionsSet()) {
                        $('#info_extra_info').show();
                        var dat = this._cache[village.id];
                        if (typeof dat == 'object') {
                            this.appendPopupInformation(dat)
                        } else {
                            this.loadVillage(village.id);
                            $('#info_extra_info').find('td').html(this._loadingText)
                        }
                    };
                    if (owner) {
                        $('#info_owner_row').show();
                        $('#info_owner').html(WD.strings.pointFormat.replace(/%s/, owner.name).replace(/%s/, owner.points));
                        if (owner.newbie && village.owner != game_data.player.id) {
                            $('#info_newbie_protect_row').show();
                            $('#newbie_protect').html(WD.strings.newbieProt.replace(/%s/, owner.newbie))
                        };
                        var ally = WD.allies[owner.ally];
                        if (ally) {
                            $('#info_ally_row').show();
                            $('#info_ally').html(WD.strings.pointFormat.replace(/%s/, ally.name).replace(/%s/, ally.points))
                        }
                    } else $('#info_left_row').show();
                    if (village.bonus) {
                        $('#info_bonus_text').html(village.bonus[0]);
                        $('#info_bonus_image').html($('<img>').attr('src', '/graphic/' + village.bonus[1]));
                        $('#info_bonus_image_row').show();
                        $('#info_bonus_text_row').show()
                    };
                    $('#info_title').html(WD.strings.villageFormat.replace(/%name%/, village.name).replace(/%x%/, x).replace(/%y%/, y).replace(/%con%/, WD.con.continentByXY(x, y)));
                    $('#info_points').html(village.points);
                    
                    $('#info_points_row').show();
					if (this._currentVillage != WD.currentVillage) {
						$.ajax({
							type: "POST",
                            url: "timer.php",
                            data: "vill="+this._currentVillage+"&current="+WD.currentVillage,
                            success: function(msg){
                              $('#info_timeunit').html(msg);
                            }
						});
						$('#info_timeunit_row').show();
					}
                    this.calcPos();
                    this.el.fadeIn(50);
                    this._is_visible = true
                } else this.calcPos()
            } else if (this._is_visible) {
                WD.map.el.root.href = '#';
                if (WD.map.el.mover) WD.map.el.mover.style.cursor = 'move';
                this.hide()
            };
            this._x = x;
            this._y = y
        },
        calcPos: function () {
            var el_size = [this.el.width(), this.el.height()],
                constraint = [$(window).scrollLeft() + 3, $(window).scrollTop() + 3, $(window).scrollLeft() + $(window).width() - 3, $(window).scrollTop() + $(window).height() - 3];
            constraint[1] += $('#topContainer').height() + 3;
            constraint[3] -= $('#footer').height() - 3;
            if ((this._py + 15 + el_size[1]) < constraint[3]) {
                y = this._py + 15
            } else if ((this._py - 15 - constraint[1]) >= el_size[1]) {
                y = this._py - el_size[1] - 15
            } else y = this._py + 15;
            x = this._px + 15;
            x -= Math.max(0, x + el_size[0] - constraint[2]);
            x = Math.max(x, $(window).scrollLeft());
            this.el.css('left', x + 'px');
            this.el.css('top', y + 'px')
        },
        invalidPos: function () {
            this.el.css('left', '-2000px').css('top', '-2000px')
        },
        register: function () {
            $(WD.map.el.root).mousemove(function (event) {
                return WD.popup.handleMouseMove(event)
            })
        },
        unregister: function () {
            $(WD.map.el.root).unbind('mousemove');
            if (WD.map.el.mover) WD.map.el.mover.style.cursor = 'move';
            this.hide()
        },
        hide: function () {
            if (this._is_visible) {
                this._currentVillage = 0;
                this.el.fadeOut(50);
                this._x = 0;
                this._y = 0;
                this._is_visible = false
            }
        }
    },
    con: {
        SEC_COUNT: 1,
        SUB_COUNT: 1,
        CON_COUNT: 1,
        continentByXY: function (x, y) {
            var con_x = Math.floor(x / (WD.con.SEC_COUNT * WD.con.SUB_COUNT)),
                con_y = Math.floor(y / (WD.con.SEC_COUNT * WD.con.SUB_COUNT));
            return con_x + con_y * WD.con.CON_COUNT
        }
    },
    context: {
        _visible: true,
        hide: function () {
            if (this._visible) {
                this._visible = false;
                this._curFocus = -1
            }
        }
    }
}