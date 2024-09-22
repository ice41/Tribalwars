function rand(min, max) {
	return Math.floor(Math.random() * (max - min + 1)) + min;
}

///////////////////

function gameTipsToggle() {
	$$('#gameTour .inside a').each(function(node) {
		node.observe('mouseover', function(tip) {
			if (tip.effect) {
				tip.effect.cancel();
			}

			tip.effect = new Effect.Appear(tip, {
				duration : .4
			});
		}.curry(node.select('.gametip')[0]));

		node.observe('mouseout', function(tip) {
			if (tip.effect) {
				tip.effect.cancel();
			}

			tip.effect = new Effect.Fade(tip, {
				duration : .4
			});
		}.curry(node.select('.gametip')[0]));
	});
}

document.observe('dom:loaded', gameTipsToggle);

///////////////////

function popup(type, title, contentOrLocation, width) {
	popupClose();

	var wrapper_overlay = new Element('div', {className : 'popup_overlay'}).setOpacity(0);
	document.body.appendChild(wrapper_overlay);
	wrapper_overlay.appear({duration: .8});

	var wrapper = new Element('div', {className : 'popup'});
	wrapper.style.width = width + 'px';
	wrapper_overlay.insert(wrapper);

	var titleNode = new Element('div', {className : 'title'});
	titleNode.update(title);
	new Draggable(wrapper, {handle : titleNode, revert : false});
	wrapper.insert(titleNode);

	var close = new Element('div', {className : 'close'});
	close.observe('click', popupClose);
	titleNode.insert(close);

	var contentNode = new Element('div', {className : 'content'});
	wrapper.insert(contentNode);

	var preloader = new Element('div', {className : 'preloader'});
	contentNode.insert(preloader);

	if (type == 'ajax') {
		new Ajax.Updater(contentNode, contentOrLocation, {
			onComplete: function (transport) {
				try {
					transport.responseText.extractScripts().map(eval);
				} catch(err) {  }
			}
		});
	} else {
		contentNode.update(contentOrLocation);
	}
}

function popupClose() {
	$$('.popup_overlay').each(Element.remove);
}

///////////////////

function announcement(title, message, type) {
	if (!announcement.title) {
		announcement.title = title;
	}

	if (!type) {
		var type =  'info';
	}

	if (!announcement.messages) {
		announcement.messages = '';
	}
	announcement.messages += '<div class="message ' + type + '">' + message + '</div>';

	if (announcement.timer) {
		clearTimeout(announcement.timer);
	}

	announcement.timer = announcement.show.delay(.3);
}

announcement.show = function () {
	popup('content', announcement.title, '<div class="messagesWrapper" style="width: 355px">' + announcement.messages + '</div>', 470);
}

///////////////////

function registration() {
	$('registration_preloader').appear({duration: .5});
	$('registration_submit').hide();

	(function() {
		$('registration_form').request({
			onComplete : function(transport) {
				$('registration_preloader').hide();
				$('registration_submit').appear({duration: .5});

				var rs = transport.responseText.split('#');

				if (rs.length <= 1 && $('f-reg-user').value && $('f-reg-pass').value && $('f-reg-email').value && $('f-reg-terms').checked) {
					// Check all fileds w/o world
					popup('content', translates.chooseWorld, $('chooseWorldWrapper').innerHTML, 700);
					return;
				}

				if (parseInt(rs[0]) > 0) {
					$('login_form').user.value = rs[1];
					$('login_form').pass.value = rs[2];
					$('login_form').world_select.value = rs[5];
					$('login_form').submit();
				} else {
					if ($('f-reg-' + rs[2]) && rs[2] != 'world') {
						nodeTip($('f-reg-' + rs[2]), rs[1], 'error');
						$('f-reg-' + rs[2]).focus();
					} else {
						alert(rs[1]);
						$('f-reg-world').value = '';
					}
				}
			}
		});
	}).delay(.5);
}

///////////////////

function nodeTip(node, text, type) {
	if (nodeTip.last) {
		nodeTip.last.remove();
	}

	var wrapper = new Element('div', {className: 'message arrowLeft ' + type}).setOpacity(0);
	wrapper.insert(new Element('div', {className: 'arrow'}));
	wrapper.insert(new Element('div', {className: 'close'}));
	wrapper.insert(text);
	document.body.appendChild(wrapper);
	nodeTip.last = wrapper;
	wrapper.appear({duration: .8});

	var nodeTopAndLeft = Element.cumulativeOffset(node);

	wrapper.style.left = (nodeTopAndLeft[0] + node.getWidth() + 18) + 'px';
	wrapper.style.top = (nodeTopAndLeft[1] + (node.getHeight() / 2) - 29) + 'px';
}

///////////////////

Slider = {
	changeDuration: 6,
	timer: 0,
	lastTrailerNode: null,
	fragmentsNum: 5,
	currentFragment: 0
};

Slider.init = function() {
	$$('li[id*="nav-fragment-"] a').each(function (node) {
		node.observe('click', Slider.show.curry(node.up().id.replace('nav-fragment-', '')));
	});

	Slider.show(1);
};

Slider.show = function(id) {
	var id = parseInt(id);

	Slider.stopTrailer();
	Slider.currentFragment = id;
	Slider.changeSlider();

	$$('li[id*="nav-fragment-"]').each(function (node) {
		Element.removeClassName(node, 'ui-tabs-selected');
	});

	$$('div[id*="fragment-"]').each(function (node) {
		if (node.effect) {
			node.effect.cancel();
		}
		node.effect = new Effect.Fade(node);
	});

	Element.addClassName($('nav-fragment-' + id), 'ui-tabs-selected');

	if ($('fragment-' + id).effect) {
		$('fragment-' + id).effect.cancel();
	}
	$('fragment-' + id).effect = new Effect.Appear($('fragment-' + id));
};

Slider.changeSlider = function() {
	clearTimeout(Slider.timer);
	var next = Slider.currentFragment + 1 > Slider.fragmentsNum ? 1 : ++Slider.currentFragment;
	Slider.timer = Slider.show.delay(Slider.changeDuration, next);
};

Slider.stop = function() {
	clearTimeout(Slider.timer);
};

Slider.playTrailer = function(id, trailerId) {
	Slider.stop();

	var node = $(id);
	node.onclick = function(){};
	node.originalCode = node.innerHTML;

	Slider.lastTrailerNode = node;

	var src = '<object width="528" height="386">';
	src += '<param name="movie" value="http://www.youtube.com/v/' + trailerId + '?fs=1&amp;autoplay=1"></param>';
	src += '<param name="allowFullScreen" value="true"></param>';
	src += '<param name="wmode" value="transparent"></param>';
	src += '<embed src="http://www.youtube.com/v/' + trailerId + '?fs=1&amp;autoplay=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" width="528" height="386"></embed>';
	src += '</object>';
	node.update(src);
};

Slider.stopTrailer = function() {
	if (Slider.lastTrailerNode) {
		twoVideosOnGate.notInPlayMode = false;
		Slider.lastTrailerNode.update(Slider.lastTrailerNode.originalCode);
		Slider.lastTrailerNode = null;
	}
};

document.observe('dom:loaded', Slider.init);

///////////////////

function languageList(show) {
	var node = $('languagesList');

	if (node.effect) {
		node.effect.cancel();
	}

	node.effect = new Effect[show ? 'Appear' : 'Fade'](node, {duration: .5});
}

///////////////////

function blink(node, effectIn) {
	if (!$(node).isBlinkOverve) {
		$(node).isBlinkOverve = true;
		$(node).observe('click', function() {
			this.stopBlink = 1;
		});
	}

	if ($(node).stopBlink) {
		$(node).setOpacity(1);
		return;
	}

	new Effect.Opacity($(node), {from: effectIn ? .7 : 1, to: effectIn ? 1 : .7, duration: .5, afterFinish: blink.curry(node, !effectIn)});
}

document.observe('dom:loaded', function() {
	blink($$('#loginButtons .btnLgn')[0]);
});

///////////////////

function tourSlider(step) {
	// Steps Slider
	var stepsSlider = $$('#gameTourSlider .stepsWrapper .stepsSlider')[0];
	var stepsSliderX = (step - 1) * -880;

	if (stepsSlider.effect) {
		stepsSlider.effect.cancel()
	}

	stepsSlider.effect = new Effect.Move(stepsSlider, {
		x: stepsSliderX,
		mode: 'absolute'
		//transition: Effect.Transitions.spring
	});


	// Active Dot
	var activeDot = $$('#gameTourSlider .dotControls .activeDot')[0];
	var activeDotX = (step - 1) * 23;

	if (activeDot.effect) {
		activeDot.effect.cancel()
	}

	activeDot.effect = new Effect.Move(activeDot, {
		x: activeDotX,
		mode: 'absolute'
		//transition: Effect.Transitions.spring
	});


	// Controls Slider
	var controlsSlider = $$('#gameTourSlider .controlsWrapper .controlsSlider')[0];
	var controlsSliderY = (step - 1) * -70;
	controlsSlider.style.top = controlsSliderY + 'px';
}

///////////////////

function showRegisterArrow(hideArrow, arrowDirection) {
	hideArrow = typeof(hideArrow) != 'undefined' ? hideArrow : true;
	arrowDirection = typeof(arrowDirection) != 'undefined' ? arrowDirection : 'ltr';

	if (!$('register_arrow')) {
		document.body.appendChild(new Element('div', {id: 'register_arrow'}).hide());
	}

	var arrow = $('register_arrow');
	arrow.appear({duration: .5});

	/**
	 * Left position indicates whether value should be added or subtracted
	 * when calculating the left position of the arrow
	 */
	if(arrowDirection == 'ltr') {
		leftPostion = 1;
		arrowWidth = 0;
	} else {
		leftPostion = -1;
		arrowWidth = arrow.getWidth();
	}

	var nodeTopAndLeft = Element.cumulativeOffset($('f-reg-user'));

	arrow.style.left = (nodeTopAndLeft[0] + leftPostion * 200) + 'px';
	arrow.style.top = nodeTopAndLeft[1] - 12 + 'px';

	new Effect.Move(arrow, {
		x: nodeTopAndLeft[0] + leftPostion * $('f-reg-user').getWidth() + leftPostion * 10 + arrowWidth,
		y: nodeTopAndLeft[1] - 12,
		mode: 'absolute',
		transition: Effect.Transitions.spring
	});

	if(hideArrow) {
		Element.fade.delay(5, arrow);
	}
}

//This function plays different videos on gate slide 1
function twoVideosOnGate(trailer_id, trailer2_id, event) {
	twoVideosOnGate.notInPlayMode = true;
	var element = event.element();
	var x = Event.pointerX(event);

	var elementPositon = element.cumulativeOffset();
	var innerMousePosition = x - elementPositon[0];
	if(innerMousePosition < 265){
		Slider.playTrailer('fragment-1', trailer_id);
	}else{
		Slider.playTrailer('fragment-1', trailer2_id);
	}
}

function janela(url, width, height) {
	wnd = window.open(url, "popup", "width="+width + ",height="+height + ",left=150,top=150,resizable=yes");
	wnd.focus();
}