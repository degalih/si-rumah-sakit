<?php
include_once "config.php";
/* Submit Data kamar*/
if (isset($_POST['simpan'])) {
    /* Edit atau Simpan */
    if ($_GET['hal'] == "edit") {
        $edit = mysqli_query(
            $mysqli,
            "UPDATE kamar SET
                    nama        =      '$_POST[nama]',
                    harga       = '$_POST[harga]',
                    jumlah      =    '$_POST[jumlah]',
                    jenis        =      '$_POST[jenis]'
                    WHERE no    =  '$_GET[no]'
                    "
        );
        if ($edit) {
            echo "<script>
                    alert('Data Kamar Berhasil Diedit');
                    document.location = 'kamar.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Kamar Gagal Diedit');
                    document.location = 'kamar.php';
                  </script>";
        }
    } else {
        $simpan = mysqli_query(
            $mysqli,
            "INSERT INTO kamar (nama, harga, jumlah, jenis) VALUES 
              ('$_POST[nama]', '$_POST[harga]',
              '$_POST[jumlah]', '$_POST[jenis]')");
        if ($simpan) {
            echo "<script>
                    alert('Data Kamar Berhasil Disimpan');
                    document.location = 'kamar.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Kamar Gagal Disimpan');
                    document.location = 'kamar.php';
                  </script>";
        }
    }
}
/* Akhir Submit Data kamar*/
/* Mengedit Data kamar */
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $showData = mysqli_query(
            $mysqli,
            "SELECT * FROM kamar WHERE no = '$_GET[no]' "
        );
        $dataKamar = mysqli_fetch_array($showData);
        if ($dataKamar) {
            $nama = $dataKamar['nama'];
            $harga = $dataKamar['harga'];
            $jumlah = $dataKamar['jumlah'];
            $jenis = $dataKamar['jenis'];
        }
    } elseif ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query(
            $mysqli,
            "DELETE FROM kamar WHERE no = '$_GET[no]'"
        );
        if ($hapus) {
            echo "<script>
                    alert('Data Berhasil Dihapus');
                    document.location = 'kamar.php';
                  </script>";
        }
    }
}

/* Akhir Mengedit Data kamar */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Rumah Sakit">
    <title>Data Kamar - Sistem Informasi Rawat Inap Rumah Sakit
    </title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Sistem Informasi Rawat Inap Rumah Sakit
      </h1>
      <h2 class="text-center">1906049-Praktikum Basis Data
      </h2>

      <!-- Navigasi -->
      <ul class="nav nav-pills">
        <li class="nav-item">    
          <a class="nav-link" aria-current="page" href="index.php">Data Pasien</a>
        </li>
  <li class="nav-item">
    <a class="nav-link" href="dokter.php">Data Dokter</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="perawat.php">Data Perawat</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="kamar.php">Data Kamar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="transaksi.php">Data Transaksi</a>
  </li>
</ul>
      <!-- Akhir Navigasi -->

      <!-- Awal Card Input kamar-->
      <div class="card mt-3">
        <div class="card-header bg-primary text-white">
          Form Input Data Kamar
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama">Nama Kamar
              </label>
              <input type="text" name="nama" value="<?= @$nama ?>" class="form-control" placeholder="Masukkan Nama Kamar" required>
            </div>
            <div class="form-group mt-2">
              <label for="">Harga
              </label>
              <input type="text" name="harga" value="<?= @$harga ?>" class="form-control" placeholder="Masukkan Harga" required>
            </div>
            <div class="form-group mt-2">
              <label for="jumlah">Jumlah
              </label>
              <input type="text" name="jumlah" value="<?= @$jumlah ?>" class="form-control" placeholder="Masukkan Jumlah" required>
            </div>
            <div class="form-group mt-2">
              <label for="jenis">Jenis
              </label>
              <input type="text" name="jenis" value="<?= @$jenis ?>" class="form-control" placeholder="Masukkan Jenis" required>
            </div>
            <button type="submit" class="btn btn-success mt-3" name="simpan">Simpan
            </button>
            <button type="reset" class="btn btn-danger mt-3" name="reset">Reset
            </button>
          </form>
        </div>
      </div>
      <!-- Akhir Card Input kamar-->
      <!-- Awal Card Daftar kamar-->
      <div class="card mt-3">
        <div 
             class="card-header bg-success text-white">
          Daftar Kamar
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr>
              <th>NO
              </th>
              <th>Nama Kamar
              </th>
              <th>Harga
              </th>
              <th>Jumlah
              </th>
              <th>Jenis
              </th>
              <th>Opsi
              </th>
            </tr>
            <?php
            $getData = mysqli_query($mysqli, "SELECT * from kamar");
            while ($dataKamar = mysqli_fetch_array($getData)): ?>
            <tr>
              <td>
                <?= $dataKamar['no'] ?>
              </td>
              <td>
                <?= $dataKamar['nama'] ?>
              </td>
              <td>
                <?= $dataKamar['harga'] ?>
              </td>
              <td>
                <?= $dataKamar['jumlah'] ?>
              </td>
              <td>
                <?= $dataKamar['jenis'] ?>
              </td>
              <td>
                <a href="kamar.php?hal=edit&no=<?= $dataKamar[
                    'no'
                ] ?>" class="btn btn-warning mb-2">Edit
                </a>
                <a href="kamar.php?hal=hapus&no=<?= $dataKamar[
                    'no'
                ] ?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger mb-2">Hapus
                </a>
              </td>
            </tr>
            <?php endwhile;
            ?>
          </table>
        </div>
      </div>
    </div>
    <!-- Akhir Card Daftar kamar-->
    </div>
  <script src="./js/bootstrap.min.js">
  </script>
  </body>
</html>
