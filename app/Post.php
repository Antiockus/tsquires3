<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Post extends Model {

		protected $fillable = [
			'title',
			'body',
			'created_by',
			'published_at'
		];

		public function user() {
			return $this->belongsTo( 'App\User', 'created_by', 'name' );
		}

	}