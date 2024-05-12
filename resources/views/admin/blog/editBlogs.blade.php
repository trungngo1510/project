@extends('admin.layouts.app_db')
@section('content')
<div class="col-12">
    <div class="card card-body">
        <h4 class="card-title">Default Forms</h4>
        <h5 class="card-subtitle"> All bootstrap element classies </h5>
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
                <label>Title<span class="help">(*)</span></label>
                <input type="text" class="form-control" value="{{ $blog[0]->title}}" name="title">
            </div>

            <div class="form-group">
                <img src="/public/imgblog/{{$blog[0]->image}}" alt="" style="width: 100px; height: 100px;">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control" value="{{ $blog[0]->image}}" name="image">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="7" value="" name="description">{{ $blog[0]->description}}</textarea>
            </div>
            <div class="form-group col-md-12">
                <label>Content</label>
                <textarea class="form-control" cols="80" rows="10" id="editor1"></textarea>

            </div>
            <button type="submit" class="btn btn-primary">Update Blog</button>
        </form>
    </div>

</div>
@endsection