<x-admin-master>
    @section('content')
            <h1 class="h3 mb-4 text-gray-800">Create Post</h1>

            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="Enter Title">
                    @error('title')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="post_image" class="form-control-file" id="post_image">
                    @error('post_image')
                        <span>{{ $message }}</span>
                     @enderror
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ old('body') }}</textarea>
                     @error('body')
                        <span>{{ $message }}</span>
                     @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    @endsection
</x-admin-master>