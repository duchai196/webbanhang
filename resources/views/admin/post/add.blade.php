@extends('admin.master')
@section('breadcrumb')
    Thêm tin tức
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
                    <h3 class="box-title m-b-0">Nhập thông tin để thêm tin tức</h3>
                    {{--<p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>--}}
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{!! route('post.store') !!}" method="POST">
                            {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="title">Tiêu đề</label>
                                    <input type="text" name="title" class="form-control" id="title" >
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Tóm tắt</label>
                                    <input type="text" name="excerpt" class="form-control" id="excerpt" >
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>

                                    <select class="custom-select col-12" id="inlineFormCustomSelect" name="category_id">
                                        <option value="">Please choose..</option>
                                        @foreach($listCate as $item)
                                            <option value="{!! $item->id !!}" >{!! $item->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>Nội dung</label>

                                     <textarea name="body" class="form-control my-editor"></textarea>
                                </div>


                                <fieldset class="form-group">
                                    <label>Chọn ảnh đại diện</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success ">
                                        <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="image">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">

                                </fieldset>



                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <div>
                                    <label class="custom-control custom-radio">
                                        <input id="radio1" name="status" type="radio" class="custom-control-input" value="1">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Hiển thị</span>

                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio2" name="status" type="radio" class="custom-control-input" value="0">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Ẩn</span>

                                    </label>
                                    </div>
                                </div>
                                <div class="form-check">

                                    <label class="custom-control custom-radio">
                                        <span class="custom-control-description">Bài viết nổi bật</span>
                                        <input id="radio3" name="featured" type="radio" class="custom-control-input" value="1">
                                        <span class="custom-control-indicator"></span>

                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Meta description</label>

                                    <textarea name="meta_description" class="form-control my-editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta description</label>

                                    <textarea name="meta_keywords" class="form-control my-editor"></textarea>
                                </div>
                                <button type="button" class="btn btn-inverse waves-effect waves-light"><a href="{!! URL::previous() !!}" class="text-white">Hủy</a></button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Thêm bài viêt</button>
                            </form>
                        </div>
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
    $('#lfm').filemanager('image');
@stop