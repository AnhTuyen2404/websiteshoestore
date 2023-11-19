@extends('layouts.client')
@section('content')
@include('sweetalert::alert')
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled d-flex align-items-center m-0">
            <li><a href="/">Home</a></li>
            <li>
                <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path
                            d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                            fill="#000" />
                    </g>
                </svg>
            </li>
            <li>Cart</li>
            <li>
                <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.4">
                        <path
                            d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                            fill="#000" />
                    </g>
                </svg>
            </li>
            <li>Checkout</li>
        </ul>
    </div>
</div>
<main id="MainContent" class="content-for-layout">
    <div class="checkout-page mt-100">
        <div class="container">
            <div class="checkout-page-wrapper">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                        <div class="section-header mb-3">
                            <h2 class="section-heading">Check out</h2>
                        </div>
                        <div class="checkout-progress overflow-hidden">
                            <ol class="checkout-bar px-0">
                                <li class="progress-step step-done"><a href="{{URL::to('show-cart')}}">Cart</a></li>
                                <li class="progress-step step-active"><a href="checkout.html">Your Details</a></li>
                                <li class="progress-step step-todo"><a href="checkout.html">Shipping</a></li>
                                <li class="progress-step step-todo"><a href="checkout.html">Payment</a></li>
                                <li class="progress-step step-todo"><a href="checkout.html">Review</a></li>
                            </ol>
                        </div>
                        <div class="shipping-address-area">
                            <h2 class="shipping-address-heading pb-1">Shipping address</h2>
                            <div class="shipping-address-form-wrapper">
                                <form action="payment" class="shipping-address-form common-form" method="POST">
                                    @csrf
                                    <div class="row">
                                        @foreach($data_customer as $key => $data)
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Name</label>
                                                    <input type="text" name="shipping_name" value="{{ $data->customer_name }}"/>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Email address</label>
                                                    <input type="email" name="shipping_email" value="{{ $data->customer_email }}"/>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Phone number</label>
                                                    <input type="text" name="shipping_phone" value="{{ $data->customer_phone }}"/>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Address</label>
                                                    <input type="text"  name="shipping_address" value="{{ $data->customer_address }}"/>
                                                </fieldset>
                                            </div>
                                            
                                            <input type="hidden" name="customer_id" value="{{ $data->customer_id }}">
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">City</label>
                                                    <select class="form-select choose city" name="city" id="city">
                                                        <option value="">--Choose City--</option>
                                                            @foreach($city as $key => $ci)
                                                                <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                                            @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Province</label>                                                        
                                                    <select class="form-select province choose" name="province" id="province">
                                                        <option selected="">--Choose Province--</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Province</label>                                                        
                                                    <select class="form-select wards" name="wards" id="wards">
                                                        <option selected="">--Choose Wards--</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-12">
                                                <fieldset>
                                                    <label class="label">Payment methods</label>                                                        
                                                    <select class="form-select payment" name="payment" id="payment">
                                                        <option value="cod">Cash On Delivery</option>
                                                        <option value="e-payment">E-payment</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                        <div class="shipping-address-area billing-area">
                            <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                <input type="button"  value="SHIPPING CHARGES" name="calculate_order" class="checkout-page-btn minicart-btn btn-secondary calculate_delivery">
                                <button type="submit" class="checkout-page-btn minicart-btn btn-primary">PROCEED TO SHIPPING</button>
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                        <div class="cart-total-area checkout-summary-area">
                            <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Order summary</h4>
                            <?php
                                $Cart = Cart::content();
                            ?>
                            @php
                            $subtotal = 0;
                            @endphp
                            @foreach($Cart as $item)
                            <input type="hidden" value="{{$item->rowId}}">
                            <div class="minicart-item d-flex">
                                <div class="mini-img-wrapper">
                                    <img class="mini-img" src="{{asset ('client/img/shop/'.$item->options->image) }}" alt="img">
                                </div>
                                <div class="product-info">
                                    <h2 class="product-title"><a href="#">{{$item->name}}</a></h2>
                                    <p class="product-vendor">{{ number_format($item->price)}} x {{$item->qty}}</p>
                                    <p class="product-vendor">Size: {{$item->options->size}} </p>
                                </div>
                            </div>
                            @php
                                $subtotal += $item->price * $item->qty;
                            @endphp
                            @endforeach
                            <div class="cart-total-box mt-4 bg-transparent p-0">
                                <div class="subtotal-item subtotal-box">
                                    <h4 class="subtotal-title">Subtotals:</h4>
                                    <p class="subtotal-value">{{ number_format($subtotal, 0, ',', '.') }}</p>
                                </div>
                                <div class="subtotal-item shipping-box">
                                    @php
                                        $shipping_fee = Session::get('fee', 0);
                                    @endphp
                                    <h4 class="subtotal-title">Shipping:</h4>
                                    <input type="hidden" name="shipping_fee" value="{{$shipping_fee}}">
                                    @if($shipping_fee)
                                        <p class="subtotal-value">{{ number_format($shipping_fee, 0, ',', '.') }}</p>
                                    @endif 
                                </div>
                                
                                <div class="subtotal-item discount-box">
                                    <h4 class="subtotal-title">Discount:</h4>
                                    @php
                                        $total_coupon = 0;
                                        $total_after_coupon = 0;
                                    @endphp
                                    @if(Session::get('coupon'))
                                        @foreach(Session::get('coupon') as $key => $cou)
                                            @if($cou['coupon_condition'] == 1)
                                                <p class="subtotal-value">{{ number_format($cou['coupon_number'], 0, ',', '.') }} % </p>
                                                <input type="hidden" name="discount" value="{{$cou['coupon_number']}}%">
                                                @php 
                                                    
                                                    $total_coupon = ($subtotal * $cou['coupon_number']) / 100;
                                                @endphp
                                                @php 
                                                
                                                    $total_after_coupon = $subtotal - $total_coupon;
                                                @endphp
                                            @elseif($cou['coupon_condition'] == 2)
                                                <p class="subtotal-value">{{ number_format($cou['coupon_number'], 0, ',', '.') }}</p>
                                                <input type="hidden" name="discount" value="{{$cou['coupon_number']}}vnđ">
                                                @php 
                                                    $total_coupon = $subtotal - floatval($cou['coupon_number']);
                                                @endphp
                                                @php 
                                                    $total_after_coupon = $total_coupon;
                                                @endphp
                                            @endif
                                        @endforeach
                                        
                                    @endif
                                    
                                </div>
                                

                                <hr />
                                <div class="subtotal-item discount-box">
                                    <h4 class="subtotal-title">Total:</h4>
                                    @php
                                    
                                        $total = $total_after_coupon + Session::get('fee');
                                       
                                    @endphp
                                    <input type="hidden" value="{{$total}}" name="total">
                                    
                                    <p class="subtotal-value">{{ number_format($total, 0, ',', '.') }}</p>
                                </div>  
                            </form>
                                <form action="{{url('/check-coupon')}}" method="POST">
                                @csrf
                                <div class="mt-4 checkout-promo-code">
                                    <input class="input-promo-code" type="text" name="coupon" placeholder="Promo code" />
                                    <input type="submit" name="check_coupon" class="btn-apply-code position-relative btn-secondary text-uppercase mt-3 check_coupon" value="Apply Promo Code">
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</main>
</section>
 
@endsection
