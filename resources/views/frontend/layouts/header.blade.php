<header id="header"><!--header-->
	<div class="header_top"><!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!--/header_top-->

	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-md-4 clearfix">
					<div class="logo pull-left">
						<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
					</div>
					<div class="btn-group pull-right clearfix">
						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								USA
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="">Canada</a></li>
								<li><a href="">UK</a></li>
							</ul>
						</div>

						<div class="btn-group">
							<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								DOLLAR
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="">Canadian Dollar</a></li>
								<li><a href="">Pound</a></li>
							</ul>
						</div>
					</div>
				</div>
				@php

				$total_qty = 0;
				$cart = session()->get('cart');
				if(!empty($cart)){
				foreach($cart as $value){
				$total_qty += $value['quantity'];
				}
				}
				@endphp
				<div class="col-md-8 clearfix">
					<div class="shop-menu clearfix pull-right">
						<ul class="nav navbar-nav ms-auto">
							@if(Auth::check()&&session('member'))
							<li><a href=""><i class="fa fa-user"></i> Account</a></li>
							@endif
							<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
							<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
							<li><a href="{{ url('/yourCart') }}"><i class="fa fa-shopping-cart"></i><span class='badge badge-warning count-cart' id='lblCartCount'></span> Cart</a></li>
							@guest
							<li class="nav-item">
								<a class="nav-link" href="{{ url('/frontend/login') }}"><i class="fa fa-lock"></i>{{ __('Login') }}</a>
							</li>
							@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" href="{{ url('/frontend/register') }}"><i class="fa fa-user"></i>{{ __('Register') }}</a>
							</li>
							@endif
							@else
							
							<li class="nav-item dropdown">
								<img src="{{ URL::to('/public/user/avatar/'.Auth::user()->avatar) }}" alt="user" class="rounded-circle" style="width: 20px; height: 20px;">


								<a style="display: inline-block;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<div style="padding: 10px;" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<p><a class="dropdown-item" href="{{ url('/frontend/logout') }}">
											{{ __('Logout') }}
										</a></p>
									<p><a class="dropdown-item" href="{{ url('/frontend/account/my-product') }}">
											{{ ('View your product') }}
										</a></p>
									<p><a class="dropdown-item" href="{{ url('/frontend/account/add-product') }}">
											{{ ('Add product') }}
										</a></p>
									<p><a class="dropdown-item" href="{{ url('/frontend/account/account_update') }}">
											{{ ('Profile') }}
										</a></p>
								</div>

							</li>
							
							@endguest


					</div>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</div><!--/header-middle-->

	<div class="header-bottom"><!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="index.html" class="active">Home</a></li>
							<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
									<li><a href="shop.html">Products</a></li>
									<li><a href="product-details.html">Product Details</a></li>
									<li><a href="checkout.html">Checkout</a></li>
									<li><a href="cart.html">Cart</a></li>
									<li><a href="login.html"> </a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
								<ul role="menu" class="sub-menu">
									<li><a href="blog.html">Blog List</a></li>
									<li><a href="blog-single.html">Blog Single</a></li>
								</ul>
							</li>
							<li><a href="404.html">404</a></li>
							<li><a href="contact-us.html">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="search_box pull-right">
						<form method="post" action="{{ route('product.search') }}">
							@csrf
							<input type="text" placeholder="Search" value="" name="search" />
							<button type="submit" class="btn btn-default">Search</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div><!--/header-bottom-->
</header><!--/header-->