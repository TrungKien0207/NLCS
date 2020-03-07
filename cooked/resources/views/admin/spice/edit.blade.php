@extends('admin.layout.index')

@section('content')
	<!-- Page Content -->
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">Gia vị
	                    <small>{{ isset( $spice->name ) ? $spice->name  : ''}}</small>
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
					
	                <form action="admin/spice/edit/{{$spice->id}}" method="POST">
	                	<input type="hidden" name="_token" value="{{csrf_token()}}" /> 
	                	{{csrf_field()}} <!-- có dòng này mới được submit -->

	                	<div class="form-group">
	                        <label><h4>Món ăn</h4></label>
	                        <select class="form-control" name="idPD" placeholder="Nhập tên món ăn" value="{{old('idPD',isset($spice->idPD) ? $spice->idPD : '')}}">
	                        	<option value="">Món ăn</option>
				                @if(isset($product))
				                    @foreach($product as $pro)
				   						<option value="{{$pro->id}}" {{old('idPD',isset($spice->idPD) ? $spice->idPD : '') == ($pro->id) ? 'selected' : ''}}>{{$pro->ten_sp}}</option>
				                    @endforeach
				                @endif
	                        </select>
	                    </div>

	                    <div class="form-group">
	                        <label>Tên món ăn</label>
	                        <input class="form-control" name="name" placeholder="Nhập tên loại món ăn" value="{{old('s_ten',isset($spice->s_ten) ? $spice->s_ten : '')}}" />
	                    </div>

	                    <button type="submit" class="btn btn-info">Sửa</button>
	                    <button type="reset" class="btn btn-info">Đặt lại</button>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
@endsection