@extends('layout')

@section('content')

	<div class="panel panel-default" id="registration_panel">
		<div class="panel-heading">
			<h3 class="panel-title">
				Please Sign Up
			</h3>
		</div>
		<div class="panel-body">
			{{Form::open(array('action'=>'PagesController@register', 'method' => 'post', 'role'=>'form'))}}
				<div class="row register_row">
					<div class="col-lg-6">
						<input type="text" name="first_name" class="form-control input-sm" placeholder="First Name" value="{{ Request::old('first_name') }}" />
					</div>
					<div class="col-lg-6">
						<input type="text" name="last_name" class="form-control input-sm" placeholder="Last Name" value="{{ Request::old('last_name') }}"/>
					</div>
				</div>
				<div class="row register_row">
					<div class="col-lg-12">
						<input type="email" name="email" class="form-control input-sm" placeholder="E-mail" value="{{ Request::old('email') }}"/>
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
				<input type="submit" value="Register" class="btn btn-info btn-block" id="register_btn">
			{{Form::close()}}
			<a class="btn btn-success btn-block" href="{{url('google')}}">Register using Gmail Account</a>
		</div>
	</div>
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@stop