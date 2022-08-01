@extends('layout.main')
@section('container')
    <h1 class="my-2">Post category : {{ $category }}</h1>
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-sm-12">
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post["title"] }}</a></h5>
                    <p>Penulis :  <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>| <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                    <p>{{ $post->excerpt }}</p>
                </div> 
            </div>
        </div>
        @endforeach
    </div>
@endsection