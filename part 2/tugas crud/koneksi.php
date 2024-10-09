<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pengelolaan_produk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $sql = "UPDATE tbproduk SET nama_produk=?, harga_produk=?, deskripsi=?, stok=? WHERE id=?";

// if ($conn->query($sql) === TRUE) {
//   echo "Record updated successfully";
// } else {
//   echo "Error updating record: " . $conn->error;
// }

// $sql = "DELETE FROM `tbproduk` WHERE id=";

// if ($conn->query($sql) === TRUE) {
//   echo "Record deleted successfully";
// } else {
//   echo "Error deleting record: " . $conn->error;
// }
?>