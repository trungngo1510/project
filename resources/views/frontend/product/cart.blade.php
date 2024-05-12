@extends('frontend.layouts.app')
@section('content')
@php
$cart = session()->get('cart');
$sub_total = 0;
@endphp
<div class="breadcrumbs">
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li class="active">Shopping Cart</li>
	</ol>
</div>
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
<div class="heading">
	<h3>What would you like to do next?</h3>
	<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="chose_area">
			<ul class="user_option">
				<li>
					<input type="checkbox">
					<label>Use Coupon Code</label>
				</li>
				<li>
					<input type="checkbox">
					<label>Use Gift Voucher</label>
				</li>
				<li>
					<input type="checkbox">
					<label>Estimate Shipping & Taxes</label>
				</li>
			</ul>
			<ul class="user_info">
				<li class="single_field">
					<label>Country:</label>
					<select>
						<option>United States</option>
						<option>Bangladesh</option>
						<option>UK</option>
						<option>India</option>
						<option>Pakistan</option>
						<option>Ucrane</option>
						<option>Canada</option>
						<option>Dubai</option>
					</select>

				</li>
				<li class="single_field">
					<label>Region / State:</label>
					<select>
						<option>Select</option>
						<option>Dhaka</option>
						<option>London</option>
						<option>Dillih</option>
						<option>Lahore</option>
						<option>Alaska</option>
						<option>Canada</option>
						<option>Dubai</option>
					</select>

				</li>
				<li class="single_field zip-field">
					<label>Zip Code:</label>
					<input type="text">
				</li>
			</ul>
			<a class="btn btn-default update" href="">Get Quotes</a>
			<a class="btn btn-default check_out" href="">Continue</a>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="total_area">
			<ul>
				<li>Cart Sub Total <span class="sub_total" id="sub_total">${{$sub_total}}</span></li>
				<li>Eco Tax <span class="tax">$2</span></li>
				<li>Shipping Cost <span>Free</span></li>
				<li>Total <span class="total">${{$sub_total + 2}}</span></li>
			</ul>
			<a class="btn btn-default update" href="">Update</a>
			<a class="btn btn-default check_out" href="{{Route('product.checkout')}}">Check Out</a>
		</div>
	</div>
</div>
@endsection