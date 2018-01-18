@extends('admin.master')
@section('content')
<div class="row">
	<div class="col-md-6">
	<div class="card">
		<div class="card-block">
			<h4 class="card-title">Modal based on trigger button</h4>
			<!-- sample modal content -->
			<div class="button-box">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
				<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>
			</div>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="exampleModalLabel1">New message</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form>
						
							<div class="form-group">
								<label for="exampleInputEmail1">User Name</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
							</div>
							
							
							<div class="form-group">
								<div class="checkbox checkbox-success">
									<input id="checkbox1" type="checkbox">
									<label for="checkbox1"> Remember me </label>
								</div>
							</div>
		
							<div class="form-check">
								<label class="custom-control custom-radio">
									<input id="radio1" name="radio" type="radio" class="custom-control-input">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Public</span>
		
								</label>
								<label class="custom-control custom-radio">
									<input id="radio2" name="radio" type="radio" class="custom-control-input">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description">Private</span>
		
								</label>
							</div>
						
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Send message</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /.modal -->
		</div>
	</div>
	</div>
</div>
@stop