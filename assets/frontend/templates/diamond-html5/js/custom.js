jQuery(function(){
	//Top Menu
	jQuery('#desktopMenu li').mouseenter(function(){
		jQuery(this).find('ul').show();
	}).mouseleave(function(){
		jQuery(this).find('ul').hide();
	});
});

jQuery(function(){
	//Top Sellers
	jQuery('#modTopSellers').append('<ul class="topSellerThumbs"></ul><div class="clear" />');
	jQuery('#modTopSellers .img a').each(function() {
		var images = jQuery(this).html();
		jQuery('.topSellerThumbs').append('<li><a href="javascript:void(0);">' + images + '</a></li>');
	});
	jQuery('#modTopSellers div.info').each(function(index){
		jQuery(this).addClass('prod' + index);
	});
	jQuery('ul.topSellerThumbs li').each(function(index){
		jQuery(this).addClass('prod' + index);
	});
	jQuery('.topSellerThumbs li a').first().addClass('active');
	jQuery('.topSellerThumbs li a').mouseenter(function(e){
		e.preventDefault();
		jQuery('.topSellerThumbs li a').removeClass('active');
		jQuery(this).addClass('active');
		var theProd = jQuery(this).parent().attr('class');
		jQuery('#modTopSellers div.info').hide();
		jQuery('#modTopSellers div.info.'+theProd).show();
	});
});

jQuery(function(){
	//Responsive menu
	jQuery('.mobBtns > li > a').click(function(){
		if(jQuery(this).parent().find('> ul').hasClass('activeUl')){
			jQuery(this).parent().find('> ul').removeClass('activeUl');
		}else{
			jQuery('.mobBtns > li > ul').removeClass('activeUl');
			jQuery(this).parent().find('> ul').addClass('activeUl');
		}
	});
	
	//Mobile Categories
	var menuLinks = jQuery('#desktopMenu').html();
	jQuery('.mobBtns li ul.menu').append(menuLinks);
	
});

jQuery(window).scroll(function() {
	//Sticky Menu
	if (jQuery(this).scrollTop() > 61){  
		jQuery('.mobileview').addClass("sticky");
	}else{
		jQuery('.mobileview').removeClass("sticky");
	}
});



