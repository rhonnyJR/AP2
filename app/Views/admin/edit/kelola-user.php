<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Ubah Data Pengguna</h4>
    </div>
    <div class="card-body">

        <?php
        $URI = explode('/', current_url(true));
        $SEGMENT = $URI[3];
        ?>
        <form method="POST" action="<?= route_to(hash_equals($SEGMENT, 'user') ? 'users-update-profile' : 'users-update-admin', $data['ID_USER']); ?>" class="needs-validation form-simpan" novalidate="">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT" />

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="EMAIL" placeholder="Masukkan Email" value="<?= $data['EMAIL'] ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="USERNAME" placeholder="Masukkan Username" value="<?= $data['USERNAME'] ?>" onkeyup="this.value = this.value.toUpperCase()" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="NAMA_LENGKAP" placeholder="Masukkan Nama Lengkap" value="<?= $data['NAMA_LENGKAP'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="jk">Jenis Kelamin</label>
                    <?php
                    $option = [
                        'LAKI-LAKI'   => 'Laki - Laki',
                        'PEREMPUAN'     => 'Perempuan',
                    ];
                    $js = [
                        'class'         => 'form-control selectric',
                        'id'            => 'jk'
                    ];
                    echo form_dropdown('JENIS_KELAMIN', $option, $data['JENIS_KELAMIN'], $js);
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="telepon">No. Telepon</label>
                    <input type="text" class="form-control numonly" id="telepon" name="TELEPON" placeholder="Masukkan Telepon" value="<?= $data['TELEPON'] ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="PASSWORD" placeholder="Masukkan Password" value="<?= $data['PASSWORD'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="ALAMAT" required><?= $data['ALAMAT'] ?></textarea>
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

    <?php if (session()->getFlashData('pesan')) : ?>
        swal('Sukses', '<?= session()->getFlashData('pesan'); ?>', 'success', {
            buttons: false,
            timer: 1200,
        });
    <?php endif ?>
</script>
<?= $this->endSection() ?>