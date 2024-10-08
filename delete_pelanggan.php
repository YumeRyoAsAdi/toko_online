<?php
include "koneksi.php"; // Include the database connection

if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];

    // Delete query
    $qry_delete = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");

    if ($qry_delete) {
        echo "<script>alert('Customer deleted successfully!'); location.href='tampil_pelanggan.php';</script>";
    } else {
        echo "Error deleting customer: " . mysqli_error($conn);
    }
} else {
    echo "No customer ID provided!";
}
?>
