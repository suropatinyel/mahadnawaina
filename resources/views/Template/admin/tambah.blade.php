<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-center text-green-700 text-xl font-bold mb-4">Tambah Data</h1>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700">Nama</label>
                    <input type="text" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="mb-4 flex space-x-2">
                    <div class="w-1/2">
                        <label class="block text-gray-700">NISN</label>
                        <input type="text" class="w-full border border-gray-300 rounded p-2">
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700">Tgl Lahir</label>
                        <input type="date" class="w-full border border-gray-300 rounded p-2">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Tempat Lahir</label>
                    <input type="text" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="mb-4 flex space-x-2">
                    <div class="w-1/2">
                        <label class="block text-gray-700">Jenis Kelamin</label>
                        <div class="flex items-center space-x-2">
                            <label class="flex items-center">
                                <input type="radio" name="gender" class="form-radio">
                                <span class="ml-2">L</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="gender" class="form-radio">
                                <span class="ml-2">P</span>
                            </label>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700">Anak Ke</label>
                        <input type="number" class="w-full border border-gray-300 rounded p-2">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Alamat Santri</label>
                    <input type="text" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">No Tlpn Santri</label>
                    <input type="text" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="mb-4 flex space-x-2">
                    <div class="w-1/2">
                        <label class="block text-gray-700">Nama Ayah</label>
                        <input type="text" class="w-full border border-gray-300 rounded p-2">
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700">Nama Ibu</label>
                        <input type="text" class="w-full border border-gray-300 rounded p-2">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Alamat Orang Tua</label>
                    <input type="text" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">No Tlpn Orang Tua</label>
                    <input type="text" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="mb-4 flex space-x-2">
                    <div class="w-1/2">
                        <label class="block text-gray-700">Pekerjaan Ayah</label>
                        <input type="text" class="w-full border border-gray-300 rounded p-2">
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700">Pekerjaan Ibu</label>
                        <input type="text" class="w-full border border-gray-300 rounded p-2">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Wali</label>
                    <input type="text" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Alamat Wali</label>
                    <input type="text" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">No Tlpn Wali</label>
                    <input type="text" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Pekerjaan Wali</label>
                    <input type="text" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Scan/Foto Kartu Keluarga</label>
                    <input type="file" class="w-full border border-gray-300 rounded p-2">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>