<section id="protfolio_sec">
    <div class="container">
        <div class="row portrow">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                <div class="title_sec">
                    <h1>{{$portspage[0]->desc}}</h1>
                    <h2>{{$portspage[0]->content}}</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="portfolio-filter text-uppercase text-center">
                    <ul class="filter">
                        <li class="active" data-filter="*">All</li>
                        @foreach($Pcats as $cat)
                        <li data-filter=".{{$cat->name}}">{{$cat->name}}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="all-portfolios">
                    @foreach($ports as $port)
                    <div class="col-sm-12  col-lg-12 col-md-12 col-xs-12  " >
                        <div class="single-portfolio {{$port->categories->name}}">
                            <img class="img-responsive" src="{{$port->img}}" alt="">
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
            <div class="post_btn">
                <div class="hover_effect_btn" id="hover_effect_btn">
                    <a  href="#hover_effect_btn" id="btn-more" class="getmore" data-id="{{$port->id}}" data-hover="view more post"><span>view more post</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
