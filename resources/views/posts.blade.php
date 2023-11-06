@extends('layouts.app')

@section('content')
<h1 class="mb-3 text-center fw-bold playfair mt-5">{{ $title }}</h1>
<p class="mt-4 text-center text-muted col-12 col-md-4 mx-auto mb-3">Tetap terhubung bersama blog kami, berbagai tips pernikahan, tren pernikahan, kisah perjalanan inspiratif dari pasangan, dan promo menarik.</p>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <!-- <form action="/blogs">
      @if (request('category'))
      <input type="hidden" name="category" value="{{ request('category') }}">
      @endif

      @if (request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">
      @endif

      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-success" type="submit">Search</button>
      </div>

    </form> -->
  </div>
</div>

@if ($posts->count())
<div class="container">
  <div class="row" id="posts-container">
    @include('infinitepost')
  </div>

</div>
@else
<p class="text-center fs-4">No post found.</p>
@endif

<script type="module">
  $(document).ready(function() {
    let nextPageUrl = '{{ $posts->nextPageUrl() }}';
    $(window).scroll(function() {

      if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
        if (nextPageUrl) {
          console.log("scroll");
          loadMorePosts();
        }
      }
    });

    function loadMorePosts() {
      $.ajax({
        url: nextPageUrl,
        type: 'get',
        beforeSend: function() {
          nextPageUrl = '';
        },
        success: function(data) {
          nextPageUrl = data.nextPageUrl;
          $('#posts-container').append(data.view);
        },
        error: function(xhr, status, error) {
          console.error("Error loading more posts:", error);
        }
      });
    }
  });
</script>
@endsection