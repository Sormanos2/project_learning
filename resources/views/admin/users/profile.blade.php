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

    @endsection
</x-admin-master>
