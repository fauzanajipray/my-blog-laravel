@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        
        @include('layout.admin.nav')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $title }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ url('admin/category/create') }}" class="btn btn-sm btn-outline-secondary p-1">
                        <span data-feather="file-plus"></span>
                        Add {{ $title }}
                    </a>
                </div>
            </div>
        </div>
        @if (Session::has('status'))
            <div class="alert alert-warning" role="alert">
                {{ Session::get('status') }}
            </div>
            @endif
        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" width="100">
                    </td>
                    <td>
                        <a href="{{ url('admin/category/edit/'.$item->id) }}" class="btn btn-sm btn-primary m-2">
                            <span data-feather="edit"></span>
                            Edit
                        </a>
                        <a href="{{ url('admin/category/delete/'.$item->id) }}" class="btn btn-sm btn-danger">
                            <span data-feather="trash-2"></span>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>

        </main>
    </div>
</div>
    
@endsection