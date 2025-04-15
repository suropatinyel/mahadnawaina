<!-- resources/views/template/santri/santripembayaran.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pembayaran Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-green-700 mb-6">Data Pembayaran Santri</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Form & Add Payment Button -->
        <div class="mb-4 flex justify-between items-center">
            <form method="GET" action="{{ route('template.petugas.santriTambahPembayaran') }}" class="flex items-center">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="border rounded px-4 py-2 w-72 focus:outline-none focus:ring focus:border-blue-300"
                    placeholder="Cari nama santri...">
                <button type="submit"
                        class="ml-2 bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                    Cari
                </button>
            </form>
            
            <a href="{{ route('template.petugas.santriTambahPembayaran') }}" 
               class="bg-orange-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-orange-600 transition duration-200">
                Tambah Pembayaran
            </a>
        </div>

        <!-- Table for Payment Data -->
        <table class="min-w-full table-auto border border-gray-300 text-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 border">No</th>
                    <th class="p-3 border">Nama Santri</th>
                    <th class="p-3 border">Kelas</th>
                    <th class="p-3 border">Tanggal</th>
                    <th class="p-3 border">Bulan</th>
                    <th class="p-3 border">Jumlah</th>
                    <th class="p-3 border">Kode Transaksi</th>
                    <th class="p-3 border">Metode</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Bukti</th>
                    <th class="p-3 border">Keterangan</th>
                    @if(auth()->user()->role === 'admin')
                        <th class="p-3 border">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($pembayarans as $index => $pembayaran)
                    <tr class="border-t">
                        <td class="p-3 border">{{ $index + 1 }}</td>
                        <td class="p-3 border">{{ $pembayaran->santri->user->name ?? '-' }}</td>
                        <td class="p-3 border">{{ $pembayaran->santri->kelas->nama ?? '-' }}</td>
                        <td class="p-3 border">{{ \Carbon\Carbon::parse($pembayaran->tanggal)->format('d/m/Y') }}</td>
                        <td class="p-3 border">{{ $pembayaran->bulan}}</td>
                        <td class="p-3 border">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                        <td class="p-3 border">{{ $pembayaran->kode_transaksi }}</td>
                        <td class="p-3 border capitalize">{{ $pembayaran->metode_pembayaran }}</td>
                        <td class="p-3 border capitalize">{{ $pembayaran->status_pembayaran }}</td>
                        <td class="p-3 border text-center">
                            @if($pembayaran->pembayaran_detail && $pembayaran->pembayaran_detail->file_transaksi)
                                <a href="{{ asset('storage/' . ltrim($pembayaran->pembayaran_detail->file_transaksi, '/')) }}" target="_blank" class="text-blue-600 underline">Lihat</a>
                            @else
                                <span class="text-gray-500">-</span>
                            @endif
                        </td>
                        <td class="p-3 border">
                            {{ $pembayaran->pembayaran_detail->keterangan ?? '-' }}
                        </td>
                        @if(auth()->user()->role === 'admin')
                        <td class=" text-base space-x-2 text-center">
                            <!-- Edit Button -->
                            <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" 
                            class="text-black hover:text-green-800 px-3 py-1 rounded text-xs">
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-black hover:text-red-500 px-3 py-1 rounded text-xs mt-3">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    @endif
                    </tr>
                @endforeach   
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-4">
            <a href="{{ route('dashboard') }}" 
               class="bg-green-700 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-900 transition duration-200">
                Kembali
            </a>
        </div>

        <!-- Pagination at the bottom right -->
        <div class="mt-3 flex justify-end">
            {{ $pembayarans->withQueryString()->links() }}
        </div>
    </div>
</body>
</html>
