<?php
include("koneksi.php");
if(isset($_POST['simpan'])){
    $id_petugas = $_POST['id_petugas'];
    $username = $_POST['username'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $sql = "UPDATE petugas SET username='$username', nama_petugas='$nama_petugas', level='$level' WHERE id_petugas=$id_petugas";
    $query = mysqli_query($conn, $sql);

    if($query){
        header('Location: tampil_petugas.php');
    }else{
        die("Gagal menyimpan perubahan");
    }
}
?>