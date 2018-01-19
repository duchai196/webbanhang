@extends('admin.master')

@section('breadcrumb')
    Ảnh
@stop
@section('links')
    <a href="{!! route('slide.create') !!}" class="btn pull-right hidden-sm-down btn-success"> <i class="mdi mdi-plus-circle"></i> Thêm slider</a>
@stop

@section('content')
    <div class="row el-element-overlay" id="boxx">
        <div class="col-md-12" >
            <h4 class="card-title">Quản lý banner</h4>
            <h6 class="card-subtitle m-b-20 text-muted">you can make gallery like this</h6></div>
        @foreach($listSlide as $item)
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="el-card-item">
                        <div class="el-card-avatar el-overlay-1"> <img src="{!! $item->image !!}" alt="user" />
                            <div class="el-overlay">
                                <ul class="el-info">
                                    <li><a  class="btn default btn-outline " href="{!! route('slide.edit',$item->id)!!}"><i class="mdi mdi-lead-pencil"></i></a></li>
                                    <li><a  data-id="{!! $item->id !!}" class="btn default btn-outline delete" href="javascript:void(0);" ><i class="mdi mdi-delete"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="el-card-content">
                            <h3 class="box-title">{!! $item->title !!}</h3> <small>{!! $item->sub_title !!}</small>
                            <br/> </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
@section('script')


    <script>

        $(document).ready(function () {
            $(document).on('click','.delete',function () {
                if(confirm('Bạn có chắc muốn xóa?')){
                    var id = $(this).attr('data-id');
                    var url = '{!! route('slide.ajax')!!}';

                    $.ajax({
                        url:url,
                        type:'POST',
                        dataType:'json',
                        data:{id:id,action:'delete'}
                    })
                    .done(function(data) {
                        if (data == true)
                        {
                            $('#boxx').load(window.location.href+ " #boxx");
                            swal("Xóa thành công", "Ảnh đã được xóa :)", "success");

                        }
                        else
                        {
                            swal("Đã xảy ra lỗi", "", "error");
                        }

                    });
                }
            });
        });
    </script>
@stop