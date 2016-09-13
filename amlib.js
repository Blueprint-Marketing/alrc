jQuery(function($) {

	$('.faqs .heading').click(function() {
		$(this).parent().toggleClass('open');
	});

	$('#opportunities-learn').on('click',function(){
		$(this).parent().parent().parent().parent().find('.details-pop-over').fadeIn();
	});
	$('#close-content').on('click',function(){
		$('.details-pop-over').fadeOut();
	});
});