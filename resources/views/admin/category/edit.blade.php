@extends('admin.master')
@section('breadcrumb')
    Danh mục sản phẩm
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <h3 class="box-title m-b-0">Form sửa thông tin danh mục</h3>
                    <p class="text-muted m-b-30 font-13"> Thêm danh mục</p>
                    <div class="row">

                        @if(count($errors)>0)
                            @foreach($errors->all() as $err)
                                <div class="alert alert-danger">{{$err}}</div>
                            @endforeach
                        @endif
                        <div class="col-sm-12 col-xs-12">
                            <form action="{!! route('category.update',$category->id) !!}" method="POST">
                                {!! csrf_field() !!}
                                {!! method_field('PATCH') !!}
                                <div class="form-check">
                                    <label>Loại danh mục</label>
                                    <div>
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="category_type" value="post" type="radio" class="custom-control-input" {!! ($category->category_type=="post")? "checked":null !!}>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Bài viết</span>

                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="category_type" type="radio" value="product" class="custom-control-input" {!! ($category->category_type=="product")? "checked":null !!}>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Sản phẩm</span>

                                        </label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="name">Tên danh mục</label>
                                    <input type="text" class="form-control" id="name" placeholder="eg: Cầu lông" name="name" value="{!! old('name'),isset($category->name)? $category->name:null !!}">
                                </div>
                                <div class="form-group">
                                    <label>Danh mục cha</label>

                                    <select class="custom-select col-12" id="inlineFormCustomSelect" name="parent_id">
                                        @foreach($listCate as $item)
                                            <option value="{!! $item->id !!}" {!!
                                             ($item->id==$category->parent_id)? "selected":null!!}>{!! $item->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="button" class="btn btn-inverse waves-effect waves-light" ><a href="{{URL::previous()}}" class="text-white">Hủy</a>  </button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Thêm danh mục</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function() {
            $("input[name='category_type']").change(function () {
                var cate_type = $(this).val();
                var url='{!! route('category.ajax') !!}';
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'text',
                    data: {cate_type:cate_type,action:'loadCate'},
                })
                    .done(function(data) {
                        $('#inlineFormCustomSelect').html(data);
                    })
            });
        });
    </script>
@stop