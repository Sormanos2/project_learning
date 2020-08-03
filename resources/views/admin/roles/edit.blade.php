<x-admin-master>
    @section('content')
        <div class="col-sm-6">
            <h1>Edit Role</h1>
            <form method="post" action="{{ route('admin.roles.update', $role->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <br>
        <div class="row">
            @if($permissions->isNotEmpty())
                <div class="col-sm-10">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Permission Information</h6>         
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>Options</th>
                                <th>Id</th>
                                <th>Name</th> 
                                <th>Slug</th>
                                <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Options</th>
                                    <th>Id</th>
                                    <th>Name</th> 
                                    <th>Slug</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($permissions as $permission)
                                        <tr>
                                            <td><input type="checkbox"
                                                @foreach($role->permissions as $role_permission)
                                                    @if ($role_permission->slug == $permission->slug)
                                                        checked
                                                    @endif
                                                @endforeach
                                            ></td>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->slug }}</td>
                                            <td>
                                            <form method="post" action="#">
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
            @endif
        </div>
    @endsection
</x-admin-master>