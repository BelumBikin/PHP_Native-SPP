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
<h3>Tambah Transaksi</h3>
<form action="proses_tambah_transaksi.php" method="post">
        <div class="mb-3">
                    <span> Nama Petugas / Admin : </span>
                    <select class="form-select form-select-sm" name="nama_petugas" aria-label=".form-select-sm example">
                        <option selected>--Pilih Petugas--</option> 
                        <?php
                        include "koneksi.php";  
                        // Kita akan ambil Nama Petugas yang ada pada tabel Petugas
                        $data_petugas = mysqli_query($conn, "SELECT * FROM petugas");
                        while($r = mysqli_fetch_assoc($data_petugas)){ ?>
                        <option value="<?= $r['id_petugas']; ?>"><?= $r['nama_petugas']; ?></option>
                        <?php
                        } 
                        ?>
                    </select>
                </td>
            </select>
        </div>
        <br>
        <div class="mb-3">
            <span> NAMA SISWA : </span>
            <select type="text" name="nama" class="form-control">
                <?php
                include "koneksi.php";
                $data_siswa = mysqli_query($conn, "SELECT * FROM siswa");
                while($r = mysqli_fetch_assoc($data_siswa)){ ?>
                <option value="<?= $r['nisn']; ?>"><?= $r['nama']; ?></option>
                <?php
                }
                ?>         
            </select>
        </td>
    </div>
    <br> 
    <div class="mb-3">
        <span> Tanggal Membayar :  </span>
        <input type="date" name="tgl_bayar"  placeholder="Tanggal / Bulan / Tahun." class="form-control">      
    </div>
    <br>
    <div class="mb-3">
        <span> SPP Bulan :   </span>
        <select type="text" name="bulan_spp" class="form-control">
            <option selected>--Pilih Bulan--</option>
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
    </div>
    <br>
    <div class="mb-3">
        <span> SPP Tahun :   </span>
        <input type="number" name="tahun_spp" class="form-control" placeholder="Ketik Tahun ">   
    </div>
    <br>
    <div class="mb-3">
        <span> Angkatan / Nominal yang harus dibayar : </span>
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
    </div>
    <br>
    <div class="mb-3">
        <span> JUMLAH BAYAR : </span>
        <td><input type="number" name="jumlah" placeholder="1000000" class="form-control" >
    </div>
    <div class="mb-3">
        <span> STATUS : </span>
        <td> 
        <select name="status" class="form-control">
            <option></option>
            <option value="LUNAS">LUNAS</option>
            <option value="BELUM LUNAS">BELUM LUNAS</option>
          </select>
        </td>
    </div>
    <br>
    <a href="transaksi.php" class="btn btn-danger">Kembali</a>
    <button type="submit" style="margin-left: 30px;" class="btn btn-success" name="simpan">Tambah </button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="tampilan/js/jquery.min.js"></script>
    <script src="tampilan/js/popper.js"></script>
    <script src="tampilan/js/bootstrap.min.js"></script>
    <script src="tampilan/js/main.js"></script>
  </body>
</html>