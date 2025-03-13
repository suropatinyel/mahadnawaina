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

        <form>
            <div class="mb-4">
                <label for="judulPengumuman" class="block text-sm font-medium text-gray-700 mb-2">Judul Pengumuman</label>
                <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700" id="judulPengumuman" placeholder="Masukkan Judul Pengumuman">
            </div>
            <div class="mb-4">
                <label for="jenisPengumuman" class="block text-sm font-medium text-gray-700 mb-2">Jenis Pengumuman</label>
                <div>
                    <button type="button" class="btn btn-outline-primary px-4 py-2 mr-2">Internal</button>
                    <button type="button" class="btn btn-outline-secondary px-4 py-2">Eksternal</button>
                </div>
            </div>
            <div class="mb-6">
                <label for="isiPengumuman" class="block text-sm font-medium text-gray-700 mb-2">Isi Pengumuman</label>
                <textarea class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700" id="isiPengumuman" rows="5"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="button" class="bg-gray-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">Close</button>
                <button type="submit" class="bg-green-700 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700">Save</button>
            </div>
        </form>
    </div>
</body>

</html>