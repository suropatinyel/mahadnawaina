<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-green-800">Pembayaran</h1>
                <div class="flex items-center space-x-2">
                    <input type="text" placeholder="search" class="border rounded-lg p-2">
                    <button class="bg-orange-500 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-plus mr-2"></i>Tambah Data
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="w-full bg-yellow-500">
                            <th class="py-2 px-4 text-left">NAMA</th>
                            <th class="py-2 px-4 text-left">User Id</th>
                            <th class="py-2 px-4 text-left">Kode Trans</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-100">
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                            <td class="py-2 px-4 border-b"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-end mt-4 space-x-2">
                <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="bg-red-500 text-white px-4 py-2 rounded-lg">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
</body>

</html>