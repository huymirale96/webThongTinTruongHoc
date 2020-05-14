@extends('admin.layout.index')
@section('title','Sửa Tin Tức')
@section('main')
<form action="{{ route('admin.news.post_updatenews') }}" method="POST" accept-charset="utf-8"
                                  enctype="multipart/form-data">
                                  @csrf
<div class='container-fluid'>
	<div class='row'>
		<h2 style="margin:10px;">Sửa Tin Tức</h2>
		<div class='col-md-12'>
            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                           
            <input type="hidden" value="{{ $news->id }}" name="id">
			<div class="form-group col-md-5">
				<label>Tiêu Đề:</label>
				<textarea type="text" name="description" rows="4" class="form-control">{{ $news->description }}</textarea>
			</div>
		
		    <div class='form-group col-md-5' style="margin-lefts: 12px;">
			    <label>Chọn Loại Tin:</label>
			    <select class='form-control' name='newsType'>
				@foreach($newsTypes as $newsType)
				<option value="{{ $newsType->id }}"   @if($news->newstype_id == $newsType->id)
                    selected 
                 @endif  >{{ $newsType->nametype }}</option>
				@endforeach
                </select>
                <label>Chọn Hình Ảnh:</label>
                <br>
                <div id="previewImage" >
                <img  style="width: 300px; height: 300px;" id="imageUpload" src="{{ asset('storage/news/'.$news->urlimage )}}">
                 </div>
                 <input id="firstImage" onchange="readURL(this);"  style="visibility:hidden_;"
                   type="file" name="firstImage">
            </div>
        </div>
		
		<div class='col-md-12'>
			<div class="form-group col-md-11">
				<label>Nội Dung:</label>
				  <textarea id="editor" name="content" class="ckeditor">{{ $news->content }}</textarea>
			</div>
		</div>
		<input type="submit" name="" class="btn btn-success" value="Cập Nhật">
	</div>
</div>
</form>



@stop