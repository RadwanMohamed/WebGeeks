<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sima</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!--[if lt IE 9]>
    {!! Html::script('public/Website/js/html5shiv.js')!!}
    {!! Html::script('public/Website/js/respond.min.js')!!}

    <![endif]-->
    <!-- Place favicon.ico in the root directory -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    
<link rel="stylesheet" type="text/css" href="{{secure_asset('public/Website/css/normalize.css')}}">
    
<link rel="stylesheet" type="text/css" href="{{secure_asset('public/Website/css/main.css')}}">

<link rel="stylesheet" type="text/css" href="{{secure_asset('public/Website/css/bootstrap.min.css')}}">

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


    
<link rel="stylesheet" type="text/css" href="{{secure_asset('public/Website/css/owl.carousel.css')}}">

    
<link rel="stylesheet" type="text/css" href="{{secure_asset('public/Website/css/responsive.css')}}">

   
<link rel="stylesheet" type="text/css" href="{{secure_asset('public/Website/css/style.css')}}">


</head>
<body >
<!-- start preloader -->
<div id="loader-wrapper">
    <div class="logo"></div>
    <div id="loader">
    </div>
</div>
<!-- end preloader -->
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- header -->
@include('Layouts.header')
<!-- end header -->





@yield('content')

<!-- footer  -->
@include("Layouts.footer")
<script
  src="https://code.jquery.com/jquery-1.9.1.min.js" 
  integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ="
  crossorigin="anonymous"></script>


<script type="text/javascript" src="{{secure_asset('public/Website/js/vendor/jquery-1.11.2.min.js')}}"></script>

<script type="text/javascript" src="{{secure_asset('public/Website/js/isotope.pkgd.min.js')}}"></script>

<script type="text/javascript" src="{{secure_asset('public/Website/js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="{{secure_asset('public/Website/js/jquery-ui.js')}}"></script>

<script type="text/javascript" src="{{secure_asset('public/Website/js/appear.js')}}"></script>

<script type="text/javascript" src="{{secure_asset('public/Website/js/jquery.counterup.min.js')}}"></script>

<script type="text/javascript" src="{{secure_asset('public/Website/js/waypoints.min.js')}}"></script>

<script type="text/javascript" src="{{secure_asset('public/Website/js/owl.carousel.min.js')}}"></script>

<script type="text/javascript" src="{{secure_asset('public/Website/js/showHide.js')}}"></script>
<script type="text/javascript" src="{{secure_asset('public/Website/js/jquery.nicescroll.min.js')}}"></script>


<script type="text/javascript" src="{{secure_asset('public/Website/js/jquery.easing.min.js')}}"></script>


<script type="text/javascript" src="{{secure_asset('public/Website/js/scrolling-nav.js')}}"></script>


<script type="text/javascript" src="{{secure_asset('public/Website/js/plugins.js')}}"></script>

        <!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
        var mapOptions = {
            zoom: 14,
            scrollwheel: false,
            center: new google.maps.LatLng(41.092586000000000000, -75.592688599999970000)
        };
        var map = new google.maps.Map(document.getElementById('googleMap'),
                mapOptions);
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation:google.maps.Animation.BOUNCE,
            icon: 'https://webgeeks.herokuapp.com/public/Website/img/map-marker.png',
            map: map
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script type="text/javascript" src="{{secure_asset('public/Website/js/main.js')}}"></script>

<script type="text/javascript" src="{{secure_asset('public/Website/showHide.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function(){


        $('.show_hide').showHide({
            speed: 1000,  // speed you want the toggle to happen
            easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
            changeText: 1, // if you dont want the button text to change, set this to 0
            showText: 'View',// the button text to show when a div is closed
            hideText: 'Close' // the button text to show when a div is open

        });


    });

</script>
<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>

<script>

    //Hide Overflow of Body on DOM Ready //
    $(document).ready(function(){
        $("body").css("overflow", "hidden");
    });

    // Show Overflow of Body when Everything has Loaded
    $(window).load(function(){
        $("body").css("overflow", "visible");
        var nice=$('html').niceScroll({
            cursorborder:"5",
            cursorcolor:"#00AFF0",
            cursorwidth:"3px",
            boxzoom:true,
            autohidemode:true
        });

    });



    $(document).on('click',"#btn-more", function(){
        var id =$(this).data('id');
        var top =$(this).data('target');

        $.ajax({
            url :'getmore' ,
            data : {id:id, top:top, _token:"{{csrf_token()}}"},
            type : 'get',
            success:function(data)
            {
                if(data != '') {
                    $(".post_btn").remove();
                    $(".all-portfolios").append(data[0]);
                    $(".portrow").append(data[1]);
                    var v = top/287;
                    console.log(v);
                    if(v>=1){
                        var sec =(250*v) + 1050;
                        var btn = (250*v) + 400;
                        $("#protfolio_sec").css("height",sec+"px");  //250 to add part to the div to contain the new ports
                        $(".post_btn").css("padding-top",btn+"px");   //250  to add padding to the btn to get down into the div
                    }else {
                        $("#protfolio_sec").css("height","1000px");  // to add part to the div to contain the new ports
                        $(".post_btn").css("padding-top","350px");  //250  to add padding to the btn to get down into the div
                    }

                    }
                else
                {
                    $('#btn-more').html("no data");
                }

            }
        })

    });

</script>



</body>
</html>
