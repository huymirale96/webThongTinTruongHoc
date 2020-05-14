@extends('admin.layout.index')
@section('title','Thêm Loại Tin')
@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

<div class=row style="background-color: #fff; padding: 10px;" >
    <h3 style="margin: 20px;">Danh Sách Loại Tin </h3> {{ $test1 ?? 'k co data test1' }}
    <a class="badge badge-success" href="{{ route('admin.newstype.getcreate') }}" style="position: absolute; right: 130px; top: 136px; color: #fff; font-size: 20px;">Thêm Loại Tin</a>
    <br>     
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
<div class='col-md-offset-1 col-md-11' style="background-color: #fff;">
    <table class="table table-bordered"> 
    <thead>
        <tr>
            <th>
                STT
            </th>
            <th>
                Tên Loại Tin
            </th>

            <th>
                Thao Tác
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($newstype as $key=>$value)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value->nametype }}</td>
            <td> <a href="{{ route('admin.newstype.detele') }}?id={{ $value->id }}">Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
</div>
</div>
<!-- /.container-fluid -->

@stop