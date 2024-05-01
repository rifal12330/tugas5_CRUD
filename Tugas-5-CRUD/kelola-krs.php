<?php 
  include 'koneksi.php';

  $id = '';
  $mahasiswa_npm = '';
  $matakuliah_kodemk = '';

  if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];

    $query = "SELECT * FROM krs WHERE id = '$id';";
    $sql = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($sql);

    $mahasiswa_npm = $result['mahasiswa_npm'];
    $matakuliah_kodemk = $result['matakuliah_kodemk'];

  }
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
    </div>
  </nav>

  <div class="container mt-5 pt-4">
    <figure class="text-dark">
      <blockquote class="blockquote">
        <h1 class="mt-5">Tabel KRS</h1>
      </blockquote>
    </figure>

    <div class="container text-dark mt-5">
      <form action="proses-krs.php" method="POST">
        <div class="mb-3 row">
          <label for="inputId" class="col-sm-2 col-form-label">ID</label>
          <div class="col-sm-10">
            <input value="<?php echo $id ?>" type="text" class="form-control border border-secondary 
            border-opacity-50" id="inputId" name="inputId" placeholder="ID tidak perlu diisi, akan ditentukan secara otomatis" <?php if ($id == '') {echo "disabled";}; ?> >
          </div>
        </div>

        <div class="mb-3 row">
          <label for="inputNpmMahasiswa" class="col-sm-2 col-form-label">NPM Mahasiswa</label>
          <div class="col-sm-10">
            <input required value="<?php echo $mahasiswa_npm ?>" type="text" class="form-control 
            border border-secondary border-opacity-50" id="inputNpmMahasiswa" name="inputNpmMahasiswa" placeholder="Masukkan NPM">
          </div>
        </div>
  
        <div class="mb-3 row">
          <label for="inputKdMK" class="col-sm-2 col-form-label">Kode Mata Kuliah</label>
          <div class="col-sm-10">
            <input required value="<?php echo $matakuliah_kodemk ?>" type="text" class="form-control bg-body-tertiary 
            border border-secondary border-opacity-50" id="inputKdMK" name="inputKdMK" placeholder="Ex : MK01">
          </div>
        </div>
  
        <div class="mb-3 row mt-5">
          <div class="col">
          <?php
              if (isset($_GET['ubah'])) {
            ?>
            <button type="submit" name="aksi" value="edit" class="btn btn-success active" >
              <i class="bi bi-save2"></i>
              Simpan Perubahan
            </button>
            <?php
            } else {
              ?>
              <button type="submit" name="aksi" value="add" class="btn btn-primary active" >
                <i class="bi bi-plus-square"></i>
                Tambah Data
              </button>
            <?php
            }
            ?>
  
            <a type="button" href="kumpulan-tabel.php" class="btn btn-danger active"  >
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