<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Data Ust/Us
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold text-green-900 mb-4">
                Data Ust/Us
            </h1>
                 <div class="flex space-x-4 items-center mb-4">
        <a href="{{ route('ustad.export') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            <i class="fas fa-file-excel mr-2"></i> Export Excel
        </a>
        <form action="{{ route('ustad.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center space-x-2">
            @csrf
            <input type="file" name="file" required class="border rounded p-1 text-sm">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-file-import mr-2"></i> Import
            </button>
        </form>
    </div>
          <div class="flex justify-between items-center mb-4">
                <form method="GET" action="{{ route('template.admin.dataust') }}" class="flex w-full mr-4">
                    <input type="text" name="search" class="border rounded p-2 w-full" placeholder="Cari nama, ID, alamat, atau bidang..." value="{{ request('search') }}" />
                    <button type="submit" class="ml-2 px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Cari</button>
                </form>
                <div>
                <form method="GET" action="{{ route('template.admin.dataust') }}" class="flex items-center space-x-2">
                    <label for="per_page" class="text-sm">Show</label>
                    <select name="per_page" id="per_page" onchange="this.form.submit()" class="border rounded p-2">
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </form>
    </div>
                <a href="{{ route('template.admin.ustadzTambah') }}" class=" whitespace-nowrap bg-orange-500 text-white text-lg  rounded px-4 py-2 mb-4 hover:bg-orange-700">
                    + Tambah Data
                </a>
            </div>   
         <div class="overflow-x-auto">
            <!-- Modal -->
            <div id="infoModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
                <div class="bg-white rounded-lg p-6 max-w-md w-full relative">
                    <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl">&times;</button>
                    <h2 class="text-xl font-semibold mb-4">Informasi User</h2>
                    <p><strong>Nama:</strong> <span id="modalName"></span></p>
                    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    <p><strong>Password:</strong> <span id="modalPassword"></span></p>
                </div>
            </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nama</th>
                <th class="py-2 px-4 border-b">Bidang</th>
                <th class="py-2 px-4 border-b">Alamat</th>
                <th class="py-2 px-4 border-b">No. HP</th>
                <th class="py-2 px-4 border-b">Jenis Kelamin</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ustads as $ustadz)
                <tr class="bg-gray-100 text-center">
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b">{{ $ustadz->user_id }}</td>
                    <td class="py-2 px-4 border-b">
                    <button 
                        onclick="showModal('{{ addslashes($ustadz->user->name) }}', '{{ addslashes($ustadz->user->email) }}', '{{ $ustadz->user->password ? str_repeat('*', 8) : 'Tidak tersedia' }}')" 
                        class="text-blue-600 hover:underline">
                        {{ $ustadz->user->name ?? '-' }}
                    </button>
                    <td class="py-2 px-4 border-b">{{ $ustadz->mata_pelajaran }}</td>
                    <td class="py-2 px-4 border-b">{{ $ustadz->alamat }}</td>
                    <td class="py-2 px-4 border-b">{{ $ustadz->No_HP }}</td>
                    <td class="py-2 px-4 border-b">{{ $ustadz->JK }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('template.admin.ustadzEdit', ['id' => $ustadz->user_id]) }}" class="bg-green-700 text-white rounded px-4 py-2 mr-2 inline-block  hover:bg-green-900">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('ustadz.destroy', ['id' => $ustadz->user_id]) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <form action="{{ route('ustadz.destroy', ['id' => $ustadz->user_id]) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white rounded px-4 py-2 hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4 flex justify-between items-center">
    <!-- Tombol kiri -->
    <a href="{{ route('adminDashboard') }}" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900">
        ← Kembali
    </a>

    <!-- Pagination kanan -->
    <div>
        {{ $ustads->withQueryString()->links() }}
    </div>
    <script>
    function showModal(name, email, maskedPassword) {
        document.getElementById('modalName').textContent = name;
        document.getElementById('modalEmail').textContent = email;
        document.getElementById('modalPassword').textContent = maskedPassword;
        document.getElementById('infoModal').classList.remove('hidden');
        document.getElementById('infoModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('infoModal').classList.add('hidden');
        document.getElementById('infoModal').classList.remove('flex');
    }
</script>
</body>
</div>
</div>
</html>