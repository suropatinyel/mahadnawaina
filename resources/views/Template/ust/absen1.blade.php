<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Absensi Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-green-700">Daftar Absensi Santri</h1>

<!-- Filter -->
<form action="{{ route('template.ust.absen1') }}" method="GET" class="mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block">Kelas Sekolah</label>
            <select name="kelas" class="w-full border rounded p-2">
                <option value="">Pilih Kelas</option>
                @foreach($kelasOptions as $id => $name)
                    <option value="{{ $id }}" {{ request('kelas') == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">Kamar</label>
            <select name="kamar" class="w-full border rounded p-2">
                <option value="">Pilih Kamar</option>
                @foreach($kamarOptions as $id => $name)
                    <option value="{{ $id }}" {{ request('kamar') == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end items-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Filter</button>
        </div>
    </div>
</form>
        <!-- Daftar Absensi -->
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 text-left">Nama Santri</th>
                    <th class="p-3 text-left">Tanggal</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Keterangan</th>
                    <th class="p-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensis as $absen)
                    <tr>
                        <td class="p-3">{{ $absen->santri->user->name }}</td>
                        <td class="p-3">{{ $absen->tanggal->format('d/m/Y') }}</td>
                        <td class="p-3">{{ ucfirst($absen->status) }}</td>
                        <td class="p-3">{{ $absen->keterangan }}</td>
                        <td class="p-3">
                            <a href="{{ route('absensi.edit', $absen->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('absensi.destroy', $absen->id) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
