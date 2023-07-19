<?php
//Koneksi Database
include 'koneksi.php';

//Menangkap data yang dikirim dari from

$Nip=$_GET['nip'];

//Menginput data ke database
mysqli_query($koneksi, "delete from data_guru where nip='$Nip'");

//Mengalihkan halaman kembali kedata guru
header ("location:dt_guru.php")

?>

