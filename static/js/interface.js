$(document).ready(function(){
	var $body 	 = $('body'),
		$window  = $(window),
		$content = $('#content');
	
	if ($body.hasClass('home')) {
	
		var $j_list 	= $('.jobs-list'),
			$j_items 	= $j_list.find('>.job-item'),
			$w_height 	= $window.height() - 190,
			rows 		= 2,
			limit 		= Math.ceil( $j_items.length / rows );

		$j_items.filter(function(index){ return !( index % limit ); }).css('margin-left',0).prev().css('margin-right',0);
		$j_items.last().css('margin-right',0);
		
		$j_list.width( limit * $j_items.eq(1).outerWidth(true) - 20 );
		$window.resize(function(){
			var $j_list   = $('.jobs-list'),
				$w_height = $window.height() - 190,
				$content  = $('#content');
			if ( $w_height > $j_list.height() ) {
				$j_list.css('margin-top', ($w_height / 2) - ($j_list.outerHeight(true) / 2) );
				if ($content.hasClass('has-scroll')) $content.tinyscrollbar_update();
			}
		}).trigger('resize');
		
		$content.wrapInner('<div class="viewport"><div class="overview"></div></div>');
		$content.prepend('<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>');
		$content.addClass('has-scroll').tinyscrollbar({axis:'x', sizethumb:13, invertscroll:true});
		
		$j_items.find('>a').hover(function(){
			$(this).find('>img').fadeTo(0,0);
			$(this).find('>.job-name,>.job-terms').fadeTo(0,1);
		},function(){
			$(this).find('>img').fadeTo(0,1);
			$(this).find('>.job-name,>.job-terms').fadeTo(0,0);
		});
		
	} else if ($body.hasClass('page')) {

		$('.columnize>h2').addClass('dontend');
		$('.columnize').columnize({
			width: 400,
			height: ($window.height() - 320) < $('.sidebar,#hcard').height() ? $('.sidebar,#hcard').height() : $window.height() - 320,
			buildOnce: false
		});
		
		$window.resize(function(){
			var $content  = $('#content'),
				$w_height = $window.height() - 190,
				$divs 	  = $('.sidebar,.hentry,#hcard',$content);
			if ( $w_height > $content.height() ) {
				$divs.css('padding-top', ($w_height / 2) - ($content.height() / 2) );
				if ($content.hasClass('has-scroll')) $content.tinyscrollbar_update();
			}
		}).trigger('resize');

		$content.wrapInner('<div class="viewport"><div class="overview"></div></div>');
		$content.prepend('<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>');
		$content.addClass('has-scroll').tinyscrollbar({axis:'x', sizethumb:13, invertscroll:true});
		
		if ($body.hasClass('page-contato')) {
			
			$('#mensagem').scroll(function(){
				var y = $(this).scrollTop();
				$(this).css("background-position", "0px -" + y +"px" );
			});
			
		}
		
	} else if ($body.hasClass('single')) {
		
		$window.resize(function(){
			var $content  = $('#content'),
				$w_height = $window.height() - 190,
				$divs 	  = $('.screenshots,.sidebar',$content);
			if ( $w_height > $content.height() ) {
				$divs.css('padding-top', ($w_height / 2) - ($content.height() / 2) );
				if ($content.hasClass('has-scroll')) $content.tinyscrollbar_update();
			}
		}).trigger('resize');

		$content.wrapInner('<div class="viewport"><div class="overview"></div></div>');
		$content.prepend('<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>');
		$content.addClass('has-scroll').tinyscrollbar({axis:'x', sizethumb:13, invertscroll:true});
		
	}
});

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
