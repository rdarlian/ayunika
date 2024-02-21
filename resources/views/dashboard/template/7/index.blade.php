<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept2i.css') }}" />
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
  <div class="cover-container married-pop" id="cover">
    <div class="display-flex flex-column align-center married-pop color-white mlr-auto">
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="mt-180">
        <p class="font-20 regular text-center">The Wedding of</p>
        <div class="box-315 married-great mt-16">
          <h1 class="font-80 regular text-left"> {{ $undangan->groom_nickname}}</h1>
          <div class="relative text-center mt-12">
            <h1 class="font-60 regular dan">&</h1>
          </div>

          <h1 class="font-80 regular text-right mt-32">{{ $undangan->bride_nickname}}</h1>
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
        <button class="btn-cover mlr-auto font-18 normal" onclick="hide()">
          💌 Buka Undangan
        </button>
      </div>
    </div>

  </div>

  <div id="main" class="main-container married-pop color-white">
    <div id="pembuka" class="relative py-24">
      <img class="or-coverl" src="{{ asset('/concept2i/svg/or-coverl.svg') }}" alt="ornament">

      <div class="relative scope-24">
        <img class="border-coverr" src="{{ asset('/concept2i/svg/border-coverr.svg') }}" alt="">
        <img class="border-coverl" src="{{ asset('/concept2i/svg/border-coverl.svg') }}" alt="">
        <div class="text-center display-center flex-column py-60">
          <p class="font-16 regular lh-165">
            We Invite You <br>
            to Celebrate our wedding
          </p>
          <div class="py-40 display-center">
            <img class="or-photoc spin" src="{{ asset('/concept2i/svg/or-photoc.svg') }}" alt="">
            <img class="img-cover" src="{{$coverImage[0]->images ?? ''}}" alt="">
          </div>
          <p class="font-16 regular lh-165">
            The Wedding of
          </p>
          <h1 class="font-52 regular lineletter married-great color2i mt-8">{{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}</h1>
          <img class="line" src="{{ asset('/concept2i/svg/line.svg') }}" alt="">
          @if($undangan->timetitle == 1)
          <p class="font-16 large lineletter-160">
            {{$receptionDay}},<br> {{$receptionDate}}
          </p>
          <p class="font-12 regular lineletter-160 color-abu">
            {{$undangan->alamatResepsi}}
          </p>
          @else
          <p class="font-16 large lineletter-160">
            {{$akadDay}},<br> {{$akadDate}}
          </p>
          <p class="font-12 regular lineletter-160 color-abu">
            {{$undangan->alamatAkad}}
          </p>
          @endif
        </div>
      </div>

      <img class="or-coverr" src="{{ asset('/concept2i/svg/or-coverr.svg') }}" alt="">
    </div>

    <div class="scope-24 mt-60 mb-40">
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="border12 text-center">
        <p class="font-12">
          "{{ $undangan->quote }}"
        </p>
        <h1 class="font-30 regular married-great color2i">{{ $undangan->quote_source }}</h1>
      </div>
    </div>

    <div class="relative pt-16">
      <img class="or-coverl" src="{{ asset('/concept2i/svg/or-atasl.svg') }}" alt="">
      <div class="relative scope-24 text-center display-center flex-column py-60">
        <img class="border-coverr" src="{{ asset('/concept2i/svg/border-coverr.svg') }}" alt="">
        <img class="border-cover-2" src="{{ asset('/concept2i/svg/border-coverl.svg') }}" alt="">

        <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="display-center text-center flex-column">
          <h2 data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-32 regular married-great color2i">{{$undangan->bride_name}}</h2>
          <img class="or-photoc-2 mlr-auto mt-12 spin" src="{{ asset('/concept2i/svg/or-photoc.svg') }}" alt="">
          <img class="img-cover2" src="{{$brideImage[0]->images ?? ''}}" alt="">

          <p class="font-14 regular lh-165 color-abu mt-12">Putri {{ $undangan->bride_child_order }} dari</p>
          <h3 class="font-16 large lh-165 mt-8"> {{$undangan->bride_father}} & {{$undangan->bride_mother}}</h3>
          <p class="font-14 regular lh-165 color-abu mt-8">{{$undangan->bride_address}}</p>
        </div>

        <img data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" height="60 px" width="60px" class="my-24 mlr-auto" src="{{ asset('/concept2i/svg/dan.svg') }}" alt="">

        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="display-center text-center flex-column">
          <h2 class="font-32 regular married-great color2i">{{$undangan->groom_name}}</h2>
          <img class="or-photoc-2 mlr-auto mt-12 spin" src="{{ asset('/concept2i/svg/or-photoc.svg') }}" alt="">
          <img class="img-cover-groom" src="{{$groomImage[0]->images ?? ''}}" alt="">

          <p class="font-14 regular lh-165 color-abu mt-12">Putra {{ $undangan->groom_child_order }} dari</p>
          <h3 class="font-16 large lh-165 mt-8"> {{$undangan->groom_father}} & {{$undangan->groom_mother}}</h3>
          <p class="font-14 regular lh-165 color-abu mt-8">{{$undangan->groom_address}}</p>
        </div>
      </div>
      <img class="or-coverr" src="{{ asset('/concept2i/svg/or-coverr.svg') }}" alt="">
    </div>

    <div class="py-48 scope-24 text-center">
      <h1 data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-32 married-great regular color2i">
        Our Love Story
      </h1>

      @foreach($stories as $key=>$story)
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="mt-24 display-center text-center card-story">
        <div class="display-center align-center {{ isset($story->image_story) ? 'img-story' : 'border-img' }}">
          <img class="{{ isset($story->image_story) ? 'img-story' : '' }}" src="{{ isset($story->image_story) ? url('storage/' . $story->image_story) : asset('/concept2i/svg/story'. $key+1 .'.svg')  }}" alt="">
        </div>
        <div class="mt-8">
          <h5 class="font-16 large lh-165 color2i">{{ $story->title_story }}</h5>
          <p class="font-14 medium">{{ $story->tgl_story }}</p>
        </div>
        <p class="font-14 regular lineletter">{{ $story->description_story }}</p>
      </div>
      @endforeach
    </div>

    <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="py-48">
      <div class="text-center scope-24">
        <p class="font-20 regular">A Glimpse of</p>
        <h1 class="font-40 regular married-great color2i">Our Memories</h1>
      </div>

      <div class="mt-32">
        <iframe class="box-yt scope-24" src="https://www.youtube.com/embed/{{ $undangan->link }}?autoplay=1&mute=1">
        </iframe>

        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out">
          <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="swiper swiper_main mt-31" style="width:100%;height:580px;">
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

    <div class="scope-24 py-48 text-center display-center flex-column ">
      <p data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-32 regular color2i married-great">
        Save The Date
      </p>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="mt-24 flex spacearround" id="countdown">
      </div>
    </div>

    <div class="display-center flex-column py-48 scope-24 text-center">
      <p data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="font-16 regular lineletter">Prosesi</p>
      <h1 data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="font-40 regular lineletter married-great mt-8">Akad Nikah</h1>
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

      <p class="font-16 regular lineletter mt-48">Prosesi</p>
      <h1 class="font-40 regular lineletter married-great mt-8">Akad Nikah</h1>

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
        <a data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="btn-maps font-16 large mt-24 mlr-auto" href="https://www.google.com/maps/search/?api=1&query={{ $undangan->akad_loc }}" target="_blank">Open on Gmaps</a>
      </div>
    </div>

    <div class="display-center flex-column pt-48 scope-24">
      <h1 data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-32 regular text-center married-great color2i">
        Write Speech
      </h1>

      <div class="pt-48 display-center flex-column gap-16" id="ucapan-box">
        @foreach($ucapans as $ucapan)
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="card-ucapan text-center">
          <p class="font-14 regular">"{{ $ucapan->ucapan }}"</p>
          <p class="font-12 large lh-165">
            {{ $ucapan->guest_name }}
          </p>
        </div>
        @endforeach

        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="py-48 text-center">
          <p class="font-32 regular color2i married-great">
            Tulis Ucapanmu
          </p>

          <form data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
            @csrf
            <div class="pt-48">
              <div data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="form-grup">
                <label for="guest_name" class="font-12 large lineletter-160">Nama</label>
                <input class="form-linear" type="text" name="guest_name" placeholder="" id="name" />
              </div>
              <div data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="form-grup">
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
            <button data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" type="submit" class="btn-submit font-18 color-white mt-40">
              Submit Ucapan
            </button>
          </form>
        </div>
      </div>
    </div>

    <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="py-80">
      <div class="relative">
        <img class="" src="{{ asset('/concept2i/svg/or-start.svg') }}" alt="">
        <img class="or-end" src="{{ asset('/concept2i/svg/or-end.svg') }}" alt="">
      </div>

      <div class="text-center">
        <h1 class="font-48 married-great regular lineletter color2i">
          Thank You
        </h1>
        <p class="font-14 regular lh-165 mt-8">
          It is a joy and honor for us, if you are willing to attend and give us your blessing.
        </p>
      </div>

      <div class="py-40 text-center">
        <p class="font-16 regular lh-165">
          We, the Happy ones
        </p>
        <p class="font-32 regular married-great mt-8 ">
          {{ $undangan->groom_nickname }} & {{ $undangan->bride_nickname }}
        </p>
        <p class="font-16 regular lh-165 mt-8">
          {{ $undangan->resepsi_date }}
        </p>
      </div>

      <div class="display-center">
        <p class="font-12 regular lh-165">made with love by </p><img src="{{ asset('/concept2i/svg/ayunika.svg') }}" alt="">
      </div>
    </div>



  </div>


  <script>
    AOS.init();
  </script>



  <script>
    function hide() {
      // togglePlay();
      document.getElementById("cover").style.visibility = "hidden";
      document.body.classList.remove('hidden');
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

  <script type="text/javascript">
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
            }, 4000);
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
        <p class="font-32 regular lineletter text-center color2i">
        ${days}
            </p>
            <span class="font-14 regular text-grey-2i ">Day</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color2i">
            ${hours}
            </p>
            <span class="font-14 regular text-grey-2i">Hour</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color2i">
            ${minutes}
            </p>
            <span class="font-14 regular text-grey-2i">Min</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color2i">
            ${seconds}
            </p>
            <span class="font-14 regular text-grey-2i">Sec</span>
          </div>
    `;

      if (distance < 0) {
        clearInterval(countdownInterval);
        document.getElementById('countdown').innerHTML = `
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color2i">
             0
            </p>
            <span class="font-14 regular ">Day</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color2i">
            0
            </p>
            <span class="font-14 regular ">Hour</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color2i">
            0
            </p>
            <span class="font-14 regular ">Min</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color2i">
            0
            </p>
            <span class="font-14 regular">Sec</span>
          </div>`;
      }
    }

    // Update the countdown every second
    const countdownInterval = setInterval(updateCountdown, 1000);

    // Initial update
    updateCountdown();
  </script>
  <!-- End CountDown -->
</body>

</html>