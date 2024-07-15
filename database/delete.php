<?php
include '../database/conection.php';

$id = $_GET['id'];

// Menyiapkan dan mengeksekusi query SQL
$sql = "DELETE FROM vocation_spots WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = "Data berhasil dihapus";
        header("Location: ../index/data.php?message=" . urlencode($message));
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
