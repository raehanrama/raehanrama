<?php
include 'koneksi.php';

// Cek apakah parameter nis ada pada URL
if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];

    // Mendapatkan data siswa berdasarkan nis
    $query = "SELECT * FROM data_siswa WHERE nis = '$nis'";
    $result = mysqli_query($koneksi, $query);
    $siswa = mysqli_fetch_assoc($result);

    // Memeriksa apakah data siswa ditemukan
    if (!$siswa) {
        echo "Data siswa tidak ditemukan.";
        exit();
    }
} else {
    echo "Parameter nis tidak ditemukan.";
    exit();
}

// Memproses form jika ada data yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data yang dikirim dari form
    $nis_baru = $_POST['nis'];
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
        $gambar = $siswa['gambar']; // Jika tidak ada gambar baru, tetap menggunakan gambar lama
    }

    // Memperbarui data siswa di database
    $query = "UPDATE data_siswa SET nis = '$nis_baru', nama = '$nama', jurusan = '$jurusan', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', no_hp = '$no_hp', gambar = '$gambar' WHERE nis = '$nis'";
    $result = mysqli_query($koneksi, $query);

    // Mengecek apakah query berhasil dijalankan
    if ($result) {
        // Mengalihkan halaman kembali ke dt_siswa.php setelah berhasil mengedit data
        header("location: dt_siswa.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat mengedit data siswa.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="style copy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="nis" value="<?php echo $siswa['nis']; ?>">
                <div>
                    <label for="nama">Nama Siswa</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $siswa['nama']; ?>">
                </div>
                <div>
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" value="<?php echo $siswa['jurusan']; ?>">
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="<?php echo $siswa['alamat']; ?>">
                </div>
                <div>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin"
                        value="<?php echo $siswa['jenis_kelamin']; ?>">
                </div>
                <div>
                    <label for="no_hp">No Hp</label>
                    <input type="number" name="no_hp" id="no_hp" value="<?php echo $siswa['no_hp']; ?>">
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
</body>

</html>