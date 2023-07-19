<?php
session_start();

// Cek apakah tombol login telah ditekan
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "sekolahh");

    // Periksa koneksi database
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit;
    }

    // Query untuk memeriksa kredensial login
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    // Periksa hasil query
    if (mysqli_num_rows($result) > 0) {
        // Login berhasil
        $_SESSION['username'] = $username;
        echo "<script>alert('Login berhasil.');</script>";
        header('Location: dashboard.php');
        exit;
    } else {
        // Login gagal
        $error = "Username atau password salah. Silakan coba lagi.";
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style copy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <i class="fa fa-university"></i>
            <span class="logo-text">MADRASAH ALIYAH GUPPI BATUARA</span>
        </div>
        <ul class="menu">
            <li class="menu-item"><a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="menu-item dropdown">
                <a href="#"><i class="fa fa-id-card-o"></i> Informasi <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="profil.php"><i class="fa fa-user"></i> Profil</a></li>
                    <li><a href="kontak.php"><i class="fa fa-phone-square"></i> Kontak</a></li>
                </ul>
            </li>
            <li class="menu-item dropdown">
                <a href="#"><i class="fa fa-database"></i> Data Sekolah <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="dt_guru.php"><i class="fa fa-database"></i> Data Guru</a></li>
                    <li><a href="dt_siswa.php"><i class="fa fa-database"></i> Data Siswa</a></li>
                </ul>
            </li>
            <li class="menu-item"><a href="login.php"><i class="fa fa-sign-in"></i> Login</a></li>
        </ul>
    </nav>

    <div class="container-2ds">
        <div class="kotak">
            <form action="" method="post">
                <?php if (isset($error)) : ?>
                <div class="error">
                    <i class="fa fa-times-circle"></i>
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>
                <h2>Login Form</h2>
                <div class="form-item">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-item">
                    <input class="submit" type="submit" name="login" value="LOGIN">
                </div>
            </form>
        </div>
    </div>


    <footer>
        copyright &copy; 2021011033_Sri Ramadhana

    </footer>
</body>

</html>