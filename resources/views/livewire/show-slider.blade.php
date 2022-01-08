<div class="first-widget" id="blog">
    <div class="container">
        <div class="sliders-corousel owl-theme">
            @foreach ($sliders as $slider)
            <div class="item">
                <img src="{{ asset($slider->image) }}" alt="{{ $slider->title}}">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            {{-- <span class="">Fashion</span> --}}
                        </div>
                        <a href="{{ url($slider->url) }}" id="slider-title">
                            <h4>{{ $slider->title}}</h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">May 12, 2020</a></li>
                            <li><a href="#">12 Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> <!-- /.container -->
</div> <!-- /.pageTitle -->