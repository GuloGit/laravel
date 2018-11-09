@extends("admin.layout")

@push("styles")
    <style>

       .login-form {
           max-width: 40rem;
           margin: 0 auto;
           padding: 1.5rem;
           background: #e9e9e9;
       }
    </style>
@endpush

@section("sidebar")

@endsection

@section("title")
    {{$title}}
@endsection

@section("content")
    <form action="" class="login-form">
        <div class="form-group">
            <label for="">Логин</label>
            <input type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Пароль</label>
            <input type="password" class="form-control">
        </div>
    </form>
@endsection

@section("footer")
    @parent
    <hr>
    P.S. Админ панель доступна только после ввода корректных данных
@endsection