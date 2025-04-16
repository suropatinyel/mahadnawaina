<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Ma'had Nawaina
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center">
                <img alt="Logo" class="h-10 w-10" src="Logo.png" />
                <div class="ml-4">
                    <h1 class="text-lg font-bold">
                        Ma'had Nawaina
                    </h1>
                    <p class="text-sm text-gray-600">
                        MTsN 2 Kota Malang
                    </p>
                </div>
            </div>
            <div>
                <form action="{{ route('logout') }}" method="POST" class="bg-red-500 text-white px-4 py-2 rounded">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </header>
    <!-- Hero Section -->
    <section class="relative">
        <img src="{{ asset('SchoolBanner2.jpg') }}" alt="Your Image Description" width="1530" height="600" class="object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="text-center text-white">
                <h2 class="text-4xl font-bold">
                    SELAMAT DATANG
                </h2>
                <h3 class="text-3xl font-bold text-yellow-400">
                    MA'HAD NAWAINA
                </h3>
                <p class="mt-4">
                    MTsN 2 Kota Malang
                </p>
            </div>
        </div>
    </section>
    <!-- Main Content -->
    <main class="container mx-auto py-12 px-4">
        <section class="text-center mb-40">
            <h2 class="text-2xl font-bold mb-4 mt-6">
                Ma'had Nawaina
            </h2>
            <p class="text-gray-700 leading-relaxed text-xl">
                Pondok Pesantren Ma'had Nawaina merupakan lembaga pendidikan yang berfokus pada pengembangan karakter Islami dan akademik. Kami berkomitmen untuk mencetak generasi yang berakhlak mulia, berpengetahuan luas, dan berwawasan global. Dengan kurikulum yang terintegrasi antara ilmu agama dan ilmu umum, kami berharap dapat memberikan kontribusi positif bagi masyarakat dan bangsa.
            </p>

        </section>
        <!-- Activities Section -->
        <section class="bg-gray-200 py-12 px-6 rounded-lg ">
            <h2 class="text-center text-2xl font-bold mb-6">
                BERITA TERKINI MTsN 2 KOTA MALANG
            </h2>
            <p class="text-center text-gray-700 mb-12 text-xl">
                Berita di Ma'had Nawaina meliputi berbagai aktivitas yang mendukung pengembangan diri, baik dalam bidang akademik maupun non-akademik.
            </p>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 gap-3 ">
                <div class="bg-white p-4 rounded-lg h-96 mx-10 shadow-md">
                    <img alt="Kegiatan 1" class="w-full h-40 object-cover rounded-lg mb-4" src="https://placehold.co/300x200" />
                    <h3 class="text-lg font-bold">
                        Berita 1
                    </h3>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md bg-white p-4 rounded-lg h-96 mx-10 shadow-md">
                    <img alt="Kegiatan 2" class="w-full h-40 object-cover rounded-lg mb-4" src="https://placehold.co/300x200" />
                    <h3 class="text-lg font-bold">
                        Berita 2
                    </h3>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md bg-white p-4 rounded-lg h-96 mx-10 shadow-md">
                    <img alt="Kegiatan 3" class="w-full h-40 object-cover rounded-lg mb-4" src="https://placehold.co/300x200" />
                    <h3 class="text-lg font-bold">
                        Berita 3
                    </h3>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md bg-white p-4 rounded-lg h-96 mx-10 shadow-md">
                    <img alt="Kegiatan 4" class="w-full h-40 object-cover rounded-lg mb-4" src="https://placehold.co/300x200" />
                    <h3 class="text-lg font-bold">
                        Berita 4
                    </h3>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md bg-white p-4 rounded-lg h-96 mx-10 shadow-md">
                    <img alt="Kegiatan 5" class="w-full h-40 object-cover rounded-lg mb-4" src="https://placehold.co/300x200" />
                    <h3 class="text-lg font-bold">
                        Berita 5
                    </h3>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md bg-white p-4 rounded-lg h-96 mx-10 shadow-md">
                    <img alt="Kegiatan 6" class="w-full h-40 object-cover rounded-lg mb-4" src="https://placehold.co/300x200" />
                    <h3 class="text-lg font-bold">
                        Berita 6
                    </h3>
                </div>
            </div>
        </section>
    </main>
    <!-- Navigation Section -->
    <div class="flex justify-center bg-gray-200 p-4">
        <div class="bg-white p-4 m-2 shadow-lg">
            <a class="text-green-600 font-bold" href="#">
                B. Sains &amp; IPA
            </a>
        </div>
        <div class="bg-white p-4 m-2 shadow-lg">
            <a class="text-green-600 font-bold" href="#">
                B. Sosial &amp; IPS
            </a>
        </div>
        <div class="bg-white p-4 m-2 shadow-lg">
            <a class="text-green-600 font-bold" href="#">
                B. Agama &amp; PAI
            </a>
        </div>
    </div>
    <!-- Grid Section -->
    <!-- SUSUNAN PENGURUS Section with Carousel -->
    <div class="bg-black text-white p-6">
        <h1 class="text-2xl font-bold">
            SUSUNAN PENGURUS MA'HAD NAWA'INA MTsN 2 KOTA MALANG
        </h1>
        <p class="mt-2">
            Masa Khidmat 2021-2022
        </p>
        <p class="mt-1">
            Kepala Ma'had: Ust. Nur Hasan
        </p>
        <!-- Carousel Container -->
        <div class="relative">
            <!-- Carousel Wrapper -->
            <div class="overflow-hidden relative">
                <div class="flex animate-slide">
                    <!-- Carousel Item -->
                    <div class="w-1/3 flex-none px-4">
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <img class="rounded-full w-32 h-32 mx-auto mb-4" src="https://placehold.co/150x150" alt="Teacher 1" />
                            <h3 class="text-xl text-center font-semibold">Ust. Ahmad</h3>
                            <p class="text-center text-gray-600">Pengasuh Ma'had</p>
                        </div>
                    </div>
                    <!-- Carousel Item -->
                    <div class="w-1/3 flex-none px-4">
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <img class="rounded-full w-32 h-32 mx-auto mb-4" src="https://placehold.co/150x150" alt="Teacher 2" />
                            <h3 class="text-xl text-center font-semibold">Ust. Ali</h3>
                            <p class="text-center text-gray-600">Pengurus Ma'had</p>
                        </div>
                    </div>
                    <!-- Carousel Item -->
                    <div class="w-1/3 flex-none px-4">
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <img class="rounded-full w-32 h-32 mx-auto mb-4" src="https://placehold.co/150x150" alt="Teacher 3" />
                            <h3 class="text-xl text-center font-semibold">Ust. Fatimah</h3>
                            <p class="text-center text-gray-600">Pengurus Ma'had</p>
                        </div>
                    </div>
                    <!-- Carousel Item -->
                    <div class="w-1/3 flex-none px-4">
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <img class="rounded-full w-32 h-32 mx-auto mb-4" src="https://placehold.co/150x150" alt="Teacher 4" />
                            <h3 class="text-xl text-center font-semibold">Ust. Zainab</h3>
                            <p class="text-center text-gray-600">Pengurus Ma'had</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Controls -->
            <button class="absolute top-0 bottom-0 left-0 flex items-center justify-center text-white bg-black bg-opacity-50 px-4 py-2" onclick="moveSlide('prev')">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="absolute top-0 bottom-0 right-0 flex items-center justify-center text-white bg-black bg-opacity-50 px-4 py-2" onclick="moveSlide('next')">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <!-- Add this script to control the slide -->
    <script>
        let index = 0;
        const slides = document.querySelectorAll('.animate-slide > div');
        const totalSlides = slides.length;

        function moveSlide(direction) {
            if (direction === 'next') {
                index = (index + 1) % totalSlides;
            } else {
                index = (index - 1 + totalSlides) % totalSlides;
            }

            updateSlidePosition();
        }

        function updateSlidePosition() {
            const offset = -index * 33.33; // Assuming each slide is 1/3 width
            document.querySelector('.animate-slide').style.transform = `translateX(${offset}%)`;
        }
    </script>

    <!-- Vision and Mission Section -->
    <div class="relative">
        <img alt="Background image of students" class="w-full h-68 object-cover" src="https://placehold.co/1200x400" />
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white p-6">
            <h2 class="text-2xl font-bold">
                VISI
            </h2>
            <p class="italic mt-2 text-xl">
                "Terwujudnya santri yang unggul, berdaya, dan kompetitif"
            </p>
            <h2 class="text-2xl font-bold mt-6">
                MISI
            </h2>
            <p class="mt-2 text-center text-xl">
                Menyelenggarakan pendidikan berbasis pesantren modern. Menyelenggarakan pendidikan berbasis nilai-nilai Islam. Menyelenggarakan pendidikan berbasis teknologi informasi. Menyelenggarakan pendidikan berbasis kemandirian dan kewirausahaan. Menyelenggarakan pendidikan berbasis kebangsaan dan kebhinekaan. Menyelenggarakan pendidikan berbasis lingkungan hidup.
            </p>
        </div>
    </div>
    <!-- Facilities Section -->
    <div class="bg-white p-6">
        <h2 class="text-center text-green-600 text-2xl font-bold">
            FASILITAS MA'HAD NAWA'INA
        </h2>
        <div class="flex flex-wrap justify-center mt-4">
            <div class="bg-gray-200 p-2 m-2 rounded-full">
                Masjid
            </div>
            <div class="bg-gray-200 p-2 m-2 rounded-full">
                Asrama
            </div>
            <div class="bg-gray-200 p-2 m-2 rounded-full">
                Ruang Belajar
            </div>
            <div class="bg-gray-200 p-2 m-2 rounded-full">
                Ruang Makan
            </div>
            <div class="bg-gray-200 p-2 m-2 rounded-full">
                Transportasi
            </div>
            <div class="bg-gray-200 p-2 m-2 rounded-full">
                Makan Pagi &amp; Malam
            </div>
            <div class="bg-gray-200 p-2 m-2 rounded-full">
                Layanan Kesehatan
            </div>
            <div class="bg-gray-200 p-2 m-2 rounded-full">
                WiFi
            </div>
            <div class="bg-gray-200 p-2 m-2 rounded-full">
                AC
            </div>
            <div class="bg-gray-200 p-2 m-2 rounded-full">
                Dispensasi
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <!-- Footer Section -->
    <div class="bg-green-800 text-white py-8">
        <div class="container mx-auto text-center">
            <img alt="Logo of Ma'had Nawa'ina" class="mx-auto mb-4 h-24" src="https://placehold.co/100x100" />
            <div class="flex justify-center space-x-8 mb-4">
                <a href="#" class="text-white hover:text-yellow-400">Home</a>
                <a href="#" class="text-white hover:text-yellow-400">About Us</a>
                <a href="#" class="text-white hover:text-yellow-400">Programs</a>
                <a href="#" class="text-white hover:text-yellow-400">Contact</a>
                <a href="#" class="text-white hover:text-yellow-400">Privacy Policy</a>
            </div>
            <div class="mb-4">
                <p class="text-sm">Contact Us: +62 123 456 789 | info@mahadnawaina.com</p>
                <p class="text-sm">Address: Jl. Pendidikan No. 123, Kota Malang, Indonesia</p>
            </div>
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-white hover:text-yellow-400"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white hover:text-yellow-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white hover:text-yellow-400"><i class="fab fa-youtube"></i></a>
            </div>
            <p class="mt-4 text-sm">
                © 2025 Ma'had Nawaina. All rights reserved.
            </p>
        </div>
    </div>

</body>

</html>