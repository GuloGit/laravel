@extends("layouts.public")
@section("content")
        <a href="{{route("cart")}}" class="cart">
            @if($totalItemsInCart>0)
                {{$totalItemsInCart}}
            @else
                Корзина пуста
            @endif

        </a>
        <div class="jumbotron mb-4 ">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
        <h1 class="mb-4">Каталог товаров</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-3 mb-4">
                    <div class="card h-100">
                        <div class="card-img-top product-image"
                              style="@if($product->image)background-image:url({{Storage::url($product->image)}})@endif">

                        </div>
                        <div class="card-body ">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->info}}</p>
                            <div class="product-price my-3">{{$product->price}}руб.</div>
                            <button data-id="{{$product->id}}" class="js-add-cart btn btn-sm btn-success ">В корзину</button>
                            <a href="{{route("show-product", $product->id)}}" class="btn btn-sm btn-info js-fancybox" data-type="ajax">Подробнее</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
@endsection

