<div class="col1">
    <div class="box-2 box-tinmoi_" style="background-color: gray;">
        <div class="box-title"><a class="title">Tin mới</a></div>

        <div class="box-body">
            <div class="item-list">
                @foreach($newsLastests as $newsLastest)
                <div class="item">
                    <a class="title"
                        href="{{ $newsLastest->slug_newtype .'/'.$newsLastest->slug_description }}">{{ $newsLastest->description }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="box-2 box-thongbao" style="display: block;">
        <div class="box-title"><a class="title" href="thong-bao">Thông báo</a></div>
        <div class="box-body">
            <div class="item-list">
                @foreach($newsNotifications as $newsNotification)
                <div class="item">
                    <a class="title"
                        href="tin-tuc{{ $newsNotification->slug_newtype .'/'.$newsNotification->slug_description }}">{{ $newsNotification->description }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="box-2 box-lienketweb" style="display: block;">
        <div class="box-title"><a class="title" href="lien-ket-website">Liên kết website</a></div>
        <div class="box-body">
            <div class="item-list">
                @foreach($newsLinksToOrtherWebsites as $newsLinksToOrtherWebsite)
                <div class="item">
                    <a class="title"
                        href="{{ "lienket".$newsLinksToOrtherWebsite->slug_newtype .'/'.$newsLinksToOrtherWebsite->slug_description }}">{{ $newsLinksToOrtherWebsite->description }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>