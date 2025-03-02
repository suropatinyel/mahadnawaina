<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Presensi Santri
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <h1 class="text-2xl font-bold text-green-800 mb-4">
                Presensi Santri
            </h1>
            <div class="flex mb-4">
                <input class="border rounded-l px-4 py-2 w-full" placeholder="search" type="text" />
                <button class="bg-gray-200 border border-l-0 rounded-r px-4 py-2">
                    <i class="fas fa-search">
                    </i>
                </button>
                <select class="border rounded ml-4 px-4 py-2">
                    <option value="">
                        pilih kamar
                    </option>
                </select>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="bg-yellow-500 text-left px-4 py-2">
                                Nama
                            </th>
                            <th class="bg-black text-white px-4 py-2">
                                Bulan
                            </th>
                            <th class="bg-black text-white px-4 py-2">
                                Bulan
                            </th>
                            <th class="bg-green-800 text-white px-4 py-2">
                                S
                            </th>
                            <th class="bg-green-800 text-white px-4 py-2">
                                I
                            </th>
                            <th class="bg-green-800 text-white px-4 py-2">
                                A
                            </th>
                            <th class="bg-yellow-500 text-left px-4 py-2">
                                KETERANGAN
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-gray-200 px-4 py-2">
                                Nama Santri
                            </td>
                            <td class="bg-gray-800 text-white px-4 py-2">
                            </td>
                            <td class="bg-gray-800 text-white px-4 py-2">
                            </td>
                            <td class="bg-gray-800 text-white px-4 py-2">
                            </td>
                            <td class="bg-gray-800 text-white px-4 py-2">
                            </td>
                            <td class="bg-gray-800 text-white px-4 py-2 relative">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-4 h-4 bg-orange-500 rounded-full">
                                    </div>
                                </div>
                            </td>
                            <td class="bg-gray-200 px-4 py-2">
                            </td>
                        </tr>
                        <!-- Repeat similar rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>