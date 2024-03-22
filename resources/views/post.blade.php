<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $post->title }}</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div class="row justify-content-center mb-5 mt-5">
    <div class="col-md-8 px-5 px-md-0">
      <h2 class="mb-3">{{ $post->title }}</h2>
      <p>By.</p>
      <div style="max-height: 560px; max-width: 940px; overflow:hidden;">
        @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="ayunika" class="img-fluid mt-3" style="height: 560px; object-fit: cover;">
        @else
        <img src="https://source.unsplash.com/1200x400?pernikahan" alt="ayunika" class="img-fluid mt-3" style="height: 560px; object-fit: cover;">
        @endif
      </div>
      <article class="my-3 fs-5">
        {!! $post->body !!}
      </article>
      <a href="/blogs" class="d-block mt-3">Back to Posts</a>
    </div>
  </div>
</body>

</html>