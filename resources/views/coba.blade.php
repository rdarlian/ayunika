<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


  @vite(['resources/sass/app.scss', 'resources/js/app.js'])


</head>

<body>
  <div class="container">
    <div class="row" id="posts-container">
      @foreach ($posts as $post)
      <div class="col-md-4 mb-3 gy-4 iposts-item" data-infinite-scroll='{ "path": ".pagination__next", "append": ".post", "history": false }'>
        <div class="border-0">
          @if ($post->image)
          <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid">
          @else
          <img src="" class="card-posts img-fluid" alt="married">
          @endif
          <div class="mt-3">
            <h5 class="">{{ $post->title }}</h5>
            <p>
              <small class="text-muted">
                By. <a href="/blogs?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
              </small>
            </p>
          </div>
        </div>
      </div>
      @endforeach

      <div class="d-none">
        {{ $posts->links() }}
      </div>
    </div>
  </div>

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

</body>

</html>