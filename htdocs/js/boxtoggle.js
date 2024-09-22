/*c1990bebbb7c6e04bdf19700cf8b10ff*/
function MapToggleBox(cfg){var _cfg=$.extend({visible:false,url:null,onShow:null,onHide:null},cfg);cfg=_cfg;var _that=this,_id=_cfg.id,_visible=_cfg.visible,_visible_pending=false,_url=_cfg.url,_el=$(document.getElementById(_id)),_el_wrap=$('.'+_id+'_wrap'),_el_toggle=$('.'+_id+'_toggler');this.show=function(){if(_url){_visible_pending=true;$.ajax({url:_url,dataType:'html',success:_onContentReceived})}else _show()};this.hide=function(){_hide()}
function _setSliderImages(){var imgsrc=KAMap.image_base+'/icons/slide_'+(_visible?'up':'down')+'.png';_el_toggle.attr('src',imgsrc)}
function _show(){if(_cfg.onShow!==null)_cfg.onShow();_visible=true;_setSliderImages();_el.show('fast')}
function _hide(){if(_cfg.onHide!==null)_cfg.onHide();_visible=false;_visible_pending=false;_setSliderImages();_el.hide('fast')}
function _onClickToggle(){if(_visible){_that.hide()}else _that.show();return false}
function _onContentReceived(data){if(!_visible_pending)return;_visible_pending=false;_el.html(data);_show()};if(!_visible){_el_wrap.hide();_el.hide()};_el_toggle.click(_onClickToggle);_setSliderImages()}