@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5">
  <h1 class="fw-bold fs-5 text-secondary">Theme/<span class="fs-6 fw-normal">Create</span></h1>
</div>

<div class="col-lg-8 pt-3 bg-white rounded-4 p-4">
  <form method="post" action="/dashboard/guests" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Masukkan Daftar Tamu</label>
      <textarea name="name" rows="10" cols="40" placeholder="Masukkan data dengan pemisah @" class="form-control @error('name') is-invalid @enderror" required autofocus value="{{ old('name') }}" autocomplete="off"></textarea>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Kirim Data</button>
  </form>

  <div>
    <p>Contoh</p>

  </div>
</div>

<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'blok';

    const oFReader = new FileReader();

    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection