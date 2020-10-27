<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValidate;
use App\Mail\OrderConfirmedMail;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::latest()->with('shipping')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    public function delivered(Order $order, Request $request)
    {
        if($request->status == 'completed' && $order->status == 0){
            $order->status = 1;
            $order->save();

            Mail::to($order->shipping->email)->send(new OrderConfirmedMail($order, $request->message));
        }

        return back()->with('success', 'Order successfully delvered!');

    }

}
