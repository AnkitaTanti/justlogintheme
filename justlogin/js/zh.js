(function($) {
	//navigation for dropdowns & Resources Page
	$('.navbar .dropdown').hover(function() {
	$(this).find('.dropdown-menu').first().stop(true, true).show();

	}, function() {
	$(this).find('.dropdown-menu').first().stop(true, true).hide();

	});

	$('.navbar .dropdown.menu-item-26 > a').click(function(){
	location.href = this.href;
	});

//	$('.navbar .dropdown.menu-item-26 a').attr('href','http://i-concept.com.sg/client-project/justlogin/resources/');

	//Blog
	$('#blog-row2').insertBefore('#mailchimp-insert');

	//footer
	$('#wrapper-footer-full .col-md-3').addClass('col-sm-6');
	$('#footer-free a').mouseenter(function() {
		$('#footer-free').css('background','white');
		$('#footer-free a').css('color','#e53d51');
	}).mouseout(function(){
		$('#footer-free').css('background','#e53d51');
		$('#footer-free a').css('color','white');
	});

	//pricing columns
	equalheight = function(container){

	var currentTallest = 0,
		 currentRowStart = 0,
		 rowDivs = new Array(),
		 $el,
		 topPosition = 0;
	 $(container).each(function() {

	   $el = $(this);
	   $($el).height('auto')
	   topPostion = $el.position().top;

	   if (currentRowStart != topPostion) {
		 for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
		   rowDivs[currentDiv].height(currentTallest);
		 }
		 rowDivs.length = 0; // empty the array
		 currentRowStart = topPostion;
		 currentTallest = $el.height();
		 rowDivs.push($el);
	   } else {
		 rowDivs.push($el);
		 currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
	  }
	   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
		 rowDivs[currentDiv].height(currentTallest);
	   }
	 });
	}

	$(window).ready(function() {
//		equalheight('#pricing-row3 .wpb_column .vc_column-inner');
		equalheight('.partner-row3-col-row .vc_column-inner');
		equalheight('.partner-row3-h2');

	});


	$(window).resize(function(){
//		equalheight('#pricing-row3 .wpb_column .vc_column-inner');
		equalheight('.partner-row3-col-row .vc_column-inner');
		equalheight('.partner-row3-h2');
	});

	//pricing page
	$('.page-id-14 #pricing-row6').insertAfter('#content');
	$('.page-id-14 #pricing-row5').insertAfter('#content');
	$('.page-id-14 #pricing-row6').wrap( "<div class='container'></div>" );
	$(window).ready(function() {
		$('.page-id-14 #pricing-row6 .vc_tta-panel.vc_active').find('.vc_tta-panel-body').css('height','0');
		$('.page-id-14 #pricing-row6 .vc_tta-panel.vc_active').removeClass('vc_active');

	});

	$('#price-accordion1 .vc_tta-panel a').click(function(){
		$('#price-accordion2 .vc_tta-panel').removeClass('vc_active');
	});
	$('#price-accordion2 .vc_tta-panel a').click(function(){
		$('#price-accordion1 .vc_tta-panel').removeClass('vc_active');
	});

	//resources blogs
	$(window).on('load', function() {
		$('#resource-row4 .vc_grid-item').addClass('vc_col-xl-3').addClass('vc_col-lg-4').addClass('vc_col-sm-6').removeClass('vc_col-sm-3');
		console.log('a');
	});

	//Platform videos
	$('#just-row5').insertBefore('#blue-content').addClass('container');
	$('#just-row6').insertBefore('#blue-content').addClass('container');
	$('#just-row7').insertBefore('#blue-content').addClass('container');

	//About page
	$('#about-row7-col1-text').insertAfter('#about-row7-col1-acc .vc_tta-panel-title');
	$('#about-row7-col2-text').insertAfter('#about-row7-col2-acc .vc_tta-panel-title');
	$('#about-row7-col3-text').insertAfter('#about-row7-col3-acc .vc_tta-panel-title');
	$('#about-row8').insertAfter('#content');
	$(window).ready(function() {
		equalheight('.about-row7 .vc_tta-panel-heading');
		equalheight('.blog-nav-title ');
	});


	$(window).resize(function(){
		equalheight('.about-row7 .vc_tta-panel-heading');
		equalheight('.blog-nav-title ');
	});

	//Webinars
	$('.page-id-818 .result-category').html('<a href="https://i-concept.com.sg/client-project/justlogin/webinars/">Webinars</a>');

	//Blogs
	 var myEle = document.getElementById("recommend-insert");
    if(myEle){
		$('#recommended').insertAfter('#recommend-insert');
	} else {
		$('#recommended').css('display','none');
	}
	if ($(window).width() < 992) {
			  $('.next-previous-posts').insertAfter('#column-left-sia');
	  }
	 else {
		  $('.next-previous-posts').insertAfter('#content');
	 }
	 $(window).resize(function() {
		  if ($(window).width() < 992) {
			  $('.next-previous-posts').insertAfter('#column-left-sia');
		  }
		 else {
			  $('.next-previous-posts').insertAfter('#content');
		 }
	  });

	//AJAX PAGINATION
//	$(document).ready(function(){
//		$('#testimonial-container .wp-pagenavi a').on('click', function(e){
//			e.preventDefault();
//			var link = $(this).attr('href');
//			$('#testimonial-container').load(link + '#testimonial-container', function() {
//				$('#testimonial-container').fadeIn(500);
//			});
//		});
//	});
})( jQuery_3_3_1 );
