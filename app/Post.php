<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	    'post_title', 'post_body',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	    'user_id',
	];

	public function user()
	{
	    return $this->belongsTo('App\User');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}
}
