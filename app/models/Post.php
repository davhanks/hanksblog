<?php

class Post extends Eloquent {


	public static $rules = array(
		'title'=> 'required|unique:posts',
		'body'=> 'required'
		);

	public function user() {
		return $this->belongsTo('User', 'id');
	}

}