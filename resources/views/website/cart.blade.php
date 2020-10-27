@extends('layouts.website')


@section('content')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Cart</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.html">Home</a>
              <a href="cart.html">Cart</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Color</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Total</th>
                  <th scope="col">Remove</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $discount = 0;
                @endphp
                @foreach($products as $product)
                <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <img width="80" src="{{ asset('storage/products/'.$product->options->image) }}" alt="" />
                      </div>
                      <div class="media-body">
                        <p>{{ $product->name }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>Tk {{ $product->price }}</h5>
                  </td>
                  <td>
                    <div class="product_count">
                      <input type="text" name="qty" id="sst{{ $product->id }}" maxlength="12" value="{{ $product->qty }}" title="Quantity:" class="input-text qty"
                      />
                      <button data-rowid="{{ $product->rowId }}" onclick="var result = document.getElementById('sst{{ $product->id }}'); 
                                       var sst = result.value; 
                                       if( !isNaN( sst )) result.value++;
                                       return false;" 
                        class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                      <button data-rowid="{{ $product->rowId }}" onclick="var result = document.getElementById('sst{{ $product->id }}'); 
                                       var sst = result.value; 
                                       if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
                        class="reduced items-count" type="button" ><i class="lnr lnr-chevron-down"></i></button>

                    </div>
                  </td>
                  <td>{{ $product->options->color }}</td>
                  <td>{{ $product->options->discount * $product->qty }}</td>
                  <td>
                    <h5>{{ ($product->price * $product->qty) - ($product->options->discount * $product->qty) }}</h5>
                  </td>
                  <td>
                    <a href="{{ url('cart/remove/'.$product->rowId) }}" class="btn btn-default btn-remove"><i class="fa fa-times text-danger"></i></a>
                    
                  </td>
                </tr>

                @php
                  $discount += $product->options->discount * $product->qty;
                @endphp


                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td>Total Qty: {{ Cart::count() }}</td>
                  <td></td>
                  <td>Total Discount: Tk {{ $discount }}</td>
                  <td>Total: {{ Cart::total() - $discount }}</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="float-right">
          <a href="{{ url('checkout') }}" class="btn btn-success">Continue to Checkout</a>
        </div>
      </div>
      <div class="loading">
        <img src="{{ asset('contents/website/img/loading.gif') }}" alt="">
      </div>
    </section>
    <!--================End Cart Area =================-->

@endsection
