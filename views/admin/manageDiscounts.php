<?php include '../components/sidebarA.php'; ?>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli("localhost", "root", "", "swiftdine", 3307);

// Handle delete
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM deals WHERE id = $id");
    header("Location: manageDiscounts.php");
    exit;
}

// Handle update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_deal'])) {
    $id = intval($_POST['id']);
    $restaurant_id = intval($_POST['restaurant_id']);
    $description = $conn->real_escape_string($_POST['description']);
    $discount = floatval($_POST['discount']);
    $validity = $_POST['validity'];

    $conn->query("UPDATE deals SET restaurant_id = $restaurant_id, description = '$description', discount = $discount, validity = '$validity' WHERE id = $id");
    header("Location: manageDiscounts.php");
    exit;
}

$result = $conn->query("SELECT * FROM deals");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Discounts - SwiftDine</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function showEditRow(id) {
      document.getElementById('display_row_' + id).style.display = 'none';
      document.getElementById('edit_row_' + id).style.display = 'table-row';
    }
    function cancelEdit(id) {
      document.getElementById('edit_row_' + id).style.display = 'none';
      document.getElementById('display_row_' + id).style.display = 'table-row';
    }
  </script>
</head>
<body class="flex">
  <?php include('../components/sidebar.php'); ?>

  <main class="flex-1 p-10 bg-white overflow-x-auto">
    <h1 class="text-3xl font-bold mb-6 text-orange-600">🏷️ Manage Discounts</h1>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow">
      <thead class="bg-orange-100 text-orange-700">
        <tr>
          <th class="px-4 py-3 text-left">ID</th>
          <th class="px-4 py-3 text-left">Restaurant ID</th>
          <th class="px-4 py-3 text-left">Description</th>
          <th class="px-4 py-3 text-left">Discount (%)</th>
          <th class="px-4 py-3 text-left">Validity</th>
          <th class="px-4 py-3 text-left">Created At</th>
          <th class="px-4 py-3 text-left">Actions</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        <?php while ($row = $result->fetch_assoc()): ?>
          <!-- Display Row -->
          <tr id="display_row_<?= $row['id'] ?>" class="border-b hover:bg-gray-50">
            <td class="px-4 py-3"><?= $row['id'] ?></td>
            <td class="px-4 py-3"><?= $row['restaurant_id'] ?></td>
            <td class="px-4 py-3"><?= htmlspecialchars($row['description']) ?></td>
            <td class="px-4 py-3"><?= $row['discount'] ?>%</td>
            <td class="px-4 py-3"><?= $row['validity'] ?></td>
            <td class="px-4 py-3"><?= $row['created_at'] ?></td>
            <td class="px-4 py-3">
              <a href="javascript:void(0)" onclick="showEditRow(<?= $row['id'] ?>)" class="text-blue-500 hover:underline">Edit</a> |
              <a href="?delete_id=<?= $row['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Delete this discount?')">Delete</a>
            </td>
          </tr>

          <!-- Edit Row -->
          <tr id="edit_row_<?= $row['id'] ?>" class="border-b" style="display: none;">
            <form method="post" action="manageDiscounts.php">
              <td class="p-2"><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
              <td class="p-2"><input type="number" name="restaurant_id" value="<?= $row['restaurant_id'] ?>" class="border rounded px-2 py-1 w-full"></td>
              <td class="p-2"><input type="text" name="description" value="<?= htmlspecialchars($row['description']) ?>" class="border rounded px-2 py-1 w-full"></td>
              <td class="p-2"><input type="number" name="discount" step="0.01" value="<?= $row['discount'] ?>" class="border rounded px-2 py-1 w-full"></td>
              <td class="p-2"><input type="date" name="validity" value="<?= $row['validity'] ?>" class="border rounded px-2 py-1 w-full"></td>
              <td class="p-2"><?= $row['created_at'] ?></td>
             <td class="p-2">
            <div class="flex gap-2">
                    <button type="submit" name="update_deal" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Update
                    </button>
                    <button type="button" onclick="cancelEdit(<?= $row['id'] ?>)" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                    Cancel
                    </button>
                </div>
                </td>

            </form>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </main>
</body>
</html>
