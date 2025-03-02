<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-center text-green-800 text-xl font-bold mb-4">Edit Data</h1>
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">NISN <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tgl Lahir <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
                        <i class="fas fa-calendar-alt absolute top-3 right-3 text-gray-400"></i>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tempat Lahir <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <div class="flex items-center mt-1">
                        <input type="radio" name="gender" class="mr-2"> L
                        <input type="radio" name="gender" class="ml-4 mr-2"> P
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Anak Ke</label>
                <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat Santri <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">No Tlp Santri <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Ayah <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Ibu <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat Orang Tua <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">No Tlp Orang Tua <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pekerjaan Ayah <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pekerjaan Ibu <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Wali</label>
                <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat Wali</label>
                <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">No Tlp Wali</label>
                <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Pekerjaan Wali</label>
                <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Scan/Foto Kartu Keluarga <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="text" class="mt-1 block w-full border border-green-600 rounded-md p-2">
                    <i class="fas fa-upload absolute top-3 right-3 text-gray-400"></i>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded-md">Edit</button>
            </div>
        </form>
    </div>
</body>

</html>