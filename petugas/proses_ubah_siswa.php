<?php
if($_POST){
    $nisn=$_POST['nisn'];
    $nis=$_POST['nis'];
    $nama=$_POST['nama'];
    $id_kelas=$_POST['id_kelas'];
    $alamat=$_POST['alamat'];
    $no_tlp=$_POST['no_tlp'];


        include "koneksi.php";
        $update=mysqli_query($conn,"update siswa set nama='".$nama."',id_kelas='".$id_kelas."', alamat='".$alamat."', alamat='".$alamat."', no_tlp='".$no_tlp."' where nisn = '".$nisn."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='tampil_siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?nisn=".$nisn."';</script>";
            }
        }  

?>