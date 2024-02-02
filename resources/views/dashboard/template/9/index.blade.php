<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $slug }}</title>
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept13.css') }}" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
  <div id="main" class="main-container married-pop">
    <div>
      <img class="img-cover-13" src="{{$coverImage[0]->images ?? ''}}" alt="cover" />
      <div class="py-48 text-center">
        <p class="font-16 regular">We are getting Married</p>
        <h1 class="font-42 xsmall">Adin <span class="regular">& Lisa</span></h1>
        <p class="font-12 medium">Sunday, 32 February 2023</p>

        <img class="mt-20" src="{{ asset('/concept13/svg/swipe-up.svg') }}" alt="">
        <p class="font-16 medium">Swipe Up</p>
      </div>
    </div>

    <div class="py-60 scope-24 display-center flex-column align-center">
      <div class="mlr-auto married-jakarta">
        <h1 class="font-42 small lineletter">Pernikahan</h1>
        <p class="font-16 small color-opacity mt-16">
          Dengan memohon rahmat dan ridho Allah SWT, Mohon doa restu Bapak/Ibu/Saudara/I dalam rangka melangsungkan pernikahan
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
    </div>

    <div class="py-40 scope-24 display-center flex-column">
      <div class="mlr-auto text-center">
        <p class="font-18 large">Ringkasan</p>
        <h1 class="font-14 regular">Serangkaian acara kami nantinya</h1>
      </div>

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

      <div class="mt-24 text-center">
        <p class="font-18 large">
          Akad & Resepsi Pernikahan
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
      <h1 class="font-32 text-center">Our Love Story</h1>
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

  </div>

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