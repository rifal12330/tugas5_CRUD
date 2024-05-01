<?php 
  include 'koneksi.php';

  $npm = '';
  $nama = '';
  $jurusan = '';
  $alamat = '';

  if (isset($_GET['ubah'])) {
    $npm = $_GET['ubah'];

    $query = "SELECT * FROM mahasiswa WHERE npm = '$npm';";
    $sql = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nama'];
    $jurusan = $result['jurusan'];
    $alamat = $result['alamat'];

  }
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
    </div>
  </nav>

  <div class="container mt-5 pt-4">
    <figure class="text-dark">
      <blockquote class="blockquote">
        <h1 class="mt-5">Tabel Mahasiswa</h1>
      </blockquote>
    </figure>

    <div class="container text-dark mt-5">
        <form method="POST" action="proses-mahasiswa.php" >

          <div class="mb-3 row">
            <label for="inputNpm" class="col-sm-2 col-form-label">NPM</label>
              <div class="col-sm-10">
                <input required type="text" class="form-control bg-body-tertiary border border-secondary 
                border-opacity-50" id="inputNpm" name="inputNpm" placeholder="Masukkan NPM" value="<?php echo $npm ?>">
              </div>
          </div>
    
          <div class="mb-3 row">
            <label for="inputNamaMhs" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input required type="text" class="form-control bg-body-tertiary border border-secondary 
                border-opacity-50" id="inputNamaMhs" name="inputNamaMhs" placeholder="Masukkan Nama" value="<?php echo $nama ?>">
              </div>
          </div>
          
          <div class="mb-3 row">
            <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
              <div class="col-sm-10">
                <select required class="form-select bg-body-tertiary border border-secondary 
                border-opacity-50" id="inputJurusan" name="inputJurusan">
                  <option>Jurusan</option>
                  <option <?php if ($jurusan == 'Sistem Informasi'){echo "selected";}?>  value="Sistem Informasi"> Sistem Informasi </option>
                  <option <?php if ($jurusan == 'Teknik Informatika'){echo "selected";}?>  value="Teknik Informatika">Teknik Informatika</option>
                </select>
              </div>
          </div>
          
          <div class="mb-3 row">
            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <textarea required class="form-control bg-body-tertiary border border-secondary 
                border-opacity-50" id="inputAlamat" name="inputAlamat" rows="3"><?php echo $alamat ?></textarea>
              </div>
          </div>
          
          <div class="mb-3 row mt-5">
            <div class="col">
              <?php
                if (isset($_GET['ubah'])) {
              ?>
              <button type="submit" name="aksi" value="edit" class="btn btn-success active">
                <i class="bi bi-save2"></i>
                Simpan Perubahan
              </button>
              <?php
              } else {
                ?>
                <button type="submit" name="aksi" value="add" class="btn btn-primary active">
                  <i class="bi bi-plus-square"></i>
                  Tambah Data
                </button>
              <?php
              }
              ?>
              <a type="button" href="kumpulan-tabel.php" class="btn btn-danger active">
                <i class="bi bi-backspace"></i>
                Batal
              </a>
            </div>

          </div>
        </form>
    </div>
  </div>
</body>
</html>