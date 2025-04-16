<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="max-w-5xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Daftar Berita MTsN 2 Kota Malang</h1>

        <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow mt-6">
    <thead>
        <tr class="bg-gray-200 text-gray-700">
            <th class="px-4 py-2 text-left">Judul</th>
            <th class="px-4 py-2 text-left">Tanggal Publikasi</th>
            <th class="px-4 py-2 text-left">Status</th>
            <th class="px-4 py-2 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($beritas as $berita)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $berita->judul }}</td>
            <td class="px-4 py-2">{{ $berita->tanggal_publikasi }}</td>
            <td class="px-4 py-2 capitalize">{{ $berita->status }}</td>
            <td class="px-4 py-2 text-center space-x-2">
                <!-- Tombol Edit -->
                <a href="{{ route('template.admin.beritaEdit', $berita->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>

                <!-- Tombol Hapus -->
                <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-6">
    {{ $beritas->links() }}
</div>

        </div>

            <!-- Tombol Tambah dan Hapus Data -->
            <div class="mt-6 flex justify-end space-x-3">
                <!-- Tombol Tambah -->
                <a href="{{ route('template.admin.berita.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    + Tambah Berita
                </a>

                <!-- Tombol Hapus -->

                <form action="{{ route('adminDashboard') }}" method="GET">
                    <button type="submit"
                        class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                        kembali
                    </button>
                </form>
            </div>
    </div>

</body>
</html>
