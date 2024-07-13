@extends('master')
@section('title')
    Home
@endsection



@section('content')
    <div class="container full-height ">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h1>Home</h1>
                            </div>
                            <div>
                                <a href="{{ route('blog.create') }}" class="btn btn-primary">Create Post</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <form action="{{ route('blog.index') }}" class="input-group m-3" method="GET">
                    @csrf
                    <input type="text" name="q" class="form-control" value="{{ request('q') }}" placeholder="Search Something" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
                  </form>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                  <h3 class=" text-center">  {{ session('status') }}</h3>
                </div>
            @endif
            @foreach ($posts as $post)
                <div class=" mt-3 d-flex justify-content-center ">
                    <div class="card p-2" style="width: 60rem;">
                        <div class=" card-title">
                            <h1>{{ $post->title }}</h1>
                        </div>
                        <div class=" card-body">
                            <p>{{ Str::words($post->description, 50, '...') }}</p>
                            <div>
                                <div>{{ $post->created_at->format('d-m-Y') }}</div>
                                {{ $post->created_at->format('h:i A') }}
                            </div>
                        </div>
                        <div class=" card-footer">
                            <div class=" d-flex justify-content-between  align-items-center">
                                <div>
                                    <a href="{{ route('blog.show', $post->id) }}" class=" btn btn-primary">See More...</a>
                                </div>
                                <div class=" d-flex ">
                                    <form action="{{ route('blog.destroy', $post->id) }}" class=" d-block" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class=" btn btn-danger">Delete</button>
                                    </form>
                                    <div>
                                        <a href="{{ route('blog.edit',$post->id) }}" class=" ms-2 btn  btn-primary">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class=" m-4 d-flex justify-content-center">{{ $posts->links() }}</div>
    </div>
@endsection
