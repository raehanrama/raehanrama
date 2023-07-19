<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data yang dikirim dari form
    $Nip = $_POST['nip'];
    $Nama = $_POST['nama'];
    $Jabatan = $_POST['jabatan'];
    $Jk = $_POST['jenis_kelamin'];
    $Alamat = $_POST['alamat'];
    $No_hp = $_POST['no_hp'];

    // Mengecek apakah gambar diunggah
    if (isset($_FILES['gambar'])) {
        $namaGambar = $_FILES['gambar']['name'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $folder = 'gambar_guru/';

        // Memindahkan file gambar ke folder yang ditentukan
        move_uploaded_file($tmp_file, $folder . $namaGambar);
    } else {
        $namaGambar = '';
    }

    // Melakukan update data guru ke database
    $query = "UPDATE data_guru SET nama='$Nama', jabatan='$Jabatan', jenis_kelamin='$Jk', alamat='$Alamat', no_hp='$No_hp', gambar='$namaGambar' WHERE nip='$Nip'";
    $result = mysqli_query($koneksi, $query);

    // Mengecek apakah query berhasil dijalankan
    if ($result) {
        // Mengalihkan halaman kembali ke data Guru
        header("location: dt_guru.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat mengupdate data guru.";
    }
}

// Mengambil data guru yang akan diedit
$Nip = $_GET['nip'];
$data = mysqli_query($koneksi, "SELECT * FROM data_guru WHERE nip='$Nip'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style copy.css">
</head>

<body>
    <div class="container-2d">
        <div class="judul">
            <h2>ISI FORM DIBAWAH INI UNTUK MENGEDIT DATA SISWA</h2>
        </div>
        <div class="kembali">
            <a href="dt_siswa.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Kembali</a>
        </div>

        <div class="form-3d">
            <form method="POST" action="" enctype="multipart/form-data">
                <ul>
                    <li>
                        <label for="nip">Nip:</label>
                        <input type="hidden" name="nip" id="nip" value="<?php echo $d['nip'] ?>">
                    </li>
                    <li>
                        <label for="nama">Nama Guru:</label>
                        <input type="text" name="nama" id="nama" value="<?php echo $d['nama']; ?>">
                    </li>
                    <li>
                        <label for="jabatan">Jabatan:</label>
                        <input type="text" name="jabatan" id="jabatan" value="<?php echo $d['jabatan'] ?>">
                    </li>
                    <li>
                        <label for="jenis_kelamin">Jenis Kelamin:</label>
                        <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                            value="<?php echo $d['jenis_kelamin'] ?>">
                    </li>
                    <li>
                        <label for="alamat">Alamat:</label>
                        <input type="text" name="alamat" id="alamat" value="<?php echo $d['alamat'] ?>">
                    </li>
                    <li>
                        <label for="no_hp">No Hp:</label>
                        <input type="number" name="no_hp" id="no_hp" value="<?php echo $d['no_hp'] ?>">
                    </li>
                    <li>
                        <label for="gambar">Gambar:</label>
                        <input type="file" name="gambar" id="gambar">
                    </li>
                    <li>
                        <input class="submit" type="submit" name="submit" value="Kirim Data">
                    </li>
                </ul>
            </form>
        </div>
    </div>
</body>

</html>