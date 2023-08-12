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

    .laporan-table td {}
</style>

<body>
    <div class="header">
        <h1>Laporan Pembelian Barang</h1>
        <h3>Toko Ayesha Projek</h3>
        <p>Jl. Balai Baru Padang | WhatsApp : +62 8 1383093724 | IG : @ayeshaprojek</p>
    </div>
    <hr>

    @php
    $daftarBulan = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    $currentMonth = null;
    $totalPembelianBarang = 0;
    @endphp

    <table class="laporan-table">

        <tbody>
            @foreach ($transaksi as $index => $data)
            @php
            $tanggal = \Carbon\Carbon::parse($data->created_at);
            $bulan = $daftarBulan[$tanggal->format('n') - 1] . ' ' . $tanggal->format('Y');
            @endphp

            @if ($bulan !== $currentMonth)
            @if (!is_null($currentMonth))
            <tr>
                <td colspan="4" style="text-align: left;"><strong>Total Harga Bulan {{ $currentMonth }}</strong></td>
                <td><strong>@rp($totalPembelianBarang)</strong></td>
            </tr>
            </tbody>
        </table>
        <hr>
        @endif
        <h4 style="text-align: center; margin-top: -17px;">Data Pembelian Barang Bulan {{ $bulan }}</h4>
        <table class="laporan-table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Harga/pcs</th>

                    <th>Jumlah</th>
                    <th>Harga Barang</th>
                </tr>
            </thead>
            <tbody>
                @php
                $currentMonth = $bulan;
                $totalPembelianBarang = 0;
                @endphp
                @endif

                <tr>
                    <td>{{ $tanggal->format('d/m/Y') }}</td>
                    <td>{{ $data->barang->nama_barang }}</td>
                    <td>@rp($data->harga_pcs)</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>@rp($data->harga)</td>
                </tr>
                @php
                $totalPembelianBarang += $data->harga;
                @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: left;"><strong>Total Pembelian Barang</strong></td>
                    <td><strong>@rp($totalPembelianBarang)</strong></td>
                </tr>
            </tfoot>
        </table>
</body>
