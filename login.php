<?php
include 'koneksi.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login_btn"])) {
        $name = $_POST["name"];
        $password = $_POST["password"];

        $sql = "SELECT user_id FROM users WHERE name='$name' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $row['user_id']; // Set user_id session
            echo "<script language=\"javascript\">
              alert(\"Login berhasil, SELAMAT DATANG!!\");
              document.location=\"index.php\";
              </script>";
            exit();
        } else {
            echo "<script language=\"javascript\">
              alert(\"Login gagal, silahkan coba lagi!!\");
              document.location=\"login.php\";
              </script>";
        }
    } elseif (isset($_POST["register_btn"])) {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $prodi = $_POST["prodi"];
        $kelas = $_POST["kelas"];

        $check_name = "SELECT * FROM users WHERE name='$name'";
        $result_check_name = $conn->query($check_name);

        if ($result_check_name->num_rows > 0) {
            echo "Nama sudah terdaftar. Silakan gunakan nama lain.";
        } else {
            $insert_user = "INSERT INTO users (name, password, prodi, kelas) VALUES ('$name', '$password', '$prodi', '$kelas')";
            if ($conn->query($insert_user) === TRUE) {
                echo "<script language=\"javascript\">
              alert(\"Registrasi berhasil, silahkan login!!\");
              document.location=\"index.php\";
              </script>";
            } else {
                echo "Error: " . $insert_user . "<br>" . $conn->error;
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Kekerasan Seksual dan Dampaknya</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <div class="wrapper">
        <div class="title-text">
            <div class="title login">
                <img src="assets/img/Logo.png"> <br>
                Login
            </div>
            <div class="title signup">
                <img src="assets/img/Logo.png"> <br>
                Registrasi
            </div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Registrasi</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login">
                    <div class="field">
                        <input type="text" name="name" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="pass-link">
                        <span>Masukkan Nama sesuai dengan yang kamu daftarkan ya!</span>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" name="login_btn" value="Login">
                    </div>
                    <div class="signup-link">
                        Belum Punya Akun? <a href="#">Daftar Sekarang</a>
                    </div>
                </form>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="signup">
                    <div class="field">
                        <input type="text" name="name" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="field">
                        <input type="text" name="prodi" placeholder="Masukkan Prodi" required>
                    </div>
                    <div class="field">
                        <select name="kelas" required>
                            <option value="" disabled selected>Pilih Kelas</option>
                            <option value="2A">2A</option>
                            <option value="2B">2B</option>
                            <option value="2C">2C</option>
                            <option value="2D">2D</option>
                        </select>
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" name="register_btn" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (() => {
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (() => {
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (() => {
            signupBtn.click();
            return false;
        });
    </script>
</body>

</html>