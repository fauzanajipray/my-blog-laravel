@extends('portal.app')

@section('css')

@endsection

@section('content')

@livewire('portal.show-slider') <!-- Slider -->
<div class="container">
    <div class="row">
        @livewire('portal.blog-posts', ['posts' => $data['headline']])
        @livewire('portal.sidebar', [
            'posts' => $data['latestposts'],
            'categories' => $data['categories'],
            'user' => $data['user'],
        ])
    </div>
</div>

@endsection

@section('js')

<script src="/assets/js/plugins/owl.carousel.js"></script> 

@endsection
