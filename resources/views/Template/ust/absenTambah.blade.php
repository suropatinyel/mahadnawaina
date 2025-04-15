<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Absensi Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-6">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-4 text-green-700">Tambah Absensi Santri</h2>

        {{-- 🔍 Form Filter Kelas dan Kamar --}}
        <form method="GET" action="{{ route('template.ust.absenTambah') }}" class="mb-6 flex flex-wrap gap-4">
            <div>
                <label class="block font-medium mb-1">Kelas</label>
                <select name="kelas" class="p-2 border rounded">
                    <option value="">Semua</option>
                    @foreach ($kelasOptions as $id => $nama)
                        <option value="{{ $id }}" {{ request('kelas') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block font-medium mb-1">Kamar</label>
                <select name="kamar" class="p-2 border rounded">
                    <option value="">Semua</option>
                    @foreach ($kamarOptions as $id => $nama)
                        <option value="{{ $id }}" {{ request('kamar') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Tampilkan Santri
                </button>
            </div>
        </form>

        {{-- 📝 Form Tambah Absensi --}}
        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

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
                        @foreach ($santris as $index => $santri)
                            <tr class="hover:bg-gray-50">
                                <td class="border p-3">{{ $index + 1 }}</td>
                                <td class="border p-3">{{ $santri->user->name }}</td>
                                <td class="border p-3">
                                    <select name="status[{{ $santri->id }}]" class="w-full p-2 border rounded">
                                        <option value="hadir">Hadir</option>
                                        <option value="izin">Izin</option>
                                        <option value="sakit">Sakit</option>
                                        <option value="alfa">Alfa</option>
                                    </select>
                                </td>
                                <td class="border p-3">
                                    <input type="text" name="keterangan[{{ $santri->id }}]" class="w-full p-2 border rounded" placeholder="Opsional">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Simpan Absensi
                </button>
                <a href="{{ route('template.ust.absen1') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
