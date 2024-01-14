<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KOMAHA - Detail Laundry</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>/assets1/img/favicon.png" rel="icon">
  <link href="<?= base_url(); ?>/assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>/assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets1/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>/assets1/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">admin@komaha.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 823 2222 3333</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="." class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="<?= base_url(); ?>/assets1/img/logo.png" alt=""> -->
        <h1>KOMAHA</h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?= base_url() ?>/#hero">Beranda</a></li>
          <li><a href="<?= base_url() ?>/#services">Layanan</a></li>
          <li><a href="<?= base_url() ?>/#portfolio">Rekomendasi Kost</a></li>
          <li><a href="<?= base_url() ?>/#about">Tentang Kami</a></li>
          <li><a href="<?= base_url() ?>/#contact">Hubungi Kami</a></li>
          <li><a href="<?= route_to(session('IS_LOGIN') == 1 ? 'dashboard-user' : 'auth-user-view') ?>"><?= session('IS_LOGIN') == 1 ? 'Halaman Dashboard' : 'Masuk' ?></a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2><?= $data['NAMA_PAKET'] ?></h2>
              <!-- <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> -->
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Detail Laundry</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="<?= base_url(); ?>/assets/foto/laundry_image.jpg " alt="">
              </div>

            </div>
            <!-- <div class="swiper-pagination"></div> -->
          </div>
          <!-- <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div> -->

        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8">
            <div class="portfolio-description">
              <h2>Keterangan</h2>

              <ul>
                <?php
                $ARR_FASILITAS = explode('|', $data['DESKRIPSI']);
                foreach ($ARR_FASILITAS as $val) :
                ?>
                  <li>
                    <h5><i class="bi bi-check-circle-fill"></i> <?= $val ?></h5>
                  </li>
                <?php
                endforeach;
                ?>
              </ul>

            </div>
          </div>

          <div class="col-lg-3">
            <div class="portfolio-info">
              <h3>Ringkasan Informasi</h3>
              <ul>
                <li><strong>Harga</strong> <span><?= "Rp " . number_format($data['HARGA'], 2, ',', '.') ?></span></li>
                <li><strong>Minimal berat</strong> <span>1 Kg</span></li>
                <li><a href="<?= route_to('cek-tr-laundry', $data['ID_LAUNDRY']) ?>" class="btn-visit align-self-start">Pesan Sekarang!</a></li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>komaha</span>
          </a>
          <p>Mau cari dan sewa kos murah di kota Malang?, Yuk mari temukan kos anda disini.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#hero">Beranda</a></li>
            <li><a href="#services">Layanan</a></li>
            <li><a href="#portfolio">Rekomendasi Kost</a></li>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#contact">Hubungi Kami</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Pemesanan Kos</a></li>
            <li><a href="#">Catering</a></li>
            <li><a href="#">Cleaning Service</a></li>
            <li><a href="#">Laundry</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Kontak Kami</h4>
          <p>
            Jl. Tidar, No. 23<br>
            Kecamatan Sukun<br>
            Kota Malang<br><br>
            <strong>Telepon:</strong> +62 823 2222 3333<br>
            <strong>Email:</strong> admin@komaha.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Komaha</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>/assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/assets1/vendor/aos/aos.js"></script>
  <script src="<?= base_url(); ?>/assets1/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url(); ?>/assets1/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url(); ?>/assets1/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url(); ?>/assets1/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url(); ?>/assets1/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/assets1/js/main.js"></script>

</body>

</html>