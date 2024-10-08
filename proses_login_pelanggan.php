<?php
session_start();
include "koneksi.php";

if ($_POST) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];

    $qry = mysqli_query($conn, "SELECT * FROM pelanggan WHERE nama='$nama' AND telp='$telp'");
    if (mysqli_num_rows($qry) > 0) {
        $data = mysqli_fetch_array($qry);
        $_SESSION['status_login'] = true;
        $_SESSION['id_pelanggan'] = $data['id_pelanggan']; // Simpan id pelanggan di session
        $_SESSION['nama'] = $data['nama']; // Simpan nama pelanggan di session
        
        header('location: home_pelanggan.php'); // Arahkan ke halaman home pelanggan
        exit();
    } else {
        echo "<script>alert('Nama atau nomor telepon salah');location.href='login_pelanggan.php';</script>";
    }
}
?>
