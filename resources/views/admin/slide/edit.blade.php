@extends('admin.master')
@section('breadcrumb')
   Chỉnh sửa slide
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
                    <h3 class="box-title m-b-0">Nhập thông tin để chỉnh sửa slide</h3>
                    <p class="text-muted m-b-30 font-13"> Slide ảnh ở trang chủ </p>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{!! route('slide.update',$slide->id) !!}" method="POST">
                                {!! csrf_field() !!}
                                {!! method_field('PUT') !!}
                                <div class="form-group">
                                    <label for="title">Tiêu đề</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{!! old('title'),isset($slide)? $slide->title:null !!}" >
                                </div>
                                <div class="form-group">
                                    <label for="sub_title">Tóm tắt</label>
                                    <input type="text" name="sub_title" class="form-control" id="sub_title"  value="{!! old('sub_title'),isset($slide)? $slide->sub_title:null !!}">
                                </div>

                                <div class="form-group">
                                    <label>Nội dung</label>

                                    <textarea name="descriptions" class="form-control my-editor">  {!! old('descriptions'),isset($slide)? $slide->descriptions:null !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title_link">Tên nút</label>
                                    <input type="text" name="title_link" class="form-control" id="title_link"  value="{!! old('title_link'),isset($slide)? $slide->title_link:null !!}">
                                </div>
                                <div class="form-group">
                                    <label for="link">link</label>
                                    <input type="text" name="link" class="form-control" id="link" value="{!! old('link'),isset($slide)? $slide->link:null !!}" >
                                </div>


                                <fieldset class="form-group">
                                    <label>Chọn ảnh đại diện</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn  ">
                                        <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="image" value="{!! old('image'),isset($slide)? $slide->image:null !!}">
                                    </div>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">

                                </fieldset>
                                <img src="{{$slide->image}}"  class="img-responsive" alt="">
                                <div class="form-group">
                                    <label>Dạng slide</label>
                                    <div>
                                        <label class="custom-control custom-radio">
                                            <input id="type1" name="type" type="radio" class="custom-control-input" value="1" {!! ($slide->type==1)? "checked":null !!}>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Slide</span>

                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="type2" name="type" type="radio" class="custom-control-input" value="0" {!! ($slide->type==0)? "checked":null !!}>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Sidebar</span>

                                        </label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <div>
                                        <label class="custom-control custom-radio">
                                            <input id="radio1" name="status" type="radio" class="custom-control-input" value="1" {!! ($slide->status==1)? "checked":null !!}>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Hiển thị</span>

                                        </label>
                                        <label class="custom-control custom-radio">
                                            <input id="radio2" name="status" type="radio" class="custom-control-input" value="0" {!! ($slide->status==0)? "checked":null !!}>
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Ẩn</span>

                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label class="custom-control "> Thứ tự </label>

                                    <input id="radio3" name="order" type="number" min="0" max="255"  class="form-control" value="{!! old('order'),isset($slide)? $slide->order:null !!}">



                                </div>


                                <button type="button" class="btn btn-inverse waves-effect waves-light"><a href="{!! URL::previous() !!}" class="text-white">Hủy</a></button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Thêm slide</button>
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
    <script type="text/javascript">
        $('#lfm').filemanager('image');

    </script>

@stop