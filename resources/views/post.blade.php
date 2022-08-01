@extends('layout/main')
@section('container')

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            {{-- $post->category->name --}}
            {{-- $category[0]->name --}}
            {{-- jika mau mengubah dari user ke authors ketika disorot maka ubah juga pada modelnya --}}
            <p>By : {{-- {{ $post->author }} --}} <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
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
            <a href="/posts" class="text-decoration-none">Bact to posts</a>
        </div>
    </div>
</div>
@endsection