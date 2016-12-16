@extends('admin.layout.default')
@section ('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">BÀI BÁO
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
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>STT</th>
                <th>Thể loại</th>
                <th>URL</th>
                <th>title bài báo</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        
        <tbody>
        	<?php
            $stt =0;
            ?>
           	@foreach($baibao as $bb)
            <tr class="odd gradeX" align="center" >
                <td>{{$stt+=1}}</td>
                
                <td>    
                    @if($bb->id_theloai ==0)
                    {{None}}
                    @else
                        <?php 
                        $theloai= DB::table('tbl_theloai')->where('id_theloai',$bb->id_theloai)->first();
                        echo $theloai->ten;
                        ?>
                    
                    @endif
                
                </td>
                <td><a href="{{$bb->url_baibao}}" target="_blank" style="color: blue;">Link ...</a> </td>
                <td>{{text_limit($bb->title_baibao,13)}}</td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a onclick=" return confirmDelete('Bạn có chắc muốn xóa bài báo này không')" href="{{ URL::route('deleteBaiBao',$bb->id_baibao)}}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ URL::route('editBaiBao',$bb->id_baibao)}}">Edit</a></td>
            </tr>
            @endforeach
        
            
        </tbody>
    </table>
</div>
@stop