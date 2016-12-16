@extends('admin.layout.default')
@section('content')
<!-- <button style="margin-left: 700px;">Add thể loại</button> -->

<div class="row" >
    <div class="col-lg-12" >
        <h1 class="page-header" >THỂ LOẠI
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
    <!-- <div class="col-lg-12">
            <div class="add" style="margin-left: 895px; margin-bottom: 5px;" >
            <a class="btn btn-primary" href="/admin/getAddTheLoai" >Thêm thể loại<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
    </div> -->
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>THỂ LOẠI</th>
                <th>Thể loại cha</th>
                <th>Delete</th>
                <th>Edit</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($theloai as $tl)
            <tr class="odd gradeX" align="center" >
                <td>{{$tl->id_theloai}} </td>
                <td>{{$tl->ten}}</td>
                <td>
                @if($tl->parent_id ==0)
                    <?php 
                        echo "NULL";
                    ?>
                
                @else
                    <?php 
                        $theLoaiCha=DB::table('tbl_theloai')->where('id_theloai',$tl->parent_id)->get()->first();
                        echo $theLoaiCha->ten;
                    ?>
                @endif
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick=" return confirmDelete('Những bài báo thuộc thể loại {{$tl->ten}} cũng sẽ bị xóa.Bạn có chắc muốn xóa thể loại này không')" href="{{ URL::route('deleteTheLoai',$tl->id_theloai)}}" > Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ URL::route('editTheLoai',$tl->id_theloai)}}">Edit</a></td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

</div>
@stop