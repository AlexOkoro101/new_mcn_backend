<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiaries extends Model
{
     protected $fillable=['name','phone','network'];
     
     public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
