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
           <col width="300">
           <col width="80">
           <col width="80">
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
                    <form class="d-inline-block" action="{{route("products.destroy", $product->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
           </tr>
       @endforeach
   </table>
@endsection
