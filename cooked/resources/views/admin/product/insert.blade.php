@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
	<div id="page-wrapper">
	    <div class="container-fluid ">
	        <div class="row ">
	            <div class="col-lg-12 ">
	                <h1 class="page-header">Món ăn
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

	                <form action="admin/product/insert" method="POST">
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" /> 
	                	{{csrf_field()}} <!-- có dòng này mới được submit -->
	                	<div class="form-group">
	                        <label><h4>Loại món ăn</h4></label>
	                        <select class="form-control" name="idCategory" placeholder="Nhập tên món ăn">
	                        	<option value="">Loại món ăn</option>
				                @if(isset($category))
				                    @foreach($category as $categorys)
				   						<option value="{{$categorys->id}}">{{$categorys->c_ten}}</option>
				                    @endforeach
				                @endif
	                        </select>
	                    </div>
 	                    <div class="form-group">
	                        <label><h4>Tên món ăn</h4></label>
	                        <input class="form-control" name="name" placeholder="Nhập tên món ăn" />
	                    </div>
	                    <div class="form-group">
	                        <label><h4>Hình ảnh</h4></label>
	                        <input type="file" class="form-control-file" name="img"/>
	                    </div>
	                    <div class="form-group">
	                        <label><h4>Nội dung</h4></label>
	                        <input class="form-control" name="content" placeholder="Nhập nội dung món ăn" />
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