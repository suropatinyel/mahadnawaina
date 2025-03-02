<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </link>
</head>

<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto p-4">
        <div class="bg-white rounded-lg shadow p-4">
            <h1 class="text-2xl font-bold text-green-800 mb-4">Presensi Santri</h1>
            <div class="flex items-center mb-4">
                <input type="text" placeholder="search" class="border rounded-l-lg p-2 flex-grow">
                <button class="bg-green-800 text-white p-2 rounded-r-lg">
                    <i class="fas fa-search"></i>
                </button>
                <button class="bg-white border border-green-800 text-green-800 p-2 rounded-lg ml-4 flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="bg-yellow-500 text-left p-2">Nama</th>
                            <th class="bg-black text-white p-2">Bulan</th>
                            <th class="bg-gray-300 p-2">Bulan</th>
                            <th class="bg-green-800 text-white p-2">H</th>
                            <th class="bg-green-800 text-white p-2">S</th>
                            <th class="bg-green-800 text-white p-2">I</th>
                            <th class="bg-green-800 text-white p-2">A</th>
                            <th class="bg-yellow-500 text-left p-2">KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Repeat for each row -->
                        <tr>
                            <td class="bg-gray-200 p-2"></td>
                            <td class="bg-gray-800 p-2"></td>
                            <td class="bg-gray-800 p-2"></td>
                            <td class="bg-gray-800 p-2"></td>
                            <td class="bg-gray-800 p-2"></td>
                            <td class="bg-gray-800 p-2"></td>
                            <td class="bg-gray-800 p-2"></td>
                            <td class="bg-gray-200 p-2"></td>
                        </tr>
                        <!-- Repeat for each row -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>