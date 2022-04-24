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

    <div class="container-fluid">

    <h1>Data Siswa</h1>
    <p>Cek Apakah Kamu Bagian Dari Kami? Jika Belum, Mari Bergabung!</p> 
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>NAMA</th>
                <th>KELAS</th>
                <th>ALAMAT</th>
                <th>NOMOR TELEPON</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";
            $qry_siswa=mysqli_query($conn,"select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
            $no=0;
            while($data_siswa=mysqli_fetch_array($qry_siswa)){
            $no++;?>
        <tr>              
            <td><?=$no?></td>
            <td><?=$data_siswa['nisn']?></td>
            <td><?=$data_siswa['nis']?></td>
            <td><?=$data_siswa['nama']?></td>
            <td><?=$data_siswa['nama_kelas']?></td>
            <td><?=$data_siswa['alamat']?></td>
            <td><?=$data_siswa['no_tlp']?></td>
            <td><?=$data_siswa['username']?></td>
            <td><?=$data_siswa['password']?></td>

            <td><a href="ubah_siswa.php?nisn=<?=$data_siswa['nisn']?>" class="btn btn-info">Ubah</a> | 
                <a href="hapus_siswa.php?nisn=<?=$data_siswa['nisn']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
    <a href="tambah_siswa.php" class="btn btn-warning">Tambah Siswa</a>
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