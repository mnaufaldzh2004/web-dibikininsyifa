
@extends('user.layouts.master')

@section('title', 'Form Pemesanan - dibikinInSyifa')

@section('content')

<section style="background-color: var(--abu-muda); min-height: 80vh;">
    <div class="container">

        <div class="text-center mb-5">
            <h2>Form Pemesanan</h2>
            <p class="text-muted">Isi data berikut untuk memesan ilustrasi custom Anda</p>
        </div>

  

        <div class="row g-4">

            {{-- KIRI: Form --}}
            <div class="col-lg-8">
                <div class="form-card bg-white">
                    <h5 class="mb-4 heading-serif">Detail Pesanan</h5>

                    <form action="{{ route('payment') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Pilih layanan --}}
                        <div class="mb-3">
    <label for="layanan" class="form-label">Layanan yang dipilih</label>

    <input type="hidden" name="service_id" value="{{ $service->id }}">

    <select class="form-select" disabled>
        <option selected>
            {{ $service->service_name }} -
            Rp {{ number_format($service->base_price, 0, ',', '.') }}
        </option>
    </select>
</div>
                        <!-- Masukkan Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"  placeholder="Masukkan Nama Anda" ></input>
                        </div>

                          <div class="mb-3">
                        <label class="form-label">Nomor Telepon (WhatsApp)</label>
                        <div class="input-group">
                            
                            <input type="tel" class="form-control" placeholder="08xxxxxxxxxx" name="phone"
                                required>
                        </div>
                        </div>
                      

                        {{-- Pilih ilustrator --}}
                        <div class="mb-3">
                            <label for="ilustrator" class="form-label">Pilih Ilustrator</label>
                            <select class="form-select" id="ilustrator" name="ilustrator_id" required>
                                <option value="" selected disabled>-- Pilih Ilustrator --</option>
                                @foreach($ilustrators as $ilustrator)
                                    <option value="{{ $ilustrator->id }}">{{ $ilustrator->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Opsi tambahan --}}
                        <div class="mb-3">
                            <label class="form-label">Opsi Tambahan</label>
                            @foreach($options as $option)
                                <div class="form-check">
        <input
            class="form-check-input option-checkbox"
            type="checkbox"
            name="opsi[]"
            value="{{ $option->id }}"
            data-price="{{ $option->additional_price }}"
            id="opsi{{ $option->id }}"
          data-name="{{ $option->option_name }}"
        >

        <label class="form-check-label" for="opsi{{ $option->id }}">
            {{ $option->option_name }}
            <span class="text-muted">
                (+ Rp {{ number_format($option->additional_price, 0, ',', '.') }})
            </span>
        </label>
    </div>
                            @endforeach
                        </div>

                        {{-- Upload gambar --}}
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Upload Foto Referensi</label>
                            <input type="file" class="form-control" id="gambar" name="image" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG. Maks 5MB.</small>
                        </div>

                        {{-- Catatan --}}
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan Tambahan</label>
                            <textarea class="form-control" id="catatan" name="notes" rows="4"
                                      placeholder="Tuliskan permintaan khusus, gaya warna, atau referensi lainnya..."></textarea>
                        </div>

                        {{-- Total harga --}}
                        <div class="mb-4">
                            <label for="total" class="form-label">Total Harga</label>
                            <input
    type="text"
    class="form-control"
    id="total"
    readonly
    style="background-color: var(--pink-soft); font-weight: 600;"
>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url('/') }}" class="btn btn-outline-pink">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-pink">
                                Lanjut ke Pembayaran <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- KANAN: Ringkasan --}}
            <div class="col-lg-4">
                <div class="ringkasan-card">
                    <h5 class="heading-serif">Ringkasan Pesanan</h5>

                    <div class="ringkasan-row">
                        <span>Layanan</span>
                        <span class="text-end" value="{{$service->id}}">{{ $service->service_name }}</span>
                    </div>
                    <div class="ringkasan-row">
                        <span>Ilustrator</span>
                         <span class="text-end" id="summary-ilustrator">
            -
        </span>
                    </div>
                    <div id="container-ringkasan-opsi">
    </div>
                    
                    <div class="ringkasan-row">
                        <span>Harga Layanan</span>
                        <span class="text-end">Rp {{ number_format($service->base_price, 0, ',', '.') }}</span>
                    </div>
                      <div class="ringkasan-row">
                       
                        <span class="text-end">Admin 2%</span>
                    </div>

                   <div class="ringkasan-row ringkasan-total d-flex justify-content-between">
    <span>Total (Termasuk Pajak 2%)</span>
    
    <span id="total-harga" class="text-end fw-bold" data-base-price="{{ $service->base_price }}">
        Rp {{ number_format($service->base_price * 1.02, 0, ',', '.') }}
    </span>
</div>

                    <hr>
                    <small class="text-muted d-block">
                        <i class="bi bi-info-circle me-1"></i>
                        Pembayaran akan diproses melalui invoice Xendit yang aman.
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>
<script>

    const basePrice = {{ $service->base_price }};
    const feePercent = 0.02;
    const ilustratorSelect =  document.getElementById('ilustrator');
    const summaryIlustrator = document.getElementById('summary-ilustrator');

    function updateIlustrator() {

    const selectedText =
        ilustratorSelect.options[
            ilustratorSelect.selectedIndex
        ].text;

    summaryIlustrator.innerText =
        selectedText;

}

ilustratorSelect.addEventListener(
    'change',
    updateIlustrator
);
    const totalInput = document.getElementById('total');
    const allInput = document.getElementById('totalprice');
    const checkboxes = document.querySelectorAll('.option-checkbox');

    function formatRupiah(number) {
        return 'Rp ' + number.toLocaleString('id-ID');
    }

    function calculateTotal() {

        let additionalPrice = 0;

        checkboxes.forEach((checkbox) => {

            if (checkbox.checked) {

                additionalPrice += parseInt(
                    checkbox.dataset.price
                );

            }

        });

        const subtotal = basePrice + additionalPrice;

        const fee = subtotal * feePercent;

        const total = subtotal + fee;

        totalInput.value = formatRupiah(total);
        
    }

    checkboxes.forEach((checkbox) => {

        checkbox.addEventListener(
            'change',
            calculateTotal
        );

    });

    calculateTotal();
   document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.option-checkbox');
    const containerRingkasan = document.getElementById('container-ringkasan-opsi');
    
    // Ambil elemen total harga dan nilai base_price dari Laravel tadi
    const totalHargaElement = document.getElementById('total-harga');
    const basePrice = parseFloat(totalHargaElement.getAttribute('data-base-price')) || 0;

    // Kita bungkus logikanya ke dalam satu fungsi agar bisa dipanggil berulang kali
    function hitungTotal() {
        // 1. Bersihkan dulu isi container ringkasan opsi tambahan
        containerRingkasan.innerHTML = '';
        
        let totalAdditionalPrice = 0;
        const checkedOptions = document.querySelectorAll('.option-checkbox:checked');

        // 2. Jalankan perulangan untuk mengambil opsi yang dicentang
        checkedOptions.forEach(function (activeCheckbox) {
            const optionName = activeCheckbox.getAttribute('data-name');
            const optionPrice = parseFloat(activeCheckbox.getAttribute('data-price')) || 0;
            
            // Tambahkan harga opsi ke total harga tambahan
            totalAdditionalPrice += optionPrice;

            // Munculkan baris opsi tambahan di ringkasan
            const rowHTML = `
                <div class="ringkasan-row d-flex justify-content-between mb-1">
                    <span>${optionName}</span>
                    <span class="text-end text-muted">+ Rp ${optionPrice.toLocaleString('id-ID')}</span>
                </div>
            `;
            containerRingkasan.insertAdjacentHTML('beforeend', rowHTML);
        });

        // 3. Rumus Perhitungan: (Harga Dasar + Total Opsi) + Pajak 2%
        const subtotal = basePrice + totalAdditionalPrice;
        const pajak = subtotal * 0.02;
        const totalAkhir = subtotal + pajak; // Atau bisa langsung: subtotal * 1.02

        // 4. Update teks Total Harga di HTML (dibulatkan dengan Math.round agar tidak ada desimal)
        totalHargaElement.textContent = 'Rp ' + Math.round(totalAkhir).toLocaleString('id-ID');
    }

    // Jalankan fungsi setiap kali ada checkbox yang dicentang/diubah
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', hitungTotal);
    });
});
</script>

@endsection
