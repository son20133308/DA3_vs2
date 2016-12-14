@extends('admin.layout.default')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">THỂ LOẠI
	            <small>edit</small>
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
	    	@foreach($theloai as $tl)
	        <form action="{{ URL::route('postEditTheLoai',$tl->id_theloai)}}" method="POST">
	        	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	            <div class="form-group">
	                <label>THỂ LOẠI CHA</label>
	                <select class="form-control" name="theLoaiCha">
	                	@if($tl->parent_id ==0){
	                    <option value="0">Không có thể loại cha</option>
	                    }
	                    @endif
	                    <?php  
	                    	$tlc = DB::table('tbl_theloai')->where('id_theloai',$tl->parent_id)->first();
	                    ?>
	                    <option value="{{$tl->parent_id}}">{{$tlc->ten}}</option>
	                    @foreach($theloais as $tls)
		                    @if($tls->id_theloai !== $tl->parent_id)
		                    {
		                    <option value="{{$tls->id_theloai}}">{{$tls->ten}}</option>

		                    }
		                    @endif
	                    @endforeach
	                    <option value="0">Không có thể loại cha</option>
	                </select>
	            </div>
	            <!-- <div class="form-group">
	                <label>ID THỂ LOẠI</label>
	                <input class="form-control" name="id_theloai" placeholder="Please Enter Category Name" value="" />
	            </div> -->
	            <div class="form-group">
	                <label>TÊN THỂ LOẠI</label>
	                <input class="form-control" name="ten" placeholder="Vui lòng nhập tên thể loại" value="{{$tl->ten}}" />
	            </div>
	            <div class="form-group">
	                <label>ẨN DANH</label>
	                <input class="form-control" name="slug" placeholder="Vui lòng nhập ẩn danh cho thể loại" value="{{$tl->slug}}" />
	            </div>
	            <button type="submit" class="btn btn-default">Add</button>
	            <button type="reset" class="btn btn-default">Reset</button>
	        <form>
	        @endforeach
	    </div>
	</div>
@stop
