<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Tambah Data Catering</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= route_to('catering-store-admin'); ?>" class="needs-validation form-simpan" novalidate="" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama-catering">Nama Menu Catering</label>
                    <input type="text" class="form-control" id="nama-catering" name="NAMA_MENU" placeholder="Masukkan Nama Menu Catering" onkeyup="this.value = this.value.toUpperCase()" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="jk">Kategori</label>
                    <?php
                    $option = [
                        ''          => 'Pilih Kategori',
                        'AYAM'      => 'Ayam',
                        'SEAFOOD'   => 'Seafood',
                        'SAPI'      => 'Sapi',
                        'STEAK'     => 'Steak',
                        'KAMBING'   => 'Kambing',
                    ];
                    $js = [
                        'class'         => 'form-control selectric',
                        'id'            => 'jk'
                    ];
                    echo form_dropdown('KATEGORI', $option, '',  $js);
                    ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control numonly" id="harga" name="HARGA" placeholder="Masukkan Harga" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="fasilitas">Deskripsi</label>
                    <textarea class="form-control" id="fasilitas" name="DESKRIPSI" required></textarea>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Pisahkan antar item dengan karakter | <strong>"Pipeline"</strong> tanpa menggunakan <strong>Enter</strong>
                    </small>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Contoh : Harga untuk per 1 kotak/box|Pemesanan minimal H-1|Isi dalam box berupa Nasi, Ayam Goreng, Sambal, Lalapan, Acar.|dst..
                    </small>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="alamat">Preview Gambar</label>
                    <img src="<?= base_url() ?>/assets/img/profile/default.png" class="img-thumbnail img-preview" />
                </div>
                <div class="form-group col-md-4">
                    <label for="pilih-foto">Pilih Gambar</label>
                    <input onchange="previewImg()" id="pilih-foto" type="file" name="FOTO" class="form-control foto" placeholder="Upload Image" accept=".png, .jpg, .webp">
                </div>
            </div>

            <hr>

        </form>
        <div class="card-footer text-right">
            <button type="button" class="btn btn-primary btn-lg btn-simpan">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>

    </div>
    <div class="card-footer bg-whitesmoke">
        <i>Copyright By KOMAHA TEAM</i>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('CSSModules') ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/modules/jquery-selectric/selectric.css">
<?= $this->endSection() ?>

<?= $this->section('JSModules') ?>
<script src="<?= base_url() ?>/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?= base_url() ?>/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<?= $this->endSection() ?>

<?= $this->section('JSSpecific') ?>
<?= $this->endSection() ?>

<?= $this->section('JSTemplate') ?>
<script text="text/javascript">
    $(document).on("click", ".btn-simpan", function(e) {
        $('.form-simpan').submit();
    });
</script>
<?= $this->endSection() ?>