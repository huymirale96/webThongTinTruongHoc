@extends('admin.layout.index')
@section('title','Thêm Tài Liệu')
@section('main')

<form action="{{ route('admin.documentst.post_add_documents') }}" method="POST" accept-charset="utf-8"
                                  enctype="multipart/form-data">
                                  @csrf
<div class='container-fluid'>
	<div class='row'>
		
		<h2 style="margin:10px;">Thêm Tài Liệu</h2>
		
		<div class='col-md-12'>
			@if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
			<div class="form-group col-md-11">
				<label>Tên Tài Liệu:</label>
				<input name="documents_name" type="text" class="form-control" placeholder="Nhập Tên Tài Liệu" value="{{ old('documents_name') }}">
			</div>
		</div>
		<div class='form-group col-md-6' style="margin-left: 12px;">
			<label>Chọn Loại Tài Liệu</label>
			<select class='form-control' name='documents_type'>
				@foreach($documentsTypes as $documentsType)
				<option value="{{ $documentsType->id }}">{{ $documentsType->name_type_document }}</option>
				@endforeach
			</select>
			<br>
		
		<input type="submit" name="" class="btn btn-success" value="Thêm Tài Liệu">
		</div>
		<div class='col-md-4'>
			<label>Chọn Tài Liệu:</label>
			<br>
			<input type='file' name='documents_file' class='form-csontrol'>
		</div>
		
	</div>
</div>
</form>



@stop