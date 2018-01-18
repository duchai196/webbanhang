@extends('admin.master')
@section('breadcrumb')
    Sản phẩm
@stop
@section('links')
    <a href="{!! route('product.create') !!}" class="btn pull-right hidden-sm-down btn-success"> <i class="mdi mdi-plus-circle"></i> Thêm sản phẩm</a>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="cart">
                <div class="card-block">

                    <h4 class="card-title">Xuất dữ liệu</h4>
                    <h6 class="card-subtitle">Copy, CSV, Excel, PDF & Print</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Avatar</th>
                                <th>Danh mục</th>
                                <th>Giá</th>
                                <th>Nổi bật</th>
                                <th style="text-align: center" >Hành động</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($listProduct as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{$item->image}}" alt="" width="90px" height="60px"></td>
                                    <td><?php  $name=DB::table('categories')->select('name')->where([['id',$item->category_id],['category_type','product']])->get();
                                        foreach ($name as $i){
                                            echo $i->name;
                                        }
                                        ?>
                                    </td>
                
                                    <td>{!! $item->price !!}</td>
                                    <td>{!! ($item->featured==1)?"Có":"Không" !!}</td>
                                    <td style="text-align: center">
                                        <a href="{{route('product.edit',$item->id)}}"><i class="mdi mdi-lead-pencil"></i></a>
                                        <a href="javascript:void(0)" data-id={!! $item->id !!} class="delete"><i class="mdi mdi-delete"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });



                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $(document).ready(function () {
            $(document).on('click','.delete',function () {
                if(confirm('Bạn có chắc muốn xóa?')){
                    var id = $(this).attr('data-id');
                    var url = '{!! route('product.ajax')!!}';

                    $.ajax({
                        url:url,
                        type:'POST',
                        dataType:'json',
                        data:{id:id,action:'delete'}
                    })
                        .done(function(data){
                            $('#example23').load(window.location.href+ " #example23");
                            swal("Xóa thành công", "Sản phẩm đã được xóa :)", "success");
                        })
                        .fail(function() {
                            swal("Đã xảy ra lỗi", "Sản phẩm chưa được xóa :)", "error");
                        });
                }
            });
        });
    </script>
@stop