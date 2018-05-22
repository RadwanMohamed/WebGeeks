@extends('Layouts.layout')
@section('content')


    <section id="blg_sec">
        <div class="container">
            <div class="row">
                <div class="title_sec">
                    <h1>{{$article->title}}</h1>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 ">
                    <div class="sngl_blg">
                        <img src="{{$article->img}}" alt=""/>
                        <div class="post_info">
                            <div class="post_intro">
                                <h2>Information</h2>
                                <i class="fa fa-picture-o"></i>
                            </div>
                            <ul>
                                <li>Created at {{$article->created_at}} //</li>
                                <li>Updated at {{$article->updated_at}} //</li>
                                <li>{{count($article->comments)}} comments</li>
                            </ul>
                        </div>
                        <div class="post_content">
                        <p>{{$article->content}}</p>
                        </div>

                    </div>

                    <hr/>

                    <div class="author_info">
                        <img src="{{$article->user->img}}" alt=""/>
                        <div class="author_dec">
                            <ul class="social_link">
                                <li><a href=""><i class="fa fa-flickr"></i></a></li>
                                <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-skype"></i></a></li>
                                <li><a href=""><i class="fa fa-google"></i></a></li>
                            </ul>
                            <h3>{{$article->user->name}}</h3>
                            <p>{{$article->user->about}}</p>
                        </div>
                    </div>

                    @include("blog.contact")

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                   @include("blog.sidebar")
                </div>
                <div class="container bootstrap snippet">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog-comment">
                                <h3 class="text-success">Comments</h3>

                                <ul class="comments">
                                    @foreach($article->comments as $comment)
                                        <li class="clearfix">
                                            <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
                                            <div class="post-comments">
                                                <p class="meta">{{($comment->created_at)->format('Y-m-d')}} {{$comment->name}} says : </p>
                                                <p>
                                                    {{$comment->content}}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection