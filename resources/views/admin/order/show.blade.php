@extends('admin.master')
@section('title', 'Detail Booking')

@section('css')
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/admin/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/admin/compiled/css/table-datatable.css">
@endsection

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Order</h3>
                <p class="text-subtitle text-muted">Informasi Detail Order yang Masuk</p>
            </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <a href="{{ route('allorder') }}" class="btn btn-warning float-start float-lg-end">
                     <i class="bi bi-arrow-left"></i>
                     Kembali
                     </i>
                 </a>
             </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Kode Order: {{$order->order_code}} </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Dibuat Pada: {{ $order->payment_date }} </p>
                        <p>Nama Pelanggan: {{$order->user->name}}</p>
                        <p>Status Pembayaran:
                            <span class="badge {{ $order->status == 'PAID' ? 'bg-success' : ($order->status == 'done' ? 'bg-success' : ($order->status == 'pending' ? 'bg-warning' : ($order->status == 'cancelled' ? 'bg-primary' : 'bg-danger'))) }}">
                                {{ $order->status }}
                            </span>
                            </span>
                        </p>

                    </div>
                    <div class="col-md-6">
                    
                   
                         
                        <p>Metode Pembayaran: {{$order->payment_method}}</p>
                         <p>Saluran Pembayaran: {{$order->payment_channel}}</p>
                      
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Booking yang dipesan</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            
                            <th>Referensi Gambar</th>
                            <th>Jenis Layanan</th>
                            <th>Total Harga</th>
                            <th>Nama Ilustrator</th>
                            <th>Foto Ilustrator</th>
                            <th>Invoice</th>

                        </tr>
                    </thead>
                    <tbody>
                   
                        <tr>

                            <td>
                                  <img src="{{ asset('storage/'. $order->image) }}" width="200" class="img-fluid rounded-top" alt="" onerror="this.onerror=null;this.src='{{  $order->image}}';">
                            </td>
                            <td>
                                {{$order->service->service_name}}
                            </td>
                            <td>
                              {{ 'Rp'. number_format($order->total_price, 0, ',', '.') }}
                            </td>
                            <td>
                               {{$order->ilustrator->user->name}}
                            </td>
                             <td>
                                <img src="{{  asset($order->ilustrator->user->profile_image) }}" width="200" class="img-fluid rounded-top" alt="" onerror="this.onerror=null;this.src='{{  $order->ilustrator->profile_image}}';">
                             </td>
                             <td>
                              
                            </td>
                             <td>
                                <span class="btn btn-primary ">
                                    <a href="{{route('success', $order->order_code)}}" class="text-white">Lihat Invoice</a>
                                </span>
                             </td>
                        </tr>

                       
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