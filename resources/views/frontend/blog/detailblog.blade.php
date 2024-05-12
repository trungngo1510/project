@extends('frontend.layouts.app')
@section('content')

<div class="blog-post-area">
	<h2 class="title text-center">Latest From our Blog</h2>
	<div class="single-blog-post">

		<h3>{{$blog->title}}</h3>
		<div class="post-meta">
			<ul>
				<li><i class="fa fa-user"></i> Mac Doe</li>
				<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
				<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
			</ul>
			<!-- <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span> -->
		</div>
		<a href="">
			<img src="/public/imgblog/{{$blog->image}}" alt="">
		</a>
		<p>{{$blog->description}}</p>
		<div class="pager-area">
			<ul class="pager pull-right">
				@if($previous)
				<li><a href="{{$previous}}">Pre</a></li>

				@else
				<li class="hidden"><a href="{{$previous}}">Previous</a></li>
				@endif
				@if($next)
				<li><a href="{{$next}}">Next</a></li>
				@else
				<li class="hidden"><a href="{{$next}}">Next</a></li>
				@endif
			</ul>



		</div>
	</div>
</div><!--/blog-post-area-->

<div id="review"></div>
@if(session('msg'))
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-check"></i> Thông báo!</h4>
	{{session('msg')}}
</div>
@endif
<div class="rating-area">
	<input type="hidden" name="id_blog" value="{{$blog->id}}">
	<ul class="ratings">
		<div class="rate">

			<div class="vote">
				@for($i=1; $i<=5; $i++) @if($i <=$rateAvg) <div class="star_1 ratings_stars ratings_over"><input value="{{$i}}" type="hidden"></div>
			@else
			<div class="star_1 ratings_stars"><input value="{{$i}}" type="hidden"></div>
			@endif
			@endfor

			<span class="rate-np">{{$rateAvg}}</span>


		</div>
</div>
</ul>
<ul class="tag">
	<li>TAG:</li>
	<li><a class="color" href="">Pink <span>/</span></a></li>
	<li><a class="color" href="">T-Shirt <span>/</span></a></li>
	<li><a class="color" href="">Girls</a></li>
</ul>
</div><!--/rating-area-->




<div class="socials-share">
	<a href=""><img src="images/blog/socials.png" alt=""></a>
</div><!--/socials-share-->

<!-- <div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-one.jpg" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div> --><!--Comments-->
<div class="response-area">
	<h2> RESPONSES</h2>
	<ul class="media-list">
		
		@foreach($dataCommentUser as $value)
		@if($value->level==0)
		<li class="media" id="{{$value->id}}">
			<a class="pull-left" href="#">
				<img class="media-object" src="/public/user/avatar/{{$value->avatar}}" alt="" style="width:100px;height: 86 px; ">
			</a>
			<div class="media-body ">
				<ul class="sinlge-post-meta">
					<li><i class="fa fa-user"></i>{{$value->name}}</li>
					<li><i class="fa fa-clock-o"></i> </li>
					<li><i class="fa fa-calendar"></i> </li>
				</ul>

				<p id="blogcmt">{{$value->cmt}}</p>
				<a class="btn btn-primary btn-reply" ><i class="fa fa-reply"></i>Replay</a>
				<div class="formReply reply-form" style="display: none;">
					<input type="text" class="form-control reply-input" placeholder="Your reply...">
					<button class="btn btn-primary btn-submit-reply" data-id="{{$value->id}}">Submit</button>
				</div>

			</div>
		</li>
		@endif


		@foreach($dataCommentUser as $item)
		@if($item->level == $value->id)
		<li class="media second-media ">
			<a class="pull-left" href="#">
				<img class="media-object" src="/public/user/avatar/{{$item->avatar}}" alt="" style="width:100px;height: 86 px; ">
			</a>
			<div class="media-body">
				<ul class="sinlge-post-meta">
					<li><i class="fa fa-user"></i>{{$item->name}}</li>
					<li><i class="fa fa-clock-o"></i> </li>
					<li><i class="fa fa-calendar"></i> </li>
				</ul>
				<p>{{$item->cmt}}</p>
				<a class="btn btn-primary btn-reply" ><i class="fa fa-reply"></i>Replay</a>
				<div class="formReply reply-form" style="display: none;">
					<input type="text" class="form-control reply-input" placeholder="Your reply...">
					<button class="btn btn-primary btn-submit-reply" data-id="{{$item->id}}">Submit</button>
				</div>
			</div>

</li>
@endif
@endforeach

@endforeach
</ul>

</div><!--/Response-area-->
<div class="replay-box">
	<div class="row">
		<div class="col-sm-12">
			<h2>Leave a replay</h2>
			<div class="text-area">
				<div class="blank-arrow">
					<label>Your Name</label>
					<span>*</span>
					<input type="hidden" name="id_blog" id="id_blog" value="{{$blog->id}}">
					<input type="hidden" name="level" id="level" value="0">
					<textarea name="message" id="body" class="cmt" rows="11"></textarea>
					<a class="btn btn-primary post">post comment</a>

				</div>
			</div>
		</div><!--/Repaly Box-->


		<script>
			$(document).ready(function() {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}

				});

				//vote
				$('.ratings_stars').hover(
					// Handles the mouseover
					function() {
						$(this).prevAll().andSelf().addClass('ratings_hover');
						// $(this).nextAll().removeClass('ratings_vote'); 
					},
					function() {
						$(this).prevAll().andSelf().removeClass('ratings_hover');
						// set_votes($(this).parent());
					}
				);

				$('.ratings_stars').click(function() {
					var checkLogin = "{{Auth::check()}}";
					if (checkLogin) {
						var rate = $(this).find("input").val();
						var id_blog = $(this).closest("div.rating-area").find("input").val();

						if ($(this).hasClass('ratings_over')) {
							$('.ratings_stars').removeClass('ratings_over');
							$(this).prevAll().andSelf().addClass('ratings_over');
						} else {
							$(this).prevAll().andSelf().addClass('ratings_over');
						}
						$.ajax({
							type: 'POST',
							url: '{{ url("/frontend/detailblog/rate/ajax") }}',
							data: {
								rate: rate,
								id_blog: id_blog,
							},
							success: function(data) {
								if (data.msg) {
									$('#review').html('<div class="alert alert-success alert-dismissible">' +
										'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
										'<h4><i class="icon fa fa-check"></i> Thông báo!</h4>' +
										data.msg +
										'</div>');
								}

							}
						});

					} else {
						alert('vui lòng login để rate');

					}
				});

				$('.post').click(function() {
					var checklogin = "{{Auth::check()}}";
					if (checklogin) {
						var comment = $(this).closest('.blank-arrow').find('textarea.cmt').val();
						var id_blog = $(this).closest('.blank-arrow').find('input#id_blog').val();
						var level = $(this).closest('.blank-arrow').find('input#level').val();


						$.ajax({
							type: 'POST',
							url: '{{ url("/frontend/detailblog/comment/ajax") }}',
							data: {
								cmt: comment,
								id_blog: id_blog,
								id_user: '{{Auth::id()}}',
								level: level,
								up: 1
							},
							success: function(data) {
								console.log(data)
								var img = "{{asset('/public/user/avatar/')}}" + "/" + data.data[0]['avatar'];
								var html = '';
								if (data.up == 1) {
									html += '<li class="media">' +
										'<a class="pull-left" href="#">' +
										'<img class="media-object" src="' + img + '" alt="" style="width:100px;height: 86 px; ">' +
										'</a>' +
										'<div class="media-body">' +
										'<ul class="sinlge-post-meta">' +
										'<li><i class="fa fa-user"></i>' + data.data[0]['name'] + '</li>' +
										'<li><i class="fa fa-clock-o"></i> 1:33 pm</li>' +
										'<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>' +
										'</ul>' +
										'<p>' + data.data[0]['cmt'] + '</p>' +
										'<a class="btn btn-primary btn-reply" href=""><i class="fa fa-reply"></i>Replay</a>' +
										'</div>' +
										'</li>';
									$(".response-area .media-list").append(html);
								}

							}
						});
					} else {
						alert("đăng nhập để bình luận")
					}
				});
				$('.btn-reply').click(function() {
					$('.formReply').hide();
					// Tìm đến phần tử cha chứa nút reply đã click
					var parentMedia = $(this).closest(".media");

					// Hiển thị form reply tương ứng
					parentMedia.find(".reply-form").show();

				});



				$('.btn-submit-reply').click(function(){
            			var checkLogin = "{{Auth::check()}}";
						var comment = $(this).closest('.reply-form').find('input').val();
						
						var id = $(this).data('id');
						
            if(checkLogin){
                $.ajax({
                    type: 'POST',
					url: '{{ url("/frontend/detailblog/comment/ajax") }}',
                    data:{
                        		cmt: comment,
								id_blog: '{{ $blog["id"] }}',
								id_user: '{{Auth::id()}}',	
							
								cmt_id: id,
								up: 2
                    },
                    success:function(data){
                        console.log(data)
						var img = "{{asset('/public/user/avatar/')}}" + "/" + data.data[0]['avatar'];
						var html="";
                        if(data.up == 2){
                        html += '<li class="media second-media">'+
                                    '<a class="pull-left" href="#">'+
                                        '<img class="media-object" src="' + img + '" alt="" style="width:100px;height: 86 px; "> '+
                                    '</a>'+
                                    '<div class="media-body">'+
                                        '<ul class="sinlge-post-meta">'+
                                            '<li><i class="fa fa-user"></i>Janis Gallagher</li>'+
                                            '<li><i class="fa fa-clock-o"></i> 1:33 pm</li>'+
                                            '<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>'+
                                        '</ul>'+
                                        '<p>'+ data.data[0]['cmt']+'</p>'+
                                        '<a class="btn btn-primary btn-reply" href=""><i class="fa fa-reply"></i>Replay</a>'+
                                    '</div>'+
                                '</li>';
								$(".media-list #" + id).append(html);
                        }
                    }
                })
            } else {
                alert('vui lòng login để reply')
            }
        });

			});
		</script>


		@endsection