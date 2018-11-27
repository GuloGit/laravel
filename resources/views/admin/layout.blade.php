<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @stack("styles")
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                @section("sidebar")
                    <nav>
                        <li><a href="{{route("admin")}}">Главная</a></li>
                        <li><a href="{{route("products.index")}}">Товары</a></li>
                        <li><a href="{{route("orders")}}">Заказы</a></li>
                        <li><a href="">Настройки</a></li>
                        <li><a href="">Список админов</a></li>
                        <li><a href="{{route("logout")}}">Выход</a></li>
                    </nav>
                @show
            </div>
            <div class="col-8">
                <div class="card card-default">
                    <div class="card-body">
                        @if(Session::has("message"))
                             <div class="alert alert-{{Session::get("message-type")}}">
                                 {{Session::get("message")}}
                             </div>
                        @endif
                        <h1 class="mb-3">@yield("title")</h1>
                        @yield("content")
                    </div>
                </div>
            </div>
        </div>
        <footer>
            @section("footer")
                &copy; Наша супер админ панель
            @show
        </footer>
    </div>

    @stack("scripts")
</body>
</html>