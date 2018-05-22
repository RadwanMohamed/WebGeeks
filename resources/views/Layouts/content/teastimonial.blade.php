<section id="tstm_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="all_tstm">
                    @foreach($testimonies as $testimony)
                    <div class="clnt_tstm">
                        <div class="sngl_tstm">
                            <i class="fa fa-quote-right"></i>
                            <h3>{{$testimony->title}}</h3>
                            <p>{{$testimony->content}}</p>
                            <h6>- {{$testimony->name}}</h6>
                        </div>
                    </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
