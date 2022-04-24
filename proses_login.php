<?php 
session_start(); 
$conn = mysqli_connect('localhost','root','','project_spp'); 
$username = stripslashes($_POST['username']); 
$password = md5($_POST['password']); 
$query = "SELECT * FROM petugas where username='$username' AND password='$password'"; 
$row = mysqli_query($conn,$query); 
$data = mysqli_fetch_array($row);  
$cek = mysqli_num_rows($row);
$query1 = "SELECT * FROM siswa where username='$username' AND password='$password'"; 
$row1 = mysqli_query($conn,$query1); 
$data1 = mysqli_fetch_array($row1);  
$cek1 = mysqli_num_rows($row1);

if($cek > 0){
    if($data['level']== 'admin'){ 
        $_SESSION['level']='admin'; 
        $_SESSION['username'] = $data['username']; 
        $_SESSION['id_petugas'] = $data['id_petugas']; 
        $_SESSION['nama_petugas']=$data['nama_petugas'];
        header('location: admin/index.php'); 
    }else if($data['level'] =='petugas'){
        $_SESSION['level']='petugas';
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_petugas']= $data['id_petugas']; 
        $_SESSION['nama_petugas']=$data['nama_petugas'];
        header('location: petugas/index.php'); 
    }
    }if($cek > 0){
        if($data1['level']== 'siswa'){ 
            $_SESSION['level'] ='siswa';
            $_SESSION['username'] = $data1['username'];
            $_SESSION ['nisn'] = $data1['nisn'] ;
            $_SESSION['nama']=$data1['nama'];
            header('location: siswa/index.php');} 
    }else{
        $msg = 'Username Atau Password Salah';
        echo '<script>alert("'.$msg.'");location.href="index.php"</script>';
         }
?>