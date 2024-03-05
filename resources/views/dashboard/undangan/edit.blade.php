@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit / <span class="fs-5">Data States</span></h1>
</div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/states/{{ $undangan }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Data States</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $undangan }}" id="data_states" name="data_states" placeholder="data-pertama" required autofocus>
      <small id="helpId" class="text-muted">Pastikan Tanpa Spasi</small>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endsection