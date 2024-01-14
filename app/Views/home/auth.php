<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KOMAHA - Login Page</title>
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
          <li><a href=".">Kembali ke halaman utama</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>LOGIN</h2>
          <p>Masuk untuk dapat menikmati fasilititas kami.</p>
        </div>

        <div class="row d-flex justify-content-center gx-lg-0 gy-4">

          <div class="col-lg-5">
            <form action="<?= route_to('auth-user') ?>" method="post" role="form" class="php-email-form">
              <?php if (session()->getFlashData('pesan')) : ?>
                <div class="alert alert-<?= session()->getFlashData('status') ?>" role="alert">
                  <?= session()->getFlashData('pesan'); ?>
                </div>
              <?php endif; ?>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="USERNAME" placeholder="Username" onkeyup="this.value = this.value.toUpperCase()" required>
              </div>
              <div class="form-group mt-2">
                <input type="password" class="form-control" name="PASSWORD" placeholder="Password" required>
              </div>
              <div class="form-group mt-4 text-center">
                Belum punya akun? <a href="<?= route_to('regist-view') ?>">Daftar</a>
              </div>
              <div class="text-center mt-4"><button type="submit">MASUK</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

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
  <script src="<?= base_url(); ?>/assets1/js/jquery.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/assets1/js/main.js"></script>

  <script>

  </script>

</body>

</html>