<section id="ltd_map_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="map">
                    <h1>located THE MAP</h1><a href="#slidingDiv" class="show_hide" rel="#slidingDiv"><i class="fa fa-angle-up"></i></a>
                    <div id="slidingDiv">
                        <div class="map_area">
                            <div id="googleMap" style="width:100%;height:300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- End located map  Section -->
<!-- start footer Section -->
<footer id="ft_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ft">
                    <ul>
                        @foreach($social as $soc)
                        <li><a href="{{$soc->content}}"><i class="{{$soc->logo}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
                <ul class="copy_right">

                    <li>&copy;  {{$copyright[0]->desc}}</li>
                    <li>{{$copyright[0]->content}}</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- End footer Section -->