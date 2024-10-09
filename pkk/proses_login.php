<?php
session_start();


$conn = new mysqli('localhost', 'root', '', 'tokookyu');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();


        if (password_verify($password, $hashed_password)) {

            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;


            header("Location: home.php");
            exit();
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak terdaftar.";
    }


    $stmt->close();
    $conn->close();
} else {
    echo "Semua kolom harus diisi.";
}
?>
