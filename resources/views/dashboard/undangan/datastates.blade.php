@extends('dashboard.layouts.app')

@section('content')
<div class="container d-flex gap-2 pt-4">
  <form method="post" action="/dashboard/states" class="row" enctype="multipart/form-data">
    @csrf
    <label class="form-label">Data States</label>
    <input type="text" class="form-control" name="data_states" placeholder="data-states">
    <small id="helpId" class="text-muted">Pastikan Tanpa Spasi</small>
    <button type="submit" class="btn btn-dark mt-3 col-12">Submit</button>
  </form>
</div>
@endsection