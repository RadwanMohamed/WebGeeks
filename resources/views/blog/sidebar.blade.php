<div class="sidebar">
    <div class="search_widget">
        <input id="sr_bx" type="text" placeholder="Search...."/>
    </div>

    <div class="widget">
        <h2>categories</h2>
        <div class="title_br"></div>
        <ul>
            @for($i=0; $i<count($cats);$i++)
            <li><a href="">{{$cats[$i]->name}}</a></li>
            @endfor
        </ul>
    </div>
    <div class="widget">
        <h2>categories</h2>
        <div class="title_br"></div>
        <ul class="flickr">
            @for($i=0; $i<count($cats);$i++)
            <li><img src="{{$cats[$i]->img}}" alt=""/></li>
            @endfor
        </ul>
    </div>
    <div class="widget" style="float: left;margin-top: -85px;">
        <h2>categories</h2>
        <div class="title_br"></div>
        <ul class="tag">
            @for($i=0; $i<count($cats);$i++)
                <li><a href="">{{$cats[$i]->name}}</a></li>
            @endfor

        </ul>
    </div>
</div>
