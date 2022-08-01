@extends('layout.main')
@section('container')

<div class="container">
    <h1 class="my-4 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @elseif (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Post...." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            {{-- untuk ambil data pertama dari coolection maka gunakan index 0 --}}
            @if ($posts[0]->image)
                    <div style="max-height: 530px; overflow:hidden;">
                        <img src="{{ asset('/storage/' . $posts[0]->image) }}" class="img-fluid" alt="..." >
                    </div>
                    @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
                    @endif
            <div class="card-body text-center">
            <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
            <small class="text-muted">
                <p>By.  <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</p>
            </small>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
            </div>
      </div>
    


        <div class="row">
            {{-- ini skip index ke 0 berarti karena index ke akan di taruh di hero yaitu paling atas --}}
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-2 ">
                <div class="card">
                    <div class="position-absolute bg-dark px-3 py-2"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                    @if ($post->image)
                        <img src="{{ asset('/storage/' . $post->image) }}" class="img-fluid" alt="..." style="height: 280px">
                        {{-- pemanggilan diatas jika kita menggunakan class storage yang disediakan admin --}}
                        {{-- dibawah ini alternatif jika di controller di ubah ke move menggunkan function php murni --}}
                        {{-- ubah semuanya pemanggilan yang menggunakan file atau gambar --}}
                        {{-- <img src="{{ url('/dataImages/' . $posts[0]->image) }}" class="img-fluid" alt="..." > --}}
                    @else
                    <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                    @endif
                    
                    <div class="card-body p-2">
                        <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post["title"] }}</a></h5>
                        <small class="text-muted">
                            <p>By.  <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}</p>
                        </small>
                      <p class="card-text">{{ $post->excerpt }}</p>
                      <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                    </div>  
                </div>
            </div>
            @endforeach
        </div> 
    

    @else
    <p class="text-center fs-4">No Posts Found!</p>
  @endif
</div>

<div class="d-flex justify-content-end">
    {{ $posts->links() }}
</div>
@endsection

{{-- mass assigment --}}
{{-- Post::create([
    'title' => 'judul kelima',
    'category_id' => 3,
    'slug' => 'judul-kelima',
    'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
    'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat molestias dolore tenetur odit magnam, ut dolorem pariatur nihil, odio atque ducimus alias. Explicabo saepe illum sequi harum maiores magnam sunt voluptates nostrum sed vitae tempore magni sit aliquam animi repellendus quam temporibus ea at fugiat, repudiandae commodi fugit suscipit? Et provident illum aut nulla adipisci distinctio eius iste, blanditiis eaque, modi minima officia doloribus molestias maxime consequatur laudantium? Deleniti iusto ipsam unde aliquam.</p> <p>Molestias eum quibusdam assumenda dignissimos libero voluptate illo totam sapiente ullam nulla, reprehenderit id magnam tenetur quo. Nulla quibusdam, molestias iure quasi illum iste exercitationem ipsam perspiciatis?</p>'
]) --}}

{{-- Category::create([
    'name' => 'Web Developer',
    'slug'  => 'web-developer',
]) --}}

{{-- Post::find(5)->update(['title' => 'judul ke 4 yang berubah']) --}}

{{-- Post::where('title', 'judul keempat')->update(['excerpt' => 'excerpt berubah']) --}}