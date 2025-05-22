<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kamar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-green-700 mb-1">Tambah Kamar</h1>
            <p class="text-sm text-gray-600">Silakan lengkapi data kamar di bawah ini.</p>
        </div>

        <!-- Form Tambah -->
        <form action="{{ route('kamar.store') }}" method="POST">
            @csrf

            <!-- Nama Kelas -->
            <div class="mb-4">
                <label for="nama_kelas" class="block text-sm font-medium text-gray-700">Nama Kamar</label>
                <input type="text" name="nama" id="nama" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-green-500 focus:border-green-500" required>
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tingkat -->
           <!-- Tombol -->
            <div class="flex justify-end">
                <a href="{{ route('template.kamar.kamar') }}" class="mr-2 bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded">Batal</a>
                <!-- Mengganti tag <a> menjadi <button> -->
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>

</body>
</html>
