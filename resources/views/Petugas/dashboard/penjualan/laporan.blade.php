<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <!-- Sesuaikan dengan path CSS Anda -->
    <link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.header h1 {
    font-size: 24px;
    margin: 0;
}

.date {
    font-size: 16px;
}

.laporan-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.laporan-table th,
.laporan-table td {
    padding: 10px;
    border: 1px solid #ccc;
}

.laporan-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.laporan-table td {
    text-align: center;
}
</style>
<body>
<div class="header">
        <h1>Laporan Penjualan</h1>
        <p class="date">Tanggal: {{ date('d/m/Y') }}</p>
    </div>
    <table class="laporan-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Penjualan</th>
                <th>Nama Pelanggan</th>
                <th>Total Penjualan</th>
                <th>Total Penjualan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data['kode_penjualan'] }}</td>
                <td>{{ $data['nama_produk'] }}</td>
                <td>{{ $data['tanggal_transaksi'] }}</td>
                <td>{{ $data['harga'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
