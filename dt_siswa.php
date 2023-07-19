    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Siswa</title>
        <link rel="stylesheet" href="style copy.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

        <div class="content">
            <br>
            <h2 align="center">DATA SISWA</h2>
            <hr align="center" width="90%" color="black" height="1px">
            <br>
            <p align="center">
                <font color="black" face="times new roman" size="4pt">
                    DAFTAR NAMA SISWA(i) MADRASAH ALIYAH GUPPI BATUARA
                </font>
            </p>

            <table align="center">
                <tr>
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nama Siswa</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No Hp</th>
                    <th>gambar</th>
                    <th>Tindakan</th>
                </tr>
                <?php
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM data_siswa");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nis']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['jurusan']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['jenis_kelamin']; ?></td>
                    <td><?php echo $d['no_hp']; ?></td>
                    <td><img src="gambar_siswa/<?php echo $d['gambar']; ?>" alt="Foto Guru" width="100"></td>
                    <td>
                        <div class="tindakan">
                            <div class="a"><a href="edit_s.php?nis=<?php echo $d['nis']; ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</a>
                            </div>
                            <div class="b"><a href="hapus_s.php?nis=<?php echo $d['nis']; ?>">
                                    <i class="fa fa-trash" aria-hidden="true"></i> HAPUS</a>
                            </div>
                            <div class="c"><a href="tambah_s.php?nis=<?php echo $d['nis']; ?>">
                                    <i class="fa fa-plus-square-o" aria-hidden="true"></i> TAMBAH</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <footer>
            &copy; 2021011033_Sri Ramadhana
        </footer>
    </body>

    </html>