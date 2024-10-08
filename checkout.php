<?php 
session_start();
include "koneksi.php"; // Include database connection

// Check if the cart is not empty
if (empty($_SESSION['cart'])) {
    echo "Keranjang Anda kosong.";
    exit;
}

// Assuming you have the customer's ID in the session
$id_pelanggan = $_SESSION['id_pelanggan']; // Customer ID from session

// Check if id_petugas is set, otherwise set to NULL
$id_petugas = isset($_SESSION['id_petugas']) ? $_SESSION['id_petugas'] : NULL;

// Insert transaction into the transaksi table
$qry_transaksi = mysqli_query($conn, "INSERT INTO transaksi (id_pelanggan, id_petugas, tgl_transaksi) VALUES ('$id_pelanggan', $id_petugas, NOW())");

if ($qry_transaksi) {
    // Get the last inserted transaction ID
    $id_transaksi = mysqli_insert_id($conn);

    // Loop through the cart to insert each product into the detail_transaksi table
    foreach ($_SESSION['cart'] as $key_produk => $val_produk) {
        $id_produk = $val_produk['id_produk']; // Assuming you store product ID in the cart
        $qty = $val_produk['qty'];
        
        // Insert product details into detail_transaksi
        mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_produk, qty) VALUES ('$id_transaksi', '$id_produk', '$qty')");
    }

    // Clear the cart after checkout
    unset($_SESSION['cart']);

    // Redirect to the purchase history page
    header("Location: histori_pembelian.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
