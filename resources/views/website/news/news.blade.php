@extends('website.layout.index')
@section('title','Tin Tức ABC')
@section('content_')
<!-- BEGIN col2-->
<div class="col2">
    <div class="nav">
<ul class="breadcrumb">
<li>
    <a class="selected" href="{{ $data[0]->newstype['slug_newtype']}}" style="color: black;">{{ $data[0]->newstype['nametype']}}</a> 
</li>
</ul>
</div>
<div class="article">
<h1 id="title" class="title">{{ $data[0]->description }}</h1>    
<div id="content" class="content row">
    {!! $data[0]->content !!} 
</div>
<div class="article-tool">
<div class="addthis_toolbox addthis_default_style ">
        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
        <a class="addthis_button_tweet"></a>
        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
        <a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
</div>
</div>
@include('website.news.ortherArticles')
</div>
<!-- END col2-->
@stop