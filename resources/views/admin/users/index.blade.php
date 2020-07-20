<x-admin-master>
    @section('linkstylesheet')
        <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endsection
    @section('content')
        <h1 class="h3 mb-4 text-gray-800">All Users</h1>
        {{-- @if(session('message'))
          <div class="alert alert-success alert-dismissible">
            {{ session('message') }} 
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          </div> 
        @elseif(session('message-update'))
        <div class="alert alert-success alert-dismissible">
          {{ session('message-update') }} 
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        </div> 
        @endif --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Information</h6>         
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="user-table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Registered date</th>
                        <th>Updated profile date</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Registered date</th>
                        <th>Updated profile date</th>
                        <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td><img src="{{ $user->avatar }}" height="80px"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
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