@extends('admin.master')
@section('title', 'Tambah Layanan')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Data Layanan</h3>
            <p class="text-subtitle text-muted">Silahkan isi data layanan yang ingin diedit</p>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Submit Error!</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form class="form" action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nama Layanan</label>
                            <input type="text" class="form-control" id="name" value="{{ $service->service_name}}" placeholder="Masukkan Nama Layanan" name="service_name" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea type="text" class="form-control" id="description" placeholder="Masukkan Deskripsi" name="description" required>{{ $service->description }}</textarea>
                        </div>
                         <div class="form-group">
                             <label for="price">Harga</label>
                             <input type="number" class="form-control" id="price" placeholder="Masukkan Harga"
                                 name="base_price" value="{{ $service->base_price }}" required>
                         </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            <a href="{{ route('services.index') }}" type="submit" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection