@extends('backend.main')

@section('content')
<div class="container-fluid">
    <h3>All Home Sliders</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('home.add') }}" class="btn btn-primary mb-3">Add New Slider</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Main Image 1</th>
                <th>Side Image 1</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($homes as $home)
            <tr>
                <td>{{ $home->title }}</td>
                <td><img src="{{ asset($home->image_1) }}" width="100"></td>
                <td><img src="{{ asset($home->image_4) }}" width="100"></td>
                <td>
                    <a href="{{ route('home.edit', $home->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('home.delete', $home->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this slider?')" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
