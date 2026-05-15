<section id="testimoni">
    <div class="container">
        <div class="section-title">
            <h2>Apa Kata Mereka</h2>
            <p>Testimoni dari pelanggan kami</p>
        </div>

        @php
            $testi = [
                ['nama' => 'Rina Lestari', 'role' => 'Mahasiswi', 'pesan' => 'Hasilnya bagus banget! Mirip sama foto aslinya, dan proses pengerjaannya cepat. Recommended!'],
                ['nama' => 'Adi Pratama', 'role' => 'Karyawan Swasta', 'pesan' => 'Pesen buat hadiah anniversary, pacar saya suka banget sama ilustrasinya. Terima kasih!'],
                ['nama' => 'Maya Sari', 'role' => 'Ibu Rumah Tangga', 'pesan' => 'Pelayanannya ramah, harga bersahabat, dan hasilnya memuaskan. Pasti pesan lagi!'],
            ];
        @endphp

        <div class="row g-4">
            @foreach($testi as $t)
                <div class="col-md-4">
                    <div class="testimoni-card h-100">
                        <i class="bi bi-quote" style="font-size: 1.8rem; color: var(--pink-deep);"></i>
                        <p class="mb-2">"{{ $t['pesan'] }}"</p>
                        <div class="nama">{{ $t['nama'] }}</div>
                        <div class="role">{{ $t['role'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>