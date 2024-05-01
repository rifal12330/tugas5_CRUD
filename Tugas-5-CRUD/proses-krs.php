<?php 
  include 'koneksi.php';
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
        
          <div class="container mt-5 pt-5">

            <?php
              if (isset($_POST['aksi'])) {
                  if ($_POST['aksi'] == "add") {
                    $id = $_POST['inputId'];
                    $inputNpmMahasiswa = $_POST['inputNpmMahasiswa'];
                    $inputKdMK = $_POST['inputKdMK'];

                    $query = "INSERT INTO krs VALUES(null, '$inputNpmMahasiswa', '$inputKdMK')";
                    $sql = mysqli_query($koneksi, $query);

                    if ($sql) {
                      header("location: kumpulan-tabel.php");
                    } else {
                      echo $query;
                    } 

                  }elseif ($_POST['aksi'] == "edit") {
                    $id = $_POST['inputId'];
                    $inputNpmMahasiswa = $_POST['inputNpmMahasiswa'];
                    $inputKdMK = $_POST['inputKdMK'];

                    $query = "UPDATE krs SET mahasiswa_npm='$inputNpmMahasiswa', matakuliah_kodemk='$inputKdMK' WHERE id='$id';";
                    $sql = mysqli_query($koneksi, $query);

                    if ($sql) {
                      header("location: kumpulan-tabel.php");
                    } else {
                      echo $query;
                    }

                  }
              }

              if (isset($_GET['hapus'])) {
                $id = $_GET['hapus'];
                $query = "DELETE FROM krs WHERE id = '$id'";
                $sql = mysqli_query($koneksi, $query);
                
                if ($sql) {
                  header("location: kumpulan-tabel.php");
                } else {
                  echo $query;
                }

              }
            ?>

          </div>
        
        </body>
        
        </html>