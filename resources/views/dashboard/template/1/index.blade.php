<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/animasi.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept1.css') }}" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <title>concept1</title>
  <style>
    .modal-custom {
      position: absolute;
      bottom: 0;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-backdrop {
      z-index: 100;
    }

    .modal-header {
      justify-content: center;
    }

    .modal-content {
      background-color: #fefefe;
      margin: 20% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 78%;
      border-radius: 30px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .btn-modal {
      width: 100%;
      background-color: #E1931E;
      color: white;
    }

    .form-control {
      padding: 11px;
      border-radius: 12px;
    }

    .form-control:focus {
      color: #212529;
      background-color: #fff;
      border-color: green;
      outline: 0;
      box-shadow: none;
    }

    .form-label {
      font-family: 'Plus Jakarta Sans';
      font-style: normal;
      font-weight: 400;
      font-size: 16px;
      margin-left: 18px;
      line-height: 14px;
      color: #023410;
    }
  </style>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hidden">
  <div class="cover-container married-pop" id="cover">
    <div class="display-flex flex-column align-center mlr-auto color-white">
      <img data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="cover-img" src="{{ asset('/concept1/svg/oratas-1.svg') }}" alt="" />
      <p data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="font-20 regular text-center pt-155">The Wedding of</p>
      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="w-275 mt-16 mlr-auto married-birth relative">
        <h1 class="font-60 regular lineletter">{{ $undangan->groom_nickname}}</h1>
        <h2 class="name-cover-1 text-center font-60 regular lineletter">&</h2>
        <br />
        <br />
        <h1 class="font-60 regular text-right lineletter">{{ $undangan->bride_nickname}}</h1>
      </div>

      <div class="invitation text-white mlr-auto ">
        <div class="invitation-box text-center">
          <p class="dear">Dear</p>
          @if(request()->filled('r'))
          <p class="font-20 large">{{ request()->r }}</p>
          @endif
        </div>
        <p class="font-14 regular text-center">You are cordially invited to our wedding</p>
      </div>
    </div>
    <button class="btn-openinv mlr-auto text-white" onclick="hide()">💌 Buka Undangan</button>

  </div>
  <div id="main" class="main-container married-pop bg-blue-1">
    <div class="sound">
      <!-- <iframe src="{{ asset('/concept1i/silence.mp3') }}" allow="autoplay" id="audio"></iframe> -->
      <audio id="player" autoplay loop>
        <source src="{{isset($songs[0]->audio_path) ? url('storage/' . $songs[0]->audio_path) : '' }}">
      </audio>
      <span class="suara" onclick="togglePlay()">
        <img id="suara-i" src="{{ asset('/concept1i/svg/suara.svg') }}" alt="">
      </span>
    </div>

    <div class="relative">
      <img data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class=" img-cover-1 wiggle" src="{{ asset('/concept1/svg/oratas-1.svg') }}" alt="" />
    </div>
    <div class="pt-220 pb-114 color-white">
      <p data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class=" font-20 regular text-center">The Wedding of</p>
      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="w-275 mt-16 mlr-auto married-birth relative">
        <h1 class="font-60 regular lineletter">{{ $undangan->groom_nickname}}</h1>
        <h2 class="name-cover-1 text-center font-60 regular lineletter">&</h2>
        <h1 class="font-60 mt-24 regular text-right lineletter">{{ $undangan->bride_nickname}}</h1>
      </div>

      <h2 class="font-18 mt-24 large text-center">{{$receptionDay}}, {{$receptionDate}}</h2>
      <p class="font-14 regular text-center">{{$undangan->alamatResepsi}}</p>

      <div class="text-center mt-81">
        <img src="{{ asset('/concept1/svg/arrow-up.svg') }}" alt="arrow-up" />
        <p>Swipe Up</p>
      </div>
      <div class="relative">
        <img class="img-cover-2 wiggle" src="{{ asset('/concept1/svg/orbawah-1.svg') }}" alt="" />
      </div>
    </div>
    <div class=" py-60 display-center flex-column color-white-rgb">
      <img data-aos="fade-up" class="mlr-auto" src="{{ asset('/concept1/svg/ornament.svg') }}" alt="" />

      <div class="w-327 mlr-auto text-center hero">
        <h3 data-aos="fade-up" class="mt-20 font-18 medium">
          بِسْمِ اللّهِ الرَّحْمَنِ الرَّحِيْ
        </h3>
        <p data-aos="fade-up" class="font-14 regular mt-20">
          Assalamu’allaikum Warrahmatullahi Wabarrakatuh
        </p>
        <p data-aos="fade-up" data-aos-duration="600" data-aos-easing="ease-in-out" class="font-14 regular mt-20">
          Dengan memohon rahmat dan ridho Allah SWT, Mohon doa restu
          Bapak/Ibu/Saudara/I dalam rangka melangsungkan pernikahan
          Putra-Putri kami :
        </p>
      </div>

      <div class="pb-99">
        <div class="position-relative w-100">
          <img class="position-absolute end-0" src="{{ asset('/concept1/png/Ornamentright1.png') }}" alt="">
        </div>
        <div class="w-307 mlr-auto">
          <img data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="img-mempelai mt-40 mb-40" src="{{$groomImage[0]->images ?? ''}}" alt="" />

          <div data-aos="zoom-in" data-aos-duration="800" data-aos-easing="ease-in-out" class="name-item-mempelai text-center">
            <h1 class="font-28 medium married-birth">{{$undangan->groom_name}}</h1>
            <hr />
            <p class="font-12 regular">Putra {{ $undangan->groom_child_order }} dari</p>
            <h3 class="font-14 medium">Bpk. {{$undangan->groom_father}} &</h3>
            <h3 class="font-14 medium">Ibu. {{$undangan->groom_mother}}</h3>
          </div>
        </div>
        <h1 data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="married-birth text-center font-60 regular pt-30 pb-32">&</h1>

        <div data-aos="fade-up" data-aos-duration="800" data-aos-easing="ease-in-out" class="w-307 mlr-auto">
          <img data-aos="fade-up" data-aos-duration="800" data-aos-easing="linear" class="img-mempelai" src="{{$brideImage[0]->images ?? ''}}" alt="" />
          <div class="name-item-mempelai text-center">
            <h1 class="font-28 medium married-birth">{{$undangan->bride_name}}</h1>
            <hr />
            <p class="font-12 regular">Putri {{ $undangan->bride_child_order }} dari</p>
            <h3 class="font-14 medium">{{$undangan->bride_father}} &</h3>
            <h3 class="font-14 medium">Ibu. {{$undangan->bride_mother}}</h3>
          </div>

        </div>
      </div>
    </div>

    <div class="color-white display-center flex-column align-center">
      <img data-aos="fade-up" class="mlr-auto py-40" src="{{ asset('/concept1/svg/ornament.svg') }}" alt="" />
      <h1 data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out" class="font-18 large text-center">Rangkaian Acara</h1>
      <div data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out" class="img-ellipse-1">
        <img src="{{ asset('/concept1/svg/handshake.svg') }}" alt="" />
      </div>
      <img class="position-absolute start-0" src="{{ asset('/concept1/png/ornamentkiri1.png') }}" alt="">
      <div class="w-327 mt-24 text-center mlr-auto">
        <h1 data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out" class="font-18 large">Akad Nikah</h1>
        <div class="font-14 regular mt-16 flex flex-column gap-6">
          <p data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out">{{$akadDay}}, {{$akadDate}} {{ date('H:i', strtotime($undangan->akad_time)) }} </p>
          <p data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out" class="">
            {{$undangan->alamatAkad}} <br>
            {{ $undangan->alamatAkadLengkap }}
          </p>
        </div>
        <a data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out" class="btn-submit text-decoration-none font-14 medium mlr-auto" role="button">Open on Maps</a>
      </div>
      <div data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out" class="img-ellipse-1">
        <img src="{{ asset('/concept1/svg/resepsi.svg') }}" alt="" />
      </div>
      <div class="w-327 text-center mlr-auto">
        <h1 data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out" class="font-18 large">Resepsi Pernikahan</h1>
        <div class="font-14 regular mt-16 flex flex-column gap-6">
          <p data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out">{{ $receptionDay }}, {{$receptionDate}} {{ date('H:i', strtotime($undangan->resepsi_time)) }}</p>
          <p data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out" class="">
            {{ $undangan->alamatResepsi }} <br />
            {{ $undangan->alamatResepsiLengkap }}
          </p>
        </div>
        <a href="https://www.google.com/maps/search/?api=1&query={{ $undangan->akad_lat }},{{ $undangan->akad_lng }}" target="_blank" data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="btn-submit text-decoration-none font-14 medium" role="button">Open on Maps</a>
      </div>
      <!-- Story -->
      <div class="pt-105 display-center flex-column ">
        <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="display-center align-center flex-column mb-24">
          <img class="position-absolute orleft-2" src="{{ asset('concept1/svg/orleft-2.svg') }}" alt="">
          <img src="{{ asset('concept1/svg/storyheader.svg') }}" alt="">
          <p class="font-18 large mb-0 mt-24">Our Story Begin</p>
          <p class="font-14 regular">Cerita bagaimana kami dipertemukan</p>
        </div>

        @foreach($stories as $key=>$story)
        <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="display-center flex-column align-center mt-32">
          <img class="{{ isset($story->image_story) ? 'img-story ' : 'icon-story' }}" src="{{ isset($story->image_story) ? url('storage/' . $story->image_story) : asset('/concept1i/svg/story'. $key+1 .'.svg')  }}" alt="">
          <h1 class="font-18 large mt-16">{{ $story->title_story }}</h1>
          <p class="w-327 font-14 regular text-center mt-8">
            {{ $story->description_story }}
          </p>
        </div>
        @endforeach
      </div>
      <!-- Story end -->

      <!-- gallery -->
      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="wrapper mt-97">
        <h1 class="font-18 large">Gallery</h1>
        <!-- <div class="boxes mt-31">
          <div class="slider">
            @foreach($images as $key=>$image)
            <input checked="checked" id="{{ $key+1 }}" name="ani" type="radio">
            <label class="limage d-flex" for="{{ $key+1 }}"><img src="{{ $image->images ?? '' }}" width="70" height="70" style="object-fit: cover;"></label>
            <img class="img-gallery" src="{{ $image->images ?? '' }}">
            @endforeach
          </div>
        </div> -->


        <div class="swiper swiper_main mt-31" style="width:375px;height:580px;">
          <div class="swiper-wrapper">
            @foreach($images as $key=>$image)
            <div class="swiper-slide"><img src=" {{ $image->images ?? '' }}" alt=""></div>
            @endforeach
          </div>
          <div class="swiper-button-prev" hidden></div>
          <div class="swiper-button-next" hidden></div>
        </div>

        <div class="swiper swiper_thumbnail mt-3" style="width:375px; height:100px;">
          <div class="swiper-wrapper">
            @foreach($images as $key=>$image)
            <div class="swiper-slide"><img src="{{ $image->images ?? '' }}" alt=""></div>
            @endforeach
          </div>
        </div>

      </div>

      <div class="message mt-120">
        <div class="message-title color-white text-center">
          <h1 data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="font-18 medium">Kirim Ucapan</h1>
          <p data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="font-14 regular color-opacity">
            Rangkaian kata kata untuk kami yang Sedang berbagahia
          </p>
        </div>
        <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="message-box mlr-auto" id="ucapan-box">
          @foreach($ucapans as $ucapan)
          <div class="bubble">
            <h1 class="bubble-title">{{ $ucapan->guest_name }}</h1>
            <hr width="100%" style="background: #aaa; margin: 0px;" />
            <p class="bubble-isi">{{ $ucapan->ucapan }}</p>
          </div>
          @endforeach
        </div>

        <button data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="btn-ucapan mlr-auto" data-bs-toggle="modal" data-bs-target="#myModal">
          <img height="24px" src="{{ asset('concept1/svg/comment.svg') }}" alt="" />
          <h1 class="font-18 medium color-white m-0">Tuliskan Ucapanmu</h1>
        </button>

      </div>
      <div data-aos="zoom-in" data-aos-duration="600" data-aos-easing="ease-in-out" class="mt-120">
        <div class="box-327 mlr-auto mt-16 text-center">


          <p class="font-14 regular text-italic color-white">
            “ Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan
            pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung
            dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa
            kasih dan sayang."
          </p>
          <h4 class="font-16 medium color-white mt-20">QS Ar-rum 21</h4>
          <p class="font-14 regular color-white mt-31">
            Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila
            Bapak/ibu/ Saudara/i berkenan hadir untuk memberikan do’a restu
            kepada kedua mempelai.
          </p>
          <h1 class="font-46 regular married-birth color-white mt-80">
            {{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}
          </h1>
          <p class="font-11 regular color-white mt-80">
            Himbauan Protocol Kesehatan :
          </p>
          <div class="display-center mt-16">
            <img class="img-ellipse-36-white" src="{{ asset('/concept1/svg/clean-hand.svg') }}" alt="" />
            <img class="img-ellipse-36-white" src="{{ asset('/concept1/svg/face-mask.svg') }}" alt="" />
            <img class="img-ellipse-36-white" src="{{ asset('/concept1/svg/distance.svg') }}" alt="" />
          </div>
        </div>
        <div class="mt-31 mb-38 display-center flex-column color-white text-center">
          <p class="font-14">Website invitation by</p>
          <div class="">
            <img src="{{ asset('/concept1/svg/Brandmark.svg') }}" alt="" />
            <img class="" src="{{ asset('/concept1/svg/Logo.svg') }}" alt="" />
          </div>
        </div>
      </div>

      <div class="relative w-100">
        <img src="{{ asset('/concept1/svg/or-footer.svg') }}" alt="">
        <img class="or-footerr" src="{{ asset('/concept1/svg/or-footerr.svg') }}" alt="">
      </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="text-center modal-title" id="exampleModalLabel">Tulis Ucapan</h5>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          </div>
          <div class="modal-body">
            <form data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
              @csrf
              <div class="mb-3">
                <label for="guest_name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="guest_name" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="exampleFormControlTextarea1">Ucapan</label>
                <textarea class="form-control" name="ucapan" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>

              <div class="mb-3">
                <select class="form-select my-4" name="konfirmasi" aria-label="Default select example">
                  <option selected value="4">Konfirmasi Kehadiran</option>
                  <option value="1">Hadir</option>
                  <option value="0">Tidak Hadir</option>
                </select>
                <input data-aos="fade-up" data-aos-duration="700" data-aos-easing="ease-in-out" type="hidden" name="slug" value="{{$undangan->slug}}">
                <div>
                </div>
                <button type="submit" class="btn btn-modal" onclick="hide()">💌 Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

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
        $(document).ajaxSend(function() {
          $("#loaderDiv").show();
        });

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
              console.info("sudah");
              $('#myModal').modal('hide');
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
      // showSlides();
      let slideIndex = 1;
      kau();

      // const myTimeout = setTimeout(kau, 1000);

      function kau() {
        // if (slideIndex > 0) {
        //   let kota = slideIndex - 1;
        //   document.getElementById(kota).checked = false;
        // }
        console.log("apa")
        if (slideIndex > document.getElementsByName("ani").length) {
          slideIndex = 1
          console.log("id dalam" + slideIndex);
        }
        console.log(slideIndex);
        $('#' + slideIndex)[0].checked = true;
        slideIndex++;
        console.log(document.getElementById("1").value);

        setTimeout(kau, 4000);
      }

      // function showSlides() {
      //   let i;
      //   let slideIndex = 0;
      //   slideIndex++;
      //   console.log(document.getElementsByName("ani").length);
      //   if (slideIndex > document.getElementsByName("ani").length) {
      //     slideIndex = 1
      //   }
      //   console.log(document.getElementById("id" + slideIndex - 1).checked);
      //   document.getElementById("id" + slideIndex - 1).prop("checked", true);

      // }
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