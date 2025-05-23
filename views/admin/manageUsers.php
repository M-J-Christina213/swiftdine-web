<?php
//ini_set('display_errors', 1);
error_reporting(E_ALL);
$conn = new mysqli("localhost", "root", "", "swiftdine", 3307);

// Handle delete
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $conn->query("DELETE FROM users WHERE id=$id");
  header("Location: manageUsers.php");
  exit();
}

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {
  $id = intval($_POST['id']);
  $name = $conn->real_escape_string($_POST['name']);
  $email = $conn->real_escape_string($_POST['email']);
  $role = $conn->real_escape_string($_POST['role']);
  $conn->query("UPDATE users SET name='$name', email='$email', role='$role' WHERE id=$id");
  header("Location: manageUsers.php");
  exit();
}

// Fetch users
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Users</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function showEditForm(id) {
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

  <main class="flex-1 p-10 bg-white">
    <h1 class="text-3xl font-bold text-orange-600 mb-6">🧑 Manage Users</h1>
    <table class="min-w-full border">
      <thead class="bg-orange-100">
        <tr>
          <th class="p-2">ID</th>
          <th class="p-2">Name</th>
          <th class="p-2">Email</th>
          <th class="p-2">Role</th>
          <th class="p-2">Created At</th>
          <th class="p-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <!-- Display Row -->
          <tr id="display_row_<?= $row['id'] ?>" class="border-b">
            <td class="p-2"><?= $row['id'] ?></td>
            <td class="p-2"><?= htmlspecialchars($row['name']) ?></td>
            <td class="p-2"><?= htmlspecialchars($row['email']) ?></td>
            <td class="p-2"><?= htmlspecialchars($row['role']) ?></td>
            <td class="p-2"><?= $row['created_at'] ?></td>
            <td class="p-2">
              <button onclick="showEditForm(<?= $row['id'] ?>)" class="text-blue-500 hover:underline">Edit</button> |
              <a href="manageUsers.php?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this user?')" class="text-red-500 hover:underline">Delete</a>
            </td>
          </tr>
          <!-- Edit Row -->
          <tr id="edit_row_<?= $row['id'] ?>" class="border-b" style="display: none;">
            <form method="post" action="manageUsers.php">
              <td class="p-2"><?= $row['id'] ?><input type="hidden" name="id" value="<?= $row['id'] ?>"></td>
              <td class="p-2"><input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" class="border rounded px-2 py-1 w-full"></td>
              <td class="p-2"><input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>" class="border rounded px-2 py-1 w-full"></td>
              <td class="p-2">
                <select name="role" class="border rounded px-2 py-1 w-full">
                  <option value="customer" <?= $row['role'] === 'customer' ? 'selected' : '' ?>>Customer</option>
                  <option value="restaurant" <?= $row['role'] === 'restaurant' ? 'selected' : '' ?>>Restaurant</option>
                  <option value="admin" <?= $row['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
              </td>
              <td class="p-2"><?= $row['created_at'] ?></td>
              <td class="p-2">
                <button type="submit" name="update_user" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
                <button type="button" onclick="cancelEdit(<?= $row['id'] ?>)" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 ml-2">Cancel</button>
              </td>
            </form>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </main>
</body>
</html>
