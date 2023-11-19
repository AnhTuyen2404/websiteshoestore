@extends('layouts.client')
@section('content')
@include('sweetalert::alert')
        <!-- Start Page Banner -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Blog Details</h2>

                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start Blog Details Area -->
        <section class="blog-details-area ptb-50">
            <div class="container">
                <div class="row">
                    @foreach($GetBlogDetails as $key=> $item)
                    <div class="col-lg-12 col-md-12">
                        <div class="blog-details-desc">
                            <div class="article-image">
                                <img width="100%" src="{{asset ('client/img/blog/'.$item->blog_img)}}" alt="image">
                            </div>

                            <div class="article-content">
                                <div class="details-content">
                                    <h3>
                                        <a href="blog-details.html">{{$item->blog_title}}</a>
                                    </h3>
                                    <div class="post-meta">
                                        <a href="#">{{$item->staff_name}}</a> / {{$item->create_date}}
                                    </div>
                                    <p>{{$item->blog_content}}</p>

                                    
                                </div>

                             

                             
                            </div>

                            <div class="article-footer">
                                <div class="article-tags">
                                    <span>
                                    <i class="fa-solid fa-mobile-screen-button"></i></i>
                                    </span>
                                    <a href="#">Electronics</a>,
                                    <a href="#">Business</a>,
                                    <a href="#">E-commerce</a>
                                </div>

                                <div class="article-share">
                                    <ul class="social">
                                        <li><span>Share:</span></li>
                                        <li>
                                            <a href="https://www.facebook.com/photo.php?fbid=648353029001824&set=t.100014813981579&type=3" target="_blank">
                                            <i class="fa-brands fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/photo.php?fbid=648353029001824&set=t.100014813981579&type=3" target="_blank">
                                            <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/photo.php?fbid=648353029001824&set=t.100014813981579&type=3" target="_blank">
                                            <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Blog Details Area -->


        @endsection