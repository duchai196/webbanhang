@extends('admin.master')
@section('breadcrumb')
    Sửa thông tin thành viên
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h3 class="box-title m-b-0">Sửa thành viên</h3>
                    {{-- <p class="text-muted m-b-30 font-13">V</p> --}}
                    <div class="row">

                        <div class="col-sm-12 col-xs-12">
                            @if(count($errors)>0)
                                @foreach($errors->all() as $err)
                                    <div class="alert alert-danger">{{$err}}</div>
                                @endforeach
                            @endif
                            <form action="{{route('user.update',$user->id)}}" method="POST">
                                {!!csrf_field()!!}
                                {!! method_field('PUT') !!}
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Nhập tên" name="name" value="{!! old('name'),isset($user)? $user->name:null !!}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập email" name="email" value="{!! old('email'),isset($user)? $user->email:null !!}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhone">Phone</label>
                                    <input type="number" class="form-control" id="exampleInputPhone" min="0" placeholder="Nhập số điện thoại" name="phone"  value="{!! old('phone'),isset($user)? $user->phone:null !!}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPhone">Address</label>
                                    <input type="text" class="form-control" id="exampleInputPhone" placeholder="Nhập địa chỉ" name="address" value="{!! old('address'),isset($user)? $user->address:null !!}">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox checkbox-success">
                                        <input id="changePass" type="checkbox" name="changePass">
                                        <label for="changePass"> Change password</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pw">Password</label>
                                    <input type="password" class="form-control password" id="pw" placeholder="Password" name="password"  disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control password" id="exampleInputPassword1" placeholder="Confirm Password" name="password_confirmation"  disabled >
                                </div>
                                <label>Change avartar</label>
                                <div class="input-group">


									<span class="input-group-btn">
										<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
											<i class="fa fa-picture-o"></i> Choose
										</a>
									</span>
                                    <input id="thumbnail" class="form-control" type="text" name="avartar" value="{!! $user->avartar !!}" style="margin-bottom: 30px">
                                    <br>


                                </div>
                                @if($user->avartar)
                                    <img src="{{$user->avartar}}" alt="" width="200" height="200" class="img-circle">
                                @endif
                                <img id="holder" style="margin-top:15px" class="img-circle" width="200" height="200">

                                <div class="form-check">
                                    <label class="custom-control custom-radio">
                                        <input id="radio1" name="role" type="radio" class="custom-control-input" value="1" {{($user->role==1)? "checked":null}}>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Admin</span>

                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio2" name="role" type="radio"  class="custom-control-input" value="0" {{($user->role==0)? "checked":null}}>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">User</span>

                                    </label>
                                </div>
                                <button type="button" class="btn btn-inverse waves-effect waves-light"><a href="{!!URL::previous()!!}" class="text-white">Cancel</a></button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
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
        $(document).ready(function () {
            $('#changePass').change(function () {
               if($(this).is(":checked")){
                    $('.password').removeAttr('disabled');
               }
               else {
                   $('.password').attr('disabled','');
               }
            });
        });
    </script>

@stop