@extends('backend.main')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Edit Home Slider</h3>

    <form method="POST" action="{{ route('home.update', $home->id) }}" enctype="multipart/form-data" id="home-form" data-home-id="{{ $home->id }}">
        @csrf
        @method('PUT')

        <div class="row">
            {{-- Left: Title and Description --}}
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $home->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4">{{ $home->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Images --}}
            <div class="col-lg-4">
                {{-- Main Slider --}}
                <div class="card mb-3">
                    <div class="card-header">Main Slider Images</div>
                    <div class="card-body">
                        @for($i=1; $i<=3; $i++)
                            <div class="mb-3 image-wrapper" data-index="{{ $i }}">
                                <label class="form-label">Image {{ $i }}</label><br>
                                @if($home->{'image_'.$i})
                                    <div id="img-container-{{ $i }}" class="position-relative d-inline-block mb-2">
                                        <img src="{{ asset($home->{'image_'.$i}) }}" class="img-thumbnail existing-image" style="max-width: 100px;">
                                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-image-btn" data-index="{{ $i }}">×</button>
                                        <input type="hidden" name="existing_images[]" value="{{ $i }}">
                                    </div>
                                @endif
                                <input type="file" name="main_slider[]" class="form-control">
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- Side Slider --}}
                <div class="card">
                    <div class="card-header">Side Slider Images</div>
                    <div class="card-body">
                       {{-- SIDE SLIDER --}}
                        @for($i=4; $i<=5; $i++)
                            <div class="mb-3 image-wrapper" data-index="{{ $i }}">
                                <label class="form-label">Image {{ $i - 3 }}</label><br>
                                @if($home->{'image_'.$i})
                                    <div id="img-container-{{ $i }}" class="position-relative d-inline-block mb-2">
                                        <img src="{{ asset($home->{'image_'.$i}) }}" class="img-thumbnail existing-image" style="max-width: 100px;">
                                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-image-btn" data-index="{{ $i }}">×</button>
                                        <input type="hidden" name="existing_images[]" value="{{ $i }}">
                                    </div>
                                @endif
                                <input type="file" name="side_slider[]" class="form-control">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-success" id="1sabt">Update</button>
            <a href="{{ route('home.view') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
</div>

@endsection


