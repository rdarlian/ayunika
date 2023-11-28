@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5">
  <h1 class="fw-bold fs-5 text-secondary">Greeting/<span class="fs-6 fw-normal">Create</span></h1>
</div>
<div class="col-lg-8 pt-3">
  <form method="post" action="/dashboard/greeting" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <p><label for="word" class="form-label fs-4 fw-bold">word</label></p>
      <textarea name="word" rows="30" cols="70"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Greeting</button>
  </form>
</div>

<script>

</script>
@endsection