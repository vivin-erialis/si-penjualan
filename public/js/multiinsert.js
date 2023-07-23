let nama = $('#nama').value;
// Form Kategori
var i = 0;
$('#add').click(function () {
    ++i;
    $('#table').append(
        `<tr>
        <td>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="inputs[` + i + `][kode_kategori]">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="inputs[` + i + `][nama_kategori]">
                </div>
            </div>
        </td>
        <td>
        <button type="button" class="btn btn-danger btn-sm remove-table-row"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
       
    `
    );
});

// Form Barang Masuk
var i = 0;
$('#add').click(function () {
    ++i;
    $('#table-barangmasuk').append(
        `<tr>
            <td><input type="text" class="form-control" name="inputs[` + i + `][kode]"></td>
            <td><input type="text" class="form-control" name="inputs[` + i + `][nama_barang]"></td>
            <td><input type="text" class="form-control" name="inputs[` + i + `][jumlah]"></td>
            <td><input type="text" class="form-control" name="inputs[` + i + `][harga]"></td>
            <td><textarea name="inputs[` + i + `][keterangan]"  cols="30" rows="4"></textarea></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-table-row"><i class="fa fa-trash"></i></button></td>
            </tr>`
    );
});

// Form Barang
var i = 0;
$('#add').click(function () {
    ++i;
    $('#table-barang').append(
        `<tr>
                <td><input type="text" class="form-control" name="inputs[` + i + `][kode]" placeholder="masukkan kode"></td>
                <td><select class="form-control form-select" aria-label="Default select example" name="inputs[0][kode_kategori]">
                @foreach($kategori as $kategori)
                <option value="`+ $kategori.id + `">` + $kategori.kategori_nama + `</option>
                @endforeach
            </select></td>
            
            </tr>
            <tr>
            <td><input type="text" class="form-control" name="inputs[` + i + `][nama_barang]" placeholder="masukkan nama"></td>
            <td><input type="text" class="form-control" name="inputs[` + i + `][stok]" placeholder="masukkan stok"></td>
            
            </tr>
            <tr>
            <td><input type="text" class="form-control" name="inputs[` + i + `][harga]" placeholder="masukkan harga"></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-table-row"><i class="fa fa-trash"></i></button></td>
            </tr>`
    );
});

$(document).on('click', '.remove-table-row', function () {
    $(this).parents('tr').remove();
});

function generateRandomString(length) {
    var characters = '1234567890';
    var result = '';
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return result;
}

// Function Untuk Generate Kode Kategori Produk
function generateKodeKategoriProduk() {
    // Misalnya, Anda ingin membuat kode berdasarkan waktu saat ini
    var currentDate = new Date();
    var year = currentDate.getFullYear().toString().slice(-2); // Ambil dua digit terakhir tahun
    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Ambil dua digit terakhir bulan
    var day = ('0' + currentDate.getDate()).slice(-2); // Ambil dua digit terakhir tanggal

    // Contoh format kode: KATEGORI-YYMMDD-XXXX
    var kodeKategori = 'KK-KP-' + year + month + day + '-' + generateRandomString(2);

    document.getElementById('kodeKategoriInput').value = kodeKategori;
}

// Function Untuk Generate Kode Kategori Barang
function generateKodeKategoriBarang() {
    // Misalnya, Anda ingin membuat kode berdasarkan waktu saat ini
    var currentDate = new Date();
    var year = currentDate.getFullYear().toString().slice(-2); // Ambil dua digit terakhir tahun
    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Ambil dua digit terakhir bulan
    var day = ('0' + currentDate.getDate()).slice(-2); // Ambil dua digit terakhir tanggal

    // Contoh format kode: KATEGORI-YYMMDD-XXXX
    var kodeKategori = 'KK-KB-' + year + month + day + '-' + generateRandomString(2);

    document.getElementById('kodeKategoriInput').value = kodeKategori;
}

// Function Untuk Generate Kode  Barang
function generateKodeBarang() {
    // Misalnya, Anda ingin membuat kode berdasarkan waktu saat ini
    var currentDate = new Date();
    var year = currentDate.getFullYear().toString().slice(-2); // Ambil dua digit terakhir tahun
    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Ambil dua digit terakhir bulan
    var day = ('0' + currentDate.getDate()).slice(-2); // Ambil dua digit terakhir tanggal

    // Contoh format kode: KATEGORI-YYMMDD-XXXX
    var kodeBarang = 'KB-AP-' + year + month + day + '-' + generateRandomString(2);

    document.getElementById('kodeBarangInput').value = kodeBarang;
}

// Function Untuk Generate Kode  Produk
function generateKodeProduk() {
    // Misalnya, Anda ingin membuat kode berdasarkan waktu saat ini
    var currentDate = new Date();
    var year = currentDate.getFullYear().toString().slice(-2); // Ambil dua digit terakhir tahun
    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Ambil dua digit terakhir bulan
    var day = ('0' + currentDate.getDate()).slice(-2); // Ambil dua digit terakhir tanggal

    // Contoh format kode: KATEGORI-YYMMDD-XXXX
    var kodeProduk = 'KP-AP-' + year + month + day + '-' + generateRandomString(2);

    document.getElementById('kodeProdukInput').value = kodeProduk;
}

// Function Untuk Generate Kode  Penjualan
function generateKodePenjualan() {
    // Misalnya, Anda ingin membuat kode berdasarkan waktu saat ini
    var currentDate = new Date();
    var year = currentDate.getFullYear().toString().slice(-2); // Ambil dua digit terakhir tahun
    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Ambil dua digit terakhir bulan
    var day = ('0' + currentDate.getDate()).slice(-2); // Ambil dua digit terakhir tanggal

    // Contoh format kode: KATEGORI-YYMMDD-XXXX
    var kodePenjualan = 'KJ-AP-' + year + month + day + '-' + generateRandomString(2);

    document.getElementById('kodePenjualanInput').value = kodePenjualan;
}

// Function Untuk Generate Kode  Transaksi
function generateKodeTransaksi() {
    // Misalnya, Anda ingin membuat kode berdasarkan waktu saat ini
    var currentDate = new Date();
    var year = currentDate.getFullYear().toString().slice(-2); // Ambil dua digit terakhir tahun
    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Ambil dua digit terakhir bulan
    var day = ('0' + currentDate.getDate()).slice(-2); // Ambil dua digit terakhir tanggal

    // Contoh format kode: KATEGORI-YYMMDD-XXXX
    var kodeTransaksi = 'KT-MK-' + year + month + day + '-' + generateRandomString(2);

    document.getElementById('kodeTransaksiInput').value = kodeTransaksi;
}

// Function Untuk Generate Kode  Sewa
function generateKodeSewa() {
    // Misalnya, Anda ingin membuat kode berdasarkan waktu saat ini
    var currentDate = new Date();
    var year = currentDate.getFullYear().toString().slice(-2); // Ambil dua digit terakhir tahun
    var month = ('0' + (currentDate.getMonth() + 1)).slice(-2); // Ambil dua digit terakhir bulan
    var day = ('0' + currentDate.getDate()).slice(-2); // Ambil dua digit terakhir tanggal

    // Contoh format kode: KATEGORI-YYMMDD-XXXX
    var kodeSewa = 'KS-AP-' + year + month + day + '-' + generateRandomString(2);

    document.getElementById('kodeSewaInput').value = kodeSewa;
}
