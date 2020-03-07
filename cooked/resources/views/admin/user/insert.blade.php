@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
	<div id="page-wrapper">
	    <div class="container-fluid ">
	        <div class="row ">
	            <div class="col-lg-12 ">
	                <h1 class="page-header">Nguyên liệu
	                    <small>Thêm</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <div class="col-lg-6 " style="padding-bottom:120px">
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								{{$err}} <br>
							@endforeach
						</div>
					@endif

					@if(session('thongbao'))
						<div class="alert alert-success">
							{{session('thongbao')}}
						</div>
					@endif
					
	                <form action="admin/material/insert" method="post">
	                	@csrf
	                	<div class="form-group">
	                        <label><h4>Món ăn</h4></label>
	                        <select class="form-control" name="idProduct" placeholder="Nhập tên món ăn">
	                        	<option value="">Loại món ăn</option>
				                @if(isset($product))
				                    @foreach($product as $pro)
				   						<option value="{{$pro->id}}">{{$pro->ten_sp}}</option>
				                    @endforeach
				                @endif
	                        </select>
	                    </div>
 	                    <div class="form-group">
	                        <label><h4>Tên nguyên liệu</h4></label>
	                        <input class="form-control" name="name" placeholder="Nhập tên nguyên liệu" />
	                    </div>

	                    <button type="submit" class="btn btn-info">Thêm</button>
	                    <button type="reset" class="btn btn-info">Đặt lại</button>
	                </form>
	            </div>
	        </div>
	        <!-- /.row -->
	    </div>
	    <!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
@endsection