<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Tambah Data Kost</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= route_to('kost-store-admin'); ?>" class="needs-validation form-simpan" novalidate="" enctype="multipart/form-data">
            <?= csrf_field(); ?>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama-kost">Nama Kost</label>
                    <input type="text" class="form-control" id="nama-kost" name="NAMA_KOST" placeholder="Masukkan Nama Kost" onkeyup="this.value = this.value.toUpperCase()" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="jk">Jenis Kost</label>
                    <?php
                    $option = [
                        ''          => 'Pilih Jenis Kost',
                        'PUTRA'     => 'Putra',
                        'PUTRI'     => 'Putri',
                    ];
                    $js = [
                        'class'         => 'form-control selectric',
                        'id'            => 'jk'
                    ];
                    echo form_dropdown('JENIS_KOST', $option, '',  $js);
                    ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="tersedia">Kamar Kosong Yang Tersedia</label>
                    <input type="text" class="form-control numonly" id="tersedia" name="TERSEDIA" placeholder="Masukkan Banyak Kamar Kosong" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="username">Area</label>
                    <?php
                    $option = [
                        ''          => 'Pilih Area',
                        'KLOJEN'    => 'Klojen',
                        'LOWOKWARU' => 'Lowokwaru',
                        'SUKUN'     => 'Sukun',
                        'BLIMBING'  => 'Blimbing',
                    ];
                    $js = [
                        'class'         => 'form-control selectric',
                        'id'            => 'area'
                    ];
                    echo form_dropdown('AREA', $option,  '', $js);
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control numonly" id="harga" name="HARGA" placeholder="Masukkan Harga" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="name">Periode Pembayaran</label>
                    <?php
                    $option = [
                        ''          => 'Pilih Periode',
                        'HARI'      => 'Per Hari',
                        'MINGGU'    => 'Per Minggu',
                        'BULAN'     => 'Per Bulan',
                        'TAHUN'     => 'Per Tahun',
                    ];
                    $js = [
                        'class'         => 'form-control selectric',
                        'id'            => 'periode'
                    ];
                    echo form_dropdown('PERIODE', $option, '', $js);
                    ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="fasilitas">Fasilitas</label>
                    <textarea class="form-control" id="fasilitas" name="FASILITAS" required></textarea>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Pisahkan antar item dengan karakter | <strong>"Pipeline"</strong> tanpa menggunakan <strong>Enter</strong>
                    </small>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Contoh : Lokasi strategis dekat dengan UB, UIN, UM.|Tempat nyaman.|Kamar mandi dalam.|dst..
                    </small>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="ALAMAT" required></textarea>
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

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="alamat">Rekomendasikan</label>
                    <div class="custom-switches-stacked mt-2">
                        <label class="custom-switch">
                            <input type="checkbox" name="REKOMENDASI" class="custom-switch-input" value="YA">
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description">Jadikan kost ini menjadi rekomendasi!</span>
                        </label>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Rekomendasi kost adalah kost yang direkomendasikan untuk dipilih pelanggan, dan akan tampil di halaman depan.
                    </small>
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