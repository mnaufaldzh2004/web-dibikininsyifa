@extends('admin.master')
@section('title', 'Profile')

@section('css')
    <link rel="stylesheet" href="{{env('APP_URL')}}/admin/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/admin/compiled/css/table-datatable.css">
@endsection






@section('content')



    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Account Profile</h3>
                    <p class="text-subtitle text-muted">A page where users can change profile information</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">

                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card">

                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column">

                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Avatar">
                                </div>
                                <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')


                                    <h3 class="mt-3">{{ Auth::user()->name }}</h3>
                                    <p class="text-small">{{ Auth::user()->role->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <p><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name"
                                    value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone"
                                    value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Foto Profile</label>
                                <input type="file" class="form-control" id="image" name="profile_image" accept="image/*">
                            </div>

                              <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea type="text" class="form-control" id="description" placeholder="Masukkan Deskripsi"
                                    name="description" required>{{ Auth::user()->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection

@section('script')
    <script src="{{env('APP_URL')}}/admin/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="{{env('APP_URL')}}/admin/static/js/pages/simple-datatables.js"></script>
@endsection