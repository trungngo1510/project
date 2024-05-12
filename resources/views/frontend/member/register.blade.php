@extends('frontend.layouts.app-member')
@section('content')
@if(session('success'))
<div class="alert alert-primary alert-dismissible">
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
<div class="signup-form"><!--sign up form-->
    <h2>New User Signup!</h2>
    <form method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Name" name="name" />
        <input type="email" placeholder="Email Address" name="email" />
        <input type="password" placeholder="Password" name="password" />
        <label for="">Avatar</label>
        <input type="file" name="avatar" id="">
        <input type="hidden" name="level" value="0">
        <button type="submit" class="btn btn-default">Signup</button>
    </form>
</div><!--/sign up form-->

@endsection