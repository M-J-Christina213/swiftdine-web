<?php
session_start();
error_reporting(E_ALL);

$conn = new mysqli("localhost", "root", "", "swiftdine", 3307);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $location = $_POST['location'];
  $cuisine = $_POST['cuisine'];
  $rating = $_POST['rating'];
  $owner_id = $_POST['owner_id'];

  // Image Upload
  $imageName = $_FILES['image']['name'];
  $imageTmp = $_FILES['image']['tmp_name'];
  $targetDir = "../uploads/";
  $imagePath = "";

  if ($imageName) {
    $imagePath = uniqid() . "_" . basename($imageName);
    move_uploaded_file($imageTmp, $targetDir . $imagePath);
  }

  $stmt = $conn->prepare("INSERT INTO restaurants (name, location, cuisine, rating, owner_id, image_path) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssdis", $name, $location, $cuisine, $rating, $owner_id, $imagePath);

  if ($stmt->execute()) {
    header("Location: manageRestaurants.php");
    exit();
  } else {
    echo "Error: " . $stmt->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Restaurant</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-10">

  <div class="max-w-3xl mx-auto bg-white p-8 shadow rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-orange-600">➕ Add New Restaurant</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
      <input type="text" name="name" placeholder="Restaurant Name" required class="w-full border px-4 py-2 rounded">
      <input type="text" name="location" placeholder="Location" required class="w-full border px-4 py-2 rounded">
      <input type="text" name="cuisine" placeholder="Cuisine" required class="w-full border px-4 py-2 rounded">
      <input type="number" name="rating" placeholder="Rating (1-5)" min="1" max="5" step="0.1" required class="w-full border px-4 py-2 rounded">
      <input type="number" name="owner_id" placeholder="Owner ID" required class="w-full border px-4 py-2 rounded">
      
      <div>
        <label class="block mb-1">Upload Image</label>
        <input type="file" name="image" accept="image/*" class="w-full border px-4 py-2 rounded">
      </div>

      <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600">Add Restaurant</button>
    </form>
  </div>
</body>
</html>
