<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Ma'had Nawaina</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>

<body class="bg-white text-gray-800">

    <!-- Header Section -->
    <header class="relative">
    <img alt="Students studying in a classroom" class="w-full h-72 object-cover"
    src="{{ asset('schoolbanner.jpg') }}" />
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center px-4">
            <h1 class="text-white text-3xl md:text-5xl font-extrabold drop-shadow">SELAMAT DATANG</h1>
            <h2 class="text-orange-400 text-2xl md:text-4xl font-bold mt-2 drop-shadow">MAHAD NAWAINA</h2>
            <p class="text-white text-base md:text-lg mt-1">MTsN 2 Kota Malang</p>
        </div>
        <!-- Logout Button -->
        <div class="absolute top-4 right-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow-md transition">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="py-12 px-6 md:px-16 max-w-6xl mx-auto">
        <section class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-green-700 mb-4">Mahad Nawaina</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">
                Pendidikan formal baik madrasah maupun sekolah merupakan upaya pendidikan yang komprehensif ...
            </p>
        </section>

<!-- Registration / Payment Buttons -->
<section class="flex justify-center mb-16 gap-6">
    <!-- Pembayaran Button -->
    <a href="{{ route('template.santri.santriFoto') }}"
        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg transition transform hover:scale-105">
        Pembayaran
    </a>

    <!-- Riwayat Pembayaran Button -->
    <a href="{{ route('pembayaran.riwayat', auth()->user()->santri->id) }}"
        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg transition transform hover:scale-105">
        Riwayat Pembayaran
    </a>
</section>


        <!-- Testimonial Section -->
        <section class="bg-green-800 text-white rounded-2xl p-8 md:p-12 flex flex-col md:flex-row items-center gap-8 shadow-lg mb-16">
            <div class="md:w-2/3">
                <p class="text-lg md:text-xl italic leading-relaxed">"Assalamualaikum warahmatullahi wabarakatuh ..."
                </p>
                <p class="mt-6 text-right font-semibold">Bpk. Arif Bahriar, S.Ag., M.Pd.</p>
            </div>
            <div class="md:w-1/3 flex justify-center">
                <img alt="Portrait of Bpk. Arif Bahriar" class="rounded-xl w-40 md:w-48 shadow-lg"
                    src="https://storage.googleapis.com/a1aa/image/dNNXaABm2EwKpO89JFILycsMH1vVwRhqFM91Gp3OHcs.jpg" />
            </div>
        </section>

        <!-- Gallery Section -->
        <section>
            <h2 class="text-center text-2xl md:text-3xl font-bold text-orange-500 mb-6">Galeri Foto Aktivitas Ma'had Nawaina</h2>
            <div class="flex items-center justify-center gap-4">
                <i class="fas fa-chevron-left text-gray-400 text-2xl cursor-pointer hover:text-gray-600"></i>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <img alt="Gallery 1" class="w-full h-40 md:h-48 object-cover rounded-xl shadow"
                        src="https://storage.googleapis.com/a1aa/image/BwKH2ZrtyC2eiIJ39YaXxsVqee5fW9rwOR0WkajRBmE.jpg" />
                    <img alt="Gallery 2" class="w-full h-40 md:h-48 object-cover rounded-xl shadow"
                        src="https://storage.googleapis.com/a1aa/image/rOM-kGMJi-xgLKfQlI2xXnCVV5GKdiByi9tQ2zcLuXw.jpg" />
                    <img alt="Gallery 3" class="w-full h-40 md:h-48 object-cover rounded-xl shadow"
                        src="https://storage.googleapis.com/a1aa/image/3YM6k-n0TZxH0QJ5mlxFICZNV2PS3IVYVoJfVYbUafQ.jpg" />
                </div>
                <i class="fas fa-chevron-right text-gray-400 text-2xl cursor-pointer hover:text-gray-600"></i>
            </div>
        </section>
    </main>

</body>

</html>
