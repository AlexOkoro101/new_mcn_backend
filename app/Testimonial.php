<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable=['name','email','location','message'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
