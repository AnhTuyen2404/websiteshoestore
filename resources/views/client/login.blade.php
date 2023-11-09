@extends('layouts.client')
@section('content')
@include('sweetalert::alert')
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
                    <li>Login</li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb end -->
        
        <main id="MainContent" class="content-for-layout">
            <div class="login-page mt-100">
                <div class="container">
                    <form action="login" method="post" class="login-form common-form mx-auto">
                        {{csrf_field()}}
                        <div class="section-header mb-3">
                            <h2 class="section-heading text-center">Login</h2> 
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <fieldset>
                                    <label class="label" >Email address</label>
                                    <input type="email" name="email"/>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <fieldset>
                                    
                                    <label class="label" >Password</label>
                                    <input type="password" name="password" id="password"/>
                                    <i class="fa-regular fa-eye-slash" id="togglePassword" onclick="togglePasswordVisibility()"></i>                      
                                </fieldset>
                            </div>
                            <div class="col-12 mt-3">
                                <a href="forget-password" class="text_14 d-block">Forgot your password?</a>
                                <button type="submit" class="btn-primary d-block mt-4 btn-signin">SIGN IN</button>
                                <a href="show-register" class="btn-secondary mt-2 btn-signin">CREATE AN ACCOUNT</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </main>
        <!-- End Login Area -->
        <script>
            function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.getElementById("togglePassword");

                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    toggleIcon.classList.remove("fa-eye-slash");
                    toggleIcon.classList.add("fa-eye");
                } else {
                    passwordField.type = "password";
                    toggleIcon.classList.remove("fa-eye");
                    toggleIcon.classList.add("fa-eye-slash");
                }
                }           
        </script>
@endsection
        