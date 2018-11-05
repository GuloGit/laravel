@extends("admin.layout")

@section("title")
    @if(isset($product))
        Редактирование товара
    @else
        Добавление товара
    @endif
@endsection

@section("content")
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif

<form action="{{isset($product) ? route("products.update", $product->id) : route("products.store")}}" method="post">
    @csrf
    @if(isset($product))
        @method("PUT")
    @endif
    <div class="form-group">
        <label for="name">Название</label>
        <input id="name"
               name="name"
               type="text"
               class="form-control"
               value="{{old("name",isset($product)?$product->name:"")}}">
    </div>

  <div class="row">
      <div class="col-6">
          <div class="form-group">
              <label for="price">Цена</label>
              <input id="price"
                     name="price"
                     type="text"
                     class="form-control"
                     value="{{old("price",isset($product)?$product->price:"")}}">
          </div>
      </div>
      <div class="col-6">
          <div class="form-group">
              <label for="quantity">Колличество</label>
              <input id="quantity"
                     name="quantity"
                     type="text"
                     class="form-control"
                     value="{{old("quantity",isset($product)?$product->quantity:"")}}">
          </div>
      </div>
  </div>
   <div class="form-group">
        <label for="info">Краткое описание</label>
        <textarea id="info" name="info" type="text" class="form-control" >{{old("info",isset($product)?$product->info:"")}}</textarea>
   </div>

    <div class="form-group">
        <label for="content">Подробное описание описание</label>
        <textarea id="content" name="content" type="text" class="form-control" >{{old("content",isset($product)?$product->content:"")}}</textarea>
    </div>

    <button class="btn btn-primary" type="submit">Сохранить</button>
</form>
@endsection