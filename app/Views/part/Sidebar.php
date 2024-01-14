<div class="main-sidebar sidebar-style-2">
    <?php
    $URI = explode('/', current_url(true));
    $SEGMENT = $URI[3];
    ?>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"><?= hash_equals($SEGMENT, 'user') ? 'KOMAHA' : 'ADMIN KOMAHA' ?></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><?= hash_equals($SEGMENT, 'user') ? 'KM' : 'AK' ?></a>
        </div>
        <ul class="sidebar-menu">
            <!-- ==== -->
            <li class="menu-header">Dashboard</li>

            <?php if (hash_equals($SEGMENT, 'user')) : ?>
                <li id="dashboard-user">
                    <a class="nav-link" href="<?= route_to('dashboard-user') ?>">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (hash_equals($SEGMENT, 'admin')) : ?>
                <li id="dashboard-admin">
                    <a class="nav-link" href="<?= route_to('dashboard-admin') ?>">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- ==== -->
            <li class="menu-header">Master Data</li>

            <?php if (hash_equals($SEGMENT, 'user')) : ?>
                <li id="ubah-user-profile">
                    <a class="nav-link" href="<?= route_to('users-edit-profile', session('ID_USER')) ?>">
                        <i class="fas fa-user-friends"></i>
                        <span>Ubah Data Pengguna</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (hash_equals($SEGMENT, 'admin')) : ?>
                <li id="kelola-user-admin">
                    <a class="nav-link" href="<?= route_to('users-admin') ?>">
                        <i class="fas fa-user-friends"></i>
                        <span>Kelola Pengguna</span>
                    </a>
                </li>
                <li id="kelola-kost-admin">
                    <a class="nav-link" href="<?= route_to('kost-admin') ?>">
                        <i class="fas fa-home"></i>
                        <span>Kelola Kost</span>
                    </a>
                </li>
                <li id="kelola-catering-admin">
                    <a class="nav-link" href="<?= route_to('catering-admin') ?>">
                        <i class="fas fa-utensils"></i>
                        <span>Kelola Catering</span>
                    </a>
                </li>
                <li id="kelola-cleaning-admin">
                    <a class="nav-link" href="<?= route_to('cs-admin') ?>">
                        <i class="fas fa-broom"></i>
                        <span>Kelola Cleaning Service</span>
                    </a>
                </li>
                <li id="kelola-laundry-admin">
                    <a class="nav-link" href="<?= route_to('laundry-admin') ?>">
                        <i class="fa fa-tint"></i>
                        <span>Kelola Laundry</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- ==== -->
            <li class="menu-header">Transaksi</li>

            <?php if (hash_equals($SEGMENT, 'user')) : ?>
                <li id="transaksi-kost-user">
                    <a class="nav-link" href="<?= route_to('tr-kost-user') ?>">
                        <i class="fas fa-home"></i>
                        <span>Transaksi Kost</span>
                    </a>
                </li>
                <li id="transaksi-catering-user">
                    <a class="nav-link" href="<?= route_to('tr-catering-user') ?>">
                        <i class="fas fa-utensils"></i>
                        <span>Transaksi Catering</span>
                    </a>
                </li>
                <li id="transaksi-cs-user">
                    <a class="nav-link" href="<?= route_to('tr-cs-user') ?>">
                        <i class="fas fa-broom"></i>
                        <span>Transaksi CS</span>
                    </a>
                </li>
                <li id="transaksi-laundry-user">
                    <a class="nav-link" href="<?= route_to('tr-laundry-user') ?>">
                        <i class="fa fa-tint"></i>
                        <span>Transaksi Laundry</span>
                    </a>
                </li>

            <?php endif; ?>

            <?php if (hash_equals($SEGMENT, 'admin')) : ?>
                <li id="transaksi-kost-admin">
                    <a class="nav-link" href="<?= route_to('tr-kost-admin') ?>">
                        <i class="fas fa-money-check-alt"></i>
                        <span>Transaksi Kost</span>
                    </a>
                </li>
                <li id="transaksi-catering-admin">
                    <a class="nav-link" href="<?= route_to('tr-catering-admin') ?>">
                        <i class="fas fa-credit-card"></i>
                        <span>Transaksi Catering</span>
                    </a>
                </li>
                <li id="transaksi-cs-admin">
                    <a class="nav-link" href="<?= route_to('tr-cs-admin') ?>">
                        <i class="fas fa-money-bill-alt"></i>
                        <span>Transaksi CS</span>
                    </a>
                </li>
                <li id="transaksi-laundry-admin">
                    <a class="nav-link" href="<?= route_to('tr-laundry-admin') ?>">
                        <i class="fa fa-id-card"></i>
                        <span>Transaksi Laundry</span>
                    </a>
                </li>
            <?php endif; ?>







        </ul>

    </aside>

</div>