<?php 
include "header_pelanggan.php";
include "koneksi.php"; // Include the database connection

// Fetch the products from the database
$qry_produk = mysqli_query($conn, "SELECT * FROM produk");
?>

<h2>List Produk</h2>
<div class="row">
    <?php while ($dt_produk = mysqli_fetch_array($qry_produk)) { 
        // Ambil nama gambar dan buat path
        $foto_produk = $dt_produk['foto_produk'];
        $path_gambar = "assets/foto_produk/" . $foto_produk;

        // Cek apakah gambar ada
        if (!file_exists($path_gambar)) {
            echo "<p>Gambar tidak ditemukan untuk produk: " . $dt_produk['nama_produk'] . " - " . $foto_produk . "</p>";
            continue; // Skip to the next product if the image is not found
        }
    ?>
        <div class="col-md-3">
            <div class="card">
                <img src="<?= $path_gambar ?>" class="card-img-top" alt="<?= $dt_produk['nama_produk'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $dt_produk['nama_produk'] ?></h5>
                    <p class="card-text"><?= substr($dt_produk['deskripsi'], 0, 20) ?></p>
                    <p class="card-text">Harga: <?= number_format($dt_produk['harga'], 2) ?> IDR</p>
                    <form action="keranjang.php" method="post">
                        <input type="hidden" name="id_produk" value="<?= $dt_produk['id_produk'] ?>">
                        <input type="hidden" name="nama_produk" value="<?= $dt_produk['nama_produk'] ?>">
                        <input type="hidden" name="harga" value="<?= $dt_produk['harga'] ?>">
                        <button type="submit" class="btn btn-primary">Beli</button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php include "footer.php"; ?>
