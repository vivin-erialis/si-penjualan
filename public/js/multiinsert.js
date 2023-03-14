let nama = $('#nama').value;
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

        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#table-kategori').append(
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

        $(document).on('click', '.remove-table-row', function() {
            $(this).parents('tr').remove();
        });