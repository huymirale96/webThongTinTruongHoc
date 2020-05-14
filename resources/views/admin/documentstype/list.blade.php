@extends('admin.layout.index')
@section('title','Thêm Loại Tin')
@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class=row style="background-color: #fff; padding: 10px;" >
        <h3 style="margin: 20px;">Danh Sách Loại Tài Liệu </h3>
        <a class="badge badge-success" href="{{ route('admin.documentstype.get_add_documentstype') }}" style="position: absolute; right: 130px; top: 136px; color: #fff; font-size: 20px;">Thêm Tài Liệu</a>
        <br>        

@if(session('success'))
<div class="alert alert-success alert-block  text-center">
	<strong id="alert">{{ session('success')}}</strong>
</div>

@endif
<div class='col-md-offset-1 col-md-11' style="background-color: #fff;">
    <table class="table table-bordered"> 
    <thead>
        <tr>
            <th>
                STT
            </th>
            <th>
                Tên Loại Tài Liệu
            </th>

            <th>
                Thao Tác
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($documentstypes as $key=>$documentstype)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $documentstype->name_type_document }}</td>
            <td> <a href="{{ route('admin.newstype.detele') }}?id={{ $documentstype->id }}">Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

</div>
</div>
<!-- /.container-fluid -->

@stop