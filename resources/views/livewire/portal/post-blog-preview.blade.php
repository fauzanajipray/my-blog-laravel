<div class="post-blog">
    <div class="blog-image">
        <a href="{{ url('post-detail/'.$post->id) }}">
            <img src="{{ url($post->thumbnail) }}" alt="">
        </a>
    </div> <!-- /.blog-image -->
    <div class="blog-content">
        <span class="meta-date"><a href="#">{{ $post->created_at->format('d M Y') }}</a></span>
        <span class="meta-category"><a href="{{ url('category/'.$post->category_id) }}">{{ $category }}</a></span>
        {{-- <span class="meta-comments"><a href="#">0 Comments</a></span> --}}
        <span class="meta-author"><a href="#">Fauzan Ajip</a></span>
        <h3><a href="{{ url('post-detail/'.$post->id) }}">{{ $post->title}}</a></h3>
        {{-- <p class="light-text">Don accumsan nibh tincidunt sed.</p> --}} <!--- Add Subtitle if you want -->
        <p>
            @php
                if (strlen($post->content) < 250) {
                    echo $post->content;
                } else {
                    $url = url('post-detail/'.$post->id);
                    echo substr($post->content, 0, 250) . '<a href="'.$url.'">... Read More</a>';
                }
            @endphp
        </p>
    </div> <!-- /.blog-content -->
</div> <!-- /.post-blog -->
