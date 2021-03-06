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
                <form action=" {{ url('admin/mainmenu/create') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    <div class = "form-group mb-3">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            <option value="">Select Category</option>
                            <option value="link">link</option>
                            <option value="content">content</option>
                            <option value="file">file</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category">Parent</label>
                        <select class="form-control" id="parent" name="parent">
                            <option value="0">-</option>
                            @foreach ($data as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3" id="contents">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="10" cols="50"></textarea>
                    </div>
                    <div class="form-group mb-3" id="files">
                        <label for="fle">File</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <div class="form-group mb-3" id="links">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url">
                    </div>
                    <div class="form-group mb-3">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" name="order" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="0">Belum Publish</option>
                            <option value="1">Publish</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('admin/mainmenu') }}" class="btn btn-danger ">Cancel</a>  
                    </div> 
                </form>     
            </div>
        </main>
    </div>
</div>
    
@endsection

@section('js')
    <script src="/assets/js/ckeditor/ckeditor.js"></script>
    <script src="/assets/js/mainmenus.js" type="text/javascript"></script>
    <script src="/assets/js/setckeditor.js" type="text/javascript"></script>   
@endsection