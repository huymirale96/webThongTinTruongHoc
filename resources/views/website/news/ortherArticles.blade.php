<div class="article-other">
    <div class="article-other">
        <div class="page-title"><span>Các tin khác</span></div>
        <ul>
            @foreach ($newsOrthers as $newsOrther)
            <li><a href="{{$newsOrther->slug_description.'/'.$newsOrther->slug_description}}">{{$newsOrther->slug_description}}</a></li>
            @endforeach         
        </ul>
    </div>
</div>