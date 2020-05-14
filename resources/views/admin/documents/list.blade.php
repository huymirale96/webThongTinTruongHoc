@extends('admin.layout.index')
@section('title','Danh Sách Tài Liệu')
@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

<div class=row style="background-color: #fff; padding: 10px;" >
<h3 style="margin: 20px;">Danh Sách Tài Liệu </h3>
<a class="badge badge-success" href="{{ route('admin.documents.get_add_documents') }}" style="position: absolute; right: 130px; top: 136px; color: #fff; font-size: 20px;">Thêm Tài Liệu</a>
<br>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
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
                Tên Tài Liệu
			</th>
			<th>
                Loại Tài Liệu
            </th>

            <th>
                Người Đăng
            </th>
            <th>
                Trạng Thái
            </th>
            <th>
                Thời Gian Tạo
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($documents as $key=>$value)
        <tr>
            <td>{{ $key+1 }}</td>
            <td><a href="{{ asset('storage/documents/'.$value->url_documents) }}">{{ $value->name_documents }}</a></td>
            <td>{{ $value->documentstype['name_type_document'] }}</td>
            <td>{{ $value->account['fullname'] }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{ $value->created_at }}</td>
            <td>
                @if($value->deleted_at == null) 
                 <a href="{{ route('admin.documents.delete').'?id='.$value->id }}" class="badge badge-info">Xóa</a>
                 @endif
                 @if($value->deleted_at != null) 
                <a href="{{ route('admin.documents.restore').'?id='.$value->id }}" class="badge badge-warning ">Khôi Phục</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{ $documents->links() }}
</div>
</div>
</div>
<!-- /.container-fluid -->

@stop