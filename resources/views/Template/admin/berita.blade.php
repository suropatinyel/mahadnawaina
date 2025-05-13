<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #597E46;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen px-4">
    <div class="bg-white rounded-xl shadow-lg px-8 py-10 w-full max-w-xl">
        <h1 class="text-3xl font-bold text-center text-green-700 mb-4">Tambah Data Berita</h1>
        <div class="border-t-4 border-yellow-500 w-24 mx-auto mb-6"></div>

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                <div>
                    <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                    <input type="text" name="judul" id="judul" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-700" placeholder="Masukkan Judul Berita" required>
                </div>

                <div>
                    <label for="isi" class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
                    <textarea name="isi" id="isi" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-700" placeholder="Tulis isi berita..." required></textarea>
                </div>

                <div>
                    <label for="tanggal_publikasi" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Publikasi</label>
                    <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                </div>

                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Gambar Berita</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                </div>

                <div>
                    <label for="link" class="block text-sm font-medium text-gray-700 mb-1">Link Tautan</label>
                    <input type="url" name="link" id="link" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-700" placeholder="https://..." required>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-700" required>
                        <option value="draft">Draft</option>
                        <option value="terbit">Terbit</option>
                    </select>
                </div>

                <div class="flex justify-end pt-4 space-x-2">
                    <a href="{{ route('template.admin.beritaData') }}"
                       class="bg-gray-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Close
                    </a>
                    <button type="submit"
                        class="bg-green-700 text-white font-semibold px-4 py-2 rounded-lg hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-700">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
