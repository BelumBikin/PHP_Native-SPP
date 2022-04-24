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

      <<!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

      <div class="container-fluid">
    <?php 
    include "koneksi.php";
    $qry_get_transaksi=mysqli_query($conn,"select * from pembayaran where id_pembayaran = '".$_GET['id_pembayaran']."'");
    $dt_transaksi=mysqli_fetch_array($qry_get_transaksi);
    ?>
    <h3>Edit Transaksi</h3>
    <form action="proses_ubah_transaksi.php" method="post">
    <input type="hidden" name="id_pembayaran" value="<?=$dt_transaksi['id_pembayaran']?>">

    Nama Siswa :
    <select name="nisn" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_siswa=mysqli_query($conn,"select * from siswa");
            while($data_siswa=mysqli_fetch_array($qry_siswa)){
                if($data_siswa['nisn']==$dt_transaksi['nisn']){
                    $selek="selected";
                } else {
                    $selek="";
                }
        echo '<option value="'.$data_siswa['nisn'].'" '.$selek.'>'.$data_siswa['nama'].'</option>';   
            }
            ?>
        </select>
    
    Tanggal Membayar :
    <input type="date" name="tgl_bayar"  placeholder="Tanggal / Bulan / Tahun." value="<?=$dt_transaksi['tgl_bayar']?>" class="form-control">

    SPP Bulan :
    <select type="text" name="bulan_spp" class="form-control">
            <option selected><?=$dt_transaksi['bulan_spp']?></option>
            <option>JANUARI</option>  
            <option>FEBRUARI</option> 
            <option>MARET</option> 
            <option>APRIL</option> 
            <option>MEI</option> 
            <option>JUNI</option>
            <option>JULI</option>
            <option>AGUSTUS</option>
            <option>SEPTEMBER</option>
            <option>OKTOBER</option>
            <option>NOVEMBER</option>
            <option>DESEMBER</option>
        </select>  

    SPP Tahun :
    <input type="number" name="tahun_spp" class="form-control" value="<?=$dt_transaksi['tahun_spp']?>" placeholder="Ketik Tahun ">

    Angkatan / Nominal yang Harus Dibayar :
    <select class="form-select form-select-sm" name="spp" aria-label=".form-select-sm example"> 
            <?php
            include "koneksi.php";
            $data_spp = mysqli_query($conn, "SELECT * FROM spp");
            while($r = mysqli_fetch_assoc($data_spp)){ ?>
            <option value="<?= $r['id_spp']; ?>">
            <?=  $r['angkatan'] ." | ".$r['nominal']; ?></option>
            <?php 
            } 
            ?>        
        </select> 
    
    Jumlah Bayar :
    <input type="number" name="jumlah" value="<?=$dt_transaksi['jumlah']?>" placeholder="1000000" class="form-control" >

    STATUS :
    <select name="status" class="form-control">
            <option><?=$dt_transaksi['status']?></option>
            <option value="LUNAS">LUNAS</option>
            <option value="BELUM LUNAS">BELUM LUNAS</option>
          </select>

    <a href="transaksi.php" class="btn btn-danger">Kembali</a>
    <button type="submit" style="margin-left: 30px;" class="btn btn-success" name="ubah">Simpan</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="tampilan/js/jquery.min.js"></script>
    <script src="tampilan/js/popper.js"></script>
    <script src="tampilan/js/bootstrap.min.js"></script>
    <script src="tampilan/js/main.js"></script>
  </body>
</html>