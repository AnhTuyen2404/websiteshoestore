@extends('layouts.client')
        @section('content')
        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2>Checkout</h2>

                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start Checkout Area -->
		<section class="checkout-area ptb-50">
            <div class="container">
                <form action="/payment" method="post">
                        {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <div class="user-actions">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                <span>Bạn đã có tài khoản? <a href="#">Đăng nhập</a></span>
                            </div>

                            <div class="user-actions-2">
                            <i class="fa-regular fa-address-card"></i>
                                <span>Bạn là khách hàng mới? <a href="#">Đăng ký</a></span>
                            </div>
                            
                            <div class="billing-details">
                                <h3 class="title">Thông tin thanh toán</h3>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Họ  <span class="required">*</span></label>
                                            <input name="ho" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Tên <span class="required">*</span></label>
                                            <input name="ten" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Email<span class="required">*</span></label>
                                            <input name="email" type="email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Số điện thoại <span class="required">*</span></label>
                                            <input name="sdt" type="text" class="form-control">
                                        </div>
                                    </div>

                                  

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Số nhà <span class="required">*</span></label>
                                            <input name="sonha" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Tỉnh / Thành Phố <span class="required">*</span></label>
                                            <input name="tinh" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Quận / Huyện<span class="required">*</span></label>
                                            <input name="huyen" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Xã / Phường <span class="required">*</span></label>
                                            <input name="xa" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="ghichu" name="notes" id="notes" cols="30" rows="5" placeholder="Ghi chú" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="order-details">
                                <div class="cart-totals">
                                    <h3>Giỏ Hàng</h3>
            
                                    <ul>
                                <li>Tổng tiền <span><?php  $subtotal=Cart::subtotal(0);
                            echo $subtotal ?></span></li>
                                <li>Phí bảo hiểm (1%)  <span><?php  $total=Cart::tax(0);
                            echo $total ?></span></li>

                                <li>Tổng thanh toán<span><?php  $total=Cart::subtotal(0);
                            echo $total ?></span></li>
                            </ul>
            
                                    
                                </div>

                                <div class="payment-box">
                                    <h3 class="title">Hình thức thanh toán</h3>

                                    <div class="payment-method">
                                        <p>
                                            <input type="radio" id="direct-bank-transfer" name="radio-group"  checked>
                                            <input name="payment" value="Thanh toán khi nhận hàng" type="hidden">
                                            <label for="direct-bank-transfer">Thanh toán khi nhận hàng (COD)</label>
                                            Thanh toán khi nhận hàng là một phương thức thanh toán an toàn và tiện lợi. Nó cho phép bạn xem và kiểm tra hàng hóa trước khi thanh toán, vì vậy bạn có thể chắc chắn rằng bạn đang nhận được những gì mình đã đặt hàng.
                                        </p>
                                    </div>
                                    <button type="submit" class="default-btn">
                                        Đặt Hàng
                                        <span></span>
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        @endsection