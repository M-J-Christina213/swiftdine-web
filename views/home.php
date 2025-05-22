<?php
// Filename: views/home.php
// Requires: a backend controller to supply $offers, $categories, $testimonials from database
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SwiftDine - Taste Sri Lanka’s Finest</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

  <!-- Navbar -->
  <header class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-orange-600">SwiftDine</h1>
      <nav class="space-x-4 text-sm">
        <a href="#" class="text-gray-700 hover:text-orange-500">Home</a>
        <a href="#" class="text-gray-700 hover:text-orange-500">Browse</a>
        <a href="#" class="text-gray-700 hover:text-orange-500">Offers</a>
        <a href="#" class="text-gray-700 hover:text-orange-500">Top Rated</a>
      </nav>
      <button class="bg-orange-500 text-white px-4 py-2 rounded text-sm">Login / Register</button>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="relative bg-cover bg-center h-[400px]" style="background-image: url('https://images.unsplash.com/photo-1604909052786-07a0935dc77e');">
    <div class="bg-black/40 w-full h-full flex flex-col justify-center items-center text-white text-center px-4">
      <h2 class="text-4xl font-bold mb-4">Taste Sri Lanka’s Finest</h2>
      <p class="text-lg mb-6 max-w-xl">Find authentic local dishes and must-try favorites loved by locals and tourists.</p>
      <button class="bg-orange-500 px-6 py-2 rounded text-white hover:bg-orange-600">Start Exploring</button>
    </div>
  </section>

  <!-- Special Offers -->
  <section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
      <h3 class="text-2xl font-semibold mb-6 text-center">Special Offers</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($offers as $offer): ?>
          <div class="bg-white rounded shadow p-4">
            <img src="<?= $offer['image'] ?>" alt="Offer" class="rounded mb-4 w-full h-40 object-cover">
            <h4 class="font-semibold text-lg mb-2"><?= $offer['title'] ?></h4>
            <p class="text-sm text-gray-600 mb-2"><?= $offer['description'] ?></p>
            <button class="text-orange-500 font-semibold text-sm hover:underline">View Offer</button>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Categories -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <h3 class="text-2xl font-semibold mb-6 text-center">Explore the Taste of Sri Lanka</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <?php foreach ($categories as $cat): ?>
          <div class="bg-white border rounded shadow p-4 text-center">
            <img src="<?= $cat['image'] ?>" class="mb-4 rounded w-full h-40 object-cover">
            <h4 class="font-semibold text-lg"><?= $cat['name'] ?></h4>
            <p class="text-sm text-gray-600 mt-2"><?= $cat['description'] ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
      <h3 class="text-2xl font-semibold mb-6 text-center">What Locals & Tourists Say</h3>
      <div class="grid md:grid-cols-3 gap-6">
        <?php foreach ($testimonials as $test): ?>
          <div class="bg-white p-6 rounded shadow text-sm">
            <p class="italic mb-2">&ldquo;<?= $test['message'] ?>&rdquo;</p>
            <div class="font-semibold"><?= $test['name'] ?></div>
            <div class="text-gray-500 text-xs"><?= $test['type'] ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- App Section -->
  <section class="py-12 bg-white">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-6">
      <div class="md:w-1/2">
        <h3 class="text-2xl font-bold mb-4">Order in 3 Easy Steps</h3>
        <ol class="list-decimal pl-5 space-y-2 text-gray-700">
          <li>Browse through the finest Sri Lankan food places</li>
          <li>Select your favorites and place your order</li>
          <li>Sit back and enjoy fast delivery or pickup!</li>
        </ol>
        <div class="mt-6">
          <button class="bg-orange-500 px-5 py-2 rounded text-white">Download App</button>
        </div>
      </div>
      <div class="md:w-1/2">
        <img src="https://source.unsplash.com/300x500/?food-app" class="rounded shadow">
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-10">
    <div class="container mx-auto px-4 text-sm">
      <div class="grid md:grid-cols-3 gap-8">
        <div>
          <h5 class="font-bold mb-2 text-orange-400">SwiftDine</h5>
          <p>Discover local flavors, popular spots, and traveler tips across Sri Lanka.</p>
        </div>
        <div>
          <h5 class="font-bold mb-2">Quick Links</h5>
          <ul>
            <li><a href="#" class="hover:underline">Browse Restaurants</a></li>
            <li><a href="#" class="hover:underline">Top Rated</a></li>
            <li><a href="#" class="hover:underline">Special Offers</a></li>
          </ul>
        </div>
        <div>
          <h5 class="font-bold mb-2">Contact</h5>
          <p>Email: support@swiftdine.lk</p>
          <p>Phone: +94 77 123 4567</p>
        </div>
      </div>
      <div class="mt-8 text-center text-gray-400 text-xs">
        &copy; <?= date('Y') ?> SwiftDine. All rights reserved.
      </div>
    </div>
  </footer>

</body>
</html>
