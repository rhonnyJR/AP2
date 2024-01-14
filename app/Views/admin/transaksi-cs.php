<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>
<div class="card card-primary">
    <div class="card-header">
        <i class="fas fa-credit-card"></i>&nbsp;&nbsp;&nbsp;
        <h4>Daftar Transaksi Catering</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center"> No </th>
                        <th>Nama Service</th>
                        <th>Nama Pemesan</th>
                        <th>Tanggal Booking</th>
                        <th>Durasi</th>
                        <th>Total</th>
                        <th>Jenis Pembayaran</th>
                        <th>Bank Tujuan</th>
                        <th>Status Pembayaran</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data as $data) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $data['NAMA_SERVICE'] ?></td>
                            <td><?= $data['NAMA_LENGKAP'] ?></td>
                            <td><?= $data['TANGGAL_BOOKING'] ?> - <?= $data['WAKTU_BOOKING'] ?></td>
                            <td><?= $data['DURASI'] ?></td>
                            <td><?= "Rp " . number_format($data['TOTAL'], 2, ',', '.') ?></td>
                            <td><?= $data['BANK_PEMBAYARAN'] == "DURIANPAY" ? "Payment Gateway" : "Transfer Bank" ?></td>
                            <td><?= $data['BANK_PEMBAYARAN'] ?></td>
                            <td><span class="badge badge-<?= hash_equals($data['STATUS_PEMBAYARAN'], 'DIKONFIRMASI') ? 'primary' : 'danger' ?>"><?= $data['STATUS_PEMBAYARAN'] ?></span></td>
                            <td class="text-center">
                                <?php
                                if (hash_equals($data['STATUS_PEMBAYARAN'], 'MENUNGGU KONFIRMASI') || hash_equals($data['STATUS_PEMBAYARAN'], 'KONFIRMASI DITOLAK')) :
                                ?>
                                    <a class="btn btn-primary btn-action btn-acc" data-toggle="tooltip" data-original-title="Konfirmasi">
                                        <form action="<?= route_to('tr-cs-update-status-admin', $data['ID_TRANSAKSI']); ?>" method="POST" id="konfirmasi" class="">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="STATUS_PEMBAYARAN" value="DIKONFIRMASI" />
                                        </form>
                                        <i class="fas fa-check"></i> Konfirmasi
                                    </a>
                                <?php
                                elseif (hash_equals($data['STATUS_PEMBAYARAN'], 'DIKONFIRMASI')) :
                                ?>
                                    <a class="btn btn-danger btn-action btn-rej" data-toggle="tooltip" data-original-title="Tolak">
                                        <form action="<?= route_to('tr-cs-update-status-admin', $data['ID_TRANSAKSI']); ?>" method="POST" id="tolak" class="">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="STATUS_PEMBAYARAN" value="KONFIRMASI DITOLAK" />
                                        </form>
                                        <i class="fas fa-times"></i> Tolak
                                    </a>
                                <?php
                                else :
                                ?>
                                    <a href="#" class="btn btn-primary btn-action btn-accx" data-toggle="tooltip" data-original-title="Konfirmasi">
                                        <i class="fas fa-check"></i> Konfirmasi
                                    </a>
                                <?php
                                endif;
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke">
        <i>Copyright By KOMAHA TEAM</i>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('CSSModules') ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('JSModules') ?>
<script src="<?= base_url(); ?>/assets/modules/datatables/datatables.min.js"></script>
<script src="<?= base_url(); ?>/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<?= $this->endSection() ?>

<?= $this->section('JSSpecific') ?>
<script src="<?= base_url(); ?>/assets/js/page/modules-datatables.js"></script>
<?= $this->endSection() ?>

<?= $this->section('JSTemplate') ?>
<script>
    <?php if (session()->getFlashData('pesan')) : ?>
        swal('Sukses', '<?= session()->getFlashData('pesan'); ?>', 'success', {
            buttons: false,
            timer: 1200,
        });
    <?php endif ?>

    $(document).on("click", ".btn-accx", function(e) {
        swal('Danger', 'Anda tidak bisa mengkonfirmasi, karna status masih belum bayar!', 'warning', {
            buttons: false,
            timer: 1200,
        });
    });

    $(document).on("click", ".btn-acc", function(e) {
        $('#konfirmasi').submit();
    });

    $(document).on("click", ".btn-rej", function(e) {
        $('#tolak').submit();
    });
</script>
<?= $this->endSection() ?>