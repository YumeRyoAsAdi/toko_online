<?php
include "koneksi.php"; // Include the database connection
include "header.php"; // Include the header

// Fetch pelanggan data from the database
$qry_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
?>

<h2>List Pelanggan</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($dt_pelanggan = mysqli_fetch_array($qry_pelanggan)) { ?>
        <tr>
            <td><?= $dt_pelanggan['id_pelanggan'] ?></td>
            <td><?= $dt_pelanggan['nama'] ?></td>
            <td><?= $dt_pelanggan['alamat'] ?></td>
            <td><?= $dt_pelanggan['telp'] ?></td>
            <td>
                <a href="edit_pelanggan.php?id_pelanggan=<?= $dt_pelanggan['id_pelanggan'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_pelanggan.php?id_pelanggan=<?= $dt_pelanggan['id_pelanggan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "footer.php"; // Include the footer ?>
