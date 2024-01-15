<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ayunika') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">

    <!-- Icon Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Trix editor for News -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Maps -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/croppie@2.6.3/croppie.css">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    .btn-white {
        border-radius: 8px;
        border: 1px solid #D0D5DD;
        background: #FFF;
        display: flex;
        /* Shadow/xs */
        box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
        padding: 8px 16px;
        justify-content: center;
        align-items: center;
        color: black !important;
    }

    .btn-black {
        border-radius: 8px;
        border: 1px solid #292628;
        background: #292628;
        display: flex;
        /* Shadow/xs */
        box-shadow: 0px 1px 2px 0px rgba(16, 24, 40, 0.05);
        padding: 8px 16px;
        justify-content: center;
        align-items: center;
        gap: 8px;
        color: white !important;
    }

    .title {
        color: #344054;
        font-size: 20px;
        font-family: 'Inter', sans-serif;
        font-style: normal;
        font-weight: 500;
        line-height: 20px;
        /* 100% */
    }

    .subtitle {
        color: #667085;

        /* Text sm/Regular */
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        /* 142.857% */
    }

    /* .btn-black img{
        top: 50%;
        transform: translate(-50%);
    } */
    input::placeholder {
        color: #acacac !important;


        /* Text md/Regular */
        font-family: 'Inter', sans-serif;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        /* 150% */
    }

    .line {
        display: block;
        height: 1px;
        border: 0;
        border-top: 1px solid #AAA;
        margin: 1em 0;
        padding: 0;
    }

    .dropzone {
        border-radius: 8px;
        border: 1px dashed #EAECF0;
        background: #FFF;
    }

    .dz-icon {
        border-radius: 99990px;
        border: 5.714px solid #FFECF5;
        background: #FFECF5;
        padding: 10px;
        width: 20px;
        height: 20px;
        display: inline-table
    }

    .dz-icon img {
        width: 30px;
        height: 30px;
    }

    .bolded {
        color: #292628;
        cursor: pointer !important;
        /* Text sm/Semibold */
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: 20px;
        /* 142.857% */
    }

    .normalized {
        color: #667085;

        /* Text sm/Regular */
        font-family: Inter;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        /* 142.857% */
    }

    .second-text {
        color: #667085;
        text-align: center;

        /* Text xs/Regular */
        font-family: Inter;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 18px;
        /* 150% */
    }

    a {
        text-decoration: none
    }

    .btn-black a:hover {
        color: white;
    }

    .dz-image img {
        width: 100%;
        scale: 1.8
    }

    .dropzone.dz-clickable {
        cursor: pointer;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    .dropzone.dz-clickable .dz-message {
        cursor: default;
    }

    .dropzone.dz-clickable .dz-message * {
        cursor: default;
    }

    .dz-details {
        display: none;
    }

    /*
    #dzGroomImage .dz-complete:not(.dz-processing){
        display: none;
    } */
    #top {
        /* background: black; */
        width: 100vw;
        height: 20px;
        position: fixed;
        top: 0;
        z-index: 999999;
    }

    .form-check {
        position: absolute;
        top: 10px;
        z-index: 9999;
        right: 10px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 48px;
        height: 24px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }


    /* .dz-remove{
            display: none!important;
        } */
</style>

<body>
    <div id="app" class="wrapper">
        @include('dashboard.layouts.sidebar')
        <div class="main">
            <nav class="navbar navbar-light bg-white shadow-sm" id="navbar_top">
                <div class="container-fluid">
                    <button class="btn" type="button" id="toggler">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="tambahan">

            </div>

            <main class="content" id="mainnih">
                <div class="container-fluid overflow-scroll">
                    <div class="mb-3">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>

    </div>
    <!-- navbar collapse -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- Look Password -->
    <script>
        function myFunction() {
            let x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <!-- Change from admin to user in create user -->
    <script type="module">
        $("#role").change(function() {
            let selectId = $(this).attr("id");
            let selectedText = $(this).find('option:selected').text();
            let valSelect = $(this).find('option:selected').val();

            console.log(selectId);
            console.log(selectedText);
            console.log(valSelect);
            if (valSelect == 1) {
                $("#showRole").css('display', 'none');
                $("#slug").attr('hidden', true);
                $("#slugin").val('preview');
                $("#theme").attr('required', false);
                $("#periodSelect").attr('required', false);
                $("#selectTier").attr('required', false);
            } else {
                $("#showRole").css('display', 'block');
                $("#slug").attr('hidden', false);
                $("#slugin").attr('hidden', false);
                $("#theme").attr('required', true);
                $("#periodSelect").attr('required', true);
                $("#selectTier").attr('required', true);
            }
        });
    </script>
    <!-- Edit user by checklist period -->
    <script type="module">
        $(function() {
            enable_cb();
            $("#validPeriod").click(enable_cb);
        });

        function enable_cb() {
            if ($('#validPeriod').prop('checked')) {
                $("#periodEdit").removeAttr("disabled");
                $("#periodEdit2").removeAttr("disabled");

            } else {
                $("#periodEdit").attr("disabled", true);
                $("#periodEdit2").attr("disabled", true);
            }
        }
        // $(function() {
        //     deleteUser();
        //     $("#deleteusr").click(deleteUser);
        // });
        let burger = false;
        let mobile = false
        let sidebar_width = document.querySelector('#sidebar').offsetWidth;
        $("#toggler").on("click", function() {
            this.addEventListener('touchend', function(e) {
                mobile = true;
                console.log("Mobile " + mobile)
            }, false);

            if (burger == false) {
                burger = true
                console.log("true")
                document.getElementById('mainnih').style.paddingLeft = 0;
                document.getElementById('toggler').style.paddingLeft = 0;
            } else {
                burger = false
                console.log("false")
                if (window.scrollY != 0) {
                    if (mobile == false) {
                        document.getElementById('mainnih').style.paddingLeft = sidebar_width + 'px';
                    }
                    document.getElementById('toggler').style.paddingLeft = sidebar_width + 'px';
                }
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 0.5) {
                    document.getElementById('navbar_top').classList.add('fixed-top');
                    document.getElementById('sidebar').classList.add('fixed-top');

                    if (burger == false) {
                        if (mobile == false) {
                            document.getElementById('mainnih').style.paddingLeft = sidebar_width + 'px';
                        }

                        document.getElementById('toggler').style.paddingLeft = sidebar_width + 'px';
                    }

                } else {
                    document.getElementById('navbar_top').classList.remove('fixed-top');
                    document.getElementById('sidebar').classList.remove('fixed-top');

                    // remove padding top from body
                    document.getElementById('mainnih').style.paddingLeft = 0;
                    document.getElementById('toggler').style.paddingLeft = 0;
                    // document.body.style.paddingTop = '0';
                }
            });
        });
    </script>


</body>

</html>