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
            window.location.href = "/welcome"; // Redirect to the MAHAD website page
        }
    </script>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-sm border-4 border-blue-500">
        <h1 class="text-3xl font-bold text-center text-green-700 mb-8">LOGIN</h1>

        <form onsubmit="dummyLogin(event)" method="post">
            <div class="mb-6">
                <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
                <input type="text" id="username" placeholder="*Masukkan username anda" class="w-full px-4 py-2 border-2 border-orange-500 rounded-lg focus:outline-none focus:border-orange-700" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" id="password" placeholder="*Masukkan password anda" class="w-full px-4 py-2 border-2 border-orange-500 rounded-lg focus:outline-none focus:border-orange-700" required>
            </div>
            <button type="submit" class="w-full bg-orange-500 text-white font-bold py-2 rounded-lg hover:bg-orange-700">Login</button>
        </form>
        <div class="mt-4 text-center">
            <p class="text-gray-700">Don't have an account? <a href="{{ route('signup') }}" class="text-green-700 font-semibold">Sign Up</a></p>
        </div>
    </div>
</body>