<div class="last-post clearfix">
    <div class="thumb pull-left">
        <a href="#"><img src="{{ asset($post->thumbnail)}}" alt="{{ $post->title }}"></a>
    </div>
    <div class="content">
        <span>{{ $post->created_at->format('d M Y') }}</span>
        <h4><a href="#">{{ $post->title }}</a></h4>
    </div>
</div> <!-- /.last-post -->