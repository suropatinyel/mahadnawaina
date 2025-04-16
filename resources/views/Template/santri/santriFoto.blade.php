<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Tambah Pembayaran</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Hidden field: penting untuk insert ke tabel -->
    <input type="hidden" name="santri_id" value="{{ $santri->id }}">

    <!-- Hanya tampilan -->
    <label>Nama Santri</label>
    <input type="text" value="{{ $santri->user->name }}" disabled class="w-full border p-2 mb-4 bg-gray-100 text-gray-600 cursor-not-allowed">

    <input type="number" name="jumlah" placeholder="Jumlah" required class="w-full border p-2 mb-4">
    <input type="date" name="tanggal" required class="w-full border p-2 mb-4">

    <label class="block mb-2">Metode Pembayaran</label>
    <input type="text" value="Transfer" disabled class="w-full border p-2 mb-4 bg-gray-100 text-gray-600 cursor-not-allowed">
    <input type="hidden" name="metode_pembayaran" value="transfer">

    <input type="text" name="bulan" placeholder="Bulan" required class="w-full border p-2 mb-4">
    <input type="file" name="file_transaksi" class="w-full border p-2 mb-4">
    <textarea name="keterangan" placeholder="Keterangan" class="w-full border p-2 mb-4"></textarea>

    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Kirim Pembayaran</button>
</form>
    </div>
</body>
</html>
