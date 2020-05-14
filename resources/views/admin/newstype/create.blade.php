@extends('admin.layout.index')
@section('title','Thêm Loại Tin')
@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

<div class=row style="padding: 10px;" >
<h2>{{ $channels ?? ''}}</h2> 
<br>
<div class='col-md-offset-1 col-md-11'  style="background-color: #fff;">
    <form method="get" action="{{ route('admin.newstype.postcreate') }}">
        @csrf
    <div class="form-group">
        <label><h3>Nhập Tên Loại Tin Cần Thêm:</h3></label>
        <input name="nameNewsType" type="text" class="form-control">
        <br>
        <button class="btn btn-success" type="submit">Nhập</button>
    </div>
    </form>
</div>
</div>
</div>
<!-- /.container-fluid -->

@stop