@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h1 class="fw-bold fs-5 text-secondary">Users / <span class="fw-normal fs-6">Create</span></h1>
</div>

<div class="container">
  <form method="POST" action="{{route('users.store')}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="mb-3">
      <label for="" class="form-label">Role</label>
      <select class="form-select form-select" name="is_admin" id="role" required>
        <option selected disabled>Select Role</option>
        <option value="1" id="1">Admin</option>
        <option value="0" id="0">User</option>
      </select>
      @if ($errors->has('is_admin'))
      <span class="text-danger text-left">{{ $errors->first('is_admin') }}</span>
      @endif
    </div>
    <div class="mb-3">
      <label for="Username" class="form-label">Username</label>
      <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="username" aria-describedby="helpId" required>
      <small id="helpId" class="text-muted">Pastikan mudah diingat</small>
      <br>
      @if ($errors->has('username'))
      <span class="text-danger text-left">{{ $errors->first('username') }}</span>
      @endif
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Password</label>
      <input type="password" name="password" id="myInput" value="{{ old('password') }}" class="form-control" placeholder="password" aria-describedby="helpId" required>
      <input type="checkbox" onclick="myFunction()"> Show Password
      @if ($errors->has('password'))
      <span class="text-danger text-left">{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div id="slug" class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" name="slug" value="{{ old('slug') }}" id="slugin" class="form-control" placeholder="slug" aria-describedby="helpId" hidden>
      <small id="helpId" class="text-muted">Pastikan mudah diingat</small>
      <br>
      @if ($errors->has('slug'))
      <span class="text-danger text-left">{{ $errors->first('slug') }}</span>
      @endif
    </div>
    <div id="showRole" style="display: none;">
      <div class="mb-3">
        <label for="" class="form-label">Theme</label>
        <input type="number" id="theme" name="theme" value="{{ old('theme') }}" class="form-control" placeholder="" aria-describedby="helpId" min="1">
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Period</label>
        <div class="input-group">
          <select class="form-select form-select" name="period" id="periodSelect">
            <option value="">Select Period or custom with write</option>
            <option value="30">30 days</option>
            <option value="90">90 days</option>
            <option value="180">180 days</option>
            <option value="360">360 days</option>
          </select>

          <input id="period" type="number" class="form-control" name="period2" min="1" placeholder="type number period by day" />
        </div>
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Tier</label>
        <select id="selectTier" class="form-select form-select" name="tier">
          <option value="">Select one</option>
          <option value="1">Basic</option>
          <option value="2">Advance</option>
          <option value="3">Premium</option>
        </select>
      </div>
    </div>

    <button class="btn btn-dark mt-2" type="submit">Submit</button>
  </form>

</div>
@endsection