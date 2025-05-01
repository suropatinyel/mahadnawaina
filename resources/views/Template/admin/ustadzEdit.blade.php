<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-center text-green-700 text-xl font-bold mb-4">Edit Data Ustadz</h1>
            <form action="{{ route('ustadz.update', $ustadz->user_id) }}" method="POST">
                @csrf
                @method('PUT')  <!-- Method PUT untuk update -->
                
                <div class="mb-4">
                    <label class="block text-gray-700">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $ustadz->user->name) }}" class="w-full border border-gray-300 rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email', $ustadz->user->email) }}" class="w-full border border-gray-300 rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Jenis Kelamin</label>
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="JK" value="L" class="form-radio" {{ $ustadz->JK == 'L' ? 'checked' : '' }} required>
                            <span class="ml-2">Laki-laki</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="JK" value="P" class="form-radio" {{ $ustadz->JK == 'P' ? 'checked' : '' }}>
                            <span class="ml-2">Perempuan</span>
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Alamat</label>
                    <input type="text" name="alamat" value="{{ old('alamat', $ustadz->alamat) }}" class="w-full border border-gray-300 rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">No. HP</label>
                    <input type="text" name="No_HP" value="{{ old('No_HP', $ustadz->No_HP) }}" class="w-full border border-gray-300 rounded p-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" value="{{ old('mata_pelajaran', $ustadz->mata_pelajaran) }}" class="w-full border border-gray-300 rounded p-2" required>
                </div>

                <div class="flex justify-between mt-6">
                    <a href="{{ route('template.admin.dataust') }}" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900">
                        Kembali
                    </a>
                    <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
