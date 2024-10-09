<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $nama = trim($_GET['nama']);
    $sql = "DELETE FROM `tbproduk` WHERE id=";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete</title>
</head>
<body>
    <h2>Delete</h2>
    <p>Record has been deleted.</p>
    <a href="read.php">Back to Home</a>
</body>
</html>