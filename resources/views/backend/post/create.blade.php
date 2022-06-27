@extends('backend.layouts.app')
@section('content')
    <h1 class="text-center">Create Product</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label"> Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
