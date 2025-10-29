<section class="categories">
    <div class="container">
        <div class="row">
                <div class="categories__slider owl-carousel">
                @foreach($products as $pro)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('/productsimage/' . $pro->image) }}">
                            <h5><a href="{{ url('details', $pro->id) }}">{{ $pro->name }}</a></h5>
                        </div>
                    </div>  
                @endforeach  
                </div>
        </div>
    </div>
</section>