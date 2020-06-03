@extends('admin.layout.index')
@section('title','Danh Sach Giới Thiệu')
@section('main')
<div class="container-fluid">
	<div class=row style="background-color: #fff; padding: 10px;">
		<h3 style="margin: 20px;">Danh Sách Giới Thiệu </h3>
		<a class="badge badge-success" href="{{ route('admin.introduces.get_add_introduces') }}"
			style="position: absolute; right: 130px; top: 136px; color: #fff; font-size: 20px;">Thêm Giới Thiệu</a>
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

		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>STT</td>
						<td>Tiêu Đề</td>
						<td>Nội Dung</td>
						<td>Người Tạo</td>
						<td>Ngày Tạo</td>
						<td>Trạng Thái</td>
						<td>Thao Tác</td>
					</tr>
				</thead>
				<tbody>
					@foreach($introduces as $key=>$introduce)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $introduce->description }}</td>
						<td>{!! $introduce-> content !!}</td>
						<td>{{ $introduce-> account['fullname'] }}</td>
						<td>{{ $introduce->created_at }}</td>
						<td></td>
						<td>

						</td>
						<td>

							<a href="{{ route('admin.introduces.getupdate').'?id='.$introduce->id }}"
								class="badge  badge-success"><i class="fa fa-pencil-alt"></i></a>
							@if(isset($value->delete_at) )
							<a href="{{ route('admin.news.deletenews').'?id='.$introduce->id }}"
								class="badge  badge-warning" onclick="return confirm('Bạn Có Muốn Xóa?')">Xóa</a>
							@else
							<a href="{{ route('admin.news.restorenews').'?id='.$introduce->id }}"
								class="badge  badge-info" onclick="return confirm('Bạn Có Muốn Khôi Phục?')">Khôi
								Phục</a>
							@endif
							<!--	<i class="fa fa-times" aria-hidden="true"></i>  -->
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>
@stop