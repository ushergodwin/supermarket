@extends('partials.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card card-body shadow bg-light">
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <img src="{{ asset('imgs/site/locator3.jpg') }} " class="rounded img-responsive"/>
                        <h4>Dear {{ session('guest')->fname  . " " . session('guest')->lname }},</h4>
                        <h5 class="text-danger">This is to inform you that your account ({{session('guest')->supermarket}}) expired on {{date("D d M, Y", strtotime(session('guest')->expiry_date))}} and can not be accessed.</h5>
                        <h5 class="text-success">Please extend your subscription to enjoy services of 
                            YOSIL.
                        </h5>
                        <h6 class="text-info">King regards, 
                            <br/>
                            <small>YOSIL TEAM</small>
                        </h6> 
                        <a href="/">Go Back To Login</a>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <h4>Activate my account?</h4>
                        <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay" id="activateAccount" data-url="{{ url('supermarket/account/payment')}}">
                            <input type="hidden" name="public_key" value="FLWPUBK_TEST-SANDBOXDEMOKEY-X" />
                            <input type="hidden" name="tx_ref" value="{{ uniqid('YOSIL-') }}" />
                            <div class="form-group">
                                <label for="email" class="w-100">
                                    Email
                                    <input type="email" id="email" class="form-control" name="customer[email]" value="{{ session('guest')->email }}" readonly/>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="name" class="w-100">
                                    Name
                                    <input type="text" id="name" class="form-control" value="{{ session('guest')->fname . " " . session('guest')->lname }}" name="customer[name]" readonly/>
                                </label>
                            </div>
                            <div class="form-group">
                                Phone Number
                                <label for="phone_number" class="w-100">
                                    <input type="text" id="phone_no" name="customer[phone_number]" class="form-control" value="{{ session('guest')->phone_no }}" required/>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="amount" class="w-100">
                                    Amount
                                    <input type="number" id="amount" class="form-control" name="amount" value="{{ session('guest')->fee }}" required/>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="currency" value="UGX" />
                                <input type="hidden" name="meta[token]" value="{{ random_int(0, 1000) }}" />
                                <input type="hidden" name="redirect_url" value="http://yosil.com/supermarket/account/activate"/>
                                <button type="button" class="btn btn-success" id="activate-btn">
                                    <i class='fas fa-check-circle'></i> Activate Account
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="response"></div>
                </div>

            </div>
            @if (isset($_SESSION['failed']))
                <div id="trans-f-model" class="modal fade bg-danger">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title"><i class="fa fa-exclamation-triangle text-warning"></i> &nbsp;Transaction Failed</h3>
                            </div>
                            <div class="modal-body">
                                <h4>{{ session('failed') }}</h4>
                                @php
                                    unset($_SESSION['failed'])
                                @endphp
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                @section('scripts')
                    <script>
                        $("#trans-f-model").modal('show')
                    </script>
                @endsection
            @endif
            @if (isset($_SESSION['success']))
                <div id="trans-s-model" class="modal fade bg-success">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title"><i class="fa fa-check-circle text-success"></i> &nbsp;Transaction Successfull</h3>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-success">{{ session('success') }}</h4>
                                @php
                                    unset($_SESSION['success']);
                                    unset($_SESSION['guest']);
                                @endphp
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" 
                                data-dismiss="modal"
                                onclick="window.location.href = window.location.origin">OK, TAKE ME TO LOGIN</button>
                            </div>
                        </div>
                    </div>
                </div>
                @section('scripts')
                    <script>
                        $("#trans-s-model").modal('show')
                    </script>
                @endsection
            @endif
        </div>
    </div> 
@endsection