<!doctype html>
<html lang="en">
  <head>
  	<title>SPPku - Data Siswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="tampilan/css/style.css">
  </head>
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
	          <li class="active">
	            <a href="index.php"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
	              <a href="tampil_siswa.php"><span class="fa fa-user mr-3"></span> Data Siswa</a>
	          </li>
	          <li>
              <a href="tampil_kelas.php"><span class="fa fa-briefcase mr-3"></span> Data Kelas</a>
	          </li>
	          <li>
            <a href="tampil_petugas.php"><span class="fa fa-sticky-note mr-3"></span> Data Petugas</a>
	          </li>
	          <li>
              <a href="#"><span class="fa fa-paper-plane mr-3"></span> Contact</a>
	          </li>
	        </ul>

	        <div class="mb-5">
						<h3 class="h6 mb-3">Subscribe for newsletter</h3>
						<form action="#" class="subscribe-form">
	            <div class="form-group d-flex">
	            	<div class="icon"><span class="icon-paper-plane"></span></div>
	              <input type="text" class="form-control" placeholder="Enter Email Address">
	            </div>
	          </form>
					</div>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
    <br></br>
    <div class="Container col-md-9 square rounded p-3" style="margin-left:auto; margin-right:auto; border-color:white; background-color:white; text-align:left;">
        <div class="card-header" style="color:white; background-color:white; text-align:left">
        
            <h2 style="color:green">History Pembayaran</h2>
            <br>
            <form action="history_pembayaran.php" method="post" class="d-flex">
            <Input class="form-control me-2" type="search" name="cari" placeholder="search">
            <button type="submit" class="btn btn-outline-success">search</button>
            </form> 
        </div>
        <div class="card-body">
            <table class="table table-striped table-success"> 
            <thead>
        <tr style="color:green;">
            <th scope="col">id petugas</th>
            <th scope="col">Nisn</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Bayar</th>
            <th scope="col">Spp Bulan</th>
            <th scope="col">Spp Tahun</th>
            <th scope="col" style="text-align:center">aksi</th>
        </tr>
        </thead>
    <tbody style="color:white;">
        <?php
        include "koneksi.php";
        if (isset($_POST["cari"])){
            $cari =  $_POST['cari'];
            $query_bayar = mysqli_query($koneksi,
            "SELECT * FROM pembayaran where bulan_spp = ' $cari ' or nisn like '$cari%' ORDER BY bulan_spp DESC");
        }else {
            //jika tidak ada keyword pencarian 
            $query_bayar = mysqli_query($koneksi,"select * from pembayaran ORDER BY bulan_spp DESC");
        }
        while ($data_bayar=mysqli_fetch_array($query_bayar)) { ?>
        <?php
        $query_siswa = mysqli_query($koneksi, "select * from siswa where nisn = '".$data_bayar['nisn']."'");
        $data_siswa = mysqli_fetch_array($query_siswa);
        ?>
              <tr style="color:white">
              <input type="hidden" value="<?php echo $data_bayar['id_pembayaran']?>">
                  <td><?php echo $data_bayar["id_petugas"]; ?></td>
                  <td><?php echo $data_bayar["nisn"]; ?></td>
                  <td><?php echo $data_siswa["nama"]?></td>
                  <td><?php echo $data_bayar["tgl_bayar"]; ?></td>
                  <td><?php echo $data_bayar["bulan_spp"];?></td>
                  <td><?php echo $data_bayar["tahun_spp"];?></td>
                  <td>
  
                      <a href="hapusBayar.php?id_pembayaran=<?=$data_bayar['id_pembayaran']?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin menghapus data ini?')">Delete</a>
                  </td> 
              </tr>
            <?php
            }
            ?>
        </tbody>
            <br>
        </table><a href="transaksi.php" class="btn btn-success">pembayaran</a> 
       <!-- plugins:js -->
       <script src="tampilan/js/jquery.min.js"></script>
    <script src="tampilan/js/popper.js"></script>
    <script src="tampilan/js/bootstrap.min.js"></script>
    <script src="tampilan/js/main.js"></script>
  </body>
</html>
</body>
</html>