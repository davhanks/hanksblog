@extends('layouts.login')

@section('content')
<div id="login_wrapper">
	<div id="login_form">
	
		{{ Form::open(array('url'=>'users/signin', 'method'=>'POST', 'id'=>'log_form')) }}
		@if(Session::has('error'))
			<div class="alert alert-danger error">
				<p>{{ Session::get('error') }}</p>
			</div>
		@endif
		@if(Session::has('logout'))
			<div class="alert alert-success error">
				<p>{{ Session::get('logout') }}</p>
			</div>
		@endif
			{{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }} <br />
		    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }} <br />
		    {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary'))}}
		{{ Form::close() }}
	</div>
</div>
@stop