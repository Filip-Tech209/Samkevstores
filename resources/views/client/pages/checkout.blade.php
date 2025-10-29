<!DOCTYPE html>
<html lang="zxx">

    @include('client.lib.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">


<body>
    <!-- Page Preloder -->
    <!-- Humberger Begin -->
    @include('client.sections.humberger')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('client.sections.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @include('client.pages.heroForShop')
    <!-- Hero Section End -->

   <!-- Checkout Section Begin -->
    <section class="checkout spad" style="margin-top: -80px;">
        <div class="container">
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
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ url('/place-order') }}" id="checkoutForm" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>First Name<span>*</span></p>
                                        <input type="text" value="{{ $user->firstname }}"  name="firstname" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" value="{{ $user->lastname }}" name="lastname" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input 
                                            type="text"  
                                            id="phone_number" 
                                            maxlength="14" 
                                            pattern="^\+\d{12}$" 
                                            class="form-control form-control-lg" 
                                            name="phone" 
                                            value="{{ $user->phone }}"  
                                            placeholder="Enter your Phone number (e.g., +2547xxxxxxxx)" 
                                            required>
                                        <p class="text-danger">@error('phone'){{$message}}@enderror</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" value="{{ $user->email }}" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Country<span>*</span></p>
                                        <input type="text"  name="country" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Adress or Location<span>*</span></p>
                                        <textarea style=" width:100%"  type="text" name="address" required></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                @if($cartItems->isEmpty())
                                    <p>No items in your cart.</p>
                                    <div class="checkout__order__total">Total <span>AED 0.00</span></div>
                                @else
                                    <ul>
                                    @foreach($cartItems as $index => $data)
                                        @php
                                            $nameWords = explode(' ', $data->name);
                                            $truncatedName = implode(' ', array_slice($nameWords, 0, 3));
                                            $finalName = count($nameWords) > 3 ? $truncatedName .' '. '...' : $truncatedName;
                                        @endphp
                                        <li>{{ $finalName }} x {{$data->cart_quantity}} <span>{{ number_format($data->total_price, 2) }} </span></li>
                                    @endforeach
                                    </ul>
                                    <div class="checkout__order__total">
                                        Tax <span style="font-weight:500">AED {{ number_format($tax, 2) }}</span> <br>
                                        Total <span>AED {{ number_format($totalCartPrice, 2) }}</span>
                                    </div>
                                @endif
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </section>


     <!-- Add modal -->
     <div class="modal fade" id="modal-pay">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row" style="display: flex; justify-content: center; align-items: center; ;">
                    <div class="col-lg-4">
                        <div class="contact__form__title">
                            <h2>Fill Card Details</h2>
                        </div>
                        <form id="paymentForm" action="" method="POST">
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

                            <div class="mt-3 text-center">
                                <button type="submit" class="btn btn-primary">Proceed to Pay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>   
          </div>   
        </div>
      </div>

    <!-- Checkout Section End -->

    <script>
        document.getElementById('checkoutForm').onsubmit = function(event) {
            var phone_number = document.getElementById('phone_number').value;

            // Ensure phone number starts with +, followed by 6 to 14 digits
            if (!/^\+\d{6,14}$/.test(phone_number)) {
                alert("Please enter a valid phone number in the format: +CountryCodePhoneNumber (e.g., +1971701951531).");
                event.preventDefault(); // Prevent form submission
            }
        };

        // Allow only valid characters while typing
        document.getElementById('phone_number').addEventListener('input', function() {
            // Remove invalid characters, allowing only '+' at the start and digits
            this.value = this.value.replace(/(?!^\+)\D/g, ''); // Allow digits except the first '+'
        });
    </script>


    <!-- Footer Section Begin -->
    @include('client.sections.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('client.lib.js')


</body>

</html>