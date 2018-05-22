<section id="pricing_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
                <div class="title_sec">
                    <h1>{{$planspage[0]->desc}}</h1>
                    <h2>{{$planspage[0]->content}}</h2>
                </div>
            </div>
            @for($i=0 ; $i<count($plans);$i++)

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="sngl_pricing">
                    <h2 class="title_bg_{{$i+1}}">{{$plans[$i]->type}}</h2>
                    <h3><span class="currency">{{$plans[$i]->currency}}</span>{{$plans[$i]->price}}<span class="monuth">/  {{$plans[$i]->time}}</span></h3>
                    <ul>
                        <?php
                        $val = explode(',',$plans[$i]->properties);
                        for($j=0;$j < count($val);$j++){
                            echo "<li>$val[$j]</li>";
                        }

                        ?>
                        <li><a href="" class="btn pricing_btn">Send</a></li>
                    </ul>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>