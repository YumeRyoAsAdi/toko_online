<?php
include "koneksi.php"; // Include the database connection file
include "header.php"; // Include the header

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    
    // Fetch the product details
    $qry_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
    $dt_produk = mysqli_fetch_array($qry_produk);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga']; // Ensure you collect the updated price if you have a field for it
    $foto_produk = $_FILES['foto_produk']['name']; // Handle file upload if necessary

    // Update query
    $qry_update = mysqli_query($conn, "UPDATE produk SET nama_produk = '$nama_produk', deskripsi = '$deskripsi' WHERE id_produk = '$id_produk'");

    if ($qry_update) {
        echo "<script>alert('Product updated successfully!'); location.href='list_barang.php';</script>";
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Produk</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" value="<?php echo $dt_produk['nama_produk']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" required><?php echo $dt_produk['deskripsi']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" id="harga" name="harga" class="form-control" value="<?php echo $dt_produk['harga']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="foto_produk" class="form-label">Foto Produk:</label>
                <input type="file" id="foto_produk" name="foto_produk" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
