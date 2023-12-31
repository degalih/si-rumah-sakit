<?php
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Rumah Sakit">
    <title>Data Transaksi - Sistem Informasi Rawat Inap Rumah Sakit
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
    <a class="nav-link" href="kamar.php">Data Kamar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="transaksi.php">Data Transaksi</a>
  </li>
</ul>
      <!-- Akhir Navigasi -->
      <!-- Awal Card Daftar transaksi-->
      <div class="card mt-3">
        <div 
             class="card-header bg-success text-white">
          Daftar transaksi
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr>
              <th>No Transaksi
              </th>
              <th>Tanggal Masuk 
              </th>
              <th>Tanggal Keluar
              </th>
              <th>id_pasien
              </th>
              <th>id_dokter
              </th>
              <th>id_perawat
              </th>
              <th>no_kamar
              </th>
            </tr>
            <?php
            $getData = mysqli_query($mysqli, "SELECT * from transaksi");
            while ($dataTransaksi = mysqli_fetch_array($getData)): ?>
            <tr>
              <td>
                <?= $dataTransaksi['no_transaksi'] ?>
              </td>
              <td>
                <?= $dataTransaksi['tgl_masuk'] ?>
              </td>
              <td>
                <?= $dataTransaksi['tgl_keluar'] ?>
              </td>
              <td>
                <?= $dataTransaksi['id_pasien'] ?>
              </td>
              <td>
                <?= $dataTransaksi['id_dokter'] ?>
              </td>
              <td>
                <?= $dataTransaksi['id_perawat'] ?>
              </td>
              <td>
                <?= $dataTransaksi['no_kamar'] ?>
              </td>
            </tr>
            <?php endwhile;
            ?>
          </table>
        </div>
      </div>
    </div>
    <!-- Akhir Card Daftar transaksi-->
    </div>
  <script src="./js/bootstrap.min.js">
  </script>
  </body>
</html>
