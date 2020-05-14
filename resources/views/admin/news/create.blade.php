@extends('admin.layout.index')
@section('title','Thêm Tin Tức')
@section('main')

<form action="{{ route('admin.news.post_add_news') }}" method="POST" accept-charset="utf-8"
                                  enctype="multipart/form-data">
                                  @csrf
<div class='container-fluid'>
	<div class='row'>
		<h2 style="margin:10px;">Thêm Tin Tức</h2>
		@if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block  text-center">
                                    <strong id="alert">{{ $message }}</strong>
                                </div>
							@endif
							@if ($message = Session::get('error'))
							<div class="alert alert-warning alert-block  text-center">
								<strong id="alert">{{ $message }}</strong>
							</div>
						@endif
		<div class='col-md-12'>
			<div class="form-group col-md-11">
				<label>Tiêu Đề:</label>
				<textarea type="text" name="description" rows="2"
				class="form-control"></textarea>
			</div>
		</div>
		<div class='form-group col-md-6' style="margin-left: 12px;">
			<label>Chọn Loại Tin:</label>
			<select class='form-control' name='newsType'>
				@foreach($newsTypes as $newsType)
				<option value="{{ $newsType->id }}">{{ $newsType->nametype }}</option>
				@endforeach
			</select>
		</div>
		<div class='col-md-4'>
			<label>Chọn Hình Ảnh:</label>
			<br>
			<input type='file' name='firstImage' class='form-csontrol'>
		</div>
		<div class='col-md-12'>
			<div class="form-group col-md-11">
				<label>Nội Dung:</label>
				  <textarea id="editor" name="content" class="ckeditor"></textarea>
			</div>
		</div>
		<input type="submit" name="" class="btn btn-success" value="Thêm Tin">
	</div>
</div>
</form>



@stop