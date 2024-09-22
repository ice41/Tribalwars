<?php namespace Twlan; ?>
/* 23706 trunk*/
/**** game/ColorGroups.js ****/
var ColorGroups = {
    for_groups_id: null,
    for_groups_name: null,
    for_villages_toggle: function(event, group_id, url)
    {
        var x = event.offset().left,
            y = event.offset().top - 400;
        ColorGroups.for_groups_id = group_id;
        ColorGroups.for_groups_name = unescapeHtml($('#groupname_' + ColorGroups.for_groups_id).html());
        UI.AjaxPopup(null, 'for_villages_popup', url, 'Gruppe-Informatione', ColorGroups.handle_for_groups_reload,
        {
            dataType: 'html',
            reload: true
        }, 290, 450, x, y)
    },
    add_for_village: function()
    {
        $('#new_group').show()
    },
    handle_for_groups_reload: function(data, target)
    {
        $('#msg_infobox').hide();
        $("#for_villages_popup_content").html(data);
        $('#for_group_id').val(ColorGroups.for_groups_id);
        $('#for_group_name').val(ColorGroups.for_groups_name);
        ColorGroups.get_asssigned(ColorGroups.for_groups_id, 'ally');
        ColorGroups.get_asssigned(ColorGroups.for_groups_id, 'player');
        ColorGroups.get_asssigned(ColorGroups.for_groups_id, 'village');
        $("#rename_group").click(function()
        {
            ColorGroups.ajax_request("rename_group", $('#for_group_name').val());
            $('#groupname_' + ColorGroups.for_groups_id).html(escapeHtml($('#for_group_name').val()))
        });
        $("#add_new_tribe").click(function()
        {
            ColorGroups.ajax_request("add_new_tribe", $('#new_tribe').val(), 'ally');
            $('#new_tribe').val('').focus()
        });
        $("#add_new_player").click(function()
        {
            ColorGroups.ajax_request("add_new_player", $('#new_player').val(), 'player');
            $('#new_player').val('').focus()
        });
        $("#add_new_village").click(function()
        {
            ColorGroups.ajax_request("add_new_village",
            {
                x: $('#add_village_x').val(),
                y: $('#add_village_y').val()
            }, 'village');
            $('#new_player').val('').focus()
        });
        UI.init()
    },
    get_asssigned: function(groupid, what)
    {
        ColorGroups.for_group_id = groupid;
        var call = '',
            table = null,
            remove = '';
        if (what == 'ally')
        {
            call = 'get_tribes_in_group';
            table = $('#tribes > tbody');
            remove = 'del_tribe'
        };
        if (what == 'player')
        {
            call = 'get_players_in_group';
            table = $('#players > tbody');
            remove = 'del_player'
        };
        if (what == 'village')
        {
            call = 'get_villages_in_group';
            table = $('#villages > tbody');
            remove = 'del_village'
        };
        $.ajax(
        {
            method: 'POST',
            url: $('#for_villages_form').attr('action'),
            type: 'POST',
            data:
            {
                what: call,
                group_id: groupid
            },
            dataType: 'json',
            success: function(data)
            {
                table.empty();
                $(data).each(function(index, item)
                {
                    var tr = $('<tr>'),
                        td = $('<td>').html(item.name),
                        del = $("<a>").attr('href', '#').html("lösche").click(function()
                        {
                            ColorGroups.ajax_request(remove, item.id, what);
                            return false
                        }),
                        td2 = $('<td>').append(del);
                    tr.append(td);
                    tr.append(td2);
                    table.append(tr)
                });
                if (what == 'village')
                    if (data.length > 0)
                    {
                        $('#toggle_villages_link').show()
                    }
                    else $('#toggle_villages_link').hide()
            }
        })
    },
    ajax_request: function(what, data, reload)
    {
        $('#msg_infobox').html(UI.Throbber);
        $.ajax(
        {
            type: 'POST',
            url: $('#for_villages_form').attr('action'),
            data:
            {
                what: what,
                group_id: ColorGroups.for_group_id,
                data: data
            },
            dataType: 'json',
            success: function(response)
            {
                ColorGroups.set_response(response.msg);
                if (response.code === true)
                {
                    if (reload == 'ally') ColorGroups.get_asssigned(ColorGroups.for_group_id, 'ally');
                    if (reload == 'player') ColorGroups.get_asssigned(ColorGroups.for_group_id, 'player');
                    if (reload == 'village')
                    {
                        ColorGroups.get_asssigned(ColorGroups.for_group_id, 'village');
                        $('#add_village_x').val('');
                        $('#add_village_y').val('')
                    }
                }
            }
        })
    },
    set_response: function(response)
    {
        $('#msg_infobox').html(response);
        $('#msg_infobox').show()
    },
    own_villages_toggle: function(event)
    {
        var popup = $("#own_villages");
        popup.toggle();
        var x = 0,
            y = 0,
            link = null;
        if (event.srcElement)
        {
            link = event.srcElement
        }
        else link = event.target;
        if ($.cookie('popup_pos_own_villages'))
        {
            var pos = $.cookie('popup_pos_own_villages').split('x');
            x = parseInt(pos[0], 10);
            y = parseInt(pos[1], 10)
        }
        else
        {
            x = $(link).offset().left;
            y = $(link).offset().top - popup.height() - 5
        };
        popup.offset(
        {
            left: x,
            top: y
        });
        UI.Draggable(popup)
    },
    group_villages_toggle: function()
    {
        $('#villages').slideToggle('fast')
    },
    r_picker: 0,
    g_picker: 0,
    b_picker: 0,
    picker_group_id: null,
    picker_icon: null,
    handle_color_picker_reload: function(data, target)
    {
        $(target).html(data);
        $('#color_picker').show();
        $('#color_group_id').val(picker_group_id);
        if (picker_icon == null)
        {
            $('#icon_picker').hide();
            $('#trans_color').hide()
        }
        else $('#icon_url').val(picker_icon);
        color_picker_choose(r_picker, g_picker, b_picker, true);
        if ($('#trans_color_input').attr('checked')) $('#color').css('background-color', 'transparent')
    },
    edit_color_toggle: function(event, url, group_id, r, g, b, icon, t)
    {
        var x = event.offset().left + 50,
            y = event.offset().top - 100,
            full_url = url + "&r=" + r + "&g=" + g + "&b=" + b;
        if (t) full_url += "&trans=" + t;
        r_picker = r;
        g_picker = g;
        b_picker = b;
        picker_group_id = group_id;
        picker_icon = icon;
        UI.AjaxPopup(null, 'edit_color_popup', full_url, 'Farbe bearbeite', ColorGroups.handle_color_picker_reload,
        {
            dataType: 'html',
            reload: true
        }, false, false, x, y)
    }
}; /**** game/freemap.js ****/
function FreeMap(div, coordToPixelScale, sectorSize, userHandler, bias)
{
    var _self_map = this;
    this.el = {};
    this.el.root = div;
    this.el.container = document.createElement('div');
    $(this.el.container).attr('style', 'position: absolute; left:0px; top:0px; z-index:1; overflow:visible');
    this.el.container.setAttribute('id', div.id + '_container');
    div.appendChild(this.el.container);
    this.size = [$(div).width(), parseInt(div.style.height, 10)];
    this.scale = coordToPixelScale;
    this.sectorSize = sectorSize;
    this.pos = [-1, -1];
    this.handler = userHandler;
    if (userHandler.onClick)
    {
        var _me = this;
        if ($.browser.msie)
        {
            $(this.el.root).mousedown(function(e)
            {
                _me._downEl = (e.which == 2 ? 0 : 1)
            }).mouseup(function(e)
            {
                if (_me._downEl == 1)
                    if (!_me._handleClick(e))
                    {
                        _me._downEl = 2;
                        return false
                    };
                _me._downEl = 0;
                return true
            }).click(function(e)
            {
                if (_me._downEl == 2) return false
            })
        }
        else $(this.el.root).click(function(e)
        {
            if (e.which == 2) return true;
            return _me._handleClick(e)
        })
    };
    this._lastTopLeftSector = [0, 0];
    this._lastBottomRightSector = [0, 0];
    this._visibleSectors = {};
    this._loadedSectors = {};
    this.viewport = [0, 0, 0, 0];
    this.bias = bias;
    this._handleClick = function(e)
    {
        if (this.mover && this.mover.moveDirty) return false;
        var pos = this.coordByEvent(e);
        return this.handler.onClick(pos[0], pos[1], e)
    };
    this.coordByPixel = function(x, y, use_float)
    {
        if (use_float === true)
        {
            return [x / this.scale[0], y / this.scale[1]]
        }
        else return [Math.floor(x / this.scale[0]), Math.floor(y / this.scale[1])]
    };
    this.pixelByCoord = function(x, y)
    {
        return [(x * this.scale[0]), (y * this.scale[1])]
    };
    this.sectorByPixel = function(x, y)
    {
        return [Math.floor(x / this.scale[0] / this.sectorSize), Math.floor(y / this.scale[1] / this.sectorSize)]
    };
    this.coordByEvent = function(event)
    {
        var off = $(this.el.root).offset(),
            pos = [event.pageX - off.left + this.pos[0], event.pageY - off.top + this.pos[1]],
            x = Math.floor(pos[0] / this.scale[0]),
            y = Math.floor(pos[1] / this.scale[1]);
        return [x, y]
    };
    this.centerPos = function(x, y, fix_to_square)
    {
        var px = x * this.scale[0] - this.size[0] / 2 + this.scale[0] / 2,
            py = y * this.scale[1] - this.size[1] / 2 + this.scale[1] / 2;
        if (fix_to_square === true)
        {
            px -= (px % this.scale[0]);
            py -= (py % this.scale[1])
        };
        return this.setPosPixel(px, py)
    };
    this.setPos = function(x, y)
    {
        return this.setPosPixel(x * this.scale[0], y * this.scale[1])
    };
    this.setPosPixel = function(x, y)
    {
        if (x == this.pos[0] && y == this.pos[1]) return 0;
        if (isNaN(x) || isNaN(y)) return 0;
        x = Math.max(x, this.handler.scrollBound[0] * this.scale[0]);
        y = Math.max(y, this.handler.scrollBound[1] * this.scale[1]);
        this.pos[0] = x;
        this.pos[1] = y;
        if (this.handler.onMovePixel) this.handler.onMovePixel(x, y);
        var new_sect_count = 0,
            posBR = [x + this.size[0], y + this.size[1]],
            sTL = this.sectorByPixel(x, y),
            sBR = this.sectorByPixel(posBR[0], posBR[1]);
        if (!compareCoord(this._lastTopLeftSector, sTL) || !compareCoord(this._lastBottomRightSector, sBR))
        {
            var _sectors = [],
                load_sectors = [];
            for (var sx = sTL[0]; sx <= sBR[0]; sx++)
                for (var sy = sTL[1]; sy <= sBR[1]; sy++)
                {
                    var sectorID = sx + '_' + sy,
                        sector = this._loadedSectors[sectorID];
                    if (!sector)
                    {
                        sector = {
                            id: sectorID,
                            visible: false,
                            loaded: true,
                            sx: sx,
                            sy: sy,
                            x: sx * this.sectorSize,
                            y: sy * this.sectorSize,
                            _elements: [],
                            _element_root: null,
                            _map: _self_map,
                            appendElement: function(el, x, y)
                            {
                                el.style.left = (x * this._map.scale[0]) + 'px';
                                el.style.top = (y * this._map.scale[1]) + 'px';
                                this._elements.push(el);
                                if (this.dom_fragment === undefined)
                                {
                                    this._element_root.appendChild(el)
                                }
                                else this.dom_fragment.appendChild(el)
                            },
                            spawn: function()
                            {
                                if (this.visible) return;
                                this._map.el.container.appendChild(this._element_root);
                                this.visible = true
                            },
                            despawn: function(force_rem)
                            {
                                if (!this.visible) return;
                                this._map.el.container.removeChild(this._element_root);
                                if (force_rem === true) this._element_root = null;
                                this.visible = false
                            }
                        };
                        var r = document.createElement('div');
                        r.style.width = (this.scale[0] * this.sectorSize) + 'px';
                        r.style.height = (this.scale[1] * this.sectorSize) + 'px';
                        r.style.position = 'absolute';
                        r.style.left = ((sx * this.sectorSize) * this.scale[0] - this.bias) + 'px';
                        r.style.top = ((sy * this.sectorSize) * this.scale[1] - this.bias) + 'px';
                        sector._element_root = r;
                        sector.spawn();
                        if (!this.handler.scrollBound || (sector.x >= (this.handler.scrollBound[0] - this.sectorSize) && sector.y >= (this.handler.scrollBound[1] - this.sectorSize) && sector.x < this.handler.scrollBound[2] && sector.y < this.handler.scrollBound[3])) load_sectors.push(sector)
                    };
                    _sectors.push(sector)
                };
            if (load_sectors.length)
            {
                new_sect_count = load_sectors.length;
                if (this.handler.loadSectors)
                {
                    this.handler.loadSectors(load_sectors)
                }
                else
                    for (var idx = 0; idx < new_sect_count; idx++) this.handler.loadSector(load_sectors[idx])
            };
            if (_sectors.length)
            {
                if (this.handler.preLoad) this.handler.preLoad(_sectors.length);
                var _newVisibleSectors = {},
                    _len = _sectors.length;
                for (var idx = 0; idx < _len; idx++)
                {
                    var sector = _sectors[idx];
                    if (sector.loaded) sector.spawn();
                    _newVisibleSectors[sector.id] = sector;
                    this._loadedSectors[sector.id] = sector
                };
                for (var idx in this._visibleSectors)
                {
                    if (!this._visibleSectors.hasOwnProperty(idx)) continue;
                    var it_sect = this._visibleSectors[idx];
                    if (_newVisibleSectors[it_sect.id] === undefined)
                    {
                        it_sect.despawn();
                        delete this._loadedSectors[idx]
                    }
                };
                if (this.handler.postLoad) this.handler.postLoad();
                this._visibleSectors = _newVisibleSectors
            }
        };
        var coordPos = this.getCenter();
        if ((!this.lastCenterCoordPos || !compareCoord(coordPos, this.lastCenterCoordPos)))
        {
            if (this.handler.onMove) this.handler.onMove(coordPos[0], coordPos[1]);
            this.lastCenterCoordPos = coordPos;
            this.recalcViewport()
        };
        x -= this.bias;
        y -= this.bias;
        this.el.container.style.left = -x + 'px';
        this.el.container.style.top = -y + 'px';
        return new_sect_count
    };
    this.getCenter = function()
    {
        return this.coordByPixel(this.pos[0] + this.size[0] / 2, this.pos[1] + this.size[1] / 2)
    };
    this.recalcViewport = function()
    {
        var x = this.pos[0],
            y = this.pos[1],
            coordTopLeft = this.coordByPixel(x, y),
            coordBottomRight = this.coordByPixel(x + this.size[0], y + this.size[1]);
        this.viewport = [coordTopLeft[0], coordTopLeft[1], coordBottomRight[0], coordBottomRight[1]]
    };
    this.inViewport = function(x, y)
    {
        return x >= this.viewport[0] && y >= this.viewport[1] && x <= this.viewport[2] && y <= this.viewport[3]
    };
    this.createMover = function(speed)
    {
        this.mover = new FreeMapMover(this);
        this.mover.setSpeed(speed)
    };
    this.reload = function(set_pos, keep_data)
    {
        if (!keep_data)
        {
            for (var idx in this._loadedSectors)
            {
                if (!this._loadedSectors.hasOwnProperty(idx)) continue;
                var sector = this._loadedSectors[idx];
                sector.despawn(true)
            };
            this._loadedSectors = {}
        };
        this._visibleSectors = {};
        if (this.handler.onReload) this.handler.onReload();
        if (set_pos !== false)
        {
            var x = this.pos[0],
                y = this.pos[1];
            this.pos = [0, 0];
            this.setPosPixel(x, y)
        }
    };
    this._resizeElements = [];
    this._resizeTargetPosition = [];
    this.resize = function(sx, sy, flags)
    {
        if (typeof sx === 'undefined')
        {
            var $container = $(this.el.root).parent();
            sx = $container.width();
            sy = $container.height()
        };
        var els = [
                [],
                []
            ],
            center = this.getCenter();
        if (!(flags & 2))
        {
            els[0].push(this.el.root);
            els[1].push(this.el.root)
        };
        if (this.handler.hasOwnProperty('getResizableElements'))
        {
            var els_add = this.handler.getResizableElements();
            els[0] = els[0].concat(els_add[0]);
            els[1] = els[1].concat(els_add[1])
        };
        this.size = [sx, sy];
        if (this.handler.hasOwnProperty('onResize')) this.handler.onResize(sx, sy);
        if (flags & 1)
        {
            $(els[0]).animate(
            {
                width: sx + 'px'
            },
            {
                duration: 400,
                queue: false
            });
            $(els[1]).animate(
            {
                height: sy + 'px'
            },
            {
                duration: 400,
                queue: false
            })
        }
        else
        {
            $(els[0]).width(sx);
            $(els[1]).height(sy)
        };
        if (!(flags & 2))
        {
            this.centerPos(center[0], center[1], false);
            this.recalcViewport()
        }
    };
    this._lastResizeSize = 0;
    this.createResizer = function(min_size, max_size, step)
    {
        step = step || 1;
        $(this.el.root).resizable(
        {
            grid: [step * this.scale[0], step * this.scale[1]],
            minWidth: min_size[0] * this.scale[0],
            maxWidth: max_size[0] * this.scale[0],
            minHeight: min_size[1] * this.scale[1],
            maxHeight: max_size[1] * this.scale[1],
            handles: 'se',
            zIndex: 13,
            start: $.proxy(function(event, ui)
            {
                if (this.handler.hasOwnProperty('onResizeBegin')) this.handler.onResizeBegin();
                TWMap.busy = true;
                this._resizeTargetPosition = this.getCenter()
            }, this),
            stop: $.proxy(function()
            {
                TWMap.busy = false;
                this.centerPos(this._resizeTargetPosition[0], this._resizeTargetPosition[1], false);
                if (this.handler.hasOwnProperty('onResizeEnd')) this.handler.onResizeEnd()
            }, this)
        }).resize($.proxy(function()
        {
            var el = $(this.el.root),
                sz = el.width() * 1e5 + el.height();
            if (sz == this._lastResizeSize) return;
            this._lastResizeSize = sz;
            this.resize(el.width(), el.height(), 2);
            this.pos = [0, 0];
            this.centerPos(this._resizeTargetPosition[0], this._resizeTargetPosition[1], false);
            this.recalcViewport()
        }, _self_map))
    };
    this.effects = {
        beaconCenter: function()
        {
            var $center_beacon = $('<div class="center_beacon"></div>'),
                $fx_container = $('#special_effects_container'),
                field_width = TWMap.map.scale[0],
                field_height = TWMap.map.scale[1],
                fields_horizontal = Math.floor($fx_container.width() / field_width),
                fields_vertical = Math.floor($fx_container.height() / field_height),
                x_offset = Math.round(Math.round(fields_horizontal + 0.5) / 2) * field_width,
                y_offset = Math.round(Math.round(fields_vertical + 0.5) / 2) * field_height;
            x_offset = x_offset - (field_width / 2);
            y_offset = y_offset - (field_height / 2);
            var $beacon_container = $('<div class="map_beacon_container"></div>');
            $beacon_container.css(
            {
                top: y_offset + 'px',
                left: x_offset + 'px'
            }).append($center_beacon);
            $fx_container.append($beacon_container);
            setTimeout(function()
            {
                if (Modernizr.cssanimations) $center_beacon.addClass('end');
                setTimeout(function()
                {
                    $beacon_container.remove()
                }, 600)
            }, 100)
        }
    };
    return true
}

function FreeMapMover(map)
{
    this.moveDirty = false;
    this.allowDrag = true;
    this.dragHandler = null;
    this.dragBeginHandler = null;
    this.dragEndHandler = null;
    this.dragBeginPosition = [];
    this.fixTouchEvent = function(event)
    {
        if (event.changedTouches)
        {
            event.clientX = event.changedTouches[0].clientX;
            event.clientY = event.changedTouches[0].clientY;
            event.pageX = event.changedTouches[0].pageX;
            event.pageY = event.changedTouches[0].pageY
        };
        return event
    };
    this.handleMouseDown = function(event)
    {
        if (this.touchIdentifier != null)
        {
            event.preventDefault();
            return false
        };
        event = this.fixTouchEvent(event);
        if (event.changedTouches) this.touchIdentifier = event.changedTouches[0].identifier;
        this.containerPos = [-(parseInt(this._map.el.container.style.left) - this._map.bias), -(parseInt(this._map.el.container.style.top) - this._map.bias)];
        this.mousePos = [event.clientX, event.clientY];
        this.moveDirty = false;
        if (this.crappy_browser)
        {
            this._el.setCapture();
            this._el.attachEvent('onmousemove', this._eventHandleMouseMove);
            this._el.attachEvent('onmouseup', this._eventHandleMouseUp);
            this._el.attachEvent('onlosecapture', this._eventHandleMouseUp)
        }
        else
        {
            window.addEventListener('touchmove', this._eventHandleMouseMove, true);
            window.addEventListener('mousemove', this._eventHandleMouseMove, true);
            window.addEventListener('touchend', this._eventHandleMouseUp, true);
            window.addEventListener('mouseup', this._eventHandleMouseUp, true);
            event.preventDefault()
        };
        if (this.useDragTimer !== false)
        {
            var _me = this;
            this.dragTimer = setInterval(function()
            {
                _me.IEDragTimer()
            }, this.useDragTimer);
            this.dragBeginPosition = [event.clientX, event.clientY];
            this.lastMousePositionForTimer = [event.clientX, event.clientY]
        }
    };
    this.handleMouseUp = function(event)
    {
        if (event.changedTouches && event.changedTouches[0].identifier != this.touchIdentifier) return false;
        this.touchIdentifier = null;
        if (this.crappy_browser)
        {
            this._el.releaseCapture();
            this._el.detachEvent('onmousemove', this._eventHandleMouseMove);
            this._el.detachEvent('onmouseup', this._eventHandleMouseUp);
            this._el.detachEvent('onlosecapture', this._eventHandleMouseUp)
        }
        else
        {
            window.removeEventListener('touchmove', this._eventHandleMouseMove, true);
            window.removeEventListener('mousemove', this._eventHandleMouseMove, true);
            window.removeEventListener('touchend', this._eventHandleMouseMove, true);
            window.removeEventListener('mouseup', this._eventHandleMouseUp, true)
        };
        if (this.useDragTimer !== false)
        {
            clearInterval(this.dragTimer);
            this.dragTimer = undefined
        };
        if (this.moveDirty)
            if (this.allowDrag && this._map.handler.hasOwnProperty('onDragEnd'))
            {
                this._map.handler.onDragEnd()
            }
            else if (this.dragEndHandler) this.dragEndHandler();
        if (!this.moveDirty && event.changedTouches && this._map.handler.onClick)
        {
            event = this.fixTouchEvent(event);
            var _ev = {};
            _ev.pageX = event.changedTouches[0].pageX;
            _ev.pageY = event.changedTouches[0].pageY;
            var pos = this._map.coordByEvent(_ev);
            this._map.handler.onClick(pos[0], pos[1])
        };
        setTimeout(jQuery.proxy(function()
        {
            this.moveDirty = false;
            TWMap.home.updateDisplay()
        }, this), 50);
        event.returnValue = false;
        if (event.preventDefault) event.preventDefault();
        return false
    };
    this.IEDragTimer = function()
    {
        var ev = {
            clientX: this.lastMousePositionForTimer[0],
            clientY: this.lastMousePositionForTimer[1]
        };
        if (ev.clientX == 0 && ev.clientY == 0) return;
        this.handleMouseMove(ev, true)
    };
    if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i))
    {
        this.useDragTimer = 100
    }
    else if ($.browser.webkit | $.browser.safari)
    {
        this.useDragTimer = 40
    }
    else if ($.browser.mozilla)
    {
        this.useDragTimer = 40
    }
    else if ($.browser.msie)
    {
        this.useDragTimer = 60
    }
    else if ($.browser.opera)
    {
        this.useDragTimer = 30
    }
    else this.useDragTimer = 60;
    this.handleMouseMove = function(event, is_timer_call)
    {
        if (event.changedTouches && event.changedTouches[0].identifier != this.touchIdentifier) return false;
        event = this.fixTouchEvent(event);
        if (this.useDragTimer !== false && is_timer_call === undefined)
        {
            this.lastMousePositionForTimer = [event.clientX, event.clientY];
            return false
        };
        var diff = [event.clientX - this.mousePos[0], event.clientY - this.mousePos[1]];
        this.mousePos = [event.clientX, event.clientY];
        var pos = [this.containerPos[0] - diff[0] * this._speed, this.containerPos[1] - diff[1] * this._speed];
        if (this._map.handler.scrollBound)
        {
            var limit = this._map.handler.scrollBound,
                nTL = this._map.coordByPixel(pos[0], pos[1], true);
            if (nTL[0] < limit[0] && diff[0] > 0) diff[0] = 0;
            if (nTL[1] < limit[1] && diff[1] > 0) diff[1] = 0;
            var nBR = this._map.coordByPixel(pos[0] + this._map.size[0], pos[1] + this._map.size[1]);
            if (nBR[0] > limit[2] && diff[0] < 0) diff[0] = 0;
            if (nBR[1] > limit[3] && diff[1] < 0) diff[1] = 0
        };
        if ((diff[0] != 0 || diff[1] != 0) && this.moveDirty == false)
        {
            if (this.allowDrag && this._map.handler.onDragBegin)
            {
                this._map.handler.onDragBegin()
            }
            else if (this.dragBeginHandler) this.dragBeginHandler();
            this.moveDirty = true
        };
        if (!this.allowDrag)
        {
            if (this.moveDirty && this.dragHandler) this.dragHandler(this.dragBeginPosition, this.mousePos, diff);
            return false
        };
        this.containerPos[0] -= diff[0] * this._speed;
        this.containerPos[1] -= diff[1] * this._speed;
        this._map.setPosPixel(this.containerPos[0], this.containerPos[1]);
        TWMap.home.updateDisplay();
        return false
    };
    this.setSpeed = function(speed)
    {
        this._speed = speed
    };
    this.preventDrag = function(v, beginHandler, endHandler)
    {
        if (v === true || v === false)
        {
            this.allowDrag = !v;
            this.dragHandler = null;
            this.dragEndHandler = null;
            $(this._el).css('cursor', 'move')
        }
        else
        {
            this.allowDrag = false;
            this.dragHandler = v;
            this.dragBeginHandler = beginHandler;
            this.dragEndHandler = endHandler;
            $(this._el).css('cursor', 'default')
        }
    };
    var el = document.createElement('div');
    el.setAttribute('id', map.el.root.id + '_mover');
    $(el).attr('style', 'position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 12; background-image: url("/graphic/map/empty.png"); cursor: move; -moz-user-select: none;');
    this.crappy_browser = (el.setCapture && el.detachEvent);
    var _this = this;
    this._eventHandleMouseDown = function(event)
    {
        return _this.handleMouseDown(event)
    };
    this._eventHandleMouseMove = function(event)
    {
        return _this.handleMouseMove(event)
    };
    this._eventHandleMouseUp = function(event)
    {
        return _this.handleMouseUp(event)
    };
    this._speed = 1;
    if (this.crappy_browser)
    {
        el.attachEvent('onmousedown', this._eventHandleMouseDown)
    }
    else
    {
        el.addEventListener('touchstart', this._eventHandleMouseDown, true);
        el.addEventListener('mousedown', this._eventHandleMouseDown, true)
    };
    this._map = map;
    this._el = el;
    map.el.mover = el;
    map.el.root.appendChild(el)
}

function compareCoord(a, b)
{
    return (a[0] == b[0] && a[1] == b[1])
}; /**** game/twmap.js ****/
var TWMap = {
    map: null,
    minimap: null,
    minimap_only: false,
    minimap_highlight: 0,
    mobile: false,
    fullscreen: false,
    cachePopupContents: false,
    minimap_cache_stamp: 0,
    mapSubSectorSize: 5,
    strings:
    {},
    urls:
    {},
    colors:
    {},
    graphics: null,
    image_base: null,
    images: ['gras1.png', 'gras2.png', 'gras3.png', 'gras4.png', 'v1_left.png', 'v1.png', 'v2_left.png', 'v2.png', 'v3_left.png', 'v3.png', 'v4_left.png', 'v4.png', 'v5_left.png', 'v5.png', 'v6_left.png', 'v6.png', 'b1_left.png', 'b1.png', 'b2_left.png', 'b2.png', 'b3_left.png', 'b3.png', 'b4_left.png', 'b4.png', 'b5_left.png', 'b5.png', 'b6_left.png', 'b6.png', 'berg1.png', 'berg2.png', 'berg3.png', 'berg4.png', 'forest0000.png', 'forest0001.png', 'forest0010.png', 'forest0011.png', 'forest0100.png', 'forest0101.png', 'forest0110.png', 'forest0111.png', 'forest1000.png', 'forest1001.png', 'forest1010.png', 'forest1011.png', 'forest1100.png', 'forest1101.png', 'forest1110.png', 'forest1111.png', 'see.png', 'event_xmas.png', 'event_easter.png', 'ghost.png', 'event_merchant.png', 'event_wizard.png', 'event_easter2014.png', 'event_fall2014.png'],
    ghost_village_tile: 51,
    images_secret_blue: [],
    images_secret_yellow: [],
    scriptMode: false,
    warMode: false,
    warModeGeneration: 0,
    villages:
    {},
    villageKey:
    {},
    players:
    {},
    allies:
    {},
    ghost: false,
    playerGroups:
    {},
    allyGroups:
    {},
    villageGroups:
    {},
    villageIcons:
    {},
    commandIcons:
    {},
    allyRelations:
    {},
    reservations:
    {},
    friends:
    {},
    targets: [],
    pos: [],
    size: [0, 0],
    isAutoSize: false,
    minimap_offset: [0, 0],
    minimap_size: [0, 0],
    currentCon: null,
    currentVillage: null,
    scrollBound: [0, 0, 1e3, 1e3],
    keys:
    {},
    ignore_villages: [],
    attackable_players: null,
    goFullscreen: function()
    {
        if (!TWMap.premium) return false;
        var el = document.getElementById('map_wrap'),
            events = 'fullscreenchange mozfullscreenchange webkitfullscreenchange';
        if (el.requestFullScreen)
        {
            el.requestFullScreen()
        }
        else if (el.mozRequestFullScreen)
        {
            el.mozRequestFullScreen()
        }
        else if (el.webkitRequestFullScreen)
        {
            el.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT)
        }
        else return false;
        $(document).bind(events, function()
        {
            var prev = TWMap.size;
            TWMap.fullscreen = true;
            TWMap.resize(0, false);
            $('#map_popup').detach().appendTo('#map_wrap');
            $('#minimap').detach().appendTo('#map_wrap');
            $('#fullscreen').hide();
            $(document).unbind(events).bind(events, function()
            {
                $('#map_popup').detach().appendTo($('body'));
                $('#minimap').detach().appendTo($('#minimap_cont'));
                $('#fullscreen').show();
                TWMap.resize(prev, true);
                TWMap.fullscreen = false;
                $(document).unbind(events)
            })
        })
    },
    showEmbeddedMap: function(topo_key, minimap_cache_stamp, x, y, highlight_village)
    {
        TWMap.minimap_only = true;
        TWMap.tileSize = [53, 28];
        TWMap.topoKey = topo_key;
        TWMap.minimap_highlight = highlight_village;
        TWMap.minimap_cache_stamp = minimap_cache_stamp ? minimap_cache_stamp : 0;
        TWMap.init();
        TWMap.focus(x, y, false)
    },
    storeSectorInformation: function(data_array)
    {
        var i;
        for (i = 0; i < data_array.length; i++)
        {
            var inf = data_array[i],
                data = inf.data,
                sx = data.x,
                sy = data.y;
            TWMap.storeVillage.set(sx, sy, inf.data);
            if (inf.tiles) TWMap.storeTiles.set(sx, sy, inf.tiles);
            if (inf.pmap) TWMap.storePolitical.set(sx, sy, inf.pmap);
            inf = null;
            data = null
        }
    },
    mapHandler:
    {
        _waitingSectors:
        {},
        onReceiveSectorInformation: function(data_array, skip_store)
        {
            if (!skip_store) TWMap.storeSectorInformation(data_array);
            for (var sector_idx = 0; sector_idx < data_array.length; sector_idx++)
            {
                var inf = data_array[sector_idx],
                    data = inf.data,
                    sx = data.x,
                    sy = data.y,
                    sectorData = this._waitingSectors[sx + '_' + sy];
                if (!sectorData) continue;
                if (inf.tiles) sectorData.tiles = inf.tiles;
                if (inf.pmap) sectorData.pmap = inf.pmap;
                sectorData.x = sx;
                sectorData.y = sy;
                sectorData.data = data;
                var village_ids = [];
                for (var x in data.villages)
                {
                    if (!data.villages.hasOwnProperty(x)) continue;
                    x = parseInt(x);
                    for (var y in data.villages[x])
                    {
                        if (!data.villages[x].hasOwnProperty(y)) continue;
                        y = parseInt(y);
                        var v = data.villages[x][y];
                        if (v[2] === 0) v[2] = TWMap.strings.barbarianVillage;
                        if ($.inArray(v[0], TWMap.ignore_villages) != -1) continue;
                        var xy = (sx + x) * 1e3 + sy + y;
                        TWMap.villageKey[v[0]] = xy;
                        TWMap.villages[xy] = {
                            id: v[0],
                            img: v[1],
                            name: v[2],
                            points: v[3],
                            owner: v[4],
                            mood: v[5],
                            bonus: v[6],
                            event_special: v[7],
                            xy: xy
                        };
                        village_ids.push(v[0])
                    }
                };
                if (TWMap.scriptMode) TWMap.popup.loadVillage(village_ids.join(','));
                for (var player_id in data.players)
                {
                    if (!data.players.hasOwnProperty(player_id)) continue;
                    var v = data.players[player_id];
                    TWMap.players[player_id] = {
                        name: v[0],
                        points: v[1],
                        ally: v[2],
                        newbie: v[3],
                        sleep: v[4],
                        image_id: v[5]
                    }
                };
                for (var ally_id in data.allies)
                {
                    if (!data.allies.hasOwnProperty(ally_id)) continue;
                    var v = data.allies[ally_id];
                    TWMap.allies[ally_id] = {
                        name: v[0],
                        points: v[1],
                        tag: v[2],
                        image_id: v[3]
                    }
                };
                for (var i = 0; i < sectorData.queue.length; i++)
                {
                    sectorData.queue[i].loaded = true;
                    this.spawnSector(sectorData, sectorData.queue[i])
                };
                delete this._waitingSectors[sx + '_' + sy]
            }
        },
        getSectorIdByTile: function(x_coord, y_coord)
        {
            var sector_leftmost_x_coord = x_coord - (x_coord % 20),
                sector_topmost_y_coord = y_coord - (y_coord % 20);
            return sector_leftmost_x_coord + '_' + sector_topmost_y_coord
        },
        getSubsectorIdByTile: function(x_coord, y_coord)
        {
            var subsector_leftmost_x_coord = Math.floor(x_coord / 5),
                subsector_topmost_y_coord = Math.floor(y_coord / 5);
            return subsector_leftmost_x_coord + '_' + subsector_topmost_y_coord
        },
        loadSectors: function(sectors)
        {
            var wait_sectors = [];
            for (var i = 0; i < sectors.length; i++)
            {
                var sector = sectors[i],
                    sx = sector.x - (sector.x % 20),
                    sy = sector.y - (sector.y % 20),
                    sector_id = sx + '_' + sy,
                    wait_data = this._waitingSectors[sector_id];
                if (wait_data)
                {
                    wait_data.queue.push(sector)
                }
                else
                {
                    wait_data = {
                        id: sector_id,
                        x: sx,
                        y: sy,
                        tiles: null,
                        pmap: null,
                        data: null,
                        queue: [sector]
                    };
                    this._waitingSectors[sector_id] = wait_data;
                    wait_sectors.push(wait_data)
                }
            };
            if (wait_sectors.length < 1) return;
            this._sector_request_queue = [];
            for (var i = 0; i < wait_sectors.length; i++)
            {
                var wait_data = wait_sectors[i];
                wait_data.tiles = TWMap.storeTiles.get(wait_data.x, wait_data.y);
                wait_data.data = TWMap.storeVillage.get(wait_data.x, wait_data.y);
                if (TWMap.politicalMap.displayed)
                {
                    wait_data.pmap = TWMap.storePolitical.get(wait_data.x, wait_data.y)
                }
                else wait_data.pmap = [
                    [],
                    []
                ];
                if (wait_data.data !== null && wait_data.tiles !== null && wait_data.pmap !== null)
                {
                    this.onReceiveSectorInformation([wait_data], true)
                }
                else this._sector_request_queue.push(wait_data)
            };
            if (this._sector_request_queue.length > 0)
            {
                var query_string = 'map.php?v=2&e=' + ((new Date()).getTime());
                for (var i = 0; i < this._sector_request_queue.length; i++)
                {
                    var wait_data = this._sector_request_queue[i],
                        query_val = 0;
                    if (wait_data.tiles === null) query_val += 1;
                    if (wait_data.pmap === null) query_val += 2;
                    query_string += '&' + wait_data.id + '=' + query_val
                };
                $.ajax(
                {
                    type: 'GET',
                    url: query_string,
                    dataType: 'json',
                    success: function(data)
                    {
                        return TWMap.mapHandler.onReceiveSectorInformation(data, false)
                    }
                });
                this._sector_request_queue = []
            }
        },
        onMovePixel: function(x, y)
        {
            if (!this.busy) TWMap.positionMinimap();
            if (TWMap.minimap_only) return;
            x -= TWMap.map.bias;
            y -= TWMap.map.bias;
            TWMap.map_el_coordy.style.top = -y + 'px';
            TWMap.map_el_coordx.style.left = -x + 'px';
            TWMap.context.hide()
        },
        onMove: function(x, y)
        {
            TWMap.pos = [x, y];
            if (TWMap.minimap_only) return;
            var cymax = Math.min(1e3, y + 20);
            for (var cy = Math.max(0, y - 20); cy < cymax; cy++)
            {
                if (TWMap._coord_el_y_active[cy]) continue;
                TWMap._coord_el_y_active[cy] = true;
                TWMap.map_el_coordy.appendChild(TWMap._coord_el_y[cy])
            };
            var cxmax = Math.min(1e3, x + 20);
            for (var cx = Math.max(0, x - 20); cx < cxmax; cx++)
            {
                if (TWMap._coord_el_x_active[cx]) continue;
                TWMap._coord_el_x_active[cx] = true;
                TWMap.map_el_coordx.appendChild(TWMap._coord_el_x[cx])
            };
            if (TWMap.busy) return;
            TWMap.busy = true;
            TWMap.updateContinent();
            TWMap.busy = false
        },
        onDragBegin: function()
        {
            TWMap.popup.unregister()
        },
        onDragEnd: function()
        {
            TWMap.popup.register()
        },
        onClick: function(x, y, e)
        {
            var village = TWMap.villages[x * 1e3 + y];
            if (village)
            {
                if (TWMap.warMode && Warplanner.admin)
                {
                    Warplanner.onVillageClicked(village.id, x, y);
                    return false
                }
                else if (!TWMap.context.enabled)
                {
                    if (!e || ($.browser.msie && ~~($.browser.version) < 8)) window.location.href = TWMap.urls.villageInfo.replace(/__village__/, village.id);
                    return true
                };
                TWMap.context.spawn(village, x, y)
            }
            else TWMap.context.hide();
            return false
        },
        onReload: function()
        {
            this._waitingSectors = {};
            TWMap.allies = {};
            TWMap.villages = {}
        },
        _createBorder: function(isConBorder)
        {
            var el = document.createElement('div');
            if (isConBorder)
            {
                el.className = 'map_con_border'
            }
            else el.className = 'map_border';
            if (TWMap.night && !TWMap.classic_gfx) el.className += '_night';
            el.style.zIndex = '3';
            el.style.position = 'absolute';
            return el
        },
        spawnSector: function(data, sector)
        {
            alert('Missing spawnSector function!')
        }
    },
    minimapHandler:
    {
        loadSector: function(sector)
        {
            var el = document.createElement('img');
            el.style.position = 'absolute';
            el.style.zIndex = '1';
            var vid = '';
            if (game_data && game_data.village) vid = '&village_id=' + game_data.village.id;
            var pmap = (TWMap.politicalMap.displayed && !TWMap.warMode) ? TWMap.politicalMap.filter : 0,
                church = TWMap.church.displayed ? 1 : 0,
                war = TWMap.warMode ? 1 + TWMap.warModeGeneration : 0;
            el.setAttribute('src', 'page.php?page=topo_image&player_id=' + game_data.player.id + vid + '&x=' + sector.x + '&y=' + sector.y + '&church=' + church + '&political=' + pmap + '&war=' + war + '&watchtower=' + (TribalWars._settings.map_show_watchtower ? 1 : 0) + '&key=' + TWMap.topoKey + '&cur=' + game_data.village.id + '&focus=' + TWMap.minimap_highlight + '&local_cache=' + TWMap.minimap_cache_stamp);
            sector.appendElement(el, 0, 0);
            for (var village_id in TWMap.secrets)
            {
                if (!TWMap.secrets.hasOwnProperty(village_id)) continue;
                var type = TWMap.secrets[village_id][0],
                    x = TWMap.secrets[village_id][1] - sector.x,
                    y = TWMap.secrets[village_id][2] - sector.y;
                if (x < 0 || y < 0 || x >= TWMap.minimap.sectorSize || y >= TWMap.minimap.sectorSize) continue;
                var flag = document.createElement('img');
                flag.style.position = 'absolute';
                flag.style.margin = '-5px 0px 0px 2px';
                flag.style.zIndex = '2';
                flag.setAttribute('src', TWMap.image_base + '/icons/flag_' + (type == 1 ? 'blue' : 'yellow') + '.png');
                sector.appendElement(flag, x, y)
            }
        },
        onMovePixel: function(x, y)
        {
            if (TWMap.busy) return;
            TWMap.busy = true;
            if (TWMap.map)
            {
                var rx = (x / TWMap.minimap.scale[0]) + TWMap.minimap_offset[0],
                    ry = (y / TWMap.minimap.scale[1]) + TWMap.minimap_offset[1];
                TWMap.map.setPos(rx, ry);
                TWMap.home.updateDisplay()
            };
            TWMap.updateContinent();
            TWMap.busy = false
        },
        onClick: function(x, y, e)
        {
            TWMap.focus(x, y)
        }
    },
    positionMinimap: function()
    {
        if (this.minimap)
        {
            var _old_busy = this.busy;
            this.busy = true;
            this.minimap.setPos(this.map.pos[0] / this.map.scale[0] - this.minimap_offset[0], this.map.pos[1] / this.map.scale[1] - this.minimap_offset[1]);
            this.busy = _old_busy
        }
    },
    updateCommandIcon: function(village, type, visible)
    {
        var subsector_id = this.mapHandler.getSubsectorIdByTile(village.x, village.y);
        if (typeof this.map._loadedSectors[subsector_id] === 'undefined') return;
        if (typeof this.commandIcons[village.id] === 'undefined') this.commandIcons[village.id] = [];
        var icons = this.commandIcons[village.id];
        icons = $.grep(icons, function(icon)
        {
            return icon.img !== type
        });
        if (visible) icons.push(
        {
            img: type
        });
        this.commandIcons[village.id] = icons;
        $(this.map._loadedSectors[subsector_id]._element_root).find('[id*=map_cmdicons_' + village.id + ']').remove();
        var icon_elements = this.generateCommandIcons(village.id),
            subsector_column = village.x % 5,
            subsector_row = village.y % 5;
        for (var i = 0; i < icon_elements.length; i++) this.map._loadedSectors[subsector_id].appendElement(icon_elements[i], subsector_column, subsector_row)
    },
    generateCommandIcons: function(village_id)
    {
        var icons = [];
        if (TWMap.commandIcons[village_id])
        {
            var inf = TWMap.commandIcons[village_id],
                num_icons = inf.length,
                size_diff = (Math.max(2, inf.length) - 2) * 2,
                icon_width = 14 - size_diff;
            for (var i = 0; i < inf.length; i++)
            {
                var el_img = document.createElement('img');
                el_img.style.position = 'absolute';
                el_img.style.right = '0px';
                el_img.style.zIndex = '4';
                el_img.style.width = icon_width + 'px';
                el_img.style.height = icon_width + 'px';
                el_img.style.marginTop = '0px';
                el_img.style.marginLeft = (34 + (size_diff * 2) - i * (icon_width + 5 - size_diff)) + 'px';
                el_img.id = 'map_cmdicons_' + village_id + '_' + i;
                el_img.src = TWMap.image_base + '/map/' + inf[i].img + '.png';
                icons.push(el_img)
            }
        };
        return icons
    },
    createVillageIcons: function(v)
    {
        if (TWMap.minimap_only) return [];
        var icons = [];
        if (TWMap.secrets.hasOwnProperty(v.id))
        {
            var color = TWMap.secrets[v.id][0] == 1 ? 'blue' : 'yellow',
                el_img = document.createElement('img');
            el_img.style.position = 'absolute';
            el_img.style.top = '0px';
            el_img.style.left = '0px';
            el_img.style.width = '16px';
            el_img.style.height = '18px';
            el_img.style.marginLeft = '11px';
            el_img.style.zIndex = '3';
            el_img.src = TWMap.image_base + '/map/flag_' + color + '.png';
            icons.push(el_img)
        };
        if (TWMap.villageIcons[v.id])
        {
            var inf = TWMap.villageIcons[v.id];
            for (var i = 0; i < inf.length; i++)
            {
                var el_img = document.createElement('img');
                el_img.style.position = 'absolute';
                el_img.style.top = '0px';
                el_img.style.left = '0px';
                el_img.style.width = '18px';
                el_img.style.height = '18px';
                el_img.style.zIndex = '4';
                el_img.style.marginTop = '18px';
                el_img.style.marginLeft = (i * 20) + 'px';
                el_img.id = 'map_icons_' + v.id;
                el_img.style.backgroundColor = inf[i].c;
                el_img.src = inf[i].img ? inf[i].img : TWMap.image_base + '/blank-16x22.png';
                icons.push(el_img)
            }
        };
        var command_icons = this.generateCommandIcons(v.id);
        $(command_icons).each(function()
        {
            icons.push(this)
        });
        if (TWMap.warMode && Warplanner.data[v.id] && Warplanner.data[v.id].type !== 'D')
        {
            var el_img = document.createElement('img'),
                img = (Warplanner.data[v.id].type === 'A') ? 'attack' : 'fake';
            el_img.style.position = 'absolute';
            el_img.style.zIndex = '10';
            el_img.style.marginTop = ((38 - 30) / 2) + 'px';
            el_img.style.marginLeft = ((53 - 30) / 2) + 'px';
            el_img.src = TWMap.image_base + '/icons/warplanner_' + img + '.png';
            icons.push(el_img)
        };
        return icons
    },
    createVillageDot: function(col)
    {
        var circle = document.createElement('canvas');
        if (circle.getContext)
        {
            circle.style.position = 'absolute';
            circle.style.left = '0px';
            circle.style.top = '0px';
            circle.width = 18;
            circle.height = 18;
            circle.style.zIndex = '4';
            circle.style.marginTop = '0px';
            circle.style.marginLeft = '0px';
            var ctx = circle.getContext("2d");
            ctx.fillStyle = 'rgb(' + col[0] + ',' + col[1] + ',' + col[2] + ')';
            ctx.strokeStyle = "#000000";
            ctx.beginPath();
            ctx.arc(5, 5, 3.3, 0, Math.PI * 2, false);
            ctx.fill();
            ctx.stroke();
            return circle
        }
        else
        {
            var el_img = document.createElement('img');
            el_img.style.position = 'absolute';
            el_img.style.left = '0px';
            el_img.style.top = '0px';
            el_img.style.width = '6px';
            el_img.style.height = '6px';
            el_img.style.zIndex = '4';
            el_img.style.marginTop = '3px';
            el_img.style.marginLeft = '0px';
            el_img.style.border = '0px';
            el_img.style.backgroundColor = 'rgb(' + col[0] + ',' + col[1] + ',' + col[2] + ')';
            return el_img
        }
    },
    updateContinent: function()
    {
        var con = TWMap.con.continentByXY(TWMap.pos[0], TWMap.pos[1]);
        if (con != TWMap.currentCon)
        {
            $('#continent_id').html(con);
            TWMap.currentCon = con
        }
    },
    getMinimapScrollBound: function()
    {
        var r = [this.scrollBound[0], this.scrollBound[1], this.scrollBound[2], this.scrollBound[3]];
        r[0] -= this.minimap_offset[0];
        r[1] -= this.minimap_offset[1];
        r[2] += (this.minimap_size[0] - this.minimap_offset[0] - this.size[0]);
        r[3] += (this.minimap_size[1] - this.minimap_offset[1] - this.size[1]);
        return r
    },
    initMap: function()
    {
        alert('Missing initMap function!')
    },
    focus: function(x, y)
    {
        alert('Missing focus function!')
    },
    createSecretImageCache: function()
    {
        var i;
        for (i = 0; i < this.images.length; i++)
        {
            var m = this.images[i].match(/^([bv][0-9])((_left)?\.png)$/);
            if (m === null) continue;
            this.images_secret_blue[i] = m[1] + '_blue' + m[2];
            this.images_secret_yellow[i] = m[1] + '_yellow' + m[2]
        }
    },
    init: function()
    {
        this.politicalMap.optionToggle = new MapToggleBox(
        {
            id: 'pmap_options'
        });
        this.centerToggle = new MapToggleBox(
        {
            id: 'centercoords',
            url: this.urls.centerCoords
        });
        this.storeVillage = new TWMapStore(3, 30);
        this.storePolitical = new TWMapStore(3, 600);
        this.storeTiles = new TWMapStore(6, 86400);
        if (this.sectorPrefech)
        {
            this.storeSectorInformation(this.sectorPrefech);
            this.sectorPrefech = null
        };
        this.createSecretImageCache();
        this.initMap();
        if (TWMap.premium && !TWMap.light && (document.body.requestFullScreen || document.body.mozRequestFullScreen || document.body.webkitRequestFullScreen)) $('#fullscreen').show();
        this.strings.newbieProt = $('#newbieProt').val();
        this.strings.barbarianVillage = $('#barbarianVillage').val();
        this.strings.pointFormat = $('#pointFormat').val();
        this.strings.villageFormat = $('#villageFormat').val();
        this.strings.villageNotes = $('#villageNotes').val();
        this.strings.changesSaved = $('#changesSaved').val();
        this.strings.confirmCenterDelete = $('#confirmCenterDelete').val();
        this.strings.troopsSent = $('#troopsSent').val();
        TWMap.updateContinent();
        for (var res in TWMap.reservations)
        {
            if (!TWMap.reservations.hasOwnProperty(res)) continue;
            if (!TWMap.villageIcons[res]) TWMap.villageIcons[res] = [];
            var img = '/graphic/map/reserved_' + TWMap.reservations[res] + '.png';
            TWMap.villageIcons[res].unshift(
            {
                img: img
            })
        };
        this.context.init();
        var coord = window.location.hash.match(/^#([0-9]+);([0-9]+)$/);
        if (TWMap.map && coord !== null) setTimeout(function()
        {
            TWMap.map.centerPos(coord[1], coord[2])
        }, 100);
        setInterval(function()
        {
            var hash = '#' + TWMap.pos[0] + ';' + TWMap.pos[1];
            TWMap.centerList.updateNewBoxes();
            if (hash == window.location.hash) return;
            window.location.replace(hash)
        }, 200);
        if (!TWMap.map || game_data.village.id == null)
        {
            TWMap.home.active = false
        }
        else TWMap.home.init();
        Connection.registerObserver('map', this.synchronizer)
    },
    focusSubmit: function()
    {
        var x = ~~$('#mapx').val(),
            y = ~~$('#mapy').val();
        this.focusUserSpecified(x, y);
        return false
    },
    focusUserSpecified: function(x, y)
    {
        this.focus(x, y);
        if (TWMap.map) TWMap.map.effects.beaconCenter();
        return false
    },
    scrollBlock: function(x, y)
    {
        alert('scrollBlock function missing')
    },
    updateSizeSelect: function(size, selector_selectbox, selector_size)
    {
        var option_el;
        if (size[0] == size[1] && (option_el = $(selector_selectbox).find('option[value="' + size[0] + '"]')) && option_el.length > 0)
        {
            option_el.attr('selected', 'selected');
            $(selector_size).hide()
        }
        else
        {
            var sizestr = size[0] + 'x' + size[1];
            $(selector_size).show().val(sizestr).text(sizestr).attr("selected", "selected")
        }
    },
    notifyMapSize: function(isAuto, doRefresh)
    {
        var mapsize = this.size.join('x'),
            minisize = this.minimap_size.join('x'),
            cacheval = mapsize + '-' + minisize;
        if (TWMap._lastNotifiedMapsize == cacheval) return;
        TWMap._lastNotifiedMapsize = cacheval;
        this.updateSizeSelect(TWMap.size, '#map_chooser_select', '#current-map-size');
        this.updateSizeSelect(TWMap.minimap_size, '#minimap_chooser_select', '#current-minimap-size');
        if (!mobile && !TWMap.fullscreen)
        {
            $.ajax(
            {
                url: this.urls.sizeSave,
                data: 'map_size=' + mapsize + '&minimap_size=' + minisize,
                type: 'GET',
                success: function()
                {
                    if (doRefresh) window.location.reload()
                }
            })
        }
        else if (isAuto)
        {
            $.cookie("mobile_mapsize", 0,
            {
                expires: 7
            })
        }
        else $.cookie("mobile_mapsize", mapsize,
        {
            expires: 7
        })
    },
    scaleMinimap: function()
    {
        var sz_min = [~~(this.minimap.size[0] / this.minimap.scale[0]), ~~(this.minimap.size[1] / this.minimap.scale[1])],
            sz_max;
        if (this.map)
        {
            sz_max = [~~(this.map.size[0] / this.map.scale[0]), ~~(this.map.size[1] / this.map.scale[1])]
        }
        else sz_max = [0, 0];
        var offset = [~~((sz_min[0] - sz_max[0]) / 2), ~~((sz_min[1] - sz_max[1]) / 2)];
        this.minimap_offset = offset;
        this.minimap_size = sz_min;
        var el = document.getElementById('minimap_viewport'),
            vp_width = sz_max[0] * this.minimap.scale[0],
            vp_height = sz_max[1] * this.minimap.scale[1];
        el.style.width = vp_width + 'px';
        el.style.height = vp_height + 'px';
        var vp_left = offset[0] * this.minimap.scale[0],
            vp_top = offset[1] * this.minimap.scale[1];
        el.style.left = vp_left + 'px';
        el.style.top = vp_top + 'px'
    },
    tileDimensions: function(el)
    {
        return [Math.ceil(el.width() / this.tileSize[0]), Math.ceil(el.height() / this.tileSize[1])]
    },
    notifySavedChanges: function()
    {
        UI.SuccessMessage(TWMap.strings.changesSaved)
    },
    centerList:
    {
        enabled: false,
        el_x: null,
        el_y: null,
        last_x: 0,
        last_y: 0,
        init: function()
        {
            if (!this.enabled) return;
            var el = $('#centerlist_new_tpl').clone().attr('id', 'centerlist_new').css('padding-top', '7px').show();
            this.el_x = el.find('input[name=center_x]').attr('id', 'center_new_x').val('');
            this.el_y = el.find('input[name=center_y]').attr('id', 'center_new_y').val('');
            this.last_x = 0;
            this.last_y = 0;
            $('#centercoords > td').append(el);
            setTimeout(function()
            {
                el.find('input[name=center_name]').focus()
            }, 20)
        },
        updateNewBoxes: function()
        {
            var x = TWMap.pos[0],
                y = TWMap.pos[1];
            if (!this.el_x || !this.el_y) return;
            if (this.el_x.is(':focus') || this.el_y.is(':focus')) return;
            if ((this.last_x && this.el_x.val() != this.last_x) || (this.last_y && this.el_y.val() != this.last_y)) return;
            this.last_x = x;
            this.last_y = y;
            this.el_x.val(x);
            this.el_y.val(y)
        },
        go: function(id)
        {
            var el = document.getElementById('center_' + id);
            if (!el) return false;
            el = $(el);
            var x = el.data('x'),
                y = el.data('y');
            TWMap.focusUserSpecified(~~x, ~~y)
        },
        edit: function(id)
        {
            var el = $('#center_' + id),
                n = $('#centerlist_new_tpl').clone().attr('id', 'centeredit_' + id);
            n.data('el', el).data('id', id).show();
            var el_x = n.find('input[name=center_x]').val(el.data('x')),
                el_y = n.find('input[name=center_y]').val(el.data('y')),
                el_name = n.find('input[name=center_name]').val(this.getName(id));
            el.after(n).detach();
            el_x.focus()
        },
        del: function(id)
        {
            var handleDelete = function()
                {
                    TWMap.centerList.save(id, 0, 0, '', true)
                },
                name = this.getName(id),
                msg = TWMap.strings.confirmCenterDelete.replace(/%name%/, name),
                buttons = [
                {
                    text: 'Confirm',
                    callback: handleDelete,
                    confirm: true
                }];
            UI.ConfirmationBox(msg, buttons)
        },
        submit: function(t)
        {
            t = $(t).parent();
            t.find('input[type=submit]').attr('disabled', 'disabled');
            var el = t.data('el'),
                id = t.data('id'),
                x = t.find('input[name=center_x]').val(),
                y = t.find('input[name=center_y]').val(),
                name = t.find('input[name=center_name]').val();
            if (el && id)
            {
                t.before(el).remove();
                el.data('x', ~~x).data('y', ~~y);
                el.find('.center_coord').text('(' + x + '|' + y + ')');
                this.setName(id, name);
                this.save(id, x, y, name, false)
            }
            else this.save(-1, x, y, name, true);
            return false
        },
        save: function(id, x, y, name, reload)
        {
            $.post(TWMap.urls.centerSave,
            {
                id: id,
                x: x,
                y: y,
                name: name
            }, function(data)
            {
                if (reload) $('#centercoords').html(data)
            }, 'html')
        },
        getName: function(id)
        {
            return $('#center_' + id).find('.center_name').text()
        },
        setName: function(id, val)
        {
            $('#center_' + id).find('.center_name').text(val)
        }
    },
    CoordByXY: function(xy)
    {
        return [~~(xy / 1e3), xy % 1e3]
    },
    popup:
    {
        enabled: true,
        optionToggle: null,
        attackDots: ['', '/dots/green.png', '/dots/yellow.png', '/dots/red.png', '/dots/blue.png', '/dots/red_yellow.png', '/dots/red_blue.png'],
        attackMaxLoot: ['/max_loot/0.png', '/max_loot/1.png'],
        _px: 0,
        _py: 0,
        init: function()
        {
            var cookie = $.cookie('hide_map_popup');
            if (cookie === 'yes')
            {
                this.enabled = false
            }
            else $('#show_popup').attr('checked', 'checked');
            this.optionToggle = new MapToggleBox(
            {
                id: 'popup_options'
            });
            $('#form_map_popup').find('input').change(function()
            {
                $.post(TWMap.urls.savePopup, $('#form_map_popup').serialize(), function()
                {
                    TWMap.notifySavedChanges()
                });
                if (TWMap.popup.enabled) TWMap.popup.invalidateCache()
            });
            $('#show_popup').change(function()
            {
                var displayed = $(this).is(':checked');
                $.cookie('hide_map_popup', displayed ? null : 'yes');
                TWMap.popup.enabled = displayed;
                TWMap.notifySavedChanges()
            });
            this._cache = {};
            this.el = $('#map_popup');
            $(this.el).mousemove(function(event)
            {
                return TWMap.popup.handleMouseMove(event)
            });
            this.register();
            var _me = this;
            $(TWMap.map.el.root).mouseout(function()
            {
                _me.hide()
            });
            this._loadingText = $('#info_extra_info').find('td').html()
        },
        userImageURL: function(image_id)
        {
            return TWMap.image_base + 'userimage/' + image_id + '_thumb'
        },
        invalidateCache: function()
        {
            this._cache = {}
        },
        receivedPopupInformation: function(data)
        {
            if (data[0])
            {
                for (var k = 0; data[k] !== undefined; k++) this.receivedPopupInformationForSingleVillage(data[k])
            }
            else
            {
                this.receivedPopupInformationForSingleVillage(data);
                this.calcPos()
            }
        },
        receivedPopupInformationForSingleVillage: function(data)
        {
            var v = TWMap.villages[data.xy];
            if (!v) return;
            if (TWMap.scriptMode) v.extra = data;
            this._cache[data.id] = data;
            var p = TWMap.CoordByXY(data.xy);
            this.displayForVillage(v, p[0], p[1]);
            if (!TWMap.cachePopupContents) delete this._cache[data.id]
        },
        popupOptionsSet: function()
        {
            var checkboxes = $('#popup_options').find('input[type=checkbox]'),
                state = false;
            checkboxes.each(function()
            {
                if ($(this).is(":checked") == true) state = true
            });
            return state
        },
        _isAwayFromContext: function(x, y)
        {
            if (TWMap.context._curFocus == -1) return true;
            var p = TWMap.CoordByXY(TWMap.context._curFocus),
                diff = [Math.abs(x - p[0]), Math.abs(y - p[1])];
            return diff[0] >= 2 || diff[1] >= 2
        },
        loadVillage: function(village_id)
        {
            $.ajax(
            {
                url: TWMap.urls.villagePopup.replace(/__village__/, village_id),
                dataType: 'json',
                type: 'GET',
                success: function(data)
                {
                    return TWMap.popup.receivedPopupInformation(data)
                }
            });
            this._cache[village_id] = 'notanobject'
        },
        handleMouseMove: function(event)
        {
            if (this != TWMap.popup) return false;
            var pos = TWMap.map.coordByEvent(event),
                x = pos[0],
                y = pos[1],
                coordidx = x * 1e3 + y,
                village = TWMap.villages[coordidx];
            if (village && TWMap.map.inViewport(x, y) && this._isAwayFromContext(x, y))
            {
                TWMap.context.hide();
                if (village.special == 'ghost')
                {
                    TWMap.map.el.root.href = TWMap.urls.ctx.mp_invite
                }
                else TWMap.map.el.root.href = TWMap.urls.ctx.mp_info.replace(/__village__/, village.id);
                this._currentVillage = village.id;
                if (TWMap.map.el.mover) TWMap.map.el.mover.style.cursor = 'pointer';
                if (!this.enabled) return false;
                this._px = event.pageX;
                this._py = event.pageY;
                if (this._x != x || this._y != y)
                {
                    this.displayForVillage(village, x, y);
                    this.el.fadeIn(50);
                    this._is_visible = true
                }
                else this.calcPos()
            }
            else
            {
                if (TWMap.map.el.mover)
                {
                    var cursor = TWMap.warMode ? 'default' : 'move';
                    TWMap.map.el.mover.style.cursor = cursor
                };
                if (this._is_visible)
                {
                    TWMap.map.el.root.href = '#';
                    this.hide()
                }
            };
            this._x = x;
            this._y = y
        },
        displayForVillage: function(village, x, y)
        {
            if (this._currentVillage != village.id) return;
            var owner = TWMap.players[village.owner],
                dat = {
                    bonus: null,
                    name: village.name,
                    x: x,
                    y: y,
                    continent: TWMap.con.continentByXY(x, y),
                    points: village.points,
                    owner: null,
                    owner_image: null,
                    newbie: null,
                    ally: null,
                    ally_image: null,
                    extra: null,
                    special: null,
                    units: [],
                    units_display:
                    {}
                };
            if (village.hasOwnProperty('special')) dat.special = village.special;
            if (village.bonus) dat.bonus = {
                text: village.bonus[0],
                img: TWMap.image_base + village.bonus[1]
            };
            if (owner)
            {
                dat.owner = owner;
                if (owner.newbie && village.owner != game_data.player.id) dat.owner.newbie_time = owner.newbie;
                if (owner.image_id && owner.image_id > 0) dat.owner_image = TWMap.popup.userImageURL(owner.image_id);
                var ally = TWMap.allies[owner.ally];
                if (ally)
                {
                    dat.ally = ally;
                    if (ally.image_id && ally.image_id > 0) dat.ally_image = TWMap.popup.userImageURL(ally.image_id)
                }
            };
            if (this.extraInfo && TWMap.popup.popupOptionsSet())
            {
                var extra = this._cache[village.id];
                if (typeof extra === 'undefined')
                {
                    this.loadVillage(village.id);
                    dat.extra = false
                }
                else if (typeof extra === 'object')
                {
                    var unit_checked = {
                        total: $('#map_popup_units').is(":checked"),
                        home: $('#map_popup_units_home').is(":checked"),
                        time: $('#map_popup_units_times').is(":checked")
                    };
                    dat.units_display.count = false;
                    dat.units_display.time = unit_checked.time && extra.id != TWMap.currentVillage;
                    if (unit_checked.total || unit_checked.home || unit_checked.time)
                        for (var name in extra.units)
                        {
                            if (!extra.units.hasOwnProperty(name)) continue;
                            var total = parseInt(extra.units[name]['count']['home']) + parseInt(extra.units[name]['count']['foreign']),
                                has_total = (unit_checked.total && total != 0);
                            if (has_total || (unit_checked.time && extra.units[name]['time']))
                            {
                                var cntstr = '';
                                if (has_total)
                                {
                                    cntstr = total;
                                    if (unit_checked.home && extra.units[name]['count']['home'] != 0) cntstr += '<br/><span class="unit_count_home">(' + extra.units[name]['count']['home'] + ')</span>';
                                    dat.units_display.count = unit_checked.total
                                };
                                dat.units.push(
                                {
                                    name: name,
                                    image: extra.units[name]['image'],
                                    time: extra.units[name]['time'],
                                    count: cntstr
                                })
                            }
                        };
                    dat.extra = extra
                }
            };
            $('#map_popup').html(jstpl('tpl_popup', dat));
            this.calcPos()
        },
        calcPos: function()
        {
            var el_size = [this.el.width(), this.el.height()],
                constraint = [$(window).scrollLeft() + 3, $(window).scrollTop() + 3, $(window).scrollLeft() + $(window).width() - 3, $(window).scrollTop() + $(window).height() - 3];
            constraint[1] += $('#topContainer').height() + 3;
            constraint[3] -= $('#footer').height() - 3;
            if ((this._py + 15 + el_size[1]) < constraint[3])
            {
                y = this._py + 15
            }
            else if ((this._py - 15 - constraint[1]) >= el_size[1])
            {
                y = this._py - el_size[1] - 15
            }
            else y = this._py + 15;
            x = this._px + 15;
            x -= Math.max(0, x + el_size[0] - constraint[2]);
            x = Math.max(x, $(window).scrollLeft());
            this.el.css('left', x + 'px');
            this.el.css('top', y + 'px')
        },
        invalidPos: function()
        {
            this.el.css('left', '-2000px').css('top', '-2000px')
        },
        register: function()
        {
            $(TWMap.map.el.root).mousemove(function(event)
            {
                return TWMap.popup.handleMouseMove(event)
            })
        },
        unregister: function()
        {
            $(TWMap.map.el.root).unbind('mousemove');
            if (TWMap.map.el.mover) TWMap.map.el.mover.style.cursor = 'move';
            this.hide()
        },
        hide: function()
        {
            if (this._is_visible)
            {
                this._currentVillage = 0;
                this.el.fadeOut(50);
                this._x = 0;
                this._y = 0;
                this._is_visible = false
            }
        }
    },
    reload: function(set_pos)
    {
        if (TWMap.light)
        {
            TWMap.focus(TWMap.pos[0], TWMap.pos[1])
        }
        else
        {
            var pos = TWMap.map.pos;
            set_pos = set_pos || false;
            TWMap.map.reload(set_pos);
            TWMap.minimap.reload(set_pos);
            TWMap.map.pos = [0, 0];
            TWMap.minimap.pos = [0, 0];
            TWMap.map.setPosPixel(pos[0], pos[1])
        }
    },
    politicalMap:
    {
        displayed: false,
        filter: 1,
        optionToggle: null,
        toggle: function(toggle_options)
        {
            var displayed = $('#politicalmap').is(':checked'),
                filter = ~~$('#pmap_options').find('input[name="pmap_filter"]:checked').val();
            if ($('#pmap_show_topo').is(':checked')) filter += 8;
            if ($('#pmap_show_map').is(':checked')) filter += 16;
            $.ajax(
            {
                url: TWMap.urls.changeShowPolitical,
                data:
                {
                    topo_show_politicalmap: displayed,
                    topo_politicalmap_filter: filter
                },
                type: 'GET',
                success: function()
                {
                    TWMap.notifySavedChanges()
                }
            });
            if (toggle_options)
                if (displayed)
                {
                    this.optionToggle.show()
                }
                else this.optionToggle.hide();
            if (displayed != this.displayed || (displayed && filter != this.filter))
            {
                this.displayed = displayed;
                this.filter = filter;
                TWMap.reload()
            }
        }
    },
    church:
    {
        displayed: false,
        enabled: ($.browser.msie != true),
        toggle: function()
        {
            this.displayed = $('#belief_radius').is(':checked');
            $.ajax(
            {
                url: TWMap.urls.changeShowBelief,
                data:
                {
                    topo_show_belief: this.displayed
                },
                type: 'GET',
                success: function()
                {
                    TWMap.notifySavedChanges()
                }
            });
            TWMap.reload()
        }
    },
    casual_hide:
    {
        toggle: function()
        {
            var is_hidden = $('#casual_hide').is(':checked');
            TribalWars.setSetting('map_casual_hide', is_hidden, function()
            {
                TWMap.reload();
                TWMap.notifySavedChanges()
            })
        }
    },
    watchtower:
    {
        toggle: function()
        {
            var show = $('#show_watchtower').is(':checked');
            TribalWars.setSetting('map_show_watchtower', show, function()
            {
                TWMap.reload()
            })
        }
    },
    inline_send:
    {
        enabled: false
    },
    con:
    {
        SEC_COUNT: 1,
        SUB_COUNT: 1,
        CON_COUNT: 1,
        continentByXY: function(x, y)
        {
            var con_x = Math.floor(x / (TWMap.con.SEC_COUNT * TWMap.con.SUB_COUNT)),
                con_y = Math.floor(y / (TWMap.con.SEC_COUNT * TWMap.con.SUB_COUNT));
            return con_x + con_y * TWMap.con.CON_COUNT
        }
    },
    context:
    {
        _curFocus: -1,
        _visible: true,
        strings:
        {},
        _circlePos: [
            [-12, -12],
            [-12, -49],
            [20, -30],
            [20, 6],
            [-11, 25],
            [-44, 6],
            [-44, -30],
            [20, -30],
            [20, 6]
        ],
        _otherOrder: ['mp_info', 'mp_lock', 'mp_profile', 'mp_msg', 'mp_fav', 'mp_res', 'mp_att', 'mp_farm_a', 'mp_farm_b'],
        _ownOrder: ['mp_info', 'mp_recruit', 'mp_profile', 'mp_overview', 'mp_fav', 'mp_res', 'mp_att', 'mp_farm_a', 'mp_farm_b'],
        _showPremium: false,
        init: function()
        {
            this.strings.villageFavoriteAdded = $('#villageFavoriteAdded').val();
            this.strings.villageFavoriteRemoved = $('#villageFavoriteRemoved').val()
        },
        FATooltip:
        {
            init: function(button, x, y)
            {
                var $button = $('#' + button),
                    minspeed = $button.data('minspeed'),
                    startVillage = game_data.village.coord.split("|"),
                    distance = this.distance(startVillage[0], startVillage[1], x, y),
                    duration = this.calculateDuration(distance, minspeed);
                $button.data("duration", duration);
                this.bind($button)
            },
            bind: function($button)
            {
                $button.bind('mouseover', function(e)
                {
                    if (typeof($button.data("tooltip")) == 'undefined')
                    {
                        UI.ToolTip($button,
                        {
                            bodyHandler: TWMap.context.FATooltip.create
                        });
                        $button.triggerHandler('mouseover')
                    }
                })
            },
            create: function()
            {
                var $button = $(this),
                    tpl = $button.data("tooltip-tpl"),
                    duration = $button.data("duration");
                return tpl + TWMap.context.FATooltip.formatDuration(duration)
            },
            distance: function(ax, ay, bx, by)
            {
                var dx = ax - bx,
                    dy = ay - by;
                return Math.sqrt(dx * dx + dy * dy)
            },
            calculateDuration: function(distance, speed)
            {
                return Math.round(distance / speed)
            },
            formatDuration: function(duration)
            {
                var hours = Math.floor(duration / 3600),
                    mins = Math.floor(duration / 60) % 60;
                if (mins < 10) mins = "0" + mins;
                var secs = duration % 60;
                if (secs < 10) secs = "0" + secs;
                var durationString = hours + ":" + mins + ":" + secs,
                    html = "<span style='line-height: 20px'>" + durationString + "</span><br />";
                return html
            }
        },
        spawn: function(village, x, y)
        {
            var coordidx = x * 1e3 + y;
            if (coordidx == this._curFocus)
            {
                if (village.special == 'ghost')
                {
                    window.location.href = TWMap.urls.ctx.mp_invite
                }
                else window.location.href = TWMap.urls.villageInfo.replace(/__village__/, village.id);
                return true
            };
            this.hide();
            var pos;
            if (TWMap.light)
            {
                pos = [(x - TWMap.posTL[0]) * TWMap.tileSize[0], (y - TWMap.posTL[1]) * TWMap.tileSize[1]]
            }
            else
            {
                TWMap.popup.hide();
                var pos_center = TWMap.map.pixelByCoord(x, y),
                    pos_topleft = TWMap.map.pos;
                pos = [pos_center[0] - pos_topleft[0], pos_center[1] - pos_topleft[1]]
            };
            pos[0] += TWMap.tileSize[0] / 2;
            pos[1] += TWMap.tileSize[1] / 2;
            var me = this,
                buttons = [],
                button_order = [];
            if (!village.hasOwnProperty('special'))
            {
                button_order = (village.owner == game_data.player.id) ? this._ownOrder : this._otherOrder
            }
            else if (village.special == 'ghost') button_order = [null, null, 'mp_invite', 'mp_invite_hide'];
            var circle_pos = this._circlePos;
            $(button_order).each(function(k, v)
            {
                if (village.owner == '0' && (v == 'mp_profile' || v == 'mp_msg'))
                {
                    return
                }
                else if (!me._showPremium && (v == 'mp_recruit' || v == 'mp_fav' || v == 'mp_lock'))
                {
                    return
                }
                else if ((v == 'mp_farm_a' || v == 'mp_farm_b') && (!game_data.player.farm_manager || VillageContext.send_attack_disabled || village.owner > 0 || village.event_special > 0))
                {
                    return
                }
                else if (game_data.village.id == village.id && (v == 'mp_res' || v == 'mp_att'))
                {
                    return
                }
                else if (game_data.player.ally == 0 && v == 'mp_lock')
                {
                    return
                }
                else if (!village.points && (v == 'mp_fav' || v == 'mp_lock'))
                {
                    return
                }
                else if (!VillageContext.claim_enabled && v === 'mp_lock') return;
                if (v === 'mp_msg' && !VillageContext.igm_enabled) return;
                if (v == 'mp_att' && !VillageContext.send_troops_enabled) return;
                if (v == 'mp_lock' && TWMap.reservations[village.id]) v = 'mp_unlock';
                if (v == 'mp_fav' && jQuery.inArray(parseInt(village.id), TWMap.targets) != -1) v = 'mp_unfav';
                if (v == 'mp_farm_a' || v == 'mp_farm_b') TWMap.context.FATooltip.init(v, x, y);
                $('#' + v).css('left', (pos[0] + circle_pos[k][0]) + 'px').css('top', (pos[1] + circle_pos[k][1]) + 'px').stop().css('opacity', 0).show().fadeTo(120, 1.0);
                if (TWMap.urls.ctx[v])
                {
                    var url = TWMap.urls.ctx[v].replace(/__village__/, village.id).replace(/__owner__/, village.owner).replace(/__source__/, game_data.village.id);
                    if (url.match(/json=1/))
                    {
                        me.ajaxRegister(v, url)
                    }
                    else $('#' + v)[0].href = url;
                    if (!mobile)
                        if (v == 'mp_att')
                        {
                            $('#' + v).off('click').on('click', function(e)
                            {
                                if (e.which != 1 || e.ctrlKey) return true;
                                if (TWMap.inline_send.enabled)
                                {
                                    TWMap.actionHandlers.command.click(village.id);
                                    return false
                                }
                            })
                        }
                        else if (v == 'mp_res') $('#' + v).off('click').on('click', function(e)
                    {
                        if (e.which != 1 || e.ctrlKey) return true;
                        if (TWMap.inline_send.enabled)
                        {
                            TWMap.actionHandlers.market.click(village.id);
                            return false
                        }
                    })
                };
                buttons.push(v)
            });
            this._curFocus = coordidx;
            this._visible = true
        },
        ajaxRegister: function(v, url)
        {
            $('#' + v).unbind('click').click(function(e)
            {
                e.preventDefault();
                var now = new Date().getTime();
                if (this._last && (now - this._last < 900)) return;
                this._last = now;
                TribalWars.get(url, null, function(data)
                {
                    TWMap.context.ajaxDone(v, data)
                });
                return false
            })
        },
        ajaxDone: function(key, data)
        {
            this.hide();
            var message_container = TWMap.fullscreen ? $('#map_wrap') : null;
            switch (key)
            {
                case 'mp_lock':
                case 'mp_unlock':
                    if (!data.code)
                    {
                        UI.ErrorMessage(data.error, null, message_container);
                        break
                    };
                    if (data.notice) UI.InfoMessage(data.notice, null, null, message_container);
                    if (!TWMap.villageIcons[data.village]) TWMap.villageIcons[data.village] = [];
                    var icons = TWMap.villageIcons[data.village];
                    if (data.type == 'delete')
                    {
                        for (var k in icons)
                            if (icons.hasOwnProperty(k) && icons[k].img && icons[k].img.match(/reserved/))
                            {
                                delete TWMap.reservations[data.village];
                                icons.splice(k, 1);
                                break
                            }
                    }
                    else
                    {
                        TWMap.reservations[data.village] = "player";
                        icons.unshift(
                        {
                            img: '/graphic/map/reserved_player.png'
                        })
                    };
                    TWMap.popup.invalidateCache();
                    TWMap.reload();
                    break;
                case 'mp_fav':
                case 'mp_unfav':
                    if (!data.code)
                    {
                        UI.ErrorMessage(data.error, null, message_container);
                        break
                    };
                    if (key == 'mp_fav')
                    {
                        UI.SuccessMessage(this.strings.villageFavoriteAdded, null, message_container);
                        TWMap.targets.push(data.id)
                    }
                    else
                    {
                        UI.SuccessMessage(this.strings.villageFavoriteRemoved, null, message_container);
                        var k = jQuery.inArray(data.id, TWMap.targets);
                        if (k != -1) TWMap.targets[k] = 0
                    };
                    break;
                case 'mp_farm_a':
                case 'mp_farm_b':
                    if (data.error)
                    {
                        UI.ErrorMessage(data.error, null, message_container)
                    }
                    else if (data.success)
                    {
                        if (TWMap.premium)
                        {
                            if (!TWMap.commandIcons[data.target_village])
                            {
                                TWMap.commandIcons[data.target_village] = [
                                {
                                    img: 'attack'
                                }]
                            }
                            else
                            {
                                var attack = false;
                                $.each(TWMap.commandIcons[data.target_village], function()
                                {
                                    if (this.img == 'attack')
                                    {
                                        attack = true;
                                        return false
                                    }
                                });
                                if (!attack) TWMap.commandIcons[data.target_village].push(
                                {
                                    img: 'attack'
                                })
                            };
                            TWMap.reload()
                        };
                        TWMap.popup.invalidateCache();
                        UI.InfoMessage(TWMap.strings.troopsSent, null, null, message_container)
                    };
                    break;
                case 'mp_invite_hide':
                    document.location.reload();
                    break
            }
        },
        hide: function()
        {
            if (this._visible)
            {
                $('.mp').stop().fadeTo(300, 0.0, function()
                {
                    if (!TWMap.context._visible) $('.mp').hide()
                });
                this._visible = false;
                this._curFocus = -1
            }
        }
    },
    home:
    {
        active: true,
        boundary: null,
        go_home: null,
        text: null,
        pointer: null,
        is_premium_account_hint_shown: false,
        focus: function()
        {
            var home = game_data.village;
            TWMap.focusUserSpecified(home.x, home.y)
        },
        init: function()
        {
            if (this.active)
            {
                this.createDisplayComponents();
                this.updateDisplay()
            }
        },
        createDisplayComponents: function()
        {
            var $home_boundary = $('<div id="map_go_home_boundary"></div>'),
                $go_home = $('<div id="map_go_home"></div>'),
                $inner_circle = $('<div id="map_go_home_circle"></div>');
            $inner_circle.click(TWMap.home.focus);
            var $text = $('<div id="map_go_home_text">home</div>');
            $inner_circle.append($text);
            var $pointer = $('<div id="map_go_home_pointer"></div>');
            $go_home.append($pointer);
            $go_home.append($inner_circle);
            $home_boundary.append($go_home);
            $('#map_wrap').append($home_boundary);
            this.boundary = $('#map_go_home_boundary');
            this.go_home = $('#map_go_home');
            this.text = $('#map_go_home_text');
            this.pointer = $('#map_go_home_pointer')
        },
        pointHome: function()
        {
            var home = game_data.village,
                center = TWMap.map.getCenter();
            center = {
                x: center[0],
                y: center[1]
            };
            var y = home.y - center.y,
                x = home.x - center.x,
                angle = Math.atan2(y, x);
            this.pointer.css(
            {
                transform: 'rotate(' + angle + 'rad)'
            })
        },
        updateDistance: function()
        {
            var home = game_data.village,
                center = TWMap.map.getCenter();
            center = {
                x: center[0],
                y: center[1]
            };
            var distance = Math.sqrt((home.x - center.x) * (home.x - center.x) + (home.y - center.y) * (home.y - center.y));
            this.text.text(Math.floor(distance));
            if (distance >= 15 && distance < 16) this.advertisePremiumIfNeeded()
        },
        skirt: function()
        {
            var home = game_data.village,
                center = TWMap.map.getCenter();
            center = {
                x: center[0],
                y: center[1]
            };
            var y = home.y - center.y,
                x = home.x - center.x,
                angle = -Math.atan2(y, x);
            if (angle < 0) angle = 2 * Math.PI + angle;
            var corner_angle = this.getTopRightCornerAngle(),
                side = 'bottom';
            if (angle < corner_angle || angle >= Math.PI * 2 - corner_angle)
            {
                side = 'right'
            }
            else if (angle <= Math.PI - corner_angle)
            {
                side = 'top'
            }
            else if (angle <= Math.PI + corner_angle) side = 'left';
            var bound = {
                    left: 0 + $('#map_coord_y_wrap').width(),
                    top: 0,
                    right: TWMap.map.size[0] - 50,
                    bottom: TWMap.map.size[1] - 50 - $('#map_coord_x_wrap').height()
                },
                left_offset = bound.left,
                top_offset = bound.top;
            switch (side)
            {
                case 'left':
                    left_offset = bound.left;
                    break;
                case 'right':
                    left_offset = bound.right;
                    break;
                case 'bottom':
                    top_offset = bound.bottom;
                    break;
                case 'top':
                default:
                    left_offset = bound.left;
                    break
            };
            if (side == 'right' || side == 'left')
            {
                var mod = (side == 'right') ? 1 : -1;
                top_offset = TWMap.map.size[1] / 2 - mod * (Math.tan(angle) * (TWMap.map.size[0] / 2));
                if (home.y > center.y) top_offset -= 50;
                if (mod > 0)
                {
                    top_offset = Math.min(top_offset, bound.right)
                }
                else top_offset = Math.max(top_offset, bound.left)
            };
            if (side == 'top' || side == 'bottom')
            {
                var mod = (side == 'top') ? 1 : -1,
                    left_offset = TWMap.map.size[0] / 2 - mod * (Math.tan(angle + Math.PI / 2) * (TWMap.map.size[1] / 2));
                if (home.x < center.x)
                {
                    left_offset -= 50;
                    left_offset = Math.max(left_offset, bound.left)
                }
                else left_offset = Math.min(left_offset, bound.right)
            };
            this.go_home.css(
            {
                left: left_offset + 'px',
                top: top_offset + 'px'
            })
        },
        updateDisplay: function()
        {
            if (!this.active) return;
            var home = game_data.village;
            if (TWMap.map.inViewport(home.x, home.y))
            {
                this.go_home.hide();
                return
            }
            else this.go_home.show();
            TWMap.home.updateDistance();
            TWMap.home.pointHome();
            TWMap.home.skirt()
        },
        getTopRightCornerAngle: function()
        {
            var delta_x = TWMap.map.size[0] / 2,
                delta_y = TWMap.map.size[1] / 2;
            return Math.atan2(delta_y, delta_x)
        },
        advertisePremiumIfNeeded: function()
        {
            if (game_data.player.premium || this.is_premium_account_hint_shown || this.mobile) return;
            $('.premium_account_hint').show().css(
            {
                display: 'inline-block'
            });
            TribalWars.post('map',
            {
                ajaxaction: 'show_premium_account_hint'
            });
            this.is_premium_account_hint_shown = true
        }
    },
    getColorByPlayer: function(player_id, ally_id, village_id)
    {
        if (!this.players[player_id]) return TWMap.colors.other;
        if (this.players[player_id].sleep)
        {
            return TWMap.colors['sleep']
        }
        else if (village_id && TWMap.villageGroups[village_id] && player_id != game_data.player.id)
        {
            return TWMap.villageGroups[village_id]
        }
        else if (TWMap.playerGroups[player_id])
        {
            return TWMap.playerGroups[player_id]
        }
        else if (player_id == game_data.player.id)
        {
            return TWMap.colors.player
        }
        else if (ally_id && TWMap.allyGroups[ally_id])
        {
            return TWMap.allyGroups[ally_id]
        }
        else if (game_data.player.ally > 0 && ally_id == game_data.player.ally)
        {
            return TWMap.colors.ally
        }
        else if (TWMap.allyRelations[ally_id])
        {
            return TWMap.colors[TWMap.allyRelations[ally_id]]
        }
        else if (TWMap.friends[player_id])
        {
            return TWMap.colors['friend']
        }
        else return TWMap.colors.other
    },
    actionHandlers:
    {}
};
$(function()
{
    'use strict';
    TWMap.synchronizer = {
        notify: function(event_name, data)
        {
            if (this.handlers.hasOwnProperty(event_name)) this.handlers[event_name](data)
        },
        handlers:
        {
            command_count: function(data)
            {
                if (TWMap.map)
                {
                    var is_visible = data.count > 0;
                    TWMap.updateCommandIcon(data.target_village, data.command_type, is_visible)
                }
            }
        }
    }
}());
TWMap.actionHandlers.command = {
    click: function(target_id)
    {
        TribalWars.get('place',
        {
            ajax: 'command',
            target: target_id
        }, function(data)
        {
            Dialog.show('map_command', data.dialog);
            $('#units_form').on('submit', TWMap.actionHandlers.command.sendTroops)
        })
    },
    sendTroops: function(e)
    {
        var data = $('#units_form').serializeArray();
        data.push(
        {
            name: command_target_widget.clicked_button,
            value: 'l'
        });
        TribalWars.post('place',
        {
            ajax: 'confirm'
        }, data, function(result)
        {
            Dialog.show('map_command', result.dialog);
            $('#command-confirm-form').on('submit', TWMap.actionHandlers.command.confirmSendTroops)
        });
        return false
    },
    confirmSendTroops: function()
    {
        var data = $('#command-confirm-form').serializeArray();
        TribalWars.post('place',
        {
            ajaxaction: 'map_command'
        }, data, function(result)
        {
            Dialog.close();
            UI.SuccessMessage(result.message);
            if (result.type == 'attack') TWMap.actionHandlers.command.ensureIconOnMap(result.target_id, result.type)
        });
        return false
    },
    ensureIconOnMap: function(village_id, icon)
    {
        if (!TWMap.premium) return;
        if (!TWMap.commandIcons[village_id])
        {
            TWMap.commandIcons[village_id] = [
            {
                img: icon
            }]
        }
        else
        {
            var found = false;
            $.each(TWMap.commandIcons[village_id], function()
            {
                if (this.img == icon)
                {
                    found = true;
                    return false
                }
            });
            if (!found) TWMap.commandIcons[village_id].push(
            {
                img: icon
            })
        };
        TWMap.reload()
    }
};
TWMap.actionHandlers.market = {
    click: function(target_id)
    {
        TribalWars.get('market',
        {
            ajax: 'send',
            target: target_id
        }, function(data)
        {
            Dialog.show('map_command', data.dialog);
            $('#market-send-form').on('submit', TWMap.actionHandlers.market.sendResources)
        })
    },
    sendResources: function()
    {
        var data = $(this).serializeArray();
        TribalWars.post('market',
        {
            ajax: 'confirm'
        }, data, function(result)
        {
            Dialog.show('map_market', result.dialog);
            $('#market-confirm-form').on('submit', TWMap.actionHandlers.market.confirmSendResources)
        });
        return false
    },
    confirmSendResources: function()
    {
        var data = $(this).serializeArray();
        TribalWars.post('market',
        {
            ajaxaction: 'map_send'
        }, data, function(result)
        {
            Dialog.close();
            UI.SuccessMessage(result.message)
        });
        return false
    }
}

function TWMapStore(_size, _ttl)
{
    var that = this,
        size = _size,
        ttl = _ttl * 1e3,
        data = new Array(size),
        i, j;
    for (i = 0; i < size; i++)
    {
        data[i] = new Array(size);
        for (j = 0; j < size; j++) data[i][j] = null
    };
    this.get = function(x, y)
    {
        var dx = (x / 20) % size,
            dy = (y / 20) % size,
            e = data[dx][dy],
            now = new Date().getTime();
        if (e === null || e[0] !== x || e[1] !== y) return null;
        if (e[2] < now)
        {
            data[dx][dy] = null;
            return null
        };
        return e[3]
    };
    this.set = function(x, y, obj)
    {
        var dx = (x / 20) % size,
            dy = (y / 20) % size,
            expire = new Date().getTime() + ttl,
            el = [x, y, expire, obj];
        data[dx][dy] = el
    }
}; /**** game/mapcanvas.js ****/
var MapCanvas = {
    box: 3,
    watchTowers: [],
    init: function()
    {
        var i;
        if (this.churchData)
            for (i = 0; i < this.churchData.length; i++) this.churchData[i][2] *= this.churchData[i][2]
    },
    createCanvas: function(sector, data)
    {
        var canvas = document.createElement('canvas');
        if (!canvas || !canvas.getContext) return null;
        var tileScale = TWMap.map.scale,
            size = TWMap.map.sectorSize;
        canvas.id = 'map_canvas_' + sector.x + '_' + sector.y;
        canvas.className = 'church_radius_display';
        canvas.width = (tileScale[0] * size);
        canvas.height = (tileScale[1] * size);
        canvas.style.position = 'absolute';
        canvas.style.zIndex = '10';
        sector.appendElement(canvas, 0, 0);
        var ctx = canvas.getContext("2d"),
            i;
        ctx.save();
        if (TribalWars._settings.map_show_watchtower)
            for (i = 0; i < this.watchTowers.length; i++)
            {
                var wtx = this.watchTowers[i][0],
                    wty = this.watchTowers[i][1],
                    wtr = this.watchTowers[i][2];
                if (this.watchtowerCoversSector(wtx, wty, wtr, sector))
                {
                    var wt_pixel = TWMap.map.pixelByCoord(wtx, wty),
                        st_pixel = TWMap.map.pixelByCoord(sector.x, sector.y),
                        pixeldiffx = wt_pixel[0] - st_pixel[0],
                        pixeldiffy = wt_pixel[1] - st_pixel[1];
                    ctx.beginPath();
                    MapCanvas.ellipse(ctx, pixeldiffx + TWMap.tileSize[0] / 2, pixeldiffy + TWMap.tileSize[1] / 2, wtr * TWMap.map.scale[0], wtr * TWMap.map.scale[1], 0, 0, 2 * Math.PI, false);
                    ctx.fillStyle = 'rgba(235, 38, 38, 0.1)';
                    ctx.fill();
                    ctx.lineWidth = 1;
                    ctx.strokeStyle = '#563f1e';
                    ctx.stroke()
                }
            };
        var churches = this.churchData,
            map = data.pmap[0],
            ally = data.pmap[1],
            width = 20;
        if (map.length < 1) map = null;
        var tilew = canvas.offsetWidth / size,
            tileh = canvas.offsetHeight / size;
        ctx.scale(tilew / 37.75, tileh / 37.75);
        var x, y, cells, pmap_filter = TWMap.politicalMap.filter % 8,
            war_mode = TWMap.warMode,
            show_pmap = !war_mode && TWMap.politicalMap.displayed && (TWMap.politicalMap.filter & 16),
            war;
        if (war_mode) war = Warplanner.data;
        for (y = sector.y - 1; y < sector.y + size + 1; y++)
            for (x = sector.x - 1; x < sector.x + size + 1; x++)
            {
                if (war_mode)
                {
                    var ee = x * 1e3 + y;
                    if (war && TWMap.villages.hasOwnProperty(ee))
                    {
                        var id = TWMap.villages[ee].id;
                        if (war[id] && war[id].type !== 'D')
                        {
                            cells = [false, false, false, false, true, false, false, false, false];
                            var col = Warplanner.getColorByPlayerId(war[id].player_id);
                            this.mapDrawCell(ctx, x - sector.x, y - sector.y, cells, col, 19, 19, .6)
                        }
                    }
                };
                if (show_pmap)
                {
                    var dx = x - data.x + 1,
                        dy = y - data.y + 1,
                        ee = dx + dy * (width + 2),
                        show_cell;
                    if (map && map[ee] !== 0)
                    {
                        var aa = (dx - 1) + (dy - 1) * (width + 2),
                            bb = (dx - 0) + (dy - 1) * (width + 2),
                            cc = (dx + 1) + (dy - 1) * (width + 2),
                            dd = (dx - 1) + dy * (width + 2),
                            ff = (dx + 1) + dy * (width + 2),
                            gg = (dx - 1) + (dy + 1) * (width + 2),
                            hh = (dx - 0) + (dy + 1) * (width + 2),
                            ii = (dx + 1) + (dy + 1) * (width + 2),
                            we = dx < 1,
                            ea = dx >= width + 1,
                            no = dy < 1,
                            so = dy >= width + 1;
                        if (pmap_filter == 1 || map[ee] == game_data.player.id)
                        {
                            cells = [we || no ? 0 : map[aa], no ? 0 : map[bb], ea || no ? 0 : map[cc], we ? 0 : map[dd], map[ee], ea ? 0 : map[ff], we || so ? 0 : map[gg], so ? 0 : map[hh], so || ea ? 0 : map[ii]];
                            var col = [255, 0, 255],
                                pid = map[ee],
                                aid = ally[ee];
                            col = TWMap.getColorByPlayer(pid, aid);
                            this.mapDrawCell(ctx, x - sector.x, y - sector.y, cells, col, 19, 19, .6)
                        };
                        if (pmap_filter == 1 || pmap_filter == 2 || (pmap_filter != 4 && ally[ee] == game_data.player.ally))
                        {
                            cells = [we || no ? 0 : ally[aa], no ? 0 : ally[bb], ea || no ? 0 : ally[cc], we ? 0 : ally[dd], ally[ee], ea ? 0 : ally[ff], we || so ? 0 : ally[gg], so ? 0 : ally[hh], so || ea ? 0 : ally[ii]];
                            this.mapDrawCell(ctx, x - sector.x, y - sector.y, cells, [0, 0, 0], 5, 19, 1)
                        }
                    }
                };
                if (TWMap.church.displayed && churches)
                {
                    cells = [false, false, false, false, false, false, false, false, false];
                    for (i = 0; i < churches.length; i++)
                    {
                        var cx = churches[i][0],
                            cy = churches[i][1],
                            crad = churches[i][2];
                        cells = [cells[0] || this.churchInBound(x - 1, y - 1, cx, cy, crad), cells[1] || this.churchInBound(x, y - 1, cx, cy, crad), cells[2] || this.churchInBound(x + 1, y - 1, cx, cy, crad), cells[3] || this.churchInBound(x - 1, y, cx, cy, crad), cells[4] || this.churchInBound(x, y, cx, cy, crad), cells[5] || this.churchInBound(x + 1, y, cx, cy, crad), cells[6] || this.churchInBound(x - 1, y + 1, cx, cy, crad), cells[7] || this.churchInBound(x, y + 1, cx, cy, crad), cells[8] || this.churchInBound(x + 1, y + 1, cx, cy, crad)]
                    };
                    this.mapDrawCell(ctx, x - sector.x, y - sector.y, cells, [128, 128, 255], 19, 19, .5)
                }
            };
        ctx.restore();
        ctx = null;
        canvas = null;
        return null
    },
    watchtowerCoversSector: function(watchtower_x, watchtower_y, watchtower_radius, sector)
    {
        var draw = false,
            ss = TWMap.map.sectorSize;
        if (watchtower_x >= sector.x && watchtower_x < sector.x + ss && watchtower_y >= sector.y && watchtower_y < sector.y + ss)
        {
            draw = true
        }
        else
        {
            var xdiff = sector.x + (TWMap.map.sectorSize / 2) - watchtower_x,
                ydiff = sector.y + (TWMap.map.sectorSize / 2) - watchtower_y,
                closestx, closesty;
            if (xdiff < 0 && ydiff < 0)
            {
                closestx = sector.x + TWMap.map.sectorSize;
                closesty = sector.y + TWMap.map.sectorSize
            }
            else if (xdiff < 0 && ydiff >= 0)
            {
                closestx = sector.x + TWMap.map.sectorSize;
                closesty = sector.y
            }
            else if (xdiff >= 0 && ydiff < 0)
            {
                closestx = sector.x;
                closesty = sector.y + TWMap.map.sectorSize
            }
            else if (xdiff >= 0 && ydiff >= 0)
            {
                closestx = sector.x;
                closesty = sector.y
            };
            var dist_to_wt = Math.sqrt(Math.pow(watchtower_x - closestx, 2) + Math.pow(watchtower_y - closesty, 2));
            draw = dist_to_wt <= watchtower_radius
        };
        return draw
    },
    mapDrawCell: function(ctx, x, y, cells, color, bw, rad, grad)
    {
        if (cells[4] === 0 || !color) return;
        x = (x + .5) * 38;
        y = (y + .5) * 38;
        ctx.save();
        ctx.translate(x, y);
        this.mapDrawBorderLine(ctx, this.mapGetSectorLine(cells[3] == cells[4], cells[0] == cells[4], cells[1] == cells[4], rad), bw, color, grad);
        ctx.restore();
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(Math.PI * .5);
        this.mapDrawBorderLine(ctx, this.mapGetSectorLine(cells[1] == cells[4], cells[2] == cells[4], cells[5] == cells[4], rad), bw, color, grad);
        ctx.restore();
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(Math.PI);
        this.mapDrawBorderLine(ctx, this.mapGetSectorLine(cells[5] == cells[4], cells[8] == cells[4], cells[7] == cells[4], rad), bw, color, grad);
        ctx.restore();
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(Math.PI * 1.5);
        this.mapDrawBorderLine(ctx, this.mapGetSectorLine(cells[7] == cells[4], cells[6] == cells[4], cells[3] == cells[4], rad), bw, color, grad);
        ctx.restore()
    },
    mapDrawBorderLine: function(ctx, points, width, color, grad)
    {
        if (points.length < 1) return;
        var p = 2,
            normals = [],
            x1, y1, x2, y2, dx, dy, sqlen, len, nx, ny, nx1, ny1, nx2, ny2, nx0, ny0, cg;
        for (var i = 0; i < points.length - 2; i += 2)
        {
            x1 = points[i];
            y1 = points[i + 1];
            x2 = points[i + 2];
            y2 = points[i + 3];
            dx = x2 - x1;
            dy = y2 - y1;
            sqlen = dx * dx + dy * dy;
            len = Math.sqrt(sqlen);
            normals[i] = dy / len;
            normals[i + 1] = -dx / len
        };
        var oldgco = ctx.globalCompositeOperation,
            oldfs = ctx.fillStyle;
        if (!grad) ctx.fillStyle = "rgba(" + color[0] + "," + color[1] + "," + color[2] + ",.7)";
        while (points[p + 4] != null)
        {
            x1 = points[p];
            y1 = points[p + 1];
            x2 = points[p + 2];
            y2 = points[p + 3];
            nx0 = normals[p - 2];
            ny0 = normals[p - 1];
            nx1 = normals[p];
            ny1 = normals[p + 1];
            nx2 = normals[p + 2];
            ny2 = normals[p + 3];
            nx = nx1;
            ny = ny1;
            nx2 += nx1;
            ny2 += ny1;
            nx1 += nx0;
            ny1 += ny0;
            len = Math.sqrt(nx2 * nx2 + ny2 * ny2);
            if (len > 0)
            {
                nx2 /= len;
                ny2 /= len
            };
            len = Math.sqrt(nx1 * nx1 + ny1 * ny1);
            if (len > 0)
            {
                nx1 /= len;
                ny1 /= len
            };
            if (grad)
            {
                cg = ctx.createLinearGradient(x1, y1, x1 + nx * width, y1 + ny * width);
                cg.addColorStop(0, "rgba(" + color[0] + "," + color[1] + "," + color[2] + "," + grad + ")");
                cg.addColorStop(1, "rgba(" + color[0] + "," + color[1] + "," + color[2] + ",0)");
                ctx.fillStyle = cg
            };
            ctx.beginPath();
            ctx.moveTo(x1, y1);
            ctx.lineTo(x2, y2);
            ctx.lineTo(x2 + nx2 * width, y2 + ny2 * width);
            ctx.lineTo(x1 + nx1 * width, y1 + ny1 * width);
            ctx.closePath();
            ctx.fill();
            p += 2
        };
        ctx.fillStyle = oldfs;
        ctx.globalCompositeOperation = oldgco
    },
    mapGetSectorLine: function(west, northwest, north, o)
    {
        var line = [],
            i = 0,
            s = 0.9,
            b = 19;
        if (!west && !north)
        {
            line[i++] = o;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = -o * 0.1;
            line[i++] = -o * s;
            line[i++] = -o * .35 * s;
            line[i++] = -o * .95 * s;
            line[i++] = -o * Math.SQRT1_2 * s;
            line[i++] = -o * Math.SQRT1_2 * s;
            line[i++] = -o * .95 * s;
            line[i++] = -o * .35 * s;
            line[i++] = -o * s;
            line[i++] = -o * .1;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = o
        }
        else if (west && !north && !northwest)
        {
            line[i++] = o;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = -b;
            line[i++] = -o * s;
            line[i++] = -o * 2;
            line[i++] = -o * s
        };
        if (west && !north && northwest)
        {
            line[i++] = o;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = -o * .2;
            line[i++] = -o * s;
            line[i++] = -o * .6;
            line[i++] = -o;
            line[i++] = -b + o * .2;
            line[i++] = -b - o * .2;
            line[i++] = -o * 2;
            line[i++] = -o * 2.4
        };
        if (!west && north && !northwest)
        {
            line[i++] = -o * s;
            line[i++] = -o * 2;
            line[i++] = -o * s;
            line[i++] = -b;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = o
        };
        if (!west && north && northwest)
        {
            line[i++] = -o * 2.4;
            line[i++] = -o * 2;
            line[i++] = -b - o * .2;
            line[i++] = -b + o * .2;
            line[i++] = -o;
            line[i++] = -o * .6;
            line[i++] = -o * s;
            line[i++] = -o * .2;
            line[i++] = -o * s;
            line[i++] = 0;
            line[i++] = -o * s;
            line[i++] = o
        };
        return line
    },
    churchInBound: function(x, y, cx, cy, crad)
    {
        var dx = x - cx,
            dy = y - cy;
        return dx * dx + dy * dy <= crad
    },
    ellipse: function(ctx, x, y, radiusX, radiusY, rotation, startAngle, endAngle, antiClockwise)
    {
        ctx.save();
        ctx.translate(x, y);
        ctx.rotate(rotation);
        ctx.scale(radiusX, radiusY);
        ctx.arc(0, 0, 1, startAngle, endAngle, antiClockwise);
        ctx.restore()
    }
}; /**** game/boxtoggle.js ****/
function MapToggleBox(cfg)
{
    var _cfg = $.extend(
    {
        visible: false,
        url: null,
        onShow: null,
        onHide: null
    }, cfg);
    cfg = _cfg;
    var _that = this,
        _id = _cfg.id,
        _visible = _cfg.visible,
        _visible_pending = false,
        _url = _cfg.url,
        _el = $(document.getElementById(_id)),
        _el_wrap = $('.' + _id + '_wrap'),
        _el_toggle = $('.' + _id + '_toggler');
    this.show = function()
    {
        if (_url)
        {
            _visible_pending = true;
            $.ajax(
            {
                url: _url,
                dataType: 'html',
                success: _onContentReceived
            })
        }
        else _show()
    };
    this.hide = function()
    {
        _hide()
    }

    function _setSliderImages()
    {
        var imgsrc = TWMap.image_base + '/icons/slide_' + (_visible ? 'up' : 'down') + '.png';
        _el_toggle.attr('src', imgsrc)
    }

    function _show()
    {
        if (_cfg.onShow !== null) _cfg.onShow();
        _visible = true;
        _setSliderImages();
        _el.show('fast')
    }

    function _hide()
    {
        if (_cfg.onHide !== null) _cfg.onHide();
        _visible = false;
        _visible_pending = false;
        _setSliderImages();
        _el.hide('fast')
    }

    function _onClickToggle()
    {
        if (_visible)
        {
            _that.hide()
        }
        else _that.show();
        return false
    }

    function _onContentReceived(data)
    {
        if (!_visible_pending) return;
        _visible_pending = false;
        _el.html(data);
        _show()
    };
    if (!_visible)
    {
        _el_wrap.hide();
        _el.hide()
    };
    _el_toggle.click(_onClickToggle);
    _setSliderImages()
}; /**** game/jstpl.js ****/
(function()
{
    var cache = {};
    this.jstpl_format = function jstpl_format(format, data)
    {
        var res = format,
            m = format.match(/%([^%]+)%/g),
            n = m.length;
        for (var i = 0; i < n; i++)
        {
            var word = m[i].substring(1, m[i].length - 1);
            res = res.replace(new RegExp(m[i]), data[word])
        };
        return res
    };
    this.jstpl = function jstpl(str, data)
    {
        var fn = !/\W/.test(str) ? cache[str] = cache[str] || jstpl(document.getElementById(str).innerHTML) : new Function("obj", "var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('" + str.replace(/[\r\t\n]/g, " ").split("<%").join("\t").replace(/((^|%>)[^\t]*)'/g, "$1\r").replace(/\t==(.*?)%>/g, "',jstpl_format($1,obj),'").replace(/\t=(.*?)%>/g, "',$1,'").split("\t").join("');").split("%>").join("p.push('").split("\r").join("\\'") + "');}return p.join('');");
        return data ? fn(data) : fn
    }
})(); /**** game/TroopTemplates.js ****/
var TroopTemplates = {
    current: null,
    loadTemplate: null,
    deleteLink: null,
    currentTemplates: 0,
    maxTemplates: 2,
    init: function()
    {
        if (document.location.hash) TroopTemplates.loadTemplate = document.location.hash.substring(1);
        if (TroopTemplates.currentTemplates >= TroopTemplates.maxTemplates)
        {
            if (!TroopTemplates.loadTemplate) TroopTemplates.loadTemplate = true
        }
        else TroopTemplates.selectCreate();
        TroopTemplates.updateTemplateList();
        if (!mobile) $('#troop_template_list').css('height', $('#troop_template_units').height() + 'px');
        $('#template_create').click(TroopTemplates.selectCreate);
        $('#troop_template_units').find('form').submit(TroopTemplates.validate)
    },
    resetSelect: function(select)
    {
        select.find('option:first').attr('selected', 'selected').parent('select')
    },
    useTemplate: function(template_id)
    {
        if (typeof template_id == 'object') template_id = $(template_id).find('option:selected').val();
        if (template_id)
        {
            var template = TroopTemplates.current[template_id];
            $.each(template, function(k, v)
            {
                var $input = $('#unit_input_' + k);
                if ($input.length) $input.val(v)
            });
            $('#template_id').val(template_id)
        };
        return false
    },
    validate: function()
    {
        if ($('#template_name').val().length < 1)
        {
            UI.ErrorMessage('Du muäsch än gültige Vorlagename agäh.');
            return false
        };
        if ($('#template_name').val().length > 50)
        {
            UI.ErrorMessage('Dä Name vode Vorlag isch z lang (maximal 50 Zeiche).');
            return false
        };
        if ($('#template_name').val().trim() == '')
        {
            UI.ErrorMessage('Dä Name vode Vorlag muess mindischtens 1 sichtbars Zeiche lang si.');
            return false
        };
        return true
    },
    updateTemplateList: function()
    {
        var $list = $('#troop_template_list').find('ul'),
            x = 1;
        $.each(TroopTemplates.current, function(i, template)
        {
            template.sanitized_name = $('<a></a>').text(template.name).text();
            template.display_name = '';
            for (var char_index = 0; char_index < template.sanitized_name.length; char_index++) template.display_name += template.sanitized_name.charAt(char_index) + '&shy;';
            var $li = $('<li><a href="#' + template.id + '"></a></li>'),
                $a = $li.find('a');
            $a.data('template-id', template.id);
            $a.data('li-id', x);
            $a.click(TroopTemplates.selectTemplate);
            $a.html(template.display_name);
            $list.append($li);
            var $delete = $('<img src="graphic/delete_14.png" alt="" />').click(function(e)
            {
                e.stopPropagation();
                document.location.replace(TroopTemplates.deleteLink + '&id=' + template.id)
            });
            $a.prepend($delete);
            if (template.id == TroopTemplates.loadTemplate || TroopTemplates.loadTemplate === true)
            {
                TroopTemplates.selectTemplate.call($a);
                TroopTemplates.loadTemplate = 0
            };
            x++
        })
    },
    selectCreate: function(e)
    {
        if (typeof e != 'undefined') e.preventDefault();
        if (TroopTemplates.currentTemplates >= TroopTemplates.maxTemplates)
        {
            UI.ErrorMessage('Maximali Azahl vo Truppe-Vorlage erreicht.');
            return false
        };
        var inputType = mobile ? 'number' : 'text';
        $('#troop_template_units').find('input[type=' + inputType + ']').val('');
        $('#template_id').val(0);
        $('#template_name').val('');
        $('#template_button').val('Vorlage alegäh');
        TroopTemplates.setSelected(0)
    },
    selectTemplate: function()
    {
        var $this = $(this),
            template_id = $this.data('template-id'),
            li_id = $this.data('li-id'),
            template = TroopTemplates.current[template_id];
        TroopTemplates.setSelected(li_id);
        $('#template_id').val(template.id);
        $('#template_name').val(template.name);
        $('#template_button').val('Template bearbeite');
        $.each(template, function(k, v)
        {
            var $input = $('#unit_input_' + k);
            if ($input.length) $input.val(v)
        })
    },
    setSelected: function(index)
    {
        var $li = $('#troop_template_list').find('li');
        $li.removeClass('selected');
        $li.eq(index).addClass('selected')
    }
}; /**** game/TargetSelection.js ****/
var TargetSelection;
(function()
{
    'use strict';
    TargetSelection = function(container)
    {
        var _this = this;
        this.$container = null;
        this.on_confirm_village = function(village_data) {};
        this.request_id = 0;
        this.selected_index = null;
        this.num_villages = 0;
        this.page_limit = null;
        this.last_attacked = null;
        this.autocomplete_visible = false;
        this.ie_compatibility_mode = true;
        this.confirmed_village_data = false;
        this.read_only = false;
        this.clicked_button = 'attack';
        this.autocomplete_wrapper = null;
        this.input_text_field = null;
        this.script_watcher = null;
        this.script_old_x = '';
        this.script_old_y = '';
        this.construct = function(container)
        {
            var $container = $(container);
            this.$container = $container;
            this.input_text_field = $container.find('input[type=text]');
            this.initAutoComplete();
            this.changeSearchType.call($container.find('input[type=radio]:checked'), false);
            this.page_limit = Math.min(Math.max(Math.round(($(window).height() - this.input_text_field.offset().top) / 50), 5), 10);
            this.setAutoCompleteWrapperPosition();
            this.input_text_field.on('input', function()
            {
                _this.ie_compatibility_mode = false;
                _this.fetchVillages()
            }).on('keyup', _this.textFieldKeyUp).on('keydown', _this.textFieldKeyDown).on('remove', _this.destroy);
            $container.find('input[type=radio]').on('change', this.changeSearchType);
            this.input_text_field.parents('form').on('submit', this.beforeSubmit);
            $(window).on('click', this.onWindowClick);
            $container.find('.btn').on('click', function()
            {
                _this.clicked_button = $(this).attr('name')
            });
            var on_choice = $container.data('on-choice');
            if (on_choice) this.setConfirmHook(on_choice)
        };
        this.destroy = function()
        {
            clearInterval(_this.script_watcher);
            $(window).off('click', _this.onWindowClick);
            this.input_text_field = null
        };
        this.onWindowClick = function()
        {
            if (_this.autocomplete_visible) _this.hideAutoCompleteWrapper()
        };
        this.initAutoComplete = function()
        {
            this.$container.find('.target-input-autocomplete').autocomplete(
            {
                minLength: 2,
                source: UI.AutoComplete.source
            });
            this.input_text_field.on('autocompleteselect', function(e, ui)
            {
                _this.fetchVillages(
                {
                    input: ui.item.value
                })
            })
        };
        this.initScriptCompatibility = function()
        {
            clearInterval(this.script_watcher);
            this.script_watcher = setInterval(this.checkForScriptChange, 100)
        };
        this.checkForScriptChange = function()
        {
            var x = $('#inputx').val(),
                y = $('#inputy').val(),
                old_x = _this.confirmed_village_data ? _this.confirmed_village_data.x : '',
                old_y = _this.confirmed_village_data ? _this.confirmed_village_data.y : '';
            if (x && y && (x !== old_x || y !== old_y))
            {
                clearInterval(_this.script_watcher);
                _this.setVillageByCoordinates(x, y, function()
                {
                    $('#inputx').val('');
                    $('#inputy').val('');
                    _this.initScriptCompatibility()
                })
            }
        };
        this.setReadOnly = function()
        {
            this.read_only = true
        };
        this.setLastAttacked = function(village_data)
        {
            this.last_attacked = village_data;
            this.$container.find('.target-last-attacked').show().on('click', function(e)
            {
                e.preventDefault();
                _this.confirmVillage(_this.getVillageDiv(_this.last_attacked))
            })
        };
        this.enableQuickButton = function(type, link)
        {
            $('.target-' + type).show().on('click', function(event)
            {
                TargetSelection.loadTargetsPopup(event, link)
            })
        };
        this.setVillageByCoordinates = function(x, y, callback)
        {
            this.fetchVillages(
            {
                type: 'coord',
                input: x + '|' + y
            }, function(data)
            {
                if (data.villages.length) _this.confirmVillage(_this.getVillageDiv(data.villages[0]));
                if (typeof callback === 'function') callback()
            })
        };
        this.setVillageByData = function(data)
        {
            this.confirmVillage(_this.getVillageDiv(data))
        };
        this.beforeSubmit = function()
        {
            var $inputx = $('#inputx'),
                $inputy = $('#inputy'),
                $village_div = _this.$container.find('.target-input .village-item');
            if ($village_div.length)
            {
                var data = $village_div.data('village_data');
                $inputx.val(data.x);
                $inputy.val(data.y)
            };
            var input = _this.$container.find('input[type=text]').val(),
                match;
            if ((match = input.match(/^([0-9]{1,3})\|([0-9]{1,3})$/)))
            {
                $inputx.val(match[1]);
                $inputy.val(match[2])
            };
            return true
        };
        this.changeSearchType = function(e)
        {
            var $this = $(this),
                $text_input = $this.closest('.target-select').find('input[type=text]'),
                placeholder;
            switch ($this.val())
            {
                case 'coord':
                    placeholder = '123|456';
                    break;
                case 'village_name':
                    placeholder = 'Enter village name';
                    break;
                case 'player_name':
                    placeholder = 'Enter player name';
                    break
            };
            $text_input.attr('placeholder', placeholder).data('search-type', $this.val());
            _this.clearVillages();
            if ($this.val() === 'player_name')
            {
                $text_input.autocomplete('enable');
                $text_input.autocomplete('search')
            }
            else $text_input.autocomplete('disable');
            if (e !== false) $text_input.focus()
        };
        this.clearVillages = function()
        {
            this.hideAutoCompleteWrapper();
            this.removeConfirmedVillage()
        };
        this.fetchVillages = function(payload_override, callback)
        {
            var payload = {
                ajax: 'target_selection',
                input: this.$container.find('input[type=text]').val(),
                type: this.$container.find('input[type=radio]:checked').val(),
                request_id: ++this.request_id,
                limit: this.page_limit,
                offset: 0
            };
            payload = $.extend(payload, payload_override);
            if (payload.input.length === 0) return;
            if (typeof callback === 'undefined') callback = function(data)
            {
                _this.handleVillagesData(data)
            };
            TribalWars.get('api', payload, callback)
        };
        this.handleVillagesData = function(data)
        {
            if (data.request_id !== this.request_id) return;
            var $wrapper = this.getAutoCompleteWrapper();
            this.hideAutoCompleteWrapper();
            this.num_villages = data.villages.length + data.offset;
            if (data.offset === 0)
            {
                this.selected_index = null;
                $wrapper.empty()
            }
            else $wrapper.find('.village-more').remove();
            if (data.villages.length === 0) return;
            this.showAutoCompleteWrapper();
            $.each(data.villages, function(i, village_data)
            {
                $wrapper.append(_this.getVillageDiv(village_data))
            });
            if (data.more)
            {
                var $more = $('<div class="village-item village-more">Show more</div>').on('click', function(e)
                {
                    e.stopPropagation();
                    _this.loadMoreVillages()
                });
                $wrapper.append($more)
            };
            this.setAutoCompleteWrapperPosition()
        };
        this.showAutoCompleteWrapper = function()
        {
            this.getAutoCompleteWrapper().show();
            this.autocomplete_visible = true
        };
        this.hideAutoCompleteWrapper = function()
        {
            if (this.$container.find('.input[type=radio]:checked').val() === 'player_name') this.input_text_field.autocomplete('enable');
            this.getAutoCompleteWrapper().hide();
            this.autocomplete_visible = false
        };
        this.getAutoCompleteWrapper = function()
        {
            if (!this.autocomplete_wrapper) this.autocomplete_wrapper = $('<div class="target-select-autocomplete"></div>').appendTo('body');
            return this.autocomplete_wrapper
        };
        this.setAutoCompleteWrapperPosition = function()
        {
            var $wrapper = this.getAutoCompleteWrapper(),
                $input_container = this.$container.find('.target-input'),
                input_pos = $input_container.offset(),
                input_height = $input_container.height();
            $wrapper.css('max-height', (this.page_limit * 50) + 'px');
            $wrapper.css('left', input_pos.left);
            var wrapper_height = $wrapper.height(),
                space_below = $(document).height() - input_pos.top - input_height - $('#footer').height();
            if (wrapper_height > space_below)
            {
                $wrapper.css('top', (input_pos.top - wrapper_height - 2) + 'px');
                $wrapper.css(
                {
                    'border-top-width': '1px',
                    'border-bottom-width': '0px'
                })
            }
            else
            {
                $wrapper.css('top', (input_pos.top + input_height + 2) + 'px');
                $wrapper.css(
                {
                    'border-top-width': '0px',
                    'border-bottom-width': '1px'
                })
            }
        };
        this.setConfirmHook = function(function_name)
        {
            var namespaces = function_name.split('.'),
                func_name = namespaces.pop(),
                func_context = window;
            for (var i = 0; i < namespaces.length; i++) func_context = func_context[namespaces[i]];
            var the_function = func_context[func_name];
            if (typeof the_function !== 'function') throw 'non-existent function specified for TargetSelection on-choice';
            this.on_confirm_village = the_function
        };
        this.confirmVillage = function($village_div)
        {
            this.removeConfirmedVillage();
            this.getAutoCompleteWrapper().hide();
            var $input_container = this.$container.find('.target-input');
            $input_container.find('input').hide();
            $input_container.append($village_div);
            $village_div.removeClass('village-selected');
            this.confirmed_village_data = $village_div.data('village_data');
            this.updateURLForConfirmedVillage();
            this.on_confirm_village(this.confirmed_village_data)
        };
        this.removeConfirmedVillage = function()
        {
            var $input_container = this.$container.find('.target-input');
            if ($input_container.find('.village-item').length)
            {
                $input_container.find('input').show().val('').focus();
                $input_container.find('.village-item').remove();
                this.confirmed_village_data = false;
                $('input[name=x], input[name=y]').val('');
                this.updateURLForConfirmedVillage()
            }
        };
        this.getVillageDiv = function(village_data)
        {
            var $village_div = $('<div class="village-item"><img class="village-delete" alt="" /><img class="village-picture" alt="" /><span class="village-name"></span><span class="village-info"></span><span class="village-distance"></span></div>').data('village_data', village_data);
            if (!this.read_only) $village_div.on('click', function(e)
            {
                e.stopPropagation();
                if ($(this).parent().hasClass('target-select-autocomplete'))
                {
                    _this.confirmVillage($village_div)
                }
                else _this.removeConfirmedVillage()
            });
            var village_name_snipped = village_data.name;
            if (village_name_snipped.length > 18) village_name_snipped = village_name_snipped.substr(0, 18) + '&hellip;';
            var village_name = s('%1 (%2|%3)', village_name_snipped, village_data.x, village_data.y),
                village_owner = village_data.player_name ? village_data.player_name : 'Barbare',
                village_info = '<strong>Bsitzer:</strong> ' + village_owner + ' <strong>Pünkt:</strong> ' + village_data.points,
                distance = Math.round(Math.sqrt(village_data.distance)),
                distance_units = distance === 1 ? s('%1 Fäld', distance) : s('%1 Fälder', distance),
                village_distance = '<strong>Entfernig:</strong> ' + distance_units;
            $village_div.find('.village-picture').attr('src', village_data.image);
            $village_div.find('.village-delete').attr('src', image_base + '/delete.png');
            $village_div.find('.village-name').html(village_name);
            $village_div.find('.village-info').html(village_info);
            $village_div.find('.village-distance').html(village_distance);
            if (this.read_only) $village_div.addClass('read-only');
            return $village_div
        };
        this.textFieldKeyUp = function(e)
        {
            if (_this.ie_compatibility_mode && e.keyCode !== 38 && e.keyCode !== 40) _this.fetchVillages();
            var $this = $(this),
                val = $this.val();
            if ($this.data('search-type') === 'coord')
            {
                val = val.replace(/[,\.]/, '|');
                val = val.replace(/[^[0-9\|]+/, '');
                if (val.length === 3 && e.keyCode !== 8 && e.keyCode !== 46) val = val + '|';
                if (val.indexOf('||') !== -1) val = val.replace(/(\|{2,})/, '|');
                if (val.length > 7) val = val.substr(0, 7);
                $this.val(val)
            };
            return true
        };
        this.textFieldKeyDown = function(e)
        {
            if (e.keyCode === 38)
            {
                _this.selectPrevVillage();
                return false
            }
            else if (e.keyCode === 40)
            {
                _this.selectNextVillage();
                return false
            }
            else if (e.keyCode === 13)
            {
                _this.confirmVillageAtIndex(_this.selected_index);
                return false
            };
            return true
        };
        this.selectNextVillage = function()
        {
            if (this.selected_index === null)
            {
                this.selectVillageAtIndex(0)
            }
            else if (this.selected_index + 1 <= this.num_villages) this.selectVillageAtIndex(this.selected_index + 1)
        };
        this.selectPrevVillage = function()
        {
            if (this.selected_index !== null && this.selected_index > 0) this.selectVillageAtIndex(this.selected_index - 1)
        };
        this.selectVillageAtIndex = function(index)
        {
            this.unselectSelectedVillage();
            var $el = this.getAutoCompleteWrapper().find('div').eq(index);
            $el.addClass('village-selected');
            this.selected_index = index;
            var offset_in_container = index * 41,
                selected_offset = $el.position().top,
                viewport_height = parseInt($el.parent().css('max-height'));
            if (selected_offset < 10)
            {
                $el.parent().scrollTop(offset_in_container)
            }
            else if (selected_offset > viewport_height - 40) $el.parent().scrollTop(offset_in_container)
        };
        this.unselectSelectedVillage = function()
        {
            this.getAutoCompleteWrapper().find('div.village-selected').removeClass('village-selected')
        };
        this.confirmVillageAtIndex = function(index)
        {
            var $el = this.getAutoCompleteWrapper().find('div').eq(index);
            if ($el.length)
                if ($el.hasClass('village-more'))
                {
                    this.loadMoreVillages();
                    this.selectVillageAtIndex(index - 1)
                }
                else this.confirmVillage($el)
        };
        this.updateURLForConfirmedVillage = function()
        {
            var village_data = this.confirmed_village_data ? this.confirmed_village_data :
                {
                    id: 0
                },
                url = document.location.href;
            if (url.substr(-1) === '#') url = url.substr(0, url.length - 1);
            var target_regex = /target=([0-9]+)/;
            if (url.match(target_regex))
            {
                url = url.replace(target_regex, 'target=' + village_data.id)
            }
            else url += '&target=' + village_data.id;
            if (Modernizr.history) history.replaceState(
            {}, '', url)
        };
        this.loadMoreVillages = function()
        {
            this.fetchVillages(
            {
                offset: this.num_villages
            })
        };
        this.construct(container)
    };
    TargetSelection.loadTargetsPopup = function(event, link)
    {
        UI.AjaxPopup(event, 'village_targets', link, 'Targets', null,
        {
            reload: true
        }, null, 400)
    }
}()); /**** game/warplanner.js ****/
var Warplanner = {
    visible: false,
    initPos: false,
    filter: '',
    curFilter: [],
    curPlayer: 0,
    attackType: 'A',
    admin: false,
    locked: false,
    lockTimer: 0,
    el:
    {
        root: null,
        list: null,
        search: null,
        select: null,
        map_mover: null,
        bb: null,
        bb_popup: null
    },
    urls:
    {},
    players:
    {},
    data:
    {},
    selectArea: [0, 0, 0, 0],
    init: function()
    {
        this.el.root = $('#warplanner');
        this.el.list = $('#warplanner_players');
        this.el.search = $('#warplanner_search');
        this.el.map_mover = $('#map_mover');
        this.el.select = this._createSelectionDiv();
        this.el.bb = $('#warplanner_bb');
        this.el.bb_popup = $('#warplanner_bb_popup');
        this.el.bb_popup.draggable(
        {
            containment: [0, 60]
        });
        $('#warplanner_open').click(function()
        {
            Warplanner.toggle();
            return false
        });
        $('#warplanner_genbb').click(function()
        {
            Warplanner.createBB(0);
            return false
        });
        $('#warplanner_players').click(jQuery.proxy(function(e)
        {
            var el = e.target,
                id;
            for (var i = 0; el && i < 5; i++)
            {
                id = jQuery.data(el, 'pid');
                if (id) break;
                el = $(el).parent();
                el = el[0]
            };
            if (!id) return true;
            setTimeout(jQuery.proxy(function()
            {
                this.el.list.find('td').removeClass('selected');
                el = $(el);
                el.find('input[type=radio]').attr('checked', 'checked');
                el.find('td').addClass('selected');
                this.selectPlayer(id)
            }, this), 0);
            if (e.target.className.match(/wp_col/))
            {
                this.onClickColorDiv(e, id)
            }
            else if (e.target.className.match(/wp_del/))
            {
                this.clearAllForPlayer(id)
            }
            else if (e.target.className.match(/wp_bb/)) this.createBB(id);
            return true
        }, this));
        var _search_func = jQuery.proxy(function()
        {
            this.filter = this.el.search.val();
            this._fillPlayerList()
        }, this);
        this.el.search.change(_search_func).keyup(_search_func).keypress(jQuery.proxy(function(e)
        {
            if (e.which != 13) return true;
            if (this.curFilter.length == 1)
            {
                this.selectPlayer(this.curFilter[0]);
                this.el.search.val('')
            };
            e.preventDefault();
            return false
        }, this));
        $('input[name=warplanner_type]').change(function()
        {
            Warplanner.attackType = this.value
        });
        window.onbeforeunload = function()
        {
            if (Warplanner.locked === true) return 'Änderige im Agriffsplaner si nanig gspeicheret worde.'
        };
        window.unload = window.onbeforeunload
    },
    _createSelectionDiv: function()
    {
        var el = $('<div/>');
        el.css(
        {
            height: '100%',
            width: '100%',
            'z-index': '10',
            'background-image': this.el.map_mover.css('background-image'),
            position: 'absolute',
            left: '0px',
            top: '0px'
        }).attr('id', 'warplanner_selection').hide();
        el.insertAfter('#map_mover');
        return el
    },
    _scale: function()
    {
        this.el.width(window.innerWidth).height(window.innerHeight - 60).offset(
        {
            top: 60,
            left: 0
        })
    },
    toggle: function()
    {
        this.visible = !$('#warplanner_enabled').is(':checked');
        if (this.visible)
        {
            this.hide()
        }
        else this.show()
    },
    show: function()
    {
        this.reload(function()
        {
            if (!this.initPos)
            {
                this.initPos = true;
                this.el.root.css('left', '5px').css('top', ((window.pageYOffset || window.scrollY) + 60) + 'px')
            };
            this.el.root.show();
            this.el.search.focus();
            this.visible = true;
            if (this.admin) TWMap.map.mover.preventDrag(jQuery.proxy(function(init_pos, cur_pos)
            {
                var size = [cur_pos[0] - init_pos[0], cur_pos[1] - init_pos[1]],
                    off = this.el.map_mover.offset();
                off.left -= $(window).scrollLeft();
                off.top -= $(window).scrollTop();
                init_pos = [init_pos[0] - off.left, init_pos[1] - off.top];
                if (size[0] < 0)
                {
                    init_pos[0] += size[0];
                    size[0] = -size[0]
                };
                if (size[1] < 0)
                {
                    init_pos[1] += size[1];
                    size[1] = -size[1]
                };
                this.selectArea = [init_pos[0], init_pos[1], init_pos[0] + size[0], init_pos[1] + size[1]];
                this.el.select.height(size[1]).width(size[0]).css(
                {
                    top: init_pos[1] + 'px',
                    left: init_pos[0] + 'px'
                })
            }, this), jQuery.proxy(function()
            {
                this.el.select.css(
                {
                    height: '0px',
                    width: '0px'
                }).show()
            }, this), jQuery.proxy(function()
            {
                this.el.select.hide();
                var x, y;
                x = (this.selectArea[0] + TWMap.map.pos[0]) / TWMap.map.scale[0];
                y = (this.selectArea[1] + TWMap.map.pos[1]) / TWMap.map.scale[1];
                var from = [~~x, ~~y];
                x = (this.selectArea[2] + TWMap.map.pos[0]) / TWMap.map.scale[0];
                y = (this.selectArea[3] + TWMap.map.pos[1]) / TWMap.map.scale[1];
                var to = [~~x, ~~y];
                for (x = from[0]; x <= to[0]; x++)
                    for (y = from[1]; y <= to[1]; y++)
                    {
                        var xy = x * 1e3 + y,
                            v = TWMap.villages[xy];
                        if (!v || v.special == 'ghost') continue;
                        if (this.data[v.id] && this.data[v.id].player_id === this.curPlayer && this.data[v.id].type === this.attackType)
                        {
                            this.data[v.id].type = 'D'
                        }
                        else
                        {
                            this.lock(true);
                            this.data[v.id] = {
                                player_id: this.curPlayer,
                                type: this.attackType
                            }
                        }
                    };
                TWMap.reload(false);
                $('#warplanner_enabled').attr('checked', 'checked')
            }, this));
            TWMap.warMode = true;
            TWMap.reload(false)
        })
    },
    hide: function()
    {
        var handleHide = function()
        {
            Warplanner.el.root.hide();
            Warplanner.visible = false;
            if (Warplanner.admin) TWMap.map.mover.preventDrag(false);
            TWMap.warMode = false;
            TWMap.reload(false);
            $('#warplanner_enabled').removeAttr('checked')
        };
        if (!Warplanner.locked)
        {
            handleHide();
            return
        };
        var msg = 'Nid gspeichereti Änderige gönd verlore. Trotzdem fortfahre?',
            buttons = [
            {
                text: '<?php l('game.confirm'); ?>',
                callback: handleHide,
                confirm: true
            }];
        UI.ConfirmationBox(msg, buttons)
    },
    reload: function(callback)
    {
        this.players = {};
        $.ajax(
        {
            url: this.urls.read,
            dataType: 'json',
            success: jQuery.proxy(function(d)
            {
                if (d.code !== true)
                {
                    UI.ErrorMessage('Fähler bim Lade vom Agriffsplaner.');
                    return
                };
                for (var id in d.members)
                {
                    if (!d.members.hasOwnProperty(id)) continue;
                    var p = d.members[id];
                    this.addPlayer(p.name, id, p.color)
                };
                for (var i in d.villages)
                {
                    if (!d.villages.hasOwnProperty(i)) continue;
                    var v = d.villages[i];
                    this.data[v.village_id] = {
                        player_id: ~~v.player_id,
                        type: v.type
                    }
                };
                if (!this.players[this.curPlayer])
                {
                    var pid = 0;
                    for (var id in this.players)
                        if (this.players.hasOwnProperty(id))
                        {
                            pid = id;
                            break
                        };
                    this.selectPlayer(pid)
                };
                this._fillPlayerList();
                jQuery.proxy(callback, this)()
            }, this)
        })
    },
    createPlayerListLinks: function()
    {
        var el = $('<div/>').css('float', 'right');
        if (this.admin) var del = $('<img/>').attr('src', TWMap.image_base + '/delete_small.png').addClass('wp_del');
        var bb = $('<img/>').css('padding-left', '3px').attr('src', TWMap.image_base + '/forwarded.png').addClass('wp_bb');
        return el.append(del).append(bb)
    },
    _fillPlayerList: function()
    {
        var list = $('#warplanner_players'),
            filter = this.filter.toLowerCase();
        list.find('tr').remove();
        this.curFilter = [];
        var id, fragment = document.createDocumentFragment(),
            player_links = this.createPlayerListLinks();
        for (id in this.players)
        {
            if (!this.players.hasOwnProperty(id)) continue;
            var player = this.players[id];
            if (filter !== '' && player.name.toLowerCase().indexOf(filter) === -1) continue;
            var el = document.createElement('tr'),
                jq = $(el);
            jq.html(this.playerTpl);
            jq.find('.wp_name').text(player.name).append(player_links.clone());
            jq.find('.wp_col').css('background-color', 'rgb(' + player.color[0] + ',' + player.color[1] + ',' + player.color[2] + ')');
            if (this.curPlayer === player.id)
            {
                jq.find('td').addClass('selected');
                jq.find('input[type=radio]').attr('checked', 'checked')
            };
            jQuery.data(el, 'pid', player.id);
            this.curFilter.push(player.id);
            fragment.appendChild(el)
        };
        list.append(fragment)
    },
    addPlayer: function(name, id, color)
    {
        id = ~~id;
        this.players[id] = {
            id: id,
            name: name,
            color: color
        }
    },
    selectPlayer: function(id)
    {
        id = ~~id;
        var p = this.players[id];
        if (!p) return false;
        this.curPlayer = id
    },
    getColorByPlayerId: function(id)
    {
        return this.players[id].color
    },
    onClickColorDiv: function(event, id)
    {
        var x = event.pageX,
            y = event.pageY,
            p = this.players[id];
        this.colorEditPlayer = id;
        var url = this.urls.colorPopup + '&r=' + p.color[0] + '&g=' + p.color[1] + '&b=' + p.color[2];
        UI.AjaxPopup(null, 'warplanner_color_popup', url, 'Farbe wähle', jQuery.proxy(this.onColorLoaded, this),
        {
            dataType: 'html',
            reload: true
        }, 280, 200, x, y)
    },
    onColorLoaded: function(data)
    {
        $('#warplanner_color_popup_content').html(data);
        var c = this.players[this.colorEditPlayer].color;
        $('#color').css('background-color', 'rgb(' + c[0] + ',' + c[1] + ',' + c[2] + ')');
        $('#color_picker_r').val(c[0]);
        $('#color_picker_g').val(c[1]);
        $('#color_picker_b').val(c[2]);
        $('#icon_picker').hide();
        $('#color_picker').show();
        $('#warplanner_color_popup_content').find('form').submit(jQuery.proxy(this.onColorSubmit, this))
    },
    onColorSubmit: function()
    {
        var r = $('#color_picker_r').val(),
            g = $('#color_picker_g').val(),
            b = $('#color_picker_b').val();
        this.players[this.colorEditPlayer].color = [r, g, b];
        this.lock(true);
        this._fillPlayerList();
        TWMap.reload(false);
        $('#warplanner_color_popup').toggle();
        return false
    },
    createBB: function(player_id)
    {
        var dat = {};
        for (var id in this.data)
        {
            if (!this.data.hasOwnProperty(id)) continue;
            var pid = this.data[id].player_id,
                type = this.data[id].type;
            if (player_id != 0 && pid != player_id) continue;
            if (type === 'D') continue;
            if (!dat.hasOwnProperty(pid)) dat[pid] = {
                name: this.players[pid].name,
                village_ids: [],
                types: []
            };
            dat[pid].village_ids.push(id);
            dat[pid].types.push(type)
        };
        $.post(Warplanner.urls.genbb,
        {
            dat: dat
        }, jQuery.proxy(function(data)
        {
            if (data.code === true)
            {
                var bb = data.bb;
                if ($.browser.msie) bb = bb.replace(/\n/g, '<br/>');
                this.el.bb_popup.show();
                this.el.bb.html(bb).focus()[0].select()
            }
            else UI.ErrorMessage(data.msg)
        }, this), 'json')
    },
    onVillageClicked: function(id, x, y)
    {
        var coordidx = x * 1e3 + y,
            village = TWMap.villages[coordidx];
        if (village.special == 'ghost') return false;
        if (!this.data[id] || this.data[id].type === 'D' || this.data[id].player_id !== this.curPlayer)
        {
            this.data[id] = {
                player_id: this.curPlayer,
                type: this.attackType
            }
        }
        else
        {
            var type = this.attackType;
            if (this.data[id].type === type)
            {
                this.data[id].type = (type === 'A' ? 'F' : 'A')
            }
            else this.data[id].type = 'D'
        };
        this.lock(true);
        TWMap.reload(false, true)
    },
    clearAllForPlayer: function(player_id)
    {
        var found = false;
        for (var id in this.data)
        {
            if (!this.data.hasOwnProperty(id)) continue;
            if (this.data[id].type === 'D') continue;
            if (this.data[id].player_id === player_id)
            {
                found = true;
                this.data[id].type = 'D'
            }
        };
        if (found)
        {
            this.lock(true);
            TWMap.reload(false)
        }
    },
    lock: function(do_lock, force)
    {
        if (this.locked === 'pending' || (!force && this.locked === do_lock)) return;
        this.locked = 'pending';
        $.post(this.urls.lock,
        {
            lock: true
        }, jQuery.proxy(function(d)
        {
            if (d.code === true)
            {
                this.setLocked(do_lock)
            }
            else
            {
                alert(d.msg);
                this.setLocked(false)
            }
        }, this), 'json')
    },
    setLocked: function(lock)
    {
        this.locked = lock;
        if (lock)
        {
            if (!this.lockTimer) this.lockTimer = setInterval(function()
            {
                Warplanner.lock(true, true)
            }, 60 * 1e3);
            $('#warplanner_save').removeAttr('disabled')
        }
        else
        {
            if (this.lockTimer)
            {
                clearInterval(this.lockTimer);
                this.lockTimer = 0
            };
            $('#warplanner_save').attr('disabled', 'disabled')
        }
    },
    save: function()
    {
        if (this.locked !== true)
        {
            UI.ErrorMessage('Änderige chöi momentan nid gspeicheret wärde.');
            return
        };
        var villages = {};
        for (var id in this.data)
        {
            if (!this.data.hasOwnProperty(id)) continue;
            villages[id] = {
                p: this.data[id].player_id,
                t: this.data[id].type
            }
        };
        var players = {};
        for (var id in this.players)
        {
            if (!this.players.hasOwnProperty(id)) continue;
            players[id] = {
                c: this.players[id].color.join(',')
            }
        };
        $.post(this.urls.save,
        {
            villages: villages,
            players: players
        }, jQuery.proxy(function(d)
        {
            if (d.code !== true)
            {
                UI.ErrorMessage(d.msg);
                return
            };
            this.setLocked(false);
            TWMap.notifySavedChanges();
            TWMap.warModeGeneration++;
            TWMap.reload(false)
        }, this), 'json')
    }
}; /**** game/worldmap.js ****/
var Worldmap = {
    Data:
    {
        t: 0
    },
    init: function(t)
    {
        Worldmap.Data.t = t;
        $("#worldmap").draggable(
        {
            stop: Worldmap.savePosition,
            containment: [0, 60]
        })
    },
    toggle: function()
    {
        if ((typeof toggle_value == 'undefined') || (toggle_value == false))
        {
            if (typeof toggle_value == 'undefined') Worldmap.reload();
            toggle_value = true
        }
        else toggle_value = false;
        switch (toggle_value)
        {
            case true:
                $("#worldmap").show();
                break;
            case false:
                $("#worldmap").hide();
                break;
            default:
                break
        }
    },
    reload: function()
    {
        var params = '&cut=true';
        $('#worldmap_settings').children(':checked').each(function()
        {
            switch ($(this).attr('name'))
            {
                case 'worldmap_barbarian_toggle':
                    params += "&barbarian=true";
                    break;
                case 'worldmap_ally_toggle':
                    params += "&ally=true";
                    break;
                case 'worldmap_partner_toggle':
                    params += "&partner=true";
                    break;
                case 'worldmap_nap_toggle':
                    params += "&nap=true";
                    break;
                case 'worldmap_enemy_toggle':
                    params += "&enemy=true";
                    break;
                default:
                    break
            }
        });
        if (Worldmap.Data.t > 0) params = params + '&t=' + Worldmap.Data.t;
        Worldmap.loadMapImage(params)
    },
    loadMapImage: function(params)
    {
        $('#worldmap_body').hide();
        $('#worldmap-throbber').show();
        var img = new Image();
        img.onload = function()
        {
            $('#worldmap-throbber').hide();
            $('#secrets').css('left', (this.width - 1e3) / 2).css('top', (this.height - 1e3) / 2);
            var x_bias = 500 - this.width / 2,
                y_bias = 500 - this.height / 2;
            $('#worldmap_image > input').width(this.width).height(this.height).click(function(e)
            {
                var off = $(this).offset(),
                    x = e.offsetX ? e.offsetX : (e.pageX - this.offsetLeft - off.left),
                    y = e.offsetY ? e.offsetY : (e.pageY - this.offsetTop - off.top);
                x += x_bias;
                y += y_bias;
                Worldmap.toggle();
                TWMap.map.centerPos(x, y);
                return false
            });
            $('#worldmap_body').width(this.width).height(this.height).css('background-image', 'url(' + this.src + ')').show()
        };
        img.src = 'page.php?page=worldmap_image' + params
    },
    savePosition: function(event, ui)
    {
        $.cookie('worldmap_left', $(this).css('left'));
        $.cookie('worldmap_top', $(this).css('top'))
    }
}; /**** game/Market.js ****/
var Market = {
    Data:
    {
        Trader:
        {
            carry: 0,
            amount: 0,
            total: 0,
            capacity: null
        },
        Res:
        {
            wood: 0,
            stone: 0,
            iron: 0
        }
    },
    Memory:
    {
        freeCapacity: null,
        res:
        {
            wood: 0,
            stone: 0,
            iron: 0
        }
    },
    Set:
    {
        freeCapacitiy: function(amount)
        {
            Market.Memory.freeCapacity = amount
        },
        maxRes: function(res)
        {
            Market.Memory.res = res;
            Market.Data.Res.wood = res.wood;
            Market.Data.Res.stone = res.stone;
            Market.Data.Res.iron = res.iron
        }
    },
    init: function(Data, mode)
    {
        Market.Data = Data;
        if (Market.Modes[mode]) Market.Modes[mode].init();
        $('#unblocked_points_info').on('click', function()
        {
            Dialog.fetch('premium_blocked_logs', 'premium',
            {
                ajax: 'blocked_points'
            })
        })
    },
    getPremiumRate: function(resource_amount, premium_amount)
    {
        var prem_ratio = resource_amount / premium_amount;
        return {
            resources: (prem_ratio < 1) ? 1 : Math.floor(prem_ratio),
            premium: (prem_ratio < 1) ? Math.floor(1 / prem_ratio) : 1
        }
    },
    Modes:
    {
        own_offer:
        {
            init: function()
            {
                $('#own_offer_form input[name=res_buy], #own_offer_form input[name=res_sell]').change(this.res_buy_change);
                $('#own_offer_form input[name=sell], #own_offer_form input[name=buy]').change(this.previewPremiumCostIfRelevant).keyup(this.previewPremiumCostIfRelevant);
                $('#own_offer_form').submit(Market.Modes.own_offer.form_submit);
                Market.Modes.own_offer.res_buy_change();
                Market.Modes.own_offer.initResSelectionHandling()
            },
            res_buy_change: function()
            {
                if ($('#own_offer_form input[name=res_buy]:checked').val() === 'premium')
                {
                    $('#res_sell_premium').prop('disabled', true)
                }
                else $('#res_sell_premium').prop('disabled', false);
                if ($('#own_offer_form input[name=res_sell]:checked').val() === 'premium')
                {
                    $('#res_buy_premium').prop('disabled', true)
                }
                else $('#res_buy_premium').prop('disabled', false);
                Market.Modes.own_offer.previewPremiumCostIfRelevant()
            },
            previewPremiumCostIfRelevant: function()
            {
                var show_preview = false;
                if ($('#own_offer_form input[name=res_buy]:checked').val() === 'premium' || $('#own_offer_form input[name=res_sell]:checked').val() === 'premium')
                {
                    var sell = parseInt($('#own_offer_form input[name=sell]').val()),
                        buy = parseInt($('#own_offer_form input[name=buy]').val()),
                        is_buying_premium = $('#res_buy_premium').prop('checked'),
                        pp = is_buying_premium ? buy : sell,
                        res = is_buying_premium ? sell : buy;
                    if (pp && res)
                    {
                        show_preview = true;
                        Market.Modes.own_offer.preview_pp_cost(res, pp)
                    }
                };
                if (!show_preview) $('#pp_cost_preview').hide()
            },
            initResSelectionHandling: function()
            {
                $('#res_sell_wood, #res_sell_stone, #res_sell_iron, #res_sell_premium').click(function()
                {
                    $('#res_sell_amount').select()
                });
                $('#res_buy_wood, #res_buy_stone, #res_buy_iron, #res_buy_premium').click(function()
                {
                    $('#res_buy_amount').select()
                })
            },
            preview_pp_cost: function(res, pp)
            {
                var is_buying_premium = $('#res_buy_premium').prop('checked'),
                    pp_cost_per_1000 = pp > 0 && res > 0 ? Math.round(pp / (res / 1e3) * 10) / 10 : 0,
                    min = parseInt($('#premium_min').val()),
                    max = parseInt($('#premium_max').val()),
                    display_rate = Market.getPremiumRate(res, pp),
                    markup_res, markup_pp = null;
                if (pp_cost_per_1000 < min)
                {
                    var display_rate_min = Market.getPremiumRate(1e3, min);
                    markup_res = '<span class="icon header ressources"></span>' + display_rate_min.resources;
                    markup_pp = '<span class="icon header premium"></span>' + display_rate_min.premium;
                    if (is_buying_premium)
                    {
                        $('#pp_cost_preview_warning').html(s('Maximum %1 for %2', markup_res, markup_pp)).show()
                    }
                    else $('#pp_cost_preview_warning').html(s('Minimum %1 for %2', markup_pp, markup_res)).show();
                    $('#pp_cost_preview').addClass('error')
                }
                else if (pp_cost_per_1000 > max)
                {
                    var display_rate_max = Market.getPremiumRate(1e3, max);
                    markup_res = '<span class="icon header ressources"></span>' + display_rate_max.resources;
                    markup_pp = '<span class="icon header premium"></span>' + display_rate_max.premium;
                    if (is_buying_premium)
                    {
                        $('#pp_cost_preview_warning').html(s('Minimum %1 for %2', markup_res, markup_pp)).show()
                    }
                    else $('#pp_cost_preview_warning').html(s('Maximum %1 for %2', markup_pp, markup_res)).show();
                    $('#pp_cost_preview').addClass('error')
                }
                else
                {
                    $('#pp_cost_preview_warning').text('');
                    $('#pp_cost_preview').removeClass('error')
                };
                var sell_type = $('#res_sell_selection').find('input:checked').val(),
                    buy_type = $('#res_buy_selection').find('input:checked').val(),
                    sell_amount = is_buying_premium ? display_rate.resources : display_rate.premium,
                    buy_amount = is_buying_premium ? display_rate.premium : display_rate.resources;
                Market.Modes.own_offer.displayPremiumCost(sell_type, sell_amount, buy_type, buy_amount)
            },
            displayPremiumCost: function(sell_type, sell_amount, buy_type, buy_amount)
            {
                $('#pp_cost_preview_sell_type').html('<span class="icon header ' + sell_type + '"></span>');
                $('#pp_cost_preview_buy_type').html('<span class="icon header ' + buy_type + '"></span>');
                $('#pp_cost_preview_sell_amount').html(sell_amount);
                $('#pp_cost_preview_buy_amount').html(buy_amount);
                $('#pp_cost_preview').show()
            },
            form_submit: function()
            {
                if (!$(this).data('confirmed') && $('#res_sell_premium').prop('checked'))
                {
                    var pp_cost = parseInt($('#own_offer_form input[name=sell]').val()) * parseInt($('#own_offer_form input[name=multi]').val()),
                        confirmChangeOrderCallback = function()
                        {
                            $('#own_offer_form').data('confirmed', true);
                            $('#own_offer_form').submit()
                        };
                    Premium.check('ResourcesTradeOffer', pp_cost, confirmChangeOrderCallback);
                    return false
                };
                return true
            }
        },
        all_own_offer:
        {
            init: function()
            {
                $('.fillmax').click(function()
                {
                    Market.Modes.all_own_offer.fillMax(this);
                    return false
                });
                $('a.market_pp_check').click(this.check_pp);
                $('input.market_pp_check').keydown(function(event)
                {
                    if (event.keyCode === 13)
                    {
                        event.preventDefault();
                        $(this).parent().find('a.market_pp_check').click()
                    }
                })
            },
            check_pp: function()
            {
                var $this = $(this),
                    pp_cost = parseInt($this.data('pp'));
                if (pp_cost === 0 || $this.data('confirmed'))
                {
                    Market.Modes.all_own_offer.submitOfferAcceptForm($this);
                    return false
                };
                var $count = $this.find('input[name=count]');
                if ($count.length) pp_cost *= parseInt($count.val());
                var confirmChangeOrderCallback = function()
                {
                    $this.data('confirmed', true);
                    Market.Modes.all_own_offer.submitOfferAcceptForm($this)
                };
                Premium.check('ResourcesTradeAccept', pp_cost, confirmChangeOrderCallback);
                return false
            },
            acceptOffer: function(offer_id, count)
            {
                TribalWars.post('market',
                {
                    ajaxaction: 'accept_offer'
                },
                {
                    id: offer_id,
                    count: count
                }, function(response)
                {
                    var mode = Market.Modes.all_own_offer;
                    if (response.hasOwnProperty('expired'))
                    {
                        UI.ErrorMessage(response.expired);
                        mode.removeOfferDisplay()
                    }
                    else
                    {
                        UI.SuccessMessage('Offer accepted.');
                        if (response.offers_remaining === 0)
                        {
                            mode.removeOfferDisplay(offer_id)
                        }
                        else mode.updateOffer(offer_id, response.offers_remaining);
                        mode.updateMerchants(response.merchants_available, response.merchants_total, response.merchant_carry)
                    }
                })
            },
            submitOfferAcceptForm: function($button)
            {
                var offer_id = $button.data('id'),
                    count = $button.parent().find('input[name=count]').val();
                this.acceptOffer(offer_id, count);
                return false
            },
            removeOfferDisplay: function(offer_id)
            {
                $offer_container = $('#offer_' + offer_id);
                var village_id = $offer_container.data('village'),
                    $village = $('#village_' + village_id),
                    village_offers_remaining = $village.data('offer-count') - 1;
                $village.data('offer-count', village_offers_remaining);
                if (mobile)
                {
                    $offer_container.next().remove();
                    $offer_container.prev().remove();
                    if (village_offers_remaining < 1)
                    {
                        $village.next().remove();
                        $village.remove()
                    }
                }
                else
                {
                    $village.attr('rowspan', parseInt($village.attr('rowspan')) - 1);
                    var $next_offer = $offer_container.next('.offer_container');
                    if ($next_offer[0] && $next_offer.data('village') === village_id) $next_offer.prepend($village.detach())
                };
                $offer_container.remove()
            },
            updateOffer: function(offer_id, count)
            {
                $offer_container = $('#offer_' + offer_id);
                $offer_container.data('count', count);
                $('#offer_count_' + offer_id).html(count)
            },
            updateMerchants: function(merchants_available, merchants_total, merchant_carry)
            {
                var max_carry = Math.floor(merchants_available * merchant_carry),
                    village = game_data.village;
                $('.offer_container').each(function()
                {
                    var $this = $(this),
                        offer_id = $this.data('id'),
                        res_needed = {
                            wood: $this.data('wanted_wood'),
                            stone: $this.data('wanted_stone'),
                            iron: $this.data('wanted_iron')
                        },
                        offer_count = $this.data('count'),
                        sum_res_wanted = 0,
                        max_acceptable_by_res = 0;
                    ['wood', 'stone', 'iron'].forEach(function(res)
                    {
                        sum_res_wanted += res_needed[res];
                        if (res_needed[res] > 0) max_acceptable_by_res = Math.floor(village[res] / res_needed[res])
                    });
                    var premium_needed = $this.data('wanted_premium');
                    if (premium_needed)
                    {
                        max_acceptable_by_res = Math.floor(game_data.player.pp / premium_needed);
                        sum_res_wanted = 1
                    };
                    var max_acceptable_by_merchant = sum_res_wanted > 0 ? Math.floor(max_carry / sum_res_wanted) : 0,
                        max_acceptable = Math.min(max_acceptable_by_res, max_acceptable_by_merchant, offer_count);
                    $fillmax = $('#fillmax_' + offer_id);
                    $fillmax.html(max_acceptable).data('max', max_acceptable)
                })
            },
            fillMax: function(anchor)
            {
                $anchor = $(anchor);
                $anchor.parent().find('input[name=count]').val($anchor.data('max'))
            }
        },
        other_offer:
        {
            init: function()
            {
                $('input[name=res_sell], input[name=res_buy]').change(Market.Modes.other_offer.check_ratio_enabled);
                $('form.market_pp_check').submit(this.check_pp);
                Market.Modes.other_offer.check_ratio_enabled();
                $('#offer_filter select, #offer_filter input[name=only_ally]').change(function()
                {
                    Market.Modes.other_offer.search()
                });
                $('#confirm_custom_ratio_max').click(function()
                {
                    Market.Modes.other_offer.search()
                })
            },
            check_ratio_enabled: function()
            {
                var selected_sell = '',
                    selected_buy = '';
                $('input[name=res_sell]').each(function()
                {
                    if (this.checked) selected_sell = this.value
                });
                $('input[name=res_buy]').each(function()
                {
                    if (this.checked) selected_buy = this.value
                });
                if (selected_sell == 'premium' || selected_buy == 'premium')
                {
                    $('input[name=ratio_max]').prop('disabled', true);
                    $('#custom_ratio_max_input').prop('disabled', true)
                }
                else
                {
                    $('input[name=ratio_max]').prop('disabled', false);
                    $('#custom_ratio_max_input').prop('disabled', false)
                }
            },
            check_pp: function()
            {
                var $this = $(this),
                    pp_cost = parseInt($this.data('pp'));
                if (pp_cost == 0 || $this.data('confirmed'))
                {
                    Market.Modes.other_offer.submitOfferAcceptForm($this);
                    return false
                };
                var $count = $this.find('input[name=count]');
                if ($count.length) pp_cost *= parseInt($count.val());
                var confirmChangeOrderCallback = function()
                {
                    $this.data('confirmed', true);
                    Market.Modes.other_offer.submitOfferAcceptForm($this)
                };
                Premium.check('ResourcesTradeAccept', pp_cost, confirmChangeOrderCallback);
                return false
            },
            lockSell: function(type)
            {
                $('input[name="res_sell"]').prop('disabled', false);
                $('#selection_sell :input[value="' + type + '"]').prop('disabled', true);
                this.setRatioUsability();
                this.search()
            },
            lockBuy: function(type)
            {
                $('input[name="res_buy"]').prop('disabled', false);
                $('#selection_buy :input[value="' + type + '"]').prop('disabled', true);
                this.setRatioUsability();
                this.search()
            },
            setRatioUsability: function()
            {
                if ($('#premium_sell').prop('checked') || $('#premium_buy').prop('checked'))
                {
                    $('#ratio_max').prop('disabled', true)
                }
                else $('#ratio_max').prop('disabled', false)
            },
            switchToCustomRatioUI: function()
            {
                $('#choose_ratio_max').remove();
                $('#custom_ratio_max').show();
                $('#custom_ratio_max_input').attr('name', 'ratio_max').select()
            },
            sort: function(column)
            {
                var old_order = $('#order_by').val();
                if (column === old_order) $('#toggle_dir').val(1);
                $('#order_by').val(column);
                this.search()
            },
            search: function()
            {
                $('#offer_filter').submit()
            },
            acceptOffer: function(offer_id, count)
            {
                TribalWars.post('market',
                {
                    ajaxaction: 'accept_offer'
                },
                {
                    id: offer_id,
                    count: count
                }, function(response)
                {
                    if (response.hasOwnProperty('expired'))
                    {
                        UI.ErrorMessage(response.expired)
                    }
                    else UI.SuccessMessage('Offer accepted.');
                    partialReload()
                })
            },
            submitOfferAcceptForm: function($form)
            {
                var offer_id = $form.find('input[name=id]').val(),
                    count = $form.find('input[name=count]').val();
                this.acceptOffer(offer_id, count);
                return false
            }
        },
        send:
        {
            init: function()
            {
                $('input.resources_max').change(Market.Modes.send.handleChange);
                $('#fill_recent_target').click(function()
                {
                    var $this = $(this);
                    Market.Modes.send.setCoords($this.data('x'), $this.data('y'));
                    return false
                })
            },
            setCoords: function(x, y)
            {
                $('#inputx').val(x);
                $('#inputy').val(y);
                return false
            },
            handleChange: function(event)
            {
                Market.Modes.send.recalcFreeCapacity()
            },
            insertMax: function(type)
            {
                var input = $("input[name='" + type + "']"),
                    oldValue = parseInt(input.val());
                if (isNaN(oldValue)) oldValue = 0;
                if (Market.Memory.freeCapacity == null) Market.Modes.send.recalcFreeCapacity();
                var newValue = 0;
                if (Market.Memory.freeCapacity > Market.Memory.res[type])
                {
                    newValue = Market.Memory.res[type]
                }
                else newValue = Market.Memory.freeCapacity;
                if (newValue <= 0)
                {
                    newValue = 0;
                    Market.Memory.res[type] = Market.Data.Res[type]
                }
                else newValue += oldValue;
                Market.Memory.res[type] -= newValue;
                if (newValue == 0) newValue = '';
                input.val(newValue);
                Market.Modes.send.recalcFreeCapacity()
            },
            recalcFreeCapacity: function()
            {
                var sum = 0;
                $('input.resources_max').each(function()
                {
                    var type = this.name,
                        value = Math.max(0, parseInt($(this).val(), 10));
                    if ($(this).val().indexOf('k') != -1) value *= 1e3;
                    if (isNaN(value))
                    {
                        value = 0
                    }
                    else $(this).val(value);
                    sum += value;
                    Market.Memory.res[type] = Market.Data.Res[type] - value
                });
                var currentMaxCapacity = Market.Data.Trader.capacity(),
                    freeCapacity = currentMaxCapacity - sum;
                Market.Set.freeCapacitiy(freeCapacity);
                Market.Modes.send.Alter.freeCapacity()
            },
            Alter:
            {
                freeCapacity: function()
                {
                    $('a.insert').each(function()
                    {
                        var res_name = $(this).attr('class').replace("insert ", ""),
                            res = Market.Memory.res[res_name],
                            capacity = 0;
                        if (res < Market.Memory.freeCapacity)
                        {
                            capacity = res
                        }
                        else capacity = Market.Memory.freeCapacity;
                        var input = $('input.resources_max[name="' + res_name + '"]');
                        if (capacity < 0)
                        {
                            $(input).css('color', 'red');
                            capacity = 0
                        }
                        else $(input).css('color', '');
                        $(this).text('(' + capacity + ')')
                    })
                }
            }
        }
    },
    AjaxRequest:
    {
        changeMaxTime: function(changeUrl, newMaxTime, maxTimeStringTarget, maxTimeValueTarget)
        {
            $.ajax(
            {
                type: 'POST',
                url: changeUrl,
                data:
                {
                    text: parseInt(newMaxTime)
                },
                dataType: 'json',
                success: function(response)
                {
                    if (response.error)
                    {
                        UI.ErrorMessage(response.error, 3e3)
                    }
                    else if (response.success) $(maxTimeStringTarget).html(response.max_time_string);
                    $(maxTimeValueTarget).val(response.max_time_value)
                }
            })
        }
    }
};
