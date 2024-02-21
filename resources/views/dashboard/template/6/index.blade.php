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

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>{{$slug}}</title>
</head>

<body class="hidden">
  <div class="cover-container color-white scope-24" id="cover">
    <div class="mt-136 w-100">
      <h1 class="font-20 regular text-center">The Wedding of</h1>
      <h1 class="font-80 regular married-birth text-left mt-8">{{ $undangan->groom_nickname}}</h1>
      <div class="relative">
        <h1 class="font-60 regular married-birth text-center dan">&</h1>
      </div>
      <h1 class="font-80 regular married-birth text-right">{{ $undangan->bride_nickname}}</h1>
    </div>

    <div class="text-center mlr-auto mt-32 display-center flex-column text-center align-center">
      <div>
        <p class="text-italic font-18 medium">Dear</p>
        @if(request()->filled('r'))
        <p class="font-20 large mt-4">{{ request()->r }}</p>
        @endif
      </div>
      <hr class="hr-cover">
      <p class="invite mt-16">You are cordially invited to our wedding</p>
    </div>

    <button class="btn-inv mt-40" onclick="hide()">💌 Buka Undangan</button>
  </div>
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
      <p data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="font-18 medium text-center">
        بِسْمِ اللّهِ الرَّحْمَنِ الرَّحِيْ
      </p>

      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="w-303 font-14 mt-20 text-center mlr-auto">
        <p class="medium">Assalamu’allaikum Warrahmatullahi Wabarrakatuh</p>

        <p class="regular color-opacity mt-10">
          Dengan memohon rahmat dan ridho Allah SWT, Mohon doa restu
          Bapak/Ibu/ Saudara/I dalam rangka melangsungkan pernikahan
          Putra-Putri kami :
        </p>
      </div>
      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="relative">
        <img class="or-mempelai" src="{{ asset('/concept9/svg/or-mempelai.svg') }}" alt="">
        <img class="or-mempelai2" src="{{ asset('/concept9/svg/or-mempelai2.svg') }}" alt="">
      </div>
      <div class="display-center flex-column mlr-auto align-center mt-40">
        <img data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="img-border-9" src="{{$brideImage[0]->images ?? ''}}" alt="" />
        <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="w-140 text-center">
          <h1 class="font-20 large mt-20">{{$undangan->bride_name}}</h1>
          <hr class="mt-12">
          <p class="font-12 regular mt-10">
            Putra {{ $undangan->bride_child_order }} dari </p>
          <h4 class="font-14 medium mt-6">{{$undangan->bride_father}} & <br>{{$undangan->bride_mother}}</h4>
        </div>

        <h1 data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="married-birth font-60 regular">&</h1>

        <img data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="img-border-9" src="{{$groomImage[0]->images ?? ''}}" alt="" />
        <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="w-140 text-center">
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
        <h1 data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="font-18 medium">Ringkasan Acara</h1>
        <p data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="font-14 regular color-opacity">
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

        <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="akad-box-12 mt-24 text-center display-center align-center flex-column mlr-auto">
          <h1 class="font-18 large">Akad Nikah</h1>
          <p class="font-14 regular color-opacity">
            {{$akadDay}}, {{$akadDate}} {{ date('H:i', strtotime($undangan->akad_time)) }}
          </p>
          <p class="font-14 color-opacity">
            {{$undangan->alamatAkad}} <br />
            {{ $undangan->alamatAkadLengkap }}
          </p>
        </div>
        <button data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="btn-submit">
          <img src="assets/svg/concept12/calendar.svg" alt="" /><span class="font-18 medium">Open on Gmaps</span>
        </button>
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

      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="akad-box-12 mt-24 text-center display-center align-center flex-column mlr-auto">
        <h1 class="font-18 large">Resepsi Pernikahan</h1>
        <p class="font-14 regular color-opacity">
          {{ $receptionDay }}, {{$receptionDate}} {{ date('H:i', strtotime($undangan->resepsi_time)) }}
        </p>
        <p class="font-14 color-opacity">
          {{ $undangan->alamatResepsi }} <br />
          {{ $undangan->alamatResepsiLengkap }}
        </p>
      </div>
      <a data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" href="https://www.google.com/maps/search/?api=1&query={{ $undangan->akad_loc }}" class="btn-submit">
        <img src="assets/svg/concept12/calendar.svg" alt="" /><span class="font-18 medium">Open on Gmaps</span>
      </a>
    </div>

    <div class="display-center flex-column py-40">
      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="scope-24 text-center">
        <p class="font-20 regular">A Glimpse of</p>
        <h1 class="married-birth font-46 medium">Our Memories</h1>
        <!-- <img class="img-glimpse" src="assets/concept12/png/mempelai-12.png" alt="" /> -->
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true">
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
      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="text-center">
        <h1 class="font-18 large">Apa Kata Mereka</h1>
        <p class="font-14 regular color-opacity">
          Yang telah memberikan doa dan harapan
        </p>
      </div>

      <div class=" mt-24 display-center flex-column gap-16" id="ucapan-box">
        @foreach($ucapans as $ucapan)
        <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="card-9 text-center">
          <p class="font-14 regular">
            “{{ $ucapan->ucapan }}”
          </p>
          <p class="font-14 large lineletter">{{ $ucapan->guest_name }}</p>
        </div>
        @endforeach
      </div>

      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="display-flex flex-column text-center mt-31">
        <h1 class="font-18">Tulis Ucapanmu</h1>
        <form data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
          @csrf
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
            <input data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" type="hidden" name="slug" value="{{$undangan->slug}}">
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
      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="box-327 mlr-auto">
        <p class="font-14 regular text-center">
          Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila
          Bapak/ibu/ Saudara/i berkenan hadir untuk memberikan do’a restu
          kepada kedua mempelai.
        </p>
      </div>
      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="name-close text-center mlr-auto display-center">
        <h3 class="married-birth font-46 regular">{{ $undangan->groom_nickname }} & {{ $undangan->bride_nickname }}</h3>
      </div>

      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="diagonal-black pt-30 pb-60">
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
    AOS.init();
  </script>

  <script type="text/javascript">
    window.onbeforeunload = function() {
      $(this).scrollTop(0);
    };

    function hide() {
      document.getElementById("cover").style.visibility = "hidden";
      document.body.classList.remove('hidden');
    }
    $(document).ready(function() {
      let form = '#add-user-form';
      $(form).on('submit', function(event) {
        event.preventDefault();
        let url = $(this).attr('data-action');

        $.ajax({
          url: url,
          method: 'POST',
          data: new FormData(this),
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success: function(response) {
            $(form).trigger("reset");

            // Trigger AOS animation once
            setTimeout(function() {
              $('#ucapan-box').load(' #ucapan-box', function() {
                console.info("loading ...");
              });;

            }, 3000);
            console.info("sudah");
            $('#ucapan-bubble').addClass('aos-animate');
            // Wait for the animation to finish before removing the class
            setTimeout(function() {

              $('#ucapan-bubble').removeClass('aos-animate');
            }, 1000);
          },
          error: function(response) {}
        });

      });

    });
  </script>

  <script>
    var slider = new Swiper('.swiper_main', {
      slidesPerView: 1,
      centeredSlides: true,
      loop: true,
      loopedSlides: 6,
      autoplay: {
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
        delay: 2000,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });


    var thumbs = new Swiper('.swiper_thumbnail', {
      slidesPerView: 5,
      spaceBetween: 10,
      centeredSlides: true,
      loop: true,
      slideToClickedSlide: true,
    });
    slider.controller.control = thumbs;
    thumbs.controller.control = slider;
  </script>
</body>

</html>