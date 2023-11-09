@extends('layouts.client')
        @section('content')

        <main id="MainContent" class="content-for-layout">
            <form action="/update-cart" method="post">
            {{csrf_field()}}
            <div class="cart-page mt-100">
                <div class="container">
                    <div class="cart-page-wrapper">
                        <div class="row">
                            <div class="col-lg-7 col-md-12 col-12">
                                <table class="cart-table w-100">
                                    <thead>
                                      <tr>
                                        <th class="cart-caption heading_18">Product</th>
                                        <th class="cart-caption heading_18"></th>
                                        <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                                        <th class="cart-caption text-end heading_18">Price</th>
                                      </tr>
                                    </thead>
                        
                                    <tbody>
                                        <?php
                                            $Cart = Cart::content();
                                        ?>
                                        @foreach($Cart as $item)
                                        <tr class="cart-item">
                                          <td class="cart-item-media">
                                            <div class="mini-img-wrapper">
                                                <img class="mini-img" src="{{asset ('client/img/shop/'.$item->options->image) }}" alt="img">
                                            </div>                                    
                                          </td>
                                          <td class="cart-item-details">
                                            <h2 class="product-title"><a href="#">{{$item->name}}</a></h2>
                                            <p class="product-vendor">XS / Dove Gray</p>                                   
                                          </td>
                                          <td class="cart-item-quantity">
                                            <div class="quantity d-flex align-items-center justify-content-between">
                                                <button class="qty-btn dec-qty"><img src="{{asset('client/img/icon/minus.svg')}}"
                                                        alt="minus"></button>
                                                <input class="qty-input" type="number" name="qty" value="{{$item->qty}}" min="0">
                                                <button class="qty-btn inc-qty"><img src="{{asset('client/img/icon/plus.svg')}}"
                                                        alt="plus"></button>
                                            </div>
                                            <a href="/delete-cart/{{$item->rowId}}" class="product-remove mt-2">Remove</a>                           
                                          </td>
                                          <td class="cart-item-price text-end">
                                            <div class="product-price">{{ number_format($item->price)}}</div>                           
                                          </td>                        
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                            <div class="col-lg-5 col-md-12 col-12">
                                <div class="cart-total-area">
                                    <h3 class="cart-total-title d-none d-lg-block mb-0">Cart Totals</h4>
                                    <div class="cart-total-box mt-4">
                                        <div class="subtotal-item subtotal-box">
                                            <h4 class="subtotal-title">Subtotals:</h4>
                                            <p class="subtotal-value"><?php  $total=Cart::total(0);
                                                echo $total ?></p>
                                        </div>
                                        <div class="subtotal-item shipping-box">
                                            <h4 class="subtotal-title">Shipping:</h4>
                                            <p class="subtotal-value"><?php  $total=Cart::tax(0);
                                                echo $total ?></p>
                                        </div>
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Discount:</h4>
                                            <p class="subtotal-value">$100.00</p>
                                        </div>
                                        <hr />
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Total:</h4>
                                            <p class="subtotal-value"><?php  $total=Cart::total(0);
                                                echo $total ?></p>
                                        </div>
                                        <p class="shipping_text">Shipping & taxes calculated at checkout</p>
                                        <div class="d-flex justify-content-center mt-4">
                                            <a href="/checkout" class="position-relative btn-primary text-uppercase">
                                                Procced to checkout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </main>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-option d-flex align-items-center">
                                <div class="option-item">
                                    <span>
                                        Hotline:
                                        <a href="tel:16545676789">(+1) 654 567 – 6789</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        @endsection