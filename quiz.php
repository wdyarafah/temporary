<?php
session_start();

// Lakukan koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "temporary");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Periksa apakah pengguna telah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script language=\"javascript\">
          alert(\"Anda harus login terlebih dahulu\");
          document.location=\"login.php\";
          </script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        $answers = [];

        // Lakukan pengecekan untuk setiap pertanyaan
        $all_questions_answered = true;
        for ($i = 1; $i <= 15; $i++) {
            if (isset($_POST["q$i"])) {
                $answers["q$i"] = $_POST["q$i"];
            } else {
                $all_questions_answered = false;
                break; // Keluar dari loop segera jika ada pertanyaan yang tidak dijawab
            }
        }

        if ($all_questions_answered) {
            $query = "INSERT INTO jawaban_kuesioner (user_id, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15) VALUES ('$user_id', '";
            $query .= implode("', '", $answers);
            $query .= "')";

            if (mysqli_query($koneksi, $query)) {
                echo "<script language=\"javascript\">
                alert(\"Jawaban kamu sudah terkirim! Terima kasih ya sudah meluangkan waktunya!\");
                document.location=\"index.php\";
                </script>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
            }
        } else {
            // Tampilkan notifikasi jika ada pertanyaan yang tidak dijawab
            echo "<script language=\"javascript\">
            alert(\"Harap isi semua soal\");
            </script>";
        }
    } else {
        echo "<script language=\"javascript\">
        alert(\"Untuk mengisi kuesioner ini, jangan lupa untuk login dulu ya!\");
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="assets/css/quiz.css" />
    <title>Kuesioner | Kekerasan Seksual dan Dampaknya</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/Logo.png" rel="icon">
    <link rel="icon" href="assets/img/Logo.png">
  </head>
  <body>
    <header class="header">
      <div class="header-content">
        <div class="back-icon">
          <a href="index.php"><img src="assets/img/back.png" alt="Back" /></a>
        </div>
        <div class="title">
          <h1>Kuesioner</h1>
          <p>Jawablah pertanyaan di bawah ini sesuai dengan preferensi visual kamu!
            <br> Tolong diisi semua pertanyaan nya, ya!
          </p>
        </div>
      </div>
    </header>
    <div class="container">
      <form id="quiz-form" method="post">
      <input type="hidden" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
        <div class="question">
          <div class="statement">
            Penggunaan gambar pada website ini memudahkan saya dalam memahami isu kekerasan seksual dengan lebih baik.
          </div>
          <div class="options">
            <input type="radio" name="q1" id="q1-sangat-setuju" value="sangat-setuju"/>
            <label for="q1-sangat-setuju">
              <img src="assets/img/sangat-setuju.png" alt="Sangat Setuju" class="emoji"/>
              <span>Sangat Setuju</span>
            </label>
            <input type="radio" name="q1" id="q1-setuju" value="setuju"/>
            <label for="q1-setuju">
              <img src="assets/img/setuju.png" alt="Setuju" class="emoji"/>
              <span>Setuju</span>
            </label>
            <input type="radio" name="q1" id="q1-kurang-setuju" value="kurang-setuju"/>
            <label for="q1-kurang-setuju">
              <img src="assets/img/kurang-setuju.png" alt="Kurang Setuju" class="emoji"/>
              <span>Kurang Setuju</span>
            </label>
            <input type="radio" name="q1" id="q1-tidak-setuju" value="tidak-setuju"/>
            <label for="q1-tidak-setuju">
              <img src="assets/img/tidak-setuju.png" alt="Tidak Setuju" class="emoji"/>
              <span>Tidak Setuju</span>
            </label>
          </div>
        </div>
        
        <div class="question">
          <div class="statement">
            Pemilihan gambar yang ada pada website ini mempermudah pemahaman materi tentang kekerasan seksual.
          </div>
          <div class="options">
            <input type="radio" name="q2" id="q2-sangat-setuju" value="sangat-setuju"/>
            <label for="q2-sangat-setuju">
              <img src="assets/img/sangat-setuju.png" alt="Sangat Setuju" class="emoji"/>
              <span>Sangat Setuju</span>
            </label>
            <input type="radio" name="q2" id="q2-setuju" value="setuju"/>
            <label for="q2-setuju">
              <img src="assets/img/setuju.png" alt="Setuju" class="emoji"/>
              <span>Setuju</span>
            </label>
            <input type="radio" name="q2" id="q2-kurang-setuju" value="kurang-setuju"/>
            <label for="q2-kurang-setuju">
              <img src="assets/img/kurang-setuju.png" alt="Kurang Setuju" class="emoji"/>
              <span>Kurang Setuju</span>
            </label>
            <input type="radio" name="q2" id="q2-tidak-setuju" value="tidak-setuju"/>
            <label for="q2-tidak-setuju">
              <img src="assets/img/tidak-setuju.png" alt="Tidak Setuju" class="emoji"/>
              <span>Tidak Setuju</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Karena adanya visualisasi gambar mempermudah saya dalam memahami pesan yang disampaikan tentang kekerasan seksual.
          </div>
          <div class="options">
            <input type="radio" name="q3" id="q3-sangat-setuju" value="sangat-setuju"/>
            <label for="q3-sangat-setuju">
              <img src="assets/img/sangat-setuju.png" alt="Sangat Setuju" class="emoji"/>
              <span>Sangat Setuju</span>
            </label>
            <input type="radio" name="q3" id="q3-setuju" value="setuju"/>
            <label for="q3-setuju">
              <img src="assets/img/setuju.png" alt="Setuju" class="emoji"/>
              <span>Setuju</span>
            </label>
            <input type="radio" name="q3" id="q3-kurang-setuju" value="kurang-setuju"/>
            <label for="q3-kurang-setuju">
              <img src="assets/img/kurang-setuju.png" alt="Kurang Setuju" class="emoji"/>
              <span>Kurang Setuju</span>
            </label>
            <input type="radio" name="q3" id="q3-tidak-setuju" value="tidak-setuju"/>
            <label for="q3-tidak-setuju">
              <img src="assets/img/tidak-setuju.png" alt="Tidak Setuju" class="emoji"/>
              <span>Tidak Setuju</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Visualisasi gambar yang digunakan sangat membantu mempermudah penyampaian konteks terkait bentuk kekerasan seksual.
          </div>
          <div class="options">
            <input type="radio" name="q4" id="q4-sangat-setuju" value="sangat-setuju" />
            <label for="q4-sangat-setuju">
              <img src="assets/img/sangat-setuju.png" alt="Sangat Setuju" class="emoji"/>
              <span>Sangat Setuju</span>
            </label>
            <input type="radio" name="q4" id="q4-setuju" value="setuju" />
            <label for="q4-setuju">
              <img src="assets/img/setuju.png" alt="Setuju" class="emoji"/>
              <span>Setuju</span>
            </label>
            <input type="radio" name="q4" id="q4-kurang-setuju" value="kurang-setuju" />
            <label for="q4-kurang-setuju">
              <img src="assets/img/kurang-setuju.png" alt="Kurang Setuju" class="emoji"/>
              <span>Kurang Setuju</span>
            </label>
            <input type="radio" name="q4" id="q4-tidak-setuju" value="tidak-setuju" />
            <label for="q4-tidak-setuju">
              <img src="assets/img/tidak-setuju.png" alt="Tidak Setuju" class="emoji"/>
              <span>Tidak Setuju</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Warna dan gambar yang digunakan pada website ini membuat saya merasa tertarik untuk menjelajahi materi ini lebih lama.
          </div>
          <div class="options">
            <input type="radio" name="q5" id="q5-sangat-setuju" value="sangat-setuju" />
            <label for="q5-sangat-setuju">
              <img src="assets/img/sangat-setuju.png" alt="Sangat Setuju" class="emoji"/>
              <span>Sangat Setuju</span>
            </label>
            <input type="radio" name="q5" id="q5-setuju" value="setuju" />
            <label for="q5-setuju">
              <img src="assets/img/setuju.png" alt="Setuju" class="emoji"/>
              <span>Setuju</span>
            </label>
            <input type="radio" name="q5" id="q5-kurang-setuju" value="kurang-setuju" />
            <label for="q5-kurang-setuju">
              <img src="assets/img/kurang-setuju.png" alt="Kurang Setuju" class="emoji"/>
              <span>Kurang Setuju</span>
            </label>
            <input type="radio" name="q5" id="q5-tidak-setuju" value="tidak-setuju" />
            <label for="q5-tidak-setuju">
              <img src="assets/img/tidak-setuju.png" alt="Tidak Setuju" class="emoji"/>
              <span>Tidak Setuju</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Penggunaan warna ungu tidak terlalu mencolok sehingga saya nyaman dalam membaca materi.
          </div>
          <div class="options">
            <input type="radio" name="q6" id="q6-sangat-setuju" value="sangat-setuju" />
            <label for="q6-sangat-setuju">
              <img src="assets/img/sangat-setuju.png" alt="Sangat Setuju" class="emoji"/>
              <span>Sangat Setuju</span>
            </label>
            <input type="radio" name="q6" id="q6-setuju" value="setuju" />
            <label for="q6-setuju">
              <img src="assets/img/setuju.png" alt="Setuju" class="emoji"/>
              <span>Setuju</span>
            </label>
            <input type="radio" name="q6" id="q6-kurang-setuju" value="kurang-setuju" />
            <label for="q6-kurang-setuju">
              <img src="assets/img/kurang-setuju.png" alt="Kurang Setuju" class="emoji"/>
              <span>Kurang Setuju</span>
            </label>
            <input type="radio" name="q6" id="q6-tidak-setuju" value="tidak-setuju" />
            <label for="q6-tidak-setuju">
              <img src="assets/img/tidak-setuju.png" alt="Tidak Setuju" class="emoji"/>
              <span>Tidak Setuju</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Warna ungu yang dipilih sangat efektif dalam menyampaikan nuansa emosional terkait kekerasan seksual.
          </div>
          <div class="options">
            <input type="radio" name="q7" id="q7-sangat-setuju" value="sangat-setuju" />
            <label for="q7-sangat-setuju">
              <img src="assets/img/sangat-setuju.png" alt="Sangat Setuju" class="emoji"/>
              <span>Sangat Setuju</span>
            </label>
            <input type="radio" name="q7" id="q7-setuju" value="setuju" />
            <label for="q7-setuju">
              <img src="assets/img/setuju.png" alt="Setuju" class="emoji"/>
              <span>Setuju</span>
            </label>
            <input type="radio" name="q7" id="q7-kurang-setuju" value="kurang-setuju" />
            <label for="q7-kurang-setuju">
              <img src="assets/img/kurang-setuju.png" alt="Kurang Setuju" class="emoji"/>
              <span>Kurang Setuju</span>
            </label>
            <input type="radio" name="q7" id="q7-tidak-setuju" value="tidak-setuju"  />
            <label for="q7-tidak-setuju">
              <img src="assets/img/tidak-setuju.png" alt="Tidak Setuju" class="emoji"/>
              <span>Tidak Setuju</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Saya merasa bahwa warna ungu yang dipilih pada website ini sangat sesuai dengan tema kekerasan seksual.
          </div>
          <div class="options">
            <input type="radio" name="q8" id="q8-sangat-setuju" value="sangat-setuju" />
            <label for="q8-sangat-setuju">
              <img src="assets/img/sangat-setuju.png" alt="Sangat Setuju" class="emoji"/>
              <span>Sangat Setuju</span>
            </label>
            <input type="radio" name="q8" id="q8-setuju" value="setuju" />
            <label for="q8-setuju">
              <img src="assets/img/setuju.png" alt="Setuju" class="emoji"/>
              <span>Setuju</span>
            </label>
            <input type="radio" name="q8" id="q8-kurang-setuju" value="kurang-setuju" />
            <label for="q8-kurang-setuju">
              <img src="assets/img/kurang-setuju.png" alt="Kurang Setuju" class="emoji"/>
              <span>Kurang Setuju</span>
            </label>
            <input type="radio" name="q8" id="q8-tidak-setuju" value="tidak-setuju" />
            <label for="q8-tidak-setuju">
              <img src="assets/img/tidak-setuju.png" alt="Tidak Setuju" class="emoji"/>
              <span>Tidak Setuju</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Penggunaan warna ungu sangat efisien dalam menarik perhatian terhadap materi tentang kekerasan seksual.
          </div>
          <div class="options">
            <input type="radio" name="q9" id="q9-sangat-setuju" value="sangat-setuju" />
            <label for="q9-sangat-setuju">
              <img src="assets/img/sangat-setuju.png" alt="Sangat Setuju" class="emoji"/>
              <span>Sangat Setuju</span>
            </label>
            <input type="radio" name="q9" id="q9-setuju" value="setuju" />
            <label for="q9-setuju">
              <img src="assets/img/setuju.png" alt="Setuju" class="emoji"/>
              <span>Setuju</span>
            </label>
            <input type="radio" name="q9" id="q9-kurang-setuju" value="kurang-setuju" />
            <label for="q9-kurang-setuju">
              <img src="assets/img/kurang-setuju.png" alt="Kurang Setuju" class="emoji"/>
              <span>Kurang Setuju</span>
            </label>
            <input type="radio" name="q9" id="q9-tidak-setuju" value="tidak-setuju" />
            <label for="q9-tidak-setuju">
              <img src="assets/img/tidak-setuju.png" alt="Tidak Setuju" class="emoji"/>
              <span>Tidak Setuju</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Saya merasa bahwa visualisasi gambar pada website ini memudahkan saya untuk mempertimbangkan perspektif korban kekerasan seksual dengan lebih baik.
          </div>
          <div class="options">
            <input type="radio" name="q10" id="q10-sangat-setuju" value="sangat-setuju" />
            <label for="q10-sangat-setuju">
              <img src="assets/img/sangat-setuju.png" alt="Sangat Setuju" class="emoji"/>
              <span>Sangat Setuju</span>
            </label>
            <input type="radio" name="q10" id="q10-setuju" value="setuju" />
            <label for="q10-setuju">
              <img src="assets/img/setuju.png" alt="Setuju" class="emoji"/>
              <span>Setuju</span>
            </label>
            <input type="radio" name="q10" id="q10-kurang-setuju" value="kurang-setuju" />
            <label for="q10-kurang-setuju">
              <img src="assets/img/kurang-setuju.png" alt="Kurang Setuju" class="emoji"/>
              <span>Kurang Setuju</span>
            </label>
            <input type="radio" name="q10" id="q10-tidak-setuju" value="tidak-setuju" />
            <label for="q10-tidak-setuju">
              <img src="assets/img/tidak-setuju.png" alt="Tidak Setuju" class="emoji"/>
              <span>Tidak Setuju</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Gambar yang digunakan pada website ini tidak membuat website loading terlalu lama.
          </div>
          <div class="options">
            <input type="radio" name="q11" id="q11-ya" value="ya" />
            <label for="q11-ya">
              <img src="assets/img/ya.png" alt="Ya" class="emoji"/>
              <span>Ya</span>
            </label>
            <input type="radio" name="q11" id="q11-tidak" value="tidak"/>
            <label for="q11-tidak">
              <img src="assets/img/tidak.png" alt="Tidak" class="emoji"/>
              <span>Tidak</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Apakah penggunaan warna dapat meningkatkan Anda dalam membaca materi kekerasan seksual?
          </div>
          <div class="options">
            <input type="radio" name="q12" id="q12-ya" value="ya" />
            <label for="q12-ya">
              <img src="assets/img/ya.png" alt="Ya" class="emoji"/>
              <span>Ya</span>
            </label>
            <input type="radio" name="q12" id="q12-tidak" value="tidak" />
            <label for="q12-tidak">
              <img src="assets/img/tidak.png" alt="Tidak" class="emoji"/>
              <span>Tidak</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Penggunaan media visual berupa gambar yang sesuai dengan konteks mempermudah pemahaman terhadap isi materi kekerasan seksual dan dampaknya.
          </div>
          <div class="options">
            <input type="radio" name="q13" id="q13-ya" value="ya"/>
            <label for="q13-ya">
              <img src="assets/img/ya.png" alt="Ya" class="emoji"/>
              <span>Ya</span>
            </label>
            <input type="radio" name="q13" id="q13-tidak" value="tidak"/>
            <label for="q13-tidak">
              <img src="assets/img/tidak.png" alt="Tidak" class="emoji"/>
              <span>Tidak</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Penggunaan warna yang digunakan dapat meningkatkan pemahaman tentang isi materi kekerasan seksual.
          </div>
          <div class="options">
            <input type="radio" name="q14" id="q14-ya" value="ya" />
            <label for="q14-ya">
              <img src="assets/img/ya.png" alt="Ya" class="emoji"/>
              <span>Ya</span>
            </label>
            <input type="radio" name="q14" id="q14-tidak" value="tidak" />
            <label for="q14-tidak">
              <img src="assets/img/tidak.png" alt="Tidak" class="emoji"/>
              <span>Tidak</span>
            </label>
          </div>
        </div>

        <div class="question">
          <div class="statement">
            Saya merasa warna ungu yang dipilih sesuai dengan preferensi visual para mahasiswa.
          </div>
          <div class="options">
            <input type="radio" name="q15" id="q15-ya" value="ya" />
            <label for="q15-ya">
              <img src="assets/img/ya.png" alt="Ya" class="emoji"/>
              <span>Ya</span>
            </label>
            <input type="radio" name="q15" id="q15-tidak" value="tidak" />
            <label for="q15-tidak">
              <img src="assets/img/tidak.png" alt="Tidak" class="emoji"/>
              <span>Tidak</span>
            </label>
          </div>
        </div>
        <div class="submit">
        <button type="submit" name="submit" value="submit">Submit</button>
      </div>
      </form>
    </div>
  </body>
</html>