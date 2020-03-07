@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
	<div id="page-wrapper">
	    <div class="container-fluid ">
	        <div class="row ">
	            <div class="col-lg-12 ">
	                <h1 class="page-header">Gia vị
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
					
	                <form action="admin/spice/insert" method="POST">
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" /> 
	                	{{csrf_field()}} <!-- có dòng này mới được submit -->
	                	<div class="form-group">
	                        <label><h4>Món ăn</h4></label>
	                        <select class="form-control" name="idPD" placeholder="Nhập tên món ăn">
	                        	<option value="">Món ăn</option>
				                @if(isset($product))
				                    @foreach($product as $pro)
				   						<option value="{{$pro->id}}">{{$pro->ten_sp}}</option>
				                    @endforeach
				                @endif
	                        </select>
	                    </div>
 	                    <div class="form-group">
	                        <label><h4>Tên gia vị</h4></label>
	                        <input class="form-control" name="name" placeholder="Nhập tên gia vị" />
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