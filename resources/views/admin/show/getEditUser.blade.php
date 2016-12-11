@extends('admin.layout.default')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Tài khoản
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
	    </div>
	    @endif
	    <!-- /.col-lg-12 -->
	    <div class="col-lg-7" style="padding-bottom:120px">
	    	@foreach($user as $us)
	        <form action="{{ URL::route('postEditUser',$us->id)}}" method="POST">
	        	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	            <div class="form-group">
	                <label>Tài khoản</label>
	                <input class="form-control" name="name" value="{{$us->name}}" />
	            </div>
	            <div class="form-group">
	                <label>Mật khẩu</label>
	                <input class="form-control" type="password" name="password"/>
	            </div>
	            <div class="form-group">
	                <label>Email</label>
	                <input class="form-control" type="email" name="email" value="{{$us->email}}" />
	            </div>
	            <div class="form-group">
	                <label>Key</label>
	                <select class="form-control" name="role">
	                    <option value="0">0</option>
	                    <option value="1">1</option>
	                </select>
	            </div>
	            <button type="submit" class="btn btn-default">Category Edit</button>
	            <button type="reset" class="btn btn-default">Reset</button>
	            
	        <form>
	        @endforeach
	    </div>
	</div>
@stop
