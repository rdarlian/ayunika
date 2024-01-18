<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Concept 9</title>
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept9.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


</head>

<body>
  <!-- <div class="cover cover-container" id="cover">
      <div class="cover-utama">
        <h1 class="wedding-of">The Wedding of</h1>
        <div>
          <h1 class="cover-wedding wedding-name1">Adin</h1>
          <h1 class="wedding-name2">&</h1>
          <h1 class="cover-wedding wedding-name3">Lisa</h1>
        </div>

        <div class="invitation">
          <div class="invitation-box">
            <p class="dear">Dear</p>
            <p class="name">Grahacaesara</p>
          </div>
          <p class="invite">You are cordially invited to our wedding</p>
        </div>

        <button class="btn-inv" onclick="hide()">💌 Buka Undangan</button>
      </div>
    </div> -->
  <div class="main-container married-pop" id="main">
    <div class="display-center flex-column relative pb-32">
      <img class="img-cover-9-1" src="{{$coverImage[0]->images ?? ''}}" alt="" />
      <img class="img-cover-9-2" src="{{ asset('/concept9/png/ornament-9-1.png') }}" alt="" />
      <div class="cover-9 text-center">
        <div class="relative">
          <?php
          $initialGroom = substr($undangan->groom_nickname, 0, 1);
          $initialBride = substr($undangan->bride_nickname, 0, 1);
          // PHP
          ?>

          <div class="initial">
            <p class="initialGroom">{{ $initialGroom }}</p>
            <p class="slash">/</p>
            <p class="initialBride">{{ $initialBride }}</p>
          </div>

        </div>
        <img src="{{ asset('/concept9/svg/pot.svg') }}" alt="" />
        <div class="text-center">
          <h1 class="married-birth font-52 regular">{{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}</h1>
        </div>
        <div class="place-box text-center">
          @if($undangan->timetitle == 1)
          <p class="font-16 large">
            {{$receptionDay}}, {{$receptionDate}}
          </p>
          <p class="font-12 regular color-opacity">
            {{$undangan->alamatResepsi}}
          </p>
          @else
          <p class="font-16 large">
            {{$akadDay}}, {{$akadDate}}
          </p>
          <p class="font-12 regular color-opacity">
            {{$undangan->alamatAkad}}
          </p>
          @endif

        </div>
      </div>
      <div>
        <div class="text-center mt-20">
          <img src="{{ asset('/concept9/svg/swipe-up.svg') }}" alt="arrow-up" />
          <p class="font-16">Swipe Up</p>
        </div>
      </div>
      <img class="cover-or" src="{{ asset('/concept9/svg/cover-or.svg') }}" alt="">
    </div>

    <div class="pt-60">
      <p class="font-18 medium text-center">
        بِسْمِ اللّهِ الرَّحْمَنِ الرَّحِيْ
      </p>

      <div class="w-303 font-14 mt-20 text-center mlr-auto">
        <p class="medium">Assalamu’allaikum Warrahmatullahi Wabarrakatuh</p>

        <p class="regular color-opacity mt-10">
          Dengan memohon rahmat dan ridho Allah SWT, Mohon doa restu
          Bapak/Ibu/ Saudara/I dalam rangka melangsungkan pernikahan
          Putra-Putri kami :
        </p>
      </div>
      <div class="relative">
        <img class="or-mempelai" src="{{ asset('/concept9/svg/or-mempelai.svg') }}" alt="">
        <img class="or-mempelai2" src="{{ asset('/concept9/svg/or-mempelai2.svg') }}" alt="">
      </div>
      <div class="display-center flex-column mlr-auto align-center mt-40">
        <img class="img-border-9" src="{{$brideImage[0]->images ?? ''}}" alt="" />
        <div class="w-140 text-center">
          <h1 class="font-20 large mt-20">{{$undangan->bride_name}}</h1>
          <hr class="mt-12">
          <p class="font-12 regular mt-10">
            Putra {{ $undangan->bride_child_order }} dari </p>
          <h4 class="font-14 medium mt-6">{{$undangan->bride_father}} & <br>{{$undangan->bride_mother}}</h4>
        </div>

        <h1 class="married-birth font-60 regular">&</h1>

        <img class="img-border-9" src="{{$groomImage[0]->images ?? ''}}" alt="" />
        <div class="w-140 text-center">
          <h1 class="font-20 large mt-20">{{$undangan->groom_name}}</h1>
          <hr class="mt-12">
          <p class="font-12 regular mt-10">
            Putra {{ $undangan->groom_child_order }} dari </p>
          <h4 class="font-14 medium mt-6">{{$undangan->groom_father}} & <br>{{$undangan->groom_mother}}</h4>
        </div>
      </div>
    </div>

    <div class="mt-80 scope-24">
      <div class="text-center">
        <h1 class="font-18 medium">Ringkasan Acara</h1>
        <p class="font-14 regular color-opacity">
          Serangkaian acara kami nantinya
        </p>
      </div>
      <div class="mt-16 display-center flex-column">
        <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="maps mlr-auto">
          <img class="img-maps" src="{{ asset('/concept1i/png/mapsku.png') }}" alt="" />
          <div class="relative">
            <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="display-center flex-column align-center pinbox">
              <div class="boxtempat">
                <p class="font-14 regular">Lokasi Akad</p>
                <p class="font-16 large">{{ $undangan->alamatAkad }}</p>
              </div>
              <div class="relative">
                <div class="box-triangle">
                </div>
              </div>
              <div class="pin mt-18">
                <div class="box-pinloc mlr-auto">
                  <img src="{{ asset('/concept1i/svg/pinloc.svg') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="akad-box-12 mt-24 text-center display-center align-center flex-column mlr-auto">
          <h1 class="font-18 large">Akad Nikah</h1>
          <p class="font-14 regular color-opacity">
            {{$akadDay}}, {{$akadDate}} {{ date('H:i', strtotime($undangan->akad_time)) }}
          </p>
          <p class="font-14 color-opacity">
            {{$undangan->alamatAkad}} <br />
            {{ $undangan->alamatAkadLengkap }}
          </p>
        </div>
        <button class="btn-submit">
          <img src="assets/svg/concept12/calendar.svg" alt="" /><span class="font-18 medium">Open on Gmaps</span>
        </button>
      </div>

      <div class="akad-box">
        <h1 class="font-18 large">Akad & Resepsi Pernikahan</h1>
        <p class="font-14 regular">Monday, 32 February 2023 08:00 Pagi</p>
        <p class="font-14 regular">
          Masjid Nurul Sakinah <br />
          Jl Kebagusan 3, Ujung kulon Banyuwangi, Jawa Timur - Indonesia
        </p>
      </div>

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 maps mlr-auto">
        <img class="img-maps" src="{{ asset('/concept1i/png/mapsku.png') }}" alt="" />
        <div class="relative">
          <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="display-center flex-column align-center pinbox">
            <div class="boxtempat">
              <p class="font-14 regular">Lokasi Resepsi</p>
              <p class="font-16 large">{{ $undangan->alamatResepsi }}</p>
            </div>
            <div class="relative">
              <div class="box-triangle">
              </div>
            </div>
            <div class="pin mt-18">
              <div class="box-pinloc mlr-auto">
                <img src="{{ asset('/concept1i/svg/pinloc.svg') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="akad-box-12 mt-24 text-center display-center align-center flex-column mlr-auto">
        <h1 class="font-18 large">Resepsi Pernikahan</h1>
        <p class="font-14 regular color-opacity">
          {{ $receptionDay }}, {{$receptionDate}} {{ date('H:i', strtotime($undangan->resepsi_time)) }}
        </p>
        <p class="font-14 color-opacity">
          {{ $undangan->alamatResepsi }} <br />
          {{ $undangan->alamatResepsiLengkap }}
        </p>
      </div>
      <a href="https://www.google.com/maps/search/?api=1&query={{ $undangan->akad_loc }}" class="btn-submit">
        <img src="assets/svg/concept12/calendar.svg" alt="" /><span class="font-18 medium">Open on Gmaps</span>
      </a>
    </div>

    <div class="display-center flex-column py-40">
      <div class="scope-24 text-center">
        <p class="font-20 regular">A Glimpse of</p>
        <h1 class="married-birth font-46 medium">Our Memories</h1>
        <!-- <img class="img-glimpse" src="assets/concept12/png/mempelai-12.png" alt="" /> -->
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out">
        <div class="swiper swiper_main mt-31" style="width:100%;height:580px;">
          <div class="swiper-wrapper">
            @foreach($images as $key=>$image)
            <div class="swiper-slide"><img src=" {{ $image->images ?? '' }}" alt=""></div>
            @endforeach
          </div>
          <div class="swiper-button-prev" hidden></div>
          <div class="swiper-button-next" hidden></div>
        </div>

        <div class="swiper swiper_thumbnail mt-3" style="width:100%; height:100px;">
          <div class="swiper-wrapper jarak">
            @foreach($images as $key=>$image)
            <div class="swiper-slide"><img src="{{ $image->images ?? '' }}" alt=""></div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div class="display-center flex-column mt-24 scope-24">
      <div class="text-center">
        <h1 class="font-18 large">Apa Kata Mereka</h1>
        <p class="font-14 regular color-opacity">
          Yang telah memberikan doa dan harapan
        </p>
      </div>

      <div class=" mt-24 display-center flex-column gap-16">
        @foreach($ucapans as $ucapan)
        <div class="card-9 text-center">
          <p class="font-14 regular">
            “{{ $ucapan->ucapan }}”
          </p>
          <p class="font-14 large lineletter">{{ $ucapan->guest_name }}</p>
        </div>
        @endforeach
      </div>

      <div class="display-flex flex-column text-center mt-31">
        <h1 class="font-18">Tulis Ucapanmu</h1>

        <form action="">
          <div class="box-form">
            <div class="form-grup">
              <label for="name" class="font-14">Nama</label>
              <input class="form-linear" type="text" placeholder="" name="guest_name" />
            </div>


            <div class="form-grup select-grup">
              <label for="konfirmasi" class="font-14">Konfirmasi Kehadiran</label>
              <select class="form-select" name="konfirmasi" id="konfirmasi">
                <option value="1">Hadir</option>
                <option value="0">Tidak Hadir</option>
              </select>
            </div>

            <div class="form-grup">
              <label for="ucapan" class="font-14">Ucapan</label>
              <textarea class="form-linear" name="ucapan"></textarea>
            </div>

            <button type="submit" class="btn-submit font-18 medium">
              Submit Ucapan
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="display-center flex-column">
      <div class="box-327 mlr-auto">
        <p class="font-14 regular text-center">
          Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila
          Bapak/ibu/ Saudara/i berkenan hadir untuk memberikan do’a restu
          kepada kedua mempelai.
        </p>
      </div>
      <div class="name-close text-center mlr-auto display-center">
        <h3 class="married-birth font-46 regular">Adin & Lisa</h3>
      </div>

      <div class="diagonal-black pt-30 pb-60">
        <p class="close-alert">Himbauan Protocol Kesehatan :</p>

        <div class="close-item">
          <img class="img-ellipse-36-normal" src="{{ asset('/concept9/svg/clean-hand.svg') }}" alt="" />
          <img class="img-ellipse-36-normal" src="{{ asset('/concept9/svg/face-mask.svg') }}" alt="" />
          <img class="img-ellipse-36-normal" src="{{ asset('/concept9/svg/social-distance.svg') }}" alt="" />
        </div>
        <div class="close-last">
          <p class="font-14 color-white">Website invitation by</p>
          <div class="img-last mt-10">
            <img src="{{ asset('/assets/svg/logo-putih.svg') }}" alt="" />
            <img src="{{ asset('/assets/svg/logonama-putih.svg') }}" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function hide() {
      document.getElementById(" cover").style.visibility = "hidden";
      document.getElementById("main").style.filter = "none";
    }
  </script>
  <script>
    const swiper_thumbnail = new Swiper(".swiper_thumbnail", {
      slidesPerView: 5,
    })
    const swiper = new Swiper('.swiper_main', {
      loop: true,
      autoplay: {
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
        delay: 2000,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper_thumbnail,
      },
    })
  </script>
</body>

</html>