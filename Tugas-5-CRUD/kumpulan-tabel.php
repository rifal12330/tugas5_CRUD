<?php 
  include 'koneksi.php';
  $query_mahasiswa = "SELECT * FROM mahasiswa"; 
  $sql_mahasiswa = mysqli_query($koneksi, $query_mahasiswa);
  $query_matakuliah = "SELECT * FROM matakuliah"; 
  $sql_matakuliah = mysqli_query($koneksi, $query_matakuliah);
  $query_krs = "SELECT * FROM krs"; 
  $sql_krs = mysqli_query($koneksi, $query_krs);
  $no = 0;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tugas CRUD</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
          <a class="nav-link bg-primary bg-gradient text-white" href="index.php">KRS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link bg-secondary bg-gradient active ms-2 disabled" aria-current="page" href="#">Tabel Basis Data</a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="container mb-5 mt-5 pt-4">

    <figure class="text-dark">
      <blockquote class="blockquote">
        <h1 class="mt-3">Tabel Mahasiswa</h1>
      </blockquote>
      <figcaption class="blockquote-footer text-dark">
        Berisi Basis Data <cite title="data krs">Tabel Mahasiswa</cite>
      </figcaption>
    </figure>

    <table class="table table-hover mt-4 table-secondary">
      <thead>
        <tr>
          <th scope="col">NPM</th>
          <th scope="col">Nama</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Alamat</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
          while ($result = mysqli_fetch_assoc($sql_mahasiswa)) {
        ?>
        <tr>
          <td>
            <?php echo $result['npm'];?>
          </td>
          <td>
            <?php echo $result['nama'];?>
          </td>
          <td>
            <?php echo $result['jurusan'];?>
          </td>
          <td>
            <?php echo $result['alamat'];?>
          </td>

          <td>
            <a type="button" class="btn btn-success" href="kelola-mahasiswa.php?ubah=<?php 
            echo $result['npm'];?>"><i class="bi bi-pencil"></i></a>
            <a type="button" class="btn btn-danger" href="proses-mahasiswa.php?hapus=<?php 
            echo $result['npm'];?>" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')"> <i class="bi bi-trash"></i> </a>
          </td>
        </tr>
        <?php
         }
        ?>

      </tbody>
    </table>

    <a href="kelola-mahasiswa.php" class="btn btn-primary text-white" role="button" aria-pressed="true">
      <i class="bi bi-plus-square"></i>
      Tambah Data
    </a>
  </div>
  


  <div class="container mb-5">

    <figure class="text-dark">
      <blockquote class="blockquote">
        <h1>Tabel Mata Kuliah</h1>
      </blockquote>
      <figcaption class="blockquote-footer text-dark">
        Berisi Basis Data <cite title="data krs">Tabel Mata Kuliah</cite>
      </figcaption>
    </figure>


    <!-- TABLE MATAKULIAH -->
    <table class="table table-hover mt-4 table-secondary">
      <thead>
        <tr>
          <th scope="col">Kode MK</th>
          <th scope="col">Nama</th>
          <th scope="col">Jumlah SKS</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php
          while ($result = mysqli_fetch_assoc($sql_matakuliah)) {
        ?>
        <tr>
          <td>
            <?php echo $result['kodemk'];?>
          </td>
          <td>
          <?php echo $result['nama'];?>
          </td>
          <td>
          <?php echo $result['jumlah_sks']." sks";?>
          </td>

          <td>
            <a type="button" class="btn btn-success" href="kelola-matakuliah.php?ubah=<?php 
            echo $result['kodemk'];?>"> <i class="bi bi-pencil"></i></a>
            <a type="button" class="btn btn-danger" href="proses-matakuliah.php?hapus=<?php 
            echo $result['kodemk'];?>" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')"><i class="bi bi-trash"></i> </a>
          </td>
        </tr>
       <?php
          }
        ?>

      </tbody>
    </table>

    <a href="kelola-matakuliah.php" class="btn btn-primary text-white" role="button" aria-pressed="true">
      <i class="bi bi-plus-square"></i>
      Tambah Data
    </a>
  </div>

  <div class="container mb-5">

    <figure class="text-dark">
      <blockquote class="blockquote">
        <h1>Tabel KRS</h1>
      </blockquote>
      <figcaption class="blockquote-footer text-dark">
        Berisi Basis Data <cite title="data krs">Tabel KRS</cite>
      </figcaption>
    </figure>


    <table class="table table-hover mt-4 table-secondary">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NPM Mahasiswa</th>
          <th scope="col">Kode MK</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php
          while ($result = mysqli_fetch_assoc($sql_krs)) {
        ?>
        <tr>
          <td>
            <?php echo $result['id'];?>
          </td>
          <td>
            <?php echo $result['mahasiswa_npm'];?>
          </td>
          <td>
            <?php echo $result['matakuliah_kodemk'];?>
          </td>

          <td>
            <a type="button" class="btn btn-success" href="kelola-krs.php?ubah=<?php 
            echo $result['id'];?>"> <i class="bi bi-pencil"></i></a>
            <a type="button" class="btn btn-danger" href="proses-krs.php?hapus=<?php 
            echo $result['id'];?>" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')"><i class="bi bi-trash"></i> </a>
        </td>
        </tr>
        <?php
          }
        ?>

      </tbody>
    </table>
    <a href="kelola-krs.php" class="btn btn-primary text-white" role="button" aria-pressed="true">
      <i class="bi bi-plus-square"></i>
      Tambah Data
    </a>
  </div>
</body>
</html>