<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="flex items-center justify-center min-h-screen" style="background-color: #3B6725D6;">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h1 class="text-center text-2xl font-bold text-green-700 mb-4">SIGN IN</h1>
        <div class="border-t-4 border-yellow-500 w-16 mx-auto mb-6"></div>
        <form class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">NISN <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tgl Lahir <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        <i class="fas fa-calendar-alt absolute top-2 right-2 text-gray-400"></i>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Tempat Lahir <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Jenis Kelamin <span class="text-red-500">*</span></label>
                    <div class="flex items-center mt-1">
                        <input type="radio" name="gender" class="h-4 w-4 text-green-600 border-gray-300 focus:ring-green-500">
                        <label class="ml-2 text-sm font-medium text-gray-700">L</label>
                        <input type="radio" name="gender" class="ml-4 h-4 w-4 text-green-600 border-gray-300 focus:ring-green-500">
                        <label class="ml-2 text-sm font-medium text-gray-700">P</label>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Anak Ke <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat Santri <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">No Tlp Santri <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Ayah <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Ibu <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat Orang Tua <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">No Tlp Orang Tua <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pekerjaan Ayah <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Pekerjaan Ibu <span class="text-red-500">*</span></label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Wali <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat Wali <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">No Tlp Wali <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Pekerjaan Wali <span class="text-red-500">*</span></label>
                <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Scan/Foto Kartu Keluarga <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <i class="fas fa-upload absolute top-2 right-2 text-gray-400"></i>
                </div>
            </div>
            <div>
                <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">Sign In</button>
            </div>
        </form>
    </div>
</body>

</html>