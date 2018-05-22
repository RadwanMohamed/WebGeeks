<section id="lts_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                <div class="title_sec">
                    <h1>{{$articlespage[0]->desc}}</h1>
                    <h2>{{$articlespage[0]->content}}</h2>
                </div>
            </div>
            @for($i=0;$i<count($articles);$i++)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="lts_pst">
                    <img src="{{$articles[$i]->img}}" alt=""/>
                    <h2>{{$articles[$i]->title}}</h2>
                    <p>
                        {{$articles[$i]->content}}
                    </p>
                    <a href="/blog/{{$articles[$i]->id}}/show">Read more <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            @endfor

            <div class="post_btn">
                <div class="hover_effect_btn" id="hover_effect_btn">
                    <a href="/blog" data-hover="view more post"><span>view more post</span></a>
                </div>
            </div>

        </div>
    </div>
</section>
