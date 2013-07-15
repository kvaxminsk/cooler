function addToCart( sku ){	
	var input_count = $('#qty');
	var qty = input_count.val();
	if( qty !== undefined ){
		qty = parseInt( qty );		
		qty = isNaN( qty ) ? undefined : qty;
	}
	
	if( qty == undefined ){
		form_data = 'sku='+sku;
	} else {
		form_data = 'sku='+sku+'&qty='+qty;
	} 

	$.ajax({
		url : '/cart/set',
		type: 'POST',
		dataType: 'json',
		data: form_data,
		beforeSend: function(){
			preLoader();
		},		
		success: function(response){
			var tt= window.setTimeout(function(){
			if ( response.count == undefined ){
				showMessage('Ошибка выполнения запроса', 'error');				
			} else {
				if( response.count !== 0 ){
					$('span#cart_size').text('('+response.count+')');
				}
				showMessage('Товар добавлен в корзину', 'success');
			}
			}, 1200)
		},
		error: function(){				
			showMessage('Ошибка выполнения запроса', 'error');
		}
	});
}

function addToCartMany( sku1, sku2, sku3 ){	
		form_data = 'sku1='+sku1+'&sku2='+sku2+'&sku3='+sku3;

	$.ajax({
		url : '/cart/setmany',
		type: 'POST',
		dataType: 'json',
		data: form_data,
		beforeSend: function(){
			preLoader();
		},		
		success: function(response){
			if ( response.count == undefined ){
				showMessage('Ошибка выполнения запроса', 'error');				
			} else {
				if( response.count !== 0 ){
					$('span#cart_size').text('('+response.count+')');
				}
				showMessage('Товар добавлен в корзину', 'success');
			}
		},
		error: function(){				
			showMessage('Ошибка выполнения запроса', 'error');
		}
	});
}

function preLoader() {
	var progress_box = $('#progress');
	var message_box = $('#progress .progress-msg');	
	
	message_box.removeClass('error_box');	
	progress_box.show();
	
	var img = '<img src="/images/frontend/ajax-loader.gif"/>';
	message_box.html(img)
			   .css('left', $(window).width()/2 - message_box.width()/2)
			   .css('top', $(window).height()/2 - message_box.height()/2);
}



function showMessage( message, status ){
	var message_box = $('#progress .progress-msg');
	message_box.removeClass('error_box');
	message_box.html( message );
	if( status == 'error' ){
		message_box.addClass('error_box');
		setTimeout( "$('#progress').hide()",2000 );				
	} else {		
		setTimeout( "$('#progress').hide()",1000 );
	}
}

function setLocation( url ){
	location.href = url;
}
