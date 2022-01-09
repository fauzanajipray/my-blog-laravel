<div class="col-md-8 blog-posts">
    <div class="row">
        <div class="col-md-12">
            @foreach ($posts as $post)
                @livewire('portal.post-blog-preview', ['post' => $post] )
            @endforeach
        </div> <!-- /.col-md-12 -->
        
        <!-- Uncomment the following to render the pagination component -->

        <!-- <div class="col-md-12">
            <ul class="pages">
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">13</a></li>
            </ul>
        </div>  /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.col-md-8 -->
