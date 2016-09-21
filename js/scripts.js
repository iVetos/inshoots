$(function(){
    // PayPal
    window.paypalCheckoutReady = function () {
        paypal.checkout.setup('ichbinerste@gmail.com', {
            container: 'PayPal', //{String|HTMLElement|Array} where you want the PayPal button to reside
            environment: 'production' //or 'production' depending on your environment
        });
    };

	$('#photo-zoom').fancybox({
		padding: 0,
		openEffect	: 'elastic',
		closeEffect	: 'elastic',

		helpers : {
			title : null,
			overlay : {
				css : {
					'background' : 'rgba(0, 0, 0, 0.95)'
				}
			}
		}
	});


	// Image effect
    var slideImg = 0;
    $('#photo-img').click(function(){
        var img = $(this);
        if(slideImg == 0){
            img.animate({
                height: '390px'
            }, 1000, function() {
				$('#product-return, #product-actions, #product-number').hide();
				$('#product-buy, #product-price').show();
            });
            slideImg = 1;
        }
        else {
			$('#product-buy, #product-price').hide();
			$('#product-return, #product-actions, #product-number').fadeIn(500, function(){
                img.animate({
                    height: '100%'
                }, 1000, function() {

                });
            });
            slideImg = 0;
        }
    });

	$('#product-actions').click(function(){
		var img = $('#photo-img');
		if(slideImg == 0){
			img.animate({
				height: '390px'
			}, 1000, function() {
				$('#product-return, #product-actions, #product-number').hide();
				$('#product-buy, #product-price').show();
			});
			slideImg = 1;
		}
	});

	$('#product-actions-horizontal').click(function(){
		var img = $('#photo-img-vertical');
		if(slideImg == 0){
			img.animate({
				width: '488px'
			}, 1000, function() {
				$('#horizontal-img-div').removeClass('col-lg-12 col-md-12 col-sm-12').addClass('col-lg-6 col-md-6 col-sm-6 text-center');
				$('#horizontal-img-buttons').hide();
				$('#horizontal-img-empty, #horizontal-img-info, #product-buy, #product-price').show();
				/*
				 $('#product-return, #product-actions, #product-number').hide();
				 $('#product-buy, #product-price').show();*/
			});
			slideImg = 1;
		}
	});
    
    $('.main-portfolio-link').hover(function(){
        $('.main-portfolio-link').children('span').hide()
        $(this).children('span').fadeIn(500);
    });

	/* *********************** */
	$('#photo-img-vertical').click(function(){
		var img = $(this);
		if(slideImg == 0){
			img.animate({
				width: '488px'
			}, 1000, function() {
				$('#horizontal-img-div').removeClass('col-lg-12 col-md-12 col-sm-12').addClass('col-lg-6 col-md-6 col-sm-6 text-center');
				$('#horizontal-img-buttons').hide();
				$('#horizontal-img-empty, #horizontal-img-info, #product-buy, #product-price').show();
				/*
				$('#product-return, #product-actions, #product-number').hide();
				$('#product-buy, #product-price').show();*/
			});
			slideImg = 1;
		}
		else {
			$('#horizontal-img-empty, #horizontal-img-info').hide();
			$('#horizontal-img-div').removeClass('col-lg-6 col-md-6 col-sm-6 text-center').addClass(function(index) {
				img.animate({
					width: '975px'
				}, 1000, function() {
					$('#horizontal-img-buttons').show();
				});
				slideImg = 0;

				return 'col-lg-12 col-md-12 col-sm-12';
			});
		}
	});
	/* *********************** */

    $('#product_buy').click(function(){
        var img = $('#product_image');
        if(slideImg == 0){
            img.animate({
                width: '22%'
            }, 1000, function() {
                $('#product_image').css({'margin-bottom': '50px'})
                $('#product_actions2').slideDown(500);
                $('#product_actions').slideUp(500);
            });
            slideImg = 1;
        }
        else {
            $('#product_image').css({'margin-bottom': '0px'})
            $('#product_actions2').slideUp(500);
            $('#product_actions').slideDown(500, function(){
                img.animate({
                    width: '88%'
                }, 1000, function() {
                    
                });
            });
            slideImg = 0;
        }
    });

	$('#arrow_down').click(function(){
		var img = $('#product_image');
		if(slideImg == 0){
			img.animate({
				width: '22%'
			}, 1000, function() {
				$('#product_image').css({'margin-bottom': '50px'})
				$('#product_actions2').slideDown(500);
				$('#product_actions').slideUp(500);
			});
			slideImg = 1;
		}
		else {
			$('#product_image').css({'margin-bottom': '0px'})
			$('#product_actions2').slideUp(500);
			$('#product_actions').slideDown(500, function(){
				img.animate({
					width: '88%'
				}, 1000, function() {

				});
			});
			slideImg = 0;
		}
	});
    
    $('nav ul > li').bind('mouseover', openSubMenu);
    $('nav ul > li').bind('mouseout', closeSubMenu);
    
    function openSubMenu() {
    	$(this).find('ul').css('visibility', 'visible');	
    };
    
    function closeSubMenu() {
    	$(this).find('ul').css('visibility', 'hidden');	
    };
    
    // add_to_cart
	$("#product_buy3").click(function() {
        //$(this).attr('class', 'buy2');
        
        // обновление значений в корзине
        var price = $('#price').html();
        var count = $('#top_cart_count').html();
        var summ  = $('#top_cart_summ').html();
        
        count = parseInt(count) + 1;
        price = parseFloat(price, 2);
        summ = parseFloat(summ)
        summ = summ + price;
        summ = summ.toFixed(2);
        
        $('#top_cart_count').html(numEnd(count));
        $('#top_cart_summ').html(summ);
        /*
        var idProduct = $(this).children("a").attr('rel');
        $(this).parent().html('<div class="buy2"><a rel="' + idProduct + '">Уже в корзине</a></div>');
        */
		// получение списка товаров в корзине
		$.ajax({
			url: '../ajax_files/cart.php?rel=' + $('#product_id').text() + '&type=1',
			dataType: "html",
			async: false,
			processData: true,
			error:function(xhr, status, errorThrown){
				alert(errorThrown+'\n'+status+'\n'+xhr.statusText);
			},
			success:function(x){
                // Открыть окно после добавление в корзину
				$("#modal_form").html(x).dialog("open");
			}
		});
	});
    
    // add_to_cart framed
	$(".product_buy5").click(function() {
        //$(this).attr('class', 'buy2');
        
        // обновление значений в корзине
        var price = $(this).children('.product_price').text();
        var id_product = $(this).children('.product_id').text();
        var id_parent = $(this).children('.parent_id').text();
        var count = $('#top_cart_count').html();
        var summ  = $('#top_cart_summ').html();
        
        count = parseInt(count) + 1;
        price = parseFloat(price, 2);
        summ = parseFloat(summ)
        summ = summ + price;
        summ = summ.toFixed(2);
        
        $('#top_cart_count').html(numEnd(count));
        $('#top_cart_summ').html(summ);
        /*
        var idProduct = $(this).children("a").attr('rel');
        $(this).parent().html('<div class="buy2"><a rel="' + idProduct + '">Уже в корзине</a></div>');
        */
		// получение списка товаров в корзине
		$.ajax({
			url: '../ajax_files/cart.php?rel=' + id_product + '&type=2&parent=' + id_parent,
			dataType: "html",
			async: false,
			processData: true,
			error:function(xhr, status, errorThrown){
				alert(errorThrown+'\n'+status+'\n'+xhr.statusText);
			},
			success:function(x){
                // Открыть окно после добавление в корзину
				$("#modal_form").html(x).dialog("open");
			}
		});
	});
    
    // товар уже в корзине
    $(".buy2").click(function(){
        
		// получение списка товаров в корзине
		$.ajax({
            /*
			url: '../ajax_files/cart.php?rel=' + $(this).children("a").attr('rel'),
			dataType: "html",
			async: false,
			processData: true,
			error:function(xhr, status, errorThrown){
				alert(errorThrown+'\n'+status+'\n'+xhr.statusText);
			},
			success:function(x){
				$("#modal_form").html(x).dialog("open");
			}
            */
            url: '../ajax_files/cart.php',
			dataType: "html",
			async: false,
			processData: true,
			error:function(xhr, status, errorThrown) {
				alert(errorThrown+'\n'+status+'\n'+xhr.statusText);
			},
			success:function(x) {
				$("#modal_form").html(x).dialog("open");
			}
		});
	});
	
	$(".open").click(function() {
		// получение списка товаров в корзине
		$.ajax({
			url: '../ajax_files/cart.php',
			dataType: "html",
			async: false,
			processData: true,
			error:function(xhr, status, errorThrown) {
				alert(errorThrown+'\n'+status+'\n'+xhr.statusText);
			},
			success:function(x) {
				$("#modal_form").html(x).dialog("open");
			}
		});
	});
    
    $('.close_diag').click(function(){
        $("#modal_form").dialog('close');
    });
    
    // Overlay close
    $('body').on('click','.ui-widget-overlay', function() {
        $('.ui-dialog').filter(function () {
            return $(this).css("display") === "block";
        }).find('.ui-dialog-content').dialog('close');
    });
    
    /* End Cart */

	// Send form
	$('#lets_talk_send').click(function(){
		var error_name = false;
		var error_email = false;

		// Name
		var name_tag = $('#name');
		if (name_tag.val().length > 0){
			name_tag.css('border', '1px solid #5bb100');
			error_name = false;
		}
		else {
			name_tag.css('border', '1px solid #ff6161');
			error_name = true;
		}

		// Email
		var email_tag = $('#email');
		if (email_tag.val().length > 0){
			email_tag.css('border', '1px solid #5bb100');
			error_email = false;
		}
		else {
			email_tag.css('border', '1px solid #ff6161');
			error_email = true;
		}

		// If all ok
		if(!error_name && !error_email){
			var name = name_tag.val();
			var email = email_tag.val();
			var message = $('#message').val();
			$.ajax({
				url: '../ajax_files/send_form.php',
				dataType: "html",
				data: {
					name: name,
					email: email,
					message: message
				},
				type: "POST",
				success:function(){
					$('form').slideUp();
					$('#form_sent').slideDown().animate({
						opacity: 0
					}, 0, function(){
						$('#form_sent').text('Your message has been sent.').css('margin-bottom', '50px').animate({
							opacity: 1
						}, 1500, function(){
							//$('.header_form').fadeOut(500);
						});
					});
				}
			});
		}
	});

    // Slider
	var slider = new MasterSlider();

	slider.control('arrows' ,{insertTo:'#masterslider'});
	slider.control('bullets');

	slider.setup('masterslider' , {
		width:1024,
		height:768,
		space:5,
		autoplay:true,
		keyboard:true,
		loop:true,
		view:'parallaxMask',
		layout:'fullscreen',
		fullscreenMargin:0,
		speed:20
	});
});

function numEnd (num) {
    var text = new Array('product','products','products');
    var cases = new Array (2, 0, 1, 1, 1, 2);
    return num + ' ' + text[ (num % 100 > 4 && num % 100 < 20) ? 2 : cases[Math.min(num % 10, 5)] ];
}