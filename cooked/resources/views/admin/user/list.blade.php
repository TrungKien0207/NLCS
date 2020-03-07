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
                <h1 class="page-header">Nguyên liệu
                    <small>Danh sách</small>
                </h1>
            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">ID Món ăn</th>
                        <th class="text-center">Tên Nguyên liệu</th>
                        <th class="text-center">Tên không dấu</th>
                        <th class="text-center">Xóa</th>
                        <th class="text-center">Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($material as $ra)
                        <tr class="odd gradeX" align="center">
                            <td class="bg-info">{{$material->id}}</td>
                            <td>{{$material->idProduct}}</td>
                            <td class="bg-info">{{$material->ten_sp}}</td>
                            <td>{{$material->r_ten}}</td>
                            <td class="bg-info">{{$material->anh_sp}}</td>
                            <td>{{$material->r_tenkd}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/material/delete/{{$material->id}}"> Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/material/edit/{{$material->id}}">Sửa</a></td>
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