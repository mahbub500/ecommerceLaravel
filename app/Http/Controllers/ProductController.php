<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Color;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;
use Cart;

class ProductController extends Controller
{
    public function index()
    {
    	return view('website.product');
    }

    public function show(Product $product)
    {
    	return view('website.product-single', compact('product'));
    }

    public function productByCategory(Category $category)
    {
    	$products = $category->subcategories()
    						->with('products')->get()
    						->pluck('products')->collapse()->unique('id');
    	return view('website.product', compact('products'));
    }

    public function productBySubcategory(Subcategory $subcategory)
    {
    	$products = $subcategory->products;
    	return view('website.product', compact('products'));
    }

    public function productByBrand(Brand $brand)
    {
    	$products = $brand->products;
    	return view('website.product', compact('products'));
    }

    public function productByColor(Color $color)
    {
    	$products = $color->products;
    	return view('website.product', compact('products'));
    }
}
