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
                <input type="text" class="form-control" value="" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="" name="price" placeholder="Price">
            </div>
            <div class="form-group">
                <select class="form-control " name="category">
                    <option value="">Please Choose category</option>
                    @foreach($category as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control " name="brand">
                    <option value="">Please Choose Brand</option>
                    @foreach($brands as $b)
                    <option value="{{$b->id}}">{{$b->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control " name="status">
                    <option value="0">New</option>
                    <option value="1">Sale</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <input type="text" class="form-control col-md-3" value="0" name="sale" placeholder="0 %">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" value="" name="company" placeholder="Company Profile">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" name="image[]" multiple>
            </div>

            <div class="form-group">
                <textarea class="form-control" cols="80" rows="10" name="detail" placeholder="Detail"></textarea>

            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
</div>
@endsection