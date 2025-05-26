<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage Menus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
include '../../config/db.php';

$uploadDir = 'uploads/menus/';  // Folder for menu item images, create and set writable

// Handle Add Menu Item
if (isset($_POST['add'])) {
    $restaurant_id = $_POST['restaurant_id'];  // Assuming owner selects restaurant here
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $imageName = null;
    if (!empty($_FILES['image']['name'])) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($imageTmp, $uploadDir . $imageName);
    }

    $stmt = $conn->prepare("INSERT INTO menus (restaurant_id, name, description, price, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issds", $restaurant_id, $name, $description, $price, $imageName);
    $stmt->execute();
    header("Location: manageMenus.php");
    exit();
}

// Handle Delete Menu Item
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Delete image file if exists
    $result = $conn->query("SELECT image FROM menus WHERE id=$id");
    $row = $result->fetch_assoc();
    if ($row && $row['image']) {
        @unlink($uploadDir . $row['image']);
    }

    $conn->query("DELETE FROM menus WHERE id=$id");
    header("Location: manageMenus.php");
    exit();
}

// Handle Update Menu Item
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (!empty($_FILES['image']['name'])) {
        // Delete old image
        $result = $conn->query("SELECT image FROM menus WHERE id=$id");
        $row = $result->fetch_assoc();
        if ($row && $row['image']) {
            @unlink($uploadDir . $row['image']);
        }

        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($imageTmp, $uploadDir . $imageName);

        $stmt = $conn->prepare("UPDATE menus SET name=?, description=?, price=?, image=? WHERE id=?");
        $stmt->bind_param("ssdsi", $name, $description, $price, $imageName, $id);
    } else {
        $stmt = $conn->prepare("UPDATE menus SET name=?, description=?, price=? WHERE id=?");
        $stmt->bind_param("ssdi", $name, $description, $price, $id);
    }

    $stmt->execute();
    header("Location: manageMenus.php");
    exit();
}
?>

<?php include '../components/sidebarOwner.php'; ?>

<div class="ml-64 min-h-screen bg-gray-100 p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-orange-600">Manage Menus</h1>
    </div>

    <!-- Add Menu Item -->
    <form method="POST" enctype="multipart/form-data" class="bg-white shadow rounded p-6 mb-6 space-y-4 max-w-xl">
        <h2 class="text-xl font-semibold text-orange-600">Add Menu Item</h2>

        <!-- If owner manages multiple restaurants, add a select dropdown here -->
        <select name="restaurant_id" required class="w-full border border-gray-300 p-2 rounded">
            <option value="" disabled selected>Select Restaurant</option>
            <?php
            $restaurants = $conn->query("SELECT id, name FROM restaurants");
            while ($rest = $restaurants->fetch_assoc()):
            ?>
                <option value="<?= $rest['id'] ?>"><?= htmlspecialchars($rest['name']) ?></option>
            <?php endwhile; ?>
        </select>

        <input type="text" name="name" placeholder="Food Name" required class="w-full border border-gray-300 p-2 rounded" />
        <textarea name="description" placeholder="Description" required class="w-full border border-gray-300 p-2 rounded" rows="3"></textarea>
        <input type="number" step="0.01" min="0" name="price" placeholder="Price (e.g. 9.99)" required class="w-full border border-gray-300 p-2 rounded" />
        
        <label class="block text-orange-600 font-medium">Upload Image</label>
        <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 p-2 rounded cursor-pointer" />

        <button type="submit" name="add" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded transition duration-300 ease-in-out transform hover:scale-105">Add Menu Item</button>
    </form>

    <!-- Menu Items List -->
    <div class="bg-white shadow rounded p-6 overflow-x-auto max-w-7xl">
        <h2 class="text-xl font-semibold text-orange-600 mb-4">Menu Items</h2>
        <table class="min-w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-orange-300 bg-orange-50">
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Image</th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Description</th>
                    <th class="py-2 px-4">Price</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM menus ORDER BY id DESC");
                while ($row = $result->fetch_assoc()):
                ?>
                <tr class="border-b hover:bg-orange-100 transition duration-300 ease-in-out align-top">
                    <td class="py-3 px-4 align-middle"><?= $row['id'] ?></td>
                    <td class="py-3 px-4 align-middle">
                        <?php if ($row['image'] && file_exists($uploadDir . $row['image'])): ?>
                            <img src="<?= $uploadDir . $row['image'] ?>" alt="<?= htmlspecialchars($row['name']) ?>" class="w-16 h-16 rounded object-cover border border-orange-400 shadow-md" />
                        <?php else: ?>
                            <div class="w-16 h-16 flex items-center justify-center bg-orange-200 text-orange-700 rounded">No Img</div>
                        <?php endif; ?>
                    </td>
                    <td class="py-3 px-4 align-middle">
                        <form method="POST" enctype="multipart/form-data" class="flex flex-col space-y-1">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                            <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required class="border border-gray-300 p-1 rounded w-full" />
                    </td>
                    <td class="py-3 px-4 align-middle">
                            <textarea name="description" required class="border border-gray-300 p-1 rounded w-full" rows="2"><?= htmlspecialchars($row['description']) ?></textarea>
                    </td>
                    <td class="py-3 px-4 align-middle">
                            <input type="number" step="0.01" min="0" name="price" value="<?= htmlspecialchars($row['price']) ?>" required class="border border-gray-300 p-1 rounded w-full" />
                    </td>
                    <td class="py-3 px-4 align-middle space-y-2">
                            <label class="block text-sm text-orange-600 font-medium cursor-pointer hover:text-orange-800 transition">
                                Change Image
                                <input type="file" name="image" accept="image/*" class="hidden" onchange="this.form.submit()" />
                            </label>
                            <button type="submit" name="update" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm transition transform hover:scale-110">Update</button>
                        </form>
                        <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm inline-block transition transform hover:scale-110 mt-2">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
