@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')

<!-- Start Breadcrumbbar -->                    
@component('layouts.partials.breadcumb')
    <li class="breadcrumb-item"><a href="{{ url('prodcuts') }}">Prodcuts</a></li>
    <li class="breadcrumb-item active" aria-current="page">Show</li>
@endcomponent
<!-- End Breadcrumbbar -->

<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-7 col-xl-8">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h5 class="card-title mb-0">Order No : #{{ $order->id }}</h5>
                        </div>
                        <div class="col-5 text-right">
                            <span class="badge badge-success-inverse">{!! $order->status() !!}</span>                                             
                        </div>
                    </div>
                </div>
                <div class="card-body">                                
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="order-primary-detail mb-4">
                                <h6>Order Placed</h6>
                                <p class="mb-0">{{ date_formate($order->created_at, 'd M Y, h:ia') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="order-primary-detail mb-4">
                                <h6>Name</h6>
                                <p class="mb-0">{{ $order->shipping->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="order-primary-detail mb-4">
                                <h6>Email ID</h6>
                                <p class="mb-0">{{ $order->shipping->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="order-primary-detail mb-4">
                                <h6>Contact No</h6>
                                <p class="mb-0">{{ $order->shipping->phone }}</p>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 ">
                            <div class="order-primary-detail mb-4">
                                <h6>Delivery Address <a href="#" class="badge badge-primary-inverse">Edit</a></h6>
                                <p>{{ $order->shipping->address }}<br/> {{ $order->shipping->city }}, {{ $order->shipping->country }}<br/></p>
                            </div>
                        </div>
                    </div>                                
                </div>
            </div> 
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Order Items</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>                                              
                                    <th scope="col">Photo</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <img src="{{ asset('contents/admin') }}/images/ecommerce/product_01.svg" class="img-fluid" width="35" alt="product">
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->qty }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td class="text-right">{{ ($product->price * $product->qty) - ($product->qty * $product->discount) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row border-top pt-3">
                        <div class="col-md-12 order-2 order-lg-1 col-lg-4 col-xl-6">
                            <div class="order-note">
                                <p class="mb-5"><span class="badge badge-secondary-inverse">Free Shipping Order</span></p>
                                <h6>Note :</h6>
                                <p>Please, Pack with product air bag and handle with care.</p>
                            </div>
                        </div>
                        <div class="col-md-12 order-1 order-lg-2 col-lg-8 col-xl-6">
                            <div class="order-total table-responsive ">
                                <table class="table table-borderless text-right">
                                    <tbody>
                                        <tr>
                                            <td>Sub Total :</td>
                                            <td>{{ $order->order_total }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping :</td>
                                            <td>{{ $order->shipping_charge }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tax(18%) :</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black f-w-7 font-18">Amount :</td>
                                            <td class="text-black f-w-7 font-18">{{ $order->order_total + $order->shipping_charge }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-primary-rgba my-1"><i class="feather icon-plus mr-2"></i>Add Product</button>
                    <button type="button" class="btn btn-success-rgba my-1"><i class="feather icon-repeat mr-2"></i>Refund</button>
                    <button type="button" class="btn btn-danger-rgba my-1"><i class="feather icon-trash mr-2"></i>Cancel</button>
                </div>
            </div>
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h5 class="card-title mb-0">Invoice PDF Details</h5>
                        </div>
                        <div class="col-5 text-right">
                            <button type="button" class="btn btn-success py-1"><i class="feather icon-download mr-2"></i>Invoice</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="order-primary-detail">
                        <h6>Current PDF Details</h6>
                        <p class="mb-0">Invoice No : #986953</p>
                        <p class="mb-0">Seller GST : 24HY87078641Z0</p>
                        <p class="mb-0">Purchase GST : 24HG9878961Z1</p>
                    </div>
                </div>
            </div>                  
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-5 col-xl-4">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h5 class="card-title mb-0">Via</h5>
                        </div>
                        <div class="col-8">
                            <div class="card-statistics">
                                <ul class="nav nav-pills mb-0" id="stastic-pills-tab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="pills-email-tab" data-toggle="pill" href="#pills-email" role="tab" aria-selected="false">Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-sms-tab" data-toggle="pill" href="#pills-sms" role="tab" aria-selected="false">SMS</a>
                                </li>
                            </ul>  
                        </div>
                    </div>
                </div>                                
            </div>
            <div class="card-body">
                <form action="{{ url('admin/orders/delivered/'. $order->id) }}" method="get">

                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option selected>Select Type</option>
                            <option value="processing">Processing</option>
                            <option value="on-hold">On-Hold</option>
                            <option value="shipped">Shipped</option>
                            <option value="out-for-delivery">Out for Delivery</option>
                            <option value="delivered">Delivered</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="3" placeholder="Add Special Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="feather icon-send mr-2"></i>Send</button>
                </form>
            </div>
        </div>
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Chat with Customers</h5>
            </div>
            <div class="card-body">
                <div class="chat-detail order-chat-detail mb-0">
                    <div class="chat-body">
                        <div class="chat-day text-center mb-3">
                            <span class="badge badge-secondary">Today</span>
                        </div>                                
                        <div class="chat-message chat-message-right">
                            <div class="chat-message-text">
                                <span>Hello!</span>
                            </div>
                            <div class="chat-message-meta">
                                <span>4:18 pm<i class="feather icon-check ml-2"></i></span>
                            </div>
                        </div>
                        <div class="chat-message chat-message-left">
                            <div class="chat-message-text">
                                <span>Yes, Sir</span>
                            </div>
                            <div class="chat-message-meta">
                                <span>4:20 pm<i class="feather icon-check ml-2"></i></span>
                            </div>
                        </div>
                        <div class="chat-message chat-message-right">
                            <div class="chat-message-text">
                                <span>Schedule demo.</span>
                            </div>
                            <div class="chat-message-meta">
                                <span>4:25 pm<i class="feather icon-check ml-2"></i></span>
                            </div>
                        </div>
                        <div class="chat-message chat-message-left">
                            <div class="chat-message-text">
                                <span>Sure, I will.</span>
                            </div>
                            <div class="chat-message-meta">
                                <span>4:27 pm<i class="feather icon-check ml-2"></i></span>
                            </div>
                        </div>
                        <div class="chat-message chat-message-right">
                            <div class="chat-message-text">
                                <span>Great. Thanks</span>
                            </div>
                            <div class="chat-message-meta">
                                <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>
                            </div>
                        </div>
                        <div class="chat-message chat-message-left">
                            <div class="chat-message-text">
                                <span>I have completed.</span>
                            </div>
                            <div class="chat-message-meta">
                                <span>4:20 pm<i class="feather icon-check ml-2"></i></span>
                            </div>
                        </div>
                        <div class="chat-message chat-message-right">
                            <div class="chat-message-text">
                                <span>Please, send me.</span>
                            </div>
                            <div class="chat-message-meta">
                                <span>4:25 pm<i class="feather icon-check ml-2"></i></span>
                            </div>
                        </div>
                        <div class="chat-message chat-message-left">
                            <div class="chat-message-text">
                                <span>Sure, I will email you.</span>
                            </div>
                            <div class="chat-message-meta">
                                <span>4:27 pm<i class="feather icon-check ml-2"></i></span>
                            </div>
                        </div>
                        <div class="chat-message chat-message-right">
                            <div class="chat-message-text">
                                <span>Ok, Got it.</span>
                            </div>
                            <div class="chat-message-meta">
                                <span>4:30 pm<i class="feather icon-clock ml-2"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="chat-bottom px-0 pb-0">
                        <div class="chat-messagebar">
                            <form>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-secondary-rgba" type="button" id="button-addonmic"><i class="feather icon-mic"></i></button>
                                    </div>  
                                    <input type="text" class="form-control" placeholder="Type a message..." aria-label="Text">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary-rgba" type="submit" id="button-addonlink"><i class="feather icon-link"></i></button>
                                        <button class="btn btn-primary-rgba" type="button" id="button-addonsend"><i class="feather icon-send"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Downloads</h5>
            </div>
            <div class="card-body">
                <p><button type="button" class="btn btn-primary-rgba my-1"><i class="feather icon-file mr-2"></i>Invoice</button></p>
                <p><button type="button" class="btn btn-info-rgba my-1"><i class="feather icon-box mr-2"></i>Packaing Slip</button></p>
                <p><button type="button" class="btn btn-success-rgba my-1"><i class="feather icon-gift mr-2"></i>Gift Wrap Detail</button></p>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->
</div>


@endsection

@push('js')
    <script src="{{ asset('contents/admin') }}/js/custom/custom-ecommerce-single-product.js"></script>
@endpush