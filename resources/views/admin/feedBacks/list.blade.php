@extends('admin.layout.index')
@section('title','Danh Sách Phản Hồi')
@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class=row style="background-color: #fff; padding: 10px;" >
        <h3 style="margin: 20px;">Danh Sách Phản Hồi</h3>
        
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
                Tên 
            </th>
            <th>
                Email
            </th>
            <th>
                Nội Dung
            </th>
            <th>
               Thời Gian
            </th>
            <th>
                Người Xác Nhận
            </th>
            <th>
                Xác Nhận
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($feedBacks as $key=>$feedBack)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $feedBack->fullName }}</td>
            <td>{{ $feedBack->email }}</td>
            <td>{{ $feedBack->content }}</td>
            <td>{{ $feedBack->created_at }}</td>
            <td>{{ $feedBack->account['fullname'] }}</td>
           @if($feedBack->status === 0)
                <td> <a class='badge badge-success' href="{{ route('admin.feedback.confirm') }}?id={{ $feedBack->id }}">Xác Nhận</a></td>
            @else
            <td></td>
            @endif
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

</div>
</div>
<!-- /.container-fluid -->

@stop