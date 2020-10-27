<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
