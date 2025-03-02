<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <div class="bg-white p-4 rounded shadow">
                <h1 class="text-2xl font-bold text-green-800 mb-4">Data Santri</h1>
                <div class="flex items-center mb-4">
                    <input type="text" placeholder="search" class="border rounded-l px-4 py-2 w-full">
                    <button class="bg-gray-200 border-l px-4 py-2">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="bg-orange-500 text-white px-4 py-2 rounded-r ml-2">
                        <i class="fas fa-plus mr-2"></i> Tambah Data
                    </button>
                </div>
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">NISN</th>
                            <th class="border p-2">Tgl Lahir</th>
                            <th class="border p-2">Tempat Lahir</th>
                            <th class="border p-2">Jenis Kelamin</th>
                            <th class="border p-2">Anak Ke</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-100">
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                        </tr>
                        <tr class="bg-yellow-300">
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                        </tr>
                        <tr class="bg-gray-100">
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                            <td class="border p-2"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end mt-4">
                    <button class="bg-yellow-500 text-white px-4 py-2 rounded mr-2">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>