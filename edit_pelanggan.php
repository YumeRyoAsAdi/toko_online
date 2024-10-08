<?php
include "koneksi.php"; // Include the database connection
include "header.php"; // Include the header

if (isset($_GET['id_pelanggan'])) {
    $id_pelanggan = $_GET['id_pelanggan'];

    // Fetch the customer details
    $qry_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
    $dt_pelanggan = mysqli_fetch_array($qry_pelanggan);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    // Update query
    $qry_update = mysqli_query($conn, "UPDATE pelanggan SET nama = '$nama', alamat = '$alamat', telp = '$telp' WHERE id_pelanggan = '$id_pelanggan'");

    if ($qry_update) {
        echo "<script>alert('Customer updated successfully!'); location.href='tampil_pelanggan.php';</script>";
    } else {
        echo "Error updating customer: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Pelanggan</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?= $dt_pelanggan['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control" required><?= $dt_pelanggan['alamat'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telepon:</label>
                <input type="text" id="telp" name="telp" class="form-control" value="<?= $dt_pelanggan['telp'] ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update Pelanggan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
