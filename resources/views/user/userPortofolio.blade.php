
@include('user.layouts.__header')

@include('user.layouts.__navbar')

<section class="hero" id="home">
    <div class="container ">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="mb-3">Hi, Aku <br>{{ $ilustrators->name }}</h1>
                <p class="mb-4">
               {{ $ilustrators->description }}
                </p>
                <a href="{{ url('/order') }}" class="btn btn-pink me-2">
                  <i class="bi bi-linkedin"></i></i> Cek Linkedin
                </a>
                <a href="#layanan" class="btn btn-outline-pink"><i class="bi bi-whatsapp"></i> Hubungi whatsapp </a>
            </div>
            <div class="col-lg-6 text-center">
                {{-- Placeholder gambar hero --}}
                <img src="{{asset('storage/'. $ilustrators->profile_image) }}"
                     alt="Hero Ilustrasi"
                     class=" rounded-4 shadow-sm" style="height: 100; width: 400px">
            </div>
        </div>
    </div>
</section>


<section id="layanan " class="slide-in-left">
    <div class="container ">
        <div class="section-title ">
            <h2>Portofolio Saya</h2>
            <p>Berbagai Ilustrasi yang sudah saya kerjakan</p>
        </div>

        @php
            $layanan = [
                ['nama' => 'Couple Portrait Illustration',  'desk' => 'Ilustrasi custom pasangan dengan gaya soft pastel dan detail wajah yang sederhana. Cocok digunakan sebagai hadiah anniversary atau foto profil pasangan.'],
                ['nama' => 'Family Digital Art',  'desk' => 'Ilustrasi keluarga dengan konsep hangat dan aesthetic menggunakan warna lembut. Cocok untuk dekorasi ruangan maupun hadiah keluarga.'],
                ['nama' => 'Graduation Portrait',  'desk' => 'Ilustrasi wisuda dengan sentuhan semi realistis dan detail toga yang rapi. Banyak digunakan sebagai kenang-kenangan momen kelulusan.'],
            ];
        @endphp

        <div class="row g-4">
        @foreach($portofolios as $portofolio)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-custom h-100">
                        <img src="{{ asset('storage/' . $portofolio->image_portofolio) }}"
                                class="card-top-img"  style="height: 400px;" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $portofolio->portofolio_name }}</h5>
                            <div class="price-tag mb-2"></div>
                            <p class="card-text text-muted">{{ $portofolio->portofolio_description }}</p>

                        </div>
                    </div>
                    
                </div>
              @endforeach
         

        </div>
        
    </div>
</section>

@include('user.layouts.__footer')