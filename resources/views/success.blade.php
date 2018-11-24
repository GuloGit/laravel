@extends("layouts.public")
@section("content")
    <div class="alert alert-success">
        <div class="h1">Ваш заказ успешно офрмлен</div>
        <div class="h4">наши менеджеры скоро свяжутся с вами!</div>

        <a href="{{route("home")}}" class="btn btn-light my-2">Вернуться на главную страницу</a>
    </div>


@endsection