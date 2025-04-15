<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h2 class="text-center text-2xl font-bold text-green-700 mb-4">{{ __('Verifikasi Email Anda') }}</h2>
        <div class="border-t-4 border-yellow-500 w-16 mx-auto mb-6"></div>

        <div class="mb-4">
            @if (session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                {{ session('message') }}
            </div>
            @endif

            <p class="text-gray-700 mb-4">Sebelum melanjutkan, silakan verifikasi email Anda dengan mengklik link yang kami kirim ke email Anda.</p>
            <p class="text-gray-700 mb-4">Jika Anda tidak menerima email, klik tombol di bawah ini untuk mengirim ulang.</p>
        </div>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Kirim Ulang Email Verifikasi
            </button>
        </form>
    </div>
</body>

</html>