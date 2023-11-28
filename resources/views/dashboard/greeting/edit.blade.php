@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Greeting</h1>
</div>

<div class="col-lg-8">
  <form method="post" action="/dashboard/greeting/{{ $greeting->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">

      <p><label for="word" class="form-label fs-4 fw-bold">word</label></p>
      <textarea name="word" rows="30" cols="70">
      {{ $greeting->word }}
      </textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Greeting</button>
  </form>
</div>

@endsection