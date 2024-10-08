<?php 
include "header_pelanggan.php"; 
?>
<h2>Histori Pembelian</h2>
<table class="table table-hover table-striped">
    <thead>
        <th>NO</th><th>Tanggal Beli</th><th>Nama Produk</th>
    </thead>
    <tbody>
        <?php 
        include "koneksi.php";
        $id_pelanggan = $_SESSION['id_pelanggan']; // Assuming you store the customer's ID in the session
        $qry_histori = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_pelanggan = '$id_pelanggan' ORDER BY id_transaksi DESC");
        $no = 0;
        while ($dt_histori = mysqli_fetch_array($qry_histori)) {
            $no++;
            // Display the products bought
            $produk_dibeli = "<ol>";
            $qry_produk = mysqli_query($conn, "SELECT * FROM detail_transaksi JOIN produk ON produk.id_produk = detail_transaksi.id_produk WHERE id_transaksi = '".$dt_histori['id_transaksi']."'");
            while ($dt_produk = mysqli_fetch_array($qry_produk)) {
                $produk_dibeli .= "<li>" . $dt_produk['nama_produk'] . " (Jumlah: " . $dt_produk['qty'] . ")</li>";
            }
            $produk_dibeli .= "</ol>";
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $dt_histori['tgl_transaksi'] ?></td>
                <td><?= $produk_dibeli ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php 
include "footer.php"; 
?>
