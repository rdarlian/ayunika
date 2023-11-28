@extends('dashboard.layouts.app')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h1 class="fw-bold fs-5 text-secondary">Song</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
  {{ session('success') }}
</div>

@endif

<div class="table-responsive col-lg-12">
  <a href="/dashboard/song/create" class="btn btn-primary mb-3">Create new Song</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Play</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($songs as $song )
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $song->judul }}</td>
        <td>
          <audio controls>
            <source src="{{ url('storage/' . $song->link) }}" type="audio/mpeg">
          </audio>
        </td>
        <td>
          <a href="/dashboard/song/{{ $song->id }}/edit" class="btn bg-warning"><i class="fa-regular fa-pen-to-square"></i></a>
          <form action="/dashboard/song/{{ $song->id }}" method="post" class="d-inline">
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
  {{ $songs->links('pagination::bootstrap-5') }}
</div>
@endsection