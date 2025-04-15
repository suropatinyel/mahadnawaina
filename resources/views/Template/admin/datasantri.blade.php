<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold text-green-900 mb-4">
                Data Santri
            </h1>
            <div class="flex justify-between items-center mb-4">
                <form method="GET" action="{{ route('template.admin.datasantri') }}" class="flex w-full mr-4">
                    <input type="text" name="search" class="border rounded p-2 w-full" placeholder="Cari nama, ID, alamat, atau kelas..." value="{{ request('search') }}" />
                    <button type="submit" class="ml-2 px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                        Cari
                    </button>
                </form>
                <a href="{{ route('template.admin.santriTambah') }}" class="whitespace-nowrap bg-orange-500 text-white text-sm rounded px-4 py-2 hover:bg-orange-700">
                    + Tambah Data
                </a>
            </div>

            <div class="overflow-x-auto bg-white p-4 rounded shadow">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="bg-green-200 text-left">
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">NIS</th>
                            <th class="py-2 px-4 border">Nama</th>
                            <th class="py-2 px-4 border">Kamar</th>
                            <th class="py-2 px-4 border">Kelas</th>
                            <th class="py-2 px-4 border">Alamat</th>
                            <th class="py-2 px-4 border">Tanggal Lahir</th>
                            <th class="py-2 px-4 border">No HP</th>
                            <th class="py-2 px-4 border">Ayah</th>
                            <th class="py-2 px-4 border">Ibu</th>
                            <th class="py-2 px-4 border">Wali</th>
                            <th class="py-2 px-4 border">Status</th>
                            <th class="py-2 px-4 border">Masuk</th>
                            <th class="py-2 px-4 border">Keluar</th>
                            <th class="py-2 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($santris as $index => $santri)
                            <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }} text-center">
                                <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                                <td class="py-2 px-4 border">{{ $santri->nis }}</td>
                                <td class="py-2 px-4 border">{{ $santri->user->name }}</td>
                                <td class="py-2 px-4 border">{{ $santri->kamar->nama }}</td>
                                <td class="py-2 px-4 border">{{ $santri->kelas->nama }}</td>
                                <td class="py-2 px-4 border">{{ $santri->alamat }}</td>
                                <td class="py-2 px-4 border">{{ $santri->tanggal_lahir }}</td>
                                <td class="py-2 px-4 border">{{ $santri->no_hp }}</td>
                                <td class="py-2 px-4 border">{{ $santri->nama_ayah }}</td>
                                <td class="py-2 px-4 border">{{ $santri->nama_ibu }}</td>
                                <td class="py-2 px-4 border">{{ $santri->nama_wali }}</td>
                                <td class="py-2 px-4 border">{{ $santri->status }}</td>
                                <td class="py-2 px-4 border">{{ $santri->waktu_masuk }}</td>
                                <td class="py-2 px-4 border">{{ $santri->waktu_keluar }}</td>
                                <td class="py-2 px-4 border flex justify-center space-x-2">
                                    <a href="{{ route('template.admin.santriEdit', ['id' => $santri->id]) }}" class="bg-green-700 text-white px-2 py-1 rounded hover:bg-green-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('santri.destroy', ['id' => $santri->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="flex justify-between items-center mt-4">
                    <div>
                        <a href="{{ route('dashboard') }}" class="bg-green-700 text-white text-sm rounded px-3 py-2 hover:bg-green-900">
                         Kembali
                        </a>
                    </div>
                    <div class="text-sm">
                        {{ $santris->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
