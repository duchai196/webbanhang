@extends('frontend.master')
@section('content')
	<section id="advertisement">
		<div class="container">
			<img src="{{asset('/')}}images/shop/advertisement.jpg" alt="" />
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">
				@include('frontend.elements.sidebar')

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm</h2>
						@if(count($listProducts))
							@foreach($listProducts as $product)
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{!! $product->image !!}" alt=""  width="230" height="255"/>
												@if($product->sale_price)
													<h2 class="old-price">{!! number_format($product->price) !!} đ</h2>
													<h2  class="sale-price">{!! number_format($product->sale_price) !!} đ</h2>
												@else
													<h2 class="price">{!! number_format($product->price) !!} đ</h2>
												@endif
												<p><a href="{!! route('getProduct',$product->slug)!!}">{!! $product->name !!} </a></p>
												<form action="{{route('postAddToCart')}}" method="POST">
													{!! csrf_field() !!}
													<input type="hidden" name="id" value="{!! $product->id !!}">
													<button type="submit" class="btn btn-fefault cart">
														<i class="fa fa-shopping-cart"></i>
														Thêm vào giỏ
													</button>
												</form>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													@if($product->sale_price)
														<h2 class="old-price">{!! number_format($product->price) !!} đ</h2>
														<h2  class="sale-price">{!! number_format($product->sale_price) !!} đ</h2>
													@else
														<h2 class="price">{!! number_format($product->price) !!} đ</h2>
													@endif
														<p><a href="{!! route('getProduct',$product->slug)!!}">{!! $product->name !!} </a></p>
														<form action="{{route('postAddToCart')}}" method="POST">
															{!! csrf_field() !!}
															<input type="hidden" name="id" value="{!! $product->id !!}">
															<button type="submit" class="btn btn-fefault cart">
																<i class="fa fa-shopping-cart"></i>
																Thêm vào giỏ
															</button>
														</form>
												</div>
											</div>
											@if($product->sale_price)
												<img src="images/home/sale.png" class="new" alt="" />
											@endif
										</div>

									</div>
								</div>
							@endforeach
							{!! $listProducts->render() !!}
						@else
							<p> Chưa có sản phẩm nào!</p>
						@endif

					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
@stop