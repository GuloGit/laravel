@extends("admin.layout")

@section("title")
    Список заказов
@endsection

@section("content")
     <table class="table table-bordered table-hover">
        <colgroup>
            <col width="300">
            <col width="80">
            <col width="80">
            <col width="80">
            <col>
        </colgroup>
        <tr>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Комментарий</th>
            <th>Цена</th>
            <th></th>
        </tr>

        @foreach($orders as $order)
            <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->comment}}</td>
                <td> {{$order->total}}

                </td>
                <td>
                    <a href="{{route("orders.show", $order->id)}}" class="btn btn-primary btn-sm">Информация о заказе</a>
                </td>
            </tr>@endforeach
    </table>
@endsection