@extends('admin.master')
@section('title', 'Ilustrator')
@section('css')
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/admin/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/admin/compiled/css/table-datatable.css">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manajemen Ilustrator</h3>
                <p class="text-subtitle text-muted">Informasi Ilustrator yang Terdaftar</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('ilustrator.create') }}" class="btn btn-primary float-start float-lg-end">
                    <i class="bi bi-plus"></i>
                    Tambah Ilustrator
                </a>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto Profile</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ilustrators as $ilustrator)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>  <img src="{{ asset('storage/'. $ilustrator->user->profile_image) }}" width="200" class="img-fluid rounded-top" alt="" onerror="this.onerror=null;this.src='{{  $ilustrator->user->profile_image}}'
                            ;"></td>
                            <td>{{ $ilustrator->user->name }}</td>
                           
                            <td>{{ $ilustrator->user->email }}</td>
                            <td>{{ $ilustrator->user->phone }}</td>
                         
                            
                          
                           
                            <td>
                                <a href="{{ route('ilustrator.edit', $ilustrator->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <form action="{{ route('ilustrator.destroy', $ilustrator->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus ilustrator ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="{{env('APP_URL')}}/assets/admin/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="{{env('APP_URL')}}/assets/admin/static/js/pages/simple-datatables.js"></script>
@endsection