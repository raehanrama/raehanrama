<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style copy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav class="menu">
        <label><i class="fa fa-university" aria-hidden="true"></i> MADRASAH ALIYAH GUPPI BATUARA</label>
        <ul>
            <li><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i> Dasboard</a></li>
            <li><a href="#"> <i class="fa fa-id-card-o" aria-hidden="true"></i> Informasi</a>
                <ul class="dropdown">
                    <li><a href="profil.php"><i class="fa fa-user" aria-hidden="true"></i> Profil</a></li>
                    <li><a href="kontak.php"><i class="fa fa-phone-square" aria-hidden="true"></i> Kontak</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-database" aria-hidden="true"></i> Data Sekolah</a>
                <ul class="dropdown">
                    <li><a href="dt_guru.php"><i class="fa fa-database" aria-hidden="true"></i>Data Guru</a></li>
                    <li><a href="dt_siswa.php"><i class="fa fa-database" aria-hidden="true"></i> Data Siswa</a></li>
                </ul>
            </li>
            <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
        </ul>

    </nav>
</body>

</html>