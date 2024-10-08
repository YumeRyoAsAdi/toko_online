<?php 
session_start(); // Start the session

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = []; 
}

// Include the header for the customer view
include "header_pelanggan.php"; 

// Check if a product is being added to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve product details from POST request
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;

    // Add to cart logic
    if (isset($_SESSION['cart'][$id_produk])) {
        $_SESSION['cart'][$id_produk]['qty'] += $qty; // Update quantity if product exists
    } else {
        $_SESSION['cart'][$id_produk] = [
            'nama_produk' => $nama_produk,
            'harga' => $harga,
            'qty' => $qty
        ];
    }

    // Redirect to avoid form resubmission
    header("Location: keranjang.php"); // Redirect to the same page to show updated cart
    exit();
}
?>

<h2>Daftar Produk di Keranjang</h2>

<?php if (!empty($_SESSION['cart'])): ?> 
    <table class="table table-hover striped">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $key_produk => $val_produk): ?>
                <tr>
                    <td><?= ($key_produk + 1) ?></td>
                    <td><?= $val_produk['nama_produk'] ?></td>
                    <td><?= $val_produk['qty'] ?></td>
                    <td><a href="hapus_cart.php?id=<?= $key_produk ?>" class="btn btn-danger"><strong>X</strong></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="checkout.php" class="btn btn-primary">Check Out</a>
<?php else: ?>
    <p>Keranjang Anda kosong.</p> 
<?php endif; ?>

<?php 
include "footer.php"; // Include the footer
?>
