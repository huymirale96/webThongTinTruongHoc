@extends('admin.layout.index')
@section('title','Thêm Loại Tài Liệu')
@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

<div class=row style="height: 600px; padding: 10px;" >

<br>
<div class='col-md-offset-1 col-md-11'  style="background-color: #fff;">
	<form method="post" action="{{ route('admin.documentstype.post_add_documentstype') }}">
		@csrf
    <div class="form-group">
        <label><h3>Nhập Tên Loại Tài Liệu Cần Thêm:</h3></label>
        <input name="nameDocumentType" type="text" class="form-control">
        <br>
        <button class="btn btn-success" type="submit">Nhập</button>
    </div>
    </form>
</div>
</div>
</div>
<!-- /.container-fluid -->

@stop