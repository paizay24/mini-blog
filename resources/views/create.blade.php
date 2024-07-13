@extends('master')
@section('title')
    Create
@endsection
@section('content')
    <h1 class=" text-center text-primary m-4">Post Create</h1>
    @if ($errors->any())
        <div class=" text-center">
            <div class="alert alert-danger">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </div>
        </div>
    @endif
    <section class=" d-flex justify-content-center align-items-center">

        <div style="width: 50rem;">
            <form action="{{ route('blog.store') }}" class=" form-control" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Post Title</label>
                    <input type="text" value="{{ old('title') }}" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Post title">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Post Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
                </div>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class=" text-end">
                    <button type="submit" class=" btn btn-outline-primary">Create</button>
                </div>
            </form>
        </div>
    </section>
@endsection
