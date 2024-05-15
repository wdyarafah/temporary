<?php
// Start session
session_start();

// Handle logout
if (isset($_GET["logout"]) && $_GET["logout"] == "true") {
    // Destroy the session
    session_destroy();
    // Redirect back to the index page after logout
    header("location: index.php");
    exit;
}

// Include database connection
include "koneksi.php";

// Process input data
if (isset($_POST['Input'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert into table
    $query = "INSERT INTO inbox (name, email, subject, message)
              VALUES ('$name', '$email', '$subject', '$message')";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        echo "<script language=\"javascript\">
              alert(\"Laporan kamu berhasil terkirim!!\");
              document.location=\"index.php\";
              </script>";
    } else {
        echo "<script language=\"javascript\">
              alert(\"Laporan kamu gagal terkirim!!\");
              document.location=\"index.php\";
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TEMPORARY</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="assets/img/Logo.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- <a href="index.html" class="logo"><img src="assets/img/Logo.png" alt="" class="img-fluid"></a> -->
      <h1 class="logo"><a href="index.html"><img src="assets/img/Logo.png" alt="" class="img-fluid">TEMPORARY</a></h1>

      <nav id="navbar" class="navbar">
      <ul>
          <li><a class="nav-link" href="#">Home</a></li>
          <li><a class="nav-link" href="#definisi">Definisi</a></li>
          <li><a class="nav-link" href="#jenis">Jenis</a></li>
          <li><a class="nav-link" href="#bentuk">Bentuk</a></li>
          <li><a class="nav-link" href="#dampak">Dampak</a></li>
          <li><a class="nav-link" href="#contact">Kontak Kami</a></li>
          <!-- Display login button -->
          <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
            <li><a class="login scrollto" href="index.php?logout=true">Logout</a></li>
          <?php else: ?>
            <li><a class="login scrollto" href="login.php">Login</a></li>
          <?php endif; ?>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <img src="assets/img/hero-bg.png" alt="" data-aos="fade-in">
        <div class="container">
          <h2 data-aos="fade-up" data-aos-delay="100" class="">Mempelajari Kekerasan Seksual<br>dan Dampak Kekerasan Seksual</h2>
          <p data-aos="fade-up" data-aos-delay="200">Segera lapor bila melihat dan mendapat kekerasan seksual!</p>
          <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
            <a href="quiz.html" class="btn-kuesioner">Kuesioner</a>
          </div>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- Definisi Section -->
    <section id="definisi" class="definisi section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/asset-about.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>Apa itu Kekerasan Seksual?</h3>
            <p>
              Kekerasan Seksual adalah setiap perbuatan merendahkan, menghina, melecehkan, dan/atau menyerang tubuh, 
              dan/atau fungsi reproduksi seseorang, karena ketimpangan relasi kuasa dan/atau gender, yang berakibat atau 
              dapat berakibat penderitaan psikis dan/atau fisik termasuk yang mengganggu kesehatan reproduksi seseorang 
              dan hilang kesempatan melaksanakan pendidikan dengan aman dan optimal.
            </p>
            <h4>Apa itu “ketimpangan relasi kuasa dan/atau gender”?</h3>
            <p>
              Menurut Komnas Perempuan (2017), “ketimpangan relasi kuasa dan/atau gender” adalah sebuah keadaan terlapor 
              menyalahgunakan sumber daya pengetahuan, ekonomi dan/ atau penerimaan masyarakat atau status sosialnya untuk mengendalikan korban.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- /Definisi Section -->

    <!-- ======= Jenis Section ======= -->
    <section id="jenis" class="jenis jenis">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Jenis-Jenis Kekerasan Seksual</h2>
          <p>Jenis-jenis serta penjelasan tentang kekerasan seksual yang sering terjadi di lingkungan sekitar :</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon"><img src="assets/img/icon-verbal.png"></div>
            <h4 class="title">Verbal</h4>
            <p class="description">Kekerasan seksual verbal terjadi ketika seseorang menggunakan kata-kata atau bahasa yang menghina, percakapan yang tidak diinginkan, atau ancaman yang bersifat seksual.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon"><img src="assets/img/icon-non-verbal.png"></div>
            <h4 class="title">Non Verbal</h4>
            <p class="description">Kekerasan Seksual Non Verbal merupakan tindakan menyakiti atau mengendalikan korban secara seksual tanpa kata-kata, melalui ekspresi wajah, gerakan tubuh, atau tindakan fisik seksual.</p>
          </div>
          <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon"><img src="assets/img/icon-daring.png"></div>
            <h4 class="title">Daring</h4>
            <p class="description">Kekerasan seksual online terjadi melalui media atau platform online.berbagai tindakan yang menggunakan teknologi informasi dan komunikasi untuk melecehkan, mengintimidasi, dan, termasuk eksploitasi seksual.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- End Jenis Section -->

    <!-- ======= Bentuk Section ======= -->
    <section id="bentuk" class="bentuk">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Contoh Bentuk Kekerasan Seksual</h2>
          <p>Kata kunci yang menjadi indikator suatu kekerasan adalah paksaan. Kegiatan apa pun yang mengandung paksaan adalah kekerasan.
            <br> Selain pemerkosaan, perbuatan-perbuatan di bawah ini termasuk kekerasan seksual :
          </p>
        </div>
    
        <div class="row bentuk-container" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-4 col-md-6 bentuk-item">
            <div class="bentuk-wrap">
              <img src="assets/img/contoh/menatap.png" class="img-fluid" alt="">
              <div class="bentuk-info">
                <p>Menatap korban dengan nuansa seksual.</p>
              </div>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 bentuk-item">
            <div class="bentuk-wrap">
              <img src="assets/img/contoh/transaksi.png" class="img-fluid" alt="">
              <div class="bentuk-info">
                <p>Memaksa korban untuk melakukan transaksi atau kegiatan seksual.</p>
              </div>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 bentuk-item">
            <div class="bentuk-wrap">
              <img src="assets/img/contoh/catcalling.png" class="img-fluid" alt="">
              <div class="bentuk-info">
                <p>Menyampaikan rayuan, lelucon, atau siulan yang bernuansa seksual pada korban.</p>
              </div>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 bentuk-item">
            <div class="bentuk-wrap">
              <img src="assets/img/contoh/memaksa.png" class="img-fluid" alt="">
              <div class="bentuk-info">
                <p>Memaksakan orang untuk melakukan aktivitas seksual atau melakukan percobaan pemerkosaan.</p>
              </div>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 bentuk-item">
            <div class="bentuk-wrap">
              <img src="assets/img/contoh/Membuka_pakaian_tanpa_izin.png" class="img-fluid" alt="">
              <div class="bentuk-info">
                <p>Memperlihatkan alat kelamin dengan sengaja tanpa persetujuan.</p>
              </div>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 bentuk-item">
            <div class="bentuk-wrap">
              <img src="assets/img/contoh/mengintip.jpg" class="img-fluid" alt="">
              <div class="bentuk-info">
                <p>Mengintip atau dengan sengaja melihat korban yang sedang melakukan aktivitas pribadi atau pada ruang yang bersifat pribadi.</p>
              </div>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 bentuk-item">
            <div class="bentuk-wrap">
              <img src="assets/img/contoh/sanksi_paksaan.png" class="img-fluid" alt="">
              <div class="bentuk-info">
                <p>Memberi hukuman atau sanksi yang bernuansa seksual.</p>
              </div>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 bentuk-item">
            <div class="bentuk-wrap">
              <img src="assets/img/contoh/menyentuh.png" class="img-fluid" alt="">
              <div class="bentuk-info">
                <p>Menyentuh, mengusap, meraba, memegang, memeluk, mencium atau menggosokkan bagian tubuh pada tubuh korban tanpa persetujuan.</p>
              </div>
            </div>
          </div>
    
          <div class="col-lg-4 col-md-6 bentuk-item">
            <div class="bentuk-wrap">
              <img src="assets/img/contoh/kirim-pesan.png" class="img-fluid" alt="">
              <div class="bentuk-info">
                <p>Mengirimkan pesan dan konten bernuansa seksual kepada korban tanpa persetujuan.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 bentuk-item">
            <div class="bentuk-wrap">
              <img src="assets/img/contoh/Pelecehan.jpg" class="img-fluid" alt="">
              <div class="bentuk-info">
                <p>Melakukan perkosaan termasuk penetrasi dengan benda atau bagian tubuh selain alat kelamin.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Bentuk Section -->

    <!-- ======= Dampak Section ======= -->
    <section id="dampak" class="dampak">
      <div class="container">

        <div class="section-title">
          <h2>Dampak Kekerasan Seksual</h2>
          <p>Ada beberapa konsep dasar yang perlu kita pelajari supaya dapat lebih memahami mengapa kasus kekerasan seksual lebih sulit diproses dibandingkan jenis kekerasan lainnya. Berikut ini beberapa konsep khas yang ada dalam kekerasan seksual.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-2">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Tonic Immobility</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Victim Blaming</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">False Accusation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Pembebanan Pembuktian</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-10">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Kelumpuhan Sementara atau <i>Tonic Immobility</i></h3>
                    <p><i> Tonic Immobility</i> adalah <span>keadaan lumpuh sementara yang tak disengaja, dimana seorang individu tidak 
                      dapat bergerak, atau dalam banyak kasus, bahkan tak dapat mengeluarkan suara (Mölle, 2017).</span> Menurut 
                      sebuah studi yang dilakukan terhadap 300 perempuan yang mengunjungi klinik penanganan korban perkosaan, 
                    <span>“7 dari 10 orang korban kekerasan seksual mengalami tonic immobility yang signifikan” (Miller, 2017).</span>
                      <br><br>
                      Korban kekerasan seksual seringkali dipersalahkan karena tidak melawan, berteriak atau lari saat 
                      mengalami kekerasan, padahal saat itu mereka masih mengalami tonic immobility. Konsep ini penting untuk 
                      kita pahami, supaya kita tidak dengan mudah menganggap bahwa kekerasan seksual yang terjadi pada korban 
                      adalah aktivitas seksual “suka sama suka” karena menganggap korban tidak melawan, berteriak, berlari 
                      ataupun melaporkan saat kejadian. <span>Diamnya korban tidak berarti setuju ataupun suka sama suka.</span>
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/Tonic-Immobility.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Menyalahkan Korban atau <i>Victim Blaming</i></h3>
                    <p>
                      Tindakan menyalahkan korban adalah <span>sikap yang menunjukkan bahwa korbanlah yang bertanggung jawab atas kekerasan seksual 
                      yang dialaminya, bukan pelaku.</span> Menyalahkan korban terjadi ketika korban diasumsikan melakukan sesuatu untuk memprovokasi 
                      atau menyebabkan kekerasan seksual melalui tindakan, kata-kata, atau pakaiannya. Salah satu penyebab minimnya pelaporan 
                      korban kekerasan seksual atas kejadian yang dialaminya adalah victim blaming yang dilakukan oleh bermacam pihak, baik itu 
                      dari aparat penegak hukum, lingkungan tempat kerja maupun pendidikan, atau bahkan anggota keluarga korban sendiri. 
                      <br><br>
                      Biasanya, bentuk victim blaming yang dilakukan terhadap korban kekerasan seksual di Indonesia berkisar pada <span>cara 
                      berpakaian korban yang dianggap “mengundang”</span>, <span>kata-kata dan perilaku korban yang dianggap “provokatif”</span>, dan <span>respons 
                      korban yang tidak melawan pelaku</span>. Oleh karena itu, bila konsep <i>tonic immobility</i> tadi tidak dipahami, dampaknya akan 
                      terjadi pada dua tingkat. <br><br>
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/Victim-Blaming.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <p>
                  <span>Internal</span> : Menyalahkan diri sendiri atau <i>self-blaming</i> yang dilakukan oleh korban terhadap dirinya sendiri. <br>
                  <span>Eksternal</span> : Pihak lain menyalahkan korban atau <i>victim blaming</i> yang dilakukan oleh orang lain terhadap korban.
                </p>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Tuduhan Palsu atau <i>False Accusation</i></h3>
                    <p>
                      Hal lain yang juga membuat <span>banyak korban kekerasan seksual enggan melaporkan kasusnya adalah pandangan 
                      bahwa mereka melakukan tuduhan palsu.</span> Tidak hanya itu, banyak korban kekerasan (seksual) yang kemudian 
                      malah dilaporkan balik dengan pasal pencemaran nama baik, karena dianggap tidak memiliki bukti yang 
                      cukup kuat.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/False-Accusation.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Pembebanan Pembuktian</h3>
                    <p>
                      Tantangan yang dihadapi korban dan pendamping korban kekerasan seksual juga ditambah lagi dengan 
                      <span>pembebanan pembuktian yang seolah menjadi “tanggung jawab” pihak korban untuk membuktikan keabsahan 
                      kasus yang dilaporkannya.</span> Tidak jarang, saat melaporkan ke pihak berwenang, pihak korban yang dituntut 
                      untuk mencari identitas dan data lengkap pelaku hingga memberikan rujukan pasal dalam aturan hukum yang
                      bisa digunakan oleh aparat untuk memproses kasusnya lebih lanjut.
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/Pembebanan-Pembuktian.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Dampak Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Hubungi Kami</h2>
          <p>Jangan takut untuk melaporkan segala bentuk kekerasan seksual yang terjadi disekitarmu! Setiap laporan 
            merupakan langkah penting menuju perlindungan bagi korban serta mencegah terjadinya kekerasan yang sama 
            pada orang lain. Mari bersama kita memutus siklus kekerasan dan menciptakan lingkungan yang lebih aman bagi semua orang!</p>
        </div>

      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-6">

            <div class="row">
            <img src="assets/img/contact.png" alt="">
            </div>

          </div>

          <div class="col-lg-6">
            <form action="#" method="POST" role="form" class="contact-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required="">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="7" placeholder="Message" required=""></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" name="Input">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>
    <!-- End Contact Section -->

  </main>

  <footer>
    <div class="footer-main">
    <p>© All Right Reserved 2024 | <b>TEMPORARY</b></p>
    </div>
  </footer>



  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<script>
  // Ambil semua elemen dengan kelas "nav-link"
  var navLinks = document.querySelectorAll('.nav-link');

  // Loop melalui setiap tautan
  navLinks.forEach(function(navLink) {
    // Tambahkan event listener untuk menangani klik pada setiap tautan
    navLink.addEventListener('click', function(event) {
      // Hapus kelas "active" dari semua tautan
      navLinks.forEach(function(link) {
        link.classList.remove('active');
      });

      // Tambahkan kelas "active" ke tautan yang diklik
      this.classList.add('active');
    });
  });
</script>