<?php
include_once "config.php";
/* Submit Data dokter*/
if (isset($_POST['simpan'])) {
    /* Edit atau Simpan */
    if ($_GET['hal'] == "edit") {
        $edit = mysqli_query(
            $mysqli,
            "UPDATE dokter SET
                    nama        =      '$_POST[nama]',
                    spesialis   = '$_POST[spesialis]',
                    alamat      =    '$_POST[alamat]',
                    noHp        =      '$_POST[hp]'
                    WHERE id    =  '$_GET[id]'
                    "
        );
        if ($edit) {
            echo "<script>
                    alert('Data Dokter Berhasil Diedit');
                    document.location = 'dokter.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Dokter Gagal Diedit');
                    document.location = 'dokter.php';
                  </script>";
        }
    } else {
        $simpan = mysqli_query(
            $mysqli,
            "INSERT INTO dokter (nama, spesialis, alamat, noHp) VALUES 
              ('$_POST[nama]', '$_POST[spesialis]',
              '$_POST[alamat]', '$_POST[hp]')");
        if ($simpan) {
            echo "<script>
                    alert('Data Dokter Berhasil Disimpan');
                    document.location = 'dokter.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Dokter Gagal Disimpan');
                    document.location = 'dokter.php';
                  </script>";
        }
    }
}
/* Akhir Submit Data dokter*/
/* Mengedit Data dokter */
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $showData = mysqli_query(
            $mysqli,
            "SELECT * FROM dokter WHERE id = '$_GET[id]' "
        );
        $dataDokter = mysqli_fetch_array($showData);
        if ($dataDokter) {
            $nama = $dataDokter['nama'];
            $spesialis = $dataDokter['spesialis'];
            $alamat = $dataDokter['alamat'];
            $noHp = $dataDokter['noHp'];
        }
    } elseif ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query(
            $mysqli,
            "DELETE FROM dokter WHERE id = '$_GET[id]'"
        );
        if ($hapus) {
            echo "<script>
                    alert('Data Berhasil Dihapus');
                    document.location = 'dokter.php';
                  </script>";
        }
    }
}

/* Akhir Mengedit Data dokter */
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
          <a class="nav-link" aria-current="page" href="index.php">Data Pasien</a>
        </li>
  <li class="nav-item">
    <a class="nav-link active" href="dokter.php">Data Dokter</a>
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

      <!-- Awal Card Input dokter-->
      <div class="card mt-3">
        <div class="card-header bg-primary text-white">
          Form Input Data Dokter
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama">Nama Dokter
              </label>
              <input type="text" name="nama" value="<?= @$nama ?>" class="form-control" placeholder="Masukkan Nama Dokter" required>
            </div>
            <div class="form-group mt-2">
              <label for="">Spesialis
              </label>
              <input type="text" name="spesialis" value="<?= @$spesialis ?>" class="form-control" placeholder="Masukkan Spesialis" required>
            </div>
            <div class="form-group mt-2">
              <label for="alamat">Alamat
              </label>
              <input type="text" name="alamat" value="<?= @$alamat ?>" class="form-control" placeholder="Masukkan Alamat" required>
            </div>
            <div class="form-group mt-2">
              <label for="hp">Nomor Telepon
              </label>
              <input type="text" name="hp" value="<?= @$noHp ?>" class="form-control" placeholder="Masukkan No. HP" required>
            </div>
            <button type="submit" class="btn btn-success mt-3" name="simpan">Simpan
            </button>
            <button type="reset" class="btn btn-danger mt-3" name="reset">Reset
            </button>
          </form>
        </div>
      </div>
      <!-- Akhir Card Input dokter-->
      <!-- Awal Card Daftar dokter-->
      <div class="card mt-3">
        <div 
             class="card-header bg-success text-white">
          Daftar Dokter
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr>
              <th>ID
              </th>
              <th>Nama Dokter
              </th>
              <th>Spesialis
              </th>
              <th>Alamat
              </th>
              <th>No. HP
              </th>
              <th>Opsi
              </th>
            </tr>
            <?php
            $getData = mysqli_query($mysqli, "SELECT * from dokter");
            while ($dataDokter = mysqli_fetch_array($getData)): ?>
            <tr>
              <td>
                <?= $dataDokter['id'] ?>
              </td>
              <td>
                <?= $dataDokter['nama'] ?>
              </td>
              <td>
                <?= $dataDokter['spesialis'] ?>
              </td>
              <td>
                <?= $dataDokter['alamat'] ?>
              </td>
              <td>
                <?= $dataDokter['noHp'] ?>
              </td>
              <td>
                <a href="dokter.php?hal=edit&id=<?= $dataDokter[
                    'id'
                ] ?>" class="btn btn-warning mb-2">Edit
                </a>
                <a href="dokter.php?hal=hapus&id=<?= $dataDokter[
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
    <!-- Akhir Card Daftar dokter-->
    </div>
  <script src="./js/bootstrap.min.js">
  </script>
  </body>
</html>
