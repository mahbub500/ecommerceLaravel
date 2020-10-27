<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Uzzal\SslCommerz\Client;
use Uzzal\SslCommerz\Customer;

class CheckoutController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	return view('website.checkout');
    }

    public function store(Request $request)
    {
    	$request->validate([ 'name' => 'required']);
    	$request['status'] = (boolean)$request->status;
    	$shipping = Shipping::create( $request->all() );

    	$discount = 0;
    	foreach(Cart::content() as $product){
    		$discount += $product->options->discount * $product->qty;
    	}

    	$total = Cart::total() - $discount;
    	$user = auth()->user();


    	if($request->payoption == 'cash'){

    		$order = Order::create([
    			'shipping_id' => $shipping->id,
    			'customer_id' => $user->id,
    			'order_total' => $total,
    			'shipping_charge' => $request->discount
    		]);

    		foreach(Cart::content() as $product){
	    		OrderDetail::create([
	    			'order_id' => $order->id,
					'product_id' => $product->id,
					'product_name' => $product->name,
					'price' => $product->price,
					'qty' => $product->qty,
					'discount' => $product->options->discount
	    		]);

	    		$orderedProduct = Product::findOrFail($product->id);
	    		$orderedProduct->stock = $orderedProduct->stock - $product->qty;
	    		$orderConfirm = $orderedProduct->save();
	    	}
            

    	}else{

    		$customer = new Customer($user->name, $user->email, $shipping->phone);
			$resp = Client::initSession($customer, $total);
			session()->put('shipping_id', $shipping->id);
			session()->put('discount', $request->discount);
			return redirect($resp->getGatewayUrl());

    	}



    	if($orderConfirm){
    		Cart::destroy();
    		return redirect('success')->with('success', 'Oder Succdessfull');
    	}else{
    		return back();
    	}

    }
}
