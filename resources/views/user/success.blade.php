@extends('user.layouts.master')

@section('title', 'Checkout - DibikinInSyifa')

@section('content')

<section style="background-color: var(--abu-muda); min-height: 80vh;">
    <div class="container">

        <div class="text-center mb-5">
            <h2>Detail Order</h2>
           
        </div>

      
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card card-custom">
                    <div class="card-body p-4">
                    
                        {{-- Header --}}
                        <div class="text-center mb-4">
                            <div class="step-icon mx-auto">
                                <i class="bi bi-receipt"></i>
                            </div>
                            <h5 class="heading-serif mt-2 mb-1">Detail Pesanan</h5>
                            <small class="text-muted">{{$orders->order_code}}</small>
                        </div>

                        <div class="text-center mb-4"></div>
                        {{-- Detail --}}

                         <div class="ringkasan-row">
                            <span class="text-muted">Nama</span>
                            <span>{{$orders->user->name}}</span>
                        </div>

                         <div class="ringkasan-row">
                            <span class="text-muted">Phone</span>
                            <span>{{$orders->user->phone}}</span>
                        </div>
                        <div class="ringkasan-row">
                            <span class="text-muted">Tanggal</span>
                            <span>{{$orders->payment_date}}</span>
                        </div>
                        <div class="ringkasan-row">
                            <span class="text-muted">Layanan</span>
                            <span>{{$orders->service->service_name}}</span>
                        </div>
                        <div class="ringkasan-row">
                            <span class="text-muted">Ilustrator</span>
                            <span>{{$orders->ilustrator->user->name}}</span>
                        </div>

                        <hr>

                        <div class="ringkasan-row">
                            <span>Harga Layanan</span>
                            <span>Rp {{ number_format($orders->service->base_price, 0, ',', '.') }}</span>
                        </div>

                        @foreach($orders->detailOrder as $o)
                            <div class="ringkasan-row">
                                <span class="text-muted">+ {{ $o->additional_option->option_name     }}</span>
                                
                                <span>Rp {{ number_format($o->subtotal, 0, ',', '.') }}</span>
                                
                            </div>
                        @endforeach
                              <div class="ringkasan-row">
                               <span class="text-muted">+ Pajak 2%</span>

                                
                            </div>
                         <div class="ringkasan-row">
                            <span>Status</span>
                            @if($orders->status == 'PAID')
                            <span class="badge-success "> Pembayaran Berhasil</span>
                            @elseif($orders->status == 'pending')
                             <span style="text-color: #f5f227"> Pembayaran Pending</span>
                             @else
                             <span style="text-color: #f52727"> Pembayaran Gagal</span>
                             @endif
                        </div>

                        <div class="ringkasan-row ringkasan-total">
                            <span>Total Pembayaran</span>
                            <span style="color: var(--pink-deep);">
                                Rp {{ number_format($orders->total_price, 0, ',', '.') }}
                            </span>
                        </div>

                        @if(!empty($orders->notes))
                            <div class="mt-3 p-3" style="background-color: var(--pink-soft); border-radius: 10px;">
                                <small class="text-muted d-block mb-1"><strong>Catatan:</strong></small>
                                <small>{{$orders->notes}}</small>
                            </div>
                        @endif

                       
                    
                        <div class="text-center mt-3">
                            <small class="text-muted">
                                <i class="bi bi-shield-check me-1"></i>
                                Pembayaran aman melalui Xendit
                            </small>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('home')}}" class="text-muted small">
                                <i class="bi bi-arrow-left"></i> Kembali ke form pemesanan
                            </a>
                        </div>
                    </div>
                   
                </div>

            </div>
        </div>
    </div>
</section>

<style>
.badge-success {
background-color: #00D92F;
color: white;
padding: 4px 8px;
border-radius: 5px;
font-size: 12px;
}
.badge-warning {
background-color: #cbd900;
color: white;
padding: 4px 8px;
border-radius: 5px;
font-size: 12px;
}
.badge-danger {
background-color: #e70e0e;
color: white;
padding: 4px 8px;
border-radius: 5px;
font-size: 12px;
}


</style>
@endsection

