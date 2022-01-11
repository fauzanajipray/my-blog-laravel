@extends('portal.app')

@section('css')

@endsection

@section('content')
<div class="first-widget parralax" id="blogPosts">
    <div class="parallax parallax-overlay">
        <div class="container pageTitle">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <h2 class="page-title">{{ $data['category']->name }} Posts</h2>
                </div> <!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-6 text-right">
                    <span class="page-location">Home / Category</span>
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.parallax-overlay -->
</div>
<div class="container">
    <div class="row">
        @livewire('portal.blog-posts', ['posts' => $data['posts']])
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