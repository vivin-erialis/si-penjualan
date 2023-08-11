
<div class="header">
<h1 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Laporan Pembelian</h1>
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
            @foreach($transaksi as $index => $data)
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

