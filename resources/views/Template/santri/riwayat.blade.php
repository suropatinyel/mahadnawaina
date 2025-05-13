<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">        
        <h1 class="text-2xl font-bold text-green-700 mb-6">Riwayat Pembayaran - {{ $santri->user->name }}</h1>

        <!-- Tombol Download PDF -->
        <div class="mb-6 text-left">
            <a href="{{ route('pembayaran.downloadRiwayatPdf', $santri->id) }}" 
                class="bg-orange-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-orange-600 transition duration-200">
                Unduh Semua Riwayat
            </a>
        </div>

        <!-- Tabel Riwayat Pembayaran -->
        <table class="min-w-full table-auto border border-gray-300 text-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 border">#</th>
                    <th class="p-3 border">Tanggal</th>
                    <th class="p-3 border">Jumlah</th>
                    <th class="p-3 border">Bulan</th>
                    <th class="p-3 border">Metode</th>
                    <th class="p-3 border">Tujuan Pembayaran</th> <!-- Kolom Maksud Bayar -->
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Aksi</th> <!-- Kolom Aksi -->
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayarans as $key => $p)
                    <tr>
                        <td class="p-3 border">{{ $key + 1 }}</td>
                        <td class="p-3 border">{{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</td>
                        <td class="p-3 border">Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
                        <td class="p-3 border">{{ $p->bulan }}</td>
                        <td class="p-3 border">{{ ucfirst($p->metode_pembayaran) }}</td>
                        <td class="p-3 border">{{ ucfirst($p->maksud_bayar) }}</td> <!-- Menampilkan Maksud Bayar -->
                        <td class="p-3 border">{{ ucfirst($p->status_pembayaran ?? 'pending') }}</td>
                        
                        <!-- Kolom Aksi -->
                        <td class="p-3 border text-center">
                            <a href="{{ route('pembayaran.downloadDetailPdf', $p->id) }}" 
                               class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition duration-200">
                               Unduh
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $pembayarans->links() }}
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('santriDashboard') }}" 
                class="bg-green-700 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-900 transition duration-200">
                Kembali
            </a>
        </div>

    </div>
</body>
</html>
