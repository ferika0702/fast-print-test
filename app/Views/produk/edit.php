<form autocomplete="off" class="row g-3 mt-3" action="<?= site_url() ?>produk/<?= $produk['id_produk'] ?>" method="POST" id="form">

    <?= csrf_field() ?>

    <input type="hidden" name="_method" value="PUT">

    <div class="row mb-3">
        <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $produk['nama_produk']; ?>" autofocus>
            <div class="invalid-feedback error-nama_produk"></div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="harga" class="col-sm-4 col-form-label">Harga Produk</label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $produk['harga']; ?>" autofocus placeholder="Input Angka">
            <div class="invalid-feedback error-harga"></div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="status" class="col-sm-4 col-form-label">status</label>
        <div class="col-sm-8">
            <select class="form-control" name="status" id="status">
                <option value="<?= $produk['status']; ?>"><?= $produk['status']; ?></option>
                <option value="bisa dijual">Bisa Dijual</option>
                <option value="tidak bisa dijual">Tidak Bisa Dijual</option>
            </select>
            <div class="invalid-feedback error-status"></div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $produk['kategori']; ?>" autofocus>
            <div class="invalid-feedback error-kategori"></div>
        </div>
    </div>

    <div class="text-center">
        <button id="#tombolUpdate" class="btn px-5 btn-outline-primary" type="submit">Update<i class="fa-fw fa-solid fa-check"></i></button>
    </div>
</form>

<?= $this->include('MyLayout/js') ?>

<script>
    $(document).ready(function() {
        // Alert
        var op = <?= (!empty(session()->getFlashdata('pesan')) ? json_encode(session()->getFlashdata('pesan')) : '""'); ?>;
        if (op != '') {
            Toast.fire({
                icon: 'success',
                title: op
            })
        }

        // Bahan Alert
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            background: '#63ec88',
            color: '#fff',
            iconColor: '#fff',
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    })

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