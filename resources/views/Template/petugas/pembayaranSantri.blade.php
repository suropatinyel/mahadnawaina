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
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded transition duration-300 ease-in-out">
                {{ session('success') }}
            </div>
        @endif

        @if(auth()->user()->role !== 'admin')
            <a href="{{ route('template.petugas.santriTambahPembayaran') }}" 
                class="bg-orange-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-orange-600 transition duration-200">
                Tambah Pembayaran
            </a>
            @endif
            <form action="{{ route('export-pembayaran') }}" method="GET" class="flex items-center space-x-2 mt-4">
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
        <i class="fas fa-file-export mr-1"></i> Export Excel
    </button>
</form>


        <!-- Filter and Search Section -->
        <div class="flex justify-between mt-4 flex-wrap gap-4 items-center">
            <!-- Form Search -->
            <form action="{{ route('template.petugas.pembayaranSantri') }}" method="GET" class="flex items-center space-x-2 w-full sm:w-auto">
                <input type="text" name="search" placeholder="Cari nama santri..." value="{{ request('search') }}" 
                    class="border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 w-full sm:w-60" />
                <button type="submit" class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-700 text-sm">Cari</button>
            </form>

            <!-- Filter Bulan -->
            <form action="{{ route('template.petugas.pembayaranSantri') }}" method="GET" class="flex items-center space-x-2 w-full sm:w-auto">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <select name="bulan" onchange="this.form.submit()" 
                    class="border rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400 w-full sm:w-60">
                    <option value="">Filter Bulan</option>
                    @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                        <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
                    @endforeach
                </select>
            </form>

            <!-- Filter PerPage -->
            <form action="{{ route('template.petugas.pembayaranSantri') }}" method="GET" class="flex items-center space-x-2 w-full sm:w-auto">
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                @if(request('bulan'))
                    <input type="hidden" name="bulan" value="{{ request('bulan') }}">
                @endif
                <label for="perPage" class="text-sm font-medium">Tampilkan</label>
                <select name="perPage" id="perPage" onchange="this.form.submit()" class="border rounded px-2 py-1 text-sm">
                    <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                    <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                </select>
                <span class="text-sm font-medium">data per halaman</span>
            </form>
        </div>

        <!-- Table for Payment Data -->
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full table-auto border border-gray-300 text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-3 border">No</th>
                        <th class="p-3 border">Nama Santri</th>
                        <th class="p-3 border">Kelas</th>
                        <th class="p-3 border">Tanggal</th>
                        <th class="p-3 border">Bulan</th>
                        <th class="p-3 border">Tujuan Pembayaran</th>
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
                            <td class="p-3 border">{{ $pembayaran->bulan }}</td>
                            <td class="p-3 border">{{ $pembayaran->maksud_bayar }}</td>
                            <td class="p-3 border">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                            <td class="p-3 border">{{ $pembayaran->kode_transaksi }}</td>
                            <td class="p-3 border capitalize">{{ $pembayaran->metode_pembayaran }}</td>

                            <!-- Status -->
                            <td class="p-3 border">
                                @if((auth()->user()->role === 'admin' || auth()->user()->role === 'petugas') && $pembayaran->status_pembayaran === 'pending')
                                    <form action="{{ route('pembayaran.updateStatus', $pembayaran->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status_pembayaran" onchange="this.form.submit()" class="border px-2 py-1 rounded text-sm transition duration-300 ease-in-out">
                                            <option value="pending" {{ $pembayaran->status_pembayaran === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="lunas" {{ $pembayaran->status_pembayaran === 'lunas' ? 'selected' : '' }}>Lunas</option>
                                            <option value="gagal" {{ $pembayaran->status_pembayaran === 'gagal' ? 'selected' : '' }}>Gagal</option>
                                        </select>
                                    </form>
                                @else
                                    <span class="capitalize">{{ $pembayaran->status_pembayaran }}</span>
                                @endif
                            </td>

                            <!-- Bukti -->
                            <td class="p-3 border text-center">
                                @if($pembayaran->pembayaran_detail && $pembayaran->pembayaran_detail->file_transaksi)
                                    <a href="{{ asset('storage/' . ltrim($pembayaran->pembayaran_detail->file_transaksi, '/')) }}" target="_blank" class="text-blue-600 underline">Lihat</a>
                                @else
                                    <span class="text-gray-500">-</span>
                                @endif
                            </td>

                            <!-- Keterangan -->
                            <td class="p-3 border">
                                {{ $pembayaran->pembayaran_detail->keterangan ?? '-' }}
                            </td>

                            <!-- Aksi -->
                            @if(auth()->user()->role === 'admin')
                                <td class="text-base space-x-2 text-center">
                                    <a href="{{ route('template.admin.pembayaranEdit', $pembayaran->id) }}" 
                                        class="text-black hover:text-green-800 px-3 py-1 rounded text-xs">
                                        Edit
                                    </a>
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
        </div>

        <!-- Kembali & Pagination -->
        <div class="flex justify-between items-center mt-6">
            <a href="{{ auth()->user()->role === 'admin' ? route('adminDashboard') : route('petugasDashboard') }}" 
                class="bg-green-700 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-900 transition duration-200">
                Kembali
            </a>
        </div>

        <div class="mt-4 flex justify-end">
            {{ $pembayarans->withQueryString()->links() }}
        </div>

    </div>
</body>
</html>
