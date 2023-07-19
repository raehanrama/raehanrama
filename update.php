<?php
//koneksi database
include 'koneksi.php';
//menangkap data yang dikirim from

$Nip = $_GET['nip'];
$data = mysqli_query($koneksi, "SELECT * FROM data_guru WHERE nip='$Nip'");
$d = mysqli_fetch_array($data);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dapatkan file gambar baru
    $gambarBaru = $_FILES['gambar'];

    // Periksa apakah ada file gambar baru yang diunggah
    if ($gambarBaru['error'] === UPLOAD_ERR_OK) {
        $tempFilePath = $gambarBaru['tmp_name'];

        // Tentukan direktori tujuan dan nama file
        $direktoriUpload = 'gambar/';
        $namaFileBaru = $Nip . '_' . $gambarBaru['name'];
        $tujuan = $direktoriUpload . $namaFileBaru;

        // Pindahkan file yang diunggah ke direktori tujuan
        if (move_uploaded_file($tempFilePath, $tujuan)) {
            // Perbarui catatan database dengan nama file gambar baru
            $query = "UPDATE data_guru SET gambar='$namaFileBaru' WHERE nip='$Nip'";
            $hasil = mysqli_query($koneksi, $query);

            // Periksa apakah query berhasil dijalankan
            if ($hasil) {
                // Alihkan kembali ke halaman data Guru
                header("location: dt_guru.php");
                exit();
            } else {
                echo "Terjadi kesalahan saat mengupdate data guru.";
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah file gambar.";
        }
    } else {
        // Tidak ada file gambar baru yang diunggah, lanjutkan dengan pembaruan field formulir lainnya
        $Nama = $_POST['nama'];
        $Jabatan = $_POST['jabatan'];
        $Jk = $_POST['jenis_kelamin'];
        $Alamat = $_POST['alamat'];
        $No_hp = $_POST['no_hp'];

        $query = "UPDATE data_guru SET nama='$Nama', jabatan='$Jabatan', jenis_kelamin='$Jk', alamat='$Alamat', no_hp='$No_hp' WHERE nip='$Nip'";
        $hasil = mysqli_query($koneksi, $query);

        // Periksa apakah query berhasil dijalankan
        if ($hasil) {
            // Alihkan kembali ke halaman data Guru
            header("location: dt_guru.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat mengupdate data guru.";
        }
    }
}
?>