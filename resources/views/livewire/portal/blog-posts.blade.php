<div class="col-md-8 blog-posts">
    @if ($posts->count())
    <div class="row">
        <div class="col-md-12">
            @foreach ($posts as $post)
                @livewire('portal.post-blog-preview', ['post' => $post] )
            @endforeach
        </div> <!-- /.col-md-12 -->
        
        <!-- Uncomment the following to render the pagination component -->

        <div class="col-md-12">
            {{ $posts->links() }}
        </div>  <!-- /.col-md-12 -->
    </div> <!-- /.row -->

    @else
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning">
                <p>No posts found.</p>
            </div>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    @endif
    
</div> <!-- /.col-md-8 -->
