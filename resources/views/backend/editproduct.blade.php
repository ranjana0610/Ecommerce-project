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
      <h3 class="fw-bold">Product form</h3>
    </div>
  </div>

<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
      {{-- LEFT COLUMN: Form Fields --}}
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="titleInput">Title</label>
              <input type="text" class="form-control" id="titleInput" name="title" value="{{ $product->title }}" />
            </div>
            <div class="form-group mb-3">
            <label for="categorySelect">Category</label>
              <select class="form-control" id="categorySelect" name="category_id" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->title }}
                  </option>
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
                    {{ $product->size == 50 ? 'checked' : '' }} />
                  <span class="selectgroup-button">S</span>
                </label>
                <label class="selectgroup-item">
                  <input
                    type="radio"
                    name="size"
                    value="100"
                    class="selectgroup-input"
                    {{ $product->size == 100 ? 'checked' : '' }} />
                  <span class="selectgroup-button">M</span>
                </label>
                <label class="selectgroup-item">
                  <input
                    type="radio"
                    name="size"
                    value="150"
                    class="selectgroup-input"
                    {{ $product->size == 150 ? 'checked' : '' }} />
                  <span class="selectgroup-button">L</span>
                </label>
                <label class="selectgroup-item">
                  <input
                    type="radio"
                    name="size"
                    value="200"
                    class="selectgroup-input"
                    {{ $product->size == 200 ? 'checked' : '' }} />
                  <span class="selectgroup-button">XL</span>
                </label>
              </div>
            </div>

            <div class="form-group mb-3">
              <label for="unitInput">Price</label>
              <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
            </div>

            <div class="form-group mb-3">
              <label for="overviewInput">Description</label>
              <textarea name="description" id="overviewInput" class="form-control" rows="4">{{ $product->description }}</textarea>
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

            <div id="imagePreview" class="mt-3 d-flex flex-wrap justify-content-center gap-2">
              @if(is_array($product->images))
                @foreach($product->images as $image)
                  <div class="position-relative image-container" data-image="{{ $image }}">
                    <img src="{{ asset($image) }}" class="img-thumbnail" width="100" />
                    <button type="button"
                            class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-image-btn"
                            data-image="{{ $image }}">
                      ×
                    </button>
                  </div>
                @endforeach
              @endif
            </div><br>

<!-- <input type="hidden" name="deleted_images" id="deletedImages" value="[]"> -->


            {{-- Upload new images --}}
            <input type="file" class="form-control mt-3" name="images[]" id="imageInput" accept="image/*" multiple onchange="validateFiles(this)">
            <input type="hidden" name="deleted_images" id="deletedImages">
            <small class="text-danger d-block mt-2" id="fileError"></small>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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