@extends('portal.app')

@section('content')

<div class="responsive_menu">
    <ul class="main_menu">
        <li><a href="index.html">Home</a></li>
        <li><a href="#">Portfolio</a>
            <ul>
                <li><a href="portfolio.html">Portfolio Grid</a></li>
                <li><a href="project-image.html">Project Image</a></li>
                <li><a href="project-slideshow.html">Project Slideshow</a></li>
            </ul>
        </li>
        <li><a href="#">Blog</a>
            <ul>
                <li><a href="blog.html">Blog Standard</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
                <li><a href="#">visit templatemo</a></li>
            </ul>
        </li>
        <li><a href="archives.html">Archives</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul> <!-- /.main_menu -->
</div> <!-- /.responsive_menu -->

<header class="site-header clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-left logo">
                    <a href="index.html">
                        <img src="/assets/images/logo.png" alt="Medigo">
                    </a>
                </div>	<!-- /.logo -->
                <div class="main-navigation pull-right">
                    <nav class="main-nav visible-md visible-lg">
                        <ul class="sf-menu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Portfolio</a>
                                <ul>
                                    <li><a href="portfolio.html">Portfolio Grid</a></li>
                                    <li><a href="project-image.html">Project Image</a></li>
                                    <li><a href="project-slideshow.html">Project Slideshow</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="#">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog Standard</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                    <li><a href="#">visit templatemo</a></li>
                                </ul>
                            </li>
                            <li><a href="archives.html">Archives</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul> <!-- /.sf-menu -->
                    </nav> <!-- /.main-nav -->
                    <!-- This one in here is responsive menu for tablet and mobiles -->
                    <div class="responsive-navigation visible-sm visible-xs">
                        <a href="#fauzan" class="menu-toggle-btn">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div> <!-- /responsive_navigation -->
                </div> <!-- /.main-navigation -->
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</header> <!-- /.site-header -->

@endsection