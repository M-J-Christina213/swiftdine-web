<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taste Sri Lanka's Finest</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">
  <!-- Navbar -->
  <header class="shadow-md bg-white sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-orange-600">🍛 FoodLanka</h1>
      <nav class="space-x-6 hidden md:block">
        <a href="#" class="hover:text-orange-600">Home</a>
        <a href="#" class="hover:text-orange-600">Browse</a>
        <a href="#" class="hover:text-orange-600">Special Offers</a>
        <a href="#" class="hover:text-orange-600">Top Rated</a>
        <a href="#" class="hover:text-orange-600">Contact</a>
      </nav>
      <div>
        <button class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">Login / Register</button>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="relative h-[500px] bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1613145991857-3e5c1cdd927d');">
    <div class="bg-black bg-opacity-50 w-full h-full flex flex-col justify-center items-center text-center text-white">
      <h2 class="text-4xl md:text-5xl font-bold mb-4">Taste Sri Lanka's Finest</h2>
      <p class="mb-6">Explore top restaurants, hidden gems & traveler favorites</p>
      <div>
        <button class="bg-orange-600 px-6 py-2 mr-3 rounded hover:bg-orange-700">Browse Now</button>
        <button class="bg-white text-orange-600 px-6 py-2 rounded hover:bg-gray-100">Special Offers</button>
      </div>
    </div>
  </section>

  <!-- Special Offers -->
  <section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
      <h3 class="text-2xl font-semibold mb-6 text-center">Special Offers</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php for ($i = 1; $i <= 4; $i++): ?>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="https://source.unsplash.com/400x250/?sri-lankan-food,<?php echo $i; ?>" alt="Offer <?php echo $i; ?>" class="w-full h-48 object-cover">
          <div class="p-4">
            <h4 class="text-lg font-semibold">Spicy Delight <?php echo $i; ?></h4>
            <p class="text-sm text-gray-500">Enjoy traditional Sri Lankan dishes with exclusive discounts.</p>
            <button class="mt-3 text-orange-600 hover:underline">View Offer</button>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <!-- Dummy Restaurant Sections -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <h3 class="text-2xl font-semibold mb-6 text-center">Featured Restaurants</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php for ($j = 1; $j <= 3; $j++): ?>
        <div class="bg-white rounded-lg shadow-md">
          <img src="https://source.unsplash.com/600x400/?restaurant,<?php echo $j; ?>" class="w-full h-52 object-cover" alt="Restaurant <?php echo $j; ?>">
          <div class="p-4">
            <h4 class="text-xl font-semibold mb-2">Restaurant <?php echo $j; ?></h4>
            <p class="text-gray-600">Experience a fusion of authentic Sri Lankan cuisine and modern flavors in the heart of the city.</p>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6 mt-12">
    <div class="container mx-auto px-4 text-center">
      <p>&copy; <?php echo date('Y'); ?> FoodLanka. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
