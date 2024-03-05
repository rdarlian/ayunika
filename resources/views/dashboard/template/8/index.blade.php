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

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>Ayunika | {{ $undangan->bride_nickname}} & {{ $undangan->groom_nickname}}</title>
  <link rel="icon" href="{{ asset('/assets/png/ayunika.ico') }}" type="image/icon type">
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
    <div class="sound">
      <!-- <iframe src="{{ asset('/concept1i/silence.mp3') }}" allow="autoplay" id="audio"></iframe> -->
      <audio id="player" autoplay loop>
        <source src="{{isset($songs[0]->audio_path) ? url('storage/' . $songs[0]->audio_path) : '' }}">
      </audio>
      <span class="suara" onclick="togglePlay()">
        <img id="suara-i" src="{{ asset('/concept1i/svg/suara.svg') }}" alt="">
      </span>
    </div>
    <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="bg-3i">
      <div class="img-cover-u" style="    background-image: url({{$coverImage[0]->images ?? ''}}); 
    background-position: center;">
        <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="color-white text-center">
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

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="py-48 text-center scope-24">
        <p class="font-14 regular lh-165"><i>{{$undangan->quote}}</i></p>
        <h1 class="font-24 regular mt-16 text-brown married-great">
          {{ $undangan->quote_source }}
        </h1>
      </div>
    </div>

    <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="relative display-center flex-column align-center scope-24">
      <div>
        <img class="or-mempelail" src="{{ asset('/concept3i/svg/or-mempelail.svg') }}" alt="">
        <img class="or-mempelair" src="{{ asset('/concept3i/svg/or-mempelair.svg') }}" alt="">
      </div>
      <img class="border-kiri" src="{{ asset('/concept3i/svg/border-kiri.svg') }}" alt="">
      <img class="border-kanan" src="{{ asset('/concept3i/svg/border-kanan.svg') }}" alt="">

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="border-mempelai py-48">
        <img src="{{$brideImage[0]->images ?? ''}}" alt="">
        <div class="text-center mt-24">
          <h1 class="font-24 regular married-great text-brown">{{$undangan->bride_name}}</h1>
          <p class="font-14 regular lh-165 mt-16 text-gray-3i">Putri {{ $undangan->bride_child_order }} dari</p>
          <p class="font-14 regular lineletter mt-8">{{$undangan->bride_father}} & {{$undangan->bride_mother}}</p>
          <p class="font-14 regular lh-165 mt-8 text-gray-31">{{$undangan->bride_address}}</p>
        </div>
      </div>
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="border-mempelai pb-48">
        <img src="{{$groomImage[0]->images ?? ''}}" alt="">
        <div class="text-center mt-24">
          <h1 class="font-24 regular married-great text-brown">{{$undangan->groom_name}}</h1>
          <p class="font-14 regular lh-165 mt-16 text-gray-3i">Putra {{ $undangan->groom_child_order }} dari</p>
          <p class="font-14 regular lineletter mt-8">{{$undangan->groom_father}} & {{$undangan->groom_mother}}</p>
          <p class="font-14 regular lh-165 mt-8 text-gray-31">{{$undangan->groom_address}}</p>
        </div>
      </div>
    </div>

    <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="py-48 bg-3i scope-24">
      <h1 class="font-40 regular married-great text-brown text-center mb-32">Our Love Story</h1>
      @foreach($stories as $key=>$story)
      <div class="card-story mt-24">
        <div class="flex spacebetween">
          <img src="{{ asset('/concept3i/svg/story1.svg') }}" alt="">
          <h1 class="font-24 large lineletter">{{ $key+1 }}</h1>
        </div>
        <h1 class="font-20 medium lh-165">{{ $story->title_story }}</h1>
        <p class="font-14 regular lh-165 text-gray-3i">{{ $story->tgl_story }}, {{ $story->description_story }}</p>
      </div>
      @endforeach
    </div>

    <div class="py-48">
      <h1 data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="font-46 regular married-great text-brown text-center">Our Memories</h1>

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

        <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="swiper swiper_thumbnail mt-3" style="width:100%; height:100px;">
          <div class="swiper-wrapper jarak">
            @foreach($images as $key=>$image)
            <div class="swiper-slide"><img src="{{ $image->images ?? '' }}" alt=""></div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="py-48 bg-3i scope-24 text-center display-flex flex-column">
      <h1 class="font-40 married-great lineletter text-brown">Save The Date</h1>

      <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="mt-24 display-center gap-24" id="countdown">
      </div>

      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="card-acara text-brown mt-24">
        <img src="{{ asset('/concept3i/svg/or-acara.svg') }}" alt="">

        <h1 class="font-20 large lh-165">Akad Nikah</h1>
        <p class="mt-16 font-16 medium lh-165">{{$akadDay}}, {{$akadDate}}</p>
        <p class="font-16 medium lh-165">{{ date('H:i', strtotime($undangan->akad_time)) }} - Selesai</p>
        <p class="font-12 regular lh-165">
          {{$undangan->alamatAkad}} <br />{{ $undangan->alamatAkadLengkap }}
        </p>
      </div>
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="card-acara text-brown mt-24">
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

      <div class="text-center font-16 lh-165 text-gray-3i">
        <p class="large">{{ $undangan->alamatResepsi }}</p>
        <p class="small">{{ $undangan->alamatResepsiLengkap }}</p>
      </div>
      <a data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="btn-maps font-16 large mt-24 mlr-auto" href="https://www.google.com/maps/search/?api=1&query={{ $undangan->akad_loc }}" target="_blank">Petunjuk Arah</a>

    </div>

    <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="bg-3i display-center flex-column">
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
                <label for="konfirmasi1" class="font-11 large">Konfirmasi Kehadiran</label>
                <select class="form-select-3i" name="konfirmasi" id="konfirmasi1">
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

    <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="py-48 scope-24" id="ucapan-box">
      <h1 class="font-40 regular married-great text-brown text-center">Ucapan dan Doa</h1>

      @foreach($ucapans as $ucapan)
      <div class="card-ucapan flex-column">
        @if($ucapan->konfirmasi == 1)
        <div class="card-green">
          Hadir
        </div>
        @else
        <div class="card-red">
          Tidak Hadir
        </div>
        @endif
        <p class="font-14 medium">{{ $ucapan->guest_name }}</p>
        <p class="font-14 regular">{{ $ucapan->ucapan }}</p>
      </div>
      @endforeach
    </div>

    <div data-aos="zoom-in-up" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="py-40 display-center flex-column">
      <div class="text-center scope-24">
        <h1 class="font-40 regular text-brown married-great">Amplop Digital</h1>
        <p class="font-14 regular color-opacity mt-10">Doa restu anda merupakan karunia yang sangat berarti bagi kami. dan jika memberi adalah ungkapan terimakasih anda, Anda dapat memberi kado secara cashless</p>
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
        <div class="display-center gap-4 flex-column text-center color-black">
          <p class="font-18 large text-uppercase">{{ $amplops[0]->nama_bank }} - {{ $amplops[0]->norek }}</p>
          <p>A.n. {{$amplops[0]->pemilik_rekening}}</p>
          <input type="text" value="{{ $amplops[0]->norek }}" id="copyText" hidden>
          <a id="copyBtn" class="btn-amplop display-center cursor-pointer color-orange" onclick="copy('copyku')">
            <img src="{{ asset('/concept6/svg/copy-linear.svg') }}" alt="">
            <p class="color-orange font-14 medium">Salin</p>
          </a>
          <a id="konfirmasi" href="https://wa.me/{{$amplops[0]->nowa}}?text=Hallo Saya Mau Konfirmasi Sudah Kirim Sumbangan pada rekening yang tertera di undangan, berikut juga buktinya " target="_blank" class="color-orange font-16 medium" hidden>Konfirmasi</a>
        </div>
      </div>
    </div>

    <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" data-aos-once="true" class="py-48 scope-24 bg-3i text-center">
      <h1 class="font-48 regular lineletter married-great text-brown">Terimakasih</h1>
      <p class="mt-8 font-14 text-gray-3i regular lh-165">Merupakan suatu kebahagiaan dan kehormatan bagi kami, apabila Bapak/Ibu/Saudara/i, berkenan hadir dan memberikan do’a restu kepada kami.</p>
      <p class="mt-24 font-12 large lh-165">Kami yang berbahagia</p>

      <h1 class="font-32 regular married-great text-brown mt-16">{{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}</h1>
      <p class="mt-8 font-12 regular ls-8 text-brown">{{$receptionDate}}</p>

      <div class="display-center align-center mt-32">

        <p class="font-12 regular lh-165">made with love by </p>
        <a href="http://www.ayunika.com" class="display-center" target="_blank">
          <img class="ml-2" src="{{ asset('/concept3i/svg/logo.svg') }}" alt="">
        </a>
      </div>


    </div>




  </div>


  <script>
    function hide() {
      togglePlay();
      document.getElementById("cover").style.visibility = "hidden";
      document.body.classList.remove('hidden');
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

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
    AOS.init();
  </script>
  <script type="text/javascript">
    window.onbeforeunload = function() {
      $(this).scrollTop(0);
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

  <!-- copy to clipboard -->
  <script type="text/javascript">
    function copy() {
      const btn = document.getElementById('copyBtn');
      const teksku = document.getElementById('copyText');
      teksku.readOnly = true;

      teksku.select();
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

  <!-- Form ucapan -->
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
            }, 4000);
          },
          error: function(response) {}
        });

      });

    });
  </script>

</body>

</html>