<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="w-full max-w-3xl bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Pembayaran</h2>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi error --}}
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="santri_id" value="{{ $santri->id }}">

            <div class="grid grid-cols-2 gap-4">
                <!-- Nama -->
                <div>
                    <label class="block mb-1 font-semibold">Nama Santri</label>
                    <input type="text" value="{{ $santri->user->name }}" disabled class="w-full border p-2 bg-gray-100 text-gray-600 cursor-not-allowed">
                </div>

                <!-- Jumlah -->
                <div>
                    <label class="block mb-1 font-semibold">Jumlah Pembayaran</label>
                    <input type="number" name="jumlah" required class="w-full border p-2" placeholder="Contoh: 1000000">
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block mb-1 font-semibold">Tanggal Pembayaran</label>
                    <input type="date" name="tanggal" required class="w-full border p-2">
                </div>

                <!-- Bulan -->
                <div>
                    <label class="block mb-1 font-semibold">Bulan Dibayar</label>
                    <select name="bulan" class="w-full border p-2" required>
                        <option value="">-- Pilih Bulan --</option>
                        @foreach([
                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                        ] as $bulan)
                            <option value="{{ $bulan }}">{{ $bulan }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Maksud Pembayaran -->
                <div class="mt-4">
                    <label class="block mb-1 font-semibold">Tujuan Pembayaran</label>
                    <select name="maksud_bayar" required class="w-full border p-2">
                        <option value="">-- Pilih Tujuan Pembayaran --</option>
                        <option value="Bulanan">Bulanan</option>
                        <option value="Bukan Bulanan">Bukan Bulanan</option>
                    </select>
                </div>

                <!-- Metode -->
                <div>
                    <label class="block mb-1 font-semibold">Metode Pembayaran</label>
                    <input type="text" value="Transfer" disabled class="w-full border p-2 bg-gray-100 text-gray-600 cursor-not-allowed">
                    <input type="hidden" name="metode_pembayaran" value="transfer">
                </div>

                <!-- Bukti Transfer -->
                <div>
                    <label class="block mb-1 font-semibold">Bukti Pembayaran</label>
                    <input type="file" name="file_transaksi" class="w-full border p-2">
                </div>
            </div>

            <!-- Keterangan -->
            <div class="mt-4">
                <label class="block mb-1 font-semibold">Keterangan (Opsional)</label>
                <textarea name="keterangan" placeholder="Keterangan tambahan..." class="w-full border p-2"></textarea>
            </div>

            <!-- Tombol -->
            <div class="mt-6 flex justify-between">
                <a href="{{ route('santriDashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Kembali</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    Kirim Pembayaran
                </button>
            </div>
        </form>
    </div>
</body>
</html>
