@extends('frontend.layouts.app')
@section('content')

	
		<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Id</td>
							<td class="description">Name</td>
                            <td class="image">Image</td>
							<td class="price">Price</td>
							<td class="action">Action</td>
							
						</tr>
					</thead>
					<tbody>
						@if(count($product))
						@foreach($product as $p)
						<tr>
							<td class="cart_product_id">
								<p>{{$p->id}}</p>
							</td>

							<td class="cart_description">
								<h4><a href="">{{$p->name}}</a></h4>
							</td>
							<td class="cart_product">
							
							
							@foreach(json_decode($p->image) as $images)

								<a href=""><img src="/public/imgProduct/{{$images}}" alt="" style="width: 80px; height: 80px;"></a>
							@endforeach
							</td>
							
							<td class="cart_price">
								<p>${{$p->price}}</p>
							</td>
							<td class="cart_delete">
								<a href="/frontend/account/edit-product/{{$p->id}}" class="btn btn-danger">Edit</a>
                               	<a href="{{route('account.delete', ['id' => $p->id])}}" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						@endforeach
						@endif	

					</tbody>
				</table>
			</div>
	

@endsection