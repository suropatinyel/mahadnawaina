<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <h1 class="text-2xl font-bold text-green-800 mb-4">Presensi Santri</h1>
            <div class="flex mb-4">
                <input class="border rounded-l px-4 py-2 w-full" placeholder="search" type="text">
                <button class="bg-gray-200 border border-l-0 rounded-r px-4 py-2">
                    <i class="fas fa-search"></i>
                </button>
                <select class="border rounded ml-4 px-4 py-2">
                    <option value="">pilih kamar</option>
                </select>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="bg-yellow-500 text-left px-4 py-2">No</th>
                            <th class="bg-yellow-500 text-left px-4 py-2">Nama Santri</th>
                            <th class="bg-black text-white px-4 py-2">Tanggal</th>
                            <th class="bg-green-800 text-white px-4 py-2">Hadir</th>
                            <th class="bg-green-800 text-white px-4 py-2">Sakit</th>
                            <th class="bg-green-800 text-white px-4 py-2">Izin</th>
                            <th class="bg-green-800 text-white px-4 py-2">Alfa</th>
                            <th class="bg-yellow-500 text-left px-4 py-2">Keterangan</th>
                            <th class="bg-yellow-500 text-left px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-gray-200 px-4 py-2">1</td>
                            <td class="bg-gray-200 px-4 py-2">Santri 1</td>
                            <td class="bg-gray-800 text-white px-4 py-2">2025-04-10</td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-200 px-4 py-2"></td>
                            <td class="bg-gray-200 px-4 py-2">
                                <a href="#" class="text-blue-500 mr-2">Edit</a>
                                <a href="#" class="text-blue-500">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-200 px-4 py-2">2</td>
                            <td class="bg-gray-200 px-4 py-2">Santri 2</td>
                            <td class="bg-gray-800 text-white px-4 py-2">2025-04-10</td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-200 px-4 py-2">tes</td>
                            <td class="bg-gray-200 px-4 py-2">
                                <a href="#" class="text-blue-500 mr-2">Edit</a>
                                <a href="#" class="text-blue-500">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-200 px-4 py-2">3</td>
                            <td class="bg-gray-200 px-4 py-2">Santri 3</td>
                            <td class="bg-gray-800 text-white px-4 py-2">2025-04-10</td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-200 px-4 py-2"></td>
                            <td class="bg-gray-200 px-4 py-2">
                                <a href="#" class="text-blue-500 mr-2">Edit</a>
                                <a href="#" class="text-blue-500">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-200 px-4 py-2">4</td>
                            <td class="bg-gray-200 px-4 py-2">Santri 4</td>
                            <td class="bg-gray-800 text-white px-4 py-2">2025-04-10</td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-200 px-4 py-2"></td>
                            <td class="bg-gray-200 px-4 py-2">
                                <a href="#" class="text-blue-500 mr-2">Edit</a>
                                <a href="#" class="text-blue-500">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-200 px-4 py-2">5</td>
                            <td class="bg-gray-200 px-4 py-2">Santri 5</td>
                            <td class="bg-gray-800 text-white px-4 py-2">2025-04-10</td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-200 px-4 py-2"></td>
                            <td class="bg-gray-200 px-4 py-2">
                                <a href="#" class="text-blue-500 mr-2">Edit</a>
                                <a href="#" class="text-blue-500">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-200 px-4 py-2">6</td>
                            <td class="bg-gray-200 px-4 py-2">Santri 6</td>
                            <td class="bg-gray-800 text-white px-4 py-2">2025-04-10</td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-800 text-white px-4 py-2 text-center"><input type="checkbox"></td>
                            <td class="bg-gray-200 px-4 py-2"></td>
                            <td class="bg-gray-200 px-4 py-2">
                                <a href="#" class="text-blue-500 mr-2">Edit</a>
                                <a href="#" class="text-blue-500">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>