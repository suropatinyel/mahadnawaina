<!-- resources/views/pembayaran/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembayaran Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-green-700 mb-6">Tambah Pembayaran Santri</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Search -->
        <input type="text" id="search" name="search" autocomplete="off" placeholder="Cari nama santri..." class="border p-2 rounded w-1/2 relative">
        <div id="suggestions" class=" bg-white border w-1/2 rounded mt-1 hidden z-10" name="santri_id"></div>


        <form action="{{ route('pembayaran.store.pe') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf

    <!-- Input hidden untuk santri_id -->
    <input type="hidden" name="santri_id" id="santri_id">

    <!-- Jumlah -->
    <div>
        <label class="block text-sm font-semibold mb-1">Jumlah (Rp)</label>
        <input type="number" step="0.01" name="jumlah" value="{{ old('jumlah') }}" class="w-full border border-gray-300 rounded p-2">
    </div>

    <!-- Tanggal -->
    <div>
        <label class="block text-sm font-semibold mb-1">Tanggal Pembayaran</label>
        <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="w-full border border-gray-300 rounded p-2">
    </div>

    <select name="maksud_bayar" class="form-control" required>
    <option value="bulanan" {{ old('maksud_bayar') == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
    <option value="bukan_bulanan" {{ old('maksud_bayar') == 'bukan_bulanan' ? 'selected' : '' }}>Bukan Bulanan</option>
</select>


    <!-- Bulan dan Metode Pembayaran -->
    <div class="flex gap-4">
        <!-- Bulan -->
        <div class="w-1/2">
            <label for="bulan" class="block text-sm font-semibold mb-1">Bulan Dibayar</label>
            <select name="bulan" id="bulan" class="w-full border border-gray-300 rounded p-2" required>
                <option value="">-- Pilih Bulan --</option>
                @foreach([
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ] as $bulan)
                    <option value="{{ $bulan }}">{{ $bulan }}</option>
                @endforeach
            </select>
        </div>

        <!-- Metode Pembayaran -->
        <div class="w-1/2">
            <label class="block text-sm font-semibold mb-1">Metode Pembayaran</label>
            <select name="metode_pembayaran" class="w-full border border-gray-300 rounded p-2">
                <option value="">-- Pilih Metode --</option>
                <option value="cash" {{ old('metode_pembayaran') == 'cash' ? 'selected' : '' }}>Cash</option>
                <option value="transfer" {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                <option value="qris" {{ old('metode_pembayaran') == 'qris' ? 'selected' : '' }}>QRIS</option>
                <option value="beasiswa" {{ old('metode_pembayaran') == 'beasiswa' ? 'selected' : '' }}>Beasiswa</option>
            </select>
        </div>
    </div>

    <!-- File Bukti -->
    <div>
        <label class="block text-sm font-semibold mb-1">Upload Bukti (opsional)</label>
        <input type="file" name="file_transaksi" class="w-full border border-gray-300 rounded p-2">
    </div>

    <!-- Keterangan -->
    <div>
        <label class="block text-sm font-semibold mb-1">Keterangan (opsional)</label>
        <textarea name="keterangan" rows="3" class="w-full border border-gray-300 rounded p-2">{{ old('keterangan') }}</textarea>
    </div>

    <!-- Submit -->
    <div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Simpan Pembayaran
        </button>
        <a href="{{ route('template.petugas.pembayaranSantri') }}" class="ml-4 text-gray-600 hover:underline">Kembali</a>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search');
    const suggestions = document.getElementById('suggestions');
    const santriIdInput = document.getElementById('santri_id'); // input untuk santri_id

    // Fungsi menampilkan data
    searchInput.addEventListener('input', function () {
        const query = this.value.trim();
        if (query.length > 1) {
            fetch(`/api/search-santri?query=${query}`)
                .then(res => res.json())
                .then(data => {
                    suggestions.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(santri => {
                            const option = document.createElement('div');
                            option.textContent = santri.name;
                            option.className = 'p-2 hover:bg-gray-200 cursor-pointer';
                            option.addEventListener('click', () => {
                                searchInput.value = santri.name;
                                santriIdInput.value = santri.id; // Set value dari santri_id
                                suggestions.classList.add('hidden');
                            });
                            suggestions.appendChild(option);
                        });
                        suggestions.classList.remove('hidden');
                    } else {
                        suggestions.classList.add('hidden');
                    }
                }).catch(console.error);
        } else {
            suggestions.classList.add('hidden');
        }
    });

    // Klik di luar search & suggestions
    document.addEventListener('click', function (e) {
        const isClickInside = searchInput.contains(e.target) || suggestions.contains(e.target);
        if (!isClickInside) {
            suggestions.classList.add('hidden');
        }
    });
});
</script>


</body>
</html>
