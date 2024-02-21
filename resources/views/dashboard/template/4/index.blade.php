<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/concept11.css') }}" />
</head>

<body class="slate-900">
  <div class="cover-container mt-16 mb-16" id="cover">
    <div class="cover-main-11 married-pop">
      <div class="text-left">
        <img class="img-11" src="{{$groomImage[0]->images ?? ''}}" alt="" />
        <img class="img-11" src="{{$brideImage[0]->images ?? ''}}" alt="" />
      </div>
      <p class="font-16 small">We are getting Married</p>
      <h1 class="font-52 xlarge">{{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}</h1>
      <div>
        <hr class="hrcover" />
        @if($undangan->timetitle == 1)
        <h3 class="font-16 large"> {{$receptionDay}}, {{$receptionDate}}</h3>
        @else
        <h3 class="font-16 large"> {{$akadDay}}, {{$akadDate}}</h3>
        @endif
        <p class="font-12 regular"> {{$undangan->alamatResepsi}}</p>
      </div>
    </div>
    <div class="cover-main-blue married-pop color-white mt-8">
      <div class="flex spacebetween color color-opacity p16">
        <p class="font-10 small">Wedding</p>
        <p class="font-10 small">2024</p>
      </div>
      <div class="p16">
        <p class="font-16 small text-italic">Dear</p>
        @if(request()->filled('r'))
        <h1 class="font-32 xlarge">{{ request()->r }}</h1>
        @endif

        <hr class="color-white" />
        <p class="mt-10 font-14 regular color-opacity">
          You are officialy invited to our wedding
        </p>
        <div class="mt-24 flex spacebetween">
          <button id="hideButton" onclick="hide()" class="btn-outer-cover font-14 regular">
            Open Invitation
          </button>
        </div>
      </div>
    </div>
  </div>

  <div id="main" class="main-container slate-900 hidden">
    <div class="second-cover married-pop">
      <div class="cover-left">
        <img class="img-11" src="{{$groomImage[0]->images ?? ''}}" alt="" />
        <img class="img-11" src="{{$brideImage[0]->images ?? ''}}" alt="" />
        <div class="box-209 color-white">
          <h1 class="font-36 xlarge">{{ $undangan->groom_nickname}} & {{ $undangan->bride_nickname}}</h1>
          <hr />
          <div>
            @if($undangan->timetitle == 1)
            <h3 class="font-16 large"> {{$receptionDay}}, {{$receptionDate}}</h3>
            <p class="font-12 regular">{{$undangan->alamatResepsi}}</p>
            @else
            <h3 class="font-16 large"> {{$akadDay}}, {{$akadDate}}</h3>
            <p class="font-12 regular">{{$undangan->alamatAkad}}</p>
            @endif
          </div>
        </div>
      </div>

      <div class="cover-11">
        <div class="box-orange">
          <p class="font-16 small">We are getting</p>
          <h1 class="font-46 xlarge">Married</h1>
        </div>
        <div class="box-border">
          <hr class="hrblue" />
          <div>
            <img src="assets/concept11/svg/rightarrow.svg" alt="" />
            <div class="lineheight-11">
              <p class="font-16 small color-white">Get</p>
              <h1 class="font-26 xlarge color-white">RSVP</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="display-center mt-16">
        <img class="img-cover-11" src="{{$coverImage[0]->images ?? ''}}" alt="" />
      </div>
    </div>
    <div class="local-box">
      <div class="mt-6 mlr-auto pt-30 pb-16 bg-white br-24 married-pop">
        <div class="">
          <h2 class="local-box font-18 medium">بِسْمِ اللّهِ الرَّحْمَنِ الرَّحِيْ</h2>
          <h3 class="local-box font-18 large mt-10 mb-38">
            Assalamu’allaikum Warrahmatullahi Wabarrakatuh
          </h3>
          <div class="w-303 mb-38 cover-left">
            <hr class="color-opacity" />
            <p class="font-14 regular color-grey mt-16">
              Dengan memohon
              <span class="large text-underline color-black">Rahmat</span> dan
              <span class="large text-underline color-black">Ridho</span>
              <span class="large color-black">Allah</span>
              SWT, Mohon
              <span class="large color-black">Doa restu</span> Bapak/Ibu/ <br />
              Saudara/I dalam rangka melangsungkan
              <span class="large color-black">Pernikahan </span>Putra-Putri kami
              :
            </p>
          </div>
        </div>
        <div class="display-center flex-column">
          <div class="local-box person mlr-auto">
            <div class="border-24-black">
              <img src="{{ asset('/concept11/svg/rightarrowblack.svg') }}" alt="" />
              <div class="w-165">
                <h1 class="font-18 large">{{$undangan->groom_name}}</h1>
                <p class="font-12 regular">
                  Putra {{ $undangan->groom_child_order }} dari <br />{{$undangan->groom_father}} & <br />{{$undangan->groom_mother}}
                </p>
              </div>
            </div>
            <img class="img-mempelai" src="{{$groomImage[0]->images ?? ''}}" alt="" />
          </div>
          <div class="person local-box">
            <img class="img-mempelai" src="{{$brideImage[0]->images ?? ''}}" alt="" />
            <div class="border-24-black">
              <img src="{{ asset('/concept11/svg/rightarrowblack.svg') }}" alt="" />
              <div class="w-165">
                <h1 class="font-18 large">{{$undangan->bride_name}}</h1>
                <p class="font-12 regular">
                  Putri {{ $undangan->bride_child_order }} dari <br /> {{$undangan->bride_father}} & <br />{{$undangan->bride_mother}}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="ringkasan-acara" class="local-box mt-6">
      <div class="border-header11 color-white mlr-auto married-pop">
        <h1 class="font-18 large w-327 text-center">Ringkasan Acara</h1>
        <p class="font-14 regular">Serangkaian acara kami nantinya</p>
      </div>
    </div>
    <div class="local-box">
      <div class="box-orange-2 married-pop">
        <div class="box-header-orange">
          <a href="#" class="a-border font-14 regular">Gmaps Ready</a>
          <a href=""><img src="{{ asset('/concept11/svg/rightarrowblack.svg') }}" alt="" /></a>
        </div>
        <div>
          <h3 class="font-14 large">Akad Nikah</h3>
          <h1 class="title-place">{{ $undangan->alamatAkad }}</h1>
          <p class="font-14 regular"> {{$akadDay}}, {{$akadDate}} - {{ date('H:i', strtotime($undangan->akad_time)) }}</p>
        </div>
      </div>
      <div class="box-blue-2 married-pop color-white">
        <div class="box-header-orange">
          <a href="#" class="a-border-2 font-14 regular">Gmaps Ready</a>
          <a href=""><img src="{{ asset('/concept11/svg/rightarrow.svg') }}" alt="" /></a>
        </div>
        <div>
          <h3 class="font-14 large">Resepsi Pernikahan</h3>
          <h1 class="title-place">{{ $undangan->alamatResepsi }}</h1>
          <p class="font-14 regular">{{ $receptionDay }}, {{$receptionDate}} - {{ date('H:i', strtotime($undangan->resepsi_time)) }}</p>
        </div>
      </div>
      <div class="display-center flex-column mt-6">
        <div class="border-header11 color-white mlr-auto married-pop">
          <h1 class="font-18 large w-327 text-center">Our Story Begin</h1>
          <p class="font-14 regular">Cerita bagaimana kami dipertemukan</p>
        </div>
        @foreach($stories as $key=>$story)
        <div class="display-center married-pop gap-6 mt-6 story-11">
          <div class="mempelaiputih">
            <h1 class="font-16 large">{{ $story->tgl_story }}</h1>
            <p class="text-story">
              {{ $story->description_story }}
            </p>
          </div>
          <img class="img-mempelai-11" src="{{ isset($story->image_story) ? url('storage/' . $story->image_story) : ''  }}" alt="" />
        </div>
        <div class="space-border mlr-auto mt-6"></div>
        @endforeach

      </div>
    </div>


    <div class="display-center mt-6 married-pop flex-column scope-16">
      <div class="border-header11 color-white mlr-auto married-pop">
        <h1 class="font-18 large w-327 text-center">Kirim Ucapan</h1>
        <p class="font-14 regular text-center w-327 color-opacity">
          Rangkaian kata kata untuk kami yang Sedang berbagahia
        </p>
      </div>
      @foreach($ucapans as $ucapan)
      <div class="box-3 bg-box-blue">
        <p class="font-14 small">Doa Dari</p>
        <h1 class="font-32 xlarge">{{ $ucapan->guest_name }}</h1>
        <p class="font-14 regular">
          {{$ucapan->ucapan}}
        </p>
      </div>
      @endforeach
      <div class="border-box-11 mlr-auto mt-6">
        <div class="married-pop color-white text-center">
          <h1 class="font-18">Tulis Ucapanmu</h1>

          <form data-action="{{ route('ucapan.store') }}" method="POST" enctype="multipart/form-data" id="add-user-form">
            @csrf
            <div class="box-form married-jakarta font-11 large">
              <div class="form-grup">
                <label for="name" class="">Nama</label>
                <input class="formku" type="text" placeholder="" />
              </div>
              <div class="form-grup select-grup">
                <label for="konfirmasi" class="">Konfirmasi</label>
                <select class="form-select formku" name="konfirmasi" id="">
                  <option value="1">Hadir</option>
                  <option value="0">Tidak Hadir</option>
                </select>
              </div>

              <div class="form-grup">
                <label for="ucapan" class="">Ucapan</label>
                <textarea class="formku"></textarea>
              </div>
            </div>
            <button type="submit" class="btn-orange married-pop font-18 medium mt-24">
              Submit Ucapan
            </button>
          </form>
        </div>
      </div>
    </div>



    <div class="scope-16">
      <div class="box-close bg-box-white married-pop">
        <div>
          <hr class="mt-70 color-opacity" />
          <p class="font-14 regular">
            Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila
            Bapak/ibu/
            Saudara/i berkenan hadir untuk memberikan do’a restu kepada kedua
            mempelai.
          </p>
          <h1 class="font-36 xlarge mt-24 mb-30">Adin & Lisa</h1>
        </div>
      </div>
    </div>

    <div class="display-center married-pop mt-10 gap-6 mb-70 scope-16">
      <div class="set-border11 bg-box-orange pl-16">
        <div class="flex">
          <img class="img-ellipse-36-normal" src="{{ asset('/concept12/svg/hand-wash-black.svg') }}" alt="" />
          <img class="img-ellipse-36-normal" src="{{ asset('/concept12/svg/face-mask-black.svg') }}" alt="" />
          <img class="img-ellipse-36-normal" src="{{ asset('/concept12/svg/social-distance-black.svg') }}" alt="" />
        </div>
        <p class="font-16 small">Himbauan Protokol</p>
        <h1 class="font-32 xlarge">Kesehatan</h1>
      </div>
      <div class="border-last">
        <p class="font-12 regular color-white mb-14">Powered by</p>
        <img src="{{ asset('/concept11/svg/logo.svg') }}" alt="" />
        <img class="" src="{{ asset('/concept11/svg/name.svg') }}" alt="" />
      </div>
    </div>
  </div>
  <script>
    function hide() {
      document.getElementById("cover").style.display = "none";
      document.getElementById("main").classList.remove("hidden");
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