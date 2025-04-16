<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kelas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <!-- Header -->
        <div class="flex items-center mb-6">
            <img src="" alt="School Logo" class="h-12 w-12 mr-4">
            <div>
                <h1 class="text-xl font-bold text-gray-800">Ma'Had Nawaina</h1>
                <h2 class="text-sm text-orange-600">MTSN 2 Kota Malang</h2>
            </div>
        </div>

        <!-- Judul dan Tombol -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-green-700">Daftar Kelas</h1>
            <a href="{{ route('template.kamar.kelasTambah') }}" class="bg-orange-500 hover:bg-orange-700 text-white px-4 py-2 rounded text-sm">+ Tambah Kelas</a>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
    <thead>
        <tr>
            <th class="px-4 py-2 border-b">Nama</th>
            <th class="px-4 py-2 border-b">Tingkat</th>
            <th class="px-4 py-2 border-b">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelass as $kelas)
            <tr class="hover:bg-gray-50 text-center">
                <td class="border-b px-4 py-2">{{ $kelas->nama }}</td>
                <td class="border-b px-4 py-2">{{ $kelas->tingkat }}</td>
                <td class="border-b px-4 py-2 space-x-2">
                    <a href="{{ route('template.kamar.kelasEdit', $kelas->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-100 text-red-600 px-2 py-1 rounded hover:bg-red-200 text-xs">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Menambahkan Link Pagination -->
<div class="mt-4">
    {{ $kelass->links() }}
</div>

<!-- Tombol Kembali -->
<div class="flex justify-start mt-4">
    <a href="{{ route('adminDashboard') }}" class="bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded">
        Kembali
    </a>
</div>

</body>
</html>
