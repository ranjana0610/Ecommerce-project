@extends('backend.main')

@section('content')
@if(session('success'))
<script>
  $(document).ready(function() {
    toastr.options = {
      closeButton: true,
      progressBar: true,
      positionClass: 'toast-top-right',
      timeOut: '3000'
    };
    toastr.success("{{ session('success') }}");
  });
</script>
@endif

<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-12">
      <h3 class="fw-bold">Edit Category</h3>
    </div>
  </div>

  <form action="{{ route('category.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
      {{-- LEFT COLUMN --}}
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="titleInput">Title</label>
              <input type="text" class="form-control" id="titleInput" name="title" value="{{ $categories->title }}" required />
            </div>
          </div>
        </div>
      </div>

      {{-- RIGHT COLUMN --}}
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">Upload Image</div>
          <div class="card-body text-center">
            
            @if($categories->image)
              <div class="mb-3">
                <img src="{{ asset('backend/categories/' . $categories->image) }}" class="img-thumbnail" width="150">
              </div>
            @endif

            {{-- Upload new image --}}
            <input type="file" class="form-control" name="image" accept="image/*">
            @if ($errors->has('image'))
              <small class="text-danger">{{ $errors->first('image') }}</small>
            @endif

          </div>
        </div>
      </div>
    </div>

    <div class="text-end mt-4">
      <button type="submit" class="btn btn-success">Save</button>
      <a href="{{ route('category.view') }}" class="btn btn-danger">Cancel</a>
    </div>
  </form>
</div>
@endsection
