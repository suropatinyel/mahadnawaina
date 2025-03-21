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
    <script>
        function dummyLogin(event) {
            event.preventDefault(); // Prevent actual form submission
            alert("Login successful!");
            window.location.href = "/dashboard"; // Redirect to the MAHAD website page
        }
    </script>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-sm">
        <h1 class="text-3xl font-bold text-center text-green-700 mb-3">LOGIN</h1>
        <div class=" border-t-4 border-yellow-500 w-20 mx-auto"></div>

        <form onsubmit="dummyLogin(event)" method="post">
            <div class=" mt-6 mb-3">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input type="text" name="username" class="mt-1 block w-full px-2 h-8 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div class="mb-8">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="text" name="username" class="mt-1 block w-full px-2 h-8 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <button type="submit" class="w-full bg-yellow-500 text-white font-bold py-2 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">Login</button>
        </form>
        <div class="mt-4 text-center">
            <p class="text-gray-700">Belum punya akun? <a href="{{ route('register') }}" class="text-green-700 font-semibold hover:underline">Daftar disini</a></p>
        </div>
    </div>
</body>