@extends('layout')

@section('content')

	<div class="panel panel-default" id="registration_panel">
		<div class="panel-heading">
			<h3 class="panel-title">
				Please Login
			</h3>
		</div>
		<div class="panel-body">
		{{Form::open(array('action'=>'PagesController@login', 'method' => 'post', 'role'=>'form'))}}
			{{-- <form role="form" method="post"> --}}
				
				<div class="row register_row">
					<div class="col-lg-12">
						<input type="email" name="email" class="form-control input-sm" placeholder="E-mail"/>
					</div>
				</div>
				<div class="row register_row">
					<div class="col-lg-12">
						<input type="password" name="password" class="form-control input-sm" placeholder="Password"/>
					</div>
				</div>
				<input type="submit" value="Login" class="btn btn-info btn-block" id="login_btn">
			{{-- </form> --}}
			{{Form::close()}}
			<a class="btn btn-success btn-block" href="{{url('google')}}">Login using Gmail Account</a>
		</div>
	</div>
@stop