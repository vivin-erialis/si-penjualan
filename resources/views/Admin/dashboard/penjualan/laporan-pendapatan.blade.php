<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
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
    }

    .laporan-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .laporan-table td {
        text-align: left;
    }

    .laporan-table th {
        text-align: left
    }

    .laporan-table tr .label {
        text-align: right
    }
</style>

<body>

    <div class="header" style="text-align: left;">
        <img src="../public/images/Ayesha.png" alt="" width="15%" style="margin-left:270px;">
        <div class="header" style="text-align: center; margin-top:-100px;">
            <h1>Laporan Pendapatan</h1>
            <h3>Toko Ayesha Projek</h3>
            <p>Jl. Balai Baru Padang | WhatsApp : +62 8 1383093724 | IG : @ayeshaprojek</p>
        </div>
    </div>

    <hr>

    <p style="text-align: center; font-size: 17px; margin-top:28px; margin-bottom: 15px;">Laporan Pendapatan Toko Ayesha
        Projek Pada Bulan {{ $namaBulan }} Tahun {{ $tahunIni }}</p>
    <table class="laporan-table">
        <thead>
            <tr>
                <th>Modal</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> Modal Produk</td>
                <td></td>
                <td class="label"> Rp. {{ number_format($hargaModalProduk, 0, ',', '.') }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Modal Sewa</td>
                <td></td>
                <td class="label"> Rp. {{ number_format($hargaModalBarang, 0, ',', '.') }}</td>
                <td></td>
            </tr>

            <tr>
                <td style="font-weight: bold;">TOTAL MODAL</td>
                <td></td>
                <td class="label"> <strong>Rp. {{ number_format($hargaModal, 0, ',', '.') }}</strong></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>

    </table>
    <table class="laporan-table">
        <thead>
            <tr>
                <th>Pendapatan</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pendapatan Penjualan</td>
                <td class="label"> Rp. {{ number_format($totalPenjualan, 0, ',', '.') }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Pendapatan Sewa</td>
                <td class="label"> Rp. {{ number_format($totalSewa, 0, ',', '.') }}</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">TOTAL PENDAPATAN</td>
                <td class="label"> <strong>Rp. {{ number_format($totalPenjualan + $totalSewa, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>

    </table>

    <table class="laporan-table">
        <thead>
            <tr>
                <th>Keuntungan Toko</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="font-weight: bold;">TOTAL PENDAPATAN</td>
                <td class="label"> Rp.
                    {{ number_format($totalPenjualan + $totalSewa, 0, ',', '.') }}</td>

            </tr>
            <tr>
                <td style="font-weight: bold;">TOTAL MODAL</td>
                <td class="label"> Rp.
                    {{ number_format($hargaModal, 0, ',', '.') }}</td>

            </tr>

        </tbody>
        <tr style="background-color: #4FB477">
            <td style="font-weight: bold; color:#f2f2f2;">TOTAL KEUNTUNGAN</td>
            <td class="label" style="color: #f2f2f2">
                <strong>Rp. {{ number_format($totalPenjualan + $totalSewa - $hargaModal, 0, ',', '.') }}</strong></td>

        </tr>
    </table>




</body>
