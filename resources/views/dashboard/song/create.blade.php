@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5">
  <h1 class="fw-bold fs-5 text-secondary">Song/<span class="fs-6 fw-normal">Create</span></h1>
</div>

<div class="col-lg-8 pt-3">
  <form method="post" action="/dashboard/song" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="judul" required autofocus value="{{ old('title') }}" autocomplete="off">

      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="song_id" class="form-label">Song</label><br>
      <input id="song_id" name="link" type="file" onchange="previewFile()" accept="audio/*"><br>
      <audio controls src=""></audio>
      <div id="result"></div>

    </div>
    <button type="submit" class="btn btn-primary">Create Song</button>
  </form>
</div>

<script>
  function previewFile() {
    var preview = document.querySelector('audio');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.addEventListener("load", function() {
      preview.src = reader.result;
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }
</script>
@endsection