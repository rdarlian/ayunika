<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ayunika | {{ $undangan->bride_nickname}} & {{ $undangan->groom_nickname}}</title>
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept6.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/animasi.css') }}" />


  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body class="hidden">
  <div class="cover-date cover-container" id="cover">
    <div class="scope-30 mlr-auto relative color-white married-pop text-center">
      <h1 class="font-20 regular">The Wedding of</h1>
      <div class="married-birth relative">
        <h1 class="font-60 regular text-left">{{ $undangan->groom_nickname}}</h1>
        <h1 class="font-60 regular name-cover-1">&</h1>
        <h1 class="font-60 regular text-right lineletter mt-36">{{ $undangan->bride_nickname}}</h1>
      </div>

      <div class="mt-31 text-center mlr-auto">
        <div>
          <p class="text-italic font-18 medium">Dear</p>
          @if(request()->filled('r'))
          <p class="font-20 large">{{ request()->r }}</p>
          @endif
          <hr class="color-white mt-8" style="border: 1px solid #fff; opacity: 0.3" />
        </div>
        <p class="font-14 regular mt-16">
          You are cordially invited to our wedding
        </p>
      </div>

      <div class="display-center mt-40 pb-136">
        <button class="btn-cover mlr-auto font-16 large married-pop color-black" onclick="hide()">
          💌 Buka Undangan
        </button>
      </div>
    </div>
  </div>
  <div class="dark-red main-container married-pop" id="main">
    <div class="sound">
      <!-- <iframe src="{{ asset('/concept1i/silence.mp3') }}" allow="autoplay" id="audio"></iframe> -->
      <audio id="player" autoplay loop>
        <source src="{{isset($songs[0]->audio_path) ? url('storage/' . $songs[0]->audio_path) : '' }}">
      </audio>
      <span class="suara" onclick="togglePlay()">
        <img id="suara-i" src="{{ asset('/concept1i/svg/suara.svg') }}" alt="">
      </span>
    </div>
    <div data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" data-aos-once="true" class="border-gradient mt-20 text-center">
      <img class="ornament-basic ornament-1" src="{{ asset('/concept6/svg/ornament.svg') }}" alt="ornament" />
      <div>
        <p class="font-16 small color-linear">We are getting</p>
        <h1 class="mt-4 married-birth font-32 medium color-linear">
          Married
        </h1>
      </div>
      <div class="mt-10 married-birth">
        <h1 class="font-60 color-linear medium">{{ $undangan->groom_nickname}}</h1>
        <h1 class="font-42 color-linear regular">&</h1>
        <h1 class="font-60 color-linear medium">{{ $undangan->bride_nickname}}</h1>
      </div>

      <div class="mt-20">
        <p class="font-18 large color-linear">{{$receptionDay}}, {{$receptionDate}}</p>
        <p class="font-14 regular color-linear">{{$undangan->alamatResepsi}}</p>
      </div>

      <div class="mt-61 mb-82">
        <img src="{{ asset('/concept6/svg/arrow-up.svg') }}" alt="arrow-up" />
        <p class="married-16-pop color-linear">Swipe Up</p>
      </div>
      <img src="{{ asset('/concept6/svg/ornament.svg') }}" alt="" class="ornament-basic ornament-2" />
    </div>

    <div id="restu" class="py-40 display-center flex-column">
      <p data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-18 medium color-linear text-center">
        بِسْمِ اللّهِ الرَّحْمَنِ الرَّحِيْ
      </p>

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="w-327 text-center mlr-auto mt-24">
        <p class="font-14 medium color-h2">
          Assalamu’allaikum Warrahmatullahi Wabarrakatuh
        </p>
        <p class="font-14 regular color-h2 mt-18">
          Dengan memohon rahmat dan ridho Allah SWT, Mohon doa restu
          Bapak/Ibu/Saudara/I dalam rangka melangsungkan pernikahan
          Putra-Putri kami :
        </p>
      </div>

      <div class="mlr-auto mt-92 display-center flex-column">
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="relative display-center">
          <img class="or-img-mempelai spin" src="{{ asset('/concept6/svg/or-img-mempelai.svg') }}" alt="">
          <img src="{{ $groomImage[0]->images ?? '' }}" alt="" class="img-ellipse bg-img-linear mlr-auto" />
        </div>
        <h1 class="married-birth font-26 medium color-h1 text-center mt-53">
          {{$undangan->groom_name}}
        </h1>
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="w-327 display-center align-item-center flex-column text-center gap-6">
          <p class="font-12 regular mt-16 color-linear">
            Putra {{ $undangan->groom_child_order }} dari
          </p>
          <p class="font-16 regular color-linear">{{$undangan->groom_father}} & </p>
          <p class="font-16 regular color-linear">{{$undangan->groom_mother}}</p>
          <!-- <p class="font-14 regular lineletter-160 color-linear">
            {{$undangan->groom_address}}
          </p> -->
        </div>
      </div>

      <div class="mt-116 mlr-auto display-center flex-column">
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="relative display-center">
          <img class="or-img-mempelai spin" src="{{ asset('/concept6/svg/or-img-mempelai.svg') }}" alt="">
          <img class="img-ellipse bg-img-linear mlr-auto" src="{{ $brideImage[0]->images ?? ''}}" alt="" />
        </div>
        <h1 class="married-birth font-26 medium color-h1 mt-53 text-center">
          {{$undangan->bride_name}}
        </h1>
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="w-327 display-center gap-6 align-item-center flex-column color-linear text-center">
          <p class="font-12 regular mt-16">
            Putri {{ $undangan->bride_child_order }} dari
          </p>
          <p class="font-16 regular ">{{$undangan->bride_father}} & </p>
          <p class="font-16 regular "> {{$undangan->bride_mother}}
          </p>
          <!-- <p class="font-14 regular lineletter-160">
            {{$undangan->bride_address}}
          </p> -->
        </div>
      </div>
    </div>

    <!-- Ringkasan Acara -->
    <div id="ringkasan-acara" class="display-center flex-column pt-40">
      <div class="display-center flex-column align-center">
        <h1 data-aos="zoom-in-up" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="married-birth font-52 color-linear">Save The Date</h1>
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="mt-24 flex gap-24 color-linear" id="countdown">
        </div>
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="text-center mt-40">
        <h1 class="font-18 large color-linear">Ringkasan Acara</h1>
        <p class="font-14 regular color-linear color-opacity">
          Serangkaian acara kami nantinya
        </p>
      </div>

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="mt-20 maps mlr-auto">
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="display-center flex-column align-center img-maps text-center">
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


      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="w-327 flex flex-column mt-16 mlr-auto text-center color-linear6">
        <h1 class="font-18 large">Akad Nikah</h1>
        <p class="font-14 regular mt-4">{{$akadDay}}, {{$akadDate}} {{ date('H:i', strtotime($undangan->akad_time)) }}</p>
        <p class="font-16 large mt-20">
          {{$undangan->alamatAkad}}
        </p>
        <p class="font-14 regular mt-8">
          {{ $undangan->alamatAkadLengkap }}
        </p>
      </div>
      <a data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="btn-maps mt-16 font-16 large color-white w-327 mlr-auto">
        Open on Gmaps
      </a>


      <div data-aos="zoom-in" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="mt-32 maps mlr-auto">
        <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="display-center flex-column align-center img-maps text-center">
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
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="w-327 flex flex-column mlr-auto text-center color-linear6 mt-16">
        <h1 class="font-18 large">Resepsi Pernikahan</h1>
        <p class="font-14 regular mt-4">{{ $receptionDay }}, {{$receptionDate}} {{ date('H:i', strtotime($undangan->resepsi_time)) }}</p>
        <p class="font-16 large mt-20">
          {{ $undangan->alamatResepsi }}
        </p>
        <p class="font-14 regular mt-8">
          {{ $undangan->alamatResepsiLengkap }}
        </p>
      </div>

      <a data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="btn-maps color-white w-327 mlr-auto font-16 regular text-center medium mt-16">
        Open on Gmaps
      </a>
    </div>

    <!-- Ourstory -->
    <div class="display-center flex-column mt-80">
      <img data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="img-ourstory" src="{{ asset('/concept6/svg/tangan.svg') }}" alt="" />
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="ourstory-header-box">
        <h1 class="font-18 large color-linear">Our Story Begin</h1>
        <p class="font-14 regular color-linear">
          Cerita bagaimana kami dipertemukan
        </p>
      </div>

      <div class="timeline">
        <!-- <img class="line" src="assets/svg/line.svg" alt="" /> -->
        @foreach($stories as $key=>$story)
        <div class="card-story mt-24">
          <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="display-center flex-column align-center">
            <img class="{{ isset($story->image_story) ? 'img-story ' : 'icon-story' }}" src="{{ isset($story->image_story) ? url('storage/' . $story->image_story) : asset('/concept1i/svg/story'. $key+1 .'.svg')  }}" alt="">
          </div>
          <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="text-center">
            <h1 class="font-16 large color-linear6">{{$story->title_story }}</h1>
            <h1 class="font-14 regular color-linear6 mt-8">{{$story->tgl_story }}</h1>
            <p class="font-14 regular color-linear-v2 mt-12">
              {{ $story->description_story }}
            </p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="section-video">
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="video-header">
        <p class="font-20 regular color-linear">A Glimpse of</p>
        <h1 class="married-birth font-52 medium color-linear">
          Our Memories
        </h1>
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="mt-24 scope-24">
        <iframe class="tron-video" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&mute=1">
        </iframe>
      </div>
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true">
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

    <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="py-40 display-center flex-column">
      <div class="text-center scope-24">
        <h1 class="font-18 large color-linear-v2">Amplop Digital</h1>
        <p class="font-14 regular color-linear-v2 mt-6">Doa restu anda merupakan karunia yang sangat berarti bagi kami. dan jika memberi adalah ungkapan terimakasih anda, Anda dapat memberi kado secara cashless</p>
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

    <div class="display-center flex-column">
      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="w-327 flex-column align-center text-center mlr-auto">
        <h1 class="font-18 color-linear">Kirim Ucapan</h1>
        <p class="font-14 color-linear color-opacity">
          Rangkaian kata kata untuk kami yang Sedang berbagahia
        </p>
      </div>

      <div class="message-box" id="ucapan-box">
        @foreach($ucapans as $ucapan)
        <div class="box-message-looping">
          <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="bubble">
            <h1 class="bubble-title">{{ $ucapan->guest_name }}</h1>
            <hr width="100%" />
            <p class="bubble-isi">
              {{$ucapan->ucapan}}
            </p>
          </div>
        </div>
        @endforeach
      </div>

      <div class="w-100-6 scope-18">
        <h1 data-aos="zoom-in-up" data-aos-duration="800" data-aos-once="true" data-aos-easing="ease-in-out" class="font-18 color-linear-v2">RSVP dan Ucapan</h1>

        <form data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
          @csrf
          <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="box-form mt-31">
            <div class="form-grup">
              <label for="name" class="font-14 color-linear-v2">Nama</label>
              <input class="form-linear" type="text" placeholder="" name="guest_name" />
            </div>
            <div class="form-grup select-grup-white">
              <label for="konfirmasi" class="font-11 large color-linear-v2">Konfirmasi Kehadiran</label>
              <select class="form-select" name="konfirmasi" id="konfirmasi">
                <option value="1">Hadir</option>
                <option value="0">Tidak Hadir</option>
              </select>
            </div>
            <div class="form-grup">
              <label for="ucapan" class="font-14 color-linear-v2">Ucapan</label>
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
    <div class="mt-80 display-center flex-column scope-24">
      <div class="display-center">
        <img src="{{ asset('/concept6/svg/ornamentjoint.svg') }}" alt="" />
        <img class="" src="{{ asset('/concept6/svg/ornamentmid.svg') }}" alt="" />
        <img src="{{ asset('/concept6/svg/ornamentjointleft.svg') }}" alt="" />
      </div>

      <!-- <div class="payment-header">
        <h1 class="font-18 color-linear">Amplop Digital</h1>
        <p class="color-linear color-opacity">
          Doa restu anda merupakan karunia yang sangat berarti bagi kami. dan
          jika memberi adalah ungkapan terimakasih anda, Anda dapat memberi
          kado secara cashless
        </p>
        <div class="item-payment">
          <div class="img-payment-box">
            <a href="#" class="married-16-pop color-linear">
              <img src="assets/png/Gopay.png" alt="" width="24px" />
              GOPAY
            </a>
          </div>

          <div class="img-payment-box">
            <a href="#" class="married-16-pop color-linear">
              <img src="assets/png/bni.png" alt="" width="24px" />
              BNI
            </a>
          </div>

          <div class="img-payment-box">
            <a href="#" class="color-linear">
              <img src="#" alt="" width="24px" />Jenius
            </a>
          </div>
        </div>
      </div> -->

      <!-- <div class="qr-code-box">
        <img class="img-qr" src="assets/png/qrcode.png" alt="" />
        <h2 class="font-18">Gopay -085677284729</h2>
        <p>A.n. Adin Yanuar</p>
        <div>
          <a class="font-14 color-orange" href="">
            <img src="/assets/svg/copy.svg" alt="" /> Copy
          </a>
        </div>
      </div> -->

      <div class="box-327 mlr-auto text-center mt-40">
        <p class="font-14 regular color-linear-v2">
          Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila
          Bapak/ibu/ Saudara/i berkenan hadir untuk memberikan do’a restu
          kepada kedua mempelai.
        </p>
      </div>

      <div class="name-close">
        <hr class="hr-linear" />
        <h3 class="married-birth font-46 color-linear">{{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}</h3>
        <hr class="hr-linear" />
      </div>
      <p class="close-alert color-linear">Himbauan Protocol Kesehatan :</p>

      <div class="close-item">
        <img class="img-ellipse-36" src="{{ asset('/concept6/svg/clean-hand.svg') }}" alt="" />
        <img class="img-ellipse-36" src="{{ asset('/concept6/svg/face-mask.svg') }}" alt="" />
        <img class="img-ellipse-36" src="{{ asset('/concept6/svg/distance.svg') }}" alt="" />
      </div>
      <div class="close-last">
        <p class="font-14 color-linear">Website invitation by</p>
        <a href="http://www.ayunika.com" target="_blank" class="img-last">

          <img src="{{ asset('/concept6/svg/Brandmark.svg') }}" alt="" />
          <img class="" src="{{ asset('/concept6/svg/Logo.svg') }}" alt="" />
        </a>
      </div>
    </div>
  </div>

  <script>
    AOS.init();
  </script>
  <script>
    function hide() {
      togglePlay();
      document.getElementById("cover").style.visibility = "hidden";
      document.body.classList.remove('hidden');
    }
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
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
        <p class="font-32 large lineletter text-center color-linear">
        ${days}
            </p>
            <span class="font-16 regular color-linear">Day</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 large lineletter text-center color-linear">
            ${hours}
            </p>
            <span class="font-16 regular color-linear">Hour</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 large lineletter text-center color-linear">
            ${minutes}
            </p>
            <span class="font-16 regular color-linear">Min</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 large lineletter text-center color-linear">
            ${seconds}
            </p>
            <span class="font-16 regular color-linear">Sec</span>
          </div>
    `;

      if (distance < 0) {
        clearInterval(countdownInterval);
        document.getElementById('countdown').innerHTML = `
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-linear">
             0
            </p>
            <span class="font-14 regular color-linear">Day</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-linear">
            0
            </p>
            <span class="font-14 regular color-linear">Hour</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-linear">
            0
            </p>
            <span class="font-14 regular color-linear">Min</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center color-linear">
            0
            </p>
            <span class="font-14 regular color-linear">Sec</span>
          </div>`;
      }
    }

    // Update the countdown every second
    const countdownInterval = setInterval(updateCountdown, 1000);

    // Initial update
    updateCountdown();
  </script>
  <!-- End CountDown -->
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