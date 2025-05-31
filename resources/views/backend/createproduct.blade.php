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
      <h3 class="fw-bold">Product form</h3>
    </div>
  </div>

  <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data"><br>
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
              <label for="titleCategory">Category</label>
              <select name="category_id" class="form-control" required>
                  @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
              </select>
            </div>
              <div class="form-group">
                <label class="form-label">Size</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input
                      type="radio"
                      name="size"
                      value="50"
                      class="selectgroup-input"
                      checked="" />
                    <span class="selectgroup-button">S</span>
                  </label>
                  <label class="selectgroup-item">
                    <input
                      type="radio"
                      name="size"
                      value="100"
                      class="selectgroup-input" />
                    <span class="selectgroup-button">M</span>
                  </label>
                  <label class="selectgroup-item">
                    <input
                      type="radio"
                      name="size"
                      value="150"
                      class="selectgroup-input" />
                    <span class="selectgroup-button">L</span>
                  </label>
                  <label class="selectgroup-item">
                    <input
                      type="radio"
                      name="size"
                      value="200"
                      class="selectgroup-input" />
                    <span class="selectgroup-button">XL</span>
                  </label>
                </div>
              </div>
            <div class="form-group mb-3">
                <label for="ptype">Product Type</label>
                <select class="form-control" name="ptype" id="ptype">
                    <option value="0">Normal Products</option>
                    <option value="1">Featured Products</option>
                    <option value="2">Trending Products</option>
                    <option value="3">Top Selling Products</option>
                </select>
            </div>
            <div class="form-group mb-3">
              <label for="unitInput">Price</label>
              <input type="text" class="form-control" name="price" id="price">
            </div>

            <div class="form-group mb-3">
              <label for="overviewInput">Description</label>
              <textarea name="description" id="overviewInput" class="form-control" rows="4"></textarea>
            </div>
          </div>
        </div>
      </div>

      {{-- RIGHT COLUMN: Media Uploads --}}
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            Upload Images <small>(Min: 1, Max: 5 images)</small>
          </div>
          <div class="card-body text-center">
            <input type="file" class="form-control-file" name="images[]" accept="image/*" multiple required onchange="validateFiles(this)">
            <small class="text-danger d-block mt-2" id="fileError"></small>
            <div id="imagePreview" class="mt-3 d-flex flex-wrap justify-content-center gap-2"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-end mt-4">
      <button type="submit" class="btn btn-success" id="submitBtn">Save</button>
      <button type="reset" class="btn btn-danger">Cancel</button>
    </div>
  </form>
</div>
@endsection