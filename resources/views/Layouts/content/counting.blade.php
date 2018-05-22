<section id="counting_sec">
    <div class="container">
        <div class="row">
            @foreach($counts as $count)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="counting_sl">
                    <i class="{{$count->logo}}"></i>
                    <h2 class="counter">{{$count->content}}</h2>
                    <h4>{{$count->desc}}</h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
