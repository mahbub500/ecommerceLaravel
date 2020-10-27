<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Product;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Uzzal\SslCommerz\Client;
use Uzzal\SslCommerz\IpnNotification;

class PaymentController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function payment(Request $request)
    {
        if(ipn_hash_varify(config('sslcommerz.store_password'))){
            $ipn = new IpnNotification($_POST);
            $val_id = $ipn->getValId();
            $resp = Client::verifyOrder($val_id);
            $transaction_id = $ipn->getTransactionId();
            $amount = $ipn->getAmount();

            $payment = Payment::create([
                'transaction_id' => $transaction_id,
                'amount' => $amount,
                'val_id' => $val_id
            ]);

            $discount = 0;
            foreach(Cart::content() as $product){
                $discount += $product->options->discount * $product->qty;
            }

            $total = Cart::total() - $discount;
            $user = auth()->user();

            $order = Order::create([
                'shipping_id' => session()->get('shipping_id'),
                'payment_id' => $payment->id,
                'customer_id' => $user->id,
                'order_total' => $total,
                'shipping_charge' => session()->get('discount')
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
            return redirect('error');
        }

        if($orderConfirm){
            Cart::destroy();
            session()->forget(['discount', 'shipping_id']);
            return redirect('success')->with('success', 'Oder Succdessfull');
        }else{
            return back();
        }
    }

    public function success(Request $request)
    {
        return view('website.success')->with('success', 'Payment Success');
    }

    public function error(Request $request)
    {
        return view('website.success')->with('error', 'Ops! Please try again');
    }

    public function cancel(Request $request)
    {
        return view('website.success')->with('error', 'Payment canceled');
    }
}
