<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept10.css') }}" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>Ayunika | {{ $undangan->bride_nickname}} & {{ $undangan->groom_nickname}}</title>
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
      <hr class="hr-cover mt-8">
      <p class="invite mt-16">You are cordially invited to our wedding</p>
    </div>

    <button class="btn-inv mt-40 font-18 medium" onclick="hide()">💌 Buka Undangan</button>
  </div>

  <div id="main" class="main-container">
    <!-- <div class="">
      <a class="nav married-pop font-12 medium" href="">
        <img src="assets/concept10/svg/menu.svg" alt="" />
        Menu
      </a>
    </div> -->

    <div class="second-cover pb-40">
      <div class="ornament-border">
        <img class="ornament-border-1" src="{{ asset('/concept10/svg/Vector.svg') }}" alt="" />
        <img class="ornament-border-2" src="{{ asset('/concept10/svg/Vector-1.svg') }}" alt="" />
        <div class="married-birth text-center">
          <h1 class="font-56 regular">{{ $undangan->groom_nickname}}</h1>
          <h1 class="font-32 regular">&</h1>
          <h1 class="font-56 regular">{{ $undangan->bride_nickname}}</h1>
        </div>
      </div>
      <div class="text-center married-pop pt-30">
        @if($undangan->timetitle == 1)
        <p class="font-16 large mt-8 lineletter-160">
          {{$receptionDay}}, {{$receptionDate}}
        </p>
        @else
        <p class="font-16 large mt-8 lineletter-160">
          {{$akadDay}}, {{$akadDate}}
        </p>
        @endif

        <p class="font-12 regular">{{$undangan->alamatResepsi}}</p>
      </div>

      <div class="second-cover-bottom text-center pt-114">
        <img src="{{ asset('/concept10/svg/arrow-up.svg') }}" alt="arrow-up" />
        <p class="font-16 medium married-pop">Swipe Up</p>
        <img class="second-cover-flower" src="{{ asset('/concept10/svg/flower-ornament.svg') }}" alt="" />
      </div>
    </div>

    <div class="restu pt-60 pb-60 text-grey-10">
      <h2 class="font-18 medium married-pop text-center">
        بِسْمِ اللّهِ الرَّحْمَنِ الرَّحِيْ
      </h2>
      <div class="scope-24 married-pop text-center mt-20">
        <h1 class="font-14 medium">
          Assalamu’allaikum Warrahmatullahi Wabarrakatuh
        </h1>
        <p class="font-14 regular color-opacity mt-8">
          Dengan memohon rahmat dan ridho Allah SWT, Mohon doa restu
          Bapak/Ibu/Saudara/I dalam rangka melangsungkan pernikahan
          Putra-Putri kami :
        </p>
      </div>

      <div class="text-center">
        <div class="mt-42">
          <div class="hex">
            <!-- <div class="hex-title">
              Simple title
            </div> -->
            <div class="hex-hide"></div>
            <div class="hex-img">
              <img src="{{$brideImage[0]->images ?? ''}}">
            </div>
          </div>
          <img src="{{$brideImage[0]->images ?? ''}}" alt="" />
          <h1 class="mt-16 font-28 medium married-birth color-linear">
            {{$undangan->bride_name}}
          </h1>
          <p class="font-12 regular color-opacity mt-16">Putri {{ $undangan->bride_child_order }} dari</p>
          <p class="font-14 married-pop medium mt-4">
            {{$undangan->bride_father}} & <br> {{$undangan->bride_mother}}
          </p>
        </div>
        <h1 class="font-56 regular married-birth">&</h1>
        <div>
          <img src="{{$groomImage[0]->images ?? ''}}" alt="" />
          <h1 class="mt-16 font-28 medium married-birth color-linear">
            {{$undangan->groom_name}}
          </h1>
          <p class="font-12 regular color-opacity mt-16">Putra {{ $undangan->groom_child_order }} dari</p>
          <p class="font-14 married-pop medium mt-4">
            {{$undangan->groom_father}} & <br> {{$undangan->groom_mother}}
          </p>
        </div>
      </div>
    </div>

    <div class="ringkasan-acara bg-white married-pop pt-60 pb-60 scope-24 text-center">
      <h1 class="font-18 large">Ringkasan Acara</h1>
      <p class="font-14 regular">Serangkaian acara kami nantinya</p>

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

      <div class="relative">
        <img class="hexagon-flower" src="{{ asset('/concept10/svg/hexagon-flower.svg') }}" alt="" />
        <h1 class="font-18 mt-24">Akad Nikah</h1>
        <p class="font-14 regular color-opacity">
          {{$akadDay}}, {{$akadDate}} {{ date('H:i', strtotime($undangan->akad_time)) }}
        <p class="font-14 color-opacity">
          {{$undangan->alamatAkad}} <br />{{ $undangan->alamatAkadLengkap }}
        </p>
        <a class="mt-16 font-14 medium btn-maps" href="#">Open on GMaps</a>
      </div>

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-50 maps mlr-auto display-center">
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

      <div class="akad-box mt-16">
        <h1 class="font-18">Resepsi Pernikahan</h1>
        <p class="font-14 regular color-opacity">
          {{ $receptionDay }}, {{$receptionDate}} {{ date('H:i', strtotime($undangan->resepsi_time)) }}
        </p>
        <p class="font-14 color-opacity">
          {{ $undangan->alamatResepsi }} <br />
          {{ $undangan->alamatResepsiLengkap }}
        </p>
        <a data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="btn-maps font-16 large mt-16 mlr-auto" href="https://www.google.com/maps/search/?api=1&query={{ $undangan->akad_loc }}" target="_blank">Open on Gmaps</a>
      </div>
    </div>

    <div class="ornament-glimpse">
      <img class="ornamentflower-left" src="{{ asset('/concept10/svg/flower-left.svg') }}" alt="" />
      <img class="ornamentflower-right" src="{{ asset('/concept10/svg/flower-right.svg') }}" alt="" />

      <div class="text-center pt-48">
        <p class="font-20 married-pop regular">A Glimpse of</p>
        <h1 class="font-46 medium married-birth">Our Memories</h1>
      </div>

      <div class="">
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
    </div>

    <div class="ucapan-carousel married-pop scope-24">
      <div class="text-center pt-50">
        <h1 class="font-18 large">Kirim Ucapan</h1>
        <p class="font-14 regular color-opacity">
          Rangkaian kata kata untuk kami yang Sedang berbagahia
        </p>
      </div>
      <div class="card-carousel flex py-40">
        @foreach($ucapans as $ucapan)
        <div class="bubble-carousel">
          <div class="carousel-title text-center">
            <p class="font-14 regular">
              “{{ $ucapan->ucapan }}"
            </p>
            <h1 class="font-14 large">{{ $ucapan->guest_name }}</h1>
          </div>
        </div>
        @endforeach
      </div>

      <div class="married-pop text-center mt-24">
        <h1 class="font-18">Tulis Ucapanmu</h1>
        <form data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
          <div class="box-form font-14">
            <div class="form-grup">
              <label for="name" class="">Nama</label>
              <input class="form-linear" type="text" name="guest_name" placeholder="" />
            </div>
            <div class="form-grup select-grup">
              <label for="undangan-dari" class="">Konfirmasi Kehadiran</label>
              <select class="form-linear" name="konfirmasi" id="">
                <option value="1">Hadir</option>
                <option value="0">Tidak Hadir</option>
              </select>
            </div>
            <div class="form-grup">
              <label for="ucapan" class="">Ucapan</label>
              <textarea class="form-linear" name="ucapan"></textarea>
            </div>
            <button type="submit" class="btn-submit married-18-pop">
              Submit Ucapan
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="display-center flex-column pt-40">
      <div class="box-327 mlr-auto married-pop">
        <p class="font-14 text-center">
          Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila
          Bapak/ibu/ Saudara/i berkenan hadir untuk memberikan do’a restu
          kepada kedua mempelai.
        </p>
      </div>

      <div class="name-close">
        <hr class="hr" />
        <h3 class="font-42 married-birth">{{ $undangan->groom_nickname }} & {{ $undangan->bride_nickname }}</h3>
        <hr class="hr" />
      </div>
      <p class="married-pop font-12 regular text-center mt-42">
        Himbauan Protocol Kesehatan :
      </p>

      <div class="close-item mt-16">
        <img class="img-ellipse-36-normal" src="{{ asset('/concept10/svg/clean-hand.svg') }}" alt="" />
        <img class="img-ellipse-36-normal" src="{{ asset('/concept10/svg/face-mask.svg') }}" alt="" />
        <img class="img-ellipse-36-normal" src="{{ asset('/concept10/svg/social-distance.svg') }}" alt="" />
      </div>
      <div class="close-last">
        <p class="font-14 married-pop">Website invitation by</p>
        <div class="img-last">
          <img src="{{ asset('/concept10/svg/brandmark.svg') }}" alt="" />
          <img class="" src="{{ asset('/concept10/svg/Logotype.svg') }}" alt="" />
        </div>
      </div>
    </div>
    <div class="relative">
      <img src="{{ asset('/concept10/svg/or-endl.svg') }}" alt="">
      <img class="or-endr" src="{{ asset('/concept10/svg/or-endr.svg') }}" alt="">
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
        <p class="font-32 large lineletter text-center color-opacity">
        ${days}
            </p>
            <span class="font-16 regular color-opacity">Day</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 large lineletter text-center color-opacity">
            ${hours}
            </p>
            <span class="font-16 regular color-opacity">Hour</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 large lineletter text-center color-opacity">
            ${minutes}
            </p>
            <span class="font-16 regular color-opacity">Min</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 large lineletter text-center color-opacity">
            ${seconds}
            </p>
            <span class="font-16 regular color-opacity">Sec</span>
          </div>
    `;

      if (distance < 0) {
        clearInterval(countdownInterval);
        document.getElementById('countdown').innerHTML = `
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-opacity">
             0
            </p>
            <span class="font-14 regular color-opacity">Day</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-opacity">
            0
            </p>
            <span class="font-14 regular color-opacity">Hour</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-opacity">
            0
            </p>
            <span class="font-14 regular color-opacity">Min</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-opacity">
            0
            </p>
            <span class="font-14 regular color-opacity">Sec</span>
          </div>`;
      }
    }

    // Update the countdown every second
    const countdownInterval = setInterval(updateCountdown, 1000);

    // Initial update
    updateCountdown();
  </script>
  <!-- End CountDown -->

  <!-- copy to clipboard -->
  <script>
    function copy() {
      const btn = document.getElementById('copyBtn');
      const teksku = document.getElementById('copyText');
      teksku.readOnly = true;

      teksku.select();
      teksku.setSelectionRange(0, 99999);
      // Alert the copied text
      try {
        navigator.clipboard.writeText(teksku.value);
        teksku.type = 'hidden';
        $(`#copyBtn`).text("Tersalin");
        $(`#copyBtn`).addClass("color-grey");
        setTimeout(function() {
          $(`#konfirmasi`).attr("hidden", false);
        }, 3000);
      } catch (err) {
        console.error(err.name, err.message);
      }
    }
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