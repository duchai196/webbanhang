@extends('frontend.master')
@section('content')
		<section>
		<div class="container">
			<div class="row">
					@include('frontend.elements.sidebar')
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Tin tức mới nhất từ cửa hàng chúng tôi</h2>
						@if(count($listPost))
						@foreach($listPost as $item)
						<div class="single-blog-post">
							<h3><a href="{!! route('getPost',$item->slug) !!}">{!! $item->title !!} </a></h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-clock-o"></i>{{ $item->created_at->format('d-m-Y') }}</li>
								</ul>

							</div>
							<a href="{!! route('getPost',$item->slug) !!}">
								<img src="{!! $item->image !!}" alt="">
							</a>
							<p>{!! $item->excerpt !!}</p>
							<a  class="btn btn-primary" href="{!! route('getPost',$item->slug) !!}">Đọc tiếp</a>
						</div>
							@endforeach
						@else
							<h2>Không có tin tức gì!</h2>
							@endif
						<div class="pagination-area">
							{{$listPost->render()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	@stop