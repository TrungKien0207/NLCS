@extends('admin.layout.index')

@section('content');
<!-- Page Content -->
<div id="page-wrapper">
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại món ăn
                    <small>Danh sách</small>
                </h1>
            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">ID Loại Món</th>
                        <th class="text-center">Tên món ăn</th>
                        <th class="text-center">Tên không dấu</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center">Nội dung</th>
                        <th class="text-center">Xóa</th>
                        <th class="text-center">Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product as $pro)
                        <tr class="odd gradeX" align="center">
                            <td class="bg-info">{{$pro->id}}</td>
                            <td>{{$pro->idCategory}}</td>
                            <td class="bg-info">{{$pro->ten_sp}}</td>
                            <td>{{$pro->tenkd}}</td>
                            <td class="bg-info">{{$pro->anh_sp}}</td>
                            <td>{{$pro->content}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$pro->id}}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$pro->id}}">Sửa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection