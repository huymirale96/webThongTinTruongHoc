@include('website.layout.header')
<div class="menu-active hide"></div>
<div id="page-body"> 
    <div class="container">
    @include('website.layout.sideBarleft')
    @yield('content_')
    <div class="clear">.</div>
    </div>
</div>
@include('website.layout.footer')