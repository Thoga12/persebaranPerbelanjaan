<?php 
    include 'conection.php';
    // Mengambil data dari tabel users
    $sql = "SELECT * FROM vocation_spots";
    $result = $conn->query($sql);

    $users = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    // Mengembalikan data dalam format JSON
    echo json_encode($users);
?>