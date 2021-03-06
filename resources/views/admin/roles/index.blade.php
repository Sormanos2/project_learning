<x-admin-master>
    @section('content')
      <div class="sm-col-12">
          @if(session()->has('role-inserted'))
            <div class="alert alert-success">
                {{ session('role-inserted') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
          @elseif(session()->has('role-updated')) 
            <div class="alert alert-success">
                {{ session('role-updated') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
          @elseif(session()->has('role-deleted')) 
            <div class="alert alert-danger">
                {{ session('role-deleted') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
          @elseif(session()->has('role-failed')) 
            <div class="alert alert-danger">
                {{ session('role-failed') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        @endif
      </div>
        <h1 class="h3 mb-4 text-gray-800">Roles</h1>
        <div class="row">
            <div class="col-sm-3">
                <form method="post" action="{{ route('admin.roles.store') }}">
                    @csrf
                   <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" >
                        <div class="text-danger">
                            @error('name')
                                <span><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div> 
                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>
            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles Information</h6>         
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Name</th> 
                              <th>Slug</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th> 
                                <th>Slug</th>
                                <th>Delete</th>
                            </tr>
                          </tfoot>
                          <tbody>
                               @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td><a href="{{ route('admin.roles.edit',$role->id) }}">{{ $role->name }}</a></td>
                                        <td>{{ $role->slug }}</td>
                                        <td>
                                          <form method="post" action="{{ route('roles.destory', $role->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                          </form>
                                        </td>
                                    </tr>
                                @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

    @endsection
</x-admin-master>