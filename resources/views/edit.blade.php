<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </link>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-center text-green-800 text-xl font-bold mb-4">Edit Data</h1>
        <form>
            <div class="mb-4">
                <label class="block text-gray-700">Nama <span class="text-red-500">*</span></label>
                <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700">NISN <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700">Tgl Lahir <span class="text-red-500">*</span></label>
                    <input type="date" class="w-full border border-green-500 rounded px-3 py-2">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Tempat Lahir <span class="text-red-500">*</span></label>
                <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <div class="flex items-center space-x-2">
                        <label class="flex items-center">
                            <input type="radio" name="gender" class="form-radio text-green-500">
                            <span class="ml-2">L</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="gender" class="form-radio text-green-500">
                            <span class="ml-2">P</span>
                        </label>
                    </div>
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700">Anak Ke <span class="text-red-500">*</span></label>
                    <input type="number" class="w-full border border-green-500 rounded px-3 py-2">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Alamat Santri <span class="text-red-500">*</span></label>
                <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">No Tlpn Santri <span class="text-red-500">*</span></label>
                <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700">Nama Ayah <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700">Nama Ibu <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Alamat Orang Tua <span class="text-red-500">*</span></label>
                <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">No Tlpn Orang Tua <span class="text-red-500">*</span></label>
                <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700">Pekerjaan Ayah <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700">Pekerjaan Ibu <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Nama Wali <span class="text-red-500">*</span></label>
                <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Alamat Wali <span class="text-red-500">*</span></label>
                <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">No Tlpn Wali <span class="text-red-500">*</span></label>
                <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Pekerjaan Wali <span class="text-red-500">*</span></label>
                <input type="text" class="w-full border border-green-500 rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Scan/Foto Kartu Keluarga <span class="text-red-500">*</span></label>
                <div class="flex items-center border border-green-500 rounded px-3 py-2">
                    <input type="file" class="w-full">
                    <i class="fas fa-upload text-gray-500"></i>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded">Edit</button>
            </div>
        </form>
    </div>
</body>

</html>