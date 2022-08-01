@extends('dashboard.layout.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h3>Categories</h3>
  </div>
<div class="table-responsive col-lg-8">
  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <a href="/dashboard/categories/create" class="btn btn-primary btn-sm">Create new category</a>
    <table class="table table-striped table-sm mt-2">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->name }}</td>
          <td>
            <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><span data-feather="eye" class="align-text-bottom"></span></a>
            {{-- /dashboard/posts/{{ $post->slug }}/edit aturan dari default dari route resource --}}
            {{-- untuk cek menggunakan terminal --}}
            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><span data-feather="edit" class="align-text-bottom"></span></a>
            <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure delete data?')"><span data-feather="x-circle" class="align-text-bottom"></span></button>
          </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection