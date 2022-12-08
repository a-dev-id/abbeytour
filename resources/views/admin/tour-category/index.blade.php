@section('title', 'Tour Category')
@section('tour_category', 'active')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
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
            <li class="breadcrumb-item active">
                <span>@yield('title')</span>
            </li>
        </ol>
    </nav>
@endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('tour.create') }}" class="btn btn-sm btn-success text-white"><i class="fa-solid fa-circle-plus"></i> Add New</a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="list" class="table-striped w-100 table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th class="text-end" style="width: 80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tour_categories as $t)
                                    <tr>
                                        <td class="align-middle">
                                            <span class="fw-bold fs-4 ">{{ $t->title }}</span>
                                            <small class="d-block">Order: {{ $t->order }}</small>
                                        </td>
                                        <td class="fw-bold fs-4 align-middle">
                                            <img src="{{ asset($t->cover_image) }}" style="height: 50px;">
                                        </td>
                                        <td class="align-middle">
                                            @if ($t->featured == 'on')
                                                <span class="badge bg-info"><i class="fa-solid fa-toggle-on"></i> Featured</span>
                                            @else
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            @if ($t->status == 1)
                                                <span class="badge bg-success"><i class="fa-solid fa-circle-check"></i> Published</span>
                                            @else
                                                <span class="badge bg-secondary"><i class="fa-solid fa-circle-xmark"></i> Draft</span>
                                            @endif
                                        </td>
                                        <td class="text-end align-middle">
                                            <a href="{{ route('tour.edit', [$t->id]) }}" class="btn btn-warning btn-sm text-white"><i class="fa-solid fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#deleteModal{{ $t->id }}"><i class="fa-solid fa-trash"></i></button>

                                            <div class="modal fade" id="deleteModal{{ $t->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $t->id }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{ route('tour.destroy', [$t->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header bg-danger">
                                                                <h5 class="modal-title text-white" id="deleteModal{{ $t->id }}Label"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
                                                                <button type="button" class="btn-close text-white" data-coreui-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure want to delete this <strong>"{{ $t->title }}"</strong> ?
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
                                    <th>Image</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
