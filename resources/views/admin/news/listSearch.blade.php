@extends('admin.layout.index')
@section('title','Danh Sach Tin Tức')
@section('main')
<div class="container-fluid">
    <div class=row style="background-color: #fff; padding: 10px; margin: 10px;">
        <div class="col-md-12">
            <form method="get" action="{{ route("admin.searchNews") }}">
                @csrf
                <input type="text" name="keyWord" class="form-control"
                    style="display: inline; width: 50%; margin-right: 50px;">
                <button type="submit" class="btn btn-info">Tìm Kiếm</button>
            </form>

            <div style="position: relative">
                <h3 style="margin: 20px;">Danh Sách Tin Tức </h3> {{ $key123 }} {{ $channels ?? ''}}
                <a class=" badge badge-success" href="{{ route('admin.news.get_add_news') }}"
                    style="position: absolute; top 20px; right: 50px; color: #fff; font-size: 20px;">Thêm Tin Tức</a>
                <br>
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
                                <td>Loại Tin</td>
                                <td>Hình Ảnh</td>
                                <td>Ngày Tạo</td>
                                <td>Người Tạo</td>
                                <td>Trạng Thái</td>
                                <td>Thao Tác</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $key=>$value)
                            <tr>
                                <td>{{ 10*($news->currentPage()-1)+ $key + 1 }}</td>
                                <td>{{ $value->description }}</td>
                                <td>{{ $value->nametype }}</td>
                                <td><img style="max-width: 200px; max-height: 150px;"
                                        src="{{ asset('storage/news/' . $value->urlimage) }}" /></td>
                                <td>{{ $value->dateCreateNew }}</td>
                                <td>{{ $value->fullname }}</td>
                                <td>
                                    @if( $value->deleted_at == null )
                                    <span class="bagde badge-success">Hiện</span>
                                    @else
                                    <span class="bagde badge-warning">Ẩn</span>
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ route('admin.news.get_updatenews').'?id='.$value->id }}"
                                        class="badge  badge-success"><i class="fa fa-pencil-alt"></i></a>
                                    @if( $value->deleted_at == null )
                                    <a href="{{ route('admin.news.deletenews').'?id='.$value->id }}"
                                        class="badge  badge-warning"
                                        onclick="return confirm('Bạn Có Muốn Xóa?')">Xóa</a>
                                    @else
                                    <a href="{{ route('admin.news.restorenews').'?id='.$value->id }}"
                                        class="badge  badge-info"
                                        onclick="return confirm('Bạn Có Muốn Khôi Phục?')">Khôi Phục</a>
                                    @endif
                                    <!--	<i class="fa fa-times" aria-hidden="true"></i>  -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="margin-left: 400px;">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
        @stop