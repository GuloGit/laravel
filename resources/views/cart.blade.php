@extends("layouts.public")
@section("content")
    <h1 class="my-4">Корзина товаров</h1>

    @if(count($products)>0)
        <form action="{{route("cart")}}" method="post">
            @csrf
            <table class="table table-bordered table-hover">
                <colgroup>
                    <col width="70">
                    <col>
                    <col>
                    <col width="90">
                    <col width="90">
                    <col width="120">
                    <col width="100">
                </colgroup>
                <thead>
                <tr>
                    <th></th>
                    <th>Товар</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Кол-во</th>
                    <th>Сумма</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><img src="{{Storage::url($product->image)}}" width="60" alt=""></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->content}}</td>
                        <td>{{$product->price}}руб.</td>
                        <td>{{$product->countInCart}}</td>
                        <td>{{$product->totalPrice}}</td>
                        <td>
                            <button name="remove" value="{{$product->id}}" class="btn btn-warning btn-sm">Удалить</button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </form>

       <div class="h3 text-right">Итого: {{$total}}</div>
    @else
        <div class="alert alert-info">В корзине нет ни одного товара!</div>
    @endif
@endsection