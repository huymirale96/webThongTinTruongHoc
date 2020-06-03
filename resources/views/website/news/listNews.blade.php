@extends('website.layout.index')
@section('title','Tin Tức ABC')
@section('content')
<!-- BEGIN col2-->
<style>
    .pagination {
        display: -ms-flexbox;
        display: flex;
        padding-left: 0;
        list-style: none;
        border-radius: .25rem;
        margin-top: .5rem;
        margin-bottom: .5rem;
    }

    .page-item:first-child .page-link {
        margin-left: 0;
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
    }

    .page-link {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .active span {
        background-color: #007bff;
        color: #fff;
    }

    .page-item>.page-link:hover:not(.active) {
        background-color: #e9ecef;
        color: #007bff;
    }
</style>
<div class="col2">
    <div class="nav">
        <ul class="breadcrumb">
            <li>
                <a class="selected" href="tin-tuc" style="color: black;">Tin tức</a>
            </li>
        </ul>
    </div>
    <div class="news-list">
        @foreach ($news as $new)

        <div class="item">
            <a href="{{ $new->slug_newtype.'/'.$new->slug_description }}" class="avatar">
                <img style="width: 220px; height: 150px;" alt='{{$new->slug_description}}'
                    src="{{ asset('storage/news/').'/'.$new->urlimage}}">
            </a>
            <h3><a class="title" href="{{ $new->slug_newtype.'/'.$new->slug_description }}">{{ $new->description }}</a>
            </h3>
            <div class="lead">{!! str_replace(['h1', 'h2','h3','h4'],'p',Str::limit($new->content,170,' ...')) !!}</div>
            <div class="clear">.</div>
        </div>
        @endforeach

    </div>
    <div class="xemthem" data-id="1504" data-start="8" style="clear: both; text-align: center;">{{ $news->links() }}
    </div>
</div>
<!-- END col2-->
@stop