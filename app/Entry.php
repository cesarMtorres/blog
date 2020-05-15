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

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=$value;
    	$this->attributes['slug']=Str::slug($value);
    }

    // cambia el tipo de parametro de las funciones de id a slug 
 /*   public function getRouteKeyName()
    {
        return 'slug';
    }
*/
    public function getUrl()
    {
        return url("entries/$this->slug-$this->id");
    }

    
}
