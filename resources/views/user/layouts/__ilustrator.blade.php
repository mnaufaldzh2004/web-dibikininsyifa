<section id="Ilustrator" class="slide-in-left">
    <div class="container ">
        <div class="section-title ">
            <h2>Ilustrator Kami </h2>
            <p>Portofilio Ilustrator kami</p>
        </div>

        @php
            $layanan = [
                ['nama' => 'Yuna', 'harga' => 'Ilustrator', 'desk' => 'Orang ini jago lulusan dkv alumni itb .'],
                ['nama' => 'Jungwoon', 'harga' => 'Ilustrator', 'desk' => 'Orang ini jago lulusan dkv alumni itb .'],
                ['nama' => 'Yeji', 'harga' => 'Ilustrator  ', 'desk' => 'Orang ini jago lulusan dkv alumni itb .'],
            ];
        @endphp

        <div class="row g-4">
                @foreach($ilustrators as $illustrator)
                <div class="col-md-6 col-lg-4">
                    <div class="card card-custom h-100">
                        <img src="{{ asset('storage/'. $illustrator->profile_image ?? '-') }}"
                             class="card-img-top" style="height: 536px;" alt="">
                        <div class="card-body">

                            <h5 class="card-title">{{ $illustrator->name }}</h5>
                            <div class="price-tag mb-2">{{ $illustrator->role->name }}</div>
                            <p class="card-text text-muted">{{ Str::limit($illustrator->description, 80) }}</p>
                            <a href="{{ route('user.portofolio', $illustrator->id) }}" class="btn btn-pink btn-sm">Lihat Detail Ilustrator</a>
                        </div>
                    </div>
                </div>
                @endforeach
             
                  
        </div>
    </div>
</section>