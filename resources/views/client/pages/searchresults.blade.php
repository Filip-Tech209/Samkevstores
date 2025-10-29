<!DOCTYPE html>
<html lang="zxx">

    @include('client.lib.head')

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

    <!-- Product Section Begin -->
  
    
 
    <section style="margin-top: -70px;" class="featured spad">
        <div class="container">
            @if($products->isEmpty())
            <div class="no-items-found">
                <div class="animation-wrapper">
                    <div class="animation-icon">
                        <i class="fa fa-search"></i>
                    </div>
                    <p>Oops! No items matched your search.</p>
                    <p>Try searching for something else!</p>
                </div>
            </div>

            <style>
                    .no-items-found {
                        text-align: center;
                        margin-top: 50px;
                    }

                    .animation-wrapper {
                        animation: fadeIn 1s ease-in-out;
                    }

                    .animation-icon {
                        font-size: 60px;
                        color: #ff6f61;
                        margin-bottom: 20px;
                        animation: bounce 1.5s infinite;
                    }

                    .no-items-found p {
                        font-size: 18px;
                        color: #555;
                    }

                    @keyframes fadeIn {
                        from {
                            opacity: 0;
                        }
                        to {
                            opacity: 1;
                        }
                    }

                    @keyframes bounce {
                        0%, 100% {
                            transform: translateY(0);
                        }
                        50% {
                            transform: translateY(-15px);
                        }
                    }
            </style>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const animationIcon = document.querySelector('.animation-icon');
                    animationIcon.addEventListener('click', function () {
                        alert("Try searching again with a different term!");
                    });
                });
            </script>



            @else
                <div class="row featured__filter">
                    @foreach($products as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 mix {{ strtolower(str_replace(' ', '-', $item->category)) }}">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="{{ asset('/productsimage/' . $item->image) }}">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{ url('details', $item->id) }}"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="{{ url('cart', $item->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="{{ url('details', $item->id) }}">{{ $item->name }}</a></h6>
                                    <h5>AED {{ $item->price }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
            @endif

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                    $(document).ready(function(){
                        // Filter items based on category
                        $('.featured__controls li').click(function(){
                            var filterValue = $(this).attr('data-filter');

                            // Show all items if "All" is clicked
                            if (filterValue === '*') {
                                $('.mix').show(); // Show all items
                            } else {
                                $('.mix').hide(); // Hide all items initially
                                $(filterValue).show(); // Show only the items that match the filter
                            }

                            // Remove active class from all filter buttons
                            $('.featured__controls li').removeClass('active');

                            // Add active class to the clicked filter button
                            $(this).addClass('active');
                        });
                    });
                </script>
            </div>
            <div class="pagination-wrapper d-flex justify-content-center mt-4">
                  {{ $products->links('pagination::bootstrap-4') }}
            </div>
            
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    @include('client.sections.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('client.lib.js')


</body>

</html>