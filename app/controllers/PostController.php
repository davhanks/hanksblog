<?php

class PostController extends BaseController {

	public function postList() {
		$posts = Post::orderBy('created_at', 'DESC')->paginate(3);

		return View::make('posts.list')->with('posts', $posts)->with('title', 'Latest Entries');
	}

	public function create() {
		return View::make('posts.create')->with('title', 'New Post');
	}

	public function save() {
		$input = Input::all();

		$v = Validator::make($input, Post::$rules);

		if($v->passes()) {
			$post = new Post;
			$post->title = e(Input::get('title'));
			$post->body = e(Input::get('body'));
			$post->m_keyw = e(Input::get('m_keyw'));
			$post->description = e(Input::get('description'));
			$post->slug = Str::slug(e(Input::get('title')));
			$post->user_id = Auth::user()->id;
			$post->save();

			return Redirect::route('list');
		} else {
			return Redirect::to('posts/create')->withErrors($v);
		}
	}

	public function show($postID) {
		$post = Post::find($postID);

		$date = $post->created_at;
		setlocale(LC_TIME, 'America/Salt_Lake');
		$date = $date->formatlocalized('%A %d %B %Y');

		return View::make(posts.show)->with('post', $post)->with('date', $date);
	}

	public function edit($postID) {
		$post = Post::find($postID);

		if(is_null($post)) {
			return Redirect::route('list');
		}

		return View::make('posts.edit')->with('post', $post);
	}

	public function update($postID) {
		$post = Post::find($postID);

		$v = Validator::make(Input::all(), Post::$rules);

		if($v->passes()) {
			//do all of the update stuff here
			return Redirect::route('list');
		} else {
			return Redirect::back()->withErrors($v);
		}

	}

	public function destroy($postID) {
		$post = Post::find($postID);

		$post->is_active = '0';
		$post->save();

		return Redirect::route('list');
	}


}