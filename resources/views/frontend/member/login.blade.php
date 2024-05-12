@extends('frontend.layouts.app-member')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible">
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
<div class="login-form"><!--login form-->
	<h2>Login to your account</h2>
	<form method="post">
		@csrf
		<input type="email" placeholder="Email Address" name="email" />
		<input type="password" placeholder="Password" name="password" />
		<button type="submit" class="btn btn-default">Login</button>
	</form>
</div><!--/login form-->

@endsection