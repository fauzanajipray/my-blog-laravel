<div>
    <div class="responsive_menu">
        <ul class="main_menu">
        @foreach ($mainmenus as $mainmenu)
            <li>@if ($mainmenu->category == "link") <a href="{{ $mainmenu->url }}">{{ $mainmenu->title }}</a>
                @elseif ($mainmenu->category == "file") <a href="{{ asset($mainmenu->file) }}">{{ $mainmenu->title }}</a>
                @else <a href="{{ url('menu/'.$mainmenu->id) }}">{{ $mainmenu->title }}</a>
                @endif

                @php
                    $submenus = DB::table('mainmenus')->where('status', 1)->where('parent',$mainmenu->id)->get();
                @endphp
                @if ($submenus->count() > 0)
                <ul>
                    @foreach ($submenus as $submenu)
                        @if ($submenu->category == "link")
                            <li><a href="{{ $submenu->url }}">{{ $submenu->title }}</a></li>
                        @elseif ($submenu->category == "file")
                            <li><a href="{{'assets/'.$submenu->file}}">{{ $submenu->title }}</a></li>
                        @else
                            <li><a href="{{ url('menu/'.$submenu->id) }}">{{ $submenu->title }}</a></li>
                        @endif
                    @endforeach
                </ul>
                @endif
            </li>
        @endforeach
        </ul> <!-- /.main_menu -->
    </div> <!-- /.responsive_menu -->
    
    <header class="site-header clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left logo">
                        <a href="{{ url('/') }}">
                            <img src="/assets/images/logo.png" alt="Medigo">
                        </a>
                    </div>	<!-- /.logo -->
                    <div class="main-navigation pull-right">
                        <nav class="main-nav visible-md visible-lg">
                            <ul class="sf-menu">
                            @foreach ($mainmenus as $mainmenu)
                                <li>@if ($mainmenu->category == "link") <a href="{{ $mainmenu->url }}">{{ $mainmenu->title }}</a>
                                    @elseif ($mainmenu->category == "file") <a href="{{ asset($mainmenu->file) }}">{{ $mainmenu->title }}</a>
                                    @else <a href="{{ url('menu/'.$mainmenu->id) }}">{{ $mainmenu->title }}</a>
                                    @endif
                                    @php
                                        $submenus = DB::table('mainmenus')->where('status', 1)->where('parent',$mainmenu->id)->get();
                                    @endphp
                                    @if ($submenus->count() > 0)
                                    <ul>
                                        @foreach ($submenus as $submenu)
                                            @if ($submenu->category == "link")
                                                <li><a href="{{ $submenu->url }}">{{ $submenu->title }}</a></li>
                                            @elseif ($submenu->category == "file")
                                                <li><a href="{{ url('file/'.$submenu->file)}}">{{ $submenu->title }}</a></li>
                                            @else
                                                <li><a href="{{ url('menu/'.$submenu->id) }}">{{ $submenu->title }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
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
</div>
