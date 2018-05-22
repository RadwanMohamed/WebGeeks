<section id="skill_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                <div class="title_sec">
                    <h1>{{$skillspage[0]->desc}}</h1>
                    <h2>{{$skillspage[0]->content}}</h2>
                </div>
            </div>
            <div class="skills progress-bar1">
                <ul class="col-md-6 col-sm-12 col-xs-12 wow fadeInLeft">
                    @for($i=0; $i < count($skills);$i++)
                        @if($i%2 !=0)
                    <li class="progress">
                        <div class="progress-bar" data-width="{{$skills[$i]->value}}">
                            {{$skills[$i]->name}} {{$skills[$i]->value}}
                        </div>
                    </li>
                        @endif
                    @endfor
                </ul>
                <ul class="col-md-6 col-sm-12 col-xs-12 wow fadeInRight">
                    @for($i=0; $i < count($skills);$i++)
                        @if($i%2 ===0)
                            <li class="progress">
                                <div class="progress-bar" data-width="{{$skills[$i]->value}}">
                                    {{$skills[$i]->name}} {{$skills[$i]->value}}
                                </div>
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>


        </div>
    </div>
</section>
