@extends('admin.layout.default')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">BÀI BÁO
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
	    <!-- /.col-lg-12 -->
	    <div class="col-lg-7" style="padding-bottom:120px">
	    	@foreach($baibao as $bb)
	        <form action="{{ URL::route('postEditBaiBao',$bb->id_baibao)}}" method="POST">
	        	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	        	
	            <div class="form-group">
	                <label>Thể loại bài báo</label>
	                <select class="form-control" name="ten">
	                	<?php
	                        $theloai= DB::table('tbl_theloai')->where('id_theloai',$bb->id_theloai)->first();
	                	?>
	                    <option value="{{$theloai->id_theloai}}">{{$theloai->ten}}</option>
						@foreach($theloais as $tl)
							@if($tl->id_theloai !== $theloai->id_theloai)
	                    	<option value="{{$tl->id_theloai}}">{{$tl->ten}}</option>
	                    	@endif
	                    @endforeach
	                </select>
	            </div>
	            <div class="form-group">
	                <label>Url image</label>
	                
	                <input class="form-control" name="url_image" value="{{$bb->url_image}}" />
	            </div>
	            <div class="form-group">
	                <label>Tiêu đề</label>
	                <input class="form-control" name="title_baibao" value="{{$bb->title_baibao}}" />
	            </div>
	            <div class="form-group">
	                <label>Nội dung</label>
	                <textarea class="form-control" rows="3" name="content">{{$bb->content}}</textarea>
	            </div>
	            <button type="submit" class="btn btn-default">Edit</button>
	            <button type="reset" class="btn btn-default">Reset</button>
	            
	        <form>
	        @endforeach
	    </div>
	</div>
@stop
