<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function scopeActive($query)
    {
    	return $query->where('status', 1);
    }

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
