@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5">
  <h1 class="fw-bold fs-5 text-secondary">Ucapan/<span class="fs-6 fw-normal">Create</span></h1>
</div>

<form method="post" action="/dashboard/guests/greeting" class="mb-5" enctype="multipart/form-data">
  @csrf
  <div class="col-lg-12 pt-3 bg-white rounded-4 p-4">
    <div class="d-flex flex-column gap-2">
      @foreach($words as $key=>$word)
      <div class="d-flex align-items-center">
        <input name="pesan" class="item-message" id="pesan{{$key}}" type="radio" data-bs-toggle="collapse" href="#collapseExample{{$key}}" role="button" value="{{$word->id}}" {{ $greet[0]->invitation_id == $word->id ? 'checked' : '' }} />
        <label for="pesan{{$key}}" class="ms-2 fs-5 fw-bold container-fluid pesan-tamu">Contoh {{$key+1}}</label>
      </div>
      <div class="collapse multi-collapse" id="collapseExample{{$key}}">
        <div class="card card-body col-10">
          <pre class="fs-5" style="font-family:Poppins, sans-serif; margin: 0; white-space: pre-wrap; ">
          {{ $word->word }}
          </pre>
        </div>
      </div>
      <hr>
      @endforeach
    </div>
  </div>

  <h4 class="mt-4 fw-bold text-secondary">Format Custom</h4>
  <div class="col-lg-12 pt-3 bg-white rounded-4 p-4 mt-2">
    <textarea name="pesanku" id="pesanku" cols="100%" rows="10" style="border-radius: 12px;">{{ $greet[0]->pesanku }}</textarea>
    <h5 class="fs-6"><b>Perlu diperhatikan</b></h5>
    <p class="text-primary">Inputan : #TAMU#, #LINK#, #WANITA#, #ORTUWANITA#, #PRIA#, #ORTUPRIA#</p>
  </div>

  <button type="submit" class="btn btn-primary px-4 mt-3">Save</button>
</form>
<script>
  const radios = document.querySelectorAll('input[name="pesan"]');
  radios.forEach(radio => {
    radio.addEventListener('click', function() {
      const collapseId = this.getAttribute('href'); // Get the ID of the collapse content
      const collapseContent = document.querySelector(collapseId);

      // Hide all collapse contents
      document.querySelectorAll('.collapse.multi-collapse.show').forEach(collapse => {
        if (collapse !== collapseContent) {
          collapse.classList.remove('show');
        }
      });
      console.log(radio);
      if (this.getAttribute('aria-expanded') == "false") {
        this.checked = false;
      }
    });
  });
</script>


@endsection