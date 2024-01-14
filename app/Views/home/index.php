<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KOMAHA - Index</title>
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
          <li><a href="#hero">Beranda</a></li>
          <li><a href="#services">Layanan</a></li>
          <li><a href="#portfolio">Rekomendasi Kost</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#contact">Hubungi Kami</a></li>
          <li><a href="<?= route_to(session('IS_LOGIN') == 1 ? 'dashboard-user' : 'auth-user-view') ?>"><?= session('IS_LOGIN') == 1 ? 'Halaman Dashboard' : 'Masuk' ?></a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Selamat Datang Di <span>KOMAHA</span></h2>
          <p>Mau cari dan sewa kos murah di kota Malang?, Yuk mari temukan kos anda disini.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#services" class="btn-get-started">Yuk Mulai</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="<?= base_url(); ?>/assets1/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-cursor-fill"></i></div>
              <h4 class="title"><a href="#" class="stretched-link">Lokasi Strategis</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt-fill"></i></div>
              <h4 class="title"><a href="#" class="stretched-link">Dekat Dengan Kampus</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-currency-exchange"></i></div>
              <h4 class="title"><a href="#" class="stretched-link">Harga Murah</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-house-check-fill"></i></div>
              <h4 class="title"><a href="#" class="stretched-link">Tempat Nyaman</a></h4>
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= Our Services Section ======= -->
    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Layanan Kami</h2>
          <p>Kami menawarkan beberapa layanan kepada anda sebagai penyewa maupun pencari kos.</p>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-3 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-house-fill"></i>
              </div>
              <h3 class="service-01">Pemesanan Kos</h3>
              <p>Kami menawarkan jasa sewa kos di Kota Malang dengan harga yang terjangkau bagi kantong mahasiswa.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-cup-hot-fill"></i>
              </div>
              <h3 class="service-02">Catering</h3>
              <p>Selain pemesanan kos, kami juga menawarkan pemesanan catering untuk memenuhi hidangan acara anda.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-snow2"></i>
              </div>
              <h3 class="service-03">Cleaning Service</h3>
              <p>Kami siap kapan saja dan dimana saja dibutuhkan untuk mengurus kebersihan pada rumah anda.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-3 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-droplet-half"></i>
              </div>
              <h3 class="service-04">Laundry</h3>
              <p>Kami menawarkan jasa laundry dengan harga yang terjangkau.</p>
            </div>
          </div><!-- End Service Item -->

          

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Rekomendasi Kos</h2>
          <p>Berikut adalah rekomendasi kos di Kota Malang yang wajib anda sewa</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">

          <div>
            <ul class="portfolio-flters">
              <li data-filter="*" class="filter-active">Semua</li>
              <li data-filter=".KLOJEN">Area Klojen</li>
              <li data-filter=".LOWOKWARU">Area Lowokwaru</li>
              <li data-filter=".BLIMBING">Area Blimbing</li>
              <li data-filter=".SUKUN">Area Sukun</li>
            </ul><!-- End Portfolio Filters -->
          </div>

          <div class="row gy-4 portfolio-container">

            <?php
            foreach ($data as $val) :
              $ARR_FASILITAS = explode('|', $val['FASILITAS']);
            ?>
              <div class="col-xl-4 col-md-6 portfolio-item <?= $val['AREA'] ?>">
                <div class="portfolio-wrap">
                  <a href="<?= base_url(); ?>/assets/foto/<?= $val['GAMBAR'] ?>" data-gallery="portfolio-gallery-app" class="glightbox"><img src="<?= base_url(); ?>/assets/foto/<?= $val['GAMBAR'] ?>" class="img-fluid" alt=""></a>
                  <div class="portfolio-info">
                    <h4><a href="<?= route_to('detail-kost', $val['ID_KOST']) ?>" title="More Details"><?= $val['NAMA_KOST'] ?></a></h4>
                    <p>
                      <i class="bi bi-geo-alt flex-shrink-0"></i>&nbsp; <?= $ARR_FASILITAS[0] ?><br>
                      <i class="bi bi-coin flex-shrink-0"></i><span>&nbsp; <?= "Rp " . number_format($val['HARGA'], 2, ',', '.') ?> / <?= ucfirst(strtolower($val['PERIODE'])) ?></span>
                    </p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->

            <?php
            endforeach;
            ?>

          </div><!-- End Portfolio Container -->

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Tentang Kami</h2>
          <p>Berikut adalah informasi tentang kami</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>Aplikasi pemesanan kos nomor 1 di Kota Malang</h3>
            <img src="<?= base_url(); ?>/assets1/img/blog/blog-recent-4.jpg" class="img-fluid rounded-4 mb-4" alt="">
            <!-- <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur fugiat voluptas ea.</p>
            <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut omnis beatae neque deleniti repellendus.</p> -->
            <p>Pamikos memanfaatkan teknologi dengan mengelola dan menyajikan daftar kos dengan penjelasan fasilitas secara terperinci dan dilengkapi dengan foto serta detail dari setiap kos.</p>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <!-- <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
              </ul> -->
              <p>
                Saat ini kami memiliki lebih dari 1 juta kamar kos yang tersebar di seluruh Kota Malang. Pamikos berusaha untuk bisa terus menyajikan data ketersediaan kamar yang akurat, agar calon penghuni mendapatkan kemudahan dalam pencarian kos.
              </p>

              <div class="position-relative mt-4">
                <img src="<?= base_url(); ?>/assets1/img/about-2.jpg" class="img-fluid rounded-4 mb-4" alt="">
              </div>
              <p>
                Kami memiliki tim yang solid, siap melayani anda dari manapun dan kapanpun.
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 align-items-center">

          <div class="col-lg-6">
            <img src="<?= base_url(); ?>/assets1/img/stats-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-lg-6">

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Mahasiswa</strong> merasa terbantu berkat adanya aplikasi komaha</p>
            </div><!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="124" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Pendatang</strong> dimudahkan dalam menyewa kos yang dibutuhkan</p>
            </div><!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="453" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Penyewa</strong> senang dengan adanya aplikasi komaha</p>
            </div><!-- End Stats Item -->

          </div>

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Hubungi Kami</h2>
          <p>Isikan data pada form dibawah ini untuk menghubungi tim kami terkait kendala yang anda dapatkan.</p>
        </div>

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Kantor:</h4>
                  <p>Jl. Tidar, No. 23, Sukun, Kota Malang</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>admin@komaha.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Telepon:</h4>
                  <p>+62 823 2222 3333</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h4>Jam Buka:</h4>
                  <p>Sen-Sab: 08.00 - 16-00</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Isi Pesan" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
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
  <script src="<?= base_url(); ?>/assets1/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url(); ?>/assets/modules/jquery.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/assets1/js/main.js"></script>
  <script>
    $(document).on("click", ".service-01", function(e) {
      window.location.href = "<?= base_url() . route_to('daftar-kost') ?>";
    });
    
    $(document).on("click", ".service-02", function(e) {
      window.location.href = "<?= base_url() . route_to('daftar-catering') ?>";
    });
    
    $(document).on("click", ".service-03", function(e) {
      window.location.href = "<?= base_url() . route_to('daftar-cs') ?>";
    });
    
    $(document).on("click", ".service-04", function(e) {
      window.location.href = "<?= base_url() . route_to('daftar-laundry') ?>";
    });
  </script>

</body>

</html>