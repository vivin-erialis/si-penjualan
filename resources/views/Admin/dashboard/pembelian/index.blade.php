@extends('admin.dashboard.layouts.main')
@section('container')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col mt-1">
                @if (session()->has('pesan'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        {{ session('pesan') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row m-1">
            <div class="card p-2">
                <form id="dateRangeForm" class="form-inline" method="get" action="/admin/pembelian">
                    <div class="form-group">
                        <label for="bulan" class="mx-3">Pilih Bulan</label>
                        <input type="month" class="form-control" id="bulan" name="bulan" value="{{ request('bulan') }}">
                    </div>

                    <button type="submit" class="btn btn-warning btn-sm mb-2 mx-3 mt-2"><i class="fa fa-search mr-2"></i>Cari</button>
                </form>
            </div>
            <!-- Add a form to select the date range -->


        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row p-2">
                            <div class="col-md-10 mt-1">
                                <strong class="card-title">Data Pembelian Barang</strong>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-success btn-sm btn-default"
                                href="{{ route('cetaklaporanpembelian', ['bulan' => request('bulan')]) }}"
                                target="_blank" style="color: white;">
                                <i class="fa fa-print"></i> Cetak Laporan
                             </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            @if ($item->barang)
                                                {{ $item->Barang->nama_barang }}
                                            @endif
                                        </td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>

                                    </tr>
                                    <!-- Pop Up Edit -->
                                    <div class="modal fade" id="editModal{{ $item->id }}" data-bs-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="row card-header">
                                                    <strong> Edit Data Transaksi</strong>
                                                </div>
                                                <form action="/admin/transaksi/{{ $item->id }}" method="POST"
                                                    class="mt-1">
                                                    @method('PUT')
                                                    @csrf

                                                    <div class="p-3">
                                                        <div class="form-group">
                                                            <label for="kodeTransaksi">Kode</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $item->kode_transaksi }}" name="kode_transaksi"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kode_barang">Barang</label>
                                                            <select class="form-control" name="kode_barang" id="kode_barang"
                                                                required>
                                                                <!-- Ambil data barang dari database dan tampilkan sebagai pilihan -->
                                                                @foreach ($barang as $barangItem)
                                                                    <option value="{{ $barangItem->id }}"
                                                                        @if ($barangItem->id === $item->kode_barang) selected @endif>
                                                                        {{ $barangItem->nama_barang }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jenis Transaksi</label>
                                                            <div style="display: flex;">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="jenis_transaksi" value="masuk"
                                                                        @if ($item->jenis_transaksi === 'masuk') checked @endif>
                                                                    <label class="form-check-label">Barang Masuk</label>
                                                                </div>
                                                                <div class="form-check mx-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="jenis_transaksi" value="keluar"
                                                                        @if ($item->jenis_transaksi === 'keluar') checked @endif>
                                                                    <label class="form-check-label">Barang Keluar</label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="jumlah">Jumlah</label>
                                                            <input type="number" class="form-control" id="jumlah_1"
                                                                name="jumlah" value="{{ $item->jumlah }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="harga">Harga</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon1">Rp</span>
                                                                </div>
                                                                <input type="number" id="harga_1" class="form-control"
                                                                    name="harga" value="{{ $item->harga }}"
                                                                    oninput="calculateTotal1()">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="total">Total</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon1">Rp</span>
                                                                </div>
                                                                <input type="number" id="total_1" class="form-control"
                                                                    value="{{ $item->total }}" name="total" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <button type="submit"
                                                                class="btn btn-success btn-sm mx-1 mb-2 mt-2"
                                                                style="float: right;"><i class="fa fa-save mx-1"></i>
                                                                Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Pop Up Edit -->
                                    <div class="modal fade" id="detailModal{{ $item->id }}" data-bs-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="row card-header">
                                                    <strong> Detail Data Transaksi</strong>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-group list-group-flush p-2">
                                                        <li class="list-group-item">
                                                            Kode Transaksi <span
                                                                class="badge badge-primary pull-right">{{ $item->kode_transaksi }}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            Jenis Transaksi <span
                                                                class="badge badge-primary pull-right">{{ $item->jenis_transaksi }}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            Jumlah <span
                                                                class="badge badge-primary pull-right">{{ $item->jumlah }}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            Total <span
                                                                class="badge badge-primary pull-right ">{{ $item->total }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop Up Add -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="row card-header">
                    <strong> Tambah Data Transaksi</strong>
                </div>
                <div class="modal-body">
                    <form action="/admin/transaksi" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kodeTransaksi">Kode</label>
                            <input type="text" class="form-control" id="kodeTransaksiInput" name="kode_transaksi"
                                readonly>
                        </div>
                        <div class="form-group"><label>Jenis Transaksi</label>
                            <div style="display: flex;">
                                <div class="form-check"><input class="form-check-input" type="radio"
                                        name="jenis_transaksi" value="masuk"><label class="form-check-label">Barang
                                        Masuk</label></div>
                                <div class="form-check mx-3"><input class="form-check-input" type="radio"
                                        name="jenis_transaksi" value="keluar"><label class="form-check-label">Barang
                                        Keluar</label></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kode_barang">Barang</label>
                            <select class="form-control" name="kode_barang" id="kode_barang" required>
                                @foreach ($barang as $barangItem)
                                    <option value="{{ $barangItem->id }}">{{ $barangItem->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group"><label for="jumlah">Jumlah</label><input type="number"
                                class="form-control" id="jumlah" name="jumlah" id="jumlah" required></div>
                        <div class="form-group"><label for="harga">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"
                                        id="basic-addon1">Rp</span></div><input type="number" id="harga"
                                    class="form-control" name="harga" oninput="calculateTotal()">
                            </div>
                        </div>
                        <div class="form-group"><label for="total">Harga/pcs</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"
                                        id="basic-addon1">Rp</span></div><input type="number" id="harga_pcs"
                                    class="form-control" name="harga_pcs" readonly>
                            </div>
                        </div>
                        <div class="mt-3"><button type="submit" class="btn btn-success btn-sm mx-1 mb-2 mt-2"
                                style="float: right;"><i class="fa fa-save mx-1"></i> Simpan</button></div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Pop Up Add -->
@endsection
