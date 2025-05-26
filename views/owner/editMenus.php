<?php
// edit_menu.php

include '../../config/db.php';
include '../components/sidebarOwner.php';

// Get menu id from GET parameter
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Menu ID is required.");
}

$id = intval($_GET['id']);

// Initialize variables for form fields
$menu_name = '';
$menu_price = '';
$menu_status = 'available';

// If form is submitted, process update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menu_name = $_POST['menu_name'] ?? '';
    $menu_price = $_POST['menu_price'] ?? '';
    $menu_status = $_POST['menu_status'] ?? 'available';

    // Basic validation (add your own as needed)
    if ($menu_name && is_numeric($menu_price)) {
        // Prepare and execute update statement
        $stmt = $conn->prepare("UPDATE menu SET menu_name = ?, menu_price = ?, menu_status = ? WHERE id = ?");
        $stmt->bind_param("sdsi", $menu_name, $menu_price, $menu_status, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Redirect back to menu list or show success message
            header("Location: menus.php?update=success");
            exit;
        } else {
            echo "<p>No changes made or update failed.</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Please provide valid menu name and price.</p>";
    }
}

// On first load or if POST fails, fetch current menu info
$stmt = $conn->prepare("SELECT menu_name, menu_price, menu_status FROM menu WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($menu_name, $menu_price, $menu_status);
if (!$stmt->fetch()) {
    die("Menu item not found.");
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Menu Item</title>
</head>
<body>
    <h2>Edit Menu Item #<?= htmlspecialchars($id) ?></h2>
    <form method="post">
        <label for="menu_name">Menu Name:</label><br />
        <input type="text" id="menu_name" name="menu_name" value="<?= htmlspecialchars($menu_name) ?>" required><br /><br />

        <label for="menu_price">Price:</label><br />
        <input type="number" id="menu_price" name="menu_price" value="<?= htmlspecialchars($menu_price) ?>" step="0.01" required><br /><br />

        <label for="menu_status">Status:</label><br />
        <select id="menu_status" name="menu_status" required>
            <option value="available" <?= $menu_status === 'available' ? 'selected' : '' ?>>Available</option>
            <option value="not available" <?= $menu_status === 'not available' ? 'selected' : '' ?>>Not Available</option>
        </select><br /><br />

        <button type="submit">Update</button>
    </form>
    <p><a href="menus.php">Back to Menu List</a></p>
</body>
</html>
