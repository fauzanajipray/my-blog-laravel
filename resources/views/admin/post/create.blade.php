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
            <div class="col-md-6">
                <form action=" {{ url('admin/post/create') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    <div class="form-group mb-3">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group mb-3">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="is_headline">Headline</label>
                        <select class="form-control" id="is_headline" name="is_headline">
                            <option value="0">Tidak Headline</option>
                            <option value="1">Headline</option>
                        </select>   
                    </div>
                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="0">Belum Publish</option>
                            <option value="1">Publish</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>   
                </form>     
            </div>
        </main>
    </div>
</div>
    
@endsection

@section('js')
<script type="text/javascript">
    import "./ckeditor.js";
    var ckeditor = require( 'ckeditor' );

    var content = document.getElementById('content');
    ckeditor.ClassicEditor
        .create( content )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>   
@endsection