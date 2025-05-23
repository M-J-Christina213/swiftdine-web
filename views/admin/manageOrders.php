<?php
// DB connection
$conn = new mysqli('localhost', 'username', 'password', 'swift_dine_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT orders.id, orders.user_id, orders.restaurant_id, orders.total_price, orders.status, orders.created_at,
        users.name AS user_name, restaurants.name AS restaurant_name
        FROM orders
        LEFT JOIN users ON orders.user_id = users.id
        LEFT JOIN restaurants ON orders.restaurant_id = restaurants.id
        ORDER BY orders.created_at DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Orders - SwiftDine Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex font-sans text-gray-900 min-h-screen">

  <!-- Sidebar Include -->
  <?php include('../components/sidebar.php'); ?>

  <!-- Main Content -->
  <main class="flex-1 bg-white p-10 overflow-auto">
    <div class="flex justify-between items-center mb-10">
      <h1 class="text-3xl font-bold">Manage Orders</h1>
      <a href="logout.php" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
        Logout
      </a>
    </div>

    <table class="w-full border border-gray-300 rounded-lg overflow-hidden text-left">
      <thead class="bg-orange-100 text-orange-800 font-semibold">
        <tr>
          <th class="p-3 border-b border-orange-300">Order ID</th>
          <th class="p-3 border-b border-orange-300">User</th>
          <th class="p-3 border-b border-orange-300">Restaurant</th>
          <th class="p-3 border-b border-orange-300">Total Price ($)</th>
          <th class="p-3 border-b border-orange-300">Status</th>
          <th class="p-3 border-b border-orange-300">Created At</th>
          <th class="p-3 border-b border-orange-300">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr class="hover:bg-orange-50">
              <td class="p-3 border-b border-gray-200"><?php echo htmlspecialchars($row['id']); ?></td>
              <td class="p-3 border-b border-gray-200"><?php echo htmlspecialchars($row['user_name'] ?? 'Unknown'); ?></td>
              <td class="p-3 border-b border-gray-200"><?php echo htmlspecialchars($row['restaurant_name'] ?? 'Unknown'); ?></td>
              <td class="p-3 border-b border-gray-200"><?php echo number_format($row['total_price'], 2); ?></td>
              <td class="p-3 border-b border-gray-200">
                <span class="<?php 
                  echo $row['status'] === 'completed' ? 'text-green-600 font-semibold' : 
                       ($row['status'] === 'pending' ? 'text-yellow-600 font-semibold' : 'text-gray-600'); ?>">
                  <?php echo htmlspecialchars(ucfirst($row['status'])); ?>
                </span>
              </td>
              <td class="p-3 border-b border-gray-200"><?php echo htmlspecialchars($row['created_at']); ?></td>
              <td class="p-3 border-b border-gray-200 space-x-2">
                <a href="editOrder.php?id=<?php echo $row['id']; ?>" 
                   class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                <a href="deleteOrder.php?id=<?php echo $row['id']; ?>" 
                   onclick="return confirm('Are you sure you want to delete this order?');"
                   class="text-red-600 hover:text-red-800 font-semibold">Delete</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="7" class="p-4 text-center text-gray-500">No orders found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </main>

</body>
</html>

<?php $conn->close(); ?>
