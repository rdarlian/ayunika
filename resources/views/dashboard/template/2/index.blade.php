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
    <div class="flex-column align-center married-pop color-white mlr-auto">
      <div class="text-center mt-180">
        <p class="font-14 regular">The Wedding of</p>
        <div class="box-275 married-great mlr-auto">
          <h1 class="font-100 regular text-left">Adin</h1>
          <h1 class="font-60 regular dan">&</h1>
          <h1 class="font-100 regular text-right">Lisa</h1>
        </div>
      </div>
      <div class="box-277 text-center mlr-auto mt-44">
        <div>
          <p class="text-italic font-18 medium">Dear</p>
          <p class="font-20 large">Grahacaesara</p>
          <hr class="color-white mt-8" style="border: 1px solid #fff; opacity: 0.3" />
          <p class="font-14 regular mt-16">
            You are cordially invited to our wedding
          </p>
        </div>
      </div>
      <div class="display-center pb-48">
        <button class="btn-cover mlr-auto mt-40 color-white" onclick="hide()">
          💌 Buka Undangan
        </button>
      </div>
    </div>

  </div>

  <div id="main" class="main-container married-pop ">
    <div class="sound">
      <!-- <iframe src="{{ asset('/concept1i/silence.mp3') }}" allow="autoplay" id="audio"></iframe> -->
      <!-- <audio id="player" autoplay loop>
        <source src="{{isset($songs[0]->audio_path) ? url('storage/' . $songs[0]->audio_path) : '' }}">
      </audio>
      <span class="suara" onclick="togglePlay()">
        <img id="suara-i" src="{{ asset('/concept1i/png/suara.png') }}" alt="">
      </span> -->
    </div>
    <div class="bg-pastel py-48">
      <div class="relative" style="top: 32px; right: 0px">
        <img class="img-orr wiggle" src="{{ asset('/concept1i/png/cover-orr.png') }}" alt="" />
      </div>
      <p class="font-16 married-playfair regular ml-24">
        We Invite You <br />
        to Celebrate our wedding
      </p>

      <img class="img-cover1i mlr-auto mt-24" src="{{$coverImage[0]->images ?? ''}}" alt="" />

      <div class="box-327 text-center mlr-auto mt-34">
        <p class="font-16 regular lineletter-160">The Wedding of</p>

        <h1 class="font-60 married-great lineletter regular color-green mt-8">
          {{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}
        </h1>
        <p class="font-16 regular mt-8 lineletter-160">
          {{$receptionDay}}, {{$receptionDate}}
        </p>
        <p class="font-12 regular lineletter-160">
          {{$undangan->reception_location}}
        </p>
        <img class="mt-16 wiggle" src="{{ asset('/concept1i/svg/orbr.svg') }}" alt="" />
      </div>
    </div>
    <div class="bg-green color-white">
      <div class="box-327 mlr-auto text-center py-48">
        <p data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="font-14 regular lineletter-160">
          "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan
          pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung
          dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa
          kasih dan sayang."
        </p>
        <h1 data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 married-great font-30 regular">QS Ar-rum 21</h1>
      </div>
    </div>
    <div class="bg-pastel py-48">
      <div class="w-327 color-green display-center align-center flex-column mlr-auto">
        <p data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="font-28 regular married-great">{{$undangan->bride_name}}</p>
        <img data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="img-mempelai1i mt-24" src="{{$brideImage[0]->images ?? ''}}" alt="" />
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

      <div class="w-327 color-green display-center align-center flex-column mlr-auto mt-32">
        <p data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="font-28 regular married-great">{{$undangan->groom_name}}</p>
        <img data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="img-mempelai1i mt-24" src="{{$groomImage[0]->images ?? ''}}" alt="" />
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

    <div class="bg-pastel pt-80">
      <div class="relative">
        <img class="img-orl rotate" src="{{ asset('/concept1i/svg/orl.svg') }}" alt="" />
        <img class="img-orr rotate2" src="{{ asset('/concept1i/svg/orr.svg') }}" alt="" />
      </div>
      <div class="box-327 mlr-auto">
        <p data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="text-center font-32 married-great color-green">
          Our Love Story
        </p>
        <div class="pt-40 flex flex-column gap-24">
          @foreach($stories as $key=>$story)
          <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="flex gap-24">
            <div class="border-img-story display-center align-center">
              <div class="{{ isset($story->image_story) ? 'img-story' : '' }} display-center align-center">
                <img class="{{ isset($story->image_story) ? 'img-story' : '' }}" src="{{ isset($story->image_story) ? url('storage/' . $story->image_story) : asset('/concept1i/svg/story'. $key+1 .'.svg')  }}" alt="" />
              </div>
            </div>

            <div class="w-239 font-18">
              <p class="regular lineletter-160">{{ $story->title_story }}</p>
              <p class="font-16 regular lineletter-160">{{ $story->description_story }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="py-80 bg-pastel">
      <div class="box-327 mlr-auto">
        <h1 data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="married-great font-32 regular color-green text-center">
          Save The Date
        </h1>
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-40 flex gap-24" id="countdown">


        </div>
      </div>

      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-40 card-reseption w-327 mlr-auto">
        <img width="120px" height="120px" src="{{ asset('/concept1i/svg/rumah.svg') }}" alt="" />

        <div class="text-center">
          <p class="font-14 regular color-opacity lineletter-160">Marriage</p>
          <p class="font-16 regular lineletter-160">
            {{$akadDay}}, {{$akadDate}} <br />
            {{ date('H:i', strtotime($undangan->akad_time)) }} - Selesai
          </p>
          <p class="font-12 regular lineletter-160 color-opacity">
            {{$undangan->alamatAkad}}
          </p>
        </div>
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-40 card-reseption w-327 mlr-auto">
        <img width="120px" height="120px" src="{{ asset('/concept1i/svg/rumah.svg') }}" alt="" />
        <div class="text-center">
          <p class="font-14 regular color-opacity lineletter-160">
            Reception
          </p>
          <p class="font-16 regular lineletter-160">
            {{ $receptionDay }}, {{$receptionDate}} <br />
            {{ date('H:i', strtotime($undangan->resepsi_time)) }} - Selesai
          </p>
          <p class="font-12 regular lineletter-160 color-opacity">
            {{ $undangan->alamatResepsi }}
          </p>
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
          <p class="married-great font-52 regular">Our Memories</p>
        </div>
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="display-center flex-column align-center mt-32">
        <iframe class="box-yt" src="https://www.youtube.com/embed/{{ $undangan->link }}?autoplay=1&mute=1">
        </iframe>
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="swiper swiper_main mt-31" style="width:375px;height:580px;">
        <div class="swiper-wrapper">
          @foreach($images as $key=>$image)
          <div class="swiper-slide"><img src=" {{ $image->images ?? '' }}" alt=""></div>
          @endforeach
        </div>
        <div class="swiper-button-prev" hidden></div>
        <div class="swiper-button-next" hidden></div>
      </div>

      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="swiper swiper_thumbnail mt-3" style="width:375px; height:100px;">
        <div class="swiper-wrapper">
          @foreach($images as $key=>$image)
          <div class="swiper-slide"><img src="{{ $image->images ?? '' }}" alt=""></div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="bg-green pt-48">
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="w-327 mlr-auto color-white text-center">
        <p class="font-16 regular">Prosesi</p>
        <p class="font-40 lineletter married-great mt-8">Akad Nikah</p>
      </div>

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 maps mlr-auto">
        <img src="{{ asset('/concept1i/png/mapsku.png') }}" alt="" />
      </div>
      <div class="relative">
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="display-center flex-column align-center pinbox">
          <div class="boxtempat">
            <p class="font-14 regular">Lokasi Akad</p>
            <p class="font-16 large">{{ $undangan->alamatAkad }}</p>
          </div>
          <img class="mt-0" width="21.651px" height="10.5px" src="{{ asset('/concept1i/svg/pinloc.svg') }}" alt="" />
          <img class="mt-8" src="{{ asset('/concept1i/png/pin.png') }}" alt="" />
        </div>
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 w-327 mlr-auto text-center color-white">
        <p class="font-18 large">Akad & Resepsi Pernikahan</p>
        <p class="font-14 regular mt-10">
          {{$akadDay}}, {{$akadDate}} {{ date('H:i', strtotime($undangan->akad_time)) }}
        </p>
        <p class="font-14 regular mt-12">
          {{$undangan->alamatAkad}} <br />{{ $undangan->alamatAkadLengkap }}
        </p>

        <!-- <a class="btn-maps font-16 large mt-24 mlr-auto" href="#">Open on Gmaps</a> -->
      </div>
    </div>
    <div class="bg-green py-48">
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="w-327 mlr-auto color-white text-center">
        <p class="font-16 regular">Resepsi</p>
        <p class="font-40 lineletter married-great mt-8">Pernikahan</p>
      </div>

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 maps mlr-auto">
        <img src="{{ asset('/concept1i/png/mapsku.png') }}" alt="" />
      </div>
      <div class="relative">
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="display-center flex-column align-center pinbox">
          <div class="boxtempat">
            <p class="font-14 regular">Lokasi Resepsi</p>
            <p class="font-16 large">Masjid Nurul Sakinah</p>
          </div>
          <img class="mt-0" width="21.651px" height="10.5px" src="{{ asset('/concept1i/svg/pinloc.svg') }}" alt="" />
          <img class="mt-8" src="{{ asset('/concept1i/png/pin.png') }}" alt="" />
        </div>
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 w-327 mlr-auto text-center color-white">
        <p class="font-18 large">Resepsi Pernikahan</p>
        <p class="font-14 regular mt-10">
          {{ $receptionDay }}, {{$receptionDate}} {{ date('H:i', strtotime($undangan->resepsi_time)) }}
        </p>
        <p class="font-14 regular mt-12">
          {{ $undangan->alamatResepsi }} <br />
          {{ $undangan->alamatResepsiLengkap }}
        </p>

        <a data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="btn-maps font-16 large mt-24 mlr-auto" href="https://www.google.com/maps/search/?api=1&query={{ $undangan->akad_lat }},{{ $undangan->akad_lng }}">Open on Gmaps</a>
      </div>
    </div>

    <div class="py-48 bg-pastel">
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
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="box-327 mlr-auto mt-59">
          <p class="font-32 regular color-green married-great">
            Tulis Ucapanmu
          </p>

          <form data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
            @csrf
            <div class="box-form py-48">
              <div class="form-grup">
                <label for="guest_name" class="font-11 large">Nama</label>
                <input class="form-linear" type="text" name="guest_name" placeholder="" id="name" />
              </div>
              <div class="form-grup">
                <label for="ucapan" class="font-11 large" for="exampleFormControlTextarea1">Ucapan</label>
                <textarea class="form-linear" name="ucapan" id="exampleFormControlTextarea1"></textarea>
              </div>
              <input data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" type="hidden" name="slug" value="{{$undangan->slug}}">
              <div class="form-grup">
                <label for="konfirmasi" class="font-11 large">Konfirmasi Kehadiran</label>
                <select class="form-linear" name="konfirmasi" id="konfirmasi">
                  <option value="1">Hadir</option>
                  <option value="0">Tidak Hadir</option>
                </select>
              </div>
            </div>
            <button type="submit" class="btn-submit1i font-18 color-white">
              Submit Ucapan
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="py-80 bg-green color-white">
      <div class="relative display-center align-center" style="top: -40px">
        <img class="imgbwh rotate" src="{{ asset('/concept1i/png/orbdw.png') }}" alt="" />
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
    function hide() {
      document.getElementById("cover").style.visibility = "hidden";
      document.body.classList.remove('hidden');
      AOS.init({
        startEvent: 'click',
        easing: 'ease-in-out'
      });
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
        $("#suara-i").attr('src', "{{ asset('/concept1i/png/suara.png') }}");
      } else {
        document.querySelector("audio").pause();

        $("#suara-i").attr('src', "{{ asset('/concept1i/png/nosound.png') }}");
        a--;

      }
    };
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