<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>
<div class="card card-primary">
    <div class="card-header">
        <i class="fas fa-credit-card"></i>&nbsp;&nbsp;&nbsp;
        <h4>Daftar Transaksi Kost</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center"> No </th>
                        <th>Nama Menu</th>
                        <th>Tanggal Pengiriman</th>
                        <th>Banyak</th>
                        <th>Harga</th>
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
                            <td><?= $data['NAMA_MENU'] ?></td>
                            <td><?= $data['TANGGAL_PENGIRIMAN'] ?> - <?= $data['WAKTU_PENGIRIMAN'] ?></td>
                            <td><?= $data['QUANTITY'] ?></td>
                            <td><?= "Rp " . number_format($data['HARGA'], 2, ',', '.') ?></td>
                            <td><?= "Rp " . number_format($data['TOTAL'], 2, ',', '.') ?></td>
                            <td><?= $data['BANK_PEMBAYARAN'] == "DURIANPAY" ? "Payment Gateway" : "Transfer Bank" ?></td>
                            <td><?= $data['BANK_PEMBAYARAN'] ?></td>
                            <td><span class="badge badge-<?= hash_equals($data['STATUS_PEMBAYARAN'], 'DIKONFIRMASI') ? 'primary' : 'danger' ?>"><?= $data['STATUS_PEMBAYARAN'] ?></span></td>
                            <td class="text-center">
                                <a href="<?= route_to('tr-catering-user-detail', $data['ID_TRANSAKSI']); ?>" class="btn btn-primary btn-action" data-toggle="tooltip" data-original-title="Lihat Detail">
                                    <i class="fas fa-bars"></i> Lihat Detail
                                </a>
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
</script>
<?= $this->endSection() ?>