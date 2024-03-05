@extends('dashboard.layouts.app')

@section('content')
@if(Auth::check() && Auth::user()->is_admin == 1)
<div class="container d-flex gap-2 pt-4 rows">
  @foreach($states as $item)
  <a id="states" href="/dashboard/undangan/{{ Str::slug($item->data_states)}}/" class="col-lg-1 btn btn-outline-dark {{$item->data_states ? 'active' : '' }}">
    {{$item->data_states}}
  </a>
  @endforeach
  <a href="/dashboard/states" class="btn btn-dark">+ Tambah Data</a>
  <!-- <button class="btn btn-outline-danger">Delete</button> -->
</div>
<div class="container d-flex gap-2 pt-1 rows">

  @foreach($states as $item)
  <div class="col-lg-1 d-flex justify-content-center gap-2">
    <a href="/dashboard/states/{{ $item->data_states }}/edit" class="p-0 m-0">edit</a>
    <form action="/dashboard/states/{{ $item->id }}" method="post" class="d-flex">
      @method('DELETE')
      @csrf
      <button class="text-danger border-0 btn btn-none m-0 p-0" onclick="return confirm('Hapus data sekarang ?')">hapus</button>
    </form>
  </div>
  @endforeach
</div>
@endif
@endsection