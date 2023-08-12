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

    <div class="header" style="text-align: center;">
        <h1>Laporan Pendapatan</h1>
        <h3>Toko Ayesha Projek</h3>
        <p>Jl. Balai Baru Padang | WhatsApp : +62 8 1383093724 | IG : @ayeshaprojek</p>
    </div>
    <hr>

    <table class="laporan-table">
        <thead>
            <tr>
                <th>Modal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Harga Modal Produk</td>
                <td class="label"> Rp. {{ number_format($hargaModalProduk, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Harga Modal Sewa</td>
                <td class="label"> Rp. {{ number_format($hargaModalBarang, 0, ',', '.') }}</td>
            </tr>

            <tr>
                <td style="font-weight: bold;">TOTAL MODAL</td>
                <td class="label"> Rp. {{ number_format($hargaModal, 0, ',', '.') }}</td>
            </tr>
        </tbody>

    </table>
    <table class="laporan-table">
        <thead>
            <tr>
                <th>Penjualan Produk</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Harga Pokok Penjualan</td>
                <td class="label"> Rp. {{ number_format($totalPenjualan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">TOTAL PENJUALAN</td>
                <td class="label"> Rp. {{ number_format($totalPenjualan, 0, ',', '.') }}</td>
            </tr>
        </tbody>

    </table>
    <table class="laporan-table mt-5">
        <thead>
            <tr>
                <th>Pendapatan Sewa</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Harga Pokok Pendapatan</td>
                <td class="label"> Rp. {{ number_format($totalSewa, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td style="font-weight: bold;">TOTAL PENDAPATAN SEWA</td>
                <td class="label"> Rp. {{ number_format($totalSewa, 0, ',', '.') }}</td>
            </tr>

        </tbody>

        <tr style="background-color: black">
            <td style="font-weight: bold; color:#f2f2f2;">TOTAL PENDAPATAN</td>
            <td class="label" style="color: #f2f2f2"> Rp.
                {{ number_format($totalPenjualan + $totalSewa, 0, ',', '.') }}</td>

        </tr>


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
        <tr style="background-color: black">
            <td style="font-weight: bold; color:#f2f2f2;">TOTAL KEUNTUNGAN</td>
            <td class="label" style="color: #f2f2f2"> Rp.
                {{ number_format(($totalPenjualan + $totalSewa)-$hargaModal, 0, ',', '.') }}</td>

        </tr>
    </table>




</body>
