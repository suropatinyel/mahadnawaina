<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="relative">
                    <img alt="Students in class" class="w-full h-64 object-cover rounded-lg"
                        src="https://storage.googleapis.com/a1aa/image/Y4NmypERlWZnuYyvaa8yM-1zWTn0vxPoNxfmqRX1SS0.jpg" />
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white">
                        <h2 class="text-4xl font-bold">SELAMAT DATANG</h2>
                        <p class="text-2xl">Us/Ust</p>
                        <p class="mt-2">Anda Berhasil Login sebagai Us/Ust!</p>
                    </div>
                </div>
                <!-- Buttons -->
                <div class="mt-6 flex justify-center space-x-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            Logout
                        </button>
                    </form>
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Sign In
                    </a>
                    <a href="#" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Data Presensi
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>