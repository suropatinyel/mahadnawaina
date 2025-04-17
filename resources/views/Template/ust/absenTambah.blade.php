<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Absensi Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-6">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6 text-green-700">Tambah Absensi Santri</h2>

        {{-- 🔍 Filter Kelas & Kamar --}}
        <form method="GET" action="{{ route('template.ust.absenTambah') }}" class="mb-6 flex flex-wrap gap-4">
            <div>
                <label class="block text-sm font-semibold mb-1">Kelas</label>
                <select name="kelas" class="p-2 border border-gray-300 rounded w-48">
                    <option value="">Semua</option>
                    @foreach ($kelasOptions as $id => $nama)
                        <option value="{{ $id }}" {{ request('kelas') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-1">Kamar</label>
                <select name="kamar" class="p-2 border border-gray-300 rounded w-48">
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

        {{-- 📝 Form Absensi --}}
        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

            <div class="overflow-x-auto bg-white rounded shadow border border-gray-200">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-gray-100 text-gray-700 text-sm">
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
                    <tbody class="text-sm text-gray-800">
                        @foreach($santris as $santri)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $santri->user->name }}</td>

                            {{-- Radio Buttons --}}
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
            <div class="mt-6 flex justify-between items-center">
                <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">
                    Simpan Absensi
                </button>
                <a href="{{ route('template.ust.absen1') }}" class="text-gray-600 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>
</body>
</html>
