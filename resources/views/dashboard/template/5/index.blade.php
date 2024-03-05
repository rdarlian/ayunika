<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <link rel="stylesheet" href="css/cover-12.css" /> -->
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept12.css') }}" />

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>Ayunika | {{ $undangan->bride_nickname}} & {{ $undangan->groom_nickname}}</title>
</head>

<body>
  <div class="cover cover-container married-pop" id="cover">
    <img class="img-cover-12" src="{{$coverImage[0]->images ?? ''}}" alt="" />
    <div class="scope-30 pt-40">
      <p class="font-24">{{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}</p>

      <p class="mt-16 font-36 small lh-140">We Are Getting <span class="font-42 large">Married</span></p>
      <p class="font-14 regular mt-10">You are officialy invited to our wedding</p>

      <button class="btn-cover mlr-auto color-white font-18 normal mt-52 mb-63" onclick="hide()">
        💌 Buka Undangan
      </button>

    </div>

  </div>
  <div class="main-container married-pop hidden" id="main">
    <div class="sound">
      <audio id="player" autoplay loop>
        <source src="{{isset($songs[0]->audio_path) ? url('storage/' . $songs[0]->audio_path) : '' }}">
      </audio>
      <span class="suara" onclick="togglePlay()">
        <img id="suara-i" src="{{ asset('/concept1i/svg/suara.svg') }}" alt="">
      </span>
    </div>
    <div class="flex flex-column blue-800 pt-30 pb-60">
      <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="scope-30 color-white">
        <div class="nav">
          <h1 class="font-24">invitation</h1>
          <!-- <button class="hamburger-line blue-800">
            <img src="/assets/concept12/svg/hamburger.svg" alt="" />
          </button> -->
        </div>
        <div class="flex cover-header">
          <img class="cover-header-img" src="{{$coverImage[0]->images ?? ''}}" alt="" />
          <div class="flex flex-column gap-20">
            <button class="btn-rsvp">
              <img class="img-or-cover" src="{{ asset('/concept12/svg/mail-open.svg') }}" alt="" />
              <div class="subtitle color-white text-left">
                <p>Get</p>
                <h1>RSVP</h1>
              </div>
            </button>
            <div class="flex spacebetween">
              @if($undangan->timetitle == 1)
              <button class="font-20 img-subheader color-white">
                {{ $explodeReception[0] }}
                <p class="small font-12">{{ $explodeReception[1] }}</p>
              </button>
              @elseif($undangan->timetitle == 0)
              <button class="font-20 img-subheader color-white">
                {{ $explodeAkad[0] }}
                <p class="small font-12">{{ $explodeAkad[1] }}</p>
              </button>
              @endif


              <button class="font-20 img-subheader color-white">↘</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-white text-left pt-50">
      <div class="scope-30">
        <p class="font-28 xsmall mt-10">{{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}</p>
        <p class="font-36 small mt-10">We Are Getting</p>
        <h3 class="font-42 large pb-58">Married</h3>

        <div class="border-swipe-12">
          ↑
          <p class="font-16 medium">Swipe Up</p>
        </div>
      </div>
    </div>


    <div class="surah pt-60">
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="box-327 text-center mlr-auto flex-column">
        <p class="font-14 regular text-italic">
          “{{ $undangan->quote }}"
        </p>
        <h4 class="font-18 medium mb-63 mt-20">{{ $undangan->quote_source }}</h4>
      </div>
      <img class="ornament-quran" src="{{ asset('/concept12/svg/quran-right.svg') }}" alt="" />
    </div>

    <div class="blue-800 color-white married-pop flex flex-column pt-60 pb-60">
      <div class="scope-30">
        <div class="text-center ">
          <p data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-18 regular">بِسْمِ اللّهِ الرَّحْمَنِ الرَّحِيْ</p>
          <p data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-14 medium mt-32">
            Assalamu’allaikum Warrahmatullahi Wabarrakatuh
          </p>
          <p data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-14 regular color-opacity mt-8">
            Dengan memohon rahmat dan ridho Allah SWT, Mohon doa restu
            Bapak/Ibu/Saudara/I dalam rangka melangsungkan pernikahan
            Putra-Putri kami :
          </p>
        </div>
        <div class="mt-48">
          <div class="display-center flex-column align-center">
            <img data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="img-mempelai" src="{{$groomImage[0]->images ?? ''}}" alt="" />
            <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="color-white mt-20 text-center">
              <h1 class="font-20 medium">{{$undangan->groom_name}}</h1>
              <hr style="opacity: 0.3; background: #FFF; margin: 12px 0px;" />
              <p class="font-12 regular">Putra {{ $undangan->groom_child_order }} dari</p>
              <h3 class="font-14 medium">{{$undangan->groom_father}} &</h3>
              <h3 class="font-14 medium">{{$undangan->groom_mother}}</h3>
            </div>
          </div>
          <h1 data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="married-birth font-60 color-white text-center regular">
            &
          </h1>
          <div class="display-center flex-column align-center">
            <img data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="img-mempelai" src="{{$brideImage[0]->images ?? ''}}" alt="" />
            <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="color-white mt-20 text-center">
              <h1 class="font-20 medium">{{ $undangan->bride_name }}</h1>
              <hr style="opacity: 0.3; background: #FFF; margin: 12px 0px;" />
              <p class="font-12 regular">Putri {{ $undangan->bride_child_order }} dari</p>
              <h3 class="font-14 medium">{{$undangan->bride_father}} &</h3>
              <h3 class="font-14 medium">{{$undangan->bride_mother}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white scope-24 display-center flex-column py-60">
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="ringkasan-acara-box">
        <p class="font-32 small">Ringkasan</p>
        <h1 class="font-42 large">Acara kami</h1>
      </div>
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 maps mlr-auto">
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

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 maps mlr-auto">
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="display-center flex-column align-center img-maps text-center">
          <div class="boxtempat ">
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

    <div class="display-center flex-column py-60">
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="ringkasan-acara-box scope-24">
        <p class=" married-32-pop">A Glimpse of</p>
        <h1 class="married-42-pop">Our Memories</h1>
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
      <!-- <div class="bubble-scrollx">
        <p class="font-14 small">23 January 2022</p>
        <h3 class="font-18 medium">Pertemuan Pertama dengan dia</h3>
        <p class="font-14 small color-opacity">
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem
          accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae
          ab illo inventore veritatis et quasi architecto beatae vitae dicta
          sunt explicabo”
        </p>

        <a href="#">- - -</a>
      </div> -->
    </div>

    <div class="message pt-50 pb-32 blue-800 married-pop scope-24">
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="py-40 display-center flex-column">
        <div>
          <h1 class="font-32 medium color-white">Amplop Digital</h1>
          <p class="font-14 regular color-white color-opacity mt-6">Doa restu anda merupakan karunia yang sangat berarti bagi kami. dan jika memberi adalah ungkapan terimakasih anda, Anda dapat memberi kado secara cashless</p>
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
              <img src="{{ asset('/concept6/svg/copy-linear.svg') }}" alt="">
              <p class="color-orange font-14 medium">Salin</p>
            </a>
            <a id="konfirmasi" href="https://wa.me/{{$amplops[0]->nowa}}?text=Hallo Saya Mau Konfirmasi Sudah Kirim Sumbangan pada rekening yang tertera di undangan, berikut juga buktinya " target="_blank" class="color-orange font-16 medium" data-action="share/whatsapp/share" hidden>Konfirmasi</a>
          </div>
        </div>
      </div>
      <div class="ringkasan-acara-box color-white">
        <h1 class="font-32 small">Meaningfull word</h1>
        <p class="font-42 medium">From you</p>
      </div>

      <div class="display-center flex-column mt-32">
        <div class="message-box">
          @foreach($ucapans as $ucapan)
          <div class="box-message-looping">
            <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="bubble">
              <h1 class="bubble-title">{{ $ucapan->guest_name }}</h1>
              <hr width="100%" />
              <p class="bubble-isi">
                {{ $ucapan->ucapan }}
              </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>


      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="ucapan">
        <h1 class="font-18 large color-white">Tulis Ucapanmu</h1>
        <form data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
          @csrf
          <div class="box-form">
            <div class="form-grup">
              <label for="name" class="font-14 color-white">Nama</label>
              <input class="form-linear" type="text" name="guest_name" placeholder="" id="name" />
            </div>
            <div class="form-grup select-grup">
              <label for="konfirmasi" class="font-14 color-white">Kehadiran</label>
              <select class="form-linear form-select" name="konfirmasi" id="konfirmasi">
                <option value="1">Hadir</option>
                <option value="0">Tidak Hadir</option>
              </select>
            </div>
            <div class="form-grup">
              <label for="ucapan" class="font-14 color-white">Ucapan</label>
              <textarea class="form-linear" name="ucapan"></textarea>
            </div>
            <input data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" type="hidden" name="slug" value="{{$undangan->slug}}">
            <button type="submit" class="btn-submit font-18">
              Submit Ucapan
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="pt-50 scope-30">
      <div class="">
        <p data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-14 text-left">
          Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila
          Bapak/ibu/ Saudara/i berkenan hadir untuk memberikan do’a restu kepada
          kedua mempelai.
        </p>
      </div>

      <div class="mt-103">
        <h1 data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-36 medium">{{ $undangan->groom_nickname }} & {{ $undangan->bride_nickname }}</h1>
        <p class="font-12 regular pt-60">Himbauan Protocol Kesehatan :</p>
        <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="close-item-left">
          <img class="img-ellipse-36-normal" src="{{ asset('/concept12/svg/hand-wash-black.svg') }}" alt="" />
          <img class="img-ellipse-36-normal" src="{{ asset('/concept12/svg/face-mask-black.svg') }}" alt="" />
          <img class="img-ellipse-36-normal" src="{{ asset('/concept12/svg/social-distance-black.svg') }}" alt="" />
        </div>
      </div>

      <div class="mt-32 pb-60">
        <p class="font-14">Website invitation by</p>
        <a href="http://www.ayunika.com" target="_blank" class="img-last-left">
          <img src="{{ asset('/concept12/svg/logo.svg') }}" alt="" />
          <img class="" src="{{ asset('/concept12/svg/name.svg') }}" alt="" />
        </a>
      </div>
    </div>

    <script>
      AOS.init();
    </script>

    <script>
      function hide() {
        togglePlay();
        document.getElementById("cover").style.display = "none";
        document.getElementById("main").classList.remove("hidden");
      }
    </script>

    <!-- Copy for Donate -->
    <script>
      function copy() {
        const btn = document.getElementById('copyBtn');
        const text = document.getElementById('copyText');
        text.readOnly = true;
        text.select();
        text.setSelectionRange(0, 99999);
        // Alert the copied text
        try {
          navigator.clipboard.writeText(text.value);
          text.type = 'hidden';
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
    <!-- End Copy -->

    <script type="text/javascript">
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