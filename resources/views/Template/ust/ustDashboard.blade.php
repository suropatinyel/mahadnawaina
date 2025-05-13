<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard Ustadz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-6xl">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Header -->
            <div class="flex items-center justify-between border-b pb-6 mb-6">
                <div class="flex items-center space-x-4">
                    <img alt="Logo" width="50" height="50" class="rounded-full shadow-md" src="{{ asset('Logo.png') }}" />
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Mahad Nawaina</h1>
                        <h2 class="text-orange-600 text-sm uppercase tracking-wide">MTSN 2 Kota Malang</h2>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl shadow">
                        Logout
                    </button>
                </form>
            </div>

            <!-- Welcome Banner -->
            <div class="relative bg-green-50 rounded-xl shadow-inner text-center mb-8 overflow-hidden">
                <div class="absolute inset-0">
                <img src="{{ asset('schoolbanner.jpg') }}" alt="schoolbanner" class="w-full h-full object-cover opacity-40">
                </div>
                <div class="relative p-6 z-10">
                    <h1 class="text-3xl font-bold text-yellow-500 mb-2">SELAMAT DATANG USTADZ/USTADZAH</h1>
                    <p class="text-gray-800 font-medium">Anda Berhasil Login!</p>
                </div>
            </div>

            <!-- Action Cards -->
            <div class="flex justify-center">
                <a href="{{ route('template.ust.absen1') }}" class="bg-green-500 hover:bg-green-600 text-white p-6 rounded-2xl text-center font-semibold shadow-md transition transform hover:scale-105 w-64">
                    Data Presensi
                </a>
            </div>                <!-- Tambahkan card lainnya jika dibutuhkan -->
            </div>
        </div>
    </div>
</body>

</html>
