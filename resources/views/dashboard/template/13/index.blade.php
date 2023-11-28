<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wedding 6</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/concept6.css')}}" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
  <div class="cover cover-container" id="cover">
    <div class=" cover-utama">
      <h1 class="wedding-of">The Wedding of</h1>
      <div>
        <h1 class="cover-wedding wedding-name1">{{ $undangan->groom_nickname}}</h1>
        <h1 class="wedding-name2">&</h1>
        <h1 class="cover-wedding wedding-name3">{{ $undangan->bride_nickname}}</h1>
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
  </div>
  <div class="dark-red main-container married-pop filter relative" id="main">
    <img class="ornament-basic ornament-1" src="{{ asset('/concept6/svg/ornament.svg') }}" alt="" />
    <div class="cover-main border-gradient mt-20 text-center">
      <div>
        <p class="font-16 small color-linear">We are getting</p>
        <h1 class="mt-4 married-birth font-32 medium color-linear">
          Married
        </h1>
      </div>
      <div class="mt-10 married-birth">
        <h1 class="font-86 color-linear medium">{{ $undangan->groom_nickname}}</h1>
        <h1 class="font-42 color-linear">&</h1>
        <h1 class="font-86 color-linear medium">{{ $undangan->bride_nickname}}</h1>
      </div>

      <div class="mt-20">
        <p data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="font-18 large color-linear">Sunday, 32 February 2023</p>
        <p data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="font-14 regular color-linear">Masjid Nurul Sakinah</p>
      </div>

      <div class="mt-61">
        <img src="{{ asset('concept6/svg/arrow-up.svg') }}" alt="arrow-up" />
        <p class="married-16-pop color-linear">Swipe Up</p>
      </div>
      <img class="ornament-basic ornament-2" src="{{ asset('/concept6/svg/ornament.svg') }}" alt="" />
    </div>

    <div id="restu" class="pt-60">
      <p data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="font-18 medium color-linear text-center">
        بِسْمِ اللّهِ الرَّحْمَنِ الرَّحِيْ
      </p>

      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class=" greeting-box">
        <p class="font-14 color-linear">
          Assalamu’allaikum Warrahmatullahi Wabarrakatuh
        </p>
        <p class="font-14 regular color-linear">
          Dengan memohon rahmat dan ridho Allah SWT, Mohon doa restu
          Bapak/Ibu/Saudara/I dalam rangka melangsungkan pernikahan
          Putra-Putri kami :
        </p>
      </div>

      <div class="picture-married">
        <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out">
          <img class="img-ellipse bg-img-linear" src="{{$groomImage[0]->groom_images ?? ''}}" alt="" />
          <div class="name-box display-center align-item-center flex-column text-center">
            <h1 class="married-birth font-26 medium color-linear">
              Adin Yanuar
            </h1>
            <p class="font-12 regular color-linear">
              Putra pertama dari Bpk. Jhon Chena S.T & <br />Ibu. Eli Sugigi.
              S.E
            </p>
          </div>
        </div>

        <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out">
          <img class="img-ellipse bg-img-linear" src="{{$brideImage[0]->bride_images ?? ''}}" alt="" />
          <div class="name-box display-center align-item-center flex-column text-center">
            <h1 class="married-birth font-26 medium color-linear">
              {{$undangan->bride_name}}
            </h1>
            <p class="font-12 regular color-linear">
              Putri dari <br />
              Bpk. Rahmat cahyadi & <br />
              Ibu. Monalisa
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Ringkasan Acara -->
    <div id="ringkasan-acara" class="display-center flex-column mt-134">
      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="text-center">
        <h1 class="font-18 large color-linear">Ringkasan Acara</h1>
        <p class="font-14 regular color-linear color-opacity">
          Serangkaian acara kami nantinya
        </p>
      </div>
      <img data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="img-230 mt-20" src="{{ $coverImage[0]->cover_images ?? ‘’ }}" alt="masjid" />

      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="w-327 flex flex-column gap-6 mt-16 mlr-auto text-center color-linear">
        <h1 class="font-18 large">Akad Nikah</h1>
        <p class="font-14 regular">Monday, 32 February 2023 08:00 Pagi</p>
        <p class="font-14 regular">
          Masjid Nurul Sakinah <br />
          Jl Kebagusan 3, Ujung kulon Banyuwangi, Jawa Timur - Indonesia
        </p>
      </div>
      <p data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="font-14 text-center regular medium color-orange mt-24">
        See on Gmaps Mode
      </p>

      <img data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="img-230 mt-36" src="{{ $coverImage[0]->cover_images ?? '' }}" alt="" />
      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="w-327 flex flex-column gap-6 mlr-auto text-center color-linear mt-16">
        <h1 class="font-18 large">Resepsi Pernikahan</h1>
        <p class="font-14 regular">Monday, 32 February 2023 08:00 Pagi</p>
        <p class="font-14 regular">
          Jakarta International Stadium <br />
          Jl Kebagusan 3, Ujung kulon Banyuwangi, Jakarta - Indonesia
        </p>
      </div>

      <p data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="font-14 regular text-center medium color-orange mt-24">
        See on Gmaps Mode
      </p>
    </div>

    <!-- Ourstory -->
    <div class="ourstory">
      <img data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="img-ourstory mt-36" src="{{ asset('/concept6/svg/tangan.svg') }}" alt="" />

      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="ourstory-header-box">
        <h1 class="font-18 large color-linear">Our Story Begin</h1>
        <p class="font-14 regular color-linear">
          Cerita bagaimana kami dipertemukan
        </p>
      </div>

      <div class="timeline">
        <!-- <img class="line" src="{{ asset('') }}/svg/line.svg" alt="" /> -->

        @php

        $i = 0;
        $story = [$stories[0]->love_story1, $stories[0]->love_story2,$stories[0]->love_story3,$stories[0]->love_story4,$stories[0]->love_story5,$stories[0]->love_story6,$stories[0]->love_story7,$stories[0]->love_story8,$stories[0]->love_story9,$stories[0]->love_story10] ;
        @endphp
        @for($i = 0; $i < 10; $i++) @if(!empty($story[$i])) <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="item-ourstory">
          <img src="{{ asset('/concept6/svg/ellipse.svg') }}" alt="" />
          <div class="item-text">
            <h1 class="font-16 large color-linear"></h1>
            <p class="font-14 regular color-secondary color-opacity">
              {{ $story[$i] }}
            </p>
          </div>
      </div>
      @endif

      @endfor
    </div>
    <div class="section-video">
      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="video-header">
        <p class="font-20 regular color-linear">A Glimpse of</p>
        <h1 class="married-birth font-52 medium color-linear">
          Our Memories
        </h1>

      </div>
      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="tron-video mt-24">
        <iframe width="343" height="220" src="https://www.youtube.com/embed/{{$undangan->link}}?autoplay=1&mute=1">
        </iframe>
      </div>
      <div data-aos=" zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="tron-image">
        <img class="tron-image1" src=" {{$images[0]->images ?? asset('') }}" alt="" />
      </div>
      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="tron-image-grup">
        <div class="tron-image2">
          <img class="tron-image2" src="{{$images[1]->images ?? asset('') }}" alt="" />
        </div>
        <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class=" item-image-2">
          <img class="tron-image3" src="{{$images[2]->images ?? asset('') }}" alt="" />
          <img class="tron-image3" src="{{$images[3]->images ?? asset('') }}" alt="" />
        </div>
      </div>
    </div>

    <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="message mt-80">
      <div class="message-title">
        <h1 class="font-18 color-linear">Kirim Ucapan</h1>
        <p class="font-14 color-linear color-opacity">
          Rangkaian kata kata untuk kami yang Sedang berbagahia
        </p>
      </div>


      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="message-box mlr-auto" id="ucapan-box">
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

      <div class="ucapan">
        <h1 data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="font-18 color-linear-v2">RSVP dan Ucapan</h1>

        <form data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
          @csrf
          <div class="box-form">
            <div class="form-grup">
              <label for="name" class="font-14 color-linear-v2">Nama</label>
              <input class="form-linear" type="text" id="name" name="guest_name" placeholder="" />
            </div>
            <div class="form-grup">
              <label for="name" class="font-14 color-linear-v2">Alamat</label>
              <input class="form-linear" type="text" placeholder="" />
            </div>

            <div class="form-grup-col">
              <div class="form-grup">
                <label for="undangan-dari" class="font-14 color-linear-v2">Undangan Dari</label>
                <select class="form-linear" id="">
                  <option value="keluarga pria">Keluarga Pria</option>
                  <option value="keluarga pria">Keluarga Wanita</option>
                </select>
              </div>
              <div class="form-grup">
                <label for="jumlah kehadiran" class="font-14 color-linear-v2">Jumlah Kehadiran</label>
                <select class="form-linear">
                  <option value="1">1 Tamu</option>
                  <option value="2">2 Tamu</option>
                  <option value="3">3 Tamu</option>
                </select>
              </div>
            </div>

            <div class="form-grup">
              <label for="ucapan" class="font-14 color-linear-v2">Ucapan</label>
              <textarea class="form-linear" name="ucapan" id="exampleFormControlTextarea1"></textarea>
            </div>


          </div>
          <button type="submit" class="btn-submit font-18">
            Submit Ucapan
          </button>
        </form>
      </div>
    </div>
    <div class="payment">
      <!-- <div class="ornament-full">
        <img src="{{ asset('') }}/concept6/svg/ornamentjoint.svg" alt="" />
        <img src="{{ asset('') }}/concept6/svg/ornamentmid.svg" alt="" />
        <img src="{{ asset('') }}/concept6/svg/ornamentjointleft.svg" alt="" />
      </div> -->
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
              <img src="{{ asset('') }}/png/Gopay.png" alt="" width="24px" />
              GOPAY
            </a>
          </div>

          <div class="img-payment-box">
            <a href="#" class="married-16-pop color-linear">
              <img src="{{ asset('') }}/png/bni.png" alt="" width="24px" />
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
        <img class="img-qr" src="{{ asset('') }}/png/qrcode.png" alt="" />
        <h2 class="font-18">Gopay -085677284729</h2>
        <p>A.n. Adin Yanuar</p>
        <div>
          <a class="font-14 color-orange" href="">
            <img src="/{{ asset('') }}/svg/copy.svg" alt="" /> Copy
          </a>
        </div>
      </div> -->

      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="box-327 mlr-auto text-center">
        <p class="font-14 regular color-linear-v2">
          Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila
          Bapak/ibu/ Saudara/i berkenan hadir untuk memberikan do’a restu
          kepada kedua mempelai.
        </p>
      </div>

      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="name-close">
        <hr class="hr-linear" />
        <h3 class="married-birth font-46 color-linear">{{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}</h3>
        <hr class="hr-linear" />
      </div>
      <p data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="close-alert color-linear">Himbauan Protocol Kesehatan :</p>

      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="close-item">
        <img class="img-ellipse-36" src="{{ asset('/concept6/svg/clean-hand.svg') }}" alt="" />
        <img class="img-ellipse-36" src="{{ asset('/concept6/svg/face-mask.svg') }}" alt="" />
        <img class="img-ellipse-36" src="{{ asset('/concept6/svg/distance.svg') }}" alt="" />
      </div>
      <div class="close-last">
        <p class="font-14 color-linear">Website invitation by</p>
        <div class="img-last">
          <img src="{{ asset('/concept6/svg/Brandmark.svg') }}" alt="" />
          <img class="" src="{{ asset('/concept6/svg/Logo.svg') }}" alt="" />
        </div>
      </div>
    </div>
  </div>

  <script>
    function hide() {
      document.getElementById("cover").style.visibility = "hidden";
      document.getElementById("main").style.filter = "none";
      document.getElementById("main").classList.remove("relative");

    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
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
                $("#loaderDiv").hide();
              });;

            }, 6000);
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
</body>

</html>