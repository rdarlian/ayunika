@extends('layouts.app')

@section('content')
<h1 class="mb-3 text-center fw-bold playfair mt-5 text-capitalize">pilihan tema udangan ekslusif ayunika</h1>
<p class="mt-4 text-center text-muted col-12 col-md-4 mx-auto mb-3">Jelajahi lebih dari 100+ template eksklusif dan premium dari kami, jadikan undangan kami untuk momen spesialmu.</p>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">

  </div>
</div>

@if ($themes->count())
<div class="container">
  <div class="row" id="themes-container">
    @include('infinitetheme')
  </div>

</div>
@else
<p class="text-center fs-4">No post found.</p>
@endif

<script type="module">
  $(document).ready(function() {
    let nextPageUrl = '{{ $themes->nextPageUrl() }}';
    $(window).scroll(function() {

      if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
        if (nextPageUrl) {
          console.log("scroll");
          loadMoreThemes();
        }
      }
    });

    function loadMoreThemes() {
      $.ajax({
        url: nextPageUrl,
        type: 'get',
        beforeSend: function() {
          nextPageUrl = '';
        },
        success: function(data) {
          nextPageUrl = data.nextPageUrl;
          $('#themes-container').append(data.view);
        },
        error: function(xhr, status, error) {
          console.error("Error loading more themes:", error);
        }
      });
    }
  });
</script>
@endsection