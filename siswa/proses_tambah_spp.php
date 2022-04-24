<?php
if($_POST){
    $angkatan = $_POST['angkatan'];
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    
    if(empty($angkatan)){
        echo "<script> alert ('nama spp tidak boleh kosong'); location.href = 'tambah_spp.php';</script>";
    } elseif (empty($nominal)){
        echo "<script> alert ('nominal tidak boleh kosong'); location.href = 'tambah_spp.php';</script>";
    } else {
        include "koneksi.php";
        $insert = mysqli_query($conn, "insert into spp ( angkatan, tahun, nominal) value('".$angkatan."', '".$tahun."', '".$nominal."')") or die(mysqli_error($conn));
        if ($insert){
            echo "<script> alert ('Sukses menambahkan spp'); location.href = 'tampil_spp.php';</script>";
        } else {
            echo "<script> alert ('Gagal menambahkan spp'); location.href = 'tambah_spp.php';</script>";
        }
    }
}
?>