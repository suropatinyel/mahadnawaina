<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Absensi Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-green-700">Edit Absensi Santri</h1>

        <!-- Form Edit Absensi -->
        <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="overflow-x-auto rounded shadow border border-gray-200">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-3 text-left">No</th>
                            <th class="border p-3 text-left">Nama Santri</th>
                            <th class="border p-3 text-left">Status</th>
                            <th class="border p-3 text-left">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-50">
                            <td class="border p-3">1</td>
                            <td class="border p-3">{{ $absensi->santri->user->name }}</td>
                            <td class="border p-3">
                                <select name="status" class="w-full p-2 border rounded">
                                    <option value="hadir" {{ $absensi->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                    <option value="izin" {{ $absensi->status == 'izin' ? 'selected' : '' }}>Izin</option>
                                    <option value="sakit" {{ $absensi->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                    <option value="alfa" {{ $absensi->status == 'alfa' ? 'selected' : '' }}>Alfa</option>
                                </select>
                            </td>
                            <td class="border p-3">
                                <input type="text" name="keterangan" value="{{ old('keterangan', $absensi->keterangan) }}" class="w-full p-2 border rounded" placeholder="Opsional">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Simpan Perubahan
                </button>
                <a href="{{ route('template.ust.absen1') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
