@extends('layout.app')

@section('content')
<div class="container mt-5 p5 bg-light">
    <div class="row d-flex justify-content-center">
        <div class="card bg-light">
            <div class="card-body ">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="assets/images/bg-register.jpg" alt="bg-image" class="card-img-top crop">
                    </div>
                    <div class="col-lg-6 p-3 pt-5 pb-5">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (Session::has('status'))
                            <div class="alert alert-warning" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h3 class="mb-4">Form Register</h3>
                            <div class="form-group mb-1">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group mb-1">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group mb-1">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>
                            {{-- <div class="form-group mb-1">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter confirm password">
                            </div> --}}
                            <div class="form-group mb-3">
                                <label for="image">image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <p class="mt-3 text-center">
                            Already have account? <span><a href="{{ url('login') }}">Login</a></span>
                        </p>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection