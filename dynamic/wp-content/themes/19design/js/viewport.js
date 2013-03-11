var swidth = window.screen.width,
	vpwidth = 768,
	vlwidth = 1024,
	minwidth = 750,
	attr = ', user-scalable=no, initial-scale=1.0;';

updateOrientation();
window.addEventListener('orientationchange', updateOrientation, false);

function updateOrientation() {
	var viewport = document.querySelector("meta[name=viewport]");
	if (swidth >= 768) {
		switch (window.orientation) {
			case 0 : //portrait
				viewport.setAttribute('content', 'width=' + vpwidth + attr);
				break;
			case 90 : case -90 : //landscape
				viewport.setAttribute('content', 'width=' + vlwidth + attr);
				break;
			default :
				viewport.setAttribute('content', 'width=' + vpwidth + attr);
				break;
		}
	}
}
