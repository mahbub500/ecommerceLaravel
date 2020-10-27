<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    // protected $guard = [];
    protected $fillable = ['name' , 'feature', 'price', 'brand_id', 'discount', 'stock', 'description', 'new_from', 'new_to', 'slug'];

    public function subcategories()
    {
    	return $this->belongsToMany(Subcategory::class);
    }

    public function colors()
    {
    	return $this->belongsToMany(Color::class);
    }

    public function images()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
