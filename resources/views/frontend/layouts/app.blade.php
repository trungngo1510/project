<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">

    <script>
        if(screen.width <= 736){
            document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no");
        }
    </script>
    <title>Ohana</title>
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/rate/css/rate.css')}}">
   
    <script src="{{ asset('frontend/js/jquery.js')}}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>   

</head><!--/head-->

<body>
@if(Route::is('product.*') )
    @include('frontend.layouts.header')
        
@else
    @include('frontend.layouts.header')
    @include('frontend.layouts.slide')
@endif
    <section id="cart_items">
		<div class="container">
			<div class="row" id="items">
                @if(Route::is('product.*'))
                    @yield('content')
                @else
            @if(Route::is('account.*') )
                @include('frontend.layouts.left-account')
            @else
            @include('frontend.layouts.menu-left')
          
			@endif	
            
				<div class="col-sm-9 padding-right">
					
					@yield('content')

				</div>
                @endif  
			</div>
		</div>
	</section>
    @include('frontend.layouts.footer')

	

  
    
	<script src="{{ asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset('frontend/js/price-range.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('frontend/js/main.js')}}"></script>

    
</body>
</html>