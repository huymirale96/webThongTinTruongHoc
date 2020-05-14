@extends('website.layout.index')
@section('title','Tìm Kiếm')
@section('content_')
<div class="col2">
    <div class="page-list">
<div class="nav">
<ul class="breadcrumb">
    <li>
        <a class="selected" style="color: black;">Tìm kiếm</a>
    </li>
</ul>
</div>

<div class="box-search">
<form onsubmit="return checkinput(this);" method="get" action="/tim-kiem">
    <table>
        <tbody><tr>
            <td>
                <label>Từ khóa: </label>
            </td>
            <td>
                <input type="text" text="placeholder" name="key" id="key" class="text" value="">
            </td>
            <td valgin="right">
                <input type="submit" class="submit" value="Tìm kiếm">
            </td>
        </tr>
        </tbody></table>
</form>
</div>
<div class="news-list item-list" style="padding: 10px;">
            </div>

</div>      
  </div>
@endsection