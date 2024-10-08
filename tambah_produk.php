<?php
// Include the database connection file
include 'koneksi.php'; 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $nama_produk = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Handle the file upload
    $foto_produk = $_FILES['foto_produk']['name'];
    $target_dir = "assets/foto_produk/";
    $target_file = $target_dir . basename($_FILES["foto_produk"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the 'uploads/' directory exists, if not, create it
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Check if the uploaded file is an actual image
    $check = getimagesize($_FILES["foto_produk"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }   

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload the file
    } else {
        if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
            // File uploaded successfully
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert the data into the database
    $sql = "INSERT INTO produk (nama_produk, deskripsi, harga, foto_produk) VALUES ('$nama_produk', '$deskripsi', '$harga', '$foto_produk')";
    
    if (mysqli_query($conn, $sql)) {
        // Redirect to list_barang.php after successful insertion
        header('Location: list_barang.php');
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Tambah Produk Baru</h2>
        <form action="tambah_produk.php" method="post" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" id="harga" name="harga" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="foto_produk" class="form-label">Foto Produk:</label>
                <input type="file" id="foto_produk" name="foto_produk" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
