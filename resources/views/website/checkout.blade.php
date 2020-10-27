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
              <h2>Product Checkout</h2>
              <p>Very us move be blessed multiply night</p>
            </div>
            <div class="page_link">
              <a href="index.html">Home</a>
              <a href="checkout.html">Product Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
      <div class="container">

          <div class="billing_details">
            <form class="row contact_form" action="{{ url('checkout') }}" method="post" novalidate="novalidate">
              @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" name="name" placeholder="Full Name" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" name="phone" placeholder="Phone number"/>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" name="email" placeholder="Email Address"/>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" name="address" placeholder="Address"/>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <select class="country_select" name="country">
                                <option value="">Country</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="USA">USA</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <select class="country_select" name="city">
                                <option value="">City</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Noakhali">Noakhali</option>
                                <option value="Comilla">Comilla</option>
                                <option value="Rajsahi">Rajsahi</option>
                                <option value="Barisal">Barisal</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="zip" placeholder="Postcode/ZIP" />
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" name="status" />
                                <label for="f-option2">Create an account?</label>
                            </div>
                        </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="order_box">
                          <h2>Your Order</h2>
                          <ul class="list">
                            <li><a href="#">Product <span>Total</span></a>
                            </li>
                            @foreach(Cart::content() as $product)
                            <li><a href="#">{{ $product->name }} <span class="middle">x {{ $product->qty }}</span> <span class="last">Tk {{ $product->price * $product->qty }}</span></a>
                            </li>
                            @endforeach
                          </ul>
                          <ul class="list list_2">
                            <li><a href="#">Subtotal <span>Tk {{ Cart::subtotal() }}</span></a>
                            </li>
                            <li><a href="#">Shipping <span>Flat rate: Tk 50.00</span></a>
                              <input type="hidden" name="discount" value="50">
                            </li>
                            <li><a href="#">Total <span>Tk {{ Cart::total() + 50 }}</span></a>
                            </li>
                          </ul>
                          <div class="payment_item">
                            <div class="radion_btn">
                                  <input type="radio" id="f-option5" value="cash" name="payoption" />
                                  <label for="f-option5">Cash on Hand</label>
                                  <div class="check"></div>
                              </div>
                          </div>
                          <div class="payment_item active">
                              <div class="radion_btn">
                                  <input type="radio" id="f-option6" value="bkash" name="payoption" />
                                  <label for="f-option6">bKash </label>
                                  <img src="{{ asset('contents/website') }}/img/product/single-product/card.jpg" alt="" />
                                  <div class="check"></div>
                              </div>
                          </div>
                          <div class="creat_account">
                              <input type="checkbox" id="f-option4" name="selector" />
                              <label for="f-option4">I’ve read and accept the </label>
                              <a href="#">terms & conditions*</a>
                          </div>
                          <button class="main_btn">Continue to Payment</button>
                      </div>
                  </div>
                </div>
              </form>
          </div>
      </div>
  </section>
    <!--================End Checkout Area =================-->

@endsection