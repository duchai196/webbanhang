@extends('admin.master')
@section('breadcrumb')
Thêm thành viên
@stop
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-block">
				<h3 class="box-title m-b-0">Thêm thành viên mới</h3>
				{{-- <p class="text-muted m-b-30 font-13">V</p> --}}
				<div class="row">

					<div class="col-sm-12 col-xs-12">
						 @if(count($errors)>0)
                            @foreach($errors->all() as $err)
                                <div class="alert alert-danger">{{$err}}</div>
                            @endforeach
                        @endif
						<form action="{{route('user.store')}}" method="POST">
							{!!csrf_field()!!}
							<div class="form-group">
								<label for="name">User Name</label>
								<input type="text" class="form-control" id="name" placeholder="Nhập tên" name="name" value="{!! old('name') !!}">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập email" name="email" value="{!! old('email') !!}">
							</div>
							<div class="form-group">
								<label for="exampleInputPhone">Phone</label>
								<input type="number" class="form-control" id="exampleInputPhone" placeholder="Nhập số điện thoại" name="phone" value="{!! old('phone') !!}">
							</div>
							<div class="form-group">
								<label for="exampleInputPhone">Address</label>
								<input type="text" class="form-control" id="exampleInputPhone" placeholder="Nhập địa chỉ" name="address" value="{!! old('address') !!}">
							</div>
							<div class="form-group">
								<label for="pw">Password</label>
								<input type="password" class="form-control" id="pw" placeholder="Password" name="password">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="password_confirmation">
							</div>
							<label>Avatar Upload</label> 
							<div class="input-group">
								
								
									<span class="input-group-btn">
										<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
											<i class="fa fa-picture-o"></i> Choose
										</a>
									</span>
									<input id="thumbnail" class="form-control" type="text" name="avartar">
								
							</div>
							<img id="holder" style="margin-top:15px;max-height:100px;">

							<div class="form-check">
								<label class="custom-control custom-radio">
									<input id="radio1" name="role" type="radio" class="custom-control-input" value="1">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Admin</span>

								</label>
								<label class="custom-control custom-radio">
									<input id="radio2" name="role" type="radio"  checked="" class="custom-control-input" value="0">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">User</span>

								</label>
							</div>
							<button type="button" class="btn btn-inverse waves-effect waves-light"><a href="{!!URL::previous()!!}" class="text-white">Cancel</a></button>
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript">
	 $('#lfm').filemanager('image');
</script>
@stop