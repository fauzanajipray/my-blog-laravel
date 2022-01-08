<div class="first-widget" id="blog">
    <div class="container-fluid">
        <div class="sliders-corousel owl-theme">
            @for($i=0;$i<5;$i++)
            <div class="item">
                <img src="assets/images/template/banner-item-01.jpg" alt="">
                    <div class="item-content text-center">
                        <div class="main-content">
                            <div class="meta-category">
                                <span class="text-center">Fashion</span>
                            </div>
                            <a href="post-details.html">
                                <h4>Morbi dapibus condimentum</h4>
                            </a>
                            <ul class="post-info">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">May 12, 2020</a></li>
                            <li><a href="#">12 Comments</a></li>
                            </ul>
                        </div>
                    </div>
            </div>
            @endfor
        </div>
    </div> <!-- /.container -->
</div> <!-- /.pageTitle -->