@extends('frontend.master')
@section('content')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="#">Trang chủ</a></li>
					<li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				@if(count($cart))
					<table class="table table-condensed">
						<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td class="">Hành động</td>
							<td></td>
						</tr>
						</thead>
						<tbody>
						@foreach($cart as $item)
							<tr>
								<td class="cart_product">
									<a href=""><img src="{!! $item->options['images'] !!}" alt="" width="100" height="100"></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{!! $item->name !!}</a></h4>
									{{--<p>Web ID: 1089772</p>--}}
								</td>
								<td class="cart_price">
									<p>{!! number_format($item->price) !!}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">

										<form action="{!! route('updateCart',$item->rowId) !!}" method="POST">
											{!! csrf_field() !!}
										<input class="cart_quantity_input" type="text" name="quantity" value="{!! $item->qty !!}" autocomplete="off" size="2">

									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">{{$item->qty*$item->price}}</p>
								</td>
								<td class="cart_delete">
									<button class="cart_quantity_delete" ><i class="fa fa-refresh" aria-hidden="true"></i></button>
									</form>
									<form action="{!! route('removeCart',$item->rowId) !!}" method="POST">
										{!! csrf_field() !!}
									<button type="submit" class="cart_quantity_delete"><i class="fa fa-times"></i></button>
									</form>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				@else
					<p>Bạn chưa có sản phẩm nào trong giỏ hàng!</p>
				@endif
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">

			<div class="row">

				<div class="col-md-6 pull-right">
					<div class="heading">
						<h3>TỔNG TIỀN</h3>

					</div>
					<div class="total_area">

						<ul>
							<li>Ship Hà Nội<span>Free</span></li>
							<li>Ship các tỉnh khác <span>{!! number_format(35000) !!} VND</span></li>
							<li>Total <span>{!! Cart::total() !!} VND</span></li>
						</ul>
						<a class="btn btn-warning update btn-lg" href="{!! url('/') !!}">Tiếp tục mua sắm</a>
						<a class="btn btn-success check_out pull-right btn-lg" href="">Tiến hành thanh toán</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


@stop