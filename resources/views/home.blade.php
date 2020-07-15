<x-home-master>

@section('content')
<h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>

        <!-- Blog Post -->
        @foreach($posts as $post )  
        <div class="card mb-4">
          <img class="card-img-top" height="300px" src="{{ $post->post_image }}" alt="Card image cap">
          <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-text">{{ Str::limit($post->body, '150', '.....') }}</p>
            <a href="{{ route('post', $post->id) }}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            {{ $post->created_at->diffForHumans() }}
            <a href="#">Start Bootstrap</a>
          </div>
        </div>
        @endforeach

        <!-- Pagination -->
   
          <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="{{$posts->previousPageUrl()}}">&larr; Older</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="{{$posts->nextPageUrl()}}">Newer &rarr;</a>
          </li>
        </ul>
          {{-- {{ $posts->links() }} --}}  
          {{-- @if($posts->previousPageUrl() != null)
    <a href="{{$posts->previousPageUrl()}}" class="prev_btn pull-left"><i class="fa fa-chevron-left"></i> NEWER</a>
@endif

@if($posts->nextPageUrl() != null)
    <a href="{{$posts->nextPageUrl()}}" class="prev_btn pull-right">OLDER <i class="fa fa-chevron-right"></i> </a>
@endif --}}
@endsection

</x-home-master>


