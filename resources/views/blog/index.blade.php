@extends('Layouts.layout')
@section('content')

    <section id="blg_sec">
        <div class="container">
            <div class="row">
                <div class="title_sec">
                    <h1>{{$settings[0]->desc}}</h1>
                    <h2>{{$settings[0]->content}}</h2>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 ">
                   @for($i=0;$i<count($articles);$i++)
                    <div class="sngl_blg">
                        <img src="{{$articles[$i]->img}}" alt=""/>
                        <div class="post_info">
                            <div class="post_intro">
                                <h2>{{$articles[$i]->title}}</h2>
                                <i class="fa fa-picture-o"></i>
                            </div>
                            <ul>
                                <li>{{$articles[$i]->created_at}}//</li>
                                <li>{{$articles[$i]->updated_at}} //</li>
                                <li>{{count($articles[$i]->comments)}} comments</li>
                            </ul>
                        </div>
                        <div class="post_content">
                            <p>
                             {{substr($articles[$i]->content,0,250)}}
                            </p>
                        <a href="/blog/{{$articles[$i]->id}}/show">Read more <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                     @endfor
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                @include("blog.sidebar")
                </div>

            </div>
        </div>
    </section>

@endsection



