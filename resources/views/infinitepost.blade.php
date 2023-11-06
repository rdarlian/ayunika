@foreach ($posts as $post)
<div class="col-md-4 mb-3" data-infinite-scroll='{ "path": ".pagination__next", "append": ".post", "history": false }'>
  <div class="border-0 d-flex justify-content-center">
    <div class="iposts-item">
      <div class="container-card-posts">
        @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="" class="card-posts">
        @else
        <img src="https://source.unsplash.com/500x400?married" class="card-posts img-fluid" alt="married">
        @endif
      </div>
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

</div>
@endforeach
<div class="d-none">
  {{ $posts->links() }}
</div>