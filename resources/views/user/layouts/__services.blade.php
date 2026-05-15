<section id="layanan " class="slide-in-left">
    <div class="container ">
        <div class="section-title ">
            <h2>Layanan Kami</h2>
            <p>Pilih paket ilustrasi sesuai kebutuhan Anda</p>
        </div>

        @php
            $layanan = [
                ['nama' => 'Sketsa Sederhana', 'harga' => 'Rp 50.000', 'desk' => 'Sketsa hitam putih cocok untuk hadiah simple namun bermakna.'],
                ['nama' => 'Ilustrasi Berwarna', 'harga' => 'Rp 120.000', 'desk' => 'Ilustrasi full color dengan detail menengah dan pewarnaan halus.'],
                ['nama' => 'Ilustrasi Premium', 'harga' => 'Rp 250.000', 'desk' => 'Ilustrasi detail tinggi dengan background custom & efek artistik.'],
            ];
        @endphp

        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-custom h-100">
                        <img src="https://placehold.co/400x240/ffe4ec/2b2b2b?text={{ urlencode($service->service_name) }}"
                             class="card-img-top" alt="{{ $service->service_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->service_name }}</h5>
                            <div class="price-tag mb-2">Rp{{ number_format($service->base_price, 0, ',', '.') }}</div>
                            <p class="card-text text-muted">{{ $service->description}}</p>
                            <a href="{{ route('order', $service->id) }}" class="btn btn-pink btn-sm">Pesan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>