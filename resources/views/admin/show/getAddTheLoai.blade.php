@extends('admin.layout.default')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">THỂ LOẠI
	            <small>add</small>
	        </h1>
	    </div>
	    <div class="col-lg-12">
			@if( Session::has('flash_message'))
				<div class="alert alert-{{ Session::get('flash_level')}}">
					{{ Session::get('flash_message')}}
				</div>
			@endif
	    </div>
	    <!-- /.col-lg-12 -->
	     <div class="col-lg-12">
			@if( count($errors) > 0)
	    	<div class="alert alert-danger">
	    		<ul>
	    			@foreach($errors->all() as $error)
	    				<li>{{$error}}</li>
	    			@endforeach
	    		</ul>
	    	</div>
	    @endif
	    </div>
	    

	    <div class="col-lg-7" style="padding-bottom:120px">
	        <form action="/admin/postAddTheLoai" method="POST">
	        	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	            <div class="form-group">
	                <label>THỂ LOẠI CHA</label>
	                <select class="form-control" name="theLoaiCha">
	                    <option value="0">Chọn thể loại</option>
	                    @foreach($theLoaiCha as $tlc)
	                    <option value="{{$tlc->id_theloai}}">{{$tlc->ten}}</option>
	                    @endforeach
	                </select>
	            </div>
	            <!-- <div class="form-group">
	                <label>ID THỂ LOẠI</label>
	                <input class="form-control" name="id_theloai" placeholder="Please Enter Category Name" value="{{old('id_theloai')}}" />
	            </div> -->
	            <div class="form-group">
	                <label>TÊN THỂ LOẠI</label>
	                <input class="form-control" name="ten" placeholder="Please Enter Category Order" value="{{old('ten')}}" />
	            </div>
	            <div class="form-group">
	                <label>ẨN DANH</label>
	                <input class="form-control" name="slug" placeholder="Please Enter Category Keywords" value="{{old('slug')}}" />
	            </div>
	            <button type="submit" class="btn btn-default">Add</button>
	            <button type="reset" class="btn btn-default">Reset</button>
	        <form>
	    </div>
	</div>
@stop
