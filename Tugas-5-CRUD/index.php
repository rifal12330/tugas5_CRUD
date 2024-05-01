<?php 
  include 'koneksi.php';

  $query = "SELECT mahasiswa.nama AS 'nama_mhs' , matakuliah.nama AS 'nama_matkul', matakuliah.jumlah_sks FROM mahasiswa JOIN krs ON mahasiswa.npm = krs.mahasiswa_npm 
  JOIN matakuliah ON matakuliah.kodemk = krs.matakuliah_kodemk ORDER BY mahasiswa.npm ASC";
  $sql = mysqli_query($koneksi, $query);
  $no = 0;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tugas CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-body-secondary">

  <nav class="navbar bg-body-tertiary mb-5 shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#" style="font-size : 1.1em;">
        <strong>Database Kuliah</strong>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link bg-secondary bg-gradient active disabled" aria-current="page" href="#">KRS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link bg-primary bg-gradient ms-2 text-white" href="kumpulan-tabel.php">Tabel Basis Data</a>
        </li>
        </ul>
      </div>
    </nav>


  <div class="container mt-5 pt-4">

    <figure class="text-dark">
      <blockquote class="blockquote">
          <h1 class="mt-5">Tabel KRS</h1>
          <p>Berisi Data Mahasiswa yang Mengambil KRS</p>
      </blockquote>
    </figure>

      <table class="table table-hover mt-3 table-striped">
        <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Lengkap</th>
          <th scope="col">Mata Kuliah</th>
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php
          while ($result = mysqli_fetch_assoc($sql)) {
        ?>
        <tr>
          <th scope="row">
            <?php echo ++$no; ?>
          </th>
          <td>
          <?php echo $result['nama_mhs'];?>
          </td>
          <td>
          <?php echo $result['nama_matkul'];?>
          </td>
          <td>
          <?php echo "<font color='#d63384'>".$result['nama_mhs']."</font>" . " Mengambil Mata Kuliah"."<font color='#d63384'> "
          .$result['nama_matkul']."</font>" ." (".$result['jumlah_sks']." SKS)";?>
          </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>