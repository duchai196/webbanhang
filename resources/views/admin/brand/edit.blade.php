@extends('admin.master')
@section('breadcrumb')
    Sửa thương hiệu
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
                    <h3 class="box-title m-b-0">Nhập thông tin để sửa nhãn hiệu</h3>
                    {{--<p class="text-muted m-b-30 font-13"> Bootstrap Elements </p>--}}
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{!! route('brand.update',$brand->id) !!}" method="POST">
                                {!! csrf_field() !!}
                                {!! method_field('PUT') !!}
                                <div class="form-group">
                                    <label for="title">Tên thương hiệu</label>
                                    <input type="text" name="name" class="form-control " id="title" value="{!! old('name'),isset($brand)? $brand->name:null !!}" >
                                </div>

                                <fieldset class="form-group">
                                    <label>Logo</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default ">
                                        <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="logo" value="{!! old('logo'),isset($brand)? $brand->logo:null!!}">
                                    </div>
                                    @if(($brand->logo))
                                        <img src="{!! $brand->logo !!}" alt="" width=" 100px" height="auto">;
                                        @endif
                                    <img id="holder" style="margin-top:15px;max-height:100px;">

                                </fieldset>

                                <button type="button" class="btn btn-inverse waves-effect waves-light"><a href="{!! URL::previous() !!}" class="text-white">Hủy</a></button>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Cập nhật thương hiệu</button>
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