
<div class="product-window">
    <h1>{{$product->name}}</h1>
    <img class="img-fluid mb-4" src="{{Storage::url($product->image)}}" alt="">
    <div>
        {{$product->content}}
    </div>

</div>
