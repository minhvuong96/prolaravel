@extends('user.master')
<!--banner-->
@section('banner')
<div class="banner-top">
	<div class="container">
		<h1>Products</h1>
		<em></em>
		<h2><a href="{!!URL::to('/')!!}">Home</a><label>/</label>Products</h2>
	</div>
</div>
@endsection
@section('content')
<div class="product">
			<div class="container">
			<div class="col-md-9">
				<div class="mid-popular">
					@foreach($product as $item)
					<div class="col-md-4 item-grid1 simpleCart_shelfItem">
					<div class=" mid-pop">
					<div class="pro-img">
						<img style="height: 252px; width: 203px;" src="{!!asset('public/user/images/'.$item->image)!!}" class="img-responsive" alt="">
						<div class="zoom-icon ">
						<a class="picture" href="{!!asset('public/user/images/pc.jpg')!!}" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
						<a href="{!!url('chi-tiet-san-pham',[$item->id,$item->alias])!!}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
						</div>
						</div>
						<div class="mid-1">
						<div class="women">
						<div class="women-top">
							<h6><a href="{!!url('chi-tiet-san-pham',[$item->id,$item->alias])!!}">{!!$item->name!!}</a></h6>
							</div>
							<div class="img item_add">
								<a href="#"><img src="{!!asset('public/user/images/ca.png')!!}" alt=""></a>
							</div>
							<div class="clearfix"></div>
							</div>
							<div class="mid-2">
								<p ><label></label><em class="item_price">{!! number_format($item->price,0,',','.') !!} VNĐ</em></p>
								  <div class="block">
									<div class="starbox small ghosting"> </div>
								</div>
								
								<div class="clearfix"></div>
							</div>
							
						</div>
					</div>
					</div>
					@endforeach

					<div class="clearfix"></div>
				</div>
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				  	@if($product->currentPage() !=1)
				    <li class="page-item"><a class="page-link" href="{!!str_replace('/?', '?', $product->url($product->currentPage()-1))!!}">Previous</a></li>
				    @endif
				    @for($i=1;$i<=$product->lastPage();$i++)
				    <li class="page-item"><a class="{!!$product->currentPage()==$i ? 'active' : ''!!}" href="{!!str_replace('/?', '?', $product->url($i))!!}">{!!$i!!}</a></li>
				    @endfor
				    @if($product->currentPage() != $product->lastPage())
				    <li class="page-item"><a class="page-link" href="{!!str_replace('/?', '?', $product->url($product->currentPage()+1))!!}">Next</a></li>
				     @endif
				  </ul>
				</nav>
			</div>

			<div class="col-md-3 product-bottom">
			<!--categories-->
				<div class=" rsidebar span_1_of_left">
						<h4 class="cate">Categories</h4>
							 <ul class="menu-drop">
							 	<?php
							 		$menu_level_1 = DB::table('cates')->where('parent_id',0)->get();
							 	?>
							 	@foreach($menu_level_1 as $menu1)
								<li class="item1"><a href="#">{!!$menu1->name!!} </a>
									<ul class="cute">
										<?php
											$menu_level_2 = DB::table('cates')->where('parent_id',$menu1->id)->get();
										?>
										@foreach($menu_level_2 as $menu2)
										<li class="subitem1"><a href="{!!URL::route('loaisanpham',[$menu2->id,$menu2->alias])!!}">{!!$menu2->name!!} </a></li>
										@endforeach
									</ul>
								</li>
								@endforeach
							</ul>
					</div>

				<!--initiate accordion-->
						<script type="text/javascript">
							$(function() {
							    var menu_ul = $('.menu-drop > li > ul'),
							           menu_a  = $('.menu-drop > li > a');
							    menu_ul.hide();
							    menu_a.click(function(e) {
							        e.preventDefault();
							        if(!$(this).hasClass('active')) {
							            menu_a.removeClass('active');
							            menu_ul.filter(':visible').slideUp('normal');
							            $(this).addClass('active').next().stop(true,true).slideDown('normal');
							        } else {
							            $(this).removeClass('active');
							            $(this).next().stop(true,true).slideUp('normal');
							        }
							    });
							
							});
						</script>
<!--//menu-->
 <section  class="sky-form">
					<h4 class="cate">Discounts</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Upto - 10% (20)</label>
						 </div>
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (5)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
						 </div>
					 </div>
				 </section> 				 				 
				 
					
					 <!---->
					 <section  class="sky-form">
						<h4 class="cate">Type</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Sofa Cum Beds (30)</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bags  (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Caps & Hats (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jackets & Coats   (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jeans  (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Shirts   (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sunglasses  (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Swimwear  (30)</label>
								</div>
							</div>
				   </section>
				   		<section  class="sky-form">
						<h4 class="cate">Brand</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Roadstar</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Levis</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Persol</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nike</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Edwin</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>New Balance</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Paul Smith</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Ray-Ban</label>
								</div>
							</div>
				   </section>		
		</div>
			<div class="clearfix"></div>
	</div>
@endsection
		