<div class="col-md-4 sidebar">
    <div class="sidebar-widget">
        <h5 class="widget-title">Explore</h5>
        <div class="search-form">
            <form action="{{ url('search') }}" method="get">
                <input type="text" class="form-control" placeholder="Search Here..." name="search">
            </form>
        </div>
    </div>
    <div class="sidebar-widget">
        <h5 class="widget-title">Recent Posts</h5>
        @foreach ($posts as $post)
            @livewire('portal.post-blog-short', ['post' => $post])
        @endforeach
    </div> <!-- /.sidebar-widget -->
    <div class="sidebar-widget">
        <h5 class="widget-title">Categories</h5>
        <div class="row categories">
            <div class="col-md-6">
                <ul>
                    @foreach ($categories as $category)
                        <li><a href="{{ url('category/'.$category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.sidebar-widget -->
    <div class="sidebar-widget">
        <h5 class="widget-title">Text Widget</h5>
        <p class="light-text">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cum sociis natoque penatibus et magnis dis parturient… </p>
    </div> <!-- /.sidebar-widget -->
</div> <!-- /.col-md-4 -->
