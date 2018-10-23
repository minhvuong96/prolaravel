$(document).ready(function(){
        $('#dataTables-example').DataTable({
                responsive: true
        });
        $('div.alert').delay(3000).slideUp();
});
$(document).ready(function(){

	$('#add_images').click(function () {

		$('#insert').append('<div class="form-group"><input type="file" name="fEditDetail[]"></div>');
	});
});
$(document).ready(function(){
	$('#del_img_demo').click(function(){
		var url = 'http://localhost/pro_laravel/admin/product/delimg/';
		var _token = $('form[name="formEditProduct"]').find('input[name="_token"]');
		var idHinh = $(this).parent().find('img').attr('idHinh');
		var img = $(this).parent().find('img').attr('src');
		var rid = $(this).parent().find('img').attr('id');
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			cache:false,
			success:function(data){
				if(data=="Oke"){
					$("#"+rid).remove();
				}else{
					alert('Error!');
				}
			}
		});

	});
});