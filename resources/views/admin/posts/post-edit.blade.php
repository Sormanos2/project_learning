<x-admin-master>
    @section('content')
            <h1 class="h3 mb-4 text-gray-800">Edit Post</h1>

            <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="post_image" class="form-control-file" id="post_image">
                    <br>
                    <div><img height="100px" src="{{ $post->post_image }}" alt=""></div>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control" cols="30" rows="10" >{{ $post->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    @endsection
</x-admin-master>