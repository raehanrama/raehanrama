<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Guru</title>
    <link rel="stylesheet" href="style copy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container-2d">
        <div class="judul">
            <h2>ISI FORM DIBAWAH INI UNTUK MENAMBAHKAN DATA GURU</h2>
        </div>
        <div class="kembali">
            <a href="dt_guru.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Kembali</a>
        </div>

        <div class="form-3d">

            <form method="post" action="tambah_aksi.php" enctype="multipart/form-data">
                <h3>Tambah Data Guru</h3>
                <div>
                    <label for="nip">Nip</label>
                    <input type="number" name="nip" id="nip">
                </div>
                <div>
                    <label for="nama_guru">Nama Guru</label>
                    <input type="text" name="nama_guru" id="nama_guru">
                </div>
                <div>
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan">
                </div>
                <div>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin">
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat">
                </div>
                <div>
                    <label for="no_hp">No Hp</label>
                    <input type="number" name="no_hp" id="no_hp">
                </div>
                <div>
                    <label for="gambar">Foto Guru</label>
                    <input type="file" name="gambar" id="gambar">
                </div>
                <div>
                    <input class="form2" type="submit" value="SIMPAN">
                </div>
            </form>
        </div>
    </div>
</body>

</html>