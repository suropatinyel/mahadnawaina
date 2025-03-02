<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-4">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-green-700 mb-2">Selamat Datang Santri !</h1>
        <p class="text-gray-700 mb-4">anda telah masuk kedalam halaman pembayaran</p>

        <form class="space-y-6">
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="upload-image">Upload Bukti Pembayaran</label>
                <input type="file" id="upload-image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-500 file:text-white hover:file:bg-orange-600">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2" for="nominal">Detail Pembayaran Nominal</label>
                <input type="text" id="nominal" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Masukkan nominal pembayaran">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2" for="nominal">Tanggal</label>
                <input type="text" id="nominal" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Masukkan nominal pembayaran">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2" for="method">Metode Pembayaran</label>
                <select id="method" class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    <option value="">Pilih metode pembayaran</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="credit_card">Kartu Kredit</option>
                    <option value="e_wallet">E-Wallet</option>
                    <option value="cash">Tunai</option>
                </select>
            </div>

            <div>
                <button type="submit" class="w-full bg-orange-500 text-white font-bold py-2 px-4 rounded-md hover:bg-orange-600">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>