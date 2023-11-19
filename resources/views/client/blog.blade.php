@extends('layouts.client')
@section('content')
@include('sweetalert::alert')
        <!-- Start Page Banner -->
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Blog</h2>

                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start Blog Area -->
        <section class="blog-area bg-color pt-50 pb-50">
            <div class="container">
                <div class="row">
                    @foreach( $GetBlog as  $key =>  $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a href="/blog-details/{{$item->blog_id}}"><img src="{{asset ('client/img/blog/'.$item->blog_img)}}" alt="image"></a>
                            </div>

                            <div class="blog-content">
                                <h3>
                                    <a href="/blog-details/{{$item->blog_id}}">{{$item->blog_title}}</a>
                                </h3>
                                <div class="post-meta">
                                    <a href="#">{{$item->staff_name}}</a> / {{$item->create_date}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
        <!-- End Blog Area -->
        @endsection