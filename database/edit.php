<?php
include '../database/conection.php';

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['title'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];

// Menyiapkan dan mengeksekusi query SQL
$sql = "UPDATE vocation_spots SET nama = ?, lat = ?, lon = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssi", $nama, $lat, $lon, $id);
    if ($stmt->execute()) {
        $message = "Data berhasil diupdate";
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
