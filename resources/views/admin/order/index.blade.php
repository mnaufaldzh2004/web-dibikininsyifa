@extends('admin.master')
@section('title', 'Daftar Pesanan')

@section('css')
<link rel="stylesheet" href="{{env('APP_URL')}}/admin/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/admin/compiled/css/table-datatable.css">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Pesanan</h3>
                <p class="text-subtitle text-muted">Informasi Pesanan yang Masuk</p>
            </div>
            {{-- <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('items.create') }}" class="btn btn-primary float-start float-lg-end">
                    <i class="bi bi-plus"></i>
                    Tambah Menu
                </a>
            </div> --}}
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
                            <th>Kode Pesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Ilustrator</th>
                            <th>Jenis Layanan</th>
                             <th>Total Harga</th>
                             <th>Metode Pembayaran</th>
                            <th>Saluran Pembayaran</th>
                            <th>Status</th>
                            <th  >Waktu dibayar</th>
                            <th>Invoice Url </th>
                            <th class="text-center" colspan="2">Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @if(empty($orders))
                    <h4 hidden class="text-center">Orderan Kosong</h4>
                    @else
                        @foreach ($orders as $order)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td> <img src="{{ asset('storage/' . $order->image) }}" width="60"
                                            class="img-fluid rounded-top" alt=""
                                            onerror="this.onerror=null;this.src='{{ $order->image }}';">
                                    </td>
                            <td>{{ $order->order_code}}</td>
                            <td>{{ $order->user->name }}</td>
                              <td>{{ $order->ilustrator->user->name }}</td>
                                <td>{{ $order->service->service_name}}</td>
                    
                            <td>{{ 'Rp'. number_format($order->total_price, 0, ',', '.') }}</td>
                              
                            <td>
                              {{$order->payment_method}}
                            </td>
                          

                            
                            <td>{{ $order->payment_channel ?? 'None'}}  </td>
                         
                           
                                <td><span class="badge {{ $order->status == 'PAID' ? 'bg-success' : ($order->status == 'pending' ? 'bg-warning' : ($order->status == 'done' ? 'bg-primary' : 'bg-danger')) }}">
                                        {{ $order->status }}
                                    </span></td>
                            <td>{{ $order->payment_date}}</td>
                            <td>
                                <span class="btn btn-primary ">
                                    <a href="{{route('success', $order->order_code)}}" class="text-white">Lihat Invoice</a>
                                </span>
                             </td>
                          
                           
                            <td>
                                <span class="btn btn-primary btn-sm">
                                    <a href="{{route('detailorder.show', $order->id)}}" class="text-white">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </span>
                              
                                
                            </td>
                          
                            <td>
                                {{-- @if (Auth::user()->role->role_name == 'ADMIN' || Auth::user()->role->role_name == 'DRIVER') --}}
                                    {{-- @if ($order->status == 'pending' && $order->payment_method == 'cash')
                                         <form action="{{route('orders.updateStatus', $order->id)}}" method="POST">
                                             @csrf
                                             @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ingin menerima pembayaran ini?')">
                                                <i class="bi bi-check-circle"></i> Terima Pembayaran
                                            </button>
                                         
                                        </form> --}}
                                    {{-- @elseif($order->status == 'PAID')
                                              <form action="{{route('orders.doneOrder', $order->id)}}" method="POST">
                                             @csrf
                                             @method('PATCH')
                                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin ingin menyelesaikan orderan ini?')">
                                                <i class="bi bi-check-circle"></i> Selesai
                                            </button>
                                         
                                        </form>
                                    @endif --}}
                                {{-- @endif  --}}
                                
                            </td>
                            <td>
                                 {{-- @if ($order->status == 'pending' && $order->payment_method == 'cash')
                                         <form action="{{route('orders.rejectOrder', $order->id)}}" method="POST">
                                             @csrf
                                             @method('PATCH')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menolak pembayaran?')">
                                                <i class="bi bi-x-circle"></i> Tolak Pembayaran
                                            </button>
                                         
                                        </form>
                                    
                                    @endif --}}
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

@section('script')
<script src="{{env('APP_URL')}}/admin/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="{{env('APP_URL')}}/admin/static/js/pages/simple-datatables.js"></script>
@endsection