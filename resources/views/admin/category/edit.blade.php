@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        
        @include('layout.admin.nav')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit {{ $title }}</h1>
        </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="col-md-6">
                <form action=" {{ url('admin/category/edit/'.$data->id) }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" 
                        placeholder="Enter name" value="{{ $data->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('admin/category') }}" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </main>
    </div>
</div>
    
@endsection