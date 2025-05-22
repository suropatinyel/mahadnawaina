<!-- resources/views/pembayaran/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pembayaran Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-green-700 mb-6">Edit Pembayaran Santri</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Pilih Santri -->
            <div>
                <label class="block text-sm font-semibold mb-1">Nama Santri</label>
                <select name="santri_id" class="w-full border border-gray-300 rounded p-2" disabled>
                    @foreach($santris as $santri)
                        <option value="{{ $santri->id }}" {{ $pembayaran->santri_id == $santri->id ? 'selected' : '' }}>
                            {{ $santri->user->name ?? 'Nama tidak ditemukan' }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="santri_id" value="{{ $pembayaran->santri_id }}">
            </div>

            <!-- Jumlah -->
            <div>
                <label class="block text-sm font-semibold mb-1">Jumlah (Rp)</label>
                <input type="number" step="0.01" name="jumlah" value="{{ old('jumlah', $pembayaran->jumlah) }}" class="w-full border border-gray-300 rounded p-2">
            </div>

            <!-- Tanggal -->
            <div>
                <label class="block text-sm font-semibold mb-1">Tanggal Pembayaran</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $pembayaran->tanggal) }}" class="w-full border border-gray-300 rounded p-2">
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
                            <option value="{{ $bulan }}" {{ $pembayaran->bulan == $bulan ? 'selected' : '' }}>
                                {{ $bulan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Metode Pembayaran -->
                <div class="w-1/2">
                    <label class="block text-sm font-semibold mb-1">Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="w-full border border-gray-300 rounded p-2">
                        <option value="">-- Pilih Metode --</option>
                        <option value="cash" {{ $pembayaran->metode_pembayaran == 'cash' ? 'selected' : '' }}>Cash</option>
                        <option value="transfer" {{ $pembayaran->metode_pembayaran == 'transfer' ? 'selected' : '' }}>Transfer</option>
                        <option value="qris" {{ $pembayaran->metode_pembayaran == 'qris' ? 'selected' : '' }}>QRIS</option>
                        <option value="beasiswa" {{ $pembayaran->metode_pembayaran == 'beasiswa' ? 'selected' : '' }}>Beasiswa</option>
                    </select>
                </div>
            </div>

                <!-- Status Pembayaran -->
                <div>
                    <label class="block text-sm font-semibold mb-1">Status Pembayaran</label>
                    <select name="status_pembayaran" class="w-full border border-gray-300 rounded p-2">
                        <option value="pending" {{ $pembayaran->status_pembayaran == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="lunas" {{ $pembayaran->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
                        <option value="gagal" {{ $pembayaran->status_pembayaran == 'gagal' ? 'selected' : '' }}>Gagal</option>
                    </select>
                </div>
            <!-- File Bukti -->
            <div>
                <label class="block text-sm font-semibold mb-1">Upload Bukti (opsional)</label>
                <input type="file" name="file_transaksi" class="w-full border border-gray-300 rounded p-2">
                @if ($pembayaran->file_transaksi)
                    <p class="text-sm mt-2">File saat ini: 
                        <a href="{{ asset('storage/' . $pembayaran->file_transaksi) }}" target="_blank" class="text-blue-600 underline">
                            Lihat Bukti
                        </a>
                    </p>
                @endif
            </div>

            <!-- Keterangan -->
            <div>
                <label class="block text-sm font-semibold mb-1">Keterangan (opsional)</label>
                <textarea name="keterangan" rows="3" class="w-full border border-gray-300 rounded p-2">{{ old('keterangan', $pembayaran->keterangan) }}</textarea>
            </div>

            <!-- Submit -->
            <div>
                <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900">
                    Update Pembayaran
                </button>
                <a href="{{ route('template.petugas.pembayaranSantri') }}" class="ml-4 text-gray-600 hover:underline">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
