@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        
        @include('layout.admin.nav')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Profil</h1>
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
            <form action=" {{ url('admin/profile/'.$data->id) }} " method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" 
                        placeholder="Enter name" value="{{ $data->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" 
                        placeholder="Enter name" value="{{ $data->email }}">
                    </div>
                    <div class="form-group mb-3">
                        @if ($data->image != null)  
                        <img src="{{ asset($data->image) }}" alt="{{ $data->name }}" width="200" id="imgPreview" class="img-fluid m-2">
                        @endif
                        <img src="" alt="{{ $data->name }}" width="200" id="imgPreview" class="img-fluid m-2" style="display:none;">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" onchange="showPreview(event);">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ url('admin/category') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </main>
    </div>
</div>
    
@endsection

@section('js')
<script type="text/javascript">
    function showPreview(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById('imgPreview');
            preview.src = src;
            preview.style.display = "block";
        }s
    }
</script>
@endsection