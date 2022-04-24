<?php
    if($_POST) {
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        if(empty($username)){
            echo"<script>alert('Username tidak boleh kosong');location.href='index_login_siswa.php';</script>";
        }elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='index_login_siswa.php';</script>";
        }else{
            include "koneksi.php";
            $qry_siswa=mysqli_query($conn, "select * from siswa where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_siswa)>0){
                $dt_siswa=mysqli_fetch_array($qry_siswa);
                session_start();
                $_SESSION['nisn']=$dt_siswa['nisn'];
                $_SESSION['username']=$dt_siswa['username'];
                header("location: siswa/index.php");
            }else{
                echo "<script>alert('Username dan Password tidak benar');location.href='index_login_siswa.php';</script>";
            }
        }
    }
    ?>