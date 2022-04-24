<!DOCTYPE html>
<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.php?pesan=gagal");
}elseif ($_SESSION['level']!="petugas") {
  header("location: petugas/index.php");
}
?>
<html lang="en">
  <head>
    <title>SPPku - Petugas</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="tampilan/css/style.css">
<body>

<div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar" class="active">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <div class="p-4">
          <h1><a href="index.html" class="logo">SPPku</a></h1>
          <ul class="list-unstyled components mb-5">
            <li>
              <a href="tampil_siswa.php"><span class="fa fa-user mr-3"></span> Data Siswa</a>
            </li>
            <li>
              <a href="tampil_kelas.php"><span class="fa fa-home mr-3"></span> Data Kelas</a>
            </li>
            <li>
              <a href="tampil_spp.php"><span class="fa fa-briefcase mr-3"></span> Data SPP</a>
            </li>
            <li>
              <a href="tampil_petugas.php"><span class="fa fa-user mr-3"></span> Data Petugas</a>
            </li>
            <li>
              <a href="transaksi.php"><span class="fa fa-exchange mr-3"></span> Transaksi</a>
            </li>
            <li>
              <a href="logout.php"><span class="fa fa-close mr-3"></span> Logout</a>
            </li>
          </ul>


          <div class="footer">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </nav>

      <div id="content" class="p-4 p-md-5 pt-5">

    <div class="container-fluid">
    <h1>Data Kelas</h1>
    <p>Apakah kelasmu sudah terdaftar?</p> 
    </div>

<div class="container-fluid">

    <h3>Data Kelas</h3> 
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA KELAS</th>
                <th>JURUSAN</th>
                <th>ANGKATAN</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";
        $qry_kelas=mysqli_query($conn,"select * from kelas ORDER BY `kelas`.`id_kelas` ASC");
            $no=0;
            while($data_kelas=mysqli_fetch_array($qry_kelas)){
            $no++;?>
        <tr>              
            <td><?=$no?></td>
            <td><?=$data_kelas['nama_kelas']?></td>
            <td><?=$data_kelas['jurusan']?></td>
            <td><?=$data_kelas['angkatan']?></td>

            <td><a href="ubah_kelas.php?id_kelas=<?=$data_kelas['id_kelas']?>" class="btn btn-info">Ubah</a> | 
                <a href="hapus_kelas.php?id_kelas=<?=$data_kelas['id_kelas']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    <a href="tambah_kelas.php" class="btn btn-warning">Tambah Kelas</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </div>
		</div>

    <script src="tampilan/js/jquery.min.js"></script>
    <script src="tampilan/js/popper.js"></script>
    <script src="tampilan/js/bootstrap.min.js"></script>
    <script src="tampilan/js/main.js"></script>
  </body>
</html>
</body>
</html>