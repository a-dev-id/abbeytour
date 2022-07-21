@section('title', 'Tour')
@section('tour', 'active')

@push('css')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px !important;
        }

        .page-item.active .page-link {
            background-color: #3399ff;
            border-color: #3399ff;
        }

        .form-check-input:checked {
            background-color: var(--cui-form-check-input-checked-bg-color, #3399ff);
            border-color: var(--cui-form-check-input-checked-border-color, #3399ff);
        }

    </style>
@endpush

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#excerpt'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ms-2 my-0">
            <li class="breadcrumb-item">
                <span><a href="{{ route('index') }}" class="text-dark">Home</a></span>
            </li>
            <li class="breadcrumb-item">
                <span><a href="{{ route('tour.index') }}" class="text-dark">@yield('title')</a></span>
            </li>
            <li class="breadcrumb-item active">
                <span>Edit: {{ $tour->title }}</span>
            </li>
        </ol>
    </nav>
@endsection
<x-app-layout>
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data" action="{{ route('tour.update', [$tour->id]) }}" class="row">
            @method('PUT')
            @csrf
            <div class="col-8">
                <div class="card mb-4">
                    <div class="card-header">General</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" class="form-control" name="title" placeholder="Title" value="{{ $tour->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea id="excerpt" class="form-control" name="excerpt" placeholder="Excerpt">{{ $tour->excerpt }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" class="form-control" name="description" placeholder="Description">{{ $tour->description }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">Image</div>
                    <div class="card-body row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body p-0">
                                    <img src="{{ asset('storage/' . $tour->banner_image) }}" alt="" class="w-100">
                                </div>
                                <div class="card-footer">
                                    Banner Image
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body p-0">
                                    <img src="{{ asset('storage/' . $tour->cover_image) }}" alt="" class="w-100">
                                </div>
                                <div class="card-footer">
                                    Cover Image
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-header bg-warning text-white">Detail</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Cover Image</label>
                            <input class="form-control" type="file" id="cover_image" name="cover_image" aria-describedby="coverImageSize">
                            <input type="hidden" name="old_cover_image" value="{{ $tour->cover_image }}">
                            <div id="coverImageSize" class="form-text">Image size 400px x 300px</div>
                        </div>
                        <div class="mb-3">
                            <label for="banner_image" class="form-label">Banner Image</label>
                            <input class="form-control" type="file" id="banner_image" name="banner_image" aria-describedby="bannerImageSize">
                            <input type="hidden" name="old_banner_image" value="{{ $tour->banner_image }}">
                            <div id="coverImageSize" class="form-text">Image size 1920px x 500px</div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="1" @if ($tour->status == 1) selected @else @endif>Publish</option>
                                <option value="0" @if ($tour->status == 0) selected @else @endif>Draft</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <input type="number" id="order" class="form-control" name="order" placeholder="Order" value="{{ $tour->order }}">
                            </div>
                            <div class="col-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="feature" name="featured" @if ($tour->featured == 'on') checked @else @endif>
                                    <label class="form-check-label" for="feature">Featured</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success btn-sm text-white w-100"><i class="fa-solid fa-paper-plane"></i> Submit</button>
                            <div class="px-2"></div>
                            <a href="{{ route('tour.index') }}" class="btn btn-danger btn-sm text-white w-100"><i class="fa-solid fa-ban"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
