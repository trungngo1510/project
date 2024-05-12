@if(isset($search_product))
@foreach($search_product as $item)
    
<div class="col-sm-3">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                @if(!empty($item->image))
                @php
                $imagesArray = json_decode($item->image, true);
                @endphp
                @if(!empty($imagesArray) && count($imagesArray) > 0)
                <img src="/public/imgProduct/hinh100_{{$imagesArray[0]}}" alt="" />
                @endif
                @endif
                <h2>${{$item->price}}</h2>
                <p>{{$item->name}}</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>

        </div>
    </div>
</div>
@endforeach
@endif
@endsection