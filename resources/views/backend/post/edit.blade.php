@extends('backend.layouts.app')
@section('content')
    <h1 class="text-center">Update Product</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="inputName" class="form-label"> Product Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $post->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $post->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image"
                           {{-- value="{{ $post->image }}"--}}>
                            <img src="{{asset('storage/post/'.$post->image)}}" alt="" width="150px" height="70px">


                    </div>
                    {{-- Storage::disk('public')->delete('post/' . $post->image); --}}
                    <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
