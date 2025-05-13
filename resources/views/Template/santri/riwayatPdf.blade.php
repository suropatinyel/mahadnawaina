<!-- resources/views/template/santri/riwayatPdf.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Riwayat Pembayaran - {{ $santri->user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
            background-color: #fff;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 24px;
            color: #4CAF50;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 16px;
            color: #555;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .table th, .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .table thead {
            background-color: #4CAF50;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Riwayat Pembayaran Santri</h1>
        <p>Nama Santri: <strong>{{ $santri->user->name }}</strong></p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th>Jumlah</th>
                <th>Tujuan Pembayaran</th> <!-- Kolom baru untuk maksud bayar -->
            </tr>
        </thead>
        <tbody>
            @forelse ($pembayarans as $index => $pembayaran)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal)->format('d M Y') }}</td>
                    <td>{{ ucfirst($pembayaran->metode_pembayaran) }}</td>
                    <td>{{ ucfirst($pembayaran->status_pembayaran) }}</td>
                    <td>Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                    <td>{{ $pembayaran->maksud_bayar ?? 'Tujuan bayar tidak tersedia' }}</td> <!-- Menampilkan maksud bayar -->
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada data pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Data ini dicetak secara otomatis oleh sistem Ma'had Nawaina.</p>
    </div>

</body>

</html>
