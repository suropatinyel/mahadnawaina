<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    <div class="max-w-3xl mx-auto px-6 py-10">
        <h1 class="text-4xl font-extrabold mb-8 text-center text-green-600">Edit Data Berita</h1>

        <form action="{{ route('berita.update', $beritas->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-xl space-y-6 border border-gray-200">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div>
                <label for="judul" class="block text-lg font-semibold mb-2">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $beritas->judul) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300">
                @error('judul')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Isi -->
            <div>
                <label for="isi" class="block text-lg font-semibold mb-2">Isi</label>
                <textarea name="isi" id="isi" rows="6"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300">{{ old('isi', $beritas->isi) }}</textarea>
                @error('isi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Publikasi -->
            <div>
                <label for="tanggal_publikasi" class="block text-lg font-semibold mb-2">Tanggal Publikasi</label>
                <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" 
                    value="{{ old('tanggal_publikasi', \Carbon\Carbon::parse($beritas->tanggal_publikasi)->format('Y-m-d')) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300">
                @error('tanggal_publikasi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Link -->
            <div>
                <label for="link_berita" class="block text-lg font-semibold mb-2">Link Berita</label>
                <input type="url" name="link" id="link" value="{{ old('link', $beritas->link) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300">
                @error('link_berita')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div>
                <label for="gambar" class="block text-lg font-semibold mb-2">Gambar (biarkan kosong jika tidak diganti)</label>
                <input type="file" name="gambar" id="gambar"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300">
                @if ($beritas->gambar)
                    <img src="{{ Storage::url($beritas->gambar) }}" alt="Gambar berita" class="h-32 mt-2 rounded-md shadow-md">
                @endif
                @error('gambar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-lg font-semibold mb-2">Status</label>
                <select name="status" id="status"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-300">
                    <option value="draft" {{ old('status', $beritas->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="terbit" {{ old('status', $beritas->status) == 'terbit' ? 'selected' : '' }}>Terbit</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end items-center">
                <button type="submit"
                    class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition ease-in-out duration-300">Simpan Perubahan</button>
                <a href="{{ route('template.admin.beritaData') }}"
                    class="ml-4 text-gray-600 hover:text-blue-500 hover:underline transition ease-in-out duration-300">Kembali</a>
            </div>
        </form>
    </div>

</body>
</html>
