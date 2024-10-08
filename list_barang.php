<?php 
include "header.php";
?>
<h2>List Produk</h2>
<div class="row">
    <?php 
    include "koneksi.php";
    $qry_produk = mysqli_query($conn, "SELECT * FROM produk");
    while ($dt_produk = mysqli_fetch_array($qry_produk)) {
        // Ambil nama gambar dan buat path
        $foto_produk = $dt_produk['foto_produk'];
        $path_gambar = "assets/foto_produk/" . $foto_produk;

        // Cek apakah gambar ada
        if (!file_exists($path_gambar)) {
            echo "<p>Gambar tidak ditemukan untuk produk: " . $dt_produk['nama_produk'] . " - " . $foto_produk . "</p>";
        }
        ?>
        <div class="col-md-3">
            <div class="card">
              <img src="<?= $path_gambar ?>" class="card-img-top" alt="<?= $dt_produk['nama_produk'] ?>">
              <div class="card-body">
                <h5 class="card-title"><?= $dt_produk['nama_produk'] ?></h5>
                <p class="card-text"><?= substr($dt_produk['deskripsi'], 0, 20) ?></p>
                <?php if (isset($_SESSION['status_login']) && $_SESSION['status_login'] == true) { ?>
                  <a href="edit_produk.php?id_produk=<?= $dt_produk['id_produk'] ?>" class="btn btn-warning">Edit</a>
                  <a href="hapus_produk.php?id_produk=<?= $dt_produk['id_produk'] ?>" class="btn btn-danger">Hapus</a>
                <?php } ?>
              </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<a href="tambah_produk.php" class="btn btn-primary">Tambah Produk</a>
<?php 
include "footer.php";
?>
