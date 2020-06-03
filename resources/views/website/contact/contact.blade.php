@extends('website.layout.index')
@section('title','Tin Tức ABC')
@section('content')
<!-- BEGIN col2-->
<div class="col2">
    <!-- BEGIN col1-->
    <div class="page-contact">
        <div class="nav">
            <ul class="breadcrumb">
                <li>
                    <a class="selected" href="#" style="color: black;">Liên hệ</a>
                </li>
            </ul>
        </div>


        <div class="article">
            <div class="content">
                <p>Với mục tiêu dân chủ trong nhà trường, ban giám hiệu nhà trường luôn muốn nghe những ý kiến đóng góp,
                    phản ảnh từ phía học sinh. Mời các bạn hãy gửi các ý kiến.</p>

                <p>Thông tin liên hệ</p>

                <p><strong>Trường Trung học phổ thông Trần Quốc Tuấn</strong></p>

                <p>Địa chỉ: 57 Huỳnh Thúc Kháng, Đống Đa, Hà Nội. Email:&nbsp;<a
                        href="mailto:hotline@vnedu.vn">hotline@vnedu.vn</a></p>

                <p>Hotline 24/7: 18001260&nbsp;<em>(Miễn phí)</em></p>
            </div>
            <div class="contact_map">
            </div>

            <div class="contact_form">

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

                <h2>Gửi tin nhắn đến chúng tôi</h2>
                <form action="{{ route('website.post_createfeedback') }}" method="POST" class="comment_form">
                    <div class="">
                        @csrf
                        <div class="form_title">Họ và tên <span class="required">*</span></div>
                        <input type="text" class="comment_input" name="fullName" value="">

                    </div>
                    <div class="">
                        <div class="form_title">Email <span class="required">*</span></div>
                        <input type="text" class="comment_input" name="email" value="">
                    </div>
                    <div class="">
                        <div class="form_title">Nội dung tin nhắn <span class="required">*</span></div>
                        <textarea class="comment_input comment_textarea" name="cmt" value=""></textarea>
                    </div>

                    <div id="recaptcha-contactForm"></div>

                    <div>
                        <button type="submit" class="comment_button trans_200" name="btn_submit_contact">Gửi tin nhắn <i
                                class="fa fa-paper-plane-o"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- END col2-->
@stop