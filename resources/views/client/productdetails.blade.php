@extends('layouts.client')
@section('content')
        <!-- Start Page Banner -->
        <!-- breadcrumb start -->
        <form action="/save-cart" method="post">
        <div class="breadcrumb">
            
            <div class="container">
                {{csrf_field()}}
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
                    {{-- @foreach( $AllCategory as  $key =>  $item ) --}}
                    <li>Products</li>
                    {{-- @endforeach --}}
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
                    @foreach( $ProductDetails as  $key => $item)
                    <li>{{ $item->product_name}}</li>
                    @endforeach
                </ul>
            </div>
        
        </div>
    
        <!-- breadcrumb end -->

        <main id="MainContent" class="content-for-layout">
            {{csrf_field()}}
            <div class="product-page mt-100">
                <div class="container">
                    @foreach( $ProductDetails as  $key => $item)
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="product-gallery product-gallery-vertical d-flex">
                                <div class="product-img-large">
                                    <div class="img-large-slider common-slider" data-slick='{
                                        "slidesToShow": 1, 
                                        "slidesToScroll": 1,
                                        "dots": false,
                                        "arrows": false,
                                        "asNavFor": ".img-thumb-slider"
                                    }'>
                                        <div class="img-large-wrapper">
                                            <a href="assets/img/products/bags/39.jpg" data-fancybox="gallery">
                                                <img src="{{asset ('client/img/shop/'.$item->product_img) }}" alt="img">
                                            </a>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="product-img-thumb">
                                    <div class="img-thumb-slider common-slider" data-vertical-slider="true" data-slick='{
                                        "slidesToShow": 5, 
                                        "slidesToScroll": 1,
                                        "dots": false,
                                        "arrows": true,
                                        "infinite": false,
                                        "speed": 300,
                                        "cssEase": "ease",
                                        "focusOnSelect": true,
                                        "swipeToSlide": true,
                                        "asNavFor": ".img-large-slider"
                                    }'>
                                        <div>
                                            <div class="img-thumb-wrapper">
                                                <img src="assets/img/products/bags/39.jpg" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activate-arrows show-arrows-always arrows-white d-none d-lg-flex justify-content-between mt-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="product-details ps-lg-4">
                                <div class="mb-3"><span class="product-availability">In Stock</span></div>
                                <h2 class="product-title mb-3">{{ $item->product_name}}</h2>
                                <div class="product-rating d-flex align-items-center mb-3">
                                    <span class="star-rating">
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#FFAE00"/>
                                        </svg>
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#FFAE00"/>
                                        </svg>
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#FFAE00"/>
                                        </svg>
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#FFAE00"/>
                                        </svg>
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                        </svg>                                            
                                    </span>
                                    <span class="rating-count ms-2">(22)</span>
                                </div>
                                <div class="product-price-wrapper mb-4">
                                    <span class="product-price regular-price">{{number_format($item->price)}}</span>
                                    <del class="product-price compare-price ms-2">{{number_format($item->price)}}</del>
                                </div>
                                <div class="product-sku product-meta mb-1">
                                    <strong class="label">
                                        <span>Status:</span> 
                                        @if($item->quantity !=0)
                                            <a href="#">In Stock</a>
                                        @else
                                            <a href="#">Out of Stock</a>
                                        @endif
                                    </strong>
                                    
                                </div>
                                <div class="product-vendor product-meta mb-3">
                                    <strong class="label">Product Code: </strong>{{$item->product_id}}
                                </div>

                                <div class="product-variant-wrapper">
                                    <div class="product-variant product-variant-other">
                                        <strong class="label mb-1 d-block">Size:</strong>
                                        
                                            <ul class="variant-list list-unstyled d-flex align-items-center flex-wrap">
                                                @foreach ($ProductSizes as  $key => $item)
                                                    <li class="variant-item">
                                                        <input type="radio" value="{{ $item->size }}" checked>
                                                        <label class="variant-label">{{ $item->size }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        
                                    </div>
                                </div>
                                <div class="misc d-flex align-items-end justify-content-between mt-4">
                                    <div class="quantity d-flex align-items-center justify-content-between">
                                    <button class="qty-btn dec-qty" id="minus"><img src="{{asset('client/img/icon/minus.svg')}}" alt="minus"></button>
                                        <input class="qty-input" type="number" name="qty" value="1" min="0">
                                        <button class="qty-btn inc-qty" id="plus"><img src="{{asset('client/img/icon/plus.svg')}}" alt="plus"></button>
                                    </div>
                                </div>

                                <form class="product-form" action="#">
                                    <div class="product-form-buttons d-flex align-items-center justify-content-between mt-4">
                                        <button type="submit" class="position-relative btn-atc btn-add-to-cart loader addToCartButton">ADD TO CART</button>
                                        <a href="/add-whishlist/{{$item->product_id}}" class="product-wishlist">
                                            <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z" fill="#00234D"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="buy-it-now-btn mt-2">
                                        <button type="submit" class="position-relative btn-atc btn-buyit-now buyItNowButton">BUY IT NOW</button>
                                    </div>
                                </form>                   

                                <div class="guaranteed-checkout">

                                <div class="share-area mt-4 d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- product tab start -->
            <div class="product-tab-section mt-100" data-aos="fade-up" data-aos-duration="700">
                <div class="container">
                    <div class="tab-list product-tab-list">
                        <nav class="nav product-tab-nav">
                            <a class="product-tab-link tab-link active" href="#pdescription" data-bs-toggle="tab">Description</a>
                            <a class="product-tab-link tab-link" href="#pshipping" data-bs-toggle="tab">Shipping & Returns</a>
                            <a class="product-tab-link tab-link" href="#pstyle" data-bs-toggle="tab">Style with</a>
                            <a class="product-tab-link tab-link" href="#preview" data-bs-toggle="tab">Comment</a>
                        </nav>
                    </div>
                    <div class="tab-content product-tab-content">
                        <div id="pdescription" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-lg-7 col-md-12 col-12">
                                    <div class="desc-content">
                                        <h4 class="heading_18 mb-3">What is lorem ipsum?</h4>
                                        <p class="text_16 mb-4">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12 col-12">
                                    <div class="desc-img">
                                        <img src="assets/img/product.jpg" alt="img">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="desc-content mt-4">
                                        <p class="text_16">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="pshipping" class="tab-pane fade">
                            <div class="desc-content">
                                <h4 class="heading_18 mb-3">Returns within the European Union</h4>
                                <p class="text_16 mb-4">The European law states that when an order is being returned, it is mandatory for the company to refund the product price and shipping costs charged for the original shipment. Meaning: one shipping fee is paid by us.</p>
                                <p class="text_16 mb-4">Standard Shipping: If you placed an order using "standard shipping" and you want to return it, you will be refunded the product price and initial shipping costs. However, the return shipping costs will be paid by you.</p>
                                <p class="text_16">Free Shipping: If you placed an order using "free shipping" and you want to return it, you will be refunded the product price, but since we paid for the initial shipping, you will pay for the return.</p>
                            </div>
                        </div>
                        <div id="pstyle" class="tab-pane fade">
                            <div class="desc-content">
                                <h4 class="heading_18 mb-3">Style with</h4>
                                <p class="text_16 mb-4">Please also bear in mind that shipping goods back and forth generates greenhouse gases that are accelerating climate change. We encourage you to choose your items carefully to avoid unnecessary return shipments.</p>
                                <p class="text_16 mb-4">You have to pay for return shipping if you want to exchange your product for another size or the package is returned because it has not been picked up at the post office.</p>
                            </div>
                        </div>
                        <div id="preview" class="tab-pane fade">
                            <div class="review-area accordion-parent">
                                <h4 class="heading_18 mb-3">Customer Reviews</h4>
                                <div class="review-header d-flex justify-content-between align-items-center">
                                    <p class="text_16">No reviews yet.</p>
                                    <button class="text_14 bg-transparent text-decoration-underline write-btn" type="button">Write a review</button>
                                </div>
                                <div class="review-form-area accordion-child">
                                    <form action="#">
                                        <fieldset>
                                            <label class="label">Full Name</label>
                                            <input type="text" placeholder="Enter your name" />
                                        </fieldset>
                                        <fieldset>
                                            <label class="label">Email</label>
                                            <input type="email" placeholder="john.smith@example.com" />
                                        </fieldset>
                                        <fieldset>
                                            <label class="label">Rating</label>
                                            <div class="star-rating">
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                                </svg>
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                                </svg>
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                                </svg>
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                                </svg>
                                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                                </svg>                                            
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <label class="label">Review Title</label>
                                            <input type="text" placeholder="Give your review a title" />
                                        </fieldset>
                                        <fieldset>
                                            <label class="label">Body of Review (2000)</label>
                                            <textarea cols="30" rows="10" placeholder="Write your comments here"></textarea>
                                        </fieldset>
                
                                        <button type="submit" class="position-relative review-submit-btn">SUBMIT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product tab end -->
            
            <!-- you may also like start -->
            <div class="featured-collection-section mt-100 home-section overflow-hidden">
                <div class="container">
                    <div class="section-header">
                        <h2 class="section-heading">You may also like</h2>
                    </div>
                    <div class="product-container position-relative">
                        <div class="common-slider" data-slick='{
                        "slidesToShow": 4, 
                        "slidesToScroll": 1,
                        "dots": false,
                        "arrows": true,
                        "responsive": [
                        {
                            "breakpoint": 1281,
                            "settings": {
                            "slidesToShow": 3
                            }
                        },
                        {
                            "breakpoint": 768,
                            "settings": {
                            "slidesToShow": 2
                            }
                        }
                        ]
                    }'>
                    @foreach( $RelateProduct as $key => $item )
                    <div class="new-item" data-aos="fade-up" data-aos-duration="300">
                        <div class="product-card">
                            <div class="product-card-img">
                                <a class="hover-switch" href="/product-details/{{ $item->product_id}}">
                                    {{-- <img class="secondary-img" src="{{asset ('client/img/shop/'.$item->product_img)}}"
                                        alt="product-img"> --}}
                                    <img class="primary-img" src="{{asset ('client/img/shop/'.$item->product_img)}}"
                                        alt="product-img">
                                </a>

                                <div class="product-card-action product-card-action-2">
                                    <a href="#quickview-modal" class="quickview-btn btn-primary"
                                        data-bs-toggle="modal">QUICKVIEW</a>
                                    <a href="#" class="addtocart-btn btn-primary">ADD TO CART</a>
                                </div>

                                <a href="wishlist.html" class="wishlist-btn card-wishlist">
                                    <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                            fill="black" />
                                    </svg>
                                </a>
                            </div>
                            <div class="product-card-details text-center">
                                <h3 class="product-card-title"><a href="/product-details/{{ $item->product_id}}">{{$item->product_name}}</a>
                                </h3>
                                <div class="product-card-price">
                                    <span class="card-price-regular">{{number_format($item->price)}}</span>
                                    {{-- <span class="card-price-compare text-decoration-line-through">$1759</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        </div>
                        <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
                    </div>
                    
                </div>
            </div>
            <!-- you may also lik end -->
        </main>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Lấy các nút bằng cách sử dụng class hoặc id
            const addToCartButton = document.querySelector(".addToCartButton");
            const buyItNowButton = document.querySelector(".buyItNowButton");
        
            // Thêm sự kiện click cho nút "ADD TO CART"
            addToCartButton.addEventListener("click", function (event) {
                event.preventDefault(); 
                window.location.href = "/add-one-cart/{{$item->product_id}}";
            });
        
            // Thêm sự kiện click cho nút "BUY IT NOW"
            buyItNowButton.addEventListener("click", function (event) {
                event.preventDefault(); // Ngăn chặn mặc định khi click
                // Thực hiện chức năng BUY IT NOW ở đây
                // Ví dụ: gửi yêu cầu AJAX hoặc điều hướng trang
            });
        });
        </script>
        
        @endsection