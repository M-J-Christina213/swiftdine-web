<?php
session_start();
if (!isset($_SESSION['owner_logged_in'])) {
    header("Location: login.php");
    exit;
}

$host = "localhost";
$user = "root"; // Change if needed
$password = ""; // Change if needed
$db = "swiftdine";
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Add
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $query = "INSERT INTO restaurant (name, location, contact) VALUES ('$name', '$location', '$contact')";
    $conn->query($query);
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM restaurant WHERE id=$id");
    header("Location: manage_restaurant.php");
}

// Handle Edit
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $conn->query("UPDATE restaurant SET name='$name', location='$location', contact='$contact' WHERE id=$id");
    header("Location: manage_restaurant.php");
}
?>

<?php include 'components/sidebar.php'; ?>

<div class="ml-64 min-h-screen bg-gray-100 p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-orange-600">Manage Restaurant</h1>
    </div>

    <!-- Add Restaurant -->
    <form method="POST" class="bg-white shadow rounded p-6 mb-6 space-y-4">
        <h2 class="text-xl font-semibold text-orange-600">Add Restaurant</h2>
        <input type="text" name="name" placeholder="Restaurant Name" required class="w-full border border-gray-300 p-2 rounded" />
        <input type="text" name="location" placeholder="Location" required class="w-full border border-gray-300 p-2 rounded" />
        <input type="text" name="contact" placeholder="Contact" required class="w-full border border-gray-300 p-2 rounded" />
        <button type="submit" name="add" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded transition">Add Restaurant</button>
    </form>

    <!-- Restaurant List -->
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-xl font-semibold text-orange-600 mb-4">Restaurant List</h2>
        <table class="min-w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-2">ID</th>
                    <th class="py-2">Name</th>
                    <th class="py-2">Location</th>
                    <th class="py-2">Contact</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM restaurant");
                while ($row = $result->fetch_assoc()):
                ?>
                    <tr class="border-b hover:bg-orange-50">
                        <td class="py-2"><?= $row['id'] ?></td>
                        <td class="py-2"><?= $row['name'] ?></td>
                        <td class="py-2"><?= $row['location'] ?></td>
                        <td class="py-2"><?= $row['contact'] ?></td>
                        <td class="py-2 space-x-2">
                            <!-- Edit -->
                            <form method="POST" class="inline">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                <input type="text" name="name" value="<?= $row['name'] ?>" class="border p-1 w-24 rounded" required>
                                <input type="text" name="location" value="<?= $row['location'] ?>" class="border p-1 w-24 rounded" required>
                                <input type="text" name="contact" value="<?= $row['contact'] ?>" class="border p-1 w-24 rounded" required>
                                <button type="submit" name="update" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-sm">Update</button>
                            </form>
                            <!-- Delete -->
                            <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
