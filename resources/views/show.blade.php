@extends('master')
@section('title')
    Show
@endsection

@section('content')
    <div class="container full-height ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <a class=" btn btn-secondary" href="{{ route('blog.index') }}">Home</a>
                            </div>
                            <div>
                                <a href="{{ route('blog.create') }}" class="btn btn-primary">Create Post</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" mt-3 d-flex justify-content-center ">
                <div class="card p-2" style="width: 60rem;">
                    <div class=" card-title">
                        <h1>{{ $post->title }}</h1>
                    </div>
                    <div class=" card-body">
                        <p>{{ $post->description }}</p>
                        <div>
                            <div>{{ $post->created_at->format('d-m-Y') }}</div>
                            {{ $post->created_at->format('h-i') }}
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
@endsection
