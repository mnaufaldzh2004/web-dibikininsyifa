@extends('admin.master')
@section('title', 'Portofolio Ilustrator')

@section('css')
<link rel="stylesheet" href="{{env('APP_URL')}}/admin/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/admin/compiled/css/table-datatable.css">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Portofolio</h3>
                <p class="text-subtitle text-muted">Informasi Portofolio </p>
            </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('portofolio.create') }}" class="btn btn-primary float-start float-lg-end">
                    <i class="bi bi-plus"></i>
                    Tambah Portofolio
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
                            <th>Gambar</th>
                            <th>Nama Portofolio</th>
                            <th>Deskripsi Portofolio</th>
                            <th class="text-center" colspan="2">Aksi</th>
                        
                            
                        </tr>
                    </thead>
                    <tbody>
                    @if(empty($ilustrators))
                    <h4 hidden class="text-center">Portofolio Kosong</h4>
                    @else
                        @foreach ($ilustrators as $ilustrator)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td> <img src="{{ asset('storage/' . $ilustrator->image_portofolio) }}" width="60"
                                            class="img-fluid rounded-top" alt=""
                                            onerror="this.onerror=null;this.src='{{ $ilustrator->image_portofolio }}';">
                                    </td>
                            <td>{{ $ilustrator->portofolio_name }}</td>
                            <td>{{ $ilustrator->portofolio_description}}</td>
                            <td>
                                <a href="{{route('portofolio.edit', $ilustrator->id)}}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <form action="{{route('portofolio.destroy', $ilustrator->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus portofolio ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>   
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script src="{{env('APP_URL')}}/admin/extensions/simple-datatables/simple-datatables.js"></script>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

                            </td>
                          

                      
                           
                              
                       
                      
                        
                        
                    </tbody>
            
                </table>
            </div>
        </div>

    </section>
</div>
@endsection

@section('script')
<script src="{{env('APP_URL')}}/admin/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="{{env('APP_URL')}}/admin/static/js/pages/simple-datatables.js"></script>
@endsection