<x-admin-master>
    @section('content')
        <h1>User Profile for: {{  $user-> name }}</h1>

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('user.profile.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <img height="100px" src="{{ $user->avatar }}" alt="">
                    </div>
                    <div class="form-group">
                        <input type="file" name="avatar" >
                    </div>
                    <div class="form-group">
                        <label for="username">UserName</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror " value="{{ $user->username }}">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" name="password-confirm" id="password-confirm" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
<br>
        <div class="row" >
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Roles</h6>         
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                                <td>Options</td>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                                <td>Options</td>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                          </tfoot>
                          <tbody>
                             @foreach($roles as $role)
                                <tr>
                                    <td><input type="checkbox"
                                        @foreach($user->roles as $role_user)
                                            @if ($role_user->slug == $role->slug)
                                                checked
                                            @endif
                                        @endforeach
                                    ></td>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td>
                                        <form action="{{ route('user.role.attach', $user) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="role" value="{{ $role->id }}">
                                            <button class="btn btn-primary"
                                                @if($user->roles->contains($role))
                                                    Disabled
                                                @endif 
                                            >Attach</button> 
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('user.role.detach', $user) }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="role" value="{{ $role->id }}">
                                            <button class="btn btn-danger" 
                                                @if(!$user->roles->contains($role))
                                                    Disabled
                                                @endif   
                                            >Detach</button>
                                        </form>
                                    </td>
                                </tr>
                             @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
               {{-- Pagination --}}
            </div>
        </div>    

    @endsection
</x-admin-master>
