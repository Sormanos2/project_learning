<x-admin-master>
    @section('linkstylesheet')
        <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">All Posts</h1>
        @if(session('message'))
          <div class="alert alert-success alert-dismissible">
            {{ session('message') }} 
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          </div> 
        @elseif(session('message-update'))
        <div class="alert alert-success alert-dismissible">
          {{ session('message-update') }} 
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div> 
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Post Information</h6>         
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Owner</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Update At</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Owner</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Created At</th>
                      <th>Update At</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td> <a href="{{ route('post.edit', $post->id) }}">{{ $post->title }}</a></td>
                            <td>
                                <img height="40px" src="{{ $post->post_image }}">
                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td>
                            {{-- @can('view', $post) --}}
                              <form action="{{ route('post.destroy',$post->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       {{-- Pagination --}}
          {{-- {{  $posts->links() }} --}}
         
    @endsection
    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection
</x-admin-master>