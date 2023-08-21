@extends('petugas.dashboard.layouts.main')
@section('container')
    <div class="">
        <div class="modal-content">
            <div class=" card-header">
                <strong>Tambah Data Produk</strong>
            </div>
            <form action="/petugas/produk" method="POST" class="p-5 mt-2" enctype="multipart/form-data">
                @csrf
                <div style="display: flex;">
                    <div class="col">
                        <!-- Bagian informasi produk -->
                        <div class="row" style="display: flex">
                            <div class="form-group col-sm-6">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="kode_kategori">Kategori</label>
                                <select class="form-control form-select" aria-label="Default select example"
                                    name="kode_kategori" required>
                                    <option>-- Pilih Kategori --</option>
                                    @foreach ($kategoriproduk as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row" style="display: flex">
                            <div class="form-group col-sm-4">
                                <label for="harga_modal">Harga Modal</label>
                                <input type="number" class="form-control" name="harga_modal" id="harga_modal_input" readonly>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="harga_modal">Pilih Komponen</label>
                                <button type="button" data-bs-target="#modalKomponen" data-bs-toggle="modal"
                            class="btn btn-secondary btn-sm">  Komponen<i class="fa fa-right-to-bracket mx-1"></i></button>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="harga">Harga</label>
                                <div class="input-group">

                                    <input type="number" class="form-control" name="harga_jual" required>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Komponen -->
                        <div class="modal fade" id="modalKomponen" tabindex="-1" role="dialog"
                            aria-labelledby="modalKomponenLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="card-header">
                                        <div class="row p-2">
                                            <div class="col-md-10 mt-1">
                                                <strong class="card-title">Pilih Komponen Barang</strong>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <table id="bootstrap-data-table" class="table table-striped table-hover">                                                <thead>
                                                    <tr>
                                                        <th>Nama Barang</th>
                                                        <th>Stok</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($barang as $index => $item)
                                                        <tr>
                                                            <td>{{ $item->nama_barang }}</td>
                                                            <td>{{ $item->stok }}</td>
                                                            <td>
                                                                <input type="number" class="form-control komponen-jumlah"
                                                                       name="jumlah_komponen[{{ $item->id }}]" min="1" value=""
                                                                       max="{{ $item->stok }}">
                                                            </td>
                                                            <td> Rp.
                                                                {{ $item->harga }}
                                                                <input type="hidden" class="komponen-harga"
                                                                       name="komponenId[{{ $item->id }}]" value="{{ $item->id }}"
                                                                       data-harga="{{ $item->harga }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        {{-- </form> --}}
                                        <div id="totalHargaModal" class="mt-3 mx-3 card-header">
                                            Total Harga Modal: Rp. <span id="hargaModal">0.00</span>
                                        </div>


                                        <script>
                                            const komponenJumlahInputs = document.querySelectorAll('.komponen-jumlah');
                                            const komponenHargaInputs = document.querySelectorAll('.komponen-harga');
                                            const hargaModalSpan = document.getElementById('hargaModal');

                                            komponenJumlahInputs.forEach((input, index) => {
                                                input.addEventListener('input', updateTotalHargaModal);
                                            });

                                            function updateTotalHargaModal() {
                                                let totalHargaModal = 0;

                                                komponenJumlahInputs.forEach((input, i) => {
                                                    const jumlah = parseFloat(input.value) || 0; // Parse as float or set to 0 if NaN
                                                    const harga = parseFloat(komponenHargaInputs[i].getAttribute('data-harga'));
                                                    totalHargaModal += jumlah * harga;
                                                });

                                                hargaModalSpan.textContent = totalHargaModal;

                                                // Update harga modal di form produk sebelum menutup modal
                                                const hargaModalInput = document.getElementById('harga_modal_input');
                                                hargaModalInput.value = totalHargaModal;
                                            }

                                            document.querySelector('form').addEventListener('submit', function() {
                                                const hargaModalInput = document.getElementById('harga_modal_input');
                                                hargaModalInput.value = hargaModalSpan.textContent; // Menggunakan nilai yang dihitung sebelumnya
                                            });
                                        </script>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success btn-sm mr-3"
                                            data-bs-dismiss="modal"><i class="fa fa-check"></i> Pilih</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- ... -->

                        <div class="form-group ">
                            <label for="nama_produk">Deskripsi</label>
                            <textarea type="text" class="form-control" row="3" name="deskripsi" required></textarea>
                        </div>

                        <!-- Bagian foto -->
                        <div class="form-group ">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto"
                                accept="image/jpeg, image/png, image/jpg, image/gif" onchange="validateFile(this)">
                            <small class="form-text text-muted">Pastikan foto berformat JPEG, PNG, JPG, atau GIF dan
                                ukuran maksimal 2MB.</small>
                        </div></div>
                        <div class="form-group">
                            <!-- <label>Status</label> -->
                            <div style="display: flex;" hidden>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="Belum Terjual"
                                        checked>
                                    <label class="form-check-label">Belum Terjual</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="Terjual">
                                    <label class="form-check-label">Terjual</label>
                                </div>
                            </div>
                        </div>
                        <!-- ... -->
                        <!-- Tombol Submit -->

                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success btn-sm mx-1 mb-2 mt-2" style="float: right;">
                            <i class="fa fa-save mx-1"></i> Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
