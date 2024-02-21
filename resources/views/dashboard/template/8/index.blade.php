<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept3i.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/animasi.css') }}" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <title>{{ $slug }}</title>
</head>

<body class="hidden">
  <div id="cover" class="cover-container married-pop scope-24 bg-white ">
    <p class="font-20 small mt-50">The wedding of</p>
    <div class="cover-border mt-16 mb-40 ">
      <img class="img-cover-3i" src="{{$coverImage[0]->images ?? ''}}" alt="">

      <div class="married-great text-brown flex-wrap py-40 cover-nama">
        <h1 class="font-60 regular text-left">{{ $undangan->groom_nickname}}</h1>
        <h1 class="font-48 regular dan-3i">&</h1>
        <div class="w-100 align-end">
          <h1 class="font-60 regular text-right">{{ $undangan->bride_nickname}}</h1>
        </div>
      </div>

      <p class="font-16 small lh-150">Dear</p>
      @if(request()->filled('r'))
      <p class="font-18 medium lh-150 mt-12">{{ request()->r }}</p>
      @endif

      <button class="btn-cover mlr-auto font-16 medium lh-150 text-white btn-cover" onclick="hide()">
        <img src="{{ asset('/concept3i/svg/open-message.svg') }}" alt=""> Buka Undangan
      </button>
    </div>
    <img class="or-cover" src="{{ asset('/concept3i/svg/or-cover.svg') }}" alt="">
  </div>

  <div id="main" class="main-container married-pop">
    <div class="bg-3i">
      <div class="img-cover-u" style="    background-image: url({{$coverImage[0]->images ?? ''}}); 
    background-position: center;">
        <div class="color-white text-center">
          <h1 class="font-40 regular married-great">
            {{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}
          </h1>
          @if($undangan->timetitle == 1)
          <p class="font-16 regular mt-8 ls-8">
            {{$receptionDate}}
          </p>
          @else
          <p class="font-16 regular mt-8 ls-8">
            {{$akadDate}}
          </p>
          @endif
        </div>
      </div>

      <div class="py-48 text-center scope-24">
        <p class="font-14 regular lh-165"><i>{{$undangan->quote}}</i></p>
        <h1 class="font-24 regular mt-16 text-brown married-great">
          {{ $undangan->quote_source }}
        </h1>
      </div>
    </div>

    <div class="relative display-center flex-column align-center scope-24">
      <div>
        <img class="or-mempelail" src="{{ asset('/concept3i/svg/or-mempelail.svg') }}" alt="">
        <img class="or-mempelair" src="{{ asset('/concept3i/svg/or-mempelair.svg') }}" alt="">
      </div>
      <img class="border-kiri" src="{{ asset('/concept3i/svg/border-kiri.svg') }}" alt="">
      <img class="border-kanan" src="{{ asset('/concept3i/svg/border-kanan.svg') }}" alt="">

      <div class="border-mempelai py-48">
        <img src="{{$brideImage[0]->images ?? ''}}" alt="">
        <div class="text-center mt-24">
          <h1 class="font-24 regular married-great text-brown">{{$undangan->bride_name}}</h1>
          <p class="font-14 regular lh-165 mt-16 text-gray-3i">Putri {{ $undangan->bride_child_order }} dari</p>
          <p class="font-14 regular lineletter mt-8">{{$undangan->bride_father}} & {{$undangan->bride_mother}}</p>
          <p class="font-14 regular lh-165 mt-8 text-gray-31">{{$undangan->bride_address}}</p>
        </div>
      </div>
      <div class="border-mempelai pb-48">
        <img src="{{$groomImage[0]->images ?? ''}}" alt="">
        <div class="text-center mt-24">
          <h1 class="font-24 regular married-great text-brown">{{$undangan->groom_name}}</h1>
          <p class="font-14 regular lh-165 mt-16 text-gray-3i">Putri {{ $undangan->groom_child_order }} dari</p>
          <p class="font-14 regular lineletter mt-8">{{$undangan->groom_father}} & {{$undangan->groom_mother}}</p>
          <p class="font-14 regular lh-165 mt-8 text-gray-31">{{$undangan->groom_address}}</p>
        </div>
      </div>
    </div>

    <div class="py-48 bg-3i scope-24">
      <h1 class="font-40 regular married-great text-brown text-center">Our Love Story</h1>
      <div class="card-story mt-32">
        <div class="flex spacebetween">
          <img src="{{ asset('/concept3i/svg/story1.svg') }}" alt="">
          <h1 class="font-24 large lineletter">01</h1>
        </div>
        <h1 class="font-20 medium lh-165">Perkenalan</h1>
        <p class="font-14 regular lh-165 text-gray-3i">12 Juni 2022, Berawal dari kenalan saat membeli cilok di daerah Krapyak, kami mulai mengenal satu sama lain.</p>
      </div>
    </div>

    <div class="py-48">
      <h1 class="font-46 regular married-great text-brown text-center">Our Memories</h1>

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

    <div class="py-48 bg-3i scope-24 text-center display-flex flex-column">
      <h1 class="font-40 married-great lineletter text-brown">Save The Date</h1>

      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 display-center gap-24" id="countdown">
      </div>

      <div class="card-acara text-brown mt-24">
        <img src="{{ asset('/concept3i/svg/or-acara.svg') }}" alt="">

        <h1 class="font-20 large lh-165">Akad Nikah</h1>
        <p class="mt-16 font-16 medium lh-165">{{$akadDay}}, {{$akadDate}}</p>
        <p class="font-16 medium lh-165">{{ date('H:i', strtotime($undangan->akad_time)) }} - Selesai</p>
        <p class="font-12 regular lh-165">
          {{$undangan->alamatAkad}} <br />{{ $undangan->alamatAkadLengkap }}
        </p>
      </div>
      <div class="card-acara text-brown mt-24">
        <img src="{{ asset('/concept3i/svg/or-acara.svg') }}" alt="">

        <h1 class="font-20 large lh-165">Resepsi Pernikahan</h1>
        <p class="mt-16 font-16 medium lh-165">{{$receptionDay}}, {{$receptionDate}}</p>
        <p class="font-16 medium lh-165">{{ date('H:i', strtotime($undangan->resepsi_time)) }} - Selesai</p>
        <p class="font-12 regular lh-165">
          {{$undangan->alamatResepsi}} <br />{{ $undangan->alamatResepsiLengkap }}
        </p>
      </div>

    </div>

    <div class="py-48 scope-24">
      <h1 class="font-40 regular married-great text-brown text-center">Lokasi</h1>
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-20 maps mlr-auto">
        <img class="img-maps" src="{{ asset('/concept3i/png/maps.png') }}" alt="" />
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

      <div class="text-center font-16 lh-165 text-gray-3i">
        <p class="large">{{ $undangan->alamatResepsi }}</p>
        <p class="small">{{ $undangan->alamatResepsiLengkap }}</p>
      </div>
      <a data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="btn-maps font-16 large mt-24 mlr-auto" href="https://www.google.com/maps/search/?api=1&query={{ $undangan->akad_loc }}" target="_blank">Petunjuk Arah</a>

    </div>

    <div class="bg-3i display-center flex-column">
      <div class="relative">
        <img class="or-ucapan" src="{{ asset('/concept3i/svg/or-ucapan.svg') }}" alt="">
        <img class="or-ucapan2" src="{{ asset('/concept3i/svg/or-ucapan2.svg') }}" alt="">
      </div>
      <div class="py-48 scope-24 text-center">
        <h1 class="font-40 regular married-great text-brown">Tulis Ucapan</h1>
        <div class="mt-24">
          <form data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
            @csrf
            <div class="box-form mt-28">
              <div class="form-grup">
                <label for="guest_name" class="font-12 large lineletter-160">Nama</label>
                <input class="form-linear-3i" type="text" name="guest_name" placeholder="" id="name" />
              </div>
              <div class="form-grup">
                <label for="ucapan" class="font-11 large" for="exampleFormControlTextarea1">Ucapan</label>
                <textarea class="form-linear-3i" name="ucapan" id="exampleFormControlTextarea1"></textarea>
              </div>
              <input data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" type="hidden" name="slug" value="{{$undangan->slug}}">
              <div class="form-grup select-grup-3i">
                <label for="konfirmasi" class="font-11 large">Konfirmasi Kehadiran</label>
                <select class="form-select-3i" name="konfirmasi" id="konfirmasi">
                  <option value="1">Hadir</option>
                  <option value="0">Tidak Hadir</option>
                </select>
              </div>
            </div>
            <button type="submit" class="btn-maps font-16 w-100 large color-white mlr-auto mt-40">
              Kirim
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="py-48 scope-24">
      <h1 class="font-40 regular married-great text-brown text-center">Ucapan dan Doa</h1>

      <div class="card-ucapan flex-column">
        <div class="card-green">
          Hadir
        </div>
        <p class="font-14 medium">Olivia Rhyme</p>
        <p class="font-14 regular">Lorem ipsum dolor sit amet.</p>
      </div>
      <div class="card-ucapan flex-column">
        <div class="card-red">
          Tidak Hadir
        </div>
        <p class="font-14 medium">Olivia Rhyme</p>
        <p class="font-14 regular">Lorem ipsum dolor sit amet.</p>
      </div>
    </div>

    <div class="py-48 scope-24 bg-3i text-center">
      <h1 class="font-48 regular lineletter married-great text-brown">Terimakasih</h1>
      <p class="mt-8 font-14 text-gray-3i regular lh-165">Merupakan suatu kebahagiaan dan kehormatan bagi kami, apabila Bapak/Ibu/Saudara/i, berkenan hadir dan memberikan do’a restu kepada kami.</p>
      <p class="mt-24 font-12 large lh-165">Kami yang berbahagia</p>

      <h1 class="font-32 regular married-great text-brown mt-16">Adin & Kamila</h1>
      <p class="mt-8 font-12 regular ls-8 text-brown">{{$receptionDate}}</p>

      <div class="display-center align-center mt-32">

        <p class="font-12 regular lh-165">made with love by </p>
        <img src="{{ asset('/concept3i/svg/logo.svg') }}" alt="">
      </div>


    </div>




  </div>


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
        <p class="font-32 regular lineletter text-center text-brown">
        ${days}
            </p>
            <span class="font-14 regular text-brown">Day</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center text-brown">
            ${hours}
            </p>
            <span class="font-14 regular text-brown">Hour</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center text-brown">
            ${minutes}
            </p>
            <span class="font-14 regular text-brown">Min</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center text-brown">
            ${seconds}
            </p>
            <span class="font-14 regular text-brown">Sec</span>
          </div>
    `;

      if (distance < 0) {
        clearInterval(countdownInterval);
        document.getElementById('countdown').innerHTML = `
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center text-brown">
             0
            </p>
            <span class="font-14 regular text-brown">Day</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center text-brown">
            0
            </p>
            <span class="font-14 regular text-brown">Hour</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center text-brown">
            0
            </p>
            <span class="font-14 regular text-brown">Min</span>
          </div>
          <div class="border-countdown">
            <p class="font-32 regular lineletter text-center text-brown">
            0
            </p>
            <span class="font-14 regular text-brown">Sec</span>
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