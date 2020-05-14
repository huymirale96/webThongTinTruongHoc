@extends('admin.layout.index')
@section('title','Thêm Giới Thiệu ')
@section('main')
<form action="{{ route('admin.introduces.post_add_introduces') }}" method="POST" accept-charset="utf-8"
                                  enctype="multipart/form-data">
                                  @csrf
<div class='container-fluid'>
	<div class=row style="background-color: #fff; padding: 10px;" >
        <h3 style="margin: 20px;">Thêm Giới Thiệu </h3>
		@if ($errors->any())
		<div class="alert alert-warning">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
        <br>        
		<div class='col-md-12'>
			<div class="form-group col-md-11">
				<label>Tiêu Đề:</label>
				<input type="text" name="descriptionIntroduce" class="form-control"/>
			</div>
		</div>
		
		<div class='col-md-12'>
			<div class="form-group col-md-11">
				<label>Nội Dung:</label>
				  <textarea id="editor" name="contentIntroduce" class="ckeditor"></textarea>
			</div>
		</div>
		<input type="submit" name="" class="btn btn-success" value="Thêm">
	</div>
</div>
</form>



@stop