<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>
<div class="card card-primary">
    <div class="card-header">
        <i class="fas fa-money-check-alt"></i>&nbsp;&nbsp;&nbsp;
        <h4>Daftar Transaksi Kost</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center"> No </th>
                        <th>Nama Kost</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
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
                        switch ($data['PERIODE']) {
                            case 'TAHUN':
                                $PERIODE = '+1 year';
                                break;
                            case 'BULAN':
                                $PERIODE = '+1 months';
                                break;
                            case 'MINGGU':
                                $PERIODE = '+1 week';
                                break;
                            case 'HARI':
                                $PERIODE = '+1 day';
                                break;
                        }
                    ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $data['NAMA_KOST'] ?></td>
                            <td><?= $data['TANGGAL_AWAL_MASUK'] ?></td>
                            <td><?= date('Y-m-d', strtotime($data['TANGGAL_AWAL_MASUK'] . $PERIODE))  ?></td>
                            <td><?= "Rp " . number_format($data['HARGA'], 2, ',', '.') ?></td>
                            <td><?= $data['BANK_PEMBAYARAN'] == "DURIANPAY" ? "Payment Gateway" : "Transfer Bank" ?></td>
                            <td><?= $data['BANK_PEMBAYARAN'] ?></td>
                            <td><span class="badge badge-<?= hash_equals($data['STATUS_PEMBAYARAN'], 'DIKONFIRMASI') ? 'primary' : 'danger' ?>"><?= $data['STATUS_PEMBAYARAN'] ?></span></td>
                            <td class="text-center">
                                <a href="<?= route_to('tr-kost-user-detail', $data['ID_TRANSAKSI']); ?>" class="btn btn-primary btn-action" data-toggle="tooltip" data-original-title="Lihat Detail">
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