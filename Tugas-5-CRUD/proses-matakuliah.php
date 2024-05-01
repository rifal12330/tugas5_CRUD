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
                    $inputKdMk = $_POST['inputKdMk'];
                    $inputNamaMk = $_POST['inputNamaMk'];
                    $inputSks = $_POST['inputSks'];

                    $query = "INSERT INTO matakuliah VALUES('$inputKdMk', '$inputNamaMk', '$inputSks')";
                    $sql = mysqli_query($koneksi, $query);

                    if ($sql) {
                      header("location: kumpulan-tabel.php");
                    } else {
                      echo $query;
                    }
                    
                  }elseif ($_POST['aksi'] == "edit") {
                    $inputKdMk = $_POST['inputKdMk'];
                    $inputNamaMk = $_POST['inputNamaMk'];
                    $inputSks = $_POST['inputSks'];

                    $query = "UPDATE matakuliah SET kodemk='$inputKdMk', nama='$inputNamaMk', jumlah_sks='$inputSks' WHERE kodemk='$inputKdMk';";
                    $sql = mysqli_query($koneksi, $query);

                    if ($sql) {
                      header("location: kumpulan-tabel.php");
                    } else {
                      echo $query;
                    }
                  }
              }

              if (isset($_GET['hapus'])) {
                $kodemk = $_GET['hapus'];
                $query = "DELETE FROM matakuliah WHERE kodemk = '$kodemk'";
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