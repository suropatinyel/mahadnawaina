<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-center text-green-700 text-xl font-bold mb-4">Tambah Data Ustadz</h1>
            <form action="{{ route('ustadz.store') }}" method="POST">
    @csrf
    {{-- Input untuk tabel users --}}
    <div class="mb-4">
        <label class="block text-gray-700">Nama Lengkap</label>
        <input name="name" type="text" class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Email</label>
        <input name="email" type="email" class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Password</label>
        <input name="password" type="password" class="w-full border border-gray-300 rounded p-2" required>
    </div>

    {{-- Input untuk tabel ustadzs --}}
    <div class="mb-4">
        <label class="block text-gray-700">Jenis Kelamin</label>
        <div class="flex space-x-4">
            <label>
                <input type="radio" name="JK" value="L" class="form-radio" required>
                <span class="ml-2">Laki-laki</span>
            </label>
            <label>
                <input type="radio" name="JK" value="P" class="form-radio" required>
                <span class="ml-2">Perempuan</span>
            </label>
        </div>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">No HP</label>
        <input name="No_HP" type="text" class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Alamat</label>
        <input name="alamat" type="text" class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700">Mata Pelajaran</label>
        <input name="mata_pelajaran" type="text" class="w-full border border-gray-300 rounded p-2" required>
    </div>

    <div class="text-center">
        <button type="submit" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded">
            Tambah
        </button>
    </div>
</form>
        </div>
    </div>
</body>
</html>