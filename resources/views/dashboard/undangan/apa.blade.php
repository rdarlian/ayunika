<div class="row justify-content-center align-items-start g-2">
  <div class=" col-lg-5">
    <p class="title">Dokumentasi</p>
    <p class="subtitle">Update your photo and personal details.</p>
  </div>
  <div class=" col-lg-7 column">
    <div class="row py-lg-2">
      <div class=" py-3 py-lg-0">
        <form method="post" action="{{ route('dropzoneFileUpload') }}" enctype="multipart/form-data" class="dropzone" id="someHidden">
          @csrf
        </form>
      </div>
    </div>

    <div class="row py-lg-2">
      <div class=" py-3 py-lg-0">
        <label class="label-form" for="a">Foto Cover</label>
        <form method="post" action="{{ route('dropzoneFileUpload') }}" enctype="multipart/form-data" class="dropzone" id="dzCoverImage">
          @csrf
        </form>
      </div>
    </div>
    <div class="row py-lg-2">
      <div class=" py-3 py-lg-0">
        <label class="label-form" for="a">Foto Mempelai Wanita</label>
        <form method="post" action="{{ route('dropzoneFileUpload') }}" enctype="multipart/form-data" class="dropzone" id="dzBrideImage">
          @csrf
        </form>
      </div>
    </div>
    <div class="row py-lg-2">
      <div class=" py-3 py-lg-0">
        <label class="label-form" for="a">Foto Mempelai Pria</label>
        <form method="post" action="{{ route('dropzoneFileUpload') }}" enctype="multipart/form-data" class="dropzone" id="dzGroomImage">
          @csrf
        </form>
      </div>
    </div>
    <div class="row py-lg-2">
      <div class=" py-3 py-lg-0">
        <label class="label-form" for="a">Galeri Foto</label>
        <form method="post" action="{{ route('dropzoneFileUpload') }}" enctype="multipart/form-data" class="dropzone" id="dzImages">
          @csrf
        </form>
        {{-- <button type="button" class="btn btn-danger" id="btn-del-img">Delete Image</button> --}}
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
          <button class="mx-1 btn-black">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>