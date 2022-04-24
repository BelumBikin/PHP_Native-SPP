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
      <h3>Transaksi</h3>
    <p><button type="button" class="btn btn-outline-secondary"><a href="/mengukl/crud/tambah_transaksi.php">Tambah Data</a></button></p>
    <table class="table  table-hover table-dark" cellspacing="1">
        <tr>
            <td>No. </td>
            <td>Nama Petugas</td>
            <td>Nama Siswa</td>
            <td>Tgl/Bulan/Tahun dibayar</td>
            <td>Tahun / Nominal harus dibayar</td>
            <td>Jumlah yang dibayar</td>
            <td>Status</td>
            <td>Aksi</td>
        </tr>
<?php
$totalDataHalaman = 5;
$data = mysqli_query($connect, "SELECT * FROM pembayaran");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Kita panggil tabel pembayaran
// Setelah kita panggil, JOIN tabel yang ter relasi ke tabel pembayaran
$sql = mysqli_query($connect, "SELECT * FROM pembayaran
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
JOIN siswa ON pembayaran.nisn = siswa.nisn
JOIN spp ON pembayaran.id_spp = spp.id_spp
ORDER BY tgl_bayar ASC LIMIT $dataAwal, $totalDataHalaman");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['nama']; ?></td>
            <td><?= $r['tgl_bayar'] . "/" . $r['bulan_spp'] . "/" . $r['tahun_spp']; ?></td>
            <td><?= $r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
            <td><?= $r['jumlah_bayar']; ?></td>
            <td>
<?php
// Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
if($r['jumlah_bayar'] == $r['nominal']){ ?>
                <font style="color: aqua; font-weight: bold;">LUNAS</font>
<?php }else{ ?>                           <font style="color: tomato; font-weight: bold;">  BELUM LUNAS </font> <?php } ?> </td>
            <td>
<?php
// Jika siswa ingin membayar lunas sisa pembayaran
if($r['jumlah_bayar'] == $r['nominal']){ echo "-";
}else{ ?>
    <a href="?lunas&id=<?= $r['id_pembayaran']; ?>">BAYAR LUNAS</a>
<?php } ?>  </td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Tampilkan tombol halaman -->
<div class="table-number">
<?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?>
</div>
<!-- Selesai -->
    </div>
    <?php 
    $footerpath = $_SERVER['DOCUMENT_ROOT'];
    $footerpath .= "/mengukl/misc/footer.php"; 
    require($footerpath); ?>
</body>
</html>
<?php
// Ada siswa yang ingin membayar sisa pembayaran
if(isset($_GET['lunas'])){
    $id = $_GET['id'];
    $ambilData = mysqli_query($connect, "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp 
                                    WHERE id_pembayaran = '$id'");
    $row = mysqli_fetch_assoc($ambilData);
    $sisa = $row['nominal'] - $row['jumlah_bayar'];
    $hasil = $row['jumlah_bayar'] + $sisa;
    $update = mysqli_query($connect, "UPDATE pembayaran SET jumlah_bayar='$hasil' WHERE id_pembayaran='$id'");
    if($update){
        echo "<script>alert('Data Berhasil Ditambahkan !');location.href='../transaction/transaksi.php';</script>";
    }
}
?>

    <script src="tampilan/js/jquery.min.js"></script>
    <script src="tampilan/js/popper.js"></script>
    <script src="tampilan/js/bootstrap.min.js"></script>
    <script src="tampilan/js/main.js"></script>
  </body>
</html>
</body>
</html>