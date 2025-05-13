<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Absensi Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold mb-8 text-green-700">Tambah Absensi Santri</h2>

        {{-- 🔍 Filter Kelas & Kamar --}}
        <form method="GET" action="{{ route('template.ust.absenTambah') }}" class="mb-8 bg-white p-6 rounded-lg shadow-sm flex flex-wrap gap-6">
            <div>
                <label class="block text-sm font-semibold mb-2 text-gray-700">Kelas</label>
                <select name="kelas" class="p-2 border border-gray-300 rounded w-48">
                    <option value="">Semua</option>
                    @foreach ($kelasOptions as $id => $nama)
                        <option value="{{ $id }}" {{ request('kelas') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2 text-gray-700">Kamar</label>
                <select name="kamar" class="p-2 border border-gray-300 rounded w-48">
                    <option value="">Semua</option>
                    @foreach ($kamarOptions as $id => $nama)
                        <option value="{{ $id }}" {{ request('kamar') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition">
                    Tampilkan Santri
                </button>
            </div>
        </form>

        {{-- 📝 Form Absensi --}}
        <form action="{{ route('absensi.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
            @csrf

            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2 text-left">Nama Santri</th>
                            <th class="border px-4 py-2">Hadir</th>
                            <th class="border px-4 py-2">Izin</th>
                            <th class="border px-4 py-2">Sakit</th>
                            <th class="border px-4 py-2">Alfa</th>
                            <th class="border px-4 py-2 text-left">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        @foreach($santris as $santri)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $santri->user->name }}</td>

                            @foreach (['hadir', 'izin', 'sakit', 'alfa'] as $status)
                                <td class="border px-4 py-2 text-center">
                                    <input type="radio" name="status[{{ $santri->id }}]" value="{{ $status }}" required>
                                </td>
                            @endforeach

                            <td class="border px-4 py-2">
                                <input type="text" name="keterangan[{{ $santri->id }}]" class="w-full p-2 border border-gray-300 rounded" placeholder="Opsional">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- 🔘 Tombol Aksi --}}
            <div class="mt-8 flex justify-between">
                <a href="{{ route('template.ust.absen1') }}" class=" bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-md font-semibold shadow-sm transition">
                    ← Batal
                </a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md font-semibold shadow-sm transition">
                    Simpan Absensi
                </button>
            </div>
        </form>
    </div>
</body>
</html>
