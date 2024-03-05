<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept13.css') }}" />

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>Ayunika | {{ $undangan->bride_nickname}} & {{ $undangan->groom_nickname}}</title>
  <link rel="icon" href="{{ asset('/assets/png/ayunika.ico') }}" type="image/icon type">
</head>

<body class="hidden">
  <div class="cover-container color-white scope-24 married-pop" id="cover">
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
  <div id="main" class="main-container married-pop">
    <div class="sound">
      <!-- <iframe src="{{ asset('/concept1i/silence.mp3') }}" allow="autoplay" id="audio"></iframe> -->
      <audio id="player" autoplay loop>
        <source src="{{isset($songs[0]->audio_path) ? url('storage/' . $songs[0]->audio_path) : '' }}">
      </audio>
      <span class="suara" onclick="togglePlay()">
        <img id="suara-i" src="{{ asset('/concept1i/svg/suara.svg') }}" alt="">
      </span>
    </div>
    <div>
      <img class="img-cover-13" src="{{$coverImage[0]->images ?? ''}}" alt="cover" />
      <div class="py-48 text-center">
        <p class="font-16 regular">We are getting Married</p>
        <h1 class="font-42 xsmall">{{ $undangan->groom_nickname}} <span class="regular">& {{ $undangan->bride_nickname}}</span></h1>

        @if($undangan->timetitle == 1)
        <p class="font-12 medium">
          {{$receptionDay}}, {{$receptionDate}}
        </p>
        @else
        <p class="font-12 medium">
          {{$akadDay}}, {{$akadDate}}
        </p>
        @endif

        <img class="mt-20" src="{{ asset('/concept13/svg/swipe-up.svg') }}" alt="">
        <p class="font-16 medium">Swipe Up</p>
      </div>
    </div>

    <div class="py-60 scope-24 display-center flex-column align-center">
      <div class="mlr-auto married-jakarta">
        <h1 class="font-42 small lineletter">Pernikahan</h1>
        <p class="font-16 small color-opacity mt-16">
          Dengan memohon rahmat dan ridho Allah SWT, Mohon doa restu Bapak/Ibu/Saudara/ I dalam rangka melangsungkan pernikahan
          Putra-Putri kami :
        </p>
      </div>
      <img class="img-302 mt-24" src="{{$brideImage[0]->images ?? ''}}" alt="" />
      <div class="mt-20 display-center flex-column align-center text-center">
        <h1 class="font-20 large">{{$undangan->bride_name}}</h1>
        <hr class="mt-12 mb-12 hr13">
        <p class="font-12 regular">Putri {{ $undangan->bride_child_order }} dari</p>
        <p class="font-14 medium">{{$undangan->bride_father}} & <br>{{$undangan->bride_mother}}</p>
      </div>
      <h1 class="text-center font-60 regular married-birth">&</h1>
      <img class="img-302" src="{{$groomImage[0]->images ?? ''}}" alt="" />
      <div class="mt-20 display-center flex-column align-center text-center">
        <h1 class="font-20 large">{{$undangan->groom_name}}</h1>
        <hr class="mt-12 mb-12 hr13">
        <p class="font-12 regular">Putri {{ $undangan->groom_child_order }} dari</p>
        <p class="font-14 medium">{{$undangan->groom_father}} & <br>{{$undangan->groom_mother}}</p>
      </div>
      <div class="display-center flex-column align-center mt-80">
        <h1 data-aos="zoom-in-up" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="married-jakarta small font-42 color-opacity">Save The Date</h1>
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="mt-24 display-center gap-24" id="countdown">
        </div>
      </div>
    </div>

    <div class="py-40 scope-24 display-center flex-column">
      <div class="mlr-auto text-center">
        <p class="font-18 large">Ringkasan Acara</p>
        <h1 class="font-14 regular">Serangkaian acara kami nantinya</h1>
      </div>

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-20 maps mlr-auto">
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="display-center flex-column align-center img-maps text-center">
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

      <div class="mt-24 text-center">
        <p class="font-18 large">
          Resepsi Pernikahan
        </p>
        <p class="font-14 regular mt-10">
          {{$receptionDay}}, {{$receptionDate}} {{ date('H:i', strtotime($undangan->resepsi_time)) }}
        </p>
        <p class="font-14 regular mt-12">
          {{$undangan->alamatResepsi}} <br />{{ $undangan->alamatResepsiLengkap }}
        </p>
        <a data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="btn-maps font-16 large mt-24 mlr-auto" href="https://www.google.com/maps/search/?api=1&query={{ $undangan->akad_loc }}" target="_blank">Open on GMaps</a>
      </div>
    </div>

    <div class="py-40 scope-24">
      <h1 class="font-40 small text-center">Our Love Story</h1>
      @foreach($stories as $key=>$story)
      <div class="card-story mt-24 text-center">
        <img class="{{ isset($story->image_story) ? 'img-story' : '' }}" src="{{ isset($story->image_story) ? url('storage/' . $story->image_story) : asset('/concept1i/svg/story'. $key+1 .'.svg')  }}" alt="story">
        <div>
          <p class="regular font-16 large lineletter-160">{{ $story->title_story }}</p>
          <p class="font-14 medium">{{ $story->tgl_story }}</p>
          <p class="font-14 regular lineletter-160 mt-8">{{ $story->description_story }}</p>
        </div>
      </div>
      @endforeach
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
    <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="py-40 display-center flex-column">
      <div class="text-center scope-24">
        <h1 class="font-18 large">Amplop Digital</h1>
        <p class="font-14 regular color-opacity mt-6">Doa restu anda merupakan karunia yang sangat berarti bagi kami. dan jika memberi adalah ungkapan terimakasih anda, Anda dapat memberi kado secara cashless</p>
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
        <div class="display-center gap-4 flex-column text-center">
          <p class="font-18 large text-uppercase">{{ $amplops[0]->nama_bank }} - {{ $amplops[0]->norek }}</p>
          <p>A.n. {{$amplops[0]->pemilik_rekening}}</p>
          <input type="text" value="{{ $amplops[0]->norek }}" id="copyText" hidden>
          <a id="copyBtn" class="btn-amplop display-center cursor-pointer color-orange" onclick="copy('copyku')">
            <img src="{{ asset('/concept6/svg/copy-linear.svg') }}" alt="">
            <p class="color-orange font-14 medium">Salin</p>
          </a>
          <a id="konfirmasi" href="https://wa.me/{{$amplops[0]->nowa}}?text=Hallo Saya Mau Konfirmasi Sudah Kirim Sumbangan pada rekening yang tertera di undangan, berikut juga buktinya " target="_blank" class="color-orange font-16 medium" data-action="share/whatsapp/share" hidden>Konfirmasi</a>
        </div>
      </div>
    </div>

    <div class="scope-24 mt-80">
      <div class="text-center">
        <h1 class="font-32 small">Meaning Word</h1>
        <h1 class="font-42 large">From You</h1>
      </div>

      @foreach($ucapans as $ucapan)
      <div class="married-jakarta lineletter-160 mt-24">
        <h1 class="font-14 regular color-opacity">"{{ $ucapan->ucapan }}"</h1>
        <p class="font-14 xlarge mt-16">{{ $ucapan->guest_name }}</p>
      </div>
      <hr class="mt-8">
      @endforeach
    </div>
    <div class="scope-18">
      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="display-flex flex-column text-center mt-42 mb-30">
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
          </div>

          <button type="submit" class="btn-submit font-18 medium">
            Submit Ucapan
          </button>
        </form>
      </div>
    </div>

    <div class="box-img-footer">
      <img class="img-footer" src="{{$coverImage[0]->images ?? ''}}" alt="img-footer">
    </div>

    <div class="scope-12 mt-30">
      <p class="font-16 text-center regular married-jakarta lineletter-160">Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/ibu/ Saudara/i berkenan hadir untuk memberikan do’a restu kepada kedua mempelai.</p>
      <h1 class="mt-72 font-36 married-pop">{{ $undangan->groom_nickname }} & {{ $undangan->bride_nickname }}</h1>
      <p class="font-16 small">{{ $receptionDay }}, <span class="large">{{$receptionDate}}</span></p>

      <p class="mt-30">Website Invitation by</p>
      <div class="mb-80">
        <img src="{{ asset('/concept12/svg/logo.svg') }}" alt="" />
        <img src="{{ asset('/concept12/svg/name.svg') }}" alt="" />
      </div>
    </div>

  </div>

  <script>
    AOS.init();
  </script>

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
  <script type="text/javascript">
    window.onbeforeunload = function() {
      $(this).scrollTop(0);
    };

    function hide() {
      togglePlay();
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