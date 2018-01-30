<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{!! route('home') !!}"><img src="images/logo.png" alt=""  /></a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								@if(Auth::check())
								<li><a href="#"><i class="fa fa-user"></i> Xin chào {!! Auth::user()->name !!}</a></li>
								@endif
								<li><a href="{!! route('getCheckout') !!}"><i class="fa fa-money" aria-hidden="true"></i> Thanh toán</a></li>
								<li class="cart-menu"><a href="{!! route('cart') !!}"><i class="fa fa-shopping-cart"></i> Cart</a>
									<div class="cart-info" id="cart">
										@if(count($cart))
										<ul>
											@foreach($cart as $item)
											<li>
												<div class="cart-img">
													<img src="{!! $item->options['images'] !!}" alt="" width="70" height="70">
												</div>
												<div class="cart-details">
													<a href="#">{!! $item->name !!}</a>
													<p>{!! $item->qty !!} x {!! number_format($item->price) !!} VND</p>
												</div>
											</li>
											@endforeach
										</ul>
										<h3>Tổng tiền: <span> {!! Cart::total() !!}</span></h3>
										<a href="checkout.html" class="checkout">Thanh toán</a>
											@else
											<h3>Chưa có sản phẩm nào trong giỏ hàng!</h3>
										@endif
									</div>
								</li>
								@if(Auth::check())
									<li><a href="{{ route('logout')}}"> <i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
								@else
									<li><a href="{{URL('/login')}}"> <i class="fa fa-lock"></i> Đăng nhập</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{!! url('/') !!}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="{!! url('/san-pham') !!}" >Sản phẩm<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										@foreach($listCategory as $category)
											<li><a href="{{route('getCategory',$category->id)}}">{!! $category->name !!}</a></li>
										@endforeach
									</ul>
								</li>
								<li><a href="{!! url('/tin-tuc') !!}" >Tin tức</a></li>
								<li><a href="{!! url('/lien-he') !!}" >Liên hệ</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->