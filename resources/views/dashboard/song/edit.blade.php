@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Song</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/song/{{ $song->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="judul" class="form-label">Title</label>
      <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul', $song->judul) }}">

      @error('judul')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="song_id" class="form-label">Song</label><br>

      <input type="hidden" name="oldLink" type="file" value="{{ $song->link }}" accept="audio/*"><br>
      @if($song->link)
      <audio controls src="{{ url('storage/' . $song->link) }}"></audio>
      <div id="result"></div>
      @else
      <audio controls src=""></audio>
      @endif

      <input class="form-control mt-3" id="song_id" name="link" type="file" onchange="previewFile()" accept="audio/*"><br>

      @error('link')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Song</button>
  </form>
</div>

@endsection
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