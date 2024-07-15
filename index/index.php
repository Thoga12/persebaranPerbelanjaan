<?php 
    include '../database/conection.php';

    $sql = "SELECT * FROM vocation_spots";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../public/style.css">
     <!-- Make sure you put this AFTER Leaflet's CSS -->   
    <?php
     session_start();
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../user/login.php");
            exit();
        }
    ?>
</head>
    <body>
        <?php include '../partials/sidebar.html'; ?>
        <?php //include 'header.html'; ?>

        <div id="map"></div>
    </body>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script>
        var osmUrl = 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            osm = L.tileLayer(osmUrl, {maxZoom: 18, attribution: osmAttrib});
   
        var map = L.map('map').setView([-3.9973, 122.5120], 9).addLayer(osm);
        // -3.968553030723469, 122.51384272173776

        var customIcon = L.icon({
            iconUrl: '../images/minimarket.png', // Ganti dengan path ikon Anda
            iconSize: [25, 41], // Ukuran ikon
            iconAnchor: [12, 41], // Titik jangkar ikon (posisi bayangan)
            popupAnchor: [1, -34] // Titik jangkar untuk popup, relatif terhadap ikon
        });
        fetch('../database/read.php')
            .then(response => response.json())
            .then(locations => {
                // Tambahkan marker untuk setiap lokasi
                locations.forEach(location => {
                    var marker = L.marker([location.lat, location.lon], { icon: customIcon }).addTo(map)
                        .bindPopup(`<div class="popup-content"><strong>${location.nama}</strong><span style="margin-left: 10px; cursor:pointer;"><i class="bi bi-pencil-fill"></sapn></i></div>`)
                        .openPopup();
                        // Tambahkan tooltip untuk menampilkan nama lokasi
                    marker.bindTooltip(location.nama, { permanent: true, direction: 'right' }).openTooltip();
                });
            })
            .catch(error => console.error('Error loading the locations:', error));
            
        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);
        // L.marker([-3.9786194144437212, 122.54444214987733])
        //     .addTo(map)
        //     .bindPopup('Al-Alam Mosque<br />Masjid Al-Alam')
        //     .openPopup();
        // L.marker([-4.04512596009356, 122.57677315545465])
        //     .addTo(map)
        //     .bindPopup('Kebun Raya Kendari<br />Botanical garden')
        //     .openPopup();
    </script>
    
</html>
<!-- <!doctype html>
<html> -->
<!-- <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
</body>
</html> -->