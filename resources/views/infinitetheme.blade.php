@foreach ($themes as $theme)
<div class="col-12 col-md-4 mb-3" data-infinite-scroll='{ "path": ".pagination__next", "append": ".theme", "history": false }'>
  <div class="pt-4 col-12 d-flex justify-content-center">
    <img class="card-iphone" src="{{  asset('storage/'.$theme->image) }}" alt="">
  </div>
  <div class="pt-4">
    <p class="font-20 fw-semibold ">{{ $theme->name }}</p>
    <a class="btn-outline-brown col-5 text-decoration-none" href="{{ $theme->slug }}/{{$theme->theme_id}}" target="_blank">Lihat Tema</a>
  </div>
</div>
@endforeach
<div class="d-none">
  {{ $themes->links() }}
</div>