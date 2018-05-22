
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]>
<html lang="en" class="ie8 no-js" )> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js" )> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title> WebGeeks | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #1 for statistics, charts, recent events and reports"
          name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css" )/>
    {!! Html::style("Admin/assets/global/plugins/font-awesome/css/font-awesome.min.css") !!}
    {!! Html::style("Admin/assets/global/plugins/font-awesome/css/font-awesome.min.css") !!}
    {!! Html::style("Admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css") !!}
    {!! Html::style("Admin/assets/global/plugins/bootstrap/css/bootstrap.min.css") !!}
    {!! Html::style("Admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css") !!}
            <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    {!! Html::style("Admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css") !!}
    {!! Html::style("Admin/assets/global/plugins/morris/morris.css") !!}
    {!! Html::style("Admin/assets/global/plugins/fullcalendar/fullcalendar.min.css") !!}
    {!! Html::style("Admin/assets/global/plugins/jqvmap/jqvmap/jqvmap.css") !!}
            <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    {!! Html::style("Admin/assets/global/css/components.min.css") !!}
    {!! Html::style("Admin/assets/global/css/plugins.min.css") !!}
            <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    {!! Html::style("Admin/assets/layouts/layout/css/layout.min.css") !!}
    {!! Html::style("Admin/assets/layouts/layout/css/themes/darkblue.min.css") !!}
    {!! Html::style("Admin/assets/layouts/layout/css/custom.min.css") !!}
            <!-- END THEME LAYOUT STYLES -->
    {!! Html::style("Admin/assets/layouts/layout/img/icon-advertising-green.png")!!}

</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->
@include("Admin.layouts.nav")
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
       @yield("content")

       </div>
        <!-- BEGIN QUICK NAV -->

        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <!-- Begin  LAYOUT SCRIPTS -->

        <!--[if lt IE 9]>
        {!! Html::script("Admin/assets/global/plugins/respond.min.js") !!}
        {!! Html::script("Admin/assets/global/plugins/excanvas.min.js") !!}
        {!! Html::script("Admin/assets/global/plugins/ie8.fix.min.js") !!}
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        {!! Html::script("Admin/assets/global/plugins/jquery.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/bootstrap/js/bootstrap.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/js.cookie.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js") !!}
        {!! Html::script("Admin/assets/global/plugins/jquery.blockui.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")  !!}
                <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::script("Admin/assets/global/plugins/moment.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/morris/morris.min.js")!!}
        {!! Html::script("Admin/assets/global/plugins/morris/raphael-min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/counterup/jquery.waypoints.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/counterup/jquery.counterup.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/amcharts/amcharts/amcharts.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/amcharts/amcharts/serial.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/amcharts/amcharts/pie.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/amcharts/amcharts/radar.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/amcharts/amcharts/themes/light.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/amcharts/amcharts/themes/patterns.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/amcharts/amcharts/themes/chalk.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/amcharts/ammap/ammap.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/amcharts/amstockcharts/amstock.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/fullcalendar/fullcalendar.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/horizontal-timeline/horizontal-timeline.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/flot/jquery.flot.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/flot/jquery.flot.resize.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/flot/jquery.flot.categories.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/jquery.sparkline.min.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js")  !!}
        {!! Html::script("Admin/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js")  !!}
                <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {!! Html::script("Admin/assets/global/scripts/app.min.js")  !!}
                <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        {!! Html::script("Admin/assets/pages/scripts/dashboard.min.js")  !!}
                <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        {!! Html::script("Admin/assets/layouts/layout/scripts/layout.min.js")  !!}
        {!! Html::script("Admin/assets/layouts/layout/scripts/demo.min.js")  !!}
        {!! Html::script("Admin/assets/layouts/global/scripts/quick-sidebar.min.js")  !!}
        {!! Html::script("Admin/assets/layouts/global/scripts/quick-nav.min.js")  !!}
                <!-- END THEME LAYOUT SCRIPTS -->
        <!-- END  LAYOUT SCRIPTS -->
    </div>
</div>


<script>

    $('.viewusers').on("click", function(){
        $.ajax({
            url  : '/admin-panel/users',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data)
            }
        })

    });
    $('.addnewuser').on("click", function(){
        $.ajax({
            url : '/admin-panel/users/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });

     $('.viewsettings').on("click", function(){
        $.ajax({
            url  : '/admin-panel/settings',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data)
            }
        })

    });
    $('.addnewsetting').on("click", function(){
        $.ajax({
            url : '/admin-panel/settings/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });


    $('.viewprojects').on("click", function(){
        $.ajax({
            url  : '/admin-panel/port',
            type : 'get',
            success:function(data)
            {
                console.log(data);
                $('.content').html(data)
            }
        })

    });
    $('.addnewproject').on("click", function(){
        $.ajax({
            url : '/admin-panel/port/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });
 $('.viewmembers').on("click", function(){
        $.ajax({
            url  : '/admin-panel/team_members',
            type : 'get',
            success:function(data)
            {
                console.log(data);
                $('.content').html(data)
            }
        })

    });
    $('.addnewmember').on("click", function(){
        $.ajax({
            url : '/admin-panel/team_members/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });
    $('.viewskills').on("click", function(){
        $.ajax({
            url  : '/admin-panel/skills',
            type : 'get',
            success:function(data)
            {
                console.log(data);
                $('.content').html(data)
            }
        })

    });
    $('.addnewskill').on("click", function(){
        $.ajax({
            url : '/admin-panel/skills/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });
    $('.viewservices').on("click", function(){
        $.ajax({
            url  : '/admin-panel/services',
            type : 'get',
            success:function(data)
            {
                console.log(data);
                $('.content').html(data)
            }
        })

    });
    $('.addnewservice').on("click", function(){
        $.ajax({
            url : '/admin-panel/services/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });
    $('.viewTestimonies').on("click", function(){
        $.ajax({
            url  : '/admin-panel/Testimonies',
            type : 'get',
            success:function(data)
            {
                console.log(data);
                $('.content').html(data)
            }
        })

    });
    $('.addnewtestimony').on("click", function(){
        $.ajax({
            url : '/admin-panel/Testimonies/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });
    $('.viewPlans').on("click", function(){
        $.ajax({
            url  : '/admin-panel/pricingplans',
            type : 'get',
            success:function(data)
            {
                console.log(data);
                $('.content').html(data)
            }
        })

    });
    $('.addnewPlan').on("click", function(){
        $.ajax({
            url : '/admin-panel/pricingplans/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });
    $('.viewclients').on("click", function(){
        $.ajax({
            url  : '/admin-panel/clients',
            type : 'get',
            success:function(data)
            {
                console.log(data);
                $('.content').html(data)
            }
        })

    });
    $('.addnewclient').on("click", function(){
        $.ajax({
            url : '/admin-panel/clients/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });
 $('.viewarticles').on("click", function(){
        $.ajax({
            url  : '/admin-panel/articles',
            type : 'get',
            success:function(data)
            {
                console.log(data);
                $('.content').html(data)
            }
        })

    });
    $('.addnewarticle').on("click", function(){
        $.ajax({
            url : '/admin-panel/articles/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });
    $('.viewcat').on("click", function(){
        $.ajax({
            url  : '/admin-panel/categories',
            type : 'get',
            success:function(data)
            {
                console.log(data);
                $('.content').html(data)
            }
        })

    });
    $('.addnewcat').on("click", function(){
        $.ajax({
            url : '/admin-panel/categories/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });
    $('.viewcomments').on("click", function(){
        $.ajax({
            url  : '/admin-panel/comments',
            type : 'get',
            success:function(data)
            {
                console.log(data);
                $('.content').html(data)
            }
        })

    });
    $('.addnewcomment').on("click", function(){
        $.ajax({
            url : '/admin-panel/comments/add',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });

    $('.viewallmsgs').on("click", function(){
        $.ajax({
            url : '/admin-panel/contacts',
            type : 'get',
            success:function(data)
            {
                $('.content').html(data);
            }
        })
    });

</script>

</body>

</html>