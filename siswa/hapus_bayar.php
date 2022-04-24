<?php 
    if($_GET['id_pembayaran']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi,"delete from pembayaran where id_pembayaran='".$_GET['id_pembayaran']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus data pembayaran');location.href='history_pembayaran.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data pembayaran');location.href='history_pembayaran.php';</script>";
        }
    }
?>