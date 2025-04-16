<!-- resources/views/petugas/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Petugas Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-green-700 mb-6">Data Petugas Pembayaran</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between mb-4">
        <form method="GET" action="{{ route('template.admin.dataPetugas') }}">
                <input type="text" name="search" value="{{ request()->search }}" placeholder="Cari petugas..." class="px-4 py-2 border rounded w-64">
            </form>
            <a href="{{ route('template.admin.petugasTambah') }}" 
               class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">
                Tambah Petugas
            </a>
        </div>

        
        <table class="min-w-full border border-gray-300 text-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 border">No</th>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Alamat</th>
                    <th class="p-3 border">No HP</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($petugas as $index => $ptgs)
                <tr class="border-t">
                    <td class="p-3 border">{{ $index + 1 }}</td>
                    <td class="p-3 border">{{ $ptgs->user->name }}</td>
                    <td class="p-3 border">{{ $ptgs->user->email }}</td>
                    <td class="p-3 border">{{ $ptgs->alamat }}</td>
                    <td class="p-3 border">{{ $ptgs->no_hp }}</td>
                    <td class="p-3 border text-center space-x-2">
                            <a href="{{ route('template.admin.petugasEdit', $ptgs->id) }}" 
                            class="bg-blue-500 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs">Edit</a>
                            
                            <form action="{{ route('petugas.destroy', $ptgs->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus petugas ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded text-xs">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($petugas->isEmpty())
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">Tidak ada data petugas.</td>
                </tr>
                @endif
            </tbody>
        </table>
        
        <div class=" mt-4">
            <a href="{{ route('adminDashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded shadow hover:bg-gray-700">
                Kembali
            </a>
        </div>
        <!-- Pagination -->
        <div class="mt-4">
            {{ $petugas->links() }}
        </div>
    </div>
</body>
</html>
