$(document).ready(function() {
	var wd_width = $(window).width();
	// Bộ lọc
	if($('.filter-label') && $('.filter-checkbox')) {
		$('.filter-label').click(function() {
			$(this).parent().find('.filter-checkbox').trigger('click');
		});
	}
	
	//Thay đổi ảnh chi tiết sản phẩm
	if(wd_width > 960 && $('.prd-gallerys .small-image .image')) {
		$('.prd-gallerys .small-image .image').click(function(event) {
	    	var img_src = $(this).attr('data-image');
	    	$('.prd-gallerys .big-image').find('img').attr({
	    		src : img_src,
	    		'data-zoom-image' : img_src
	    	});
	    	$('.prd-gallerys .small-image li').removeClass('active');
	    	$(this).parents('li').addClass('active');
	    	event.preventDefault();
	    });
	}

	//Tăng, giảm số lượng sản phẩm đặt mua
	if($('.augment')) {
		$('.augment').click(function() {
			var $_input = $(this).parent().find('#quantity');
			var quantity = parseInt($_input.val());
			if(quantity <= 1){
				quantity = 1;
			}else {
				quantity -= 1;
			}
			$_input.val(quantity);
		});
	}
	if($('.abatement')) {
		$('.abatement').click(function() {
			var $_input = $(this).parent().find('#quantity');
			var quantity = parseInt($_input.val());
			quantity += 1;
			$_input.val(quantity);
		});
	}

	//Product tab
	if($('.tabs-anchor')) {
		$('.tabs-anchor li a').click(function() {
			var tab_id = $(this).attr('href');
			$('html,body').animate({scrollTop: $(tab_id).offset().top - 50},500)
		});
	}

	//Sắp xếp sản phẩm mobile
	if(wd_width < 960 && $('.order-list')) {
		$('.order-list>li>a').click(function(e) {
			$(this).parents('.order-list').find('li').removeClass('active')
			$(this).parent().addClass('active');
		})
	}

	//Lọc theo giá mobile
	if(wd_width < 960 && $('.list-price')) {
		$('.list-price>li>a').click(function(e) {
			$(this).parents('.list-price').find('li').removeClass('active')
			$(this).parent().addClass('active');
		})
	}

	//Hiển thị bộ lọc trên mobile
    if(wd_width < 960 && $('.btn-mobile-fliter')) {
    	$('.btn-mobile-fliter').click(function(event) {
    		var filer_section = $(this).attr('data-mobile-box');
    		$(filer_section).addClass('active');
    		$(this).parents('.mobile-filter-bar').hide();
    		$('html, body').animate({'scrollTop' : 0}, 100);
    		event.preventDefault();
    	});

    	$('.mobile-filer-section .heading').click(function () {
    		$(this).parents('.mobile-filer-section').removeClass('active');
    	});

    	$(window).scroll(function() {
    		if($(this).scrollTop() > 50) {
    			$('.mobile-filter-bar').show();
    		}else {
    			$('.mobile-filter-bar').hide();
    		}
    	});
    }
});

$(document).ready(function() {
	$('.cart-panel .input-check-label').click(function() {
		$(this).parents('.check-box').find('.input-check').trigger('click');
	});
});

$(window).scroll(function() {
	if($(this).scrollTop() > 50){
		$('.pc-header').addClass('fix');
	}else{
		$('.pc-header').removeClass('fix');
		
	}
});
