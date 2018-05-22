<section id="clt_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                <div class="title_sec">
                    <h1>{{$clientspage[0]->desc}}</h1>
                    <h2>{{$clientspage[0]->content}}</h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
                <div class="al_clt">
                    @foreach($clients as $client)
                    <div class="sngl_clt">
                        <a href="#"><img src="{{$client->img}}" alt="{{$client->name}}"/></a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
