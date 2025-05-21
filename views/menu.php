<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Menu - SwiftDine</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <h1 class="text-2xl font-bold mb-6 text-center text-orange-500">Our Menu</h1>
  <div class="grid md:grid-cols-3 gap-6">
    <!-- Example card -->
    <div class="bg-white p-4 shadow rounded-lg">
      <img src="../assets/images/kottu.jpg" alt="Kottu" class="w-full h-40 object-cover rounded">
      <h2 class="text-lg font-semibold mt-2">Kottu Roti</h2>
      <p class="text-sm text-gray-600">Spicy Sri Lankan chopped flatbread and veggies with chicken.</p>
      <p class="text-orange-600 font-bold mt-1">Rs. 750</p>
      <button class="mt-2 bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">Add to Cart</button>
    </div>
    <!-- Add more cards dynamically later -->
  </div>
</body>
</html>