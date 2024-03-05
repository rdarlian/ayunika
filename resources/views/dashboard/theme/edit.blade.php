@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Theme</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/themes/{{ $theme->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Title</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $theme->name) }}">

      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $theme->slug) }}">
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="theme_id" class="form-label">theme_id</label>
      <input type="text" class="form-control @error('theme_id') is-invalid @enderror" id="theme_id" name="theme_id" value="{{ old('theme_id', $theme->theme_id) }}">
      @error('theme_id')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Pilih Data</label>
      <select id="dataStates" class="form-select form-select" name="data_states">
        <option value="">Select Data</option>
        @foreach($data_states as $item)
        <option value="{{ $item->data_states }}">{{ $item->data_states }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Theme Image</label>
      <input type="hidden" name="oldImage" value="{{ $theme->image }}">
      @if ($theme->image)
      <img src="{{ asset('storage/' . $theme->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
      @else
      <img class="img-preview img-fluid mb-3 col-sm-5">
      @endif

      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Theme</button>
  </form>
</div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function() {
    fetch('/dashboard/themes/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });


  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

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