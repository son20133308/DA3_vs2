@extends('admin.layout.default')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">USER ADMIN
            <small>list</small>
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
    <!-- <div class="col-lg-12">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-2">
        </div>
        <div class="col-sm-2">
        </div>
        <div class="col-sm-2">
            <div class="add" style=" margin-bottom: 2px;"  >
            <a class="btn btn-primary" href="/admin/getAddUser" >Thêm tài khoản<span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div> -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Email</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $us)
            <tr class="odd gradeX" align="center" >
                <td>{{$us->id}} </td>
                <td>{{$us->name}}</td>
                <td>{{$us->email}}</td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a onclick=" return confirmDelete('Bạn có chắc muốn xóa tài khoản này không')" href="{{ URL::route('deleteUser',$us->id)}}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{URL::route('editUser',$us->id)}}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop