<div class="row justify-content-center align-items-start g-2">
  <div class=" col-lg-5">
    <p class="title">Koordinat Resepsi</p>
    <p class="subtitle">Update coordinate</p>
  </div>
  <div class="col-lg-7 column">
    <div class="row py-lg-2">
      <div class="col">
        <label class="label-form" for="a">Koordinat maps</label>
        <input type="text" class="form-control" name="akad_loc" placeholder="Masukkan Koordinat" value="{{$undangans[0]->akad_loc ?? ''}}" id="alamat" aria-label="First name">
      </div>
    </div>
    <input type="hidden" value="{{ $undangans[0]->akad_lat ?? '' }}" id="lat" name="akad_lat">
    <input type="hidden" value="{{ $undangans[0]->akad_lng ?? ''}}" id="lng" name="akad_lng">
    <div class="row mt-3 py-lg-2">
      <div class="col-lg-12" id="map" style="height: 300px;"></div>
    </div>
    <div class="d-flex">
      <button type="button" onclick="getGeocode()" class="btn btn-black">GeoCode</button>
    </div>
  </div>
</div>


@extends('dashboard.layouts.app')

@section('content')
<div class="container d-flex justify-content-between pt-4">
  <div class="row justify-content-center align-items-center g-2" style="width: 100%;">
    <div class=" py-3 py-lg-0 col-lg-6">
      <p class="text">Tambah Data</p>
    </div>
    <div class="py-lg-0 col-lg-6">
      <div class="button d-flex justify-content-lg-end">
        <a class="btn btn-secondary mx-1 align-items-start d-flex" id="preview">
          <span><i class="fa-regular fa-eye"></i></span>
          Preview
        </a>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <hr>
  <form action="{{ route('undangan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
      <div class="row justify-content-center align-items-start g-2">
        <div class=" col-lg-5">
          <p class="title">Informasi Mempelai Wanita</p>
          <p class="subtitle">Update your photo and personal details.</p>
        </div>
        <div class="col-lg-7 column">
          <div class="row  py-lg-2">
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Nama Lengkap Mempelai Wanita</label>
              <input type="text" class="form-control" value="{{$undangans[0]->bride_name ?? '' }}" name="bride_name" placeholder="Nama Mempelai Wanita" aria-label="First name">
            </div>
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Nama Panggilan Mempelai Wanita</label>
              <input type="text" class="form-control" value="{{$undangans[0]->bride_nickname ?? '' }}" name="bride_nickname" placeholder="Nama Panggilan Mempelai Wanita" aria-label="Last name">
            </div>
          </div>

          <div class="row  py-lg-2">
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Nama Ayah Mempelai Wanita</label>
              <input type="text" class="form-control" value="{{$undangans[0]->bride_father ?? '' }}" name="bride_fathername" placeholder="Nama Ayah Mempelai Wanita" aria-label="First name">
            </div>
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Nama Ibu Mempelai Wanita</label>
              <input type="text" class="form-control" value="{{$undangans[0]->bride_mother ?? '' }}" name="bride_mothername" placeholder="Nama Ibu Mempelai Wanita" aria-label="Last name">
            </div>
          </div>
          <div class="row  py-lg-2">
            <div class=" py-3 py-lg-0">
              <label class="label-form" for="a">Asal Mempelai Wanita</label>
              <input type="text" class="form-control" value="{{$undangans[0]->bride_address ?? '' }}" name="bride_address" placeholder="Asal Mempelai Wanita" aria-label="First name">
            </div>
          </div>
          <div class="row  py-lg-2">
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Putri ke</label>
              <input type="text" class="form-control" value="{{$undangans[0]->bride_child_order ?? '' }}" name="bride_child_order" placeholder="Pertama" aria-label="First name">
            </div>
          </div>
          <div class="row py-lg-2">
            <div class=" py-3 py-lg-0">
              <form method="post" action="{{ route('dropzoneFileUpload') }}" enctype="multipart/form-data" class="dropzone" id="someHidden">
                @csrf
              </form>
            </div>
          </div>
          <div class="row py-lg-2">
            <div class=" py-3 py-lg-0">
              <label class="label-form" for="a">Foto Mempelai Wanita</label>
              <form method="POST" action="{{ route('dropzoneFileUpload') }}" enctype="multipart/form-data" class="dropzone" id="dzBrideImage">
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row justify-content-center align-items-start g-2">
        <div class="col-lg-5">
          <p class="title">Informasi Mempelai Pria</p>
          <p class="subtitle">Update your photo and personal details.</p>
        </div>
        <div class="col-lg-7 column">

          <div class="row  py-lg-2">
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Nama Lengkap Mempelai Pria</label>
              <input type="text" class="form-control" value="{{$undangans[0]->groom_name ?? '' }}" name="groom_name" placeholder="Nama Mempelai Pria" aria-label="First name">
            </div>
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Nama Panggilan Mempelai Pria</label>
              <input type="text" class="form-control" value="{{$undangans[0]->groom_nickname ?? '' }}" name="groom_nickname" placeholder="Nama Panggilan Mempelai Pria" aria-label="Last name">
            </div>
          </div>

          <div class="row py-lg-2">
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Nama Ayah Mempelai Pria</label>
              <input type="text" class="form-control" value="{{$undangans[0]->groom_father ?? '' }}" name="groom_fathername" placeholder="Nama Ayah Mempelai Pria" aria-label="First name">
            </div>
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Nama Ibu Mempelai Pria</label>
              <input type="text" class="form-control" value="{{$undangans[0]->groom_mother ?? '' }}" name="groom_mothername" placeholder="Nama Ibu Mempelai Pria" aria-label="Last name">
            </div>
          </div>
          <div class="row py-lg-2">
            <div class=" py-3 py-lg-0">
              <label class="label-form" for="a">Asal Mempelai Pria</label>
              <input type="text" class="form-control" value="{{$undangans[0]->groom_address ?? '' }}" name="groom_address" placeholder="Asal Mempelai Pria" aria-label="First name">
            </div>
          </div>
          <div class="row  py-lg-2">
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Putra Ke</label>
              <input type="text" class="form-control" value="{{$undangans[0]->groom_child_order ?? '' }}" name="groom_child_order" placeholder="Pertama" aria-label="First name">
            </div>
          </div>
          <div class=" py-3 py-lg-0">
            <label class="label-form" for="a">Foto Mempelai Pria</label>
            <form method="post" action="{{ route('dropzoneFileUpload') }}" enctype="multipart/form-data" class="dropzone" id="dzGroomImage">
              @csrf
            </form>
          </div>
        </div>
      </div>

      <hr>
      <div class="row justify-content-center align-items-start g-2">
        <div class="col-lg-5">
          <p class="title">Quote</p>
          <p class="subtitle">Inspire others</p>
        </div>
        <div class="col-lg-7 column">
          <div class="row  py-lg-2">
            <div class=" py-3 py-lg-0 col-12">
              <label class="label-form" for="a">Quote</label>
              <textarea class="form-control" name="quote" id="" cols="30" rows="5">{{$undangans[0]->quote ?? '' }}</textarea>
            </div>
            <div class=" py-3 py-lg-0 col-12">
              <label class="label-form" for="a">Sumber Quote</label>
              <input type="text" class="form-control" value="{{$undangans[0]->quote_source ?? '' }}" name="quote_source">
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row justify-content-center align-items-start g-2">
        <div class="col-lg-5">
          <p class="title">Kisah Cinta</p>
          <p class="subtitle">Tell us the story of you meet (Max 10 Stories)</p>
        </div>
        <div class="col-lg-7 column">
          <div class="loveStoryClass" id="loveStoryClass">
            @if (!$stories->isEmpty())
            @foreach ($stories as $story)
            <div class="mb-4 form-group row">
              <label class="label-form" for="a">{{ "Tanggal Story" .$loop->index+1 }}</label>
              <div class="col-6">
                <input type="date" class="form-control @error('tgl_story') is-invalid @enderror" id="tgl_story" name="tgl_stories[]" autocomplete="off" value="{{ $story->tgl_story }}">
              </div>
              <label class="label-form mt-2" for="a">{{ "Judul Kisah Cinta " .$loop->index+1 }}</label>
              <div class="col-12">
                <input type="text" class="form-control @error('title_story') is-invalid @enderror" id="title_story" name="title_stories[]" autocomplete="off" value="{{ $story->title_story }}">
              </div>

              <label class="label-form mt-2" for="a">{{"Kisah Cinta ".$loop->index+1 }}</label>
              <div class="col-12">
                <textarea name="description_stories[]" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $story->description_story }}</textarea>
              </div>

            </div>

            @endforeach
            @endif
          </div>
          <div class="text-center d-flex align-items-center justify-content-center pt-4 pb-5" id="add_story">
            <button type="button" class="btn-white mx-2" onclick="maFunction()">Tambah Cerita</button>
            @if (!$stories->isEmpty())
            <button type="button" class="btn-black mx-2" id="del" onclick="maFunctionDel('{{ $story->id }}')">Hapus
              Cerita</button>
            @endif
          </div>
        </div>
      </div>
      <hr>
      <div class="row justify-content-center align-items-start g-2">
        <div class=" col-lg-5">
          <p class="title">Detail Event</p>
          <p class="subtitle">Update your event details.</p>
        </div>
        <div class="col-lg-7 column">
          <div class="row py-lg-2 mt-4">
            <div class=" py-3 py-lg-0 col-lg-1 align-self-center">
              <h5 class="fw-bold">Tanggal</h5>
            </div>
            <div class="col-lg-11">
              <hr>
            </div>
          </div>
          <div class="row py-lg-2">
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Tanggal Akad</label>
              <input type="date" class="form-control" value="{{$undangans[0]->akad_date ?? '' }}" name="akad_date" id="akad_date">
            </div>
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Waktu Akad</label>
              <input type="time" class="form-control" value="{{$undangans[0]->akad_time ?? '' }}" name="akad_time">
            </div>
          </div>
          <div class="row py-lg-2 d-flex">
            <div class="col d-flex">
              <label class="switch">
                <input id="tglSwitch" type="checkbox" name="timetitle" value="0" {{ $undangans[0]->timetitle == 0 ? 'checked' : '' }}>
                <span class="slider round"></span>
              </label>
              <p class="text-secondary ms-2">Gunakan sebagai tanggal di cover</p>
            </div>
          </div>
          <div class="row py-lg-2">
            <div class=" py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Tanggal Resepsi</label>
              <input type="date" class="form-control" value="{{$undangans[0]->resepsi_date ?? '' }}" name="resepsi_date" id="resepsi_date">
            </div>
            <div class="py-3 py-lg-0 col-lg-6">
              <label class="label-form" for="a">Waktu Respepsi</label>
              <input type="time" class="form-control" value="{{$undangans[0]->resepsi_time ?? '' }}" name="resepsi_time">
            </div>
          </div>
          <div class="row py-lg-2 d-flex">
            <div class="col d-flex">
              <label class="switch">
                <input id="tglSwitch2" type="checkbox" name="timetitle" value="1" {{ $undangans[0]->timetitle == 1 ? 'checked' : '' }}>
                <span class="slider round"></span>
              </label>
              <p class="text-secondary ms-2">Gunakan sebagai tanggal di cover</p>
            </div>
          </div>
          <div class="row py-lg-2 mt-5">
            <div class="col-lg-1">
              <h5 class="fw-bold">Alamat</h5>
            </div>
            <div class="col-lg-11">
              <hr>
            </div>

          </div>


          <div class="row py-lg-2">
            <div class="col">
              <label class="form-label" for="alamatAkad">Alamat Akad</label>
              <input class="form-control" type="text" placeholder="Judul alamat" aria-label="default input example" name="alamatAkad" id="alamatAkad" value="{{$undangans[0]->alamatAkad ?? '' }}">
              <textarea class="form-control mt-2" id="alamatlengkapA" rows="3" name="alamatAkadLengkap" id="alamatLengkapA"><?php echo htmlspecialchars($undangans[0]->alamatAkadLengkap ?? '') ?></textarea>
            </div>
          </div>
          <div class="row py-lg-2">
            <div class="col">
              <input class="form-check-input" id="validAlamat" type="checkbox" value="1" name="isSameAddress">
              <label class="form-check-label text-secondary" for="invalidCheck">
                Gunakan sebagai alamat resepsi juga
              </label>

            </div>
          </div>
          <div class="row py-lg-2">
            <div class="col">
              <label class="form-label" for="alamatResepsi">Alamat Resepsi</label>
              <input class="form-control" type="text" id="alamatResepsi" placeholder="Judul alamat" aria-label="default input example" name="alamatResepsi" disabled value="{{$undangans[0]->alamatResepsi ?? '' }}">
              <textarea class="form-control mt-2" id="alamatLengkapR" rows="3" name="alamatResepsiLengkap" disabled><?php echo htmlspecialchars($undangans[0]->alamatResepsiLengkap ?? '') ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <hr>
      <div class="row justify-content-center align-items-start g-2">
        <div class=" col-lg-5">
          <p class="title">Koordinat Resepsi</p>
          <p class="subtitle">Update coordinate</p>
        </div>
        <div class="col-lg-7 column">
          <div class="row py-lg-2">
            <div class="col">
              <label class="label-form" for="a">Koordinat maps</label>
              <input type="text" class="form-control" name="akad_loc" placeholder="Masukkan Koordinat" value="{{$undangans[0]->akad_loc ?? ''}}" id="alamat" aria-label="First name">
            </div>
          </div>
          <input type="hidden" value="{{ $undangans[0]->akad_lat ?? '' }}" id="lat" name="akad_lat">
          <input type="hidden" value="{{ $undangans[0]->akad_lng ?? ''}}" id="lng" name="akad_lng">
          <div class="row mt-3 py-lg-2">
            <div class="col-lg-12" id="map" style="height: 300px;"></div>
          </div>
          <div class="d-flex">
            <button type="button" onclick="getGeocode()" class="btn btn-black">GeoCode</button>
          </div>
        </div>
      </div>

      <hr>
      <div class="row justify-content-center align-items-start g-2">
        <div class=" col-lg-5">
          <p class="title">Dokumentasi</p>
          <p class="subtitle">Update your photo and personal details.</p>
        </div>
        <div class=" col-lg-7 column">
          <div class="row py-lg-2">
            <div class=" py-3 py-lg-0">
              <label class="label-form" for="a">Foto Cover</label>
              <form method="post" action="{{ route('dropzoneFileUpload') }}" enctype="multipart/form-data" class="dropzone" id="dzCoverImage">
                @csrf
              </form>
            </div>
          </div>
          <div class="row  py-lg-2">
            <div class=" py-3 py-lg-0">
              <label class="label-form" for="a">Lagu Background</label>
              <form method="post" action="{{ route('dropzoneFileUpload') }}" enctype="multipart/form-data" class="dropzone" id="dzSong">
                @csrf
              </form>
              <div id="audioPreview"></div>
            </div>
          </div>
          <div class="row py-lg-2">
            <div class="col">
              <label class="label-form" for="a">Link Youtube</label>
              <input type="text" class="form-control" value="{{$undangans[0]->link ?? "" }}" name="link">
              {{-- ? "https://www.youtube.com/watch?v=" . $undangans[0]->link : ""  --}}
            </div>
          </div>
        </div>
        <hr class="mt-3 mb-0">
        <div class="row justify-content-center align-items-start g-2">
          <div class="col-lg-12 column">
            <div class="row  py-lg-2">
              <div class="col d-flex justify-content-end">
                <a class="btn-white mx-1 align-items-start d-flex" id="preview2">
                  <span><img src="Eye.svg" alt=""></span>
                  <p>Preview</p>
                </a>
                <button type="submit" class="mx-1 btn-black">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <button type="submit" class="mx-1 btn-black">Simpan</button>
</div>
</form>
<div id="hiddenVal"></div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzurpnT2Vr1PoDWu9enQcmqMjX_u-lx58&language=id&region=ID&libraries=places">
</script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/croppie@2.6.3/croppie.min.js"></script>

<script>
  String.prototype.trim = function() {
    return this.replace(/^\s+|\s+$/g, "");
  }
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    let checkbox = document.getElementById('tglSwitch');
    let checkbox2 = document.getElementById('tglSwitch2');


    checkbox.addEventListener('change', function() {
      if (checkbox.checked && checkbox.value == 0) {
        // do this
        checkbox.value = 0;
        checkbox2.checked = false;
      } else {
        // do that
        checkbox2.checked = true;
      }
    });
    checkbox2.addEventListener('change', function() {
      if (checkbox2.checked && checkbox2.value == 1) {
        // do this
        checkbox.value = 1;
        checkbox.checked = false;
      } else {
        // do that
        checkbox.checked = true;
      }
    });
  });
</script>
<script type="module">
  $(function() {
    changeAlamat();
    $("#validAlamat").click(changeAlamat);
  });

  function changeAlamat() {
    if ($('#validAlamat').prop('checked')) {
      $("#alamatResepsi").attr("disabled", true);
      $("#alamatLengkapR").attr("disabled", true);
    } else {
      $("#alamatResepsi").removeAttr("disabled");
      $("#alamatLengkapR").removeAttr("disabled");
    }
  }
  // $(function() {
  //     deleteUser();
  //     $("#deleteusr").click(deleteUser);
  // });
</script>


<script type="module">
  const slug = "{{ strval($slug) }}"
  $(function() {
    const link = slug !== "" ? $("#preview, #preview2").attr("href",
      "{{ route('undangan.show', $undangans[0]->slug ?? '')}}").attr("target", "_blank") : $(
      "#preview").attr("href", "javascript:void(0)");
  })
</script>

<script>
  let lat = '{{ floatval($undangans[0] -> akad_lat ?? -7.825953992187836) }}'
  let lng = '{{ floatval($undangans[0] -> akad_lng ?? 110.36282899647806) }}'

  let marker;
  $(function() {
    initMap();
  })

  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: new google.maps.LatLng(lat, lng)
    });

    marker = new google.maps.Marker({
      position: new google.maps.LatLng(lat, lng),
      map: map,
      title: 'Click to zoom',
      draggable: true
    });
    marker.addListener('drag', handleEvent);
    marker.addListener('dragend', handleEvent);
    var infowindow = new google.maps.InfoWindow({
      content: '<h5>Drag untuk pindah lokasi</h5>'
    });

    infowindow.open(map, marker);
  }

  function handleEvent(event) {
    document.getElementById('lat').value = event.latLng.lat();
    document.getElementById('lng').value = event.latLng.lng();
  }

  function getReverseGeocode() {

    var lat = $('#lat').val();
    var lng = document.getElementById('lng').value;

    var lat = $('#lat').val();
    var lng = document.getElementById('lng').value;
    $.ajax({
      url: "{{ route('get-reverse-geocode') }}",
      method: 'GET',
      data: {
        lat: lat,
        lng: lng
      },
      dataType: 'json',
      success: function(data) {
        document.getElementById('alamat').value = data;
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;

      },
      error: function(error) {
        alert(
          "An error occurred while trying to get the address. Please try again."
        ); // alert the user
      }
    });

  }

  function getGeocode() {
    let query = '-7.815606559938817, 110.28946009746127';
    console.log(query)
    $.ajax({
      url: "{{ route('get-geocode') }}",
      type: 'GET',
      data: {
        query: query
      },
      dataType: 'json',
      success: function(data) {
        document.getElementById('alamat').value = data['name']
        document.getElementById('lat').value = data['geometry']['location']['lat'];
        document.getElementById('lng').value = data['geometry']['location']['lng'];
        dataLat = data['geometry']['location']['lat']
        dataLng = data['geometry']['location']['lng']
        var latlng = new google.maps.LatLng(dataLat, dataLng);
        marker.setPosition(latlng);
      },
      error: function(error) {
        alert(
          "An error occurred while trying to get the address. Please try again."
        ); // alert the user
      }
    });
  }

  @if(Session::has('success')) swal({
    icon: "success",
    title: "{{Session::get('success')}}"
  });
  @endif
</script>



<script>
  const tier = "{{ strval($tier) }}"

  function generateUniqueString() {
    return Date.now().toString(36);
  }

  function initializeDropzone(dropzoneId, message, imageLimit, extension, fieldName, isMultiple) {
    var dropzoneOptions = {
      dictDefaultMessage: message,
      paramName: fieldName,
      maxFilesize: 50,
      maxFiles: imageLimit,
      parallelUploads: 10000,
      uploadMultiple: isMultiple,
      acceptedFiles: extension,
      addRemoveLinks: true,
      timeout: 50000,
      renameFile: function(file) {
        const uniqueString = generateUniqueString();
        var dt = new Date();
        var time = dt.getTime();
        return time + "_" + uniqueString
      },
      init: function() {

        var dropzoneInstance = this;

        switch (fieldName) {
          case 'images':
            latestDataJson = @json($images);
            break;
          case 'groom_images':
            latestDataJson = @json($groom_images);
            break;
          case 'bride_images':
            latestDataJson = @json($bride_images);
            break;
          case 'cover_images':
            latestDataJson = @json($cover_images);
            break;
          case 'songs':
            latestDataJson = @json($songs);
            this.on('addedfile', function(file) {
              // Remove any previous previews
              $('#audioPreview').empty();

              // Create an audio element and append it to the preview area
              const audioPreview = document.createElement('audio');
              audioPreview.controls = true;
              audioPreview.src = latestDataJson[0].songs;
              $('#audioPreview').append(audioPreview);
            });
            break;
          default:
            console.log("ga ada yang berisi");
            break;
        }

        for (const image of latestDataJson) {
          console.log(image.images)
          const para = $(
            `<div class="form-check"> <input class="form-check-input input-delete" type="checkbox" value="${image.images}" id="flexCheckDefault"> </div>`,
          )
          $('.dz-preview').append(para)
          let mockFile = {
            name: image.images,
            // size: image.filesize
          };


          dropzoneInstance.emit("addedfile", mockFile);
          dropzoneInstance.emit("thumbnail", mockFile, image.images);
          dropzoneInstance.emit("complete", mockFile);
        }
      },

      removedfile: function(file, response) {
        if (file.name != "" && !file.status) {
          var name = file.name;
          const cloudinaryURL = name
          const regex = /\/([^/.]+)(\.\w+)$/;
          const extractedString = cloudinaryURL.match(regex)[1];
          var finalString = `pxl-ayunika-dev/${extractedString}`
        }

        if (file.status == "success") {
          var name = $(`input[name="${fieldName}"]`).val();
          const cloudinaryURL = name
          const regex = /\/([^/.]+)(\.\w+)$/;
          const extractedString = cloudinaryURL.match(regex)[1];
          var finalString = `pxl-ayunika-dev/${extractedString}`

        }
        console.log("final string" + finalString, name, fieldName)

        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          },
          type: 'POST',
          url: '{{ route("dropzoneFileDelete") }}',
          data: {
            filename: finalString,
            name: name,
            fieldName: fieldName
          },
          success: function(data, result) {
            console.log("File has been successfully removed!!");
            console.log(`Data: ${data}`)
            console.log(`Res: ${result}`)
          },
          error: function(e) {
            console.log(e);
          }
        });
        var fileRef;
        return (fileRef = file.previewElement) != null ?
          fileRef.parentNode.removeChild(file.previewElement) : void 0;
      },
      success: function(file, response) {
        const inputValue = response.result;
        console.log(inputValue)
        const hiddenInput = $('<input type="hidden" id="' + fieldName + '" name="' + fieldName +
          '" value="' + inputValue + '">');
        console.log(hiddenInput)

        const cloudinaryURL = inputValue
        const regex = /\/([^/.]+)(\.\w+)$/;
        const extractedString = cloudinaryURL.match(regex)[1];
        console.log("extract" + extractedString);
        var finalString = `pxl-ayunika-dev/${extractedString}`
        const para = $(`<div class="form-check"> <input class="form-check-input" type="checkbox" value="${finalString}" id="flexCheckDefault"> </div>`)
        // Append the hidden input to the body
        $('.dz-preview').append(para)
        $('#hiddenVal').append(hiddenInput);



        // var newElement = $(`<div class="alert alert-success d-flex align-items-center" role="alert">
        //   <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        //   <div style="margin-left: 20px">
        //     Success Upload Image
        //   </div>
        // </div>`);
        // $('#top').append(newElement.hide());
        // newElement.fadeIn(500).delay(3000).fadeOut(500).hide();
        // $('#top').hide();

      },
      error: function(file, response) {
        return false;
      }
    };
    // Only add the transformFile option if fieldName is not "songs"
    if (fieldName !== "songs" && fieldName !== "images") {
      dropzoneOptions.transformFile = function(file, done) {
        // Create the image editor overlay
        myDropZone = this;
        var editor = document.createElement('div');
        editor.style.position = 'fixed';
        editor.style.left = 0;
        editor.style.right = 0;
        editor.style.top = 0;
        editor.style.bottom = 0;
        editor.style.zIndex = 9999;
        editor.style.backgroundColor = '#000';
        document.body.appendChild(editor);

        // Create confirm button at the top left of the viewport
        var buttonConfirm = document.createElement('button');
        buttonConfirm.style.position = 'absolute';
        buttonConfirm.style.left = '10px';
        buttonConfirm.style.top = '10px';
        buttonConfirm.style.zIndex = 9999;
        buttonConfirm.textContent = 'Confirm';
        buttonConfirm.classList.add('btn-white');
        editor.appendChild(buttonConfirm);

        buttonConfirm.addEventListener('click', function() {
          // Get the output file data from Croppie
          croppie.result({
            type: 'blob',
            size: {
              width: 256,
              height: 256
            }
          }).then(function(blob) {
            // Create a new Dropzone file thumbnail
            myDropZone.createThumbnail(
              blob,
              myDropZone.options.thumbnailWidth,
              myDropZone.options.thumbnailHeight,
              myDropZone.options.thumbnailMethod,
              false,
              function(dataURL) {
                // Update the Dropzone file thumbnail
                myDropZone.emit('thumbnail', file, dataURL);
                // Tell Dropzone of the new file
                done(blob);
              });
          });
          // Remove the editor from view
          editor.parentNode.removeChild(editor);
        });
        var croppie = new Croppie(editor, {
          enableResize: false,
          viewport: {
            width: 512,
            height: 512,
            type: 'square'
          },
        });
        croppie.bind({
          url: URL.createObjectURL(file)
        });
      };
    }

    Dropzone.options[dropzoneId] = dropzoneOptions;
  }

  let max = tier == 3 ? "Max 20 Foto" : "Max 10 Foto";
  // Initialize Dropzone for the first div
  initializeDropzone('dzCoverImage',
    "<span class=\"dz-icon\"><img src='https://res.cloudinary.com/dtseetkdc/image/upload/v1689905073/svg/CloudArrowUp_jycet9.svg' alt='Icon'></span> <p><span class='bolded'>Klik untuk Upload</span><span class='normalized'> atau drag dan drop</span></p> <p class='second-text'>PNG, JPEG atau JPG (Max 1 Foto)</p>",
    1, ".jpeg,.jpg,.png,.gif", "cover_images", false);

  // Initialize Dropzone for the second div
  initializeDropzone('dzGroomImage',
    "<span class=\"dz-icon\"><img src='https://res.cloudinary.com/dtseetkdc/image/upload/v1689905073/svg/CloudArrowUp_jycet9.svg' alt='Icon'></span> <p><span class='bolded'>Klik untuk Upload</span><span class='normalized'> atau drag dan drop</span></p> <p class='second-text'>PNG, JPEG atau JPG (Max 1 Foto)</p>",
    1, ".jpeg,.jpg,.png,.gif", "groom_images", false);

  // Initialize Dropzone for the third div
  initializeDropzone('dzBrideImage',
    "<span class=\"dz-icon\"><img src='https://res.cloudinary.com/dtseetkdc/image/upload/v1689905073/svg/CloudArrowUp_jycet9.svg' alt='Icon'></span> <p><span class='bolded'>Klik untuk Upload</span><span class='normalized'> atau drag dan drop</span></p> <p class='second-text'>PNG, JPEG atau JPG (Max 1 Foto)</p>",
    1, ".jpeg,.jpg,.png,.gif", "bride_images", false);

  //reserved line
  initializeDropzone('dzImages',
    "<span class=\"dz-icon\"><img src='https://res.cloudinary.com/dtseetkdc/image/upload/v1689905073/svg/CloudArrowUp_jycet9.svg' alt='Icon'></span> <p><span class='bolded'>Klik untuk Upload</span><span class='normalized'> atau drag dan drop</span></p> <p class='second-text'>PNG, JPEG atau JPG " +
    max + "</p>",
    30, ".jpeg,.jpg,.png,.gif", "images", true);

  initializeDropzone('dzSong',
    "<span class=\"dz-icon\"><img src='https://res.cloudinary.com/dtseetkdc/image/upload/v1689905073/svg/CloudArrowUp_jycet9.svg' alt='Icon'></span> <p><span class='bolded'>Klik untuk Upload</span><span class='normalized'> atau drag dan drop</span></p> <p class='second-text'>MP3 atau format audio lainnya (Max 3 Lagu)</p>",
    10, ".mp4,.mp3,.wav,.flac", "songs", false);
</script>

<script>
  let count_class = 0

  function maFunction() {
    count_class++
    // document.getElementById('count_val').value = count
    if (count_class <= 10) {
      let div = document.createElement('div');
      div.classList.add('mb-3', `love_story${count_class}`, 'form-group', 'row');
      div.innerHTML =
        `<label class="label-form" for="a">Judul Story ${count_class}</label> <div class="col-12">
        <input type="text" class="form-control @error('title_story') is-invalid @enderror" id="title_story" name="title_story" required autofocus autocomplete="off" value="{{ old('title_story') }}">
        </div>
        <label class="label-form mt-2" for="a">Tanggal Story ${count_class}</label><div class="col-6">
        <input type="date" class="form-control @error('tgl_story') is-invalid @enderror" id="tgl_story" name="tgl_story" required autofocus autocomplete="off" value="{{ old('tgl_story') }}">
        </div>
        <label class="label-form  mt-2" for="a">Kisah Cinta ${count_class}</label> <div class="col-12"><textarea name="description_story" class="form-control love_story${count_class}" id="exampleFormControlTextarea1" rows="3"></textarea></div>
        
        `;
      document.getElementById('loveStoryClass').appendChild(div);
    } else {
      alert("Cant Have more than 10")
    }

  }


  function maFunctionDel(id) {
    let text = "Do you want to delete";
    let token = $("meta[name='csrf-token']").attr("content");

    if (confirm(text) == true) {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url: `/dashboard/undangan/${id}`,
        type: 'POST',
        cache: false,
        data: {
          _method: 'DELETE',
          "id": id
        },
        success: function(response) {

          //show success message
          console.log("it Works");
          window.location.reload();
        }
      });
    } else {
      text = "You canceled!";
    }
  }
</script>
@endsection