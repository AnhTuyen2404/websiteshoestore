@extends('layouts.client')
@section('content')
@include('sweetalert::alert')
<main id="MainContent" class="content-for-layout">
    <div class="checkout-page mt-100">
        <div class="container">
            <div class="checkout-page-wrapper">
                <div class="row">
                    <div class="col-xl-19 col-lg-18 col-md-20 col-30">
                        <div class="section-header mb-3">
                            <h2 class="section-heading">Profile</h2>
                        </div>
                        @foreach($data_customer as $key => $data)
                        <div class="shipping-address-area">
                            <div class="shipping-address-form-wrapper">
                                <form action="update-profile" method="post" class="shipping-address-form common-form">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <fieldset>
                                                <label class="label">Email address</label>
                                                <input type="email"  value="{{ $data->customer_email }}" disabled readonly/>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <fieldset>
                                                <label class="label">Name</label>
                                                <input type="text"  value="{{ $data->customer_name }}" name="name" disabled/>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <fieldset>
                                                <label class="label">Phone number</label>
                                                <input type="text"  value="{{ $data->customer_phone }}" name="phone" disabled/>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <fieldset>
                                                <label class="label">Address 1</label>
                                                <input type="text"  value="{{ $data->customer_address }}" name="address" disabled/>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="shipping-address-area billing-area">
                                        <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                            <button type="submit" class="checkout-page-btn minicart-btn btn-secondary save-profile-btn" style="display: none;">SAVE</button>
                                            <a href="#" class="checkout-page-btn minicart-btn btn-secondary edit-profile-btn">EDIT PROFILE</a>
                                            <a href="#" class="checkout-page-btn minicart-btn btn-primary">CHANGE YOUR PASSWORD</a>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>

                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    const editProfileBtn = document.querySelector('.edit-profile-btn');
    const saveProfileBtn = document.querySelector('.save-profile-btn');
    const inputs = document.querySelectorAll('.shipping-address-form input, .shipping-address-form select');

    editProfileBtn.addEventListener('click', () => {
        inputs.forEach(input => input.removeAttribute('disabled'));
        editProfileBtn.style.display = 'none';
        saveProfileBtn.style.display = 'block';
    });
</script>
@endsection
