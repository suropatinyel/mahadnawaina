<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6 text-green-700">Tambah Data Santri</h1>
        
        <form action="{{ route('santri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Nama & Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Nama Lengkap</label>
                    <input type="text" name="name" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block font-medium">Email</label>
                    <input type="email" name="email" class="w-full border rounded p-2" required>
                </div>
            </div>

            <!-- Password -->
            <div>
                <label class="block font-medium">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>
            </div>

            <!-- No Induk & NIS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">No Induk Santri</label>
                    <input type="text" name="no_induk_santri" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block font-medium">NIS</label>
                    <input type="text" name="nis" class="w-full border rounded p-2" required>
                </div>
            </div>

            <!-- Kelas & Alamat -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Kelas Sekolah</label>
                    <select name="kelas_id" class="w-full border rounded p-2" required>
                        <option value="">Pilih Kelas</option>
                        @foreach($kelas as $kelass)
                            <option value="{{ $kelass->id }}">{{ $kelass->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-medium">Alamat</label>
                    <input type="text" name="alamat" class="w-full border rounded p-2" required>
                </div>
            </div>

            <!-- Tanggal Lahir & No HP -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block font-medium">No HP</label>
                    <input type="text" name="no_hp" class="w-full border rounded p-2" required>
                </div>
            </div>

            <!-- Orang Tua -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block font-medium">Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block font-medium">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block font-medium">Nama Wali</label>
                    <input type="text" name="nama_wali" class="w-full border rounded p-2">
                </div>
            </div>

            <!-- Kamar -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Kamar</label>
                    <select name="kamar_id" class="w-full border rounded p-2" required>
                        <option value="">Pilih Kamar</option>
                        @foreach($kamar as $kamar_item)
                            <option value="{{ $kamar_item->id }}">{{ $kamar_item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal Masuk & Keluar -->
                <div>
                    <label class="block font-medium">Waktu Masuk</label>
                    <input type="date" name="waktu_masuk" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label class="block font-medium">Waktu Keluar</label>
                    <input type="date" name="waktu_keluar" class="w-full border rounded p-2" required>
                </div>
            </div>
            <!-- Status -->
            <div>
                <label class="block font-medium">Status</label>
                <select name="status" class="w-full border rounded p-2" required>
                    <option value="">Pilih Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="alumni">Alumni</option>
                </select>
            </div>
            <!-- Tanggal Daftar & Daftar Ulang -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Tanggal Daftar</label>
                    <input type="date" name="tanggal_daftar" class="w-full border rounded p-2" required>
                </div>
                <div class="flex items-center mt-6">
                    <input type="checkbox" name="daftar_ulang" value="1" class="mr-2">
                    <label class="font-medium">Daftar Ulang</label>
                </div>
            </div>

            <!-- Foto -->
            <div>
                <label class="block font-medium">Foto</label>
                <input type="file" name="file_foto" accept="image/*" class="w-full border rounded p-2">
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end">
            <a href="{{ route('template.admin.datasantri') }}" class="mr-2 bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
