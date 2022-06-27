@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Serial No:</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td><img src="{{ asset('storage/post/' . $post->image) }}" alt="" width="150px" height="70px"></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                                        style="display: inline-flex">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick=" return confirm('Are you  shure to delete?')"
                                            class="btn btn-danger btn-sm icon-trash"> Delete</button>
                                    </form>
                                </td>
                            </tr> 
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
