<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi</title>
    <link rel="stylesheet" href="../public/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- <div class="flex w-50"> -->
        <!-- <aside class="w-64 bg-white shadow-md flex-fill"> -->
            <?php include '../partials/sidebar.html' ?>
        <!-- </aside> -->
        <div class="flex-1">
            <header class="bg-white shadow p-4">
                <h1 class="text-xl font-bold">Tambah Lokasi</h1>
            </header>
            <main class="p-6">
                <section class="bg-white p-6 rounded shadow-md">
                    <form action="../database/insert.php" method="post" class="space-y-4">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Nama Tempat</label>
                            <input type="text" name="title" id="title" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="lat" class="block text-sm font-medium text-gray-700">Lat</label>
                            <input type="number" name="lat" id="lat" step="0.000001" min="-190" max="190" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="lon" class="block text-sm font-medium text-gray-700">Lon</label>
                            <input type="number" name="lon" id="lon" step="0.000001" min="-180" max="180" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Tambah Lokasi</button>
                    </form>
                </section>
                <?php
                if (isset($_GET['message'])) {
                    echo "<p class='mt-4 text-green-600'>".htmlspecialchars($_GET['message'])."</p>";
                }
                ?>
            </main>
        </div>
    <!-- </div> -->
</body>
</html>
