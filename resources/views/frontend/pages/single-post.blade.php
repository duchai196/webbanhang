@extends('frontend.master')
@section('content')
		<section>
		<div class="container">
			<div class="row">
					@include('frontend.elements.sidebar')
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Tin tức từ cửa hàng chúng tôi</h2>
						<div class="single-blog-post">
							<h3>{!! $post->title !!}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-clock-o"></i> {!! $post->created_at->format('d-m-Y') !!}</li>
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
								<img src="{!! $post->image !!}" alt="{!! $post->slug !!}">
							</a>
							<p>
								{!! $post->body !!}
							</p>
							<div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="#">Pre</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->

					<div class="socials-share">
						<p>Chia sẻ qua mạng xã hội</p>
						<script type="text/javascript" src="https://apis.google.com/js/plusone.js" ></script>
						<g:plusone size="medium" ></g:plusone>
					</div><!--/socials-share-->


					<div class="replay-box">
						<div class="row">

						</div>
					</div><!--/Repaly Box-->
				</div>	
			</div>
		</div>
	</section>
	@stop