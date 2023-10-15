@extends('layouts.client')
        @section('content')


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
        <!-- End Navbar Area -->

        <!-- Start Page Banner -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Cart</h2>

                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start Cart Area -->
		<section class="cart-area ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <form action="/update-cart" method="post">
                        {{csrf_field()}}
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        <?php
                                            $Cart = Cart::content();
                                        ?>
                                        @foreach($Cart as $item)
                                        
                                        <tr class="top-class">
                                            <td class="product-thumbnail">
                                                <a href="/delete-cart/{{$item->rowId}}" class="remove"><i class="fa-solid fa-xmark"></i></a>

                                                <a href="#">
                                                    <img src="{{asset ('client/img/shop/'.$item->options->image) }}" alt="item">
                                                </a>
                                            </td>
        
                                            <td class="product-name">
                                                <a href="products-details.html">{{$item->name}}</a>
                                            </td>
        
                                            <td class="product-price">
                                                <span class="unit-amount">{{ number_format($item->price)}}</span>
                                            </td>
        
                                            <td class="product-quantity">
                                                <div class="input-counter">
                                                    <span class="minus-btn"><i class="fa-solid fa-minus"></i></span>
                                                    <input name='quantity[]' type="text" value="{{$item->qty}}">
                                                    <span class="plus-btn"><i class="fa-solid fa-plus"></i></span>
                                                </div>
                                            </td>
                                            <input name='rowId[]' type="hidden" value="{{$item->rowId}}">
                                            <td class="product-subtotal">
                                                <span class="subtotal-amount"><?php echo number_format($item->price * $item->qty)  ?></span>
                                            </td>
                                        </tr>
                                        
                                        @endforeach
        
                                        
                                    </tbody>
                                </table>
                            </div>
        
                            
                        </form>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="cart-totals">
                            <h3>Cart Totals</h3>
    
                            <ul>
                                <li>Tổng tiền <span><?php  $subtotal=Cart::subtotal(0);
                            echo $subtotal ?></span></li>
                                <li>Phí bảo hiểm (1%)  <span><?php  $total=Cart::tax(0);
                            echo $total ?></span></li>

                                <li>Tổng thanh toán<span><?php  $total=Cart::total(0);
                            echo $total ?></span></li>
                            </ul>
    
                            <a href="/checkout" class="default-btn">
                                Thanh Toán
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection