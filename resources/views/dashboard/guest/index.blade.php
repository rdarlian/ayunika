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

<div class="table-responsive col-lg-12 border p-4 mt-4 rounded-4" style="background: #f0f0f0;">
  <table class="table table-striped">
    <div class="row">
      <div class="col-md-8 mb-2">
        <a href="/dashboard/guests/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Data</a>
        <a href="/dashboard/guests/greeting/{{$guests}}" class="btn btn-primary">Template Ucapan</a>
      </div>

      <div class="col-md-4 mb-3">
        <!-- <form action="{{ route('guests.index') }}" method="get">
          <div class="d-flex gap-2">
            <input type="text" class="form-control" placeholder="search" name="q">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </form> -->
      </div>
    </div>

    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">WhatsApp</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($guests as $guest )
      <tr>
        <td> {{ ($guests->currentpage()-1) * $guests->perpage() + $loop->index + 1 }}</td>
        <td>{{ $guest->name }}</td>
        <td>
          {{ $guest->nohp }}
        </td>
        <td>
          @if(isset($greet))
          <?php
          $share = $link . "/" . $slug . "?r=" . $guest->name;
          $replaced = str_replace(['#TAMU#', '#LINK#', '#WANITA#', '#PRIA#'], [$guest->name, $share, $both["bride_nickname"], $both["groom_nickname"]], $greet);

          $apa = str_replace(["\r\n", "\n", ' '], ['%0A', '%0A', '%20'], $replaced);

          ?>
          <input type="text" value="{{ $greet ?? '' }}" id="copyText" hidden>
          <button class="btn bg-info" onclick="copy('copyku{{$loop->index}}')" id="copyku{{$loop->index}}"><i class="fa-regular fa-copy"></i></button>
          <a href="https://wa.me/{{$guest->nohp}}/?text={!! $apa !!}" data-action="share/whatsapp/share" class="btn bg-success" target="_blank"><i class="fa-brands text-white fa-whatsapp"></i></a>

          <a href="/dashboard/guests/{{ $guest->id }}/edit" class="btn bg-warning"><i class="fa-regular fa-pen-to-square"></i></a>
          <form action="/dashboard/guests/{{ $guest->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn bg-danger border-0" onclick="return confirm('Hapus data sekarang ?')"><i class="fa-solid fa-trash-can"></i></button>
          </form>
          @else
          <p>Pilih Template Ucapan Dulu</p>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="d-flex justify-content-end">
  {{ $guests->withQueryString()->links('pagination::bootstrap-5') }}
</div>

<script>
  function copy(id) {
    const btn = document.getElementById('copyBtn');
    const text = document.getElementById('copyText');
    text.readOnly = true;

    text.select();
    text.setSelectionRange(0, 99999);
    // Alert the copied text
    try {
      navigator.clipboard.writeText(text.value);
      text.type = 'hidden';
      $(`#${id}`).text("Copied");
      setTimeout(function() {
        // $(`#${id}`).text('');
        location.reload();
      }, 3000);
    } catch (err) {
      console.error(err.name, err.message);
    }
  }
</script>
@endsection