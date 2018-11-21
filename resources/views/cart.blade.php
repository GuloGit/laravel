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
                    <col width="170">
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
                        <td class="form-inline">
                            <button  type="button" class="js-change-quantity btn  btn-primary"
                                     data-id="{{$product->id}}"
                                     data-type="add">+</button>
                            <input id="quantity_{{$product->id}}" size="4" type="text" value="{{$product->countInCart}}"
                                   class="form-control text-right js-quantity" data-id="{{$product->id}}">
                            <button type="button" class="js-change-quantity btn  btn-primary"
                                    data-id="{{$product->id}}"
                                    data-type="sub" >-</button>
                        </td>
                        <td class="js-total-price" id="total_{{$product->id}}">
                            {{$product->totalPrice}}
                        </td>
                        <td>
                            <button name="remove" value="{{$product->id}}" class="btn btn-warning btn-sm">Удалить</button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </form>

        <div class="h3 text-right">Итого: <span id="total">{{$total}}</span></div>
    @else
        <div class="alert alert-info">В корзине нет ни одного товара!</div>
    @endif
@endsection