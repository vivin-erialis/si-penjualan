let nama = $('#nama').value;
// Form Kategori Barang
var i = 0;
$('#add').click(function () {
    ++i;
    $('#kategori-barang').append(
        `
        <div class="multiinsert row mb-3">
        <div class="col-sm-11">

            <input type="text" class="form-control" name="inputs[` + i + `][nama_kategori]" required>
        </div>
        <div class="col-sm-1">
        <button type="button" class="btn btn-danger btn-sm remove-komponen" style="margin-left:-15px;"><i class="fa fa-trash"></i></button>

        </div>
    </div>
        

       
    `
    );
});

// let nama = $('#nama').value;
// Form Kategori Produk
var i = 0;
$('#add').click(function () {
    ++i;
    $('#kategori-produk').append(
        `
        <hr>
        <div class="row mb-3">
            <label for="kategoriNama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="inputs[` + i + `][nama_kategori]" required>
            </div>
            <div class="col-sm-2">

            <button type="button" class="btn btn-danger btn-sm remove-komponen" style="margin-left:-15px;"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Tipe</label>
            <div class="col-sm-8" style="display: flex;">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="inputs[` + i + `][tipe]" value="produk">
                    <label class="form-check-label" for="tipeProduk">Produk</label>
                </div>
                <div class="form-check mx-3">
                    <input class="form-check-input" type="radio" name="inputs[` + i + `][tipe]" value="sewa">
                    <label class="form-check-label" for="tipeSewa">Sewa</label>
                </div>
            </div>
        </div>
    </div>
    `
    );
});

// Form Barang Masuk
var i = 0;
$('#add').click(function () {
    ++i;
    $('#produk').append(
        `
        `
    );
});

// Form Barang
var i = 0;
$('#add').click(function () {
    ++i;
   
});

// Multiinsert untuk komponen produk
var i = 0;
$('#add').click(function () {
    ++i;
    $('#komponen').append(
        `
        <div class="form-group multiinsert" style="display: flex;">

        <div class="col-sm-4">
        <select class="form-control form-select" aria-label="Default select example" name="kode_kategori">
            <option>Pilih</option>
            @foreach($barang as $b)
            <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-3">

        <input type="number" class="form-control" id="kodeProdukInput" name="harga">
    </div>
    <div class="col-sm-4">

        <input type="number" class="form-control" id="kodeProdukInput" name="harga">
    </div>

    <div class="col-sm-1">
    <button type="button" class="btn btn-danger btn-sm remove-komponen" style="margin-left:-15px; margin-top:5px;"><i class="fa fa-trash"></i></button>

                            </div>
                            </div>
                       

                    `
    );
});

$(document).on('click', '.remove-komponen', function () {
    $(this).parents('div.multiinsert').remove();
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

function calculateTotal() {
    // Mendapatkan nilai jumlah dan harga dari input
    const jumlah = parseFloat(document.getElementById('jumlah').value);
    const harga = parseFloat(document.getElementById('harga').value);

    // Menghitung total berdasarkan jumlah dan harga yang dimasukkan
    const total = jumlah * harga;

    // Menampilkan total pada input total
    document.getElementById('total').value = total;
}

function checkEnter(event) {
    if (event.key === "click") {
        calculateTotal(); // Panggil fungsi calculateTotal() saat tombol "Enter" ditekan
    }
}

function calculateTotal1() {
    // Mendapatkan nilai jumlah dan harga dari input
    const jumlah = parseFloat(document.getElementById('jumlah_1').value);
    const harga = parseFloat(document.getElementById('harga_1').value);

    // Menghitung total berdasarkan jumlah dan harga yang dimasukkan
    const total = jumlah * harga;

    // Menampilkan total pada input total
    document.getElementById('total_1').value = total;
}

function checkEnter(event) {
    if (event.key === "click") {
        calculateTotal(); // Panggil fungsi calculateTotal() saat tombol "Enter" ditekan
    }
}