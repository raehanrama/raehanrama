<?php
include 'koneksi.php';

// Memproses form jika ada data yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data yang dikirim dari form
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];

    // Mengunggah gambar jika ada yang dipilih
    if ($_FILES['gambar']['size'] > 0) {
        $gambar = $_FILES['gambar']['name'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $folder = 'gambar_siswa/';

        // Memindahkan file gambar ke folder yang ditentukan
        move_uploaded_file($tmp_file, $folder . $gambar);
    } else {
        $gambar = '';
    }

    // Menyimpan data siswa ke database
    $query = "INSERT INTO data_siswa (nis, nama, jurusan, alamat, jenis_kelamin, no_hp, gambar)
              VALUES ('$nis', '$nama', '$jurusan', '$alamat', '$jenis_kelamin', '$no_hp', '$gambar')";
    $result = mysqli_query($koneksi, $query);

    // Mengecek apakah query berhasil dijalankan
    if ($result) {
        // Mengalihkan halaman kembali ke dt_siswa.php setelah berhasil menambahkan data
        header("location: dt_siswa.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menambah data siswa.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="style copy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <div class="container-2d">
        <div class="judul">
            <h2>ISI FORM DIBAWAH INI UNTUK MENAMBAHKAN DATA GURU</h2>
        </div>
        <div class="kembali">
            <a href="dt_siswa.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Kembali</a>
        </div>

        <div class="form-3d">
            <form method="post" action="" enctype="multipart/form-data">
                <div>
                    <label for="nis">Nis</label>
                    <input type="number" name="nis" id="nis">
                </div>
                <div>
                    <label for="nama">Nama Siswa</label>
                    <input type="text" name="nama" id="nama">
                </div>
                <div>
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan">
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat">
                </div>
                <div>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin">
                </div>
                <div>
                    <label for="no_hp">No Hp</label>
                    <input type="number" name="no_hp" id="no_hp">
                </div>
                <div>
                    <label for="gambar">Foto Siswa</label>
                    <input type="file" name="gambar" id="gambar">
                </div>
                <div>
                    <input type="submit" value="SIMPAN">
                </div>
            </form>
        </div>
    </div>
</body>

</html>