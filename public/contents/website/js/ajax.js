$(function () {
	

	$('#addCart').submit(function(e) {
		e.preventDefault();

		var formdata = new FormData(this);
		// console.log(formdata);

		var datatype = $(this).data('type');

		$.ajax({
			url: this.action,
			type: this.method,
			data: formdata,
			dataType: 'JSON',
			processData: false,
			contentType: false,
			success(data) {
				swal({
                  title: 'Successful',
                  text: data.success,
                  type: 'success',
                  timer: 3000
                });

               return cartItems();
			}
		});

	});

	function cartItems() {
		var url = window.origin + '/cartitems';
		// console.log(url);
		$.ajax({
			url: url,
			type: "GET",
			dataType: 'HTML',
			success(data) {
				$('#cartItems').html(data);
			}
		});
	}
	function cartPage() {
		var url = window.origin + '/cartpage';
		// console.log(url);
		$.ajax({
			url: url,
			type: "GET",
			dataType: 'HTML',
			success(data) {

				$('tbody').html(data);
			}
		});
	}

	$(document).on('click','.increase', function(){
		var rowid = $(this).data('rowid');
		var qty = $(this).prev().val();
		var url = window.origin + '/cart/update';

		$.ajax({
			url: url,
			type: "get",
			data: {qty: qty, rowid: rowid},
			dataType: 'JSON',
			beforeSend(){
				$('.loading').css('display', 'block');
			},
			success(data) {
                return cartItems() + cartPage();
			},
			complete(){
				$('.loading').css('display', 'none');
			}
		});

	});

	$(document).on('click','.reduced', function(){
		var rowid = $(this).data('rowid');
		var qty = $(this).prev().prev().val();
		var url = window.origin + '/cart/update';

		$.ajax({
			url: url,
			type: "get",
			data: {qty: qty, rowid: rowid},
			dataType: 'JSON',
			beforeSend(){
				$('.loading').css('display', 'block');
			},
			success(data) {
                return cartItems() + cartPage();
			},
			complete(){
				$('.loading').css('display', 'none');
			}
		});

	});

	$(document).on('click','.btn-remove', function(e){
		e.preventDefault();
		var url = $(this).attr('href');

		$.ajax({
			url: url,
			type: "get",
			dataType: 'JSON',
			beforeSend(){
				$('.loading').css('display', 'block');
			},
			success(data) {
                return cartItems() + cartPage();
			},
			complete(){
				$('.loading').css('display', 'none');
			}
		});

	});

})