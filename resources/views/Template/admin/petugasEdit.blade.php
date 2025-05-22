<!-- resources/views/petugas/update.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Petugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-green-700 mb-6">Edit Data Petugas</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Nama</label>
                <input type="text" name="name" value="{{ old('name', $petugas->user->name) }}" 
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $petugas->user->email) }}" 
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Password <span class="text-sm text-gray-500">(Kosongkan jika tidak diubah)</span></label>
                <input type="password" name="password" 
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Alamat</label>
                <textarea name="alamat" rows="3"
                          class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>{{ old('alamat', $petugas->alamat) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-semibold text-gray-700">No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $petugas->no_hp) }}" 
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('template.admin.dataPetugas') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                    Kembali
                </a>

                <button type="submit" 
                        class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>
