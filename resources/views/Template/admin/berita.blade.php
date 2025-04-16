<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengumuman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #597E46;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
        <h1 class="text-3xl font-bold text-center text-green-700 mb-3">Tambah Data Pengumuman</h1>
        <div class="border-t-4 border-yellow-500 w-20 mx-auto mb-6"></div>

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Pengumuman</label>
                <input type="text" name="judul" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700" id="judul" placeholder="Masukkan Judul Pengumuman" required>
            </div>
                        
            <div class="mb-6">
                <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">Isi Pengumuman</label>
                <textarea name="isi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700" id="isi" rows="5" required></textarea>
            </div>
            
            <div class="mb-4">
                <label for="tanggal_publikasi" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Publikasi</label>
                <input type="date" id="tanggal_publikasi" name="tanggal_publikasi" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700" required>
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar Pengumuman</label>
                <input type="file" name="gambar" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700" id="gambar" accept="image/*" required>
            </div>
            
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status Pengumuman</label>
                <select name="status" id="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700" required>
                    <option value="draft">Draft</option>
                    <option value="terbit">Terbit</option>
                </select>
            </div>
            
            <div class="flex justify-end">
    <!-- Tombol Close diarahkan ke route daftar berita -->
    <a href="{{ route('template.admin.beritaData') }}"
       class="bg-gray-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">
        Close
    </a>

    <!-- Tombol Save untuk submit form -->
    <button type="submit"
        class="bg-green-700 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700">
        Save
    </button>
</div>
        </form>
    </div>
</body>

</html>
