@extends('frontend.layouts.app')
@section('content')

<div class="blog-post-area">
	<h2 class="title text-center">Latest From our Blog</h2>
	@foreach($data as $row)
	<div class="single-blog-post">
		<h3>{{$row->title}}</h3>
		<div class="post-meta">
			<ul>
				<li><i class="fa fa-user"></i> Mac Doe</li>
				<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
				<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
			</ul>
			<span>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star-half-o"></i>
			</span>
		</div>
		<a href="">
			<img src="/public/imgblog/{{$row->image}}" style="height:auto; 
                                     " alt="">
		</a>
		<p>{{$row->description}}</p>
		<a class="btn btn-primary" href="/frontend/detailblog/{{$row->id}}">Read More</a>
	</div>
	@endforeach

	<div class="pagination" style="padding-top: 30px;">
		{{ $data->links();}}
	</div>
</div>


@endsection