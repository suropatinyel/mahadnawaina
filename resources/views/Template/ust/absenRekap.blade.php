<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rekap Absensi Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 min-h-screen">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-green-700 text-center">
            @if($bulan)
                Rekap Bulan {{ DateTime::createFromFormat('!m', $bulan)->format('F') }} {{ $tahun }}
            @elseif($semester)
                Rekap Semester {{ $semester }} - Tahun {{ $tahun }}
            @else
                Rekap Absensi
            @endif
        </h1>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('absensi.rekap') }}" class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-6">
            <div>
                <label class="block text-sm font-medium">Bulan</label>
                <select name="bulan" class="w-full border rounded p-2">
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ request('bulan', $bulan) == $i ? 'selected' : '' }}>
                            {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                        </option>
                    @endfor
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Tahun</label>
                <select name="tahun" class="w-full border rounded p-2">
                    @for($y = 2023; $y <= now()->year; $y++)
                        <option value="{{ $y }}" {{ request('tahun', $tahun) == $y ? 'selected' : '' }}>{{ $y }}</option>
                    @endfor
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Kelas</label>
                <select name="kelas_id" class="w-full border rounded p-2">
                    <option value="">Pilih Kelas</option>
                    @foreach($kelasOptions as $id => $nama)
                        <option value="{{ $id }}" {{ request('kelas_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Kamar</label>
                <select name="kamar_id" class="w-full border rounded p-2">
                    <option value="">Pilih Kamar</option>
                    @foreach($kamarOptions as $id => $nama)
                        <option value="{{ $id }}" {{ request('kamar_id') == $id ? 'selected' : '' }}>{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Semester</label>
                <select name="semester" class="w-full border rounded p-2">
                    <option value="">Pilih Semester</option>
                    <option value="1" {{ request('semester') == '1' ? 'selected' : '' }}>Semester 1</option>
                    <option value="2" {{ request('semester') == '2' ? 'selected' : '' }}>Semester 2</option>
                </select>
            </div>
            <div class="flex justify-end items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-700">
                    Filter
                </button>
            </div>
        </form>

        <!-- Table Rekap -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
                <thead>
                    <tr class="bg-gray-100 text-sm text-gray-700 text-center">
                        <th class="p-3">No</th>
                        <th class="p-3 text-left">Nama Santri</th>
                        <th class="p-3">Hadir</th>
                        <th class="p-3">Izin</th>
                        <th class="p-3">Sakit</th>
                        <th class="p-3">Alfa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rekap as $santriId => $data)
                        <tr class="border-t text-center text-sm">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2 text-left">{{ $santris[$santriId]->user->name ?? '-' }}</td>
                            <td class="p-2">{{ $data['hadir'] }}</td>
                            <td class="p-2">{{ $data['izin'] }}</td>
                            <td class="p-2">{{ $data['sakit'] }}</td>
                            <td class="p-2">{{ $data['alfa'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500">Tidak ada data absensi untuk periode ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('ustDashboard') }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                &larr; Kembali
            </a>
        </div>
    </div>
</body>
</html>
