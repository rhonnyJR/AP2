<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>

<!-- SUMMARY SEGMENT -->
<div class="row">
    <!-- PRODUK COUNT -->
    <div class="col-lg col-md col-sm col-12">
        <div class="card card-statistic-1 card-primary">
            <div class="card-icon bg-primary">
                <i class="fas fa-coins"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Transaksi</h4>
                </div>
                <div class="card-body">
                    <?= $countTrKost + $countTrCS + $countTrCatering + $countTrLaundry ?>
                </div>
            </div>
        </div>
    </div>
    <!-- TRANSAKSI COUNT -->
    <div class="col-lg col-md col-sm col-12">
        <div class="card card-statistic-1 card-info">
            <div class="card-icon bg-info">
                <i class="fas fa-home"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pemesanan Kost</h4>
                </div>
                <div class="card-body">
                    <?= $countTrKost ?>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUK COUNT -->
    <div class="col-lg col-md col-sm col-12">
        <div class="card card-statistic-1 card-warning">
            <div class="card-icon bg-warning">
                <i class="fas fa-recycle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pemesanan Cleaning Service</h4>
                </div>
                <div class="card-body">
                    <?= $countTrCS ?>
                </div>
            </div>
        </div>
    </div>
    <!-- TRANSAKSI COUNT -->
    <div class="col-lg col-md col-sm col-12">
        <div class="card card-statistic-1 card-danger">
            <div class="card-icon bg-danger">
                <i class="fas fa-utensils"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pemesanan Catering</h4>
                </div>
                <div class="card-body">
                    <?= $countTrCatering ?>
                </div>
            </div>
        </div>
    </div>
    <!-- TRANSAKSI COUNT -->
    <div class="col-lg col-md col-sm col-12">
        <div class="card card-statistic-1 card-success">
            <div class="card-icon bg-success">
                <i class="fas fa-tint"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pemesanan Laundry</h4>
                </div>
                <div class="card-body">
                    <?= $countTrLaundry ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Calendar</h4>
            </div>
            <div class="card-body">
                <div class="fc-overflow">
                    <div id="myEvent"></div>
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
</script>
<?= $this->endSection() ?>