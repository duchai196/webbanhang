@extends('admin.master')
@section('breadcrumb')
    Cập nhật sản phẩm
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @if(count($errors)>0)
                @foreach($errors->all() as $err)
                    <div class="alert alert-danger">{{$err}}</div>
                @endforeach
            @endif
            <div class="card">
                <div class="card-block">
                    <h3 class="box-title m-b-0">Chỉnh sửa tin tức</h3>
                    {{--<p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>--}}
                    <div class="row">
                        <div class="col-sm-8 col-xs-12">
                            <form action="{!! route('product.update',$product->id) !!}" method="POST">
                                {!! csrf_field() !!}
                                {!!method_field('PUT')!!}
                                <div class="form-group">
                                    <label for="title">Tiêu đề</label>
                                    <input type="text" name="name" class="form-control" id="title" value="{!!old('name'),(isset($product))? $product->name:null!!}">
                                </div>

                                <div class="form-group">
                                    <label>Danh mục</label>

                                    <select class="custom-select col-12" id="inlineFormCustomSelect" name="category_id">
                                        <option value="">Please choose..</option>
                                        @foreach($listCate as $item)
                                            <option value="{!! $item->id !!}"
                                                    {{($item->id==$product->category_id)? "selected":null}}

                                            >{!! $item->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Thương hiệu</label>

                                    <select class="custom-select col-12" id="inlineFormCustomSelect" name="brand_id">
                                        <option value="">Please choose..</option>
                                        @foreach($listBrand as $item)
                                            <option value="{!! $item->id !!}" {!! ($item->id==$product->brand_id)? "selected":null !!} >{!! $item->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Giá</label>

                                    <input type="number" name="price" id="inputPrice" class="form-control" value="{!!old('price'),(isset($product))? $product->price:null!!}"  >
                                </div>
                                <div class="form-group">
                                    <label>Giá khuyến mại</label>

                                    <input type="number" name="sale_price"  class="form-control"  id="inputSalePrice" value="{!!old('sale_price'),(isset($product))? $product->sale_price:null!!}"     >
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>

                                    <textarea name="short_description" class="form-control my-editor">{!!old('short_description'),(isset($product))? $product->short_description:null!!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả chi tiết</label>

                                    <textarea name="description" class="form-control my-editor">{!!old('description'),(isset($product))? $product->description:null!!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta description</label>

                                    <textarea name="meta_description" class="form-control my-editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta keywords</label>

                                    <textarea name="meta_keywords" class="form-control my-editor"></textarea>
                                </div>
                        </div>
                        <div class="col-sm-4">

                            <fieldset class="form-group">
                                <label>Ảnh đại diện</label>
                                <div class="input-group">
                                        <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white " >
                                        <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                        </span>
                                    <input id="thumbnail" class="form-control" type="text" name="image" value="{!!old('image'),isset($product)? $product->image:null!!}">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">

                            </fieldset>
                            <label>Ảnh chi tiết sản phẩm</label>

                            @foreach($imgDetails as $key=>$item)
                                <div class="">
                                    <div class="input-group ">
                            <span class="input-group-btn">
                                <a id="lfm{{$key}}" data-input="thumbnail{{$key}}" data-preview="holder{{$key}}" class="btn btn-custom text-white ">
                                  <i class="fa fa-picture-o"></i> Choose
                              </a>
                              </span>
                                        <input id="thumbnail{{$key}}" class="form-control" type="text" name="imageDetail[]" value="{{$item->image}}" >
                                    </div>
                                    <img id="holder{{$key}}" style="margin-top:15px;max-height:100px;">
                                </div>
                            @endforeach

                            @if(count($imgDetails)<5)
                                @for($i=0;$i<5-count($imgDetails);$i++)
                                    <div class="">
                                        <div class="input-group ">
                                            <span class="input-group-btn">
                                                <a id="a{{$i}}" data-input="b{{$i}}" data-preview="c{{$i}}" class="btn btn-custom text-white ">
                                                  <i class="fa fa-picture-o"></i> Choose
                                              </a>
                                              </span>
                                            <input id="b{{$i}}" class="form-control" type="text" name="imageDetail[]" >
                                        </div>
                                        <img id="c{{$i}}" style="margin-top:15px;max-height:100px;">
                                    </div>
                                @endfor
                            @endif


                            <div class="form-group">
                                <label>Trạng thái</label>
                                <div>
                                    <label class="custom-control custom-radio">
                                        <input id="radio1" name="status" type="radio" {{($product->status==1)?"checked":null}} class="custom-control-input" value="1">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Hiển thị</span>

                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio2" name="status" type="radio" class="custom-control-input" value="0" {{($product->status==0)?"checked":null}} >
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Ẩn</span>

                                    </label>
                                </div>
                            </div>
                            <div class="form-check">

                                <label class="custom-control custom-radio">
                                    <span class="custom-control-description">Sản phẩm nổi bật</span>
                                    <input id="radio3"  {{($product->featured==1)?"checked":null}}  name="featured" type="radio" class="custom-control-input" value="1">
                                    <span class="custom-control-indicator"></span>

                                </label>
                            </div>

                        </div>
                        <div class="col-sm-8">
                            <button type="button" class="btn btn-inverse waves-effect waves-light"><a href="{!! URL::previous() !!}" class="text-white">Hủy</a></button>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Cập nhật </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);

    </script>

    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>

        $('#lfm').filemanager('image');

        for (var i = 0; i < 5-{!! count($imgDetails)!!}; i++) {
            $('#a'+i).filemanager('image');
        }
        @foreach($imgDetails as $key=>$item)
             $('#lfm'+{{$key}}).filemanager('image');
        @endforeach

    </script>
@stop