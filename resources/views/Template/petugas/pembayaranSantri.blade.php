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

                        <!-- Status kolom (Dropdown untuk admin jika pending) -->
                        <td class="p-3 border">
                            @if(auth()->user()->role === 'admin' && $pembayaran->status_pembayaran === 'pending')
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

                        <!-- Aksi (hanya admin) -->
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

        <!-- Kembali & Pagination -->
        <div class="flex justify-between items-center mt-4">
            <a href="{{ auth()->user()->role === 'admin' ? route('adminDashboard') : route('petugasDashboard') }}" 
                class="bg-green-700 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-900 transition duration-200">
                Kembali
            </a>
        </div>
        <div class="mt-3 flex justify-end">
            {{ $pembayarans->withQueryString()->links() }}
        </div>
    </div>
</body>
</html>
