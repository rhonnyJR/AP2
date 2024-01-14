<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>

<h2 class="section-title">DETAIL TRANSAKSI KOST</h2>
<div class="card card-primary">
    <div class="card-header">
        <h4>Rincian Transaksi</h4>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-striped" id="sortable-table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nama Kost</th>
                        <th>Jenis Kost</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                        <th>Tanggal Pembayaran Terakhir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">-</td>
                        <td><?= $dataKost['NAMA_KOST'] ?></td>
                        <td>Kos <?= ucfirst(strtolower($dataKost['JENIS_KOST'])) ?></td>
                        <td><?= "Rp " . number_format($dataKost['HARGA'], 2, ',', '.') . ' per ' . strtolower($dataKost['PERIODE']) ?></td>
                        <td><?= $dataKost['ALAMAT'] . ', Kec. ' .  ucfirst(strtolower($dataKost['AREA'])) ?>, Kota Malang</td>
                        <td><?= $dataTR['TANGGAL_AWAL_MASUK'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<hr>

<div class="card">
    <div class="card-header">
        <h4>Rincian Pembayaran</h4>
    </div>
    <?php
    if($dataTR['BANK_PEMBAYARAN'] != "DURIANPAY"){
        $dataTR['BANK_PEMBAYARAN'] = "Transfer BANK ".$dataTR['BANK_PEMBAYARAN'];
    }
    ?>
    <div class="card-body">
        <p>- STATUS PEMBAYARAN : <span class="badge badge-<?= hash_equals($dataTR['STATUS_PEMBAYARAN'], 'DIKONFIRMASI') ? 'primary' : 'danger' ?>"><?= $dataTR['STATUS_PEMBAYARAN'] ?></span></p>
        <p>- METODE PEMBAYARAN : <b><?= $dataTR['BANK_PEMBAYARAN'] ?></b></p>

        <hr>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="tanggal">Total Pembayaran</label>
                <div class="display-4"><?= "Rp " . number_format($dataTR['TOTAL'], 2, ',', '.') ?></div>
            </div>
        </div>

        <hr>

        <?php
        if ((hash_equals($dataTR['STATUS_PEMBAYARAN'], 'BELUM BAYAR') || hash_equals($dataTR['STATUS_PEMBAYARAN'], 'KONFIRMASI DITOLAK')) && $dataTR['BANK_PEMBAYARAN'] != 'DURIANPAY') :
        ?>

            <?php
            if (hash_equals($dataTR['STATUS_PEMBAYARAN'], 'BELUM BAYAR')) :
            ?>
                <p>Silahkan melakukan pembayaran dengan nominal diatas menggunakan metode <b>TRANSFER</b> menggunakan <b>BANK <?= $dataTR['BANK_PEMBAYARAN'] ?></b>, sebelum tanggal <b>(<?= $dataTR['TANGGAL_AWAL_MASUK'] ?>)</b> dengan informasi pembayaran sebagai berikut :</p>
            <?php
            else :
            ?>
                <p><b>PEMBAYARAN ANDA DITOLAK!. </b><br>Silahkan melakukan pembayaran kembali dengan nominal diatas menggunakan metode <b>TRANSFER</b> menggunakan <b>BANK <?= $dataTR['BANK_PEMBAYARAN'] ?></b>, sebelum tanggal <b>(<?= $dataTR['TANGGAL_AWAL_MASUK'] ?>)</b> dengan informasi pembayaran sebagai berikut :</p>

            <?php
            endif;
            switch ($dataTR['BANK_PEMBAYARAN']) {
                case 'BRI':
                    $NO_REK = '7746 8382 2255 03';
                    break;
                case 'BNI':
                    $NO_REK = '3244 8271 8';
                    break;
                case 'MANDIRI':
                    $NO_REK = '1112 3445 2255 3422';
                    break;
                default:
                    $NO_REK = '2399 524 88';
                    break;
            }
            ?>
            <p><b>1. </b> Nomor Rekening : <b><?= $NO_REK ?></b></p>
            <p><b>2. </b> Nama penerima : <b>KELVIN ANDIKA PRAKOSO</b></p>


            <button type="button" class="btn btn-primary btn-lg btn-upload">
                <i class="fas fa-file-invoice-dollar"></i> Upload Bukti Pembayaran
            </button>

        <?php
        else :
        ?>

        <?php 
        if ($dataTR['BANK_PEMBAYARAN'] == 'DURIANPAY') {
        ?>
            <button type="button" class="btn btn-primary btn-lg btn-durianpay">
                <i class="fas fa-wallet"></i> BAYAR SEKARANG
            </button>
        <?php 
        }else{
        ?>
            <button type="button" class="btn btn-warning btn-lg btn-view">
                <i class="fas fa-file-invoice-dollar"></i> Lihat Bukti Pembayaran
            </button>
        <?php 
        }
        ?>
        <?php
        endif;
        ?>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('Modal') ?>
<div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Upload Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= route_to('tr-kost-update-bukti-user', $dataTR['ID_TRANSAKSI']); ?>" class="needs-validation form-simpan" novalidate="" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT" />

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <img src="<?= base_url() ?>/assets/img/profile/default.png" class="img-thumbnail img-preview" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pilih-foto">Pilih Gambar</label>
                            <input onchange="previewImg()" id="pilih-foto" type="file" name="FOTO" class="form-control foto" placeholder="Upload Image" accept=".png, .jpg, .webp">
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer text-right">
                <button type="button" class="btn btn-primary btn-lg btn-simpan">
                    <i class="fas fa-save"></i> Upload
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalViewCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <img src="<?= base_url() ?>/assets/foto/<?= $dataTR['BUKTI_PEMBAYARAN'] ?>" class="img-thumbnail img-preview" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('CSSModules') ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/fullcalendar/fullcalendar.min.css">
<?= $this->endSection() ?>

<?= $this->section('JSModules') ?>
<script src="<?= base_url(); ?>/assets/modules/fullcalendar/fullcalendar.min.js"></script>
<?= $this->endSection() ?>

<?= $this->section('JSSpecific') ?>
<script src="<?= base_url(); ?>/assets/js/page/modules-calendar.js"></script>
<?= $this->endSection() ?>

<?= $this->section('JSTemplate') ?>
<script>
    <?php if (session()->getFlashData('pesan')) : ?>
        swal('Sukses', '<?= session()->getFlashData('pesan'); ?>', 'success', {
            buttons: false,
            timer: 1200,
        });
    <?php endif ?>

    $(document).on("click", ".btn-upload", function(e) {
        $('#modalCenter').modal('show');
    });

    $(document).on("click", ".btn-view", function(e) {
        $('#modalViewCenter').modal('show');
    });

    $(document).on("click", ".btn-simpan", function(e) {
        $('.form-simpan').submit();
    });

    $(document).on("click", ".btn-durianpay", function(e) {
        if('<?= $dataTR['STATUS_PEMBAYARAN'] ?>' != 'DIKONFIRMASI'){
            window.location.href = '<?= base_url(); ?>/PaymentGateway/checkoutDurianPay/kost/<?= $dataTR['ID_TRANSAKSI']; ?>';
        }else{
            swal('Informasi', 'Pembayaran Sudah Dilakukan Sebelumnya', 'info', {
                buttons: false,
                timer: 1200,
            });
        }
    });
</script>
<?= $this->endSection() ?>