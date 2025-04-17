<!DOCTYPE html>
<html>

<head>
    <title>Ma'had Nawaina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-white text-gray-800">

    <!-- Header Section -->
    <div class="relative">
        <img alt="Students studying in a classroom" class="w-full h-64 object-cover"
            src="https://storage.googleapis.com/a1aa/image/YO1xNPpKcfL7Vv_p9G9OtURo0R1P2_qe6u-NSo-qCXo.jpg" />
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center">
            <h1 class="text-white text-2xl md:text-4xl font-bold">SELAMAT DATANG</h1>
            <h2 class="text-orange-500 text-xl md:text-3xl font-bold">MA'HAD NAWAINA</h2>
            <p class="text-white text-sm md:text-lg">MTsN 2 Kota Malang</p>
        </div>

        <!-- Login and Logout Buttons -->
        <div class="absolute top-4 right-4 flex space-x-4">
            <a href="{{ route('auth.login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Login</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="py-8 px-4 md:px-16">
        <h2 class="text-center text-2xl md:text-3xl font-bold mb-4">Ma'had Nawaina</h2>
        <p class="text-center text-sm md:text-base mb-8">
            Pendidikan formal baik madrasah maupun sekolah merupakan upaya pendidikan yang komprehensif ...
        </p>

        <!-- Registration and Payment Buttons -->
        <div class="flex justify-center space-x-4 mt-6">
            <a href="https://ppdb.mtsn2kotamalang.sch.id/" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition">
                Pendaftaran
            </a>
            <a href="{{ route('template.santri.santriFoto') }}" class="bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition">
                Pembayaran
            </a>
        </div>
    </div>

    <!-- Testimonial Section -->
    <div class="bg-green-800 text-white py-8 px-4 md:px-16 flex flex-col md:flex-row items-center">
        <div class="md:w-2/3 mb-4 md:mb-0">
            <p class="text-lg md:text-xl italic">"Assalamualaikum warahmatullahi wabarakatuh ..." </p>
            <p class="mt-4 text-right">Bpk. Arif Bahriar, S.Ag., M.Pd.</p>
        </div>
        <div class="md:w-1/3 flex justify-center">
            <img alt="Portrait of Bpk. Arif Bahriar" class="rounded-lg"
                src="https://storage.googleapis.com/a1aa/image/dNNXaABm2EwKpO89JFILycsMH1vVwRhqFM91Gp3OHcs.jpg" />
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="py-8 px-4 md:px-16">
        <h2 class="text-center text-2xl md:text-3xl font-bold mb-4">Galeri Foto Aktivitas Ma'had Nawaina</h2>
        <div class="flex justify-center items-center space-x-4">
            <i class="fas fa-chevron-left text-gray-500"></i>
            <div class="grid grid-cols-3 gap-4">
                <img alt="Gallery image 1" class="w-full h-full object-cover"
                    src="https://storage.googleapis.com/a1aa/image/BwKH2ZrtyC2eiIJ39YaXxsVqee5fW9rwOR0WkajRBmE.jpg" />
                <img alt="Gallery image 2" class="w-full h-full object-cover"
                    src="https://storage.googleapis.com/a1aa/image/rOM-kGMJi-xgLKfQlI2xXnCVV5GKdiByi9tQ2zcLuXw.jpg" />
                <img alt="Gallery image 3" class="w-full h-full object-cover"
                    src="https://storage.googleapis.com/a1aa/image/3YM6k-n0TZxH0QJ5mlxFICZNV2PS3IVYVoJfVYbUafQ.jpg" />
            </div>
            <i class="fas fa-chevron-right text-gray-500"></i>
        </div>
    </div>

</body>

</html>