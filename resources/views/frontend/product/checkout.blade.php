@extends('frontend.layouts.app')
@section('content')

<div class="breadcrumbs">
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li class="active">Check out</li>
	</ol>
</div><!--/breadcrums-->

<div class="step-one">
	<h2 class="heading">Step1</h2>
</div>
<div class="checkout-options">
	<h3>New User</h3>
	<p>Checkout options</p>
	<ul class="nav">
		<li>
			<label><input type="checkbox"> Register Account</label>
		</li>
		<li>
			<label><input type="checkbox"> Guest Checkout</label>
		</li>
		<li>
			<a href=""><i class="fa fa-times"></i>Cancel</a>
		</li>
	</ul>
</div><!--/checkout-options-->

<div class="register-req">
	<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
</div><!--/register-req-->
@if(Auth::check())
<div class="shopper-informations">
	<div class="row">
		<div class="col-sm-3">
			<div class="shopper-info">@if(session('success'))
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
					<h4><i class="icon fa fa-check"></i>Thông báo !</h4>
					{{session('success')}}
				</div>
				@endif
				<p>Shopper Information</p>
				<form>
					<input type="text" placeholder="Display Name" value="{{$user->name}}">
					<input type="text" placeholder="Email" value="{{$user->email}}">
					<input type="password" placeholder="Password">
					<input type="password" placeholder="Confirm password">
				</form>
				<a class="btn btn-primary" href="">Get Quotes</a>
				<a class="btn btn-primary" href="{{ Route('sendmail') }}">Continue</a>
			</div>

		</div>
		@else
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

		@endif

	</div>
</div>
<div class="review-payment">
	<h2>Review & Payment</h2>
</div>
@php
$cart = session()->get('cart');
$sub_total = 0;
@endphp
<div class="table-responsive cart_info">
	<table class="table table-condensed">

		<thead>
			<tr class="cart_menu">
				<td class="image">Item</td>
				<td class="description"></td>
				<td class="price">Price</td>
				<td class="quantity">Quantity</td>
				<td class="total">Total</td>
				<td></td>
			</tr>


		</thead>
		<tbody>
			@if(!empty($cart))
			@foreach($cart as $key => $value)
			@php
			$s= $value['price']*$value['quantity'];
			$sub_total += $s;
			@endphp

			<tr id="product_{{$key}}">
				<td class="cart_product">
					<a href=""><img src="/public/imgProduct/hinh50_{{$value['image']}}" alt=""></a>
				</td>
				<td class="cart_description">
					<h4><a href="">{{$value['name']}}</a></h4>
					<p>Web ID: {{$key}}</p>
				</td>
				<td class="cart_price">
					<p>${{$value['price']}}</p>
				</td>
				<td class="cart_quantity">
					<div class="cart_quantity_button">
						<a class="cart_quantity_up" id="{{$key}}"> + </a>
						<input class="cart_quantity_input" type="text" name="quantity" value="{{$value['quantity']}}" autocomplete="off" size="2">
						<a class="cart_quantity_down" id="{{$key}}"> - </a>
					</div>
				</td>
				<td class="cart_total">
					<p class="cart_total_price">${{$value['price']*$value['quantity']}}</p>
				</td>
				<td class="cart_delete">
					<a class="cart_quantity_delete" id="{{$key}}"><i class="fa fa-times"></i></a>
				</td>
			</tr>
			@endforeach
			@else
			<p>giỏ hàng trống</p>
			@endif
			<tr>
				<td colspan="4">&nbsp;</td>
				<td colspan="2">
					<table class="table table-condensed total-result">
						<tr>
							<td>Cart Sub Total</td>
							<td>${{$sub_total}}</td>
						</tr>
						<tr>
							<td>Exo Tax</td>
							<td>$2</td>
						</tr>
						<tr class="shipping-cost">
							<td>Shipping Cost</td>
							<td>Free</td>
						</tr>
						<tr>
							<td>Total</td>
							<td><span>${{$sub_total+2}}</span></td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	</table>

	<script>
		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$('.cart_quantity_up').click(function() {
				var id = $(this).attr("id");
				var old_qty = $(this).closest(".cart_quantity").find("input").val();
				var new_qty = parseInt(old_qty) + 1;
				$(this).closest(".cart_quantity").find("input").val(new_qty);
				var price = $(this).closest("tr").find(".cart_price p").text();
				var price_total = new_qty * parseFloat(price.replace("$", ""));
				$(this).closest("tr").find(".cart_total p").text("$" + price_total);

				var sub_total = $(".total_area").find("span.sub_total").text();
				var new_sub_total = parseFloat(sub_total.replace("$", "")) + parseFloat(price.replace("$", ""));
				$(".total_area").find("span.sub_total").text("$" + new_sub_total);
				var tax = $(".total_area").find("span.tax").text();
				$(".total_area").find("span.total").text("$" + (new_sub_total + parseFloat(tax.replace("$", ""))));

				$.ajax({
					type: "POST",
					url: "{{ Route('product.up-cart') }}",
					data: {
						id: id,
						new_qty: new_qty,
					},
					success: function(data) {

					}
				})
			})

			$('.cart_quantity_down').click(function() {
				var id = $(this).attr("id");
				var old_qty = $(this).closest(".cart_quantity").find("input").val();
				var new_qty = parseInt(old_qty) - 1;
				$(this).closest(".cart_quantity").find("input").val(new_qty);
				var price = $(this).closest("tr").find(".cart_price p").text();
				var price_total = new_qty * parseFloat(price.replace("$", ""));
				$(this).closest("tr").find(".cart_total p").text("$" + price_total);

				var sub_total = $(".total_area").find("span.sub_total").text();
				var new_sub_total = parseFloat(sub_total.replace("$", "")) - parseFloat(price.replace("$", ""));
				$(".total_area").find("span.sub_total").text("$" + new_sub_total);
				var tax = $(".total_area").find("span.tax").text();
				$(".total_area").find("span.total").text("$" + (new_sub_total + parseFloat(tax.replace("$", ""))));
				$.ajax({
					type: "POST",
					url: "{{Route('product.down-cart')}}",
					data: {
						id: id,
						new_qty: new_qty,
					},
					success: function(data) {

					}
				})
			})


			$('.cart_quantity_delete').click(function() {
				var id = $(this).attr("id");
				$.ajax({
					type: "POST",
					url: "{{Route('product.delete-cart')}}",
					data: {
						id: id
					},
					success: function(response) {

						$("tr#product_" + id).remove();
						$(".total_area").find("span.sub_total").text("$" + response.totalPrice);

						$(".total_area").find("span.total").text("$" + (response.totalPrice + 2));
						alert("xóa thành công");
					}
				})
			})
		})
	</script>


</div>
<div class="payment-options">
	<span>
		<label><input type="checkbox"> Direct Bank Transfer</label>
	</span>
	<span>
		<label><input type="checkbox"> Check Payment</label>
	</span>
	<span>
		<label><input type="checkbox"> Paypal</label>
	</span>
</div>


@endsection