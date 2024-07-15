<?php
include 'conection.php';

// Mulai sesi
session_start();

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Menyiapkan dan mengeksekusi query SQL untuk mendapatkan data pengguna
$sql = "SELECT id, username, pas FROM user WHERE username = ?";
echo($sql);
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Password cocok, set sesi
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;

            // Redirect ke halaman dashboard atau halaman lain
            header("Location: ../index/index.php");
            exit();
        } else {
            // Password salah
            $error = "Password salah.";
            header("Location: login.php?error=" . urlencode($error));
            exit();
        }
    } else {
        // Username tidak ditemukan
        $error = "Username tidak ditemukan.";
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }

    $stmt->close();
} else {
    $error = "Error: " . $conn->error;
    header("Location: login.php?error=" . urlencode($error));
    exit();
}

$conn->close();
?>
