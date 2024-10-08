<?php
include "koneksi.php"; // Include the database connection file
include "header.php"; // Include the header

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    
    // Execute the delete query
    $qry_produk = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id_produk'");
    
    if ($qry_produk) {
        echo "<script>alert('Product deleted successfully!'); location.href='list_barang.php';</script>";
    } else {
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('No product ID provided!'); location.href='list_barang.php';</script>";
}
?>
