@extends('dashboard.layout.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h3>Create new post</h3>
</div>
<div class="col-lg-10 my-5">
<form method="post" action="/dashboard/posts" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" autofocus>
      @error('title')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" readonly style="background-color:#e0e0eb">
      @error('slug')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
      <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example" name="category_id" id="category_id">
        @foreach ($categories as $c)
          @if (old('category_id') ==  $c->id )
          <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
          @else
          <option value="{{ $c->id }}">{{ $c->name }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <img class="img-preview img-fluid mb-2 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
    <label for="category_id" class="form-label">Body Post</label>
    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
    <trix-editor input="body"></trix-editor>
    @error('body')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  // title.addEventListener('change', function(){
  //   fetch('/dashbord/post/cekSlug?title=' + title.value)
  //   .then(response => response.json())
  //   .then(data => slug.value = data.slug)
  // })

  title.addEventListener('keyup', function(){
    const string = title.value;
    const explode = string.split(" ");
    const implode = explode.join("-");
    slug.value = implode.toLowerCase();
  })

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault()
  })

  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>

@endsection