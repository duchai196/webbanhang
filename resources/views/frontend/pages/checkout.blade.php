@extends('frontend.master')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="{!! route('home') !!}">Trang chủ</a></li>
					<li class="active">Thanh toán</li>
				</ol>
			</div><!--/breadcrums-->

			@if(Session::has('message'))
				<div class="alert alert-success">{{Session::get('message')}}</div>
				@endif

			<div class="step-one">
				<h2 class="heading">Quý khách vui lòng nhập thông tin để tiến hành thanh toán</h2>
			</div>
			<div class="shopper-informations">
				<div class="row">

					<div class="col-sm-6 clearfix">
						<div class="bill-to">
							<p>Thông tin</p>
							<div class="form-one">
								@if(count($errors) >0)
									<ul>
										@foreach($errors->all() as $error)
											<li class="text-danger">{{ $error }}</li>
										@endforeach
									</ul>
								@endif
								<form action="{!! route('postCheckout') !!}" method="POST">
									{!! csrf_field() !!}
									<input type="text" placeholder="Họ tên" name="name" value="{{ old('name') }}" >
									<input type="text" placeholder="Email*" name="email" value="{{ old('email') }}">
									<input type="number" placeholder="Số điện thoại*" name="phone" value="{{ old('phone') }}">
									<input type="text" placeholder="Địa chỉ *" name="address" value="{{ old('address') }}">
								 <label for="createAccount"> <input type="checkbox" id="createAccount" name="createAccount"> Tạo tài khoản mới? 	</label>
									<input type="password" placeholder="Mật khẩu *" name="password"  class="password" style="display: none;" autocomplete="off">

							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="order-message">
							<p>Ghi chú đơn hàng</p>
							<textarea name="note"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"> {{ old('address') }}</textarea>
						</div>
						<a class="btn btn-primary" href="{!! URL::previous() !!}">Quay lại</a>
						<button class="btn btn-primary pull-right"  type="submit">Thanh toán</button>
						</form>
					</div>
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
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


			<div style="height: 40px;"></div>
		</div>
	</section> <!--/#cart_items-->

@stop
@section('script')
	<script>
		$(document).ready(function () {
			$('#createAccount').change(function () {
                if($(this).is(":checked")) {
                    $('.password').css('display', 'block');
                }
                else {
                    $('.password').css('display', 'none');
				}
            })
        });
	</script>
	@stop