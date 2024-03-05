@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4 p-4 row d-flex flex-row text-center justify-content-center">
                <h4 class="mb-3">Selamat Datang</h4>
                @if(Auth::check() && Auth::user()->is_admin == 1)
                <div class="row d-flex-rows justify-content-center">
                    <a href="/dashboard/undangan" class="col-lg-3 col-8 btn btn-dark">Buat Undangan</a>
                    <a href="/dashboard/guests" class="col-lg-3 col-8 btn btn-dark ms-lg-2 mt-lg-0 mt-2">Daftar Tamu</a>
                </div>
                @else
                <div class="row d-flex-rows justify-content-center">
                    <a href="/dashboard/user/undangan" class="col-lg-3 col-8 btn btn-dark">Buat Undangan</a>
                    <a href="/dashboard/guests" class="col-lg-3 col-8 btn btn-dark ms-lg-2 mt-lg-0 mt-2">Daftar Tamu</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection