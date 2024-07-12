@extends('master')
@section('title')
    Create
@endsection
@section('content')
    <h1 class=" text-center text-primary m-4">Post Edit</h1>
    <section class=" d-flex justify-content-center align-items-center">

        <div style="width: 50rem;">
            <form action="{{ route('post.update', $post->id) }}" class=" form-control" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Post Title</label>
                    <input type="text" value="{{ $post->title }}" name="title" class="form-control" placeholder="Post title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Post Description</label>
                    <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3">{{ $post->description }}</textarea>
                </div>
                <div class=" text-end">
                    <button type="submit" class=" btn btn-outline-primary">Update</button>
                </div>
            </form>
        </div>
    </section>
@endsection
