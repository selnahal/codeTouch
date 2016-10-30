@extends('layout')

@section('content')
    <h1>Registration</h1>
    <a href="{{url('login')}}">Login</a>

	<div class="panel panel-default" id="registration_panel">
		<div class="panel-heading">
			<h3 class="panel-title">
				Please Sign Up
			</h3>
		</div>
		<div class="panel-body">
		{{Form::open(array('action'=>'PagesController@register', 'method' => 'post', 'role'=>'form'))}}
			{{-- <form role="form" method="post"> --}}
				<div class="row register_row">
					<div class="col-lg-6">
						<input type="text" name="first_name" class="form-control input-sm" placeholder="First Name"/>
					</div>
					<div class="col-lg-6">
						<input type="text" name="last_name" class="form-control input-sm" placeholder="Last Name"/>
					</div>
				</div>
				<div class="row register_row">
					<div class="col-lg-12">
						<input type="email" name="email" class="form-control input-sm" placeholder="E-mail"/>
					</div>
				</div>
				<div class="row register_row">
					<div class="col-lg-6">
						<input type="password" name="password" class="form-control input-sm" placeholder="Password"/>
					</div>
					<div class="col-lg-6">
						<input type="password" name="confirm_password" class="form-control input-sm" placeholder="Confirm Password"/>
					</div>
				</div>
				<input type="submit" value="Register" class="btn btn-info btn-block">
			{{-- </form> --}}
			{{Form::close()}}
		</div>
	</div>
@stop