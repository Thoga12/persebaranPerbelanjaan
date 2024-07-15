<?php
include '../database/conection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM vocation_spots WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Lokasi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <header>
        <?php include '../partials/sidebar.html'; ?>
    </header>
    <main class="w-full py-3 px-3">
        <section class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-auto h-100">
            <h2 class="text-2xl font-bold mb-6 text-center">Update Lokasi</h2>
            <form action="../database/edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Nama Tempat</label>
                    <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($row['nama']); ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="lat" class="block text-gray-700 text-sm font-bold mb-2">Lat</label>
                    <input type="number" name="lat" id="lat" step="0.000001" min="-90" max="90" value="<?php echo htmlspecialchars($row['lat']); ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="lon" class="block text-gray-700 text-sm font-bold mb-2">Lon</label>
                    <input type="number" name="lon" id="lon" step="0.000001" min="-180" max="180" value="<?php echo htmlspecialchars($row['lon']); ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Lokasi</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>

<?php $stmt->close(); $conn->close(); ?>
