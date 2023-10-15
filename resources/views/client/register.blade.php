@extends('layouts.client')
        @section('content')
        <style>
            :root {
                --primary-color: #00234D;
                --secondary-color: #F76B6A;
    
                --btn-primary-border-radius: 0.25rem;
                --btn-primary-color: #fff;
                --btn-primary-background-color: #00234D;
                --btn-primary-border-color: #00234D;
                --btn-primary-hover-color: #fff;
                --btn-primary-background-hover-color: #00234D;
                --btn-primary-border-hover-color: #00234D;
                --btn-primary-font-weight: 500;
    
                --btn-secondary-border-radius: 0.25rem;
                --btn-secondary-color: #00234D;
                --btn-secondary-background-color: transparent;
                --btn-secondary-border-color: #00234D;
                --btn-secondary-hover-color: #fff;
                --btn-secondary-background-hover-color: #00234D;
                --btn-secondary-border-hover-color: #00234D;
                --btn-secondary-font-weight: 500;
    
                --heading-color: #000;
                --heading-font-family: 'Poppins', sans-serif;
                --heading-font-weight: 700;
    
                --title-color: #000;
                --title-font-family: 'Poppins', sans-serif;
                --title-font-weight: 400;
    
                --body-color: #000;
                --body-background-color: #fff;
                --body-font-family: 'Poppins', sans-serif;
                --body-font-size: 14px;
                --body-font-weight: 400;
    
                --section-heading-color: #000;
                --section-heading-font-family: 'Poppins', sans-serif;
                --section-heading-font-size: 48px;
                --section-heading-font-weight: 600;
    
                --section-subheading-color: #000;
                --section-subheading-font-family: 'Poppins', sans-serif;
                --section-subheading-font-size: 16px;
                --section-subheading-font-weight: 400;
            }
        </style>
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Register</h2>

                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Register</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start Register Area -->
        <section class="register-area ptb-50">
            <div class="container">
                <div class="register-form">
                    <h2>Đăng Ký</h2>

                    <form action="register" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input name="phone" type="text" class="form-control" placeholder="Phone">
                        </div>

                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>


                        <button type="submit">Đăng Ký</button>
                    </form>

                    <div class="important-text">
                        <p>Bạn đã có tài khoản? <a href="show-login">Đăng nhập!</a></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb start -->
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
                    <li>Register</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->

        <main id="MainContent" class="content-for-layout">
            <div class="login-page mt-100">
                <div class="container">
                    <form action="register" method="POST" class="login-form common-form mx-auto">
                        {{csrf_field()}}
                        <div class="section-header mb-3">
                            <h2 class="section-heading text-center">Register</h2>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <fieldset>
                                    <label class="label">First name</label>
                                    <input type="text" />
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <fieldset>
                                    <label class="label">Last name</label>
                                    <input type="text" />
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <fieldset>
                                    <label class="label">Email address</label>
                                    <input type="email" />
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <fieldset>
                                    <label class="label">Password</label>
                                    <input type="password" />
                                </fieldset>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn-primary d-block mt-3 btn-signin">CREATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </main>
        <!-- End Register Area -->
        @endsection