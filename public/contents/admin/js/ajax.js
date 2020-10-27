$(function(){

  $('#category').on('change', function(){
  	var id = $(this).val();
  	var url = window.origin + '/admin/subcategory/' + id;

  	// console.log(id);

  	$.ajax({
  		url: url,
  		type: 'GET',
  		dataType: 'HTML',
  		success: function(data) {
  			$('#subcategories').html(data);
  		}
  	});
  });

});