<section class="hero" id="home">
    <div class="container ">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="mb-3">Jasa Ilustrasi Custom <br>dari Foto Anda</h1>
                <p class="mb-4">
                    Ubah foto kesayangan Anda menjadi ilustrasi artistik yang unik dan personal.
                    Cocok untuk hadiah, kenang-kenangan, atau koleksi pribadi.
                </p>
                <a href="{{ url('/order') }}" class="btn btn-pink me-2">
                    <i class="bi bi-brush me-1"></i> Pesan Sekarang
                </a>
                <a href="#layanan" class="btn btn-outline-pink">Lihat Layanan</a>
            </div>
            <div class="col-lg-6 text-center">
                {{-- Placeholder gambar hero --}}
                <img src="{{ asset('img/logo2.png') }}"
                     alt="Hero Ilustrasi"
                     class="img-fluid rounded-4 shadow-sm">
            </div>
        </div>
    </div>
</section>