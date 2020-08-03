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
    @endsection
</x-admin-master>