@extends('dashboard.layouts.app')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h1 class="fw-bold fs-5 text-secondary">Guests</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
  {{ session('success') }}
</div>

@endif

<div class="d-flex flex-row mb-3">
  <div class="me-2">
    <a href="/dashboard/guests/create" class="btn btn-primary">Create new guest</a>
  </div>
  <div class="me-2">
    <a href="/dashboard/guests/greeting/{{$guests}}" class="btn btn-primary">Ucapan WA</a>
  </div>
  <div class="">
    <form action="{{ route('import-tamu') }}" method="POST" enctype="multipart/form-data" class="d-flex">
      @csrf
      <div class="form-group">
        <input type="file" name="file" id="file" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Import</button>
    </form>
  </div>

  <a href="/export/guest" class="btn btn-success ms-2">Export</a>

</div>

<div class="table-responsive col-lg-12">
  <table class="table table-striped">
    <form action="{{ route('guests.index') }}" method="get">
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
        <th scope="col">Nama</th>
        <th scope="col">Action</th>
        <th scope="col">WhatsApp</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($guests as $guest )
      <tr>
        <td> {{ ($guests->currentpage()-1) * $guests->perpage() + $loop->index + 1 }}</td>
        <td>{{ $guest->name }}</td>
        <td>
          <?php


          $replaced = str_replace(['#TAMU#', '#LINK#', '#WANITA#', '#PRIA#'], [$guest->name, $link, $both["bride_nickname"], $both["groom_nickname"]], $greet);

          $apa = str_replace(["\r\n", "\n", ' '], ['%0A', '%0A', '%20'], $replaced);
          ?>

          <a href="/dashboard/guests/{{ $guest->slug }}" class="btn bg-info"><i class="fa-regular fa-eye"></i></a>
          <a href="https://wa.me/+6282234810637/?text={!! $apa !!}" data-action="share/whatsapp/share" class="btn bg-info" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>



          <a href="/dashboard/guests/{{ $guest->slug }}/edit" class="btn bg-warning"><i class="fa-regular fa-pen-to-square"></i></a>
          <form action="/dashboard/guests/{{ $guest->slug }}" method="guest" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn bg-danger border-0" onclick="return confirm('Hapus data sekarang ?')"><i class="fa-solid fa-trash-can"></i></button>
          </form>
        </td>
        <td>
          {{ $guest->nohp }}
        </td>
        <td>{{ $guest->status }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="d-flex justify-content-end">
  {{ $guests->withQueryString()->links('pagination::bootstrap-5') }}
</div>


@endsection