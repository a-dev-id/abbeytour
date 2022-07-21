@section('title', 'Gallery')
@section('gallery_show', 'show')
@section('gallery', 'active')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
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
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#list').DataTable({
                // "ordering": false,
                "pageLength": 25,
            });
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
                <span><a href="{{ route('galleries.index') }}" class="text-dark">@yield('title')</a></span>
            </li>
            <li class="breadcrumb-item active">
                <span>Edit: {{ $gallery->title }}</span>
            </li>
        </ol>
    </nav>
@endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <table id="list" class="table-striped w-100 table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th class="text-end" style="width: 80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $g)
                                    <tr>
                                        <td class="fw-bold fs-4">{{ $g->title }}</td>
                                        <td>
                                            @if ($g->featured == 'on')
                                                <span class="badge bg-info"><i class="fa-solid fa-toggle-on"></i> Featured</span>
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            @if ($g->status == 1)
                                                <span class="badge bg-success"><i class="fa-solid fa-circle-check"></i> Published</span>
                                            @else
                                                <span class="badge bg-secondary"><i class="fa-solid fa-circle-xmark"></i> Draft</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('galleries.edit', [$g->id]) }}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#deleteModal{{ $g->id }}"><i class="fa-solid fa-trash"></i></button>

                                            <div class="modal fade" id="deleteModal{{ $g->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $g->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{ route('galleries.destroy', [$g->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header bg-danger">
                                                                <h5 class="modal-title text-white" id="deleteModal{{ $g->id }}Label"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
                                                                <button type="button" class="btn-close text-white" data-coreui-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure want to delete this <strong>"{{ $g->title }}"</strong> ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal"><i class="fa-solid fa-x"></i> Cancel</button>
                                                                <button type="submit" class="btn btn-danger text-white"><i class="fa-solid fa-trash"></i> Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('galleries.update', [$gallery->id]) }}" class="col-4">
                @method('PUT')
                @csrf
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header bg-warning text-white"><i class="fa-solid fa-edit"></i> Edit</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Title" value="{{ $gallery->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="gallery_category_id" class="form-label">Category</label>
                                <select class="form-select" id="gallery_category_id" name="gallery_category_id">
                                    <option value="0">- Choose -</option>
                                    @foreach ($gallery_categories as $gc)
                                        <option value="{{ $gc->id }}" @if ($gallery->gallery_category_id == $gc->id) selected @else @endif><strong>{{ $gc->title }}</strong></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input class="form-control" type="file" id="cover_image" name="cover_image" aria-describedby="coverImageSize">
                                <input type="hidden" name="old_cover_image" value="{{ $gallery->cover_image }}">
                                <div id="coverImageSize" class="form-text">Image size 400px x 400px</div>
                            </div>
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Current Cover Image</label>
                                <img src="{{ asset($gallery->cover_image) }}" class="w-100">
                            </div>
                            <div class="mb-3">
                                <label for="original_image" class="form-label">Original Image</label>
                                <input class="form-control" type="file" id="original_image" name="original_image" aria-describedby="originalImageSize">
                                <input type="hidden" name="old_original_image" value="{{ $gallery->original_image }}">
                                <div id="originalImageSize" class="form-text">Image size 1920px x 500px</div>
                            </div>
                            <div class="mb-3">
                                <label for="original_image" class="form-label">Current Orignial Image</label>
                                <img src="{{ asset($gallery->original_image) }}" class="w-100">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1" @if ($gallery->status == 1) selected @else @endif>Publish</option>
                                    <option value="0" @if ($gallery->status == 0) selected @else @endif>Draft</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="feature" name="featured" @if ($gallery->featured == 'on') checked @else @endif>
                                    <label class="form-check-label" for="feature">Featured</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success btn-sm w-100 text-white"><i class="fa-solid fa-paper-plane"></i> Submit</button>
                                <div class="px-2"></div>
                                <a href="{{ route('galleries.index') }}" class="btn btn-danger btn-sm w-100 text-white"><i class="fa-solid fa-ban"></i> Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
