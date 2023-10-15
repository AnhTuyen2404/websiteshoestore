@extends('layouts.client')
        @section('content')
             <!-- Start Page Banner -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Wishlist</h2>

                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start Wishlist Area -->
		<section class="wishlist-area ptb-50">
            <div class="container">
                <div class="wishlist-table table-responsive">
                    <div class="wishlist-title">
                        <h2>My  Wishlist</h2>
                    </div>

                    <table class="table table-bordered">
                        <tbody>
                            @foreach( $GetWhishlist as  $key =>  $item)
                            <tr>
                                <td class="product-remove">
                                    <a href="/delete-whishlist/{{ $item->product_id}}" class="remove">
                                    <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </td>

                                <td class="product-thumbnail">
                                    <a href="#">
                                        <img src="{{asset ('client/img/shop/'.$item->product_img) }}" alt="item">
                                    </a>
                                </td>

                                <td class="product-name">
                                    <a href="products-details.html">{{ $item->product_name}}</a>
                                </td>

                                <td class="product-price">
                                    <span class="unit-amount">{{ number_format( $item->price)}}</span>
                                </td>

                                <td class="product-stock">
                                    <span class="stock">In Stock</span>
                                </td>

                                <td class="product-btn">
                                    <a href="/add-one-cart/{{$item->product_id}}" class="default-btn">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                        Add to Cart
                                        <span></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- End Wishlist Area -->
        @endsection