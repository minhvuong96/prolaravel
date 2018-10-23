@extends('user.master')
@section('banner')
<style>
	.btn-circle{
		border-radius: 50%;
		position: relative;
		
	}
</style>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Checkout</h1>
		<em></em>
		<h2><a href="index.html">Home</a><label>/</label>Checkout</h2>
	</div>
</div>
@endsection
@section('content')
<!--login-->
	<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cart-header1').fadeOut('slow', function(c){
							$('.cart-header1').remove();
						});
						});	  
					});
			   </script>
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cart-header2').fadeOut('slow', function(c){
							$('.cart-header2').remove();
						});
						});	  
					});
			   </script>
<div class="check-out">
<div class="container">
	
	<div class="bs-example4" data-example-id="simple-responsive-table">
    <div class="table-responsive">
    	    <table class="table-heading simpleCart_shelfItem">
		  <tr>
			<th class="table-grid">Item</th>
					
			<th>Prices</th>
			<th >Qty</th>
			<th>Subtotal</th>
		  </tr>
		  <form action="" method="post">
		  	<input type="hidden" name="_token" value="{!!csrf_token()!!}">
		  @foreach($content as $item)
		  <tr class="cart-header">

			<td class="ring-in"><a href="{!!url('chi-tiet-san-pham',[$item->id,$item->alias])!!}" class="at-in"><img src="{!!asset('public/user/images/'.$item->options->img)!!}" class="img-responsive" alt=""></a>
			<div class="sed">
				<h5><a href="{!!url('chi-tiet-san-pham',[$item->id,$item->alias])!!}">{!!$item->name!!}</a></h5>
				<p>(At vero eos et accusamus et iusto odio dignissimos ducimus ) </p>
			
			</div>
			<div class="clearfix"> </div>
			
			</td>
			<td>{!!number_format($item->price,0,',','.')!!} VNĐ</td>
			<td><input type="text" size="1" name="quantity[]" class="soluong" value="{!!$item->qty!!}">
			<a href="" id="{!!$item->rowId!!}" class="btn btn-success btn-circle updatecart">Sửa</a>
			<a href="{!!url('xoa-san-pham',['id'=>$item->rowId])!!}" class="btn btn-danger btn-circle">x</a>
			</td>
			<td class="item_price">{!!number_format($item->price*$item->qty,0,',','.')!!} VNĐ</td>
		  </tr>
		  @endforeach
		  </form>
		  <div class="container">
		  	<div class="alert alert-info float-right">{!!($total)!!} VNĐ</div>
		  </div>
	</table>
	</div>
	</div>
	<div class="produced">
	<a href="single.html" class="hvr-skew-backward">Produced To Buy</a>
	 </div>
</div>
</div>

<!--//login-->
<!--brand-->
			<!--//brand-->
	<!--//content-->
	<!--//footer-->
		<!--//footer-->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	<script src="{!!asset('public/user/js/simpleCart.min.js')!!}"> </script>
<!-- slide -->
<script src="{!!asset('public/user/js/bootstrap.min.js')!!}"></script>
@endsection