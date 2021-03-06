@extends('layouts/main')

@section('content')

    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="5">
                <img src="assets/images/kk.png" class="d-block w-100" alt="slider">
            </div>
            <div class="carousel-item" data-interval="5">
                <img src="assets/images/slider1.png" class="d-block w-100" alt="umkm">
            </div>
        </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- New Arrivals -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Kategori</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked"
                            data-filter="*">all
                        </li>
                        @foreach($categoryMenu as $menu)
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"
                            data-filter=".{{ $menu->id }}">{{ $menu->category_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                    @foreach($products as $product)
                    <a href="/product/{{$product->slug}}">
                        <div class="product-item {{$product->category_id}} ">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    {!! $product->thumbs !!}
                                </div>

                                <div class="product_info">
                                    <h5 class="product_name"><b><a
                                            href="/product/{{$product->slug}}">{{ $product->product_name }}</a></b>
                                    </h5>

                                    <div class="">{{ ($product->phone) }}
                                    </div>
                                    <div class="product_price">{{ ($product->address) }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>



@endsection


@section('js')


<script>
$('.add_to_cart_button').find('a').click(function(event) {
    event.preventDefault();
    var quantity = $(this).parent().prev().find('input').val();
    $.ajax({
        type: "POST",
        url: $(this).attr('href'),
        data: {
            quantity: quantity
        },
        success: function(data) {
            console.log(data);
            $('#checkout_items').html(data.cartCount);
        }
    });
    return false; //for good measure
});
</script>

@endsection