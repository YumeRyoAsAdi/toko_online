<?php 
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
    } else {
        include "koneksi.php";

        // Run the query and check for errors
        $qry_login = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' AND password = '" . md5($password) . "'");
        
        // Check if the query failed
        if (!$qry_login) {
            echo "Error: " . mysqli_error($conn); // Display SQL error
            exit;
        }

        // Now proceed if the query was successful
        if (mysqli_num_rows($qry_login) > 0) {
            $dt_login = mysqli_fetch_array($qry_login);
            session_start();
            $_SESSION['id_petugas'] = $dt_login['id_petugas'];
            $_SESSION['nama_petugas'] = $dt_login['nama_petugas'];
            $_SESSION['status_login'] = true;
            header("location: home.php");
        } else {
            echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
        }
    }
}
?>
