@section('title', 'Setting')
@section('setting', 'active')

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

<x-app-layout>
    <div class="container-fluid">
        <form class="row mb-5" method="POST" enctype="multipart/form-data" action="{{ route('setting.update', [$setting->id]) }}">
            @method('PUT')
            @csrf
            <div class="col-12">
                <button type="submit" class="btn btn-success text-white px-5 float-end mb-3"><i class="fa-solid fa-floppy-disk"></i> Save Setting</button>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="general-tab" data-coreui-toggle="tab" data-coreui-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-coreui-toggle="tab" data-coreui-target="#homepage" type="button" role="tab" aria-controls="homepage" aria-selected="false">Home Page</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="logo" class="form-label">Logo</label>
                                            <input class="form-control" type="file" id="logo" name="logo" aria-describedby="clientLogoSize">
                                            <input type="hidden" name="old_logo" value="{{ $setting->logo }}">
                                            <div id="clientLogoSize" class="form-text">Image format: PNG. Image Size: 560px X 150px</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="client_logo" class="form-label">Current Logo</label>
                                            <img src="{{ asset($setting->logo) }}" alt="" class="w-50 d-block">
                                        </div>
                                        <div class="mb-3">
                                            <label for="website_title" class="form-label">Website Title</label>
                                            <input class="form-control" type="text" id="website_title" name="website_title" placeholder="Website Title" value="{{ $setting->website_title }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="website_title" class="form-label">Website Description</label>
                                            <textarea class="form-control" name="website_description" id="website_description" rows="5" placeholder="Website Description">{{ $setting->website_description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="facebook" class="form-label">Facebook</label>
                                            <input class="form-control" type="text" id="facebook" name="facebook" placeholder="Facebook" value="{{ $setting->facebook }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="twitter" class="form-label">Google Map</label>
                                            <input class="form-control" type="text" id="twitter" name="twitter" placeholder="Twitter" value="{{ $setting->twitter }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="instagram" class="form-label">Instagram</label>
                                            <input class="form-control" type="text" id="instagram" name="instagram" placeholder="Instagram" value="{{ $setting->instagram }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="youtube" class="form-label">Youtube</label>
                                            <input class="form-control" type="text" id="youtube" name="youtube" placeholder="Youtube" value="{{ $setting->youtube }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input class="form-control" type="email" id="email" name="email" placeholder="Email" value="{{ $setting->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone" value="{{ $setting->phone }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class=" form-label">Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="5" placeholder="Address">{{ $setting->address }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="whatsapp_number" class="form-label">Whatsapp Number</label>
                                            <input class="form-control" type="text" id="whatsapp_number" name="whatsapp_number" placeholder="Whatsapp Number" value="{{ $setting->whatsapp_number }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="homepage" role="tabpanel" aria-labelledby="homepage-tab">

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="about_us" class="form-label">About Us</label>
                                            <input class="form-control" type="text" id="about_us" name="about_us" placeholder="About Us" value="{{ $setting->about_us }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="about_us_description" class="form-label">About Us Description</label>
                                            <textarea class="form-control" name="about_us_description" id="about_us_description" rows="5" placeholder="About Us Description">{{ $setting->about_us_description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="row">
                                                        <div class="col-6">About Us Images</div>
                                                        <div class="col-6 text-end">
                                                            <button type="button" class="btn btn-sm btn-success text-white" data-coreui-toggle="modal" data-coreui-target="#createModal">
                                                                <i class="fa-solid fa-circle-plus"></i> Add New
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-success text-white">
                                                                <h5 class="modal-title" id="createModalLabel"><i class="fa-solid fa-circle-plus"></i> Add New</h5>
                                                                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" action="{{ route('about-image.store') }}">
                                                                    <div class="mb-3">
                                                                        <label for="cover_image" class="form-label">Cover Image</label>
                                                                        <input class="form-control" type="file" id="cover_image" name="cover_image" aria-describedby="coverImageSize">
                                                                        <div id="coverImageSize" class="form-text">Image size 400px x 400px</div>
                                                                    </div>
                                                                    <hr>
                                                                    <button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-success text-white"><i class="fa-solid fa-circle-plus"></i> Add New</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <table id="list" class="table-striped w-100 table">
                                                        <thead>
                                                            <tr>
                                                                <th>Title</th>
                                                                <th>Image</th>
                                                                <th class="text-end" style="width: 80px">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($about_images as $p)
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <span class="fw-bold fs-4 ">{{ $p->title }}</span>
                                                                    </td>
                                                                    <td class="fw-bold fs-4 align-middle">
                                                                        <img src="{{ asset($p->image) }}" style="height: 50px;">
                                                                    </td>

                                                                    <td class="text-end align-middle">
                                                                        <button class="btn btn-danger btn-sm text-white" data-coreui-toggle="modal" data-coreui-target="#deleteModal{{ $p->id }}"><i class="fa-solid fa-trash"></i></button>

                                                                        <div class="modal fade" id="deleteModal{{ $p->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $p->id }}Label" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <form method="POST" action="{{ route('page.destroy', [$p->id]) }}">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <div class="modal-header bg-danger">
                                                                                            <h5 class="modal-title text-white" id="deleteModal{{ $p->id }}Label"><i class="fa-solid fa-triangle-exclamation"></i> Warning</h5>
                                                                                            <button type="button" class="btn-close text-white" data-coreui-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            Are you sure want to delete this <strong>"{{ $p->title }}"</strong> ?
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
                                                                <th class="text-end">Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 pt-5">
                                            <label for="why_choose_us" class="form-label">Why Choose Us</label>
                                            <input class="form-control" type="text" id="why_choose_us" name="why_choose_us" placeholder="Why Choose Us" value="{{ $setting->why_choose_us }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="why_choose_us_description" class="form-label">Why Choose Us Description</label>
                                            <textarea class="form-control" name="why_choose_us_description" id="why_choose_us_description" rows="5" placeholder="Why Choose Us Description">{{ $setting->why_choose_us_description }}</textarea>
                                        </div>
                                        <div class="mb-3 pt-5">
                                            <label for="popular_destination" class="form-label">Popular Destination</label>
                                            <input class="form-control" type="text" id="popular_destination" name="popular_destination" placeholder="Popular Destination" value="{{ $setting->popular_destination }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="popular_destination_description" class="form-label">Popular Destination Description</label>
                                            <textarea class="form-control" name="popular_destination_description" id="popular_destination_description" rows="5" placeholder="Popular Destination Description">{{ $setting->popular_destination_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="latest_news" class="form-label">Latest News</label>
                                            <input class="form-control" type="text" id="latest_news" name="latest_news" placeholder="Latest News" value="{{ $setting->latest_news }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="latest_news_description" class="form-label">Latest News Description</label>
                                            <textarea class="form-control" name="latest_news_description" id="latest_news_description" rows="5" placeholder="Latest News Description">{{ $setting->latest_news_description }}</textarea>
                                        </div>
                                        <div class="mb-3 pt-5">
                                            <label for="testimonial" class="form-label">Testimonial</label>
                                            <input class="form-control" type="text" id="testimonial" name="testimonial" placeholder="Testimonial" value="{{ $setting->testimonial }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="testimonial_description" class="form-label">Testimonial Description</label>
                                            <textarea class="form-control" name="testimonial_description" id="testimonial_description" rows="5" placeholder="Testimonial Description">{{ $setting->testimonial_description }}</textarea>
                                        </div>
                                        <div class="mb-3 pt-5">
                                            <label for="our_client" class="form-label">Our Client</label>
                                            <input class="form-control" type="text" id="our_client" name="our_client" placeholder="Our Client" value="{{ $setting->our_client }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="our_client_description" class="form-label">Our Client Description</label>
                                            <textarea class="form-control" name="our_client_description" id="our_client_description" rows="5" placeholder="Our Client Description">{{ $setting->our_client_description }}</textarea>
                                        </div>
                                        <div class="mb-3 pt-5">
                                            <label for="gallery" class="form-label">Gallery</label>
                                            <input class="form-control" type="text" id="gallery" name="gallery" placeholder="Gallery" value="{{ $setting->gallery }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="gallery_description" class="form-label">Gallery Description</label>
                                            <textarea class="form-control" name="gallery_description" id="gallery_description" rows="5" placeholder="Gallery Description">{{ $setting->gallery_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
