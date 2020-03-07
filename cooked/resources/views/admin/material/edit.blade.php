@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Nguyên liệu
	                    <small>{{ isset($material->r_ten ) ? $material->r_ten  : ''}}</small>
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
					
	                <form action="admin/material/edit/{{$material->id}}" method="POST" enctype="multipart/form-data">
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" /> 
	                	{{csrf_field()}} <!-- có dòng này mới được submit -->

	                	<div class="form-group">
	                        <label><h4>Món ăn</h4></label>
	                        <select class="form-control" name="idProduct" placeholder="Nhập tên món ăn" value="{{old('idProduct',isset($material->idProduct) ? $material->idProduct : '')}}">
	                       
				                @if(isset($product))
				                    @foreach($product as $pro)
										<option value="{{$pro->id}}" {{old('idProduct',isset($material->idProduct) ? $material->idProduct : '') == ($pro->id) ? 'selected' : ''}}>{{$pro->ten_sp}} </option>
				                    @endforeach
								@endif		               
				               
	                        </select>
	                    </div>

	                    <div class="form-group">
	                        <label>Tên món ăn</label>
	                        <input class="form-control" name="name" placeholder="Nhập tên loại món ăn" value="{{old('r_ten',isset($material->r_ten) ? $material->r_ten : '')}}" />
	                    </div>

	                    <button type="submit" class="btn btn-info">Sửa</button>
	                    <button type="reset" class="btn btn-info">Đặt lại</button>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
@endsection