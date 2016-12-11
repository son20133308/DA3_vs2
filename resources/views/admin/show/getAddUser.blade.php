@extends('admin.layout.default')
@section('content')
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Tài khoản
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
	        <form action="/admin/postAddUser" method="POST">
	        	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	            
	           
	            <div class="form-group">
	                <label>Email</label>
	                <input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="Vui lòng nhập Email" />
	            </div>
	            <div class="form-group">
	                <label>Username</label>
	                <input class="form-control" name="name" value="{{old('name')}}" placeholder="Vui lòng nhập Username" />
	            </div>
	            <div class="form-group">
	                <label>Password</label>
	                <input class="form-control" type="password" name="password" placeholder="Vui lòng nhập Password| Password trên 6 ký tự" />
	            </div>
	            <div class="form-group">
	                <label>Confirm Password</label>
	                <input class="form-control" type="password" name="confirm_password" placeholder="Vui lòng nhập lại Password " />
	            </div>
	            <div class="form-group">
	                <label>SupperAdmin</label>
	                <select class="form-control" name="role">
	                    <option value="0">0</option>
	                    <option value="1">1</option>
	                </select>
	            </div>
	            <button type="submit" class="btn btn-default">Category Add</button>
	            <button type="reset" class="btn btn-default">Reset</button>
	        <form>
	    </div>
	</div>
@stop
