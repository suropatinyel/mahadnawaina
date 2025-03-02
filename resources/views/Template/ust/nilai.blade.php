<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="max-w-7xl mx-auto p-4">
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-green-700">Nilai Santri</h1>
                <button class="bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah
                </button>
            </div>
            <div class="flex mb-4">
                <input type="text" placeholder="search" class="border border-gray-300 rounded-lg p-2 w-full">
                <button class="bg-green-700 text-white px-4 py-2 rounded-lg ml-2">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 bg-yellow-500 text-left px-4 py-2">Nama</th>
                            <th class="border border-gray-300 bg-yellow-500 text-left px-4 py-2">No.Induk</th>
                            <th class="border border-gray-300 bg-orange-500 text-left px-4 py-2">Mata Pelajaran</th>
                            <th class="border border-gray-300 bg-yellow-500 text-left px-4 py-2" colspan="3">Nilai</th>
                        </tr>
                        <tr>
                            <th class="border border-gray-300 bg-yellow-500 text-left px-4 py-2"></th>
                            <th class="border border-gray-300 bg-yellow-500 text-left px-4 py-2"></th>
                            <th class="border border-gray-300 bg-orange-500 text-left px-4 py-2"></th>
                            <th class="border border-gray-300 bg-gray-700 text-white text-left px-4 py-2">Ulangan</th>
                            <th class="border border-gray-300 bg-gray-700 text-white text-left px-4 py-2">UTS</th>
                            <th class="border border-gray-300 bg-gray-700 text-white text-left px-4 py-2">Ujian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Repeat this row as needed -->
                        <tr>
                            <td class="border border-gray-300 bg-gray-200 px-4 py-2"></td>
                            <td class="border border-gray-300 bg-gray-200 px-4 py-2"></td>
                            <td class="border border-gray-300 bg-white px-4 py-2"></td>
                            <td class="border border-gray-300 bg-gray-700 px-4 py-2"></td>
                            <td class="border border-gray-300 bg-gray-700 px-4 py-2"></td>
                            <td class="border border-gray-300 bg-gray-700 px-4 py-2"></td>
                        </tr>
                        <!-- Repeat this row as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>