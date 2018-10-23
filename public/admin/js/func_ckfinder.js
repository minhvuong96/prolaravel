function ckeditor (name){
	var editor = CKEDITOR.replace(name,{
		uiColor : '#000',
		language:'vi',
		filebrowserImageBrowseUrl: baseURL+'/public/admin/js/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl: baseURL+'/public/admin/js/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl:      baseURL+'/public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl: baseURL+'/public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl: baseURL+'/public/admin/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	})
}