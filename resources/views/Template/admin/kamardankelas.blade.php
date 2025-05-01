<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pilih Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white p-10 rounded-2xl shadow-lg text-center w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-green-700">Pilih Data yang Ingin Diedit</h1>

        <div class="space-y-4">
            <a href="{{ route('template.admin.editKamar') }}"
               class="block w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition duration-200">
                Edit Data Kamar
            </a>

            <a href="{{ route('template.admin.editKelas') }}"
               class="block w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl font-semibold transition duration-200">
                Edit Data Kelas
            </a>
        </div>
    </div>
</body>
</html>
