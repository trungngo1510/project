@extends('frontend.layouts.app')
@section('content')
<div class="table-responsive ">
    <div class="card card-body">
        <h4 class="card-title">Create Product</h4>
        @if(session('success'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
            <h4><i class="icon fa fa-check"></i>Thông báo !</h4>
            {{session('success')}}
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
            <h4><i class="icon fa fa-check"></i>Thông báo !</h4>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="form-horizontal m-t-30" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" value="{{$product[0]->name}}" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="{{$product[0]->price}}" name="price" placeholder="Price">
            </div>
            <div class="form-group">
                <select class="form-control " name="category">
                    <option value="">Please Choose category</option>
                    @foreach ($category as $categories)
                    <option value="{{ $categories->id }}" @if (isset($product)) @if($categories->id==$product[0]->id_category) selected @endif
                        @endif >{{$categories->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control " name="brand">
                    <option value="">Please Choose Brand</option>
                    @foreach ($brand as $brands)
                    <option value="{{ $brands->id }}" @if (isset($product)) @if($brands->id==$product[0]->id_brand) selected @endif
                        @endif >{{$brands->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control " name="status">
                    @if($product[0]->status == 0)
                    <option value="{{$product[0]->status}}">New</option>
                    <option value="1">sale</option>
                    @else
                    <option value="{{$product[0]->status}}">Sale</option>
                    <option value="0">New</option>
                    @endif

                </select>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control col-md-3" value="{{$product[0]->sale}}" name="sale" placeholder="0 %">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="{{$product[0]->company}}" name="company" placeholder="Company Profile">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image[]" multiple>
            </div>

            <div class="form-group">



                @foreach(json_decode($product[0]->image, true) as $image)
                <input type="checkbox" id="image" name="delImage[]" value="{{ $image }}">
                <img src="/public/imgProduct/{{ $image }}" alt="" style="width: 100px; height: 80px;">
                @endforeach


            </div>
            <div class="form-group">
                <textarea class="form-control" cols="80" rows="10" name="detail" placeholder="Detail">{{$product[0]->detail}}</textarea>

            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>

    </div>
</div>
@endsection

<style>



</style>