@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-4 mb-3">
  <h1 class="fw-bold fs-3">User/<span class="fw-normal fs-5">Edit</span></h1>
</div>
<form method="POST" action="{{route('users.update', $user->id)}}">
  @csrf
  @method('PUT')
  {{-- {{dd($user->tier)}} --}}
  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
  <div class="mb-3">
    <label for="" class="form-label">Username</label>
    <input type="text" name="username" value="{{ $user->username }}" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
    @if ($errors->has('username'))
    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
    @endif
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Theme</label>
    <input type="number" name="theme" value="{{ $user->theme }}" id="" class="form-control" placeholder="" aria-describedby="helpId" required>
    <small id="helpId" class="text-muted">Help text</small>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Select Role</label>
    <select class="form-select form-select" name="is_admin" id="">
      <option disabled>Select one</option>
      <option @if(old('is_admin', $user->is_admin) === 1) selected @endif value="1">Admin</option>
      <option @if(old('is_admin', $user->is_admin) === 0) selected @endif value="0">User</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Period</label>
    <div class="input-group">
      <select class="form-select" id="periodEdit" name="period" disabled>
        <option disabled>Select one</option>
        <option @if(old('period', $user->period) === 30) selected @endif value="30">30 Days</option>
        <option @if(old('period', $user->period) === 90) selected @endif value="90">90 Days</option>
        <option @if(old('period', $user->period) === 180) selected @endif value="180">180 Days</option>
        <option @if(old('period', $user->period) === 360) selected @endif value="360">360 Days</option>
      </select>
      <input id="periodEdit2" type="number" class="form-control" name="period2" placeholder="type number period by day" min="1" disabled />
    </div>

    <div class="col-12">
      <div class="">
        <input class="form-check-input" id="validPeriod" type="checkbox" value="">
        <label class="form-check-label" for="invalidCheck">
          Centang untuk update periode
        </label>
        <div class="invalid-feedback">
          You must agree before submitting.
        </div>
      </div>
    </div>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Tier</label>
    <select class="form-select form-select" name="tier" id="">
      <option disabled>Select one</option>
      <option @if(old('tier', $user->tier) === 1) selected @endif value="1">Basic</option>
      <option @if(old('tier', $user->tier) === 2) selected @endif value="2">Advance</option>
      <option @if(old('tier', $user->tier) === 3) selected @endif value="3">Premium</option>
    </select>
  </div>
  <button type="submit" class="btn btn-dark mt-2">Submit</button>
</form>


@endsection