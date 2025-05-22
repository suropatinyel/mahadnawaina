<!-- resources/views/template/santri/pembayaranDetailPdf.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .name {
            text-align: center;
            font-size: 18px;
            margin-bottom: 30px;
            color: #374151;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #e5e7eb;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        table td {
            background-color: #f9fafb;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('logoMahad.png') }}" alt="Logo Mahad">
        </div>

        <h1>Detail Pembayaran</h1>
        <div class="name">
            <strong>{{ $pembayaran->santri->user->name ?? 'Nama tidak tersedia' }}</strong>
        </div>

        <table>
            <tr>
                <th>Tanggal</th>
                <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal)->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Bulan</th>
                <td>{{ $pembayaran->bulan }}</td>
            </tr>
            <tr>
                <th>Metode Pembayaran</th>
                <td>{{ ucfirst($pembayaran->metode_pembayaran) }}</td>
            </tr>
            <tr>
                <th>Status Pembayaran</th>
                <td>{{ ucfirst($pembayaran->status_pembayaran ?? 'Pending') }}</td>
            </tr>
            <tr>
                <th>Tujuan Pembayaran</th>
                <td>{{ $pembayaran->maksud_bayar ?? 'Maksud bayar tidak tersedia' }}</td>
            </tr>
        </table>

        <div class="footer">
            <p>Terima kasih telah melakukan pembayaran di Mahad Nawaina.</p>
        </div>
    </div>
</body>

</html>
