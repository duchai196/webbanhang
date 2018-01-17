@extends('admin.master')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-block">
				<h3 class="box-title m-b-0">Sample Basic Forms</h3>
				<p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>
				<div class="row">
					<div class="col-sm-12 col-xs-12">
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
								<label>Input Select</label>
								<select class="custom-select col-12" id="inlineFormCustomSelect">
									<option selected="">Choose...</option>
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
								</select>
							</div>
							<fieldset class="form-group">
								<label>Default file upload</label>
								<label class="custom-file d-block">
									<input type="file" id="file" class="custom-file-input">
									<span class="custom-file-control"></span>
								</label>
							</fieldset>
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
							<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
							<button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop