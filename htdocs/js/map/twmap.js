/* 23706 trunk*/
TWMap.initMap = function()
{
    $('#map_blend').hide();
    this.mapHandler.scrollBound = this.scrollBound;
    var minimap = new FreeMap(document.getElementById('minimap'), [5, 5], 50, this.minimapHandler, 0);
    minimap.createMover(1);
    this.minimap = minimap;
    this.minimapWidth = $('#minimap').width();
    this.minimapHeight = $('#minimap').height();
    this.minimapHandler.scrollBound = this.getMinimapScrollBound();
    if (TWMap.minimap_only)
    {
        this.scaleMinimap();
        return
    };
    var map = new FreeMap(document.getElementById('map'), this.tileSize, this.mapSubSectorSize, this.mapHandler, 26500);
    if (!$.browser.msie || true) map.createMover(this.mobile ? 1 : 2);
    this.map = map;
    this.scaleMinimap();
    this.minimapHandler.scrollBound = this.getMinimapScrollBound();
    this.map_el_coordx = document.getElementById('map_coord_x');
    this.map_el_coordy = document.getElementById('map_coord_y');
    this._coord_el_y = [];
    this._coord_el_y_active = [];
    this._coord_el_x = [];
    this._coord_el_x_active = [];
    var c;
    for (c = 0; c < 1e3; c++)
    {
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
    if (typeof Warplanner !== 'undefined') Warplanner.init();
    $(document).keydown(TWMap.onKeyDown);
    $(document).keyup(TWMap.onKeyUp)
};
TWMap.focus = function(x, y)
{
    x = ~~Math.max(x, (this.scrollBound[0] + this.size[0] / 2));
    y = ~~Math.max(y, (this.scrollBound[1] + this.size[1] / 2));
    x = Math.min(x, ((this.scrollBound[2] + 1) - this.size[0] / 2));
    y = Math.min(y, ((this.scrollBound[3] + 1) - this.size[1] / 2));
    if (TWMap.map) TWMap.map.centerPos(x, y, true);
    if (TWMap.minimap_only) TWMap.minimap.centerPos(x, y, true);
    TWMap.pos = [x, y];
    TWMap.home.updateDisplay()
};
TWMap.mapHandler.spawnSector = function(data, sector)
{
    if (TWMap.minimap_only) return;
    var beginX = sector.x - data.x,
        endX = beginX + TWMap.mapSubSectorSize,
        beginY = sector.y - data.y,
        endY = beginY + TWMap.mapSubSectorSize;
    if (TWMap.church.displayed || TWMap.politicalMap.displayed || TWMap.warMode || TribalWars._settings.map_show_watchtower) MapCanvas.createCanvas(sector, data);
    sector.dom_fragment = document.createDocumentFragment();
    var el_border = this._createBorder(sector.x % 100 == 0);
    el_border.style.width = '1px';
    el_border.style.height = (TWMap.mapSubSectorSize * TWMap.tileSize[1]) + 'px';
    sector.appendElement(el_border, 0, 0);
    el_border = this._createBorder(sector.y % 100 == 0);
    el_border.style.height = '1px';
    el_border.style.width = (TWMap.mapSubSectorSize * TWMap.tileSize[0]) + 'px';
    sector.appendElement(el_border, 0, 0);
    if (TWMap.ghost)
    {
        var ghostX = TWMap.ghost.x,
            ghostY = TWMap.ghost.y;
        if (ghostX >= sector.x && ghostX < sector.x + TWMap.mapSubSectorSize && ghostY >= sector.y && ghostY < sector.y + TWMap.mapSubSectorSize)
        {
            var diffX = ghostX - TWMap.ghost.x,
                diffY = ghostY - TWMap.ghost.y;
            TWMap.villages[ghostX * 1e3 + ghostY] = {
                owner: 0,
                points: 0,
                img: TWMap.ghost_village_tile,
                special: 'ghost'
            }
        }
    };
    var x;
    for (x in data.tiles)
    {
        if (!data.tiles.hasOwnProperty(x)) continue;
        x = parseInt(x);
        if (x < beginX || x >= endX) continue;
        var y;
        for (y in data.tiles[x])
        {
            if (!data.tiles[x].hasOwnProperty(y)) continue;
            y = parseInt(y);
            if (y < beginY || y >= endY) continue;
            var el = document.createElement('img');
            el.style.position = 'absolute';
            el.style.zIndex = '2';
            var v = TWMap.villages[(data.x + x) * 1e3 + data.y + y];
            if (v)
            {
                var owner = v.owner,
                    ally = (v.owner > 0 && TWMap.players[v.owner]) ? TWMap.players[v.owner].ally : 0;
                if (v.owner == 0)
                {
                    if (TWMap.villageGroups[v.id])
                    {
                        var col = TWMap.villageGroups[v.id],
                            circle = TWMap.createVillageDot(col);
                        sector.appendElement(circle, x - beginX, y - beginY)
                    }
                }
                else
                {
                    var col = null;
                    if (v.id == game_data.village.id)
                    {
                        col = TWMap.colors['this']
                    }
                    else col = TWMap.getColorByPlayer(owner, ally, v.id);
                    el.style.backgroundColor = 'rgb(' + col[0] + ',' + col[1] + ',' + col[2] + ')'
                };
                imgsrc = TWMap.images[v.img];
                el.id = 'map_village_' + v.id;
                el.setAttribute('src', TWMap.graphics + imgsrc);
                if (TribalWars._settings.map_casual_hide && TWMap.attackable_players != null && v.owner != 0 && $.inArray(v.owner, TWMap.attackable_players) === -1)
                {
                    el.style.opacity = 0.4;
                    el.style.filter = 'alpha(opacity=40)'
                };
                var icons = TWMap.createVillageIcons(v),
                    i;
                for (i = 0; i < icons.length; i++) sector.appendElement(icons[i], x - beginX, y - beginY);
                $(el).mouseout(TWMap.popup.hide())
            }
            else el.setAttribute('src', TWMap.graphics + TWMap.images[data.tiles[x][y]]);
            sector.appendElement(el, x - beginX, y - beginY)
        }
    };
    sector._element_root.appendChild(sector.dom_fragment);
    sector.dom_fragment = undefined
};
TWMap.scrolling = false;
TWMap.scrollBlock = function(x, y)
{
    if (this.scrolling) return;
    this.scrolling = true;
    var dst = [TWMap.pos[0] + TWMap.size[0] * x, TWMap.pos[1] + TWMap.size[1] * y],
        scrollTID = setInterval(function()
        {
            if ((x == -1 && TWMap.map.viewport[0] <= TWMap.scrollBound[0]) || (y == -1 && TWMap.map.viewport[1] <= TWMap.scrollBound[1]) || (x == 1 && TWMap.map.viewport[2] >= TWMap.scrollBound[2]) || (y == 1 && TWMap.map.viewport[3] >= TWMap.scrollBound[3]))
            {
                clearInterval(scrollTID);
                TWMap.scrolling = false;
                return
            };
            if ((x > 0 && TWMap.pos[0] >= dst[0]) || (x < 0 && TWMap.pos[0] <= dst[0]) || (y > 0 && TWMap.pos[1] >= dst[1]) || (y < 0 && TWMap.pos[1] <= dst[1]))
            {
                clearInterval(scrollTID);
                TWMap.scrolling = false;
                return
            };
            var p = [TWMap.pos[0], TWMap.pos[1]];
            if (TWMap.pos[0] != dst[0]) p[0] += x;
            if (TWMap.pos[1] != dst[1]) p[1] += y;
            TWMap.focus(p[0], p[1])
        }, 30)
};
TWMap._resizeID = null;
TWMap.resizeMinimap = function(size, smooth)
{
    var dstWidth = size * this.minimap.scale[0],
        dstHeight = size * this.minimap.scale[1];
    TWMap.minimap.resize(dstWidth, dstHeight, smooth || false);
    setTimeout(function()
    {
        TWMap.notifyMapSize()
    }, 250)
};
TWMap.resize = function(size, smooth)
{
    if (size == 0)
    {
        dstWidth = $(window).width();
        dstHeight = Math.max(window.outerHeight, window.innerHeight);
        if (!TWMap.fullscreen)
        {
            dstWidth -= 100;
            dstHeight -= 100
        };
        this.isAutoSize = true
    }
    else if (typeof size == 'number')
    {
        dstWidth = size * this.map.scale[0];
        dstHeight = size * this.map.scale[1];
        this.isAutoSize = false
    }
    else
    {
        dstWidth = size[0] * this.map.scale[0];
        dstHeight = size[1] * this.map.scale[1];
        this.isAutoSize = false
    };
    if ($.browser.msie) smooth = false;
    TWMap.map.resize(dstWidth, dstHeight, smooth ? 1 : 0);
    TWMap.home.updateDisplay()
};
TWMap.minimapHandler.onResize = function(sx, sy)
{
    TWMap.scaleMinimap()
};
TWMap.mapHandler.onResizeBegin = function()
{
    TWMap.isAutoSize = false;
    TWMap.isDragResizing = true;
    TWMap.popup.unregister()
};
TWMap.mapHandler.onResizeEnd = function()
{
    TWMap.notifyMapSize(false);
    TWMap.isDragResizing = false;
    TWMap.popup.register();
    var $y_axis = $('#map_coord_y_wrap');
    $y_axis.css('height', ($y_axis.height() - 17) + 'px')
};
TWMap.minimapHandler.onResizeEnd = function()
{
    TWMap.notifyMapSize(false);
    TWMap.positionMinimap()
};
TWMap.mapHandler.onResize = function(sx, sy)
{
    TWMap.scaleMinimap();
    TWMap.size = TWMap.map.coordByPixel(sx, sy, false);
    if (!TWMap.isDragResizing) TWMap.notifyMapSize(TWMap.isAutoSize)
};
TWMap.mapHandler.getResizableElements = function()
{
    return [
        [document.getElementById('map_coord_x_wrap')],
        [document.getElementById('map_coord_y_wrap')]
    ]
};
TWMap.onKeyDown = function(e)
{
    if (!HotKeys.enabled) return;
    TWMap.keys[e.keyCode] = true;
    var pos = TWMap.map.pos,
        move_direction = [0, 0];
    if (TWMap.keys.hasOwnProperty(37)) move_direction[0] -= 15;
    if (TWMap.keys.hasOwnProperty(38)) move_direction[1] -= 15;
    if (TWMap.keys.hasOwnProperty(39)) move_direction[0] += 15;
    if (TWMap.keys.hasOwnProperty(40)) move_direction[1] += 15;
    if (move_direction[0] == 0 && move_direction[1] == 0) return;
    e.preventDefault();
    TWMap.map.setPosPixel(pos[0] + move_direction[0], pos[1] + move_direction[1])
};
TWMap.onKeyUp = function(e)
{
    if (!HotKeys.enabled) return;
    delete TWMap.keys[e.keyCode]
}