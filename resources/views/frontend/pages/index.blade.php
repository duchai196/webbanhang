

@extends('frontend.master')
@section('content')
	<section id="slider"><!--slider-->

		<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
			<!-- Overlay -->
			<div class="overlay"></div>
			<!-- Indicators -->

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
                <?php $i=1;?>
				@foreach($listSlides as $sl)
					<div @if($i==1) class="item  slides active" @else class="item slides" @endif>
						<div class="slide-{{$i}}" style="background-image: url({!! $sl->image !!}")></div>
						<div class="hero">
							<h1>{!! $sl->title !!}</h1>
							<h3>{!! $sl->sub_title !!}</h3>
							<button class="btn btn-hero btn-lg" role="button"><a href="{!! $sl->link !!}" style="color: #fff;">{!! $sl->title_link !!}</a></button>
						</div>
					</div>
                    <?php $i++;?>
				@endforeach

			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				@include('frontend.elements.sidebar')

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm nổi bật</h2>
						@foreach($featuredProducts as $product)
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{!! $product->image !!}" alt=""  width="255" height="240"/>
											@if($product->sale_price)
												<h2 class="old-price">{!! number_format($product->price) !!} đ</h2>
												<h2  class="sale-price">{!! number_format($product->sale_price) !!} đ</h2>
											@else
												<h2 class="price">{!! number_format($product->price) !!} đ</h2>
											@endif
											<p><a href="{!! route('getProduct',$product->slug)!!}">{!! $product->name !!} </a></p>
											<a href="{!! route('addToCart',$product->id) !!}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
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
												<a href="{!! route('addToCart',$product->id) !!}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
											</div>
										</div>
										@if($product->sale_price)
											<img src="images/home/sale.png" class="new" alt="" />
										@endif
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
											<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
										</ul>
									</div>
								</div>
							</div>

						@endforeach
					</div><!--features_items-->
					{{--cầu lông--}}
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li ><a href="javascript:void(0)" class="text-white" >Cầu lông</a></li>
                                <?php $childCauLong=DB::table('categories')->where('parent_id',11)->get();?>
								@foreach($childCauLong as $key=>$cate)
									@if($cate->parent_id==11)
										<li
												@if($key==0)
												class="active"
												@endif><a href="#{{$cate->id}}" data-toggle="tab">{{$cate->name}}</a>
										</li>
									@endif
								@endforeach
							</ul>
						</div>
						<div class="tab-content">
							@foreach($childCauLong as $key=>$cate)
								@if($cate->parent_id==11)
									<div class="tab-pane fade
										@if($key==0 )
											active
										@endif
											in" id="{!!$cate->id !!}" >
                                        <?php $sanPham=DB::table('products')->where('category_id',$cate->id)->orderBy('created_at','desc')->take(4)->get(); ?>
										@foreach($sanPham as $key=>$product)

											<div class="col-sm-3">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<img src="{!! $product->image !!}" alt=""  width="255" height="217"/>
															@if($product->sale_price)
																<h2 class="old-price">{!! number_format($product->price) !!} đ</h2>
																<h2  class="sale-price">{!! number_format($product->sale_price) !!} đ</h2>
															@else
																<h2 class="price">{!! number_format($product->price) !!} đ</h2>
															@endif
															<p><a href="{!! route('getProduct',$product->slug)!!}">{!! $product->name !!} </a></p>
															<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
														</div>

													</div>
												</div>
											</div>
										@endforeach
									</div>
								@endif
							@endforeach
						</div>
					</div><!--/category-tab-->
					{{--bóng đá--}}
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li ><a href="javascript:void(0)" class="text-white" >Bóng đá</a></li>
                                <?php $childBongDa=DB::table('categories')->where('parent_id',12)->get();?>
								@foreach($childBongDa as $key=>$cate)
									@if($cate->parent_id==12)
										<li
												@if($key==0)
												class="active"
												@endif><a href="#{{$cate->id}}" data-toggle="tab">{{$cate->name}}</a>
										</li>
									@endif
								@endforeach
							</ul>
						</div>
						<div class="tab-content">
							@foreach($childBongDa as $key=>$cate)
								@if($cate->parent_id==12)
									<div class="tab-pane fade
										@if($key==0 )
											active
										@endif
											in" id="{!!$cate->id !!}" >
                                        <?php $sanPhamBD=DB::table('products')->where('category_id',$cate->id)->orderBy('created_at','desc')->take(4)->get(); ?>
										@foreach($sanPhamBD as $key=>$item)

											<div class="col-sm-3">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<img src="{!! $item->image !!}" alt="" />
															<h2>{!! $item->price !!}</h2>
															<p><a href="{!! route('getProduct',$item->slug)!!}">{!! $product->name !!} </a></p>
															<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
														</div>

													</div>
												</div>
											</div>
										@endforeach
									</div>
								@endif
							@endforeach
						</div>
					</div><!--/category-tab-->

					{{--end bóng đá--}}
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
							<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>
@stop