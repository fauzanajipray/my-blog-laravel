@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        
        @include('layout.admin.nav')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Create {{ $title }}</h1>
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
            <div class="col-md-8">
                <form action=" {{ url('admin/slider/create') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url">
                    </div>
                    <div class="form-group mb-3">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" name="order" placeholder="Order">
                    </div>
                        <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="0">Belum Publish</option>
                            <option value="1">Publish</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>   
                    <a href="{{ url('admin/slider') }}" class="btn btn-danger">Cancel</a>
                </form>     
            </div>
        </main>
    </div>
</div>
    
@endsection

@section('js')

@endsection