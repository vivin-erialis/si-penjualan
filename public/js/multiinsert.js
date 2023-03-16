let nama = $('#nama').value;
        // Form Kategori
        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#table').append(
                `<tr>
            <td><input type="text" class="form-control" name="inputs[` + i + `][kategori_kode]"></td>
            <td><input type="text" class="form-control" name="inputs[` + i + `][kategori_nama]"></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-table-row"><i class="fa fa-trash"></i></button></td>
            </tr>`
            );
        });

        // Form Barang Masuk
        var i = 0;
        $('#add').click(function() {
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
        $('#add').click(function() {
            ++i;
            $('#table-barang').append(
                `<tr>
                <td><input type="text" class="form-control" name="inputs[` + i + `][kode]" placeholder="masukkan kode"></td>
                <td><select class="form-control form-select" aria-label="Default select example" name="inputs[0][kode_kategori]">
                @foreach($kategori as $kategori)
                <option value="`+$kategori.id+`">`+$kategori.kategori_nama+`</option>
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

        $(document).on('click', '.remove-table-row', function() {
            $(this).parents('tr').remove();
        });