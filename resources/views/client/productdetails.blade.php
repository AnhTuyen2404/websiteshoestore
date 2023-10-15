@extends('layouts.client')
        @section('content')

       

        <!-- Start Page Banner -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Products Details</h2>

                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Products Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start Products Details Area -->
        <section class="products-details-area ptb-50">
            <form action="/save-cart" method="post">
                {{csrf_field()}}
            <div class="container">
                @foreach( $ProductDetails as  $key => $item)
                <div class="products-details-desc">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="main-products-image">
                                

                                <div class="slider slider-for">
                                <div><img width='650' src="{{asset ('client/img/shop/'.$item->product_img) }}" alt="image"></div>

                                   
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="product-content content-two">
                                <h3>{{ $item->product_name}}</h3>

                                <!-- <div class="product-review">
                                    <div class="rating">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                    </div>
                                </div> -->

                                <div class="price">
                                    <span class="old-price">{{number_format($item->price)}}</span>
                                    <span class="new-price">{{number_format($item->price)}}</span>
                                </div>
                                <p>{{$item->product_status}}</p>

                                <ul class="products-info">
                                    <li><span>Trạng thái :</span> 
                                    @if($item->quantity !=0)
                                        <a href="#">Còn Hàng</a>
                                    @else
                                    <a href="#">Hết Hàng</a>
                                    @endif
                                    </li>
                                    <li><span>Mã SP:</span> <a href="#">{{$item->product_id}}</a></li>
                                </ul>

                                <div class="products-color-switch">
                                    <p class="available-color"><span>Color</span> : 
                                        <a href="#" style="background: #a53c43;"></a>
                                        <a href="#" style="background: #192861;"></a>
                                        <a href="#" style="background: #c58a84;"></a>
                                        <a href="#" style="background: #ecc305;"></a>
                                        <a href="#" style="background: #000000;"></a>
                                        <a href="#" style="background: #808080;"></a>
                                    </p>
                                </div>

                                <div class="product-quantities">
                                    <span>Số lượng:</span>

                                    <div class="input-counter">
                                        <span class="minus-btn">
                                        <i class="fa-solid fa-minus"></i>
                                        </span>
                                        
                                        <input name='quantity' type="text" value="1">
                                        <span class="plus-btn">
                                        <i class="fa-solid fa-plus"></i>
                                        </span>
                                    </div>
                                </div>
                                <input name='product_id' type="hidden" value="{{$item->product_id}}">

                                <div class="product-add-to-cart">
                                    <button type="submit" class="default-btn">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                        Thêm vào giỏ hàng
                                        <span></span>
                                    </button>
                                </div>
    
                                <div class="products-share">
                                    <ul class="social">
                                        <li><span>Share:</span></li>
                                        <li>
                                            <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            
            </div>
            </form>
        </section>
        <!-- End Products Details Area -->

        <!-- Start Arrivals Products Area -->
        <section class="arrivals-products-area pt-50 pb-20">
            <div class="container">
                <div class="section-title">
                    <h2>Sản phẩm liên quan</h2>
                </div>

                <div class="row">
                    @foreach( $RelateProduct as $key => $item )
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-arrivals-products">
                            <div class="arrivals-products-image">
                                <a href="/product-details/{{ $item->product_id}}"><img src="{{asset ('client/img/shop/'.$item->product_img) }}" alt="image"></a>
                                <div class="tag">New</div>
                                <ul class="arrivals-action">
                                    <li>
                                        <a href="cart.html">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">
                                        <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>

                            <div class="arrivals-products-content">
                                <h3>
                                    <a href="/product-details/{{ $item->product_id}}">{{$item->product_name}}</a>
                                </h3>
                                <!-- <ul class="rating">
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                    <li><i class='bx bxs-star'></i></li>
                                </ul> -->
                                <span>{{number_format($item->price)}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
        <!-- End Arrivals Products Area -->

        <!-- Start Support Area -->
        <section class="support-area">
            <div class="container">
                <div class="support-inner-box">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="single-support">
                                <div class="icon">
                                <i class="fa-solid fa-truck-fast"></i>
                                </div>

                                <div class="support-content">
                                    <h3>Miễn phí vận chuyển</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="single-support">
                                <div class="icon">
                                <i class="fa-solid fa-rotate-left"></i>
                                </div>

                                <div class="support-content">
                                    <h3>Đổi trả 30 ngày</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="single-support">
                                <div class="icon">
                                <i class="fa-solid fa-shield-halved"></i>
                                </div>

                                <div class="support-content">
                                    <h3>100% Bảo mật thanh toán</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="single-support">
                                <div class="icon">
                                <i class="fa-solid fa-headset"></i>
                                </div>

                                <div class="support-content">
                                    <h3>24/7 chăm sóc khách hàng</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Support Area -->

        @endsection