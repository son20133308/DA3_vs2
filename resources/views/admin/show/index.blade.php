@extends('admin.layout.default')
@section('content')
<div class="col-lg-12">
	@if( Session::has('flash_message'))
		<div class="alert alert-{{ Session::get('flash_level')}}">
			{{ Session::get('flash_message')}}
		</div>
	@endif
</div>
<h1>Welcom ADMIN {{Auth::user()->name}}</h1>
@endsection()