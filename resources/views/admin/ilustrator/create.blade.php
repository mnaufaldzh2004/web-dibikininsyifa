 @extends('admin.master')
 @section('title', 'Tambah Ilustrator')

 @section('content')
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Tambah Ilustrator</h3>
                 <p class="text-subtitle text-muted">Silahkan Isi Data Ilustrator</p>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <a href="{{ route('ilustrator.index') }}" class="btn btn-warning float-start float-lg-end">
                     <i class="bi bi-arrow-left"></i>
                     Kembali
                     </i>
                 </a>
             </div>
         </div>
     </div>
     <section class="section">
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
                 <form class="form" action="{{ route('ilustrator.store') }}" method="POST"
                     enctype="multipart/form-data">
                     @csrf
                     <div class="form-body">
                         <div class="row">
                             <div class="col-md-6">
                             <input type="hidden" name="status" value="active">
                                 <div class="form-group">
                                     <label for="name">Nama Ilustrator</label>
                                     <input type="text" class="form-control" id="name"
                                         placeholder="Masukkan nama ilustrator" name="name" required>
                                 </div>

                                 <div class="form-group">
                                     <label for="image">Foto Profile</label>
                                     <input type="file" class="form-control" id="image" name="profile_image"
                                         accept="image/*" required>
                                 </div>

                                 <div class="form-group">
                                     <label for="email">email</label>
                                     <input type="email" class="form-control" id="email"
                                         placeholder="Masukkan email karyawan" name="email" required>
                                 </div>

                             </div>
                             <div class="form-group">
                                     <label for="phone">Nomor Telepon</label>
                                     <input type="text" class="form-control" id="phone"
                                         placeholder="Masukkan Nomor Telepon" name="phone" required>
                                 </div>
                         </div>
                           <div class="col-md-6">
                                 <div class="category">
                                     <label for="category">Role</label>
                                     <select class="form-select" id="role" name="role_id" required>
                                         <option value="" disabled selected>Pilih Role</option>
                                         @foreach ($roles as $role)
                                             <option value="{{ $role->id }}">{{ $role->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                  <div class="form-group">
                                     <label for="password">Password</label>
                                     <input type="password" class="form-control" id="password"
                                         placeholder="Masukkan Password" name="password" required>
                                 </div>
                                 <div class="form-group">
                                     <label for="password_confirmation">Konfirmasi Password</label>
                                     <input type="password" class="form-control" id="password_confirmation"
                                         placeholder="Masukkan Konfirmasi password" name="password_confirmation" required>
                                 </div>
                                
                         
                     </div>
                      <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            <a href="{{ route('services.index') }}" type="submit" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>
                 </form>
             </div>
         </div>
     </section>

 @endsection
