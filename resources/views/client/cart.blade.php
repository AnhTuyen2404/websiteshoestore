@extends('layouts.client')
@section('content')
@include('sweetalert::alert')
        <main id="MainContent" class="content-for-layout"> 
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
                                            <p class="product-vendor">Size: {{$item->options->size}}</p>                                   
                                          </td>
                                          <td class="cart-item-quantity">
                                                <form action="/update-cart" method="post">
                                                    {{ csrf_field() }}
                                                    <div class="quantity d-flex align-items-center justify-content-between">
                                                    <input name='rowId' type="hidden" value="{{$item->rowId}}" >
                                                    <input class="qty-input" type="number" name="quantity" value="{{$item->qty}}" min="0" >
                                                    <button type="submit"  style="margin-left: 60px">Update</button>    
                                                </div>
                                                </form>
                                                 
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
                                        
                                        
                                        <hr />
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Total:</h4>
                                            <p class="subtotal-value"><?php  $total=Cart::total(0);;
                                                echo $total ?></p>
                                        </div>
                                        
                                        <div class="d-flex justify-content-center mt-4">
                                            <a href="/checkout" class="position-relative btn-primary text-uppercase" >
                                                Procced to checkout
                                            </a>
                                            
                                            <a href="/clear-all" class="position-relative btn-primary text-uppercase"
                                             style="margin-left: 20px" onclick="confirmClearCart()">
                                                Clear All
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
</section>
@endsection
