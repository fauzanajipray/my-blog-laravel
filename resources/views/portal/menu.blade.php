@extends('portal.app')

@section('css')

@endsection

@section('content')
<div class="first-widget parralax" id="blog">
    <div class="parallax parallax-overlay">
        <div class="container pageTitle">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h2 class="page-title">  </h2>
                </div> <!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-6 text-right">
                    <span class="page-location">Home / Posts / Main Menu </span>
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.parallax-overlay -->
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 blog-posts">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-blog">
                        <div class="blog-content">
                            <span class=""><a href="#">{{ $data['menu']->created_at->format('d M Y') }}</a></span>
                            <h3 class="post-title"><a href="#">{{ $data['menu']->title }}</a></h3>
                            <div>
                                {!! $data['menu']->content !!}
                            </div>
                        </div> <!-- /.blog-content -->
                    </div> <!-- /.post-blog -->
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
        </div>
        @livewire('portal.sidebar', [
            'posts' => $data['latestposts'],
            'categories' => $data['categories'],
            'user' => $data['user'],
        ])
    </div>
</div>


@endsection

@section('js')

@endsection