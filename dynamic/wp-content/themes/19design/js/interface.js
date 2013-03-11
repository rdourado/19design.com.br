$(window).load(function(){
	setTimeout(function(){
		$('#preloader').remove();
	}, 110);
});
$(document).ready(function(){
	var $body 	 = $('body'),
		$window  = $(window),
		$content = $('#content');

	if ($body.hasClass('home') || $body.hasClass('archive') || $body.hasClass('blog')) {

		var $j_list 	= $('.jobs-list'),
			$j_items 	= $j_list.find('>.job-item'),
			$content 	= $('#content');

		$content.wrapInner('<div class="viewport"><div class="overview"></div></div>');
		$content.prepend('<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>');
		$content.addClass('has-scroll').tinyscrollbar({axis:'x', sizethumb:20, invertscroll:true});

		$j_items.find('>a').click(function(){
			window.location = $(this).attr('href');
		});

		$window.resize(function(){
			setTimeout(function(){
				var $w_height 	= $window.height() - 172,
					rows 		= navigator.userAgent.match(/(iPad)/) && (!window.orientation || window.orientation == 180) ? 3 : 2,
					limit 		= Math.ceil( $j_items.length / rows );
				$j_list.width( limit * $j_items.eq(1).outerWidth(true) - 20 );
				$j_items.attr('style','');
				$j_items.filter(function(index){ return !( index % limit ); }).css('margin-left',0).prev().css('margin-right',0);
				$j_items.last().css('margin-right',0);

				if ( $w_height > $j_list.height() ) {
					$j_list.css('margin-top', 0);
					$j_list.css('margin-top', ($w_height / 2) - ($j_list.outerHeight(true) / 2) );
					if ($content.hasClass('has-scroll')) $content.tinyscrollbar_update();
				}
			}, 100);
		}).trigger('resize');

	} else if ($body.hasClass('page')) {

		try{
			$('.columnize>h2').addClass('dontend');
			$('.columnize').columnize({
				// height: ($window.height() - 320) < $('.sidebar,#hcard').height() ? $('.sidebar,#hcard').height() : $window.height() - 320,
				width: 345,
				height: 440,
				buildOnce: false
			});
			// console.log('columnize');
		}catch(e){}

		$content.wrapInner('<div class="viewport"><div class="overview"></div></div>');
		$content.prepend('<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>');
		$content.addClass('has-scroll').tinyscrollbar({axis:'x', sizethumb:20, invertscroll:true});

		if ($body.hasClass('page-contato')) {

			$('#mensagem').scroll(function(){
				var y = $(this).scrollTop();
				$(this).css("background-position", "0px -" + y +"px" );
			});

		}

		$window.resize(function(){
			setTimeout(function(){
				var $content  = $('#content'),
					$w_height = $window.height() - 172,
					$divs 	  = $('.sidebar,.hentry,#hcard',$content);
				if ( $w_height > $content.height() ) {
					var new_padding = ($w_height / 2) - ($content.height() / 2);
					if (new_padding < 30) new_padding = 30;
					$divs.css('padding-top', new_padding );
					if ($content.hasClass('has-scroll')) $content.tinyscrollbar_update();
				}
			}, 100);
		}).trigger('resize');

	} else if ($body.hasClass('single')) {

		$content.wrapInner('<div class="viewport"><div class="overview"></div></div>');
		$content.prepend('<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>');
		$content.addClass('has-scroll').tinyscrollbar({axis:'x', sizethumb:20, invertscroll:true});

		$window.resize(function(){
			setTimeout(function(){
				var $content  = $('#content'),
					$w_height = $window.height() - 172,
					$divs 	  = $('.screenshots,.sidebar',$content);
				if ( $w_height > $content.height() ) {
					var new_padding = ($w_height / 2) - ($content.height() / 2);
					if (new_padding < 30) new_padding = 30;
					$divs.css('padding-top', new_padding );
					if ($content.hasClass('has-scroll')) $content.tinyscrollbar_update();
				}
			}, 100);
		}).trigger('resize');

	}

	// Slides
	$('.slides-list').slick({
		dots: true,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		autoplay: true,
		autoplaySpeed: 4000,
		pauseOnHover: false
	});
});

var swidth = window.screen.width,
	vpwidth = 768,
	vlwidth = 1024,
	minwidth = 750,
	attr = ', initial-scale=1.0, maximum-scale=6.0, minimum-scale=1.0, user-scalable=1';

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
