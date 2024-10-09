<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $id =  intval(trim($_POST['id']));
    $nama_produk = trim($_POST['nama_produk']);
    $harga_produk = trim($_POST['harga_produk']);
    $deskripsi = trim($_POST['deskripsi']);
    $stok = trim($_POST['stok']);
    
    $sql = "INSERT INTO `tbproduk`(`id`, `nama_produk`, `harga_produk`, `deskripsi`, `stok`) VALUES (?, ?, ?, ?, ?)";

    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("issss", $id, $nama_produk, $harga_produk, $deskripsi, $stok);

        if ($stmt->execute()){
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }else{
        echo "Error preparing statment: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h2>Create</h2>
    <form method="POST" action="create.php">
        Id: <input type="text" name="id" required><br></br>
        Nama produk: <input type="text" name="nama_produk" required><br></br>
        Harga produk: <input type="text" name="harga_produk" required><br></br>
        Deskripsi: <input type="text" name="deskripsi" required><br></br>
        Stok: <input type="text" name="stok" required><br></br>
    <input type="submit" value="Create">
    </form>
    <a href="index.php">Back Home</a>
</body>
</html>