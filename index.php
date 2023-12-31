<?php
include_once "config.php";
/* Submit Data Pasien*/
if (isset($_POST['simpan'])) {
    /* Edit atau Simpan */
    if ($_GET['hal'] == "edit") {
        $edit = mysqli_query(
            $mysqli,
            "UPDATE pasien SET
                  nama = '$_POST[nama]',
                  goldar = '$_POST[goldar]',
                  alamat = '$_POST[alamat]',
                  jenisKelamin = '$_POST[jk]',
                  tgLahir = '$_POST[tgl]',
                  noHp = '$_POST[hp]',
                  pendamping = '$_POST[pendamping]'
                  WHERE id = '$_GET[id]'
                  "
        );
        if ($edit) {
            echo "<script>
                    alert('Data Pasien Berhasil Diedit');
                    document.location = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Pasien Gagal Diedit');
                    document.location = 'index.php';
                  </script>";
        }
    } else {
        $simpan = mysqli_query(
            $mysqli,
            "INSERT INTO pasien (nama, goldar, alamat, jenisKelamin, tgLahir, noHp, pendamping) VALUES 
              ('$_POST[nama]', '$_POST[goldar]',
              '$_POST[alamat]','$_POST[jk]','$_POST[tgl]',
              '$_POST[hp]','$_POST[pendamping]')");
        if ($simpan) {
            echo "<script>
                    alert('Data Pasien Berhasil Disimpan');
                    document.location = 'index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Pasien Gagal Disimpan');
                    document.location = 'index.php';
                  </script>";
        }
    }
}
/* Akhir Submit Data Pasien*/
/* Mengedit Data Pasien */
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $showData = mysqli_query(
            $mysqli,
            "SELECT * FROM pasien WHERE id = '$_GET[id]' "
        );
        $dataPasien = mysqli_fetch_array($showData);
        if ($dataPasien) {
            $nama = $dataPasien['nama'];
            $goldar = $dataPasien['goldar'];
            $alamat = $dataPasien['alamat'];
            $jenisKelamin = $dataPasien['jenisKelamin'];
            $tgLahir = $dataPasien['tgLahir'];
            $noHp = $dataPasien['noHp'];
            $pendamping = $dataPasien['pendamping'];
        }
    } elseif ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query(
            $mysqli,
            "DELETE FROM pasien WHERE id = '$_GET[id]'"
        );
        if ($hapus) {
            echo "<script>
                    alert('Data Berhasil Dihapus');
                    document.location = 'index.php';
                  </script>";
        }
    }
}

/* Akhir Mengedit Data Pasien */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Rumah Sakit">
    <title>Sistem Informasi Rawat Inap Rumah Sakit
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
          <a class="nav-link active" aria-current="page" href="index.php">Data Pasien</a>
        </li>
  <li class="nav-item">
    <a class="nav-link" href="dokter.php">Data Dokter</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="perawat.php">Data Perawat</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="kamar.php">Data Kamar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="transaksi.php">Data Transaksi</a>
  </li>
</ul>
      <!-- Akhir Navigasi -->

      <!-- Awal Card Input Pasien-->
      <div class="card mt-3">
        <div class="card-header bg-primary text-white">
          Form Input Data Pasien
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama">Nama Pasien
              </label>
              <input type="text" name="nama" value="<?= @$nama ?>" class="form-control" placeholder="Masukkan Nama Pasien" required>
            </div>
            <div class="form-group mt-2">
              <label for="goldar">Gologan Darah
              </label>
              <input type="text" name="goldar" value="<?= @$goldar ?>" class="form-control" placeholder="Masukkan Golongan Darah" required>
            </div>
            <div class="form-group mt-2">
              <label for="alamat">Alamat
              </label>
              <input type="text" name="alamat" value="<?= @$alamat ?>" class="form-control" placeholder="Masukkan Alamat" required>
            </div>
            <div class="form-group mt-2">
              <label for="jk">Jenis Kelamin
              </label>
              <input type="text" name="jk" value="<?= @$jenisKelamin ?>" class="form-control" placeholder="Masukkan Jenis Kelamin" required>
            </div>
            <div class="form-group mt-2">
              <label for="tgl">Tanggal Lahir
              </label>
              <input type="date" name="tgl" value="<?= @$tgLahir ?>" class="form-control" placeholder="Masukkan Tanggal Lahir" required>
            </div>
            <div class="form-group mt-2">
              <label for="hp">Nomor Telepon
              </label>
              <input type="text" name="hp" value="<?= @$noHp ?>" class="form-control" placeholder="Masukkan No. HP" required>
            </div>
            <div class="form-group mt-2">
              <label for="pendamping">Nama Pendamping
              </label>
              <input type="text" name="pendamping" value="<?= @$pendamping ?>" class="form-control" placeholder="Masukkan Nama Pendamping" required>
            </div>
            <button type="submit" class="btn btn-success mt-3" name="simpan">Simpan
            </button>
            <button type="reset" class="btn btn-danger mt-3" name="reset">Reset
            </button>
          </form>
        </div>
      </div>
      <!-- Akhir Card Input Pasien-->
      <!-- Awal Card Daftar Pasien-->
      <div class="card mt-3">
        <div 
             class="card-header bg-success text-white">
          Daftar Pasien
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr>
              <th>ID
              </th>
              <th>Nama Pasien
              </th>
              <th>Gologan Darah
              </th>
              <th>Alamat
              </th>
              <th>Jenis Kelamin
              </th>
              <th>Tanggal Lahir
              </th>
              <th>No. HP
              </th>
              <th>Nama Pendamping
              </th>
              <th>Opsi
              </th>
            </tr>
            <?php
            $getData = mysqli_query($mysqli, "SELECT * from pasien");
            while ($dataPasien = mysqli_fetch_array($getData)): ?>
            <tr>
              <td>
                <?= $dataPasien['id'] ?>
              </td>
              <td>
                <?= $dataPasien['nama'] ?>
              </td>
              <td>
                <?= $dataPasien['goldar'] ?>
              </td>
              <td>
                <?= $dataPasien['alamat'] ?>
              </td>
              <td>
                <?= $dataPasien['jenisKelamin'] ?>
              </td>
              <td>
                <?= $dataPasien['tgLahir'] ?>
              </td>
              <td>
                <?= $dataPasien['noHp'] ?>
              </td>
              <td>
                <?= $dataPasien['pendamping'] ?>
              </td>
              <td>
                <a href="index.php?hal=edit&id=<?= $dataPasien[
                    'id'
                ] ?>" class="btn btn-warning mb-2">Edit
                </a>
                <a href="index.php?hal=hapus&id=<?= $dataPasien[
                    'id'
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
    <!-- Akhir Card Daftar Pasien-->
    </div>
  <script src="./js/bootstrap.min.js">
  </script>
  </body>
</html>
