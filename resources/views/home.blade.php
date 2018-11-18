<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
    <script>
        $(function(){
            $(".js-fancybox").fancybox();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".js-add-cart").click(function () {
                var id = $(this).data("id");

                $.ajax({
                    url: "/addToCart/" + id,
                    type:"post",
                    dataType:"json",
                    success: function (response) {
                        $(".cart").text(response.total);

                    }

                })
            });
        });
    </script>
    <style>
        .product-image{
            background: #d8fef4 center/cover;
            height: 200px;
        }
        .product-price{
            font-size: 18px;
            font-weight: bold;
        }
        .product-window{
            max-width: 640px;
        }
        .cart{
            position: fixed;
            background:#1f6fb2;
            color: #fff;
            top:0;
            right:0;
            padding: 25px;
            z-index: 10;
        }
    </style>

    <title>Наш магазин</title>
</head>
<body>
    <div class="cart">
        @if($totalItemsInCart>0)
            {{$totalItemsInCart}}
        @else
            Корзина пуста
        @endif

    </div>
    <div class="container">
        <div class="jumbotron mb-4 ">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
        <h1>Каталог товаров</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-sm-3 mb-4">
                    <div class="card h-100">
                        <div class="card-img-top product-image" style="background-image:url({{Storage::url($product->image)}})"></div>
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
     </div>

</body>
</html>
