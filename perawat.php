<?php
include_once "config.php";
/* Submit Data perawat*/
if (isset($_POST['simpan'])) {
    /* Edit atau Simpan */
    if ($_GET['hal'] == "edit") {
        $edit = mysqli_query(
            $mysqli,
            "UPDATE perawat SET
                    nama        =      '$_POST[nama]',
                    jenisKelamin   = '$_POST[jenisKelamin]',
                    alamat      =    '$_POST[alamat]',
                    noHp        =      '$_POST[hp]'
                    WHERE id    =  '$_GET[id]'
                    "
        );
        if ($edit) {
            echo "<script>
                    alert('Data Perawat Berhasil Diedit');
                    document.location = 'perawat.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Perawat Gagal Diedit');
                    document.location = 'perawat.php';
                  </script>";
        }
    } else {
        $simpan = mysqli_query(
            $mysqli,
            "INSERT INTO perawat (nama, jenisKelamin, alamat, noHp) VALUES 
              ('$_POST[nama]', '$_POST[jenisKelamin]',
              '$_POST[alamat]', '$_POST[hp]')");
        if ($simpan) {
            echo "<script>
                    alert('Data Perawat Berhasil Disimpan');
                    document.location = 'perawat.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Perawat Gagal Disimpan');
                    document.location = 'perawat.php';
                  </script>";
        }
    }
}
/* Akhir Submit Data perawat*/
/* Mengedit Data perawat */
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $showData = mysqli_query(
            $mysqli,
            "SELECT * FROM perawat WHERE id = '$_GET[id]' "
        );
        $dataPerawat = mysqli_fetch_array($showData);
        if ($dataPerawat) {
            $nama = $dataPerawat['nama'];
            $jenisKelamin = $dataPerawat['jenisKelamin'];
            $alamat = $dataPerawat['alamat'];
            $noHp = $dataPerawat['noHp'];
        }
    } elseif ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query(
            $mysqli,
            "DELETE FROM perawat WHERE id = '$_GET[id]'"
        );
        if ($hapus) {
            echo "<script>
                    alert('Data Berhasil Dihapus');
                    document.location = 'perawat.php';
                  </script>";
        }
    }
}

/* Akhir Mengedit Data perawat */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Rumah Sakit">
    <title>Data Perawat - Sistem Informasi Rawat Inap Rumah Sakit
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
    <a class="nav-link active" href="perawat.php">Data Perawat</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="kamar.php">Data Kamar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="transaksi.php">Data Transaksi</a>
  </li>
</ul>
      <!-- Akhir Navigasi -->

      <!-- Awal Card Input perawat-->
      <div class="card mt-3">
        <div class="card-header bg-primary text-white">
          Form Input Data Perawat
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="nama">Nama Perawat
              </label>
              <input type="text" name="nama" value="<?= @$nama ?>" class="form-control" placeholder="Masukkan Nama Perawat" required>
            </div>
            <div class="form-group mt-2">
              <label for="">Jenis Kelamin
              </label>
              <input type="text" name="jenisKelamin" value="<?= @$jenisKelamin ?>" class="form-control" placeholder="Masukkan Jenis Kelamin" required>
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
      <!-- Akhir Card Input perawat-->
      <!-- Awal Card Daftar perawat-->
      <div class="card mt-3">
        <div 
             class="card-header bg-success text-white">
          Daftar Perawat
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr>
              <th>ID
              </th>
              <th>Nama Perawat
              </th>
              <th>Jenis Kelamin
              </th>
              <th>Alamat
              </th>
              <th>No. HP
              </th>
              <th>Opsi
              </th>
            </tr>
            <?php
            $getData = mysqli_query($mysqli, "SELECT * from perawat");
            while ($dataPerawat = mysqli_fetch_array($getData)): ?>
            <tr>
              <td>
                <?= $dataPerawat['id'] ?>
              </td>
              <td>
                <?= $dataPerawat['nama'] ?>
              </td>
              <td>
                <?= $dataPerawat['jenisKelamin'] ?>
              </td>
              <td>
                <?= $dataPerawat['alamat'] ?>
              </td>
              <td>
                <?= $dataPerawat['noHp'] ?>
              </td>
              <td>
                <a href="perawat.php?hal=edit&id=<?= $dataPerawat[
                    'id'
                ] ?>" class="btn btn-warning mb-2">Edit
                </a>
                <a href="perawat.php?hal=hapus&id=<?= $dataPerawat[
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
    <!-- Akhir Card Daftar perawat-->
    </div>
  <script src="./js/bootstrap.min.js">
  </script>
  </body>
</html>
