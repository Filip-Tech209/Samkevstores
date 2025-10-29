<!DOCTYPE html>
<html lang="zxx">

    @include('widgets.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">


<body>
    <!-- Page Preloder -->
    @include('widgets.pageLoader')

    <!-- Humberger Begin -->
    @include('sections.humberger')
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @include('sections.header')hbv

    <!-- Hero Section Begin -->
    @include('pages.heroForShop')
    <!-- Hero Section End -->

   <!-- Checkout Section Begin -->
   <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Select Payment Method</h4>
                <form id="paymentForm" action="{{ route('processPayment', ['orderId' => $order->id]) }}" method="POST">
                    @csrf
                    <!-- Payment Options -->
                    <div class="payment-options">
                        <!-- Stripe -->
                        <div class="payment-option">
                            <input type="radio" id="payment-stripe" name="payment_method" value="stripe" checked>
                            <label for="payment-stripe">
                                <img src="{{ asset('backend/images/stripe-logo.png') }}" alt="Stripe" style="width: 120px; height:auto">
                            </label>
                            <div class="payment-details" id="stripe-details">
                                <p>Pay securely using your credit or debit card via Stripe.</p>
                                <input type="text" name="stripe_card_holder_name" placeholder="Cardholder Name" required>
                                <input type="text" name="stripe_card_number" placeholder="Card Number" required>
                                <input type="text" name="stripe_expiry_date" placeholder="MM/YY" required>
                                <input type="text" name="stripe_cvc" placeholder="CVC" required>
                            </div>
                        </div>
                <div style=height:30px></div>
                        <!-- PayPal -->
                        <div class="payment-option">
                            <input type="radio" id="payment-paypal" name="payment_method" value="paypal" disabled>
                            <label for="payment-paypal">
                                <img src="{{ asset('backend/images/paypal-logo.png') }}" alt="PayPal" style="width: 120px;">
                            </label>
                            <div class="payment-details" id="paypal-details" style="display: none;">
                                <p>Pay easily using your PayPal account.</p>
                                <input type="email" name="paypal_email" placeholder="PayPal Email" disabled required>
                            </div>
                        </div>
                <div style=height:20px></div>
                        <!-- Visa -->
                        <div class="payment-option">
                            <input type="radio" id="payment-visa" name="payment_method" value="visa" disabled>
                            <label for="payment-visa">
                                <img src="{{ asset('backend/images/visa-logo.png') }}" alt="Visa" style="width: 100px;height:20px">
                            </label>
                            <div class="payment-details" id="visa-details" style="display: none;">
                                <p>Pay securely using your Visa card.</p>
                                <input type="text" name="visa_card_holder_name" placeholder="Cardholder Name" disabled required>
                                <input type="text" name="visa_card_number" placeholder="Card Number" disabled required>
                                <input type="text" name="visa_expiry_date" placeholder="MM/YY" disabled required>
                                <input type="text" name="visa_cvc" placeholder="CVC" disabled required>
                            </div>
                        </div>
                    </div>
                <div style=height:20px></div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Proceed to Pay</button>
                </form>
            </div>
        </div>
    </section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentOptions = document.querySelectorAll('input[name="payment_method"]');
        const paymentDetails = {
            stripe: document.getElementById('stripe-details'),
            paypal: document.getElementById('paypal-details'),
            visa: document.getElementById('visa-details'),
        };

        paymentOptions.forEach(option => {
            option.addEventListener('change', function () {
                for (let key in paymentDetails) {
                    if (option.value === key) {
                        paymentDetails[key].style.display = 'block';
                    } else {
                        paymentDetails[key].style.display = 'none';
                    }
                }
            });
        });
    });
</script>

   

    <!-- Footer Section Begin -->
    @include('sections.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('widgets.js')


</body>

</html>