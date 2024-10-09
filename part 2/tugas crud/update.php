<?php
include 'koneksi.php';

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle GET request
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = intval(trim($_POST['id']));
    $sql = "SELECT * FROM tbproduk WHERE id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === FALSE) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Record not found");
    }
    $stmt->close();
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id =  intval(trim($_POST['id']));
    $nama_produk = trim($_POST['nama_produk']);
    $harga_produk = trim($_POST['harga_produk']);
    $deskripsi = trim($_POST['deskripsi']);
    $stok = trim($_POST['stok']);

    $sql = "UPDATE tbproduk SET nama_produk=?, harga_produk=?, deskripsi=?, stok=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === FALSE) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ssss", $nama_produk, $harga_produk, $deskripsi, $stok);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
</head>
<body>
    <h2>Update</h2>
    <form method="POST" action="update.php">
        <input type="hidden" name="nama_produk" value="<?php echo htmlspecialchars($row['nama_produk']); ?>">
        Nama produk: <input type="text" name="nama_produk" value="<?php echo htmlspecialchars($row['nama_produk']); ?>" required><br><br>
        Harga produk: <input type="text" name="harga_produk" value="<?php echo htmlspecialchars($row['harga_produk']); ?>" required><br><br>
        Deskripsi: <input type="text" name="deskripsi" value="<?php echo htmlspecialchars($row['deskripsi']); ?>" required><br><br>
        Stok: <input type="text" name="stok" value="<?php echo htmlspecialchars($row['stok']); ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>







<br /><b>Warning</b>:  Undefined variable $row in <b>C:\xampp\htdocs\pkk\part 2\tugas crud\update.php\
</b> on line <b>63</b><br /><br /><b>Warning</b>:  Trying to access array offset on value of type null in 
<b>C:\xampp\htdocs\pkk\part 2\tugas crud\update.php</b> on line <b>63</b><br />