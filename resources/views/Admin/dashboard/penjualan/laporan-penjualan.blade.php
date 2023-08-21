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
    <div class="header" style="text-align: left; margin-left: 80px;">
        <img src="../public/images/Ayesha.png" alt="" width="23%" style="margin-left:90px;">
        <div class="header" style="text-align: center; margin-top:-110px;">
            <h1>Laporan Penjualan</h1>
            <h3>Toko Ayesha Projek</h3>
            <p>Jl. Balai Baru Padang | WhatsApp : +62 8 1383093724 | IG : @ayeshaprojek</p>
        </div>
    </div>
    <hr>

    @php
        $daftarBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $currentMonth = null;
        $totalPenjualanBulan = 0;
    @endphp

    @foreach ($penjualan as $index => $data)
        @php
            $tanggal = \Carbon\Carbon::createFromFormat('Y-m-d', $data->tanggal_transaksi);
            $bulan = $daftarBulan[$tanggal->format('n') - 1] . ' ' . $tanggal->format('Y');
        @endphp

        @if ($bulan !== $currentMonth)
            @if (!is_null($currentMonth))
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" style="text-align: left;"><strong>Total Penjualan</strong></td>
                        <td><strong>@rp($totalPenjualanBulan)</strong></td>
                    </tr>
                </tfoot>
                </table>
            @endif

            <h4 style="text-align: center;">Data Penjualan Bulan {{ $bulan }}</h4>
            <table class="laporan-table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Produk</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $currentMonth = $bulan;
                        $totalPenjualanBulan = 0;
                    @endphp
        @endif

        <tr>
            <td>{{ $tanggal->format('d/m/Y') }}</td>
            <td>{{ $data->produk->nama_produk }}</td>
            <td>@rp($data->harga)</td>
        </tr>

        @php
            $totalPenjualanBulan += $data->harga;
        @endphp
    @endforeach

    @if (!is_null($currentMonth))
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: left;"><strong>Total Penjualan</strong></td>
                <td><strong>@rp($totalPenjualanBulan)</strong></td>
            </tr>
        </tfoot>
        </table>
    @endif
</body>
