@extends('layouts.client')
        @section('content')

       
        <!-- Start Middle Header Area -->
        <div class="middle-header-area bg-color">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="middle-header-logo">
                            <a href="index.html">
                                <!-- <img src="{{asset ('client/img/logo-2.png')}}" alt="image"> -->
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="middle-header-search">
                            <form>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select>
                                                <option>All Category</option>
                                                @foreach( $AllCategory as  $key =>  $item )
                                                <option value="1">{{$item->category_name}}</option>
                                                @endforeach
                                            </select>	
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="search-box">
                                            <input type="text" class="form-control" placeholder="Search product...">
                                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <ul class="middle-header-optional">
                            <li><a href="/whishlist"><i class="fa-regular fa-heart"></i></a></li>
                            <li>
                                <a href="/show-cart"><i class="fa-solid fa-cart-shopping"></i></i><span><?php echo Cart::count() ?></span></a>
                            </li>
                            <li><?php echo Cart::subtotal(0) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Middle Header Area -->

        

        <!-- Start Page Banner -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Shop Left Sidebar</h2>

                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Shop Left Sidebar</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start Shop Area -->
        <section class="shop-area bg-ffffff pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <aside class="widget-area">
                            <div class="widget widget_search">
                                <form class="search-form">
                                    <label>
                                        <span class="screen-reader-text">Search for:</span>
                                        <input type="search" class="search-field" placeholder="Search...">
                                    </label>
                                    <button type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
                            </div>
                    
                            <div class="widget widget_categories">
                                <h3 class="widget-title">Categories</h3>
    
                                <ul class="categories">
                                <li>
                                    <a href="/shop" class="nav-link"><i class="fa-solid fa-plus"></i>Tất cả </a>
                                </li>
                                @foreach( $AllCategory as  $key =>  $item )
                                    <li>
                                        <a href="/category/{{ $item->category_id }}" class="nav-link">
                                        <i class="fa-solid fa-plus"></i>
                                           {{$item->category_name}}
                                        </a>
                                    </li>
                                @endforeach
                                    
                                </ul>
                            </div>
                            
                          


                            <div class="widget widget_best-seller-products">
                                <h3 class="widget-title">Best Seller</h3>
                                @foreach($Get3Product as $key => $item)
                                <article class="item">
                                    <a href="/product-details/{{$item->product_id}}" class="thumb">
                                        <span class="fullimage cover bg1" role="img" style="background-image: url({{asset ('client/img/shop/'.$item->product_img) }})"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall">
                                            <a href="/product-details/{{$item->product_id}}">{{  $item->product_name}}</a>
                                        </h4>
                                        <span> {{date('d-m-Y', strtotime($item->create_date)) }}</span>
                                        <!-- <ul class="rating">
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                        </ul> -->
                                    </div>
                                </article>
                                @endforeach

                                
                            </div>

                            <div class="widget widget_arrival">
                                <div class="special-products-inner" style="background-image: url({{asset ('client/img/special-products/special-products-bg.jpg')}});">
                                    <div class="inner-content">
                                        <span>New Arrival</span>
                                        <h3>Special Laptop</h3>
                                        <p>Stock is Limited</p>
                
                                        <div class="inner-btn">
                                            <a href="#" class="default-btn">
                                                <i class="flaticon-shopping-cart"></i>
                                                Shop Now
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    
                    <div class="col-lg-8 col-md-12">
                        <div class="products-filter-options">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-4">
                                    <div class="d-lg-flex d-md-flex align-items-center">
    
                                        <span class="sub-title d-none d-lg-block d-md-block">View:</span>
    
                                        <div class="view-list-row d-none d-lg-block d-md-block">
                                            <div class="view-column">
                                                <a href="#" class="icon-view-two">
                                                    <span></span>
                                                    <span></span>
                                                </a>
        
                                                <a href="#" class="icon-view-three active">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-4 col-md-4">
                                    <p>Showing 1 – 18 of 100</p>
                                </div>
        
                                <div class="col-lg-4 col-md-4">
                                    <div class="products-ordering-list">
                                        <select>
                                            <option>Sort by price: low to high</option>
                                            <option>Default sorting</option>
                                            <option>Sort by popularity</option>
                                            <option>Sort by average rating</option>
                                            <option>Sort by latest</option>
                                            <option>Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
        
                        <div id="products-collections-filter" class="row">
                        @foreach( $AllProduct as  $key =>  $item )
                            <div class="col-lg-4 col-sm-6">
                                
                            
                                <div class="single-shop-products">
                                    <div class="shop-products-image">
                                        <a href="/product-details/{{ $item->product_id}}"><img src="{{asset ('client/img/shop/'.$item->product_img) }}" alt="image"></a>
                                        <div class="tag">New</div>
                                        <ul class="shop-action">
                                            <li>
                                                <a href="/add-one-cart/{{$item->product_id}}">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/add-whishlist/{{$item->product_id}}">
                                                <i class="fa-regular fa-heart"></i>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="/product-details/{{ $item->product_id}}"  data-bs-target="#productsQuickView"><i class="fa-regular fa-eye"></i></i></a>
                                            </li>
                                        </ul>
                                    </div>
        
                                    <div class="shop-products-content">
                                        <h3>
                                            <a href="products-details.html">{{$item->product_name}}</a>
                                        </h3>
                                        <!-- <ul class="rating">
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                            <li><i class='bx bxs-star'></i></li>
                                        </ul> -->
                                        <span>{{number_format($item->price) }}</span>
                                    </div>
                                </div>
                                
                            </div>
                            @endforeach
        
                            
        
        
                           
        
                            
        
                         
        
                            
        
                           
        
                            
        
                            
        
                            
        
                           
        
                            
        
                            
        
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Shop Area -->

       <!-- Start Partner Area -->
       <div class="partner-area ptb-50">
            <div class="container">
                <div class="partner-slider owl-carousel owl-theme">
                    <div class="partner-item">
                        <a href="#">
                            <img src="{{asset ('client/img/partner/partner-1.png')}}" alt="image">
                        </a>
                    </div>

                    <div class="partner-item">
                        <a href="#">
                            <img src="{{asset ('client/img/partner/partner-2.png')}}" alt="image">
                        </a>
                    </div>

                    <div class="partner-item">
                        <a href="#">
                        <img src="{{asset ('client/img/partner/partner-3.png')}}" alt="image">
                        </a>
                    </div>

                    <div class="partner-item">
                        <a href="#">
                            <img src="{{asset ('client/img/partner/partner-4.png')}}" alt="image">
                        </a>
                    </div>

                    <div class="partner-item">
                        <a href="#">
                            <img src="{{asset ('client/img/partner/partner-5.png')}}" alt="image">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Partner Area -->
        @endsection