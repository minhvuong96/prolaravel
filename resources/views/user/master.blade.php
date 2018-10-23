<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Shopin A Ecommerce Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<link href="{!! url('public/user/css/bootstrap.css')!!}" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<!--theme-style-->
<link href="{!! url('public/user/css/style.css')!!}" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--theme-style-->
<link href="{!! url('public/user/css/style4.css" rel="stylesheet')!!}" type="text/css" media="all" />	
<!--//theme-style-->
<script src="{!! url('public/user/js/jquery.min.js')!!}"></script>
<!--- start-rate---->
<script src="{!! url('public/user/js/jstarbox.js')!!}"></script>
	<link rel="stylesheet" href="{!! url('public/user/css/jstarbox.css')!!}" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate---->

</head>
<body>
<!--header-->
@include('user.blocks.header')
<!--banner-->
@yield('banner')
	<!--content-->
		<div class="content">
			<div class="container">
				@yield('content')
			<!--//products-->
			<!--brand-->
			@include('user.blocks.brand')
			<!--//brand-->
			</div>
			
		</div>
	<!--//content-->
	<!--//footer-->
	@include('user.blocks.footer')
	<!--//footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{!! url('public/user/js/simpleCart.min.js')!!}"> </script>
<!-- slide -->
<script src="{!! url('public/user/js/bootstrap.min.js')!!}"></script>
<!--light-box-files -->
		<script src="{!! url('public/user/js/jquery.chocolat.js')!!}"></script>
		<link rel="stylesheet" href="{!! url('public/user/css/chocolat.css')!!}" type="text/css" media="screen" charset="utf-8">
		<!--light-box-files -->
		<script type="text/javascript" charset="utf-8">
		$(function() {
			$('a.picture').Chocolat();
		});
		</script>
<script src="{!! url('public/user/js/myscript.js')!!}"></script>

</body>
</html>