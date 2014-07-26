@extends('layouts.default')

@section('content')
	<div class="main_section">
		<a class="btn btn-danger" href="{{ URL::to('posts/create') }}">New Post</a>
		@if($posts->count())

			<h4>These are the current posts</h4>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Date Created</th>
						<th>Preview</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $p)
					<tr>
						<td>{{ $p->title }}</td>
						<td>{{ $p->description }}</td>
						<td><span class="label label-info">{{ Carbon::createFromTimestamp(strtotime($p->created_at))->diffForHumans() }}</span></td>
						<td></td>
						<td></td>
						<td>Delete</td>
					</tr>	
					@endforeach


				</tbody>


			</table>
		@else 
			<div class="alert alert-danger">There are no posts to display.</div>
		@endif
	</div>
@stop