<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Admin Dashboard
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Main Content -->
        <div class="w-4/5 p-8">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center">
                    <img alt="School Logo" class="mr-4" height="50" src="https://storage.googleapis.com/a1aa/image/0ZxZmx8qAqbnb3SMsPR8VUXTjReHKV8eAkm3fIAOoGc.jpg" width="50" />
                    <div>
                        <h1 class="text-xl font-bold">
                            Ma'Had Nawaina
                        </h1>
                        <h2 class="text-orange-600">
                            MTSN 2 Kota Malang
                        </h2>
                    </div>
                </div>
                <!-- Buttons -->
                <div class="flex space-x-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Logout
                        </button>
                    </form>
                    <a href="{{ route('auth.login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Sign In
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-4">
                <img alt="Students in class" class="rounded-lg mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/TheJpYh7L11TV0-RGu7z54DYx2Q5IDrmNe-amjrBHR0.jpg" width="800" />
                <div class="text-center">
                    <h1 class="text-3xl font-bold text-yellow-500">
                        SELAMAT DATANG ADMIN
                    </h1>
                    <p class="text-gray-700">
                        Anda Berhasil Login sebagai Admin!
                    </p>
                </div>
            </div>
            <!-- Action Buttons -->
            <div class="mt-8 grid grid-cols-2 md:grid-cols-3 gap-4">
                <a href="{{ route('template.admin.beritaData') }}" class="bg-green-500 text-white px-4 py-2 rounded text-center hover:bg-green-600">
                    Berita
                </a>
                <a href="{{ route('template.admin.datasantri') }}" class="bg-green-500 text-white px-4 py-2 rounded text-center hover:bg-green-600">
                    Data Santri
                </a>
                <a href="{{ route('template.admin.dataust') }}" class="bg-green-500 text-white px-4 py-2 rounded text-center hover:bg-green-600">
                    Data Ustadz
                </a>
                <a href="{{ route('template.admin.dataPetugas') }}" class="bg-green-500 text-white px-4 py-2 rounded text-center hover:bg-green-600">
                    Data Petugas
                </a>
                <a href="{{ route('template.petugas.pembayaranSantri') }}" class="bg-green-500 text-white px-4 py-2 rounded text-center hover:bg-green-600">
                    Data Pembayaran
                </a>
            </div>
        </div>
    </div>
</body>

</html>