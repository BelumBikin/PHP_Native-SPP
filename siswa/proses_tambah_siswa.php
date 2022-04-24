<?php
if($_POST){
    $nisn=$_POST['nisn'];
    $nis=$_POST['nis'];
    $nama=$_POST['nama'];
    $id_kelas=$_POST['id_kelas'];
    $alamat=$_POST['alamat'];
    $no_tlp=$_POST['no_tlp'];
    $username=$_POST['username'];
    $password=$_POST['password'];

        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into siswa (nisn, nis, nama, id_kelas, alamat, no_tlp, username, password) value ('".$nisn."','".$nis."','".$nama."','".$id_kelas."','".$alamat."','".$no_tlp."','".$username."','".md5($password)."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan siswa');location.href='tampil_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan siswa');location.href='tambah_siswa.php';</script>";
        }
    }

?>