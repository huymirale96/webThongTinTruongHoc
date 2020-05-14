@extends('website.layout.home')
@section('title','Trang chủ - Trường THPT ABC')
@section('main')
<div class="menu-active hide"></div>
<div id="page-body">
	<div class="box-top-news">

		<div class="top-news-left">
			<a href="{{ 'tintuc/'.$data['newsViewest'][0]->slug_description }}" class="avatar">
				<img src="{{ asset('storage/news/')}}{{ $data['newsViewest'][0]->urlimage != '' ? '/'.$data['newsViewest'][0]->urlimage : '/default_image.jpg' }}  " alt="{{ $data['videoClip'][0]->description }}" />
			</a>
			<h3><a class="title" href="{{ 'tintuc/'.$data['newsViewest'][0]->slug_description }}">{{ $data['newsViewest'][0]->description }}</a></h3>
			<div class="lead">{!! str_replace(['h1', 'h2','h3','h4'],'p',Str::limit($data['newsViewest'][0]->content,70,' ...')) !!}</div>
			<div class="clear"></div>
		</div>

		<div id="lastest">
			@foreach ($data['newsViewest'] as $key=>$new)
			<div class="item  @if($key == 0) selected @endif">
				<a href="{{ 'tintuc/'.$new->slug_description }}" class="avatar">
					<img src="{{ asset('storage/news/')}}{{ $new->urlimage != '' ? '/'.$new->urlimage : '/default_image.jpg' }}  " alt="{{ $data['videoClip'][0]->description }}" />
				</a>
				<h3><a class="title" href="{{ 'tintuc/'.$new->slug_description }}">{{ $new->description }}</a></h3>
				<div class="lead">{!! str_replace(['h1', 'h2','h3','h4'],'p',Str::limit($new->description,'70',' ...')) !!}</div><div class="clear"></div>
			</div>
			@endforeach              
		</div>
		
		<div class="clear"></div>
	</div>

	<!-- TIN MOI -->
	<div class="tinmoi box-1">
		<div class="box-title"><a>Tin mới</a></div>
		<div class="box-body">
			@foreach ($data['newsLastest'] as $new)
			<div class="item">
				<a class="title" href="{{ 'tintuc/'.$new->slug_description }}">{{ $new->description}}</a>
			</div>
			@endforeach
			
			<div class="clear"></div>
		</div>
	</div>

	<div class="clear">.</div>
	<div class="box-1 box-home-cate first">
		<div class="box-title"><a href="/tin-nha-truong">Tin nhà trường</a></div>
		<div class="box-body">
			<div class="first">
				<div class="item">
					<a href="{{ 'tintuc/'.$data['tinNhaTruong'][0]->slug_description }}" class="avatar" >
						<img src="{{ asset('storage/news/').'/'.$data['tinNhaTruong'][0]->urlimage }}" alt="{{ $data['tinNhaTruong'][0]->description }}" />
					</a>
					<a class="title" href="{{ 'tintuc/'.$data['tinNhaTruong'][0]->slug_description }}">{{ $data['tinNhaTruong'][0]->description }}</a>
					<div class="lead">{!! str_replace(['h1', 'h2','h3','h4'],'p',Str::limit($data['tinNhaTruong'][0]->content,70,' ...')) !!}</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="item-right">
				@foreach ($data['tinNhaTruong'] as $key=>$new)
				@if($key != 0 )
				<div class="item"><a class="title" href="{{  'tintuc/'.$new->slug_description }}">{{ $new->description }}</a></div>
				@endif
				@endforeach
			</div>
		</div>
		<div class="clear">.</div>
	</div>
	<div class="box-1 box-home-cate">
		<div class="box-title"><a href="/tin-giao-duc-do-day">Tin giáo dục đó đây</a></div>
		<div class="box-body">
			<div class="first">
				<div class="item">
					<a href="{{ 'tintuc/'.$data['tinGiaoDucDoDay'][0]->slug_description }}" class="avatar" >
						<img src="{{ asset('storage/news/').'/'.$data['tinGiaoDucDoDay'][0]->urlimage }}" alt="{{ $data['tinGiaoDucDoDay'][0]->description }}" />
					</a>
					<a class="title" href="{{ 'tintuc/'.$data['tinGiaoDucDoDay'][0]->slug_description }}">{{ $data['tinGiaoDucDoDay'][0]->description }}</a>
					<div class="lead">{!! str_replace(['h1', 'h2','h3','h4'],'p',Str::limit($data['tinGiaoDucDoDay'][0]->content,70,' ...')) !!}</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="item-right">
				@foreach ($data['tinGiaoDucDoDay'] as $key=>$new)
				@if($key != 0 )
				<div class="item"><a class="title" href="{{  'tintuc/'.$new->slug_description }}">{{ $new->description }}</a></div>
				@endif
				@endforeach
			</div>
		</div>
		<div class="clear">.</div>
	</div>
	<div class="clear">.</div>
	<div class="box-1 box-home-cate first">
		<div class="box-title"><a href="/tuyen-sinh">Tuyển sinh</a></div>
		<div class="box-body">
			<div class="first">
				<div class="item">
					<a href="{{ 'tintuc/'.$data['tuyenSinh'][0]->slug_description }}" class="avatar" >
						<img src="{{ asset('storage/news/').'/'.$data['tuyenSinh'][0]->urlimage }}" alt="{{ $data['tuyenSinh'][0]->description }}" />
					</a>
					<a class="title" href="{{ 'tintuc/'.$data['tuyenSinh'][0]->slug_description }}">{{ $data['tuyenSinh'][0]->description }}</a>
					<div class="lead">{!! str_replace(['h1', 'h2','h3','h4'],'p',Str::limit($data['tuyenSinh'][0]->content,70,' ...')) !!}</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="item-right">
				@foreach ($data['tuyenSinh'] as $key=>$new)
				@if($key != 0 )
				<div class="item"><a class="title" href="{{  'tintuc/'.$new->slug_description }}">{{ $new->description }}</a></div>
				@endif
				@endforeach
			</div>
		</div>
		<div class="clear">.</div>
	</div>
	<div class="box-1 box-home-cate">
		<div class="box-title"><a href="/video-clip">Video-clip</a></div>
		<div class="box-body">
			<div class="first">
				<div class="item">
					<a href="{{ 'tintuc/'.$data['videoClip'][0]->slug_description }}" class="avatar" >
						<img src="{{ asset('storage/news/')}}{{ $data['videoClip'][0]->urlimage != '' ? '/'.$data['videoClip'][0]->urlimage : '/default_image.jpg' }}  " alt="{{ $data['videoClip'][0]->description }}" />
					</a>
					<a class="title" href="{{ 'tintuc/'.$data['videoClip'][0]->slug_description }}">{{ $data['videoClip'][0]->description }}</a>
					<div class="lead">{!! str_replace(['h1', 'h2','h3','h4'],'p',Str::limit($data['videoClip'][0]->content,70,' ...')) !!}</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="item-right">
				@foreach ($data['videoClip'] as $key=>$new)
				@if($key != 0 )
				<div class="item"><a class="title" href="{{  'tintuc/'.$new->slug_description }}">{{ $new->description }}</a></div>
				@endif
				@endforeach
			</div>
		</div>
		<div class="clear">.</div>
	</div>
	<div class="clear">.</div>
	<div class="box-row">
		<div class="row" style="width: 220px;">
			<div class="box-2 box-thongbao" style="display: block;">
				<div class="box-title"><a class="title" href="thong-bao">Thông báo</a></div>
				<div class="box-body">
					<div class="item-list">
						@foreach ($data['thongBao'] as $new)
							<div class="item"><a class="title" href="{{ 'tintuc/'.$new->slug_description }}">{{ $new->description }}</a></div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div class="row"  style="width: 490px;">
			<div class="box-2 box-photo">
				<div class="box-title"><a class="title" href="/hinh-anh">Hình ảnh</a></div>
				<div class="box-body">
					<div class="first">
						<div class="item">
							<a href="{{ 'tintuc/'.$data['hinhAnh'][0]->slug_description }}" class="avatar" >
								<img src="{{ asset('storage/news/')}}{{ $data['hinhAnh'][0]->urlimage != '' ? '/'.$data['hinhAnh'][0]->urlimage : '/default_image.jpg' }}  " alt="{{ $data['videoClip'][0]->description }}" />
							</a>
							<a class="title" href="{{ 'tintuc/'.$data['hinhAnh'][0]->slug_description }}">{{ $data['hinhAnh'][0]->description }}</a>
							<div class="lead">{!! str_replace(['h1', 'h2','h3','h4'],'p',Str::limit($data['hinhAnh'][0]->content,70,' ...')) !!}</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="item-right">
						@foreach ($data['hinhAnh'] as $key=>$new)
						<div class="item @if($key == 0) selected @endif">
						<a class="title" href="tintuc/{{ $new->slug_description }}" data-img="{{ asset('storage/news/')}}{{ $new->urlimage != '' ? '/'.$new->urlimage : '/default_image.jpg' }}">{{ $new->description }}"</a>
						</div>
						@endforeach
					</div>
					<div class="clear">.</div>
				</div>
			</div>
		</div>
		<div class="row" style="width: 240px;">
			<div class="box-2 box-lienketweb" style="display: block;">
				<div class="box-title"><a class="title" href="lien-ket-website">Liên kết website</a></div>
				<div class="box-body">
					<div class="item-list">
						@foreach ($data['lienKet'] as $new)
						<div class="item">
							<a class="title" href="{{ 'tintuc/'.$new->slug_description }}">{{ $new->description }}</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END col2-->
	<div class="clear">.</div>
</div>
@stop

