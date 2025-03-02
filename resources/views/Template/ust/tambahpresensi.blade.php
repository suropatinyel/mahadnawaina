<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-center text-2xl font-bold text-green-700 mb-2">Presensi</h1>
        <div class="border-b-4 border-orange-500 w-16 mx-auto mb-6"></div>
        <form>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="nama">Nama</label>
                <input class="w-full px-3 py-2 border border-green-700 rounded" type="text" id="nama" name="nama">
                <span class="text-red-500">*</span>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="tanggal">Tanggal</label>
                <input class="w-full px-3 py-2 border border-green-700 rounded" type="date" id="tanggal" name="tanggal">
                <span class="text-red-500">*</span>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Status</label>
                <div class="flex items-center mb-2">
                    <input class="mr-2" type="radio" id="hadir" name="status" value="hadir">
                    <label for="hadir">Hadir</label>
                </div>
                <div class="flex items-center mb-2">
                    <input class="mr-2" type="radio" id="sakit" name="status" value="sakit">
                    <label for="sakit">Sakit</label>
                </div>
                <div class="flex items-center mb-2">
                    <input class="mr-2" type="radio" id="izin" name="status" value="izin">
                    <label for="izin">Izin</label>
                </div>
                <div class="flex items-center">
                    <input class="mr-2" type="radio" id="alpha" name="status" value="alpha">
                    <label for="alpha">Alpha</label>
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="keterangan">Keterangan</label>
                <textarea class="w-full px-3 py-2 border border-green-700 rounded" id="keterangan" name="keterangan"></textarea>
                <span class="text-red-500">*</span>
            </div>
            <div class="text-center">
                <button class="bg-orange-500 text-white px-6 py-2 rounded-full">Tambah</button>
            </div>
        </form>
    </div>
</body>

</html>