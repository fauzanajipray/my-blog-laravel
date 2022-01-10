<div class="col-md-8 blog-posts">
    <div class="row">
        <div class="col-md-12">
            <div class="contact-form">
                <h3>Send a Direct Message</h3>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @if (Session::has('status'))
                    <div class="alert alert-warning" role="alert">
                        {{ Session::get('status') }}
                    </div>
                @endif
                @endif  
                <div class="widget-inner">
                <form action="{{ url('/') }}" method="post" id="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <label for="name">Your Name:</label>
                                <input type="text" name="name" id="name">
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <label for="email">Email Address:</label>
                                 <input type="email" name="email" id="email">
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p>
                                <label for="subject">Subject:</label>
                                 <input type="text" name="subject" id="subject">
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <label for="message">Your message:</label>
                                <textarea name="message" id="message"></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="mainBtn" id="submit">Send Message</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="result"></div>
                        </div> <!-- /.col-md-12 -->
                    </div> <!-- /.row -->
                </form>
              </div> <!-- /.widget-inner -->
            </div> <!-- /.contact-form -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div> <!-- /.col-md-8 -->