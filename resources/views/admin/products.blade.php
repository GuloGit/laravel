@extends("admin.layout")

@section("title")
    Список товаров
@endsection

@section("sidebar")
    @parent
    <div class="h3">Недавно вы редактировали</div>
    Здесь должен быть список недавно измененных товаров

@endsection

@section("content")
    <a class="btn btn-success mb-4" href="{{ route("products.create") }}">Создать товар</a>
   <table class="table table-bordered table-hover">
       <colgroup>
           <col width="200">
           <col width="100">
           <col width="100">
           <col>
       </colgroup>
       <tr>
           <th>Название</th>
           <th>Цена</th>
           <th>Кол-во</th>
           <th></th>
       </tr>

       @foreach($products as $product)
           <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                    <a href="{{route("products.edit", $product->id)}}" class="btn btn-primary btn-sm">Изменить</a>
                </td>
       @endforeach
   </table>
@endsection
