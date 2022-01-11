<div class="col-md-8 blog-posts">
    <div class="row">
        <div class="col-md-12">
            <div class="post-blog">
                <div class="blog-image">
                    <img src="{{ asset($post->thumbnail) }}" alt="">
                </div> <!-- /.blog-image -->
                <div class="blog-content">
                    <span class="meta-date"><a href="#">{{ $post->created_at->format('d M Y') }}</a></span>
                    <span class="meta-category"><a href="{{ url('category/'.$post->category_id) }}">{{ $category }}</a></span>
                    {{-- <span class="meta-comments"><a href="#blog-comments">3 Comments</a></span> --}}
                    <span class="meta-author"><a href="#blog-author">Fauzan Ajip</a></span>
                    <h3>{{ $post->title }}</h3>
                    <div>
                        {!! $post->content !!}
                    </div>
                </div> <!-- /.blog-content -->
            </div> <!-- /.post-blog -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div id="blog-author" class="clearfix">
                <a href="#" class="blog-author-img pull-left">
                    <img src="{{ asset($user->image) }}" alt="{{ $user->name }}">
                </a>
                <div class="blog-author-info">
                    <h4 class="author-name"><a href="#">{{ $user->name }}</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, quod, doloremque, quia cum maiores commodi consequatur dolore et dolores omnis officiis minus dolor ex quae incidunt veritatis.</p>
                </div>
            </div>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div id="blog-comments" class="blog-post-comments">
                <h3>{{ $comments->count() }} Comments</h3>
                <div class="blog-comments-content">
                    {{-- <div class="media">
                        <div class="pull-left">
                            <img class="media-object" src="images/includes/comment1.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <h4>Linda Wilson</h4> 
                                <a href="#"><span>4 weeks ago</span><span>Reply</span></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet lorem, elit. Sequi, nam magni repellendus! <span class="label label-primary">New</span></p>
                            <div class="media">
                                <div class="pull-left">
                                    <img class="media-object" src="images/includes/comment2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>Stephen</h4> 
                                        <a href="#"><span>5 weeks ago</span><span>Reply</span></a>
                                    </div>
                                    <p>Temporibus, ea, praesentium eaque totam vel quos laboriosam quia sit dolore at consequatur beatae aliquam debitis porro quasi cupiditate quod!</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    @foreach ($comments as $comment)
                    @livewire('portal.comment', ['comment' => $comment ])
                    @endforeach
                </div> <!-- /.blog-comments-content -->
            </div> <!-- /.blog-post-comments -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="comment-form">
                <h3>Leave a comment</h3>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="widget-inner">
                    <form action="{{ url('comment') }}" method="post">
                    @csrf
                    <input type="text" name="post_id" value="{{$post->id}}" hidden >
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <label for="name-id">Your Name:</label>
                                <input type="text" id="name-id" name="name">
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <label for="email-id">Email Address:</label>
                                <input type="email" id="email-id" name="email">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <label for="comment">Your comment:</label>
                                <textarea name="comment" id="comment" rows="5"></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input class="mainBtn" type="submit" name="submit" value="Submit Comment" id="submit">
                        </div>
                    </div>
                    </form>
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.col-md-8 -->