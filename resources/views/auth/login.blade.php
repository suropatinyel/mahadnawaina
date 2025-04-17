<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #597E46;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen bg-green-100">

    <!-- Container for the split layout -->
    <div class="flex w-full max-w-6xl bg-white rounded-lg shadow-lg overflow-hidden">

        <!-- Left Side: Image Section -->
        <div class="w-1/2 hidden md:block">
            <img src="{{ asset('schoolbanner.jpg') }}" alt="School Banner" class="w-full h-full object-cover">
        </div>

        <!-- Right Side: Login Form Section -->
        <div class="w-full md:w-1/2 p-8">
            <h1 class="text-3xl font-bold text-center text-green-700 mb-4">LOGIN</h1>
            <div class="border-t-4 border-yellow-500 w-20 mx-auto mb-6"></div>

            <form method="post" action="{{ route('aclogin') }}">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" name="name" id="username" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700" required>
                </div>
                <button type="submit" class="w-full bg-yellow-500 text-white font-bold py-2 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">Login</button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-gray-700">Belum punya akun? <a href="{{ route('register') }}" class="text-green-700 font-semibold hover:underline">Daftar disini</a></p>
            </div>
        </div>

    </div>

</body>

</html>
