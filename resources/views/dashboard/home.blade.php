@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4 p-4 row d-flex flex-row text-center justify-content-center">
                <h4 class="mb-3">Selamat Datang</h4>
                <a href="/dashboard/undangan" class="col-lg-3 btn btn-dark">Buat Undangan</a> <a href="/dashboard/guests" class="col-lg-3 btn btn-dark ms-2">Daftar Tamu</a>
            </div>
        </div>
    </div>
</div>
@endsection