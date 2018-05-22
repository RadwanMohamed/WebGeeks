@extends('Layouts.layout')

@section('content')

<!-- start slider Section -->
@include("Layouts.content.slider")
<!-- End slider Section -->

<!-- start about Section -->
@include("Layouts.content.about")
<!-- End About Section -->

<!-- start Counting section-->
@include("Layouts.content.counting")
<!-- start progress bar Section -->
@include("Layouts.content.skills")
<!-- End progress bar Section -->

<!-- start Service Section -->
@include("Layouts.content.services")
<!-- End Service Section -->

<!-- start portfolio Section -->
@include("Layouts.content.portfolio")
<!-- End Portfolio Section -->

<!-- start our team Section -->
@include("Layouts.content.team")
<!-- End our team Section -->

<!-- start our teastimonial Section -->
@include('Layouts.content.teastimonial')
<!-- End our teastimonial Section -->


<!-- start Latest post Section -->
@include("Layouts.content.posts")
<!-- End Latest post Section -->

<!-- start pricing Section -->
@include("Layouts.content.prices")
<!-- End pricing Section -->


<!-- start Happy Client Section -->
@include("Layouts.content.clients")
<!-- End Happy Client  Section -->

<!-- start contact us Section -->
@include('Layouts.content.contact')
<!-- End contact us  Section -->
@endsection