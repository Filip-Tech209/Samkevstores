<!DOCTYPE html>
<html lang="zxx">

    @include('client.lib.head')

<body>
    
    @if(session('success'))
        <div id="toast-success" class="toast" data-message="{{ session('success') }}">
            <div class="toast-icon">&#10003;</div> <!-- Checkmark icon -->
            <div class="toast-message">{{ session('success') }}</div>
        </div>
    @endif

    @if(session('error'))
        <div id="toast-error" class="toast" data-message="{{ session('error') }}">
            <div class="toast-icon">&#9888;</div> <!-- Warning icon -->
            <div class="toast-message">{{ session('error') }}</div>
        </div>
    @endif

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row" style="display: flex; justify-content: center; align-items: center; ;">
                <div class="col-lg-4">
                    <div class="contact__form__title">
                        <h2>Order Summary</h2>
                    </div>
                    <div class="payment-details mt-4" id="stripe-details">
                        <div class="checkout__order"> 
                            <ul>
                            @if($cartItems->isEmpty())
                                <p>No items in your cart.</p>
                                <div class="checkout__order__total">Total <span>AED 0.00</span></div>
                            @else
                                <ul>
                                    <li>Name:<span>{{$user->firstname}} {{$order->lastname}}</span></li>
                                    <li>Email:<span style="font-size:14px">{{$order->email}} </span></li>
                                    <li>Contact:<span style="font-size:14px">{{$order->contact_number}} </span></li>
                                    <li>Number of Items:<span style="font-size:14px">{{$quantity->quantity}} </span></li>
                                    <li>Country:<span style="font-size:14px">{{$order->country}} </span></li>
                                    <li>Location:<span style="font-size:14px">{{$order->shipping_address}} </span></li>
                                    <li>Order Date:<span style="font-size:14px">{{$order->created_at->format('d/M/Y')}} </span></li>
                                </ul>
                                <div >
                                    <li>Tax:<span style="font-size:14px">AED {{ number_format($tax, 2) }} </span></li>
                                    <li>Total Amout To pay<span style="font-size:14px">AED {{ number_format($totalCartPrice, 2) }} </span></li>
                                </div>
                            @endif
                            <style>
                                span{
                                    color:gray;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact__form__title">
                        <h2>Fill Card Details</h2>
                    </div>
                    <form id="paymentForm" action="{{ route('processPayment', ['orderId' => $order->id]) }}" method="POST">
                        @csrf
                        <div class="payment-options d-flex align-items-center justify-content-between">
                            <!-- Stripe -->
                            <div class="payment-option">
                                <input type="radio" id="payment-stripe" name="payment_method" value="stripe" checked>
                                <label for="payment-stripe">
                                    <img src="{{ asset('staticimages/stripe-logo.png') }}" alt="Stripe" class="payment-logo">
                                </label>
                            </div>
                            
                            <!-- PayPal -->
                            <div class="payment-option">
                                <input type="radio" id="payment-paypal" name="payment_method" value="paypal" disabled>
                                <label for="payment-paypal">
                                    <img src="{{ asset('staticimages/paypal-logo.png') }}" alt="PayPal" class="payment-logo">
                                </label>
                            </div>
                            
                            <!-- Visa -->
                            <div class="payment-option">
                                <input type="radio" id="payment-visa" name="payment_method" value="visa" disabled>
                                <label for="payment-visa">
                                    <img src="{{ asset('staticimages/visa-logo.png') }}" alt="Visa" class="payment-logo">
                                </label>
                            </div>
                        </div>

                        <!-- Stripe Details -->
                        <div class="payment-details mt-4" id="stripe-details">
                            <p>Pay securely using your credit or debit card via Stripe.</p>
                            <input type="text" name="stripe_card_holder_name" placeholder="Cardholder Name" required>
                            <input type="text" name="stripe_card_number" placeholder="Card Number" required>
                            <input type="text" name="stripe_expiry_date" placeholder="MM/YY" required>
                            <input type="text" name="stripe_cvc" placeholder="CVC" required>
                        </div>

                       

                        <div class="mt-6 text-center">
                            <button style="border:none;" type="submit" class="primary-btn">Pay Now</button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </section>

   <style>
        .payment-options {
            margin-top: 20px;
            gap: 20px;
        }

        .payment-option {
            text-align: center;
        }

        .payment-logo {
            width: 120px;
            height: auto;
            display: block;
            margin: auto;
        }

        .payment-details input {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .payment-details p {
            margin-bottom: 15px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

   </style>

    <!-- Js Plugins -->
    @include('client.lib.js')






</body>

</html>

