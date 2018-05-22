<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->

    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
        data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper">
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                <a href="javascript:;" class="remove">
                    <i class="icon-close"></i>
                </a>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                </div>
            </form>
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="nav-item start">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start active open">
                    <a href="index.html" class="nav-link ">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Dashboard 1</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item start ">
                    <a href="dashboard_2.html" class="nav-link ">
                        <i class="icon-bulb"></i>
                        <span class="title">Dashboard 2</span>
                        <span class="badge badge-success">1</span>
                    </a>
                </li>
                <li class="nav-item start ">
                    <a href="dashboard_3.html" class="nav-link ">
                        <i class="icon-graph"></i>
                        <span class="title">Dashboard 3</span>
                        <span class="badge badge-danger">5</span>
                    </a>
                </li>
            </ul>
        </li>




        <!-- Begin User Nav -->
        @if(Auth::user()->admin ===1)
        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-user"></i>
                <span class="title">Users</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">

                <li class="nav-item">
                    <a href="" class="ajaxify nav-link viewusers">
                        <i class="icon-camera"></i> View all users</a>
                </li>
                <li class="nav-item">
                    <a href="/admin-panel/users/add" class="ajaxify nav-link addnewuser">
                        <i class="icon-link"></i>Add New User</a>
                </li>



            </ul>
        </li>

        <!-- End User Nav -->
            <li class="nav-item ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Settings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item">
                        <a href="" class="ajaxify nav-link viewsettings">
                            <i class="icon-camera"></i> View all Settings</a>
                    </li>
                    <li class="nav-item">
                        <a  class="ajaxify nav-link addnewsetting">
                            <i class="icon-link"></i>Add New setting</a>
                    </li>



                </ul>
            </li>
        <!-- Extra nav -->
        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-clone"></i>
                <span class="title">Content</span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-television"></i> Portofolio
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="" class="ajaxify nav-link viewprojects">
                                    <i class="icon-camera"></i> View all Projects</a>
                            </li>
                            <li class="nav-item">
                                <a  class="ajaxify nav-link addnewproject">
                                    <i class="icon-link"></i>Add New Project</a>
                            </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-user"></i> Team Members
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="" class="ajaxify nav-link viewmembers">
                                <i class="icon-camera"></i> View all Members</a>
                        </li>
                        <li class="nav-item">
                            <a  class="ajaxify nav-link addnewmember">
                                <i class="icon-link"></i>Add New member</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-bar-chart"></i> Skills
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="" class="ajaxify nav-link viewskills">
                                <i class="icon-camera"></i> View all skills</a>
                        </li>
                        <li class="nav-item">
                            <a  class="ajaxify nav-link addnewskill">
                                <i class="icon-link"></i>Add New skill</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-shopping-cart"></i> Services
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="" class="ajaxify nav-link viewservices">
                                <i class="icon-camera"></i> View all services</a>
                        </li>
                        <li class="nav-item">
                            <a  class="ajaxify nav-link addnewservice">
                                <i class="icon-link"></i>Add New service</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-shopping-cart"></i> Testimonies
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="" class="ajaxify nav-link viewTestimonies">
                                <i class="icon-camera"></i> View all Testimonies</a>
                        </li>
                        <li class="nav-item">
                            <a  class="ajaxify nav-link addnewtestimony">
                                <i class="icon-link"></i>Add New testimony</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-money"></i> Priciing Plan
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="" class="ajaxify nav-link viewPlans">
                                <i class="icon-camera"></i> View all Plans</a>
                        </li>
                        <li class="nav-item">
                            <a  class="ajaxify nav-link addnewPlan">
                                <i class="icon-link"></i>Add New plan</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-money"></i> Clients
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="" class="ajaxify nav-link viewclients">
                                <i class="icon-camera"></i> View all Clients</a>
                        </li>
                        <li class="nav-item">
                            <a  class="ajaxify nav-link addnewclient">
                                <i class="icon-link"></i>Add New client</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endif
        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-book"></i>
                <span class="title">blog</span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-newspaper-o"></i> Articles
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="" class="ajaxify nav-link viewarticles">
                                <i class="icon-camera"></i> View all Articles</a>
                        </li>
                        <li class="nav-item">
                            <a  class="ajaxify nav-link addnewarticle">
                                <i class="icon-link"></i>Add New article</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-navicon"></i> Categories
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="" class="ajaxify nav-link viewcat">
                                <i class="icon-camera"></i> View all Categories</a>
                        </li>
                        <li class="nav-item">
                            <a  class="ajaxify nav-link addnewcat">
                                <i class="icon-link"></i>Add New categories</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-comments"></i> Comments
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="" class="ajaxify nav-link viewcomments">
                                <i class="icon-camera"></i> View all Comments</a>
                        </li>
                        <li class="nav-item">
                            <a  class="ajaxify nav-link addnewcomment">
                                <i class="icon-link"></i>Add New comment</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </li>
        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-book"></i>
                <span class="title">vistor Requests</span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-newspaper-o"></i> Contact us
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="" class="ajaxify nav-link viewallmsgs">
                                <i class="icon-camera"></i> View all Messages</a>
                        </li>
                    </ul>
                </li>



            </ul>
        </li>
        <!-- End extra -->


    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>