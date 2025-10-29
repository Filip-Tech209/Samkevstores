<!DOCTYPE html>
<html lang="zxx">

    @include('client.lib.head')

<body>
    <!-- Page Preloder -->


    <!-- Humberger Begin -->
    @include(' client.sections.humberger')
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($categories as $category)
                                <li data-filter=".{{ strtolower(str_replace(' ', '-', $category->category)) }}">{{ ucfirst($category->category) }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($products as $pro)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 mix {{ strtolower(str_replace(' ', '-', $pro->category)) }}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('/productsimage/' . $pro->image) }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{ url('details', $pro->id) }}"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{ url('details', $pro->id) }}">{{ $pro->name }}</a></h6>
                            <h5>AED {{ $pro->price }}</h5>
                        </div>
                    </div>
                </div>


                @endforeach

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
                  {{ $products ->links('pagination::bootstrap-4') }}
            </div>
            
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    @include(' client.sections.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    @include('client.lib.js')


</body>

</html>