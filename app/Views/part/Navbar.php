<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <?php
        $URI = explode('/', current_url(true));
        $SEGMENT = $URI[3];
        ?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= base_url(); ?>/assets/img/avatar/avatar-2.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Halo, <?= session(hash_equals($SEGMENT, 'user') ? 'NAMA_LENGKAP' : 'NAMA_LENGKAP_ADMIN') ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Menu</div>

                <?php if (hash_equals($SEGMENT, 'user')) : ?>
                    <a href="<?= route_to('index') ?>" class="dropdown-item has-icon">
                        <i class="fas fa-home"></i> Halaman Utama
                    </a>
                <?php endif; ?>
                <div class="dropdown-divider"></div>
                <a href="<?= route_to(hash_equals($SEGMENT, 'user') ?  'logout-user' : 'logout-admin') ?>" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>