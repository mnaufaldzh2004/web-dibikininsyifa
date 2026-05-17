@extends('admin.master')
@section('title', 'Tambah Opsi Tambahan')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Data Opsi Tambahan</h3>
            <p class="text-subtitle text-muted">Silahkan isi data opsi tambahan yang ingin ditambahkan</p>
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
        <form class="form" action="{{ route('options.store') }}" method="POST">
            @csrf
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nama Opsi Tambahan</label>
                            <input type="text" class="form-control" id="name" placeholder="Masukkan Nama Opsi Tambahan" name="option_name" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" placeholder="Masukkan Harga"
                                name="additional_price" required>
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