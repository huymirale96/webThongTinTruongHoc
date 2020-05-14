<!DOCTYPE html >
<html lang="vi">
<head>
   <!--<base href="http://127.0.0.1:8000/" target="_blank">-->
     <base href="{{asset('')}}">
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta content="telephone=no" name="format-detection">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="Trang chủ - Trường THPT ABC" />
    <meta name="description" content="Trường THPT ABC"/>
    <meta property="og:description" content="Trường THPT ABC" />
    <meta name="keywords" content="Trường ABC"/>
    <meta property="og:image" content="/2_5e563e06441a91zy"/>
    <meta property="og:url" content="http://web-mau_4 .vnedu.edu.vn/" />
    <meta property="og:type" content="website" />
    <meta name="author" content="vnedu.vn" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link href="/assets/website/swiper.css?_dc=1586198706" rel="stylesheet" />
    <link href="/assets/website/main.css?_dc=1586198706" rel="stylesheet" />   
    <script type="text/javascript">AppCfg = {"url":{"scheme":"http:\/\/","path":"\/","site":"\/","root":"\/","page":"\/sites\/pages\/\/","link":"\/sites\/pages\/\/.html","uri":"http:\/\/web-mau4.vnedu.edu.vn\/","absoluteRoot":"http:\/\/web-mau4.vnedu.edu.vn\/"},"site":{"id":"0004","name":"M\u1eabu website 004","address":null,"type":4,"image_url":null,"config":null,"code":null,"vnedu_site_id":null},"serv":"http:\/\/web-mau4.vnedu.edu.vn\/sites\/","ver":1586198706,"isLocal":0}</script>                </head>
<body>
    <div class="main">
        <div id="page-header">
            <img width="520" height="125" class="page_cover" src="/assets/website/2_5e563e185d65aq9l.png">
            <a href="/assets/website/">
                <img class="page_logo" src="/assets/website/2_5e563e06441a91zy.png">
            </a>
            <div class="page_school">
                <div class="page_school_subtitle">Trường trung học phổ thông</div>
                <div class="page_school_title">ABC</div>
            </div>
        </div>
        <div  class="page-menu">
            <div id="cssmenu">
                <ul class="menu-top">
                    <li class='item selected'><a href='{{ route('website.home')}}' class='title'>Trang chủ</a></li>
                    <li class='item '><a href='{{ route('website.all_introduce') }}'>Giới thiệu</a>
                    <li class='item '><a href='{{ 'tintuc/'.route('website.news') }}'>Tin tức</a>
                    <li class='item '><a href='hinh-anh'>Hình ảnh</a><li class='item '>
                        <a href='/thu-vien'>Thư viện</a>
                            <li class='item '><a href='/video-clip'>Video clip</a>
                                <li class='item '><a href='/tuyen-sinh'>Tuyển sinh</a>
                                    <li class='item '><a href='/lien-he'>Liên hệ</a>
                                        <li class='item '><a href='https://tracuu.vnedu.vn/so-lien-lac/' target='_BLANK'>Xem điểm</a>         
                                               </ul>
            </div>
            <a href="/assets/website/tim-kiem" class="icon-search"></a>
            <div class="clear"></div>
        </div>
        <!--Content  -->
            @yield('main')
          <!--End Content   -->
          @yield('sideBar')
          @yield('content')