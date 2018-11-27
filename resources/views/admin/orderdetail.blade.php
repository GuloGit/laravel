@extends("admin.layout")

@section("title")
   Просмотр заказа № {{$id}}
@endsection
@section("content")
    <table class="table table-bordered table-hover mb-2">
        <colgroup>
            <col width="300">
            <col width="80">
            <col width="80">
            <col width="80">
            <col width="80">
            <col>
        </colgroup>
        <tr>
            <th>Товар</th>
            <th>Колличество</th>
            <th>Цена</th>
            <th>Итого</th>
            <th>Изображение</th>
        </tr>

        @foreach($orders as $order)
            <tr>
                <td>{{$order->product_id}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->price*$order->quantity}}</td>
                <td><img src="{{Storage::url($order->image)}}" width="80"></td>
            </tr>
        @endforeach
    </table>
    <div class="h3 text-right">Итого:{{$orders->total}} </div>

@endsection
