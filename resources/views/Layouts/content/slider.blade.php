<section id="slider_sec">
    <div class="container">
        <div class="row">
            <div class="slider">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @for($i=0;$i<count($sliders);$i++)
                        @if($i ===0)
                        <div class="item active">
                         @else
                        <div class="item">
                        @endif
                                <div class="wrap_caption">
                                <div class="caption_carousel">
                                    <h1>{{$sliders[$i]->desc}}</h1>
                                    <p>{{$sliders[$i]->content}}</p>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>

                    <!-- Controls -->
                    <a class="left left_crousel_btn" href="#carousel-example-generic" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right right_crousel_btn" href="#carousel-example-generic" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
