<!-- manageRestaurants.php -->
<?php
//ini_set('display_errors', 1);
error_reporting(E_ALL);
// Connect to DB (replace with your own connection)
$conn = new mysqli("localhost", "root", "", "swiftdine", port: 3307);

// Fetch restaurants
$result = $conn->query("SELECT * FROM restaurants");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Restaurants - SwiftDine</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex">

  <?php include('../components/sidebar.php'); ?>

  <main class="flex-1 p-10 bg-white overflow-x-auto">
    <h1 class="text-3xl font-bold mb-6 text-orange-600">🍽 Manage Restaurants</h1>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow">
      <thead class="bg-orange-100 text-orange-700">
        <tr>
          <th class="px-4 py-3 text-left">ID</th>
          <th class="px-4 py-3 text-left">Name</th>
          <th class="px-4 py-3 text-left">Location</th>
          <th class="px-4 py-3 text-left">Cuisine</th>
          <th class="px-4 py-3 text-left">Rating</th>
          <th class="px-4 py-3 text-left">Owner</th>
          <th class="px-4 py-3 text-left">Created At</th>
          <th class="px-4 py-3 text-left">Actions</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3"><?php echo $row['id']; ?></td>
            <td class="px-4 py-3"><?php echo $row['name']; ?></td>
            <td class="px-4 py-3"><?php echo $row['location']; ?></td>
            <td class="px-4 py-3"><?php echo $row['cuisine']; ?></td>
            <td class="px-4 py-3"><?php echo $row['rating']; ?></td>
            <td class="px-4 py-3"><?php echo $row['owner_id']; ?></td>
            <td class="px-4 py-3"><?php echo $row['created_at']; ?></td>
            <td class="px-4 py-3">
              <a href="editRestaurant.php?id=<?php echo $row['id']; ?>" class="text-blue-500 hover:underline">Edit</a> |
              <a href="deleteRestaurant.php?id=<?php echo $row['id']; ?>" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </main>
</body>
</html>
