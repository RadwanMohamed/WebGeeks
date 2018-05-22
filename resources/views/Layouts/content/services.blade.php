<section id="pr_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                <div class="title_sec">
                    <h1>{{$servicespage[0]->desc}}</h1>
                    <h2>{{$servicespage[0]->content}}</h2>
                </div>
            </div>
            @foreach($services as $service)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="service">
                    <i class="{{$service->logo}}"></i>
                    <h2>{{$service->name}}</h2>
                    <div class="service_hoverly">
                        <i class="{{$service->logo}}"></i>
                        <h2>{{$service->name}}</h2>
                        <p>{{$service->Desc}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
