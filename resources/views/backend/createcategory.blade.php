@extends('backend.main')

@section('content')
@if(session('success'))
<script>
  $(document).ready(function () {
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
      <h3 class="fw-bold">Category form</h3>
    </div>
  </div>

  <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
  @csrf

  <div class="row">
    <div class="col-lg-8">
      <div class="card mb-4">
        <div class="card-body">
          <div class="form-group mb-3">
            <label for="titleInput">Title</label>
            <input type="text" class="form-control" id="titleInput" name="title" placeholder="Enter title" required />
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">Upload Image <small>(Only 1 image allowed)</small></div>
        <div class="card-body text-center">
          <input type="file" class="form-control" name="image" id="imageInput" accept="image/*" required onchange="previewImage(event)">
          <small class="text-danger d-block mt-2" id="fileError"></small>
          <div class="mt-3">
            <img id="preview" src="#" alt="Image Preview" class="img-thumbnail" style="display: none; max-width: 200px;" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="text-end mt-4">
    <button type="submit" class="btn btn-success" id="submitBtn">Save</button>
    <button type="reset" class="btn btn-danger" onclick="clearPreview()">Cancel</button>
  </div>
</form>

</div>
@endsection