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

    <!-- cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($cartItems as $index => $data)
                                <tr style="position: relative;">
                                    <td class="shoping__cart__item">
                                        <img style="height:50px; width: 50px" src="{{ asset('/productsimage/' . $data->image) }}" alt="">
                                        <h5>{{ $data->name }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">AED {{ $data->price }}</td>
                                    <td class="shoping__cart__quantity">{{ $data->cart_quantity }}</td>

                                    <td class="shoping__cart__total">AED {{ number_format($data->total_price, 2) }}</td>

                                    
                                    <!-- Close button aligned to the right -->
                                    @if(isset($data2[$index]))
                                        <td class="shoping__cart__item__close" style="position: absolute; right: 10px;">
                                            <a href="{{ url('/remove-cart', $data2[$index]->id) }}"><span class="icon_close"></span></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                            <style>
                                .shoping__cart__item__close {
                                    cursor: pointer;
                                    font-size: 18px;
                                    color: red;
                                    position: absolute;
                                    right: 0px;
                                    top: 20px; /* Adjust this value to fit your design */
                                }

                            </style>
                            
                           

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__cart__btns">
                        <a href="{{'/shop'}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>      
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Tax <span style="font-weight:500">AED {{ is_numeric($tax) ? number_format($tax, 2) : '0.00' }}</span></li>
                            <li>Total <span style="color:green">AED {{ is_numeric($totalCartPrice) ? number_format($totalCartPrice, 2) : '0.00' }}</span></li>

                            <!-- <li>Total <span>AED {{ number_format($totalCartPrice, 2) }}</span></li> -->
                        </ul>
                        <a href="{{'/checkout'}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- cart Section End -->

    <script>
        const phoneInput = document.querySelector("#phone");
        const iti = window.intlTelInput(phoneInput, {
            initialCountry: "auto", // Automatically detect the user's country
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Required for formatting and validation
        });

        // Optional: Get the full phone number with country code on form submit
        document.querySelector("form").addEventListener("submit", function (e) {
            const fullPhoneNumber = iti.getNumber();
            console.log("Phone number submitted:", fullPhoneNumber);
            // You can store or send `fullPhoneNumber` to your database or backend
        });
    </script>

    <!-- Footer Section Begin -->
    @include('client.sections.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('client.lib.js')


</body>

</html>