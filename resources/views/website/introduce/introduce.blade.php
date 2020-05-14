@extends('website.layout.index')
@section('title','Tin Tức ABC')
@section('content')
<!-- BEGIN col2-->
<div class="col2">
            <!-- BEGIN col1-->
<div class="menu-active hide">gioi-thieu</div>
<div class="page-about">
    <div class="nav">
        <ul class="breadcrumb">
          
        </ul>
    </div>
    <div class="about-menu">
        @foreach ($introduces as $introduce)  
        <div class="item @if($introduce->slug_description == $data['slug_description'] ) selected @endif">
        <a class="title" href="{{ route('website.introduce',$introduce->slug_description )}}">{{ $introduce->description }}</a>
        </div>
        @endforeach
                                    
    </div>

    <div class="article">
        <div class="content">
            <div class="item-text-title" style="-webkit-text-stroke-width:0px; border:0px none; margin-bottom:10px; margin-top:10px; padding:0px; text-align:start; text-indent:0px">
                {!! $data['content'] !!}       
</div>
</div>
</div>
    </div>
</div>
       
<!-- END col2-->
@stop