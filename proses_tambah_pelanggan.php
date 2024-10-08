<?php
if ($_POST) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    
    if (empty($nama)) {
        echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('Alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif (empty($telp)) {
        echo "<script>alert('Nomor telepon tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else {
        include "koneksi.php";
        $insert = mysqli_query($conn, "INSERT INTO pelanggan (nama, alamat, telp) VALUES ('".$nama."', '".$alamat."', '".$telp."')");
        
        if ($insert) {
            // Redirect to login page after successful registration
            echo "<script>alert('Sukses registrasi pelanggan');location.href='login_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal registrasi pelanggan');location.href='tambah_pelanggan.php';</script>";
        }
    }
}
?>
