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
    <div class="container">
       @yield("content")
    </div>
</body>
</html>
