<?php 
    include 'conection.php';
    
    
    // Ambil data dari form
    $nama = $_POST['title'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];

    // Menyiapkan dan mengeksekusi query SQL
    $sql = "INSERT INTO vocation_spots (nama, lat, lon) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $nama, $lat, $lon); 
        if ($stmt->execute()) {
            $message = "Data berhasil disimpan";
            header("Location: ../create_locations/create.php?message=" . urlencode($message));
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