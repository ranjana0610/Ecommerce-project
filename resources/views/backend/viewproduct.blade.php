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
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <h3 class="fw-bold mb-3">Product List</h3>
        <ul class="breadcrumbs mb-3">
          <li class="nav-home">
            <a href="{{route('dashboard')}}">
              <i class="icon-home"></i>
            </a>
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            Products
          </li>
          <li class="separator">
            <i class="icon-arrow-right"></i>
          </li>
          <li class="nav-item">
            List
          </li>
        </ul>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Add Product</h4>
              <a href="{{route('product.add')}}" class="btn btn-primary btn-round ms-auto">
                <i class="fa fa-plus"></i>
                Add Product
              </a>
            </div>
          </div>
          <div class="card-body">
            <!-- Modal -->
            <div
              class="modal fade"
              id="addRowModal"
              tabindex="-1"
              role="dialog"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h5 class="modal-title">
                      <span class="fw-mediumbold"> New</span>
                      <span class="fw-light"> Row </span>
                    </h5>
                    <!-- <button
                                type="button"
                                class="btn-close"
                                data-dismiss="modal"
                                aria-label="Close"
                              >
                                <span aria-hidden="true">&times;</span>
                              </button> -->
                  </div>
                  <div class="modal-body">
                    <p class="small">
                      Create a new row using this form, make sure you
                      fill them all
                    </p>
                    <form>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label>Name</label>
                            <input
                              id="addName"
                              type="text"
                              class="form-control"
                              placeholder="fill name" />
                          </div>
                        </div>
                        <div class="col-md-6 pe-0">
                          <div class="form-group form-group-default">
                            <label>Position</label>
                            <input
                              id="addPosition"
                              type="text"
                              class="form-control"
                              placeholder="fill position" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>Office</label>
                            <input
                              id="addOffice"
                              type="text"
                              class="form-control"
                              placeholder="fill office" />
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer border-0">
                    <button
                      type="button"
                      id="addRowButton"
                      class="btn btn-primary">
                      Add
                    </button>

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                  </div>
                </div>
              </div>
            </div>

            <div class="table-responsive">
              <table id="product-table" class="display table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th style="width: 15%">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                      @php
                          $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
                          $firstImage = is_array($images) && count($images) > 0 ? $images[0] : null;
                      @endphp


                      @if($firstImage)
                          <img src="{{ asset($firstImage) }}" alt="Image" width="50">
                      @else
                          <span>No Image</span>
                      @endif

                    </td>
                    <td>
                      <div class="form-button-action">
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-link btn-primary btn-lg" title="Edit Task">
                          <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-link btn-danger" type="submit" title="Remove">
                            <i class="fa fa-times"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>

              </table>
              <div class="d-flex justify-content-center mt-3">
  {!! $products->links('pagination::bootstrap-4') !!}
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection
