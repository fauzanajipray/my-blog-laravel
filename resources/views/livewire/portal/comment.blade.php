<div class="media">
    <div class="pull-left">
        <img class="media-object" src="https://picsum.photos/200" alt="" width="60">
    </div>
    <div class="media-body">
        <div class="media-heading">
            <h4>{{ $comment->name }}</h4> 
            <a href="#"><span>{{ $time_ago }}</span><span>Reply</span></a>
        </div>
        <p>{{ $comment->comment }}</p>
    </div>
</div>
