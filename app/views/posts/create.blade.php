@extends('layouts.default')

@section('content')
<div class="main_section">
	{{ Form::open(array('url'=>'posts/save', 'method'=>'POST')) }}
	@if($errors->any())
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
	@endif
	<div class="control-group">
		{{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Title')) }}
	</div>
	<br />
	<div class="control-group">
		{{ Form::textarea('body', null, array('class'=>'ckeditor')) }}
	</div>
	<br />
	<div class="control-group">
		{{ Form::text('description', null, array('class'=>'form-control', 'placeholder'=>'Description')) }}
	</div>
	<br />
	<div class="control-group">
		{{ Form::text('m_keyw', null, array('class'=>'form-control', 'placeholder'=>'Key, words, here, ....')) }}
	</div>
	<br />
	{{ Form::submit('Create Post', array('class'=>'btn btn-primary')) }}
	{{ Form::close() }}
</div>
@stop