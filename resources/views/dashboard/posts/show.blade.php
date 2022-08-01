@extends('dashboard.layout.main')
@section('container')

<div class="container my-3">
    <div class="row">
        <div class="col-lg-8">
            <h1>{{ $post->title }}</h1>
            
            <a href="/dashboard/posts" class="btn btn-success btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><span data-feather="arrow-left" class="align-text-bottom"></span> Back to my posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><span data-feather="edit" class="align-text-bottom"></span> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Are you sure delete data?')"><span data-feather="x-circle" class="align-text-bottom"></span>Delete</button>
            </form>
            @if ($post->image)
            <div style="max-height: 530px; overflow:hidden;">
                <img src="{{ asset('/storage/' . $post->image) }}" class="img-fluid mt-2" alt="..." >
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-2" alt="..." >
            @endif
            <article class="my-3 fs-7">
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>
@endsection