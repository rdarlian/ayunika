@extends('layouts.app')

@section('content')
<div id="beranda" class="custom-container">
  <div class="flex-md-row row pt-80 pb-2">
    <div class="col-12 col-md-6 pt-40">
      <h1 class="playfair lh-120 font-64">
        Buat dan Bagikan Undangan Online Pernikahanmu
      </h1>
      <p class="font-20 fw-normal mt-24 lh-150 fw-400 grayc1">
        Bagikan momen bahagiamu dengan mudah dan cepat. Cukup dengan memilih
        tema, atur tanggal, dan, upload foto, kamu dapat membuat undangan
        digitalmu sendiri.
      </p>
      <div class="col-md-8 d-flex gap-3 justify-content-between mt-40">
        <button class="btn-brown font-16 fw-600 lhs-150">Hubungi Kami</button>
        <button class="btn-outline-brown font-16 fw-normal">Lihat Katalog</button>
      </div>
    </div>
    <div class="col-md-6 d-flex pt-4 pt-md-0 justify-content-end">
      <img class="img-fluid" src="assets/png/Image.png" alt="" />
      <img class="bg-absolute top-0 end-0 img-375" src="assets/svg/background/bg1.svg" alt="" />
    </div>
  </div>
</div>

<div class="custom-container py-80">
  <div class="text-center col-md-7 mx-auto">
    <h1 class="font-40 fw-semibold lh-150 ls-04 playfair">Kenapa Harus Ayunika?</h1>
    <p class="font-20 fw-normal lh-150 grayc1 mt-20">
      Kami hadir sebagai solusi untuk membuat undangan online untuk acara
      spesial kamu dengan cepat, murah, dan mudah.
    </p>
  </div>
  <div class="mt-48 d-flex flex-md-row flex-column flex-column-reverse">
    <div class="col-md-6 position-relative">
      <img class="bg-absolute-1" src="assets/png/image 7.png" alt="" />
      <img class="img-fluid pt-10" src="assets/png/Container.png" alt="" />
    </div>
    <div class="col-md-6 ms-2">
      <div class="row g-4">
        <div class="col-12 col-md-6">
          <div class="p-8">
            <img class="p-8" src="assets/svg/dolar.svg" alt="" />
            <h1 class="font-24 fw-semibold playfair mt-3">
              Harga Bersahabat
            </h1>
            <p class="font-18 fw-light grayc1 mt-12 mb-0">
              Lebih hemat dari undangan fisik. Bagikan momen kebahagiaan mu
              dengan harga yang terjangkau.
            </p>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="p-8">
            <img class="p-8" src="assets/svg/dashboard.svg" alt="" />
            <h1 class="font-24 fw-semibold playfair mt-3">Banyak Fitur</h1>
            <p class="font-18 fw-light grayc1 mt-12 mb-0">
              Fitur yang komplit dari proses pembuatan hingga proses
              membagikan undangan
            </p>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="p-8">
            <img class="p-8" src="assets/svg/pallete.svg" alt="" />
            <h1 class="font-24 fw-semibold playfair mt-3">Tema Beragam</h1>
            <p class="font-18 fw-light grayc1 mt-12 mb-0">
              Banyak pilihan tema undangan dengan desain unik dan premium
              lebih dari 100+ tema.
            </p>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="p-8">
            <img class="p-8" src="assets/svg/message.svg" alt="" />
            <h1 class="font-24 fw-semibold playfair mt-3">
              Dukungan Penuh
            </h1>
            <p class="font-18 fw-light grayc1 mt-12 mb-0">
              Perlu bantuan? Kami selalu siap membantu dan dapat diandalkan
              kapan saja
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="bg-card-gradient pb-5 pb-md-4">
  <div id="fitur" class="custom-container pt-40 h-100 pb-40">
    <div class="text-center col-12 col-md-6 mx-auto">
      <h1 class="font-40 fw-semibold playfair">Fitur Unggulan Kami</h1>
      <p class="font-20 fw-normal mt-20 grayc1">
        Kami memberikan fitur terbaik untuk undangan pernikahan yang luar
        biasa, agar momen pernikahanmu yang tak terlupakan.
      </p>
    </div>
    <div class="row gy-4 pt-48">
      <div class="col-12 col-md-4">
        <div class="bg-card-col">
          <img src="assets/svg/bolt.svg" alt="" />
          <h1 class="font-24 fw-semibold playfair mt-24 text-text">
            Mudah dan Cepat
          </h1>
          <p class="font-18-2 fw-light grayc1">
            Buat undangan nikahan online mudah dan cepat. Cukup lengkapi
            data maka undangan akan siap dibagikan.
          </p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="h-100 bg-card-col">
          <img src="assets/svg/pallete.svg" alt="" />
          <h1 class="font-24 fw-semibold playfair mt-24">
            Template Premium
          </h1>
          <p class="font-18-2 fw-light grayc1">
            100+ pilihan template yang tersedia dan bisa dipilih untuk
            desain undanganmu
          </p>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="h-100 bg-card-col">
          <img src="assets/svg/notebook.svg" alt="" />
          <h1 class="font-24 fw-semibold playfair mt-24">Buku Tamu</h1>
          <p class="font-18-2 fw-light grayc1">
            Daftar dan sebarkan undangan kepada siapapun tanpa batasan
            jumlah tamu untuk acaramu.
          </p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="bg-card-col">
          <img src="assets/svg/pointonmap.svg" alt="" />
          <h1 class="font-24 fw-semibold playfair mt-24">Peta Lokasi</h1>
          <p class="font-18-2 fw-light grayc1">
            Tampilkan lokasi acara nikahanmu akan memudahkan para tamu untuk
            datang ke tempat yang tepat.
          </p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="h-100 bg-card-col">
          <img src="assets/svg/gallery.svg" alt="" />
          <h1 class="font-24 fw-semibold playfair mt-24">Gallery Foto</h1>
          <p class="font-18-2 fw-light grayc1">
            Bagikan momen bahagiamu kepada seluruh tamu undangan.
          </p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="h-100 bg-card-col">
          <img src="assets/svg/video.svg" alt="" />
          <h1 class="font-24 fw-semibold playfair mt-24">Live Streaming</h1>
          <p class="font-18-2 fw-light grayc1">
            Jarak bukan halangan, tetap bagikan momen bahagiamu untuk tamu
            tidak dapat hadir.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="custom-container pt-80">
  <div class="d-flex justify-content-center flex-column">
    <img class="position-absolute hide-style" src="assets/svg/ornament-tema.svg" alt="" />
    <img class="mx-auto hide-style-2" src="assets/svg/or-harga.svg" alt="" />
    <div class="text-center mx-auto col-md-8">
      <h1 class="font-40 fw-semibold playfair lh-120 ls-04">
        Pilihan Tema Undangan Ekslusif Ayunika
      </h1>
      <p class="font-20 fw-normal grayc1 pt-3 lh-150">
        Jelajahi lebih dari 100+ template eksklusif dan premium dari kami,
        jadikan undangan kami untuk momen spesialmu.
      </p>
    </div>
  </div>
  <div class="row gy-5 gx-4 px-md-2 pt-2">
    @if($theme)
    @foreach ($theme as $themes)
    <div class="col-12 col-md-4 px-12">
      <img class="card-iphone" src="{{  asset('storage/'.$themes->image) }}" alt="">
      <div class="pt-3">
        <p class="font-20 fw-semibold ">{{ $themes->name }}</p>
        <a class="btn-mini-outline-brown col-5 text-decoration-none" href="{{ $themes->slug }}/{{$themes->theme_id}}" target="_blank">Lihat Tema</a>
      </div>
    </div>
    @endforeach
    @endif
  </div>
  <div class="mt-md-5 pt-4">
    <a href="/template" class="btn-brown col-12 col-sm-2 mx-auto text-decoration-none" style="cursor: pointer;">Lihat Semua</a>

    <div class="position-relative d-flex justify-content-center">
      <img class="position-absolute bottom-40 end-0 hide-style" src="assets/svg/ornament-tema-right.svg" alt="" />
    </div>
  </div>
</div>

<div id="harga" class="custom-container pt-80">
  <div class="mx-auto d-flex justify-content-center py-4 mt-5">
    <img src="assets/svg/or-harga.svg" alt="" />
  </div>
  <div class="text-center col-md-8 mx-auto pt-80 pb-48">
    <h1 class="font-40 fw-semibold playfair col-md-10 mx-auto mb-0">
      Pilih Paket Undangan Digital Sesuai Kebutuhanmu
    </h1>
    <p class="font-20 fw-normal pt-4 grayc1">
      Kami menawarkan beberapa pilihan paket dengan harga terjangkau,
      tentunya dengan kualitas premium pada setiap desainnya.
    </p>
  </div>


  <div class="row gy-5 ">
    <div class="col-12 col-lg-4">
      <div class="p-penawaran border border-18 border-dark-subtle">
        <p class="text-center font-24 fw-semibold playfair">Basic</p>
        <p class="text-center font-40 fw-bold">Rp100.000</p>

        <div class="mt-40 row row-gap-3">
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Masa Aktif 3 Bulan</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Revisi 4x</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">
              2 Bahasa (Inggris/ Indonesia)
            </p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Cover Pembuka</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Custom Nama Tamu</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Navigasi Lokasi</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Tambahan Google Calendar</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Ucapan</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Undangan Gambar Digital</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/x-circle.svg" alt="" />
            <p class="font-16 fw-normal p-none">RSVP</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/x-circle.svg" alt="" />
            <p class="font-16 fw-normal p-none">Gallery 10 Foto</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/x-circle.svg" alt="" />
            <p class="font-16 fw-normal p-none">Hitung Mundur Acara</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/x-circle.svg" alt="" />
            <p class="font-16 fw-normal p-none">Love Story</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/x-circle.svg" alt="" />
            <p class="font-16 fw-normal p-none">Livestreaming</p>
          </div>
        </div>
        <button class="btn-outline-brown col-12 mt-48 font-16 fw-semibold">
          Pilih Paket
        </button>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="position-relative w-100 p-0">
        <div class="d-flex position-absolute w-100 p-penawaran-o absolute-24 justify-content-center px-0">
          <div class="ornament-penawaran col-12 font-16 fw-semibold text-white">
            Penawaran Terbaik
          </div>
        </div>
      </div>

      <div class="border-penawaran border-18">
        <p class="text-center font-24 fw-semibold playfair mt-lg-0">
          Premium
        </p>
        <p class="text-center font-40 fw-bold">Rp150.000</p>

        <div class="mt-40 row row-gap-3">
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Masa Aktif 3 Bulan</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Revisi 4x</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">
              2 Bahasa (Inggris/ Indonesia)
            </p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Cover Pembuka</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Custom Nama Tamu</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Navigasi Lokasi</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Tambahan Google Calendar</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Ucapan</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Undangan Gambar Digital</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">RSVP</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Gallery 10 Foto</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Hitung Mundur Acara</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/x-circle.svg" alt="" />
            <p class="font-16 fw-normal p-none">Love Story</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/x-circle.svg" alt="" />
            <p class="font-16 fw-normal p-none">Livestreaming</p>
          </div>
        </div>
        <button class="btn-brown col-12 mt-48 font-16 fw-semibold">
          Pilih Paket
        </button>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="p-penawaran border border-18 border-dark-subtle">
        <p class="text-center font-24 fw-semibold playfair">Exclusive</p>
        <p class="text-center font-40 fw-bold">Rp200.000</p>

        <div class="mt-40 row row-gap-3">
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Masa Aktif 3 Bulan</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Revisi 4x</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">
              2 Bahasa (Inggris/ Indonesia)
            </p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Cover Pembuka</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Custom Nama Tamu</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Navigasi Lokasi</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Tambahan Google Calendar</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Ucapan</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Undangan Gambar Digital</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">RSVP</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Gallery 10 Foto</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Hitung Mundur Acara</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Love Story</p>
          </div>
          <div class="d-flex align-items-center gap-2">
            <img src="assets/svg/check.svg" alt="" />
            <p class="font-16 fw-normal p-none">Livestreaming</p>
          </div>
        </div>
        <button class="btn-outline-brown col-12 mt-48 font-16 fw-semibold">
          Pilih Paket
        </button>
      </div>
    </div>
  </div>

  <div class="d-flex justify-content-center py-80 mt-40 img-fluid">
    <img src="assets/svg/or-bawah.svg" alt="" />
  </div>
</div>

<div class="position-relative w-100 mt-40 d-flex justify-content-center align-items-center">
  <img class="img-bg mx-auto" src="assets/png/nikah.jpeg" alt="" />
  <div class="box-img-relative text-center mx-auto mt-lg-5">
    <h1 class="font-56 text-capitalize playfair text-white fw-semibold mb-0">
      Siap membuat undangan digitalmu?
    </h1>
    <p class="font-20 text-white mb-0">
      Ciptakan undangan digital impianmu disini, tim kami akan membantumu
      mendapatkan kualitas udangan terbaik untuk momen spesial dalam
      hidupmu.
    </p>
    <button class="btn-brown col-11 col-lg-3 py-lg-3 mt-3 font-16">
      Hubungi Kami
    </button>
  </div>
</div>

<div class="container-lg mt-104">
  <div class="text-center col-md-7 mx-auto pt-80">
    <h1 class="font-40 fw-semibold playfair">Blogs</h1>
    <p class="font-20 fw-normal mt-20">
      Tetap terhubung bersama blog kami, berbagai tips pernikahan, tren,
      kisah perjalanan inspiratif, dan promo menarik.
    </p>
  </div>
  <div class="row-lg-1 pt-48 overflow-auto d-flex">
    @foreach($posts as $item)
    <div class="col-11 col-lg-4 px-4">
      <img class="img-card" src="{{$item->image ? asset('storage/'.$item->image) : 'https://placehold.co/600x400' }}  " alt="" />
      <div class="">
        <h1 class="font-20 fw-semibold mt-24 box-p">
          {{ $item->title }}
        </h1>
        <p class="font-14 fw-light text-body-secondary mt-3">
          {{ $item->created_at }}
        </p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection