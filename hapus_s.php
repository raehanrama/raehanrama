<?php
//Koneksi Database
include 'koneksi.php';

//Menangkap data yang dikirim dari from

$Nis=$_GET['nis'];

//Menginput data ke database
mysqli_query($koneksi, "delete from data_siswa where nis='$Nis'");

//Mengalihkan halaman kembali kedata siswa
header ("location:dt_siswa.php")
?>

