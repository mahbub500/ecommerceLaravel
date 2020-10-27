<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function scopeActive($query)
    {
    	return $query->where('status', 1);
    }

    public function subcategories()
    {
    	return $this->hasMany(Subcategory::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
