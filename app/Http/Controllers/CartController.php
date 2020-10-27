<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
    	// Cart::destroy();
    	$products = Cart::content();
    	return view('website.cart', compact('products'));
    }

    // public function addToCart(Product $product)
    // {
    // 	$added = Cart::add([
    // 		'id' => $product->id, 
    // 		'name' => $product->name, 
    // 		'qty' => 1, 
    // 		'price' => $product->price,
    // 		'weight' => 0,
    //     'options' => ['image' => $product->images()->first()->image]
    // 	]);

    // 	if($added){
    // 		return back()->with('success', $product->name . ' successfully add to your cart');
    // 	}

    // }

    public function cartAdd(Product $product, Request $request)
    {
 

    	$added = Cart::add([
    		'id' => $product->id, 
    		'name' => $product->name, 
    		'qty' => $request->qty ?: 1, 
    		'price' => $product->price,
    		'weight' => 0,
    		'options' => ['color' => $request->color ?: NULL, 'image' => $product->images()->first()->image, 'discount' => $product->discount]
    	]);

    	if($added){
    		return response()->json(['success'  => $product->name . ' successfully add to your cart']);
    	}

    }

    public function cartItems()
    {
    	return view('website.cart-items');
    }

    public function cartpage()
    {
    	return view('website.cart-page');
    }


    public function update(Request $request)
    {
    	$qty = $request->qty;
    	$rowid = $request->rowid;

    	$update = Cart::update($rowid, $qty);

    	if($update){
    		return response()->json(['success'  => 'Cart successfully updated!']);
    	}
    }

    public function remove($rowid)
    {

   		Cart::remove($rowid);
    	return response()->json(['success'  => 'Product successfully removed!']);
    }
}
