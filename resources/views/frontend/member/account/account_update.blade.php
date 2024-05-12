@extends('frontend.layouts.app')
@section('content')


<div class="blog-post-area">
    <h2 class="title text-center">Update user</h2>
    <div class="signup-form">
        <h2>Update User </h2>
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
        <form method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Name:</label>
            <input type="text" placeholder="" name="name" value="{{$user[0]->name}}" />
            <label for="">Email:</label>
            <input type="text" placeholder="" name="email" value="{{$user[0]->email}}" />

            <label for="">Address:</label>
            <input type="text" placeholder="" name="address" value="{{$user[0]->address}}" />
            <label for="">National:</label>

            <select class="form-control form-control-line" name="national">

                @foreach($country as $c)
                @if($c->id===$user[0]->id_country)
                <option value="{{ $c->id }}">{{ $c->name }}</option>

                @endif
                @endforeach

            </select>

            <label for="">Phone Number:</label>
            <input type="text" placeholder="" name="phone" value="{{$user[0]->phone}}" />
            <label for="">Avatar:</label>
            <input type="file" placeholder="" name="avatar" value="" />

            <button type="submit" class="btn btn-default" name="update">Update</button>

        </form>
    </div>
</div>



@endsection