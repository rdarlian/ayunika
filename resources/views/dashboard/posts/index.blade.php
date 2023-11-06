@extends('dashboard.layouts.app')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h1 class="fw-bold fs-5 text-secondary">News</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
  {{ session('success') }}
</div>

@endif

<div class="table-responsive col-lg-12">
  <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
  <table class="table table-striped">
    <form action="{{ route('posts.index') }}" method="get">
      <div class="row">
        <div class="col-md-10">
          <input type="text" class="form-control mb-3" placeholder="search" name="q">
        </div>
        <div class="col-md-2">
          <input type="submit" class="form-control mb-3 btn btn-primary" value="Search">
        </div>
      </div>
    </form>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post )
      <tr>
        <td> {{ ($posts->currentpage()-1) * $posts->perpage() + $loop->index + 1 }}</td>
        <td>{{ $post->title }}</td>
        <td>
          <a href="/dashboard/posts/{{ $post->slug }}" class="btn bg-info"><i class="fa-regular fa-eye"></i></a>
          <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn bg-warning"><i class="fa-regular fa-pen-to-square"></i></a>
          <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn bg-danger border-0" onclick="return confirm('Hapus data sekarang ?')"><i class="fa-solid fa-trash-can"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="d-flex justify-content-end">
  {{ $posts->withQueryString()->links('pagination::bootstrap-5') }}
</div>
@endsection