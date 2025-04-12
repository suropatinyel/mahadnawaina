<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="flex items-center justify-center min-h-screen" style="background-color: #3B6725D6;">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h1 class="text-center text-2xl font-bold text-green-700 mb-4">SIGN IN</h1>
        <div class="border-t-4 border-yellow-500 w-16 mx-auto mb-6"></div>
        <form method="POST" action="{{ route('register') }}"> 
            @csrf    
                   <div>
                <label class="block text-sm font-medium text-gray-700">Username <span class="text-red-500">*</span></label>
                <input type="text" name="name" class="mt-1 block w-full px-2 h-8 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" class="mt-1 block w-full px-2 h-8 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Password <span class="text-red-500">*</span></label>
                <input type="password" name="password" class="mt-1 block w-full px-2 h-8 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Confirmed Password <span class="text-red-500">*</span></label>
                <input type="password" name="password_confirmation" class="mt-1 block w-full px-2 h-8 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-green-700">
            </div>
            <div>
                <button type="submit" class=" w-full mt-3 bg-yellow-500 text-white py-2 rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">{{_('Register')}}</button>
            </div>
            <div>
                <p class=" text-right text-sm italic text-gray-700">Sudah punya akun?<a href="/login" class=" text-green-700 hover:underline">Login</a></p>
            </div>
        </form>
        @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
</body>

</html>