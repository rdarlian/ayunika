<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- <link rel="stylesheet" href="css/cover-12.css" /> -->
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept12.css') }}" />
  <title>{{ $slug }}</title>
</head>

<body>
  <!-- <div class="cover cover-container">
      <img class="cover-img-12" src="assets/png/concept12/cover.png" alt="" />
    </div> -->
  <div class="main-container married-pop">
    <div class="flex flex-column blue-800 pt-30 pb-60">
      <div class="scope-30 color-white">
        <div class="nav">
          <h1 class="font-24">invitation</h1>
          <!-- <button class="hamburger-line blue-800">
            <img src="/assets/concept12/svg/hamburger.svg" alt="" />
          </button> -->
        </div>
        <div class="flex cover-header mlr-auto">
          <img class="cover-header-img" src="{{$coverImage[0]->images ?? ''}}" alt="" />
          <div class="flex flex-column gap-20">
            <button class="btn-rsvp">
              <img class="img-cover-12" src="{{ asset('/concept12/svg/mail-open.svg') }}" alt="" />
              <div class="subtitle color-white text-left">
                <p>Get</p>
                <h1>RSVP</h1>
              </div>
            </button>
            <div class="flex spacebetween">
              <button class="font-20 img-subheader color-white">
                {{ $explodeReception[1] }}
                <p class="small font-12">{{ $explodeReception[2] }}</p>
              </button>

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
      <div class="box-327 text-center mlr-auto flex-column">
        <p class="font-14 regular text-italic">
          “ Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan
          pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung
          dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa
          kasih dan sayang."
        </p>
        <h4 class="font-18 medium mb-63 mt-20">QS Ar-rum 21</h4>
      </div>
      <img class="ornament-quran" src="{{ asset('/concept12/svg/quran-right.svg') }}" alt="" />
    </div>

    <div class="blue-800 color-white married-pop flex flex-column pt-60 pb-60">
      <div class="scope-30">
        <div class="text-center ">
          <p class="font-18 regular">بِسْمِ اللّهِ الرَّحْمَنِ الرَّحِيْ</p>
          <p class="font-14 medium mt-32">
            Assalamu’allaikum Warrahmatullahi Wabarrakatuh
          </p>
          <p class="font-14 regular color-opacity mt-8">
            Dengan memohon rahmat dan ridho Allah SWT, Mohon doa restu
            Bapak/Ibu/Saudara/I dalam rangka melangsungkan pernikahan
            Putra-Putri kami :
          </p>
        </div>
        <div class="mt-48">
          <div class="display-center flex-column align-center">
            <img class="img-mempelai" src="{{$groomImage[0]->images ?? ''}}" alt="" />
            <div class="color-white mt-20 text-center">
              <h1 class="font-20 medium">{{$undangan->groom_name}}</h1>
              <hr style="opacity: 0.3; background: #FFF; margin: 12px 0px;" />
              <p class="font-12 regular">Putra {{ $undangan->groom_child_order }} dari</p>
              <h3 class="font-14 medium">{{$undangan->groom_father}} &</h3>
              <h3 class="font-14 medium">{{$undangan->groom_mother}}</h3>
            </div>
          </div>
          <h1 class="married-birth font-60 color-white text-center regular">
            &
          </h1>
          <div class="display-center flex-column align-center">
            <img class="img-mempelai" src="{{$brideImage[0]->images ?? ''}}" alt="" />
            <div class="color-white mt-20 text-center">
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
      <div class="ringkasan-acara-box">
        <p class="font-32 small">Ringkasan</p>
        <h1 class="font-42 large">Acara kami</h1>
      </div>

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 maps mlr-auto">
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

    <div class="display-center flex-column py-60">
      <div class="ringkasan-acara-box scope-24">
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
      <div class="ringkasan-acara-box color-white">
        <h1 class="font-32 small">Meaningfull word</h1>
        <p class="font-42 medium">From you</p>
      </div>

      <div class="display-center ">
        <div class="message-box mlr-auto">
          @foreach($ucapans as $ucapan)
          <div class="bubble">
            <h1 class="bubble-title">{{ $ucapan->guest_name }}</h1>
            <hr width="100%" />
            <p class="bubble-isi">
              {{ $ucapan->ucapan }}
            </p>
          </div>
          @endforeach
        </div>
      </div>


      <div class="ucapan">
        <h1 class="font-18 large color-white">Tulis Ucapanmu</h1>
        <form action="">
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
        <p class="font-14 text-left">
          Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila
          Bapak/ibu/ Saudara/i berkenan hadir untuk memberikan do’a restu kepada
          kedua mempelai.
        </p>
      </div>

      <div class="mt-103">
        <h1 class="font-36 medium">{{ $undangan->groom_nickname }} & {{ $undangan->bride_nickname }}</h1>
        <p class="font-12 regular pt-60">Himbauan Protocol Kesehatan :</p>
        <div class="close-item-left">
          <img class="img-ellipse-36-normal" src="{{ asset('/concept12/svg/hand-wash-black.svg') }}" alt="" />
          <img class="img-ellipse-36-normal" src="{{ asset('/concept12/svg/face-mask-black.svg') }}" alt="" />
          <img class="img-ellipse-36-normal" src="{{ asset('/concept12/svg/social-distance-black.svg') }}" alt="" />
        </div>
      </div>

      <div class="mt-32 pb-60">
        <p class="font-14">Website invitation by</p>
        <div class="img-last-left">
          <img src="{{ asset('/concept12/svg/logo.svg') }}" alt="" />
          <img class="" src="{{ asset('/concept12/svg/name.svg') }}" alt="" />
        </div>
      </div>
    </div>
</body>

</html>