<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Entry extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo(User::class);
    } 

    // mutator

    public function setTittleAttribute($value)
    {
    	$this->attributes['slug'] =str::slug($value);
    }
}
