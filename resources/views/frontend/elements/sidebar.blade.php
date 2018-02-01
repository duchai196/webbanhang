<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Danh mục sản phẩm</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			@foreach($listCategory as $item)
				@if($item->parent_id==null)
					<div class="panel panel-default">

						<div class="panel-heading">
							<h4 class="panel-title">

								<a  href="{{route('getCategory',$item->id)}}">
									{!! $item->name !!}
								</a>
								<a data-toggle="collapse" data-parent="#accordian" href="#{!! $item->id !!}">
									<span class="badge pull-right"><i class="fa fa-plus"></i></span>
								</a>


							</h4>
						</div>

						<div id="{!! $item->id !!}" class="panel-collapse collapse">
							<div class="panel-body">
								<ul>
									@foreach($listCategory as $i)
										@if($i->parent_id==$item->id)
											<li><a href="{!! route('getCategory',$i->id) !!}">{!! $i->name !!} </a></li>
										@endif
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				@endif
			@endforeach

		</div><!--/category-products-->

		<div class="brands_products"><!--brands_products-->
			<h2>Thương hiệu</h2>
			<div class="brands-name">
				<ul class="nav nav-pills nav-stacked">
					@foreach($listBrand as $item)
						<li><a href="#">{!! $item->name !!}</a></li>
					@endforeach
				</ul>
			</div>
		</div><!--/brands_products-->

		<div class="price-range"><!--price-range-->
			<h2>Khoảng giá</h2>
			<form action="{!! route('filter') !!}" method="POST" >
				{!! csrf_field() !!}
				<div class="well textcenter">

					<input type="text" class="span2"  name="price" value="" data-slider-min="{!! $minPrice->price !!}" data-slider-max="{!! $maxPrice->price !!}" data-slider-step="10000" data-slider-value="[{!! $minPrice->price+10000 !!},{!! $maxPrice->price-10000 !!}]" id="sl2" ><br />

					<b class="pull-left">{!! $minPrice->price !!}</b> <b class="pull-right">{!! $maxPrice->price !!}</b>
					<div style="margin-top: 22px;">
						<button type="submit" class="btn btn-group">Lọc</button>
					</div>
				</div>
			</form>

		</div><!--/price-range-->

		<div class="shipping text-center"><!--shipping-->
			<img src="images/home/shipping.jpg" alt="" />
		</div><!--/shipping-->

	</div>
</div>