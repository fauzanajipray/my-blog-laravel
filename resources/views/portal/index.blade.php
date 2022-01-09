@extends('portal.app')

@section('css')

@endsection

@section('content')

<!-- Slider -->
@livewire('portal.show-slider')
<div class="container">
    <div class="row">
        @livewire('portal.blog-posts')
        @livewire('portal.sidebar')
    </div>
</div>

@endsection


@section('js')

<script src="/assets/js/plugins/owl.carousel.js"></script> 

@endsection
