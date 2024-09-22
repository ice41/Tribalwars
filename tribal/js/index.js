function toggle_visibility(id) {
	var e = document.getElementById(id);
	if(e.style.display == 'block')
		e.style.display = 'none';
	else
		e.style.display = 'block';
}

function toggle_screenshot(num) {
	var screenshotDiv = $('screenshot');
	if(screenshotDiv.getStyle('visibility') == 'hidden')
		show_screenshot(num);
	else
		hide_screenshot(num);
}

function show_screenshot(num) {
	// Bild einfÃ¼gen
	var screenshotImage = $('screenshot_image');
	if(screenshotImage.firstChild != null) return;
	var img = new Element('img', {
		'src': '/graphic/index/screenshot-' + num + '.jpg'
	});
	img.inject(screenshotImage);

	// Div einblenden
	var screenshot = $('screenshot');
	new Fx.Tween(screenshot, {duration:100, transition:Fx.Transitions.Sine.easeIn}).start('opacity', 0, 1);
}

function hide_screenshot() {
	var screenshotImage = $('screenshot_image');
	if(screenshotImage.firstChild == null) return;

	window.setTimeout('remove_screenshot()', 100);
	var screenshot = $('screenshot');
	new Fx.Tween(screenshot, {duration:100, transition:Fx.Transitions.Sine.easeIn}).start('opacity', 1, 0);
}

function remove_screenshot() {
	var screenshotImage = $('screenshot_image');
	screenshotImage.removeChild(screenshotImage.firstChild);
}

function hover_toggle_css(el, to_css, from_css) {
	$(el).toggleClass(to_css);
	if(from_css){
		$(el).toggleClass(from_css);
	}
}