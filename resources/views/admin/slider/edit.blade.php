@section('title', 'Slider')
@section('slider', 'active')

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
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('#list').DataTable({
                // "ordering": false,
                "pageLength": 25,
            });
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
                <span><a href="{{ route('slider.index') }}" class="text-dark">@yield('title')</a></span>
            </li>
            <li class="breadcrumb-item active">
                <span>Edit: {{ $slider->title }}</span>
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
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="text-end" style="width: 80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $s)
                                    <td class="align-middle">
                                        <span class="fw-bold fs-4 ">{{ $s->title }}</span>
                                        <small class="d-block">Order: {{ $s->order }}</small>
                                    </td>
                                    <td>
                                        @if ($s->featured == 'on')
                                            <span class="badge bg-info"><i class="fa-solid fa-toggle-on"></i> Featured</span>
                                        @else
                                        @endif
                                    </td>
                                    <td class="fw-bold fs-4 align-middle">
                                        <img src="{{ asset('storage/' . $s->image) }}" style="height: 50px;">
                                    </td>
                                    <td class="align-middle">
                                        @if ($s->status == 1)
                                            <span class="badge bg-success"><i class="fa-solid fa-circle-check"></i> Published</span>
                                        @else
                                            <span class="badge bg-secondary"><i class="fa-solid fa-circle-xmark"></i> Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-end align-middle">
                                        <a href="{{ route('slider.edit', [$s->id]) }}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#deleteModal{{ $s->id }}"><i class="fa-solid fa-trash"></i></button>

                                        <div class="modal fade" id="deleteModal{{ $s->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $s->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{ route('slider.destroy', [$s->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-white" id="deleteModal{{ $s->id }}Label"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
                                                            <button type="button" class="btn-close text-white" data-coreui-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure want to delete this <strong>"{{ $s->title }}"</strong> ?
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
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('slider.update', [$slider->id]) }}" class="col-4">
                @method('PUT')
                @csrf
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header bg-warning text-white"><i class="fa-solid fa-edit"></i> Edit</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Title" value="{{ $slider->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Slider Image</label>
                                <input class="form-control" type="file" id="image" name="image" aria-describedby="sliderImageSize">
                                <input type="hidden" name="old_image" value="{{ $slider->image }}">
                                <div id="sliderImageSize" class="form-text">Image size 400px x 300px</div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Current Slider Image</label>
                                <img src="{{ asset('storage/' . $slider->image) }}" class="w-100">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" class="form-control" name="description" placeholder="Description">{{ $slider->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1" @if ($slider->status == 1) selected @else @endif>Publish</option>
                                    <option value="0" @if ($slider->status == 0) selected @else @endif>Draft</option>
                                </select>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-6">
                                    <input type="number" id="order" class="form-control" name="order" placeholder="Order" value="{{ $slider->order }}">
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="feature" name="featured" @if ($slider->featured == 'on') checked @else @endif>
                                        <label class="form-check-label" for="feature">Featured</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success btn-sm w-100 text-white"><i class="fa-solid fa-paper-plane"></i> Submit</button>
                                <div class="px-2"></div>
                                <a href="{{ route('slider.index') }}" class="btn btn-danger btn-sm w-100 text-white"><i class="fa-solid fa-ban"></i> Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
