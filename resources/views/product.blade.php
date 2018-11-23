
<div class="product-window">
    <h1>{{$product->name}}</h1>
    @if($product->image) <img class="img-fluid mb-4" src="{{Storage::url($product->image)}}" alt="">@endif
    <div>
        {{$product->content}}
    </div>

</div>
