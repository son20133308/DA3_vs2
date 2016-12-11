@extends('admin.layout.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">ĐÁNH GIÁ
            <small>list</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>STT</th>
                <th>Email</th>
                <th>Nội dung</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
        	<?php
            $stt =0;
            ?>
           	@foreach($danhgia as $dg)
            <tr class="odd gradeX" align="center" >
                <td>{{$stt+=1}}</td>
                <td>{{$dg->email_khachhang}} </td>
                <td>{{$dg->noidung}} </td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a onclick=" return confirmDelete('Bạn có chắc muốn xóa đánh giá này không')" href=""> Delete</a></td>
            </tr>
            @endforeach
        
            
        </tbody>
    </table>
</div>
@stop
