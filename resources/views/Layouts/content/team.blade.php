
<section id="tm_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                <div class="title_sec">
                    <h1>{{$team[0]->desc}}</h1>
                    <h2>{{$team[0]->content}}/h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
                <div class="all_team">
                    @foreach($members as $member)
                    <div class="sngl_team">
                        <img src="{{$member->img}}" alt=""/>
                        <h3> {{$member->name}} <span>{{$member->job}}</span></h3>
                        <p>{{$member->Desc}}</p>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
