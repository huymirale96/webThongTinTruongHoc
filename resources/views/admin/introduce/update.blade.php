@extends('admin.layout.index')
@section('title','Sửa Giới Thiệu')
@section('main')
<form action="{{ route('admin.introduces.updateintroduce') }}" method="POST" accept-charset="utf-8"
    enctype="multipart/form-data">
    @csrf
    <div class='container'>
        <div class='row'>
            <h2 style="margin:auto;">Sửa Giới Thiệu</h2>
            <div class='col-md-12' style="margin-left:20px;">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <input type="hidden" value="{{ $introduce->id }}" name="id">
            <div class="col-md-12" style="margin-left:14px; margin-bottom: 30px">
                <label>Tiêu Đề:</label>
                <textarea type="text" name="description" rows="1"
                    class="form-control">{{ $introduce->description }}</textarea>
            </div>

            <div class='col-md-12'>
                <div class="form-group col-md-11">
                    <label>Nội Dung:</label>
                    <textarea id="editor" name="content" class="ckeditor">{{ $introduce->content }}</textarea>
                </div>
                <input type="submit" name="" class="btn btn-success" value="Cập Nhật">
            </div>


        </div>
    </div>
</form>



@stop