<?php
   
    session_start();
    
    include "koneksi.php";
    $id_petugas = $_SESSION['id_petugas'];
    $nisn = $_POST['nisn'];
    $bulan = $_POST['bulan_spp'];
    $tahun = $_POST['tahun_spp'];
    $tgl_bayar = date('Y-m-d');
    $cek = mysqli_query($koneksi,"select * from pembayaran where nisn='".$nisn."' and bulan_spp = '".$bulan."'");
    $input = mysqli_query($koneksi,"INSERT INTO pembayaran(id_petugas, nisn, tgl_bayar, bulan_spp, tahun_spp) VALUES ('".$id_petugas."','".$nisn."','".$tgl_bayar."','".$bulan."','".$tahun."')");

    if(mysqli_num_rows($cek) < 1 ){
    } elseif($input){
        echo "<script>alert('masuk'); location.href='history_pembayaran.php'</script>";
    } elseif(mysqli_num_rows($cek) > 0){
        echo "<script>alert('sudah ada); location.href='history_pembayaran.php'</script>";
    }

?>