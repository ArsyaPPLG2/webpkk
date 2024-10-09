
<?php
include 'koneksi.php';

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nama_produk, harga_produk, deskripsi, stok FROM tbproduk";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Read</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h2>Read</h2>
    
    <?php
    if ($result === FALSE) {
        echo "Error: " . $conn->error;
    } elseif ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Id</th><th>Nama produk</th><th>Harga</th><th>Deskripsi</th><th>stok</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nama_produk"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["harga_produk"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["deskripsi"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["stok"]) . "</td>";
            echo "<td>";
            echo "<a href='update.php?nama=" . urlencode($row["id"]) . "'>Update</a> ";
            echo "<a href='delete.php?nama=" . urlencode($row["id"]) . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <a href="index.php">Back to Home</a>
</body>
</html>
