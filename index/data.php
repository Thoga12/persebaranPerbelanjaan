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
    <title>Daftar Lokasi</title>
    <link rel="stylesheet" href="../public/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Reset CSS */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table th,
        table td {
            padding: 0.75rem;
            text-align: center;
            border-bottom: 1px solid #e2e8f0;
        }
        table th {
            background-color: #edf2f7;
            font-weight: 600;
            text-transform: uppercase;
        }
        table tbody tr:hover {
            background-color: #f7fafc;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header>
        <?php include '../partials/sidebar.html'; ?>
    </header>
    <main class="container mx-auto p-10">
        <h2 class="text-2xl font-bold mb-6">Daftar Lokasi</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden table-fixed">
                <thead>
                    <tr>
                        <th class="w-1/5 py-3 px-5 bg-gray-200 text-gray-600 font-bold uppercase text-sm">ID</th>
                        <th class="w-2/5 py-3 px-5 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Nama</th>
                        <th class="w-2/5 py-3 px-5 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Lat</th>
                        <th class="w-2/5 py-3 px-5 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Lon</th>
                        <th class="w-1/5 py-3 px-5 bg-gray-200 text-gray-600 font-bold uppercase text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="w-1/5 py-3 px-5 border-b border-gray-200"><?php echo htmlspecialchars($row['id']); ?></td>
                            <td class="w-2/5 py-3 px-5 border-b border-gray-200"><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td class="w-2/5 py-3 px-5 border-b border-gray-200"><?php echo htmlspecialchars($row['lat']); ?></td>
                            <td class="w-2/5 py-3 px-5 border-b border-gray-200"><?php echo htmlspecialchars($row['lon']); ?></td>
                            <td class="w-1/5 py-3 px-5 border-b border-gray-200">
                                <a href="../create_locations/edit.php?id=<?php echo $row['id']; ?>" class="text-blue-500 hover:text-blue-700">Update</a>
                                <a href="../database/delete.php?id=<?php echo $row['id']; ?>" class="text-red-500 hover:text-red-700 ml-4" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

<?php $conn->close(); ?>
