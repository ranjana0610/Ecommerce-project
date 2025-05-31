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
        <h3 class="fw-bold">Product</h3>
      </div>
    </div>

   <form method="POST" action="{{route('home.store')}}" enctype="multipart/form-data">
    
      @csrf
      <div class="row">
        {{-- LEFT COLUMN: Form Fields --}}
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="form-group mb-3">
                <label for="titleInput">Title</label>
                <input type="text" class="form-control" id="titleInput" name="title" placeholder="Enter title" />
              </div>

              <div class="form-group mb-3">
                <label for="overviewInput">Description</label>
                <textarea name="description" id="overviewInput" class="form-control" rows="4"></textarea>
              </div>
            </div>
          </div>
        </div>

        {{-- RIGHT COLUMN: Image Uploads --}}
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">Main Slider Images</div>
            <div class="card-body">
              <label>Main Slider Image 1 (Required, cannot delete)</label>
              <input type="file" name="main_slider[]" class="form-control mb-2" accept="image/*" required>

              <label>Main Slider Image 2</label>
              <input type="file" name="main_slider[]" class="form-control mb-2" accept="image/*">

              <label>Main Slider Image 3</label>
              <input type="file" name="main_slider[]" class="form-control mb-2" accept="image/*">
            </div>
          </div>

          <div class="card mt-3">
            <div class="card-header">Side Slider Images</div>
            <div class="card-body">
              <label>Side Slider Image 1 (Required, cannot delete)</label>
              <input type="file" name="side_slider[]" class="form-control mb-2" accept="image/*" required>

              <label>Side Slider Image 2</label>
              <input type="file" name="side_slider[]" class="form-control mb-2" accept="image/*">
            </div>
          </div>
        </div>
      </div>
      <div class="text-end mt-4">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
      </div>
    </form>
  </div>
  @endsection
