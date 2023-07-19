<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data yang dikirim dari form
    $nip = $_POST['nip'];
    $nama_guru = $_POST['nama_guru'];
    $jabatan = $_POST['jabatan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    // Mengunggah gambar jika ada yang dipilih
    if ($_FILES['gambar']['size'] > 0) {
        $gambar = $_FILES['gambar']['name'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $folder = 'gambar_guru/';

        // Memindahkan file gambar ke folder yang ditentukan
        move_uploaded_file($tmp_file, $folder . $gambar);
    } else {
        $gambar = '';
    }

    // Menyimpan data guru ke database
    $query = "INSERT INTO data_guru (nip, nama, jabatan, jenis_kelamin, alamat, no_hp, gambar)
              VALUES ('$nip', '$nama_guru', '$jabatan', '$jenis_kelamin', '$alamat', '$no_hp', '$gambar')";
    $result = mysqli_query($koneksi, $query);

    // Mengecek apakah query berhasil dijalankan
    if ($result) {
        // Mengalihkan halaman kembali ke data Guru
        header("location: dt_guru.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menambah data guru: " . mysqli_error($koneksi);
    }
}
?>