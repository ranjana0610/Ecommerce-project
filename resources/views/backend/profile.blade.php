@extends('backend.main') 

@section('content')
@if(session('success'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    };
    toastr.success("{{ session('success') }}");
</script>
@endif

<div class="container mt-4">
    <div class="card">
        <div class="card-header"><h4>Admin profile</h4></div>
        <div class="card-body">
            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
