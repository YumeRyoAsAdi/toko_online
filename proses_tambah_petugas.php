<?php
if($_POST){
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    if(empty($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"INSERT INTO petugas(`nama_petugas`, `username`, `password`, `level`) VALUE ('".$nama."','".$username."','".md5($password)."','".$id_kelas."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses registrasi petugas');location.href='tambah_petugas.php';</script>";
            header('Location: login.php'); 
        exit;
        } else {
            echo "<script>alert('Gagal registrasi petugas');location.href='tambah_petugas.php';</script>";
        }
    }
}
?>
