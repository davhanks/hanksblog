@extends('layouts.default')

@section('content')
<div class="main_section">
	<a class="btn btn-danger" href="{{ URL::to('posts/new') }}">New Post</a>
</div>
@stop