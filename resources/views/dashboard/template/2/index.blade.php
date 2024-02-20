<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept1i.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/animasi.css') }}" />


  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>Ayunika | Concept1</title>
</head>

<body class="hidden">
  <div class="cover-container" id="cover">
    <div class="display-flex flex-column align-center married-pop color-white mlr-auto">
      <div class="mt-136">
        <p class="font-20 regular text-center">The Wedding of</p>
        <div class="box-315 married-great mt-16">
          <h1 class="font-100 regular text-left"> {{ $undangan->groom_nickname}}</h1>
          <div class="dan">
            <h1 class="font-60 regular">&</h1>
          </div>

          <h1 class="font-100 regular text-right mt-32">{{ $undangan->bride_nickname}}</h1>
        </div>
      </div>
      <div class="box-277 text-center mlr-auto mt-12">
        <div>
          <p class="text-italic font-18 medium">Dear</p>
          @if(request()->filled('r'))
          <p class="font-20 large">{{ request()->r }}</p>
          @endif
          <hr class="color-white mt-8" style="border: 1px solid #fff; opacity: 0.3" />
          <p class="font-14 regular mt-16">
            You are cordially invited to our wedding
          </p>
        </div>
      </div>
      <div class="display-center pt-48 pb-127">
        <button class="btn-cover mlr-auto color-white font-18 normal" onclick="hide()">
          💌 Buka Undangan
        </button>
      </div>
    </div>

  </div>

  <div id="main" class="main-container married-pop ">
    <div class="sound">
      <!-- <iframe src="{{ asset('/concept1i/silence.mp3') }}" allow="autoplay" id="audio"></iframe> -->
      <audio id="player" autoplay loop>
        <source src="{{isset($songs[0]->audio_path) ? url('storage/' . $songs[0]->audio_path) : '' }}">
      </audio>
      <span class="suara" onclick="togglePlay()">
        <img id="suara-i" src="{{ asset('/concept1i/svg/suara.svg') }}" alt="">
      </span>
    </div>
    <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="bg-pastel py-48">
      <div class="relative" style="top: 32px; right: 0px">
        <img class="img-orr wiggle" src="{{ asset('/concept1i/svg/cover-orr.svg') }}" alt="" />
      </div>
      <p class="font-16 married-playfair regular ml-24">
        We Invite You <br />
        to Celebrate our wedding
      </p>

      <div class="mlr-auto mt-24 box-img1i">
        <img class="img-cover1i mlr-auto mt-24" src="{{$coverImage[0]->images ?? ''}}" alt="" />
      </div>

      <div class="box-327 text-center mlr-auto mt-34">
        <p class="font-16 regular lineletter-160">The Wedding of</p>

        <h1 class="font-60 married-great lineletter regular color-green mt-8">
          {{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}
        </h1>
        @if($undangan->timetitle == 1)
        <p class="font-16 regular mt-8 lineletter-160">
          {{$receptionDay}}, {{$receptionDate}}
        </p>
        @else
        <p class="font-16 regular mt-8 lineletter-160">
          {{$akadDay}}, {{$akadDate}}
        </p>
        @endif
        <p class="font-12 regular lineletter-160">
          {{$undangan->alamatResepsi}}
        </p>
        <img class="mt-16 wiggle" src="{{ asset('/concept1i/svg/orbr.svg') }}" alt="" />
      </div>
    </div>
    <div class="bg-green color-white">
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="box-327 mlr-auto text-center py-48">
        <p class="font-14 regular lineletter-160">
          "{{ $undangan->quote }}"
        </p>
        <h1 class="mt-24 married-great font-30 regular">{{ $undangan->quote_source }}</h1>
      </div>
    </div>
    <div class="bg-pastel py-48">
      <div class="w-327 color-green display-center align-center flex-column mlr-auto text-center">
        <p data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="font-28 regular married-great">{{$undangan->bride_name}}</p>
        <img data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="img-mempelai1i mt-24" src="{{$brideImage[0]->images ?? ''}}" alt="" />
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="box-327 mt-24 mlr-auto text-center">
        <p class="font-14 regular lineletter-160 color-opacity">
          Putri {{ $undangan->bride_child_order }} dari
        </p>
        <p class="font-16 regular lineletter-160">
          {{$undangan->bride_father}} & {{$undangan->bride_mother}}
        </p>
        <p class="font-14 regular lineletter-160 color-opacity">
          {{$undangan->bride_address}}
        </p>
      </div>

      <h1 data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-offset="200" class="mt-32 married-great color-green font-80 regular text-center">
        &
      </h1>
      <div class="relative" style="top: -40px">
        <img class="img-orr wiggle" src="{{ asset('/concept1i/svg/mk.svg') }}" alt="" />
        <img class="img-orl wiggle-up" src="{{ asset('/concept1i/svg/mkr.svg') }}" alt="" />
      </div>

      <div class="w-327 color-green display-center align-center flex-column mlr-auto mt-32 text-center">
        <p data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="font-32 regular married-great">{{$undangan->groom_name}}</p>
        <img data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="img-mempelai1i mt-24" src="{{$groomImage[0]->images ?? ''}}" alt="" />
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="box-327 mt-24 mlr-auto text-center">
        <p class="font-14 regular lineletter-160 color-opacity">
          Putra {{ $undangan->groom_child_order }} dari
        </p>
        <p class="font-16 regular lineletter-160">
          {{$undangan->groom_father}} & {{$undangan->groom_mother}}
        </p>
        <p class="font-14 regular lineletter-160 color-opacity">
          {{$undangan->groom_address}}
        </p>
      </div>
    </div>

    <div class="bg-pastel pt-80 pb-48">
      <div class="relative">
        <img class="img-orl" src="{{ asset('/concept1i/svg/orl.svg') }}" alt="" />
        <img class="img-orr" src="{{ asset('/concept1i/svg/orr.svg') }}" alt="" />
      </div>
      <div class="box-327 mlr-auto">
        <p data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="text-center font-32 married-great color-green">
          Our Love Story
        </p>
        <div class="pt-40 flex flex-column gap-24">
          @foreach($stories as $key=>$story)
          <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="card-reseption">
            <div class="{{ isset($story->image_story) ? '' : 'border-img-story' }} display-center align-center">
              <div class="{{ isset($story->image_story) ? 'img-story' : '' }} display-center align-center">
                <img class="{{ isset($story->image_story) ? 'img-story' : '' }}" src="{{ isset($story->image_story) ? url('storage/' . $story->image_story) : asset('/concept1i/svg/story'. $key+1 .'.svg')  }}" alt="" />
              </div>
            </div>

            <div class="w-100">
              <p class="regular font-16 large text-green lineletter-160">{{ $story->title_story }}</p>
              <p class="font-14 medium">{{ $story->tgl_story }}</p>
              <p class="font-14 regular lineletter-160">{{ $story->description_story }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="py-48 bg-pastel">
      <div class="box-327 mlr-auto">
        <h1 data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="married-great font-32 regular color-green text-center">
          Save The Date
        </h1>
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 flex gap-24" id="countdown">
        </div>
      </div>
      <div class="display-center flex-column py-48">
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="w-327 mlr-auto text-center">
          <p class="font-40 lineletter married-great text-green">Akad Nikah</p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-20 maps mlr-auto">
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
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 w-327 mlr-auto text-center">
          <p class="font-18 large">Akad Nikah</p>
          <p class="font-14 regular mt-10">
            {{$akadDay}}, {{$akadDate}} {{ date('H:i', strtotime($undangan->akad_time)) }}
          </p>
          <p class="font-14 regular mt-12">
            {{$undangan->alamatAkad}} <br />{{ $undangan->alamatAkadLengkap }}
          </p>

          <a class="btn-maps font-16 large mt-24 mlr-auto" href="#">Open on Gmaps</a>
        </div>

        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="w-327 mlr-auto text-center pt-40">
          <p class="font-40 lineletter married-great text-green mt-24">Resepsi</p>
        </div>

        <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-20 maps mlr-auto display-center">
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
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 w-327 mlr-auto text-center">
          <p class="font-18 large">Resepsi Pernikahan</p>
          <p class="font-14 regular mt-10">
            {{ $receptionDay }}, {{$receptionDate}} {{ date('H:i', strtotime($undangan->resepsi_time)) }}
          </p>
          <p class="font-14 regular mt-12">
            {{ $undangan->alamatResepsi }} <br />
            {{ $undangan->alamatResepsiLengkap }}
          </p>
          <a data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="btn-maps font-16 large mt-24 mlr-auto" href="https://www.google.com/maps/search/?api=1&query={{ $undangan->akad_loc }}" target="_blank">Open on Gmaps</a>
        </div>
      </div>

    </div>


    <div class="bg-green py-48">
      <div class="relative" style="top: 32px">
        <img width=" 118.408px" height="133px" class="img-orl wiggle" src="{{ asset('/concept1i/svg/orl.svg') }}" alt="" />
        <img class="img-orr wiggle-up" src="{{ asset('/concept1i/svg/orr.svg') }}" alt="" />
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="w-327 mlr-auto">
        <div class="color-white text-center flex flex-column">
          <p class="font-20 regular">A Glimpse of</p>
          <p class="married-great font-52 regular mt-6">Our Memories</p>
        </div>
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="display-center flex-column align-center mt-32">
        <iframe class="box-yt" src="https://www.youtube.com/embed/{{ $undangan->link }}?autoplay=1&mute=1">
        </iframe>
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

    <div class="py-48 bg-pastel">
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="py-40 display-center flex-column">
        <div class="text-center scope-24">
          <p data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="font-32 regular married-great color-green">Amplop Digital</p>
          <p class="font-14 regular mt-6 color-green">Doa restu anda merupakan karunia yang sangat berarti bagi kami. dan jika memberi adalah ungkapan terimakasih anda, Anda dapat memberi kado secara cashless</p>
        </div>
        <div class="mt-40 card-amplop mlr-auto">
          @if($amplops[0]->nama_bank == 'bca')
          <img class="img-bank" src="{{ asset('/assets/svg/bank/bca.svg') }}" alt="">
          @elseif($amplops[0]->nama_bank == 'mandiri')
          <img class="img-bank" src="{{ asset('/assets/svg/bank/mandiri.svg') }}" alt="">
          @elseif($amplops[0]->nama_bank == 'bni')
          <img class="img-bank" src="{{ asset('/assets/svg/bank/bni.svg') }}" alt="">
          @elseif($amplops[0]->nama_bank == 'bri')
          <img class="img-bank" src="{{ asset('/assets/svg/bank/bri.svg') }}" alt="">
          @elseif($amplops[0]->nama_bank == 'bsi')
          <img class="img-bank" src="{{ asset('/assets/svg/bank/bsi.svg') }}" alt="">
          @elseif($amplops[0]->nama_bank == 'jenius')
          <img class="img-bank" src="{{ asset('/assets/svg/bank/jenius.svg') }}" alt="">
          @endif
          <div class="display-center gap-4-1 flex-column text-center">
            <p class="font-18 large text-uppercase">{{ $amplops[0]->nama_bank }} - {{ $amplops[0]->norek }}</p>
            <p>A.n. {{$amplops[0]->pemilik_rekening}}</p>
            <input type="text" value="{{ $amplops[0]->norek }}" id="copyText" hidden>
            <a class="btn-amplop display-center cursor-pointer" id="copyBtn" onclick="copy()">
              <img src="{{ asset('/concept1i/svg/copy-green.svg') }}" alt="">
              <p class="color-green font-14 medium">Salin</p>
            </a>
          </div>
        </div>
      </div>
      <div class="w-327 mlr-auto text-center">
        <p data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="font-32 regular married-great color-green">Write Speech</p>

        <div class="gap-16 flex-column pt-48" id="ucapan-box">
          @foreach($ucapans as $ucapan)
          <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="box-ucapan1i">
            <p class="font-14 regular">
              {{ $ucapan->ucapan }}
            </p>
            <p class="font-12 large text-center">{{ $ucapan->guest_name }}</p>
          </div>
          @endforeach
        </div>
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="box-327 mlr-auto py-48">
          <p class="font-32 regular color-green married-great">
            Tulis Ucapanmu
          </p>

          <form data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
            @csrf
            <div class="box-form mt-28">
              <div class="form-grup">
                <label for="guest_name" class="font-12 large lineletter-160">Nama</label>
                <input class="form-linear" type="text" name="guest_name" placeholder="" id="name" />
              </div>
              <div class="form-grup">
                <label for="ucapan" class="font-11 large" for="exampleFormControlTextarea1">Ucapan</label>
                <textarea class="form-linear" name="ucapan" id="exampleFormControlTextarea1"></textarea>
              </div>
              <input data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" type="hidden" name="slug" value="{{$undangan->slug}}">
              <div class="form-grup select-grup">
                <label for="konfirmasi" class="font-11 large">Konfirmasi Kehadiran</label>
                <select class="form-select" name="konfirmasi" id="konfirmasi">
                  <option value="1">Hadir</option>
                  <option value="0">Tidak Hadir</option>
                </select>
              </div>
            </div>
            <button type="submit" class="btn-submit1i font-18 color-white mt-40">
              Submit Ucapan
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="py-80 bg-green color-white">
      <div class="relative display-center align-center" style="top: -40px">
        <img class="imgbwh" src="{{ asset('/concept1i/png/orbdw.png') }}" alt="" />
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="w-327 mlr-auto text-center">
        <h2 class="font-48 regular lineletter married-great">Thank You</h2>
        <p class="font-14 regular lineletter-160 mt-8">
          It is a joy and honor for us, if you are willing to attend and give
          us your blessing.
        </p>
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="w-327 mlr-auto text-center mt-40">
        <p class="font-16 regular married-playfair lineletter-160">
          We, the Happy ones
        </p>
        <p class="mt-16 font-32 regular married-great">{{ $undangan->groom_nickname }} & {{ $undangan->bride_nickname }}</p>
        <p class="font-16 regular married-playfair">{{$receptionDate}}</p>

        <div class="mt-40 display-center">
          <p class="font-12 regular lineletter-160">made with love by </p>
          <img src="{{ asset('/concept1i/svg/logo.svg') }}" alt="" />
        </div>
      </div>
    </div>
  </div>

  <script>
    AOS.init();
  </script>

  <!-- UCAPAN -->
  <script type="text/javascript">
    AOS.init({
      startEvent: 'click',
      easing: 'ease-in-out'
    });

    function hide() {
      togglePlay();
      document.getElementById("cover").style.visibility = "hidden";
      document.body.classList.remove('hidden');
    }
    window.onbeforeunload = function() {
      $(this).scrollTop(0);
    };

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

  <!-- CountDown -->
  <script>
    const endDate = '{{ $undangan->resepsi_date }} {{$undangan->resepsi_time}}';

    function updateCountdown() {
      const now = new Date().getTime();
      const distance = new Date(endDate) - now;

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.getElementById('countdown').innerHTML = `
        <div class="border-countdown">
        <p class="font-32 regular lineletter text-center color-green">
        ${days}
            </p>
            <span class="font-14 regular color-green">Day</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-green">
            ${hours}
            </p>
            <span class="font-14 regular color-green">Hour</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-green">
            ${minutes}
            </p>
            <span class="font-14 regular color-green">Min</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-green">
            ${seconds}
            </p>
            <span class="font-14 regular color-green">Sec</span>
          </div>
    `;

      if (distance < 0) {
        clearInterval(countdownInterval);
        document.getElementById('countdown').innerHTML = `
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-green">
             0
            </p>
            <span class="font-14 regular color-green">Day</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-green">
            0
            </p>
            <span class="font-14 regular color-green">Hour</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-green">
            0
            </p>
            <span class="font-14 regular color-green">Min</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-green">
            0
            </p>
            <span class="font-14 regular color-green">Sec</span>
          </div>`;
      }
    }

    // Update the countdown every second
    const countdownInterval = setInterval(updateCountdown, 1000);

    // Initial update
    updateCountdown();
  </script>
  <!-- End CountDown -->

  <script>
    let a = 0;

    function togglePlay() {
      if (a == 0) {
        console.log('musiiic')
        document.getElementsByTagName("audio")[0].play();
        a++;
        $("#suara-i").attr('src', "{{ asset('/concept1i/svg/suara.svg') }}");
      } else {
        document.querySelector("audio").pause();

        $("#suara-i").attr('src', "{{ asset('/concept1i/svg/suaraoff.svg') }}");
        a--;

      }
    };
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