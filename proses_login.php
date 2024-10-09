<?php
session_start();

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'tokookyu');

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek jika data dikirim
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Siapkan dan bind
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    // Cek apakah pengguna ditemukan
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Jika berhasil login, simpan informasi pengguna di session
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $id;

            // Arahkan ke halaman home setelah login berhasil
            header("Location: home.php");
            exit();
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak terdaftar.";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    echo "Semua kolom harus diisi.";
}
?>
