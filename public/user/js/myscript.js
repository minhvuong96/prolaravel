$(document).ready(function() {
	$('.updatecart').click(function() {
		var rowId = $(this).attr('id');
		var qty = $(this).parent().find(".soluong").val();
		var _token = $("input[name='_token']").val();
		$.ajax({
			url: 'cap-nhap/'+rowId+'/'+qty,
			type: 'POST',
			cache:false,
			data: {'_token':_token,'id':rowId,'qty':qty},
			success: function(data){
			}
		});
	});
});