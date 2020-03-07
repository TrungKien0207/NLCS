@extends('admin.layout.index')
 
@section('content')
	<!-- Page Content -->
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Loại món ăn
	                    <small>{{ isset($category->name ) ? $category->name  : ''}}</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <div class="col-lg-7" style="padding-bottom:120px">
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
					
	                <form action="admin/category/edit/{{$category->id}}" method="POST">
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" /> 
	                	{{csrf_field()}} <!-- có dòng này mới được submit -->
	                    <div class="form-group">
	                        <label>Tên loại món ăn</label>
	                        <input class="form-control" name="name" placeholder="Nhập tên loại món ăn" value="{{old('c_ten',isset($category->c_ten) ? $category->c_ten : '')}}" />
	                    </div>
	                    
	                    <button type="submit" class="btn btn-info">Sửa</button>
	                    <button type="reset" class="btn btn-info">Đặt lại</button>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
@endsection