<form autocomplete="off" class="row g-3 mt-2" action="<?= site_url() ?>produk" method="POST" id="form">
    <?= csrf_field() ?>

    <div class="row mb-3">
        <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" autofocus>
            <div class="invalid-feedback error-nama_produk"></div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="harga" class="col-sm-4 col-form-label">Harga Produk</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="harga" name="harga" autofocus placeholder="Input Angka">
            <div class="invalid-feedback error-harga"></div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="status" class="col-sm-4 col-form-label">status</label>
        <div class="col-sm-8">
            <select class="form-control" name="status" id="status">
                <option value=""></option>
                <option value="bisa dijual">Bisa Dijual</option>
                <option value="tidak bisa dijual">Tidak Bisa Dijual</option>
            </select>
            <div class="invalid-feedback error-status"></div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="kategori" name="kategori" autofocus>
            <div class="invalid-feedback error-kategori"></div>
        </div>
    </div>

    <div class="col-md-9 offset-3 mb-3">
        <button id="tombolSimpan" class="btn px-5 btn-outline-primary" type="submit">Simpan<i class="fa-fw fa-solid fa-check"></i></button>
    </div>
</form>



<script>
    $('#form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('#tombolSimpan').html('Tunggu <i class="fa-solid fa-spin fa-spinner"></i>');
                $('#tombolSimpan').prop('disabled', true);
            },
            complete: function() {
                $('#tombolSimpan').html('Simpan <i class="fa-fw fa-solid fa-check"></i>');
                $('#tombolSimpan').prop('disabled', false);
            },
            success: function(response) {
                if (response.error) {
                    let err = response.error;
                    if (err.error_nama_produk) {
                        $('.error-nama_produk').html(err.error_nama_produk);
                        $('#nama_produk').addClass('is-invalid');
                    } else {
                        $('.error-nama_produk').html('');
                        $('#nama_produk').removeClass('is-invalid');
                        $('#nama_produk').addClass('is-valid');
                    }
                    if (err.error_harga) {
                        $('.error-harga').html(err.error_harga);
                        $('#harga').addClass('is-invalid');
                    } else {
                        $('.error-harga').html('');
                        $('#harga').removeClass('is-invalid');
                        $('#harga').addClass('is-valid');
                    }
                    if (err.error_status) {
                        $('.error-status').html(err.error_status);
                        $('#status').addClass('is-invalid');
                    } else {
                        $('.error-status').html('');
                        $('#status').removeClass('is-invalid');
                        $('#status').addClass('is-valid');
                    }
                    if (err.error_kategori) {
                        $('.error-kategori').html(err.error_kategori);
                        $('#kategori').addClass('is-invalid');
                    } else {
                        $('.error-kategori').html('');
                        $('#kategori').removeClass('is-invalid');
                        $('#kategori').addClass('is-valid');
                    }
                }
                if (response.success) {
                    $('#my-modal').modal('hide')
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.success,
                    }).then((value) => {
                        location.reload()
                    })
                }
            },
            error: function(e) {
                alert('Error \n' + e.responseText);
            }
        });
        return false
    })
    

    $(document).ready(function() {
        $("#status").select2({
            theme: "bootstrap-5",
            dropdownParent: $('#my-modal')
        });

    })
</script>