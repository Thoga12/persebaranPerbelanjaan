<?php
include 'conection.php';

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Hash password sebelum disimpan ke database
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Menyiapkan dan mengeksekusi query SQL
$sql = "INSERT INTO user (username, pas) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $username, $hashed_password);
    if ($stmt->execute()) {
        $message = "Registrasi berhasil";
        header("Location: ../user/login.php?message=" . urlencode($message));
        exit();
    } else {
        $error = "Error: " . $stmt->error;
        header("Location: ../user/register.php?error=" . urlencode($error));
        exit();
    }
    $stmt->close();
} else {
    $error = "Error: " . $conn->error;
    header("Location: register.html?error=" . urlencode($error));
    exit();
}

$conn->close();
?>
