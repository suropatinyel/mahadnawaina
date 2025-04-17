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
        <!-- Form pencarian -->
        <form method="GET" action="{{ route('template.petugas.santriTambahPembayaran') }}" class="mb-4 ">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama santri..." class="border p-2 rounded w-1/2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Cari</button>
        </form>

        <!-- Dropdown nama santri -->
        <select name="santri_id" class="w-full border border-gray-300 rounded p-2 mb-4">
            <option value="">-- Pilih Santri --</option>
            @foreach($santris as $santri)
                <option value="{{ $santri->id }}" {{ old('santri_id') == $santri->id ? 'selected' : '' }}>
                    {{ $santri->user->name }}
                </option>
            @endforeach
        </select>



        <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

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
    </div>
</body>
</html>
