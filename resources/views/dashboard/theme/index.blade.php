@extends('dashboard.layouts.app')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h1 class="fw-bold fs-5 text-secondary">Theme</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
  {{ session('success') }}
</div>

@endif

<div class="table-responsive col-lg-12">
  <a href="/dashboard/themes/create" class="btn btn-primary mb-3">Create new Theme</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Theme_id</th>
        <th scope="col">Data</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($themes as $theme )
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $theme->name }}</td>
        <td>{{ $theme->slug }}</td>
        <td>{{ $theme->theme_id }}</td>
        <td>{{ $theme->data_states }}</td>

        <td> <img width="100px" height="100px" src=" {{ asset('storage/'.$theme->image) }}" alt=""></td>
        <td>

          <a href="/dashboard/themes/{{ $theme->id }}/edit" class="btn bg-warning"><i class="fa-regular fa-pen-to-square"></i></a>
          <form action="/dashboard/themes/{{ $theme->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn bg-danger border-0" onclick="return confirm('Hapus data sekarang ?')"><i class="fa-solid fa-trash-can"></i></button>
          </form>
          <a target="_blank" href="/{{$user}}/{{ $theme->theme_id }}?r=Adin" class="btn bg-primary"><i class="fa-regular fa-eye"></i></a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
<div class="d-flex justify-content-end">
  {{ $themes->links('pagination::bootstrap-5') }}
</div>
@endsection