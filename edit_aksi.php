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