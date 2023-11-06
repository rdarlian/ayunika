<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ayunika</title>
  <link rel="stylesheet" href="assets/css/style.css" />
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div id="navbarkuh" class="sticky-top">
    @include('layouts.navbar')
  </div>

  @yield('content')

  <div class="py-80 bg-brown-100 mt-104">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-4 px-4">
          <img src="assets/svg/Company logo.svg" alt="" />
          <p class="font-16 fw-light pb-lg-4 mt-4">
            Platform undangan pernikahan digital untuk membantu mewujudkan
            momen spesialmu.
          </p>
          <div class="d-flex gap-2 mt-4">
            <img src="assets/svg/mappin.svg" alt="" />
            <p class="p-none">Jl. Kaliurang km 11, Sleman, Yogyakarta</p>
          </div>
          <div class="d-flex gap-2 pt-16">
            <img src="assets/svg/walogo.svg" alt="" />
            <p class="p-none">0878 1234 5678</p>
          </div>
        </div>

        <div class="col-lg-4"></div>
        <div class="col-6 col-lg-2 gap-0 px-4 mt-5 mt-lg-0">
          <p class="font-18 fw-semibold">Produk</p>
          <p class="font-16 fw-normal">Template</p>
          <p class="font-16 fw-normal">Fitur</p>
          <p class="font-16 fw-normal">Harga</p>
          <p class="font-16 fw-normal">Blogs</p>
        </div>
        <div class="col-6 col-lg-2 gap-0 px-4 mt-5 mt-lg-0">
          <p class="font-18 fw-semibold">Pusat Bantuan</p>
          <p class="font-16 fw-normal">Kebijakan Privasi</p>
          <p class="font-16 fw-normal">Syarat dan Ketentuan</p>
          <p class="font-16 fw-normal">Hubungi Kami</p>
        </div>
      </div>
      <hr class="w-100 border-2" />
      <div class="d-flex justify-content-center text-center justify-content-lg-between flex-column-reverse flex-lg-column">
        <p>©Ayunika All Rights Reserved 2023</p>
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path d="M29.3334 16.405C29.3334 8.99625 23.3639 2.99023 16 2.99023C8.63622 2.99023 2.66669 8.99625 2.66669 16.405C2.66669 23.1006 7.54247 28.6505 13.9167 29.6569V20.2828H10.5313V16.405H13.9167V13.4496C13.9167 10.0875 15.9074 8.23039 18.9528 8.23039C20.4118 8.23039 21.9375 8.49241 21.9375 8.49241V11.7937H20.2563C18.6 11.7937 18.0834 12.8279 18.0834 13.8888V16.405H21.7812L21.1902 20.2828H18.0834V29.6569C24.4576 28.6505 29.3334 23.1009 29.3334 16.405Z" fill="#302323" />
          </svg>
          <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
              <path class="svglink" fill-rule="evenodd" clip-rule="evenodd" d="M21.3333 4.32324H10.6667C6.98477 4.32324 4 7.30802 4 10.9899V21.6566C4 25.3384 6.98477 28.3232 10.6667 28.3232H21.3333C25.0152 28.3232 28 25.3384 28 21.6566V10.9899C28 7.30802 25.0152 4.32324 21.3333 4.32324ZM25.6667 21.6566C25.6593 24.0467 23.7235 25.9826 21.3333 25.9899H10.6667C8.27647 25.9826 6.34065 24.0467 6.33333 21.6566V10.9899C6.34065 8.59971 8.27647 6.6639 10.6667 6.65658H21.3333C23.7235 6.6639 25.6593 8.59971 25.6667 10.9899V21.6566ZM22.3333 11.3232C23.0697 11.3232 23.6667 10.7263 23.6667 9.98991C23.6667 9.25354 23.0697 8.65658 22.3333 8.65658C21.5969 8.65658 21 9.25354 21 9.98991C21 10.7263 21.5969 11.3232 22.3333 11.3232ZM16 10.3232C12.6863 10.3232 10 13.0095 10 16.3232C10 19.637 12.6863 22.3232 16 22.3232C19.3137 22.3232 22 19.637 22 16.3232C22.0036 14.7308 21.3725 13.2027 20.2465 12.0767C19.1205 10.9507 17.5924 10.3197 16 10.3232ZM12.3333 16.3232C12.3333 18.3483 13.9749 19.9899 16 19.9899C18.0251 19.9899 19.6667 18.3483 19.6667 16.3232C19.6667 14.2982 18.0251 12.6566 16 12.6566C13.9749 12.6566 12.3333 14.2982 12.3333 16.3232Z" fill="#302323" />
            </svg>
          </a>

          <img class="" src="assets/svg/socialmedia/twitter.svg" alt="" />
        </div>
      </div>
    </div>
  </div>
  <script type="module">
    window.addEventListener('hashchange', function() {
      document.querySelector('.active').classList.remove('active');
      document.querySelector('[href="/' + window.location.hash + '"]').classList.add('active');
    });
    $(function() {
      $(document).scroll(function() {
        var $nav = $("#navbarkuh");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
      });
    });
  </script>

</body>


</html>