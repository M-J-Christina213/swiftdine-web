<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SwiftDine – Sri Lankan Food Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body class="bg-[#0e0e0e] text-white font-sans">

  <!-- Header/Navbar -->
  <header class="bg-[#111] text-white sticky top-0 z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <h1 class="text-xl font-bold text-orange-400">SwiftDine</h1>
      <nav class="hidden md:flex gap-6 text-sm">
        <a href="#" class="hover:text-orange-400 transition">Home</a>
        <a href="#" class="hover:text-orange-400 transition">Menu</a>
        <a href="#" class="hover:text-orange-400 transition">Delivery</a>
        <a href="#" class="hover:text-orange-400 transition">Contact</a>
      </nav>
      <button class="md:hidden text-orange-400 text-2xl">
        <i class="fa-solid fa-bars"></i>
      </button>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="relative text-white py-14 px-4 text-center bg-cover bg-center" style="background-image: url('https://example.com/sri-lankan-meals.jpg');">
    <div class="bg-black bg-opacity-60 p-8 rounded-xl inline-block">
      <h1 class="text-4xl font-bold mb-3 animate-fade-in">Craving Something Delicious?</h1>
      <p class="text-lg">From breakfast to dinner, discover your perfect meal, anytime, anywhere.</p>
    </div>
  </section>

  <!-- Meal Category -->
  <section class="py-10 px-6">
    <h2 class="text-2xl font-semibold mb-6 text-orange-400">What are you in the mood for?</h2>
    <div class="flex flex-wrap gap-4">
      <span class="px-4 py-2 rounded-full bg-white text-black hover:bg-orange-500 hover:text-white transition">☀️ Breakfast</span>
      <span class="px-4 py-2 rounded-full bg-white text-black hover:bg-orange-500 hover:text-white transition">🍳 Brunch</span>
      <span class="px-4 py-2 rounded-full bg-white text-black hover:bg-orange-500 hover:text-white transition">🍛 Lunch</span>
      <span class="px-4 py-2 rounded-full bg-white text-black hover:bg-orange-500 hover:text-white transition">🍝 Dinner</span>
    </div>
  </section>

  <!-- Dining Mode -->
  <section class="py-10 px-6 bg-[#111] rounded-xl">
    <h2 class="text-2xl font-semibold mb-6 text-orange-400">Select Dining Mode</h2>
    <div class="grid gap-6 md:grid-cols-3">
      <div class="p-5 bg-black border border-orange-500 rounded-lg hover:bg-orange-600 transition transform hover:scale-105">
        <img src="https://example.com/dinein.jpg" alt="Dine-in setup" class="rounded mb-3" />
        <i class="fa-solid fa-chair text-2xl mb-2"></i>
        <h3 class="font-semibold">Dine-In</h3>
        <p class="text-sm text-gray-300">Reserve a table in advance</p>
      </div>
      <div class="p-5 bg-black border border-orange-500 rounded-lg hover:bg-orange-600 transition transform hover:scale-105">
        <img src="https://example.com/delivery.jpg" alt="Delivery service" class="rounded mb-3" />
        <i class="fa-solid fa-motorcycle text-2xl mb-2"></i>
        <h3 class="font-semibold">Delivery</h3>
        <p class="text-sm text-gray-300">Food at your door</p>
      </div>
      <div class="p-5 bg-black border border-orange-500 rounded-lg hover:bg-orange-600 transition transform hover:scale-105">
        <img src="https://example.com/takeaway.jpg" alt="Takeaway packaging" class="rounded mb-3" />
        <i class="fa-solid fa-bag-shopping text-2xl mb-2"></i>
        <h3 class="font-semibold">Takeaway</h3>
        <p class="text-sm text-gray-300">Pick up and go</p>
      </div>
    </div>
  </section>

  <!-- Restaurant Discovery -->
  <section class="py-12 px-6">
    <h2 class="text-2xl font-semibold mb-2 text-orange-400">Where Would You Like to Eat?</h2>
    <p class="text-gray-300 mb-6">Search, browse, or explore popular picks</p>
    <input type="text" placeholder="Search by location or cuisine" class="w-full p-3 rounded bg-[#222] text-white placeholder-gray-400 mb-6" />
    <div class="flex gap-4 mb-6 flex-wrap">
      <button class="px-4 py-2 rounded-full bg-orange-600 hover:bg-orange-700 transition">🌍 Tourist Favorites</button>
      <button class="px-4 py-2 rounded-full bg-orange-600 hover:bg-orange-700 transition">🇱🇰 Sri Lankan Gems</button>
      <button class="px-4 py-2 rounded-full bg-orange-600 hover:bg-orange-700 transition">🔥 Trending Now</button>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-[#111] p-4 rounded shadow hover:shadow-orange-500 transition transform hover:scale-105">
        <img src="https://example.com/restaurant1.jpg" alt="Popular restaurant" class="rounded mb-3" />
        <h3 class="text-lg font-bold">Spice Garden</h3>
        <p class="text-sm text-gray-300">Colombo • Sri Lankan • ⭐ 4.5</p>
        <button class="mt-2 px-4 py-1 bg-orange-500 hover:bg-orange-600 rounded-full transition">View Menu</button>
      </div>
    </div>
  </section>

  <!-- Audience-Based Filters -->
  <section class="py-12 px-6 bg-[#111]">
    <h2 class="text-2xl font-semibold mb-6 text-orange-400">Who Are You Dining With?</h2>
    <div class="flex flex-wrap gap-4">
      <button class="bg-white text-black px-4 py-2 rounded-full hover:bg-orange-500 hover:text-white transition">👨‍👩‍👧 Family-Friendly</button>
      <button class="bg-white text-black px-4 py-2 rounded-full hover:bg-orange-500 hover:text-white transition">👫 Couple’s Choice</button>
      <button class="bg-white text-black px-4 py-2 rounded-full hover:bg-orange-500 hover:text-white transition">🧑 Solo Dining</button>
      <button class="bg-white text-black px-4 py-2 rounded-full hover:bg-orange-500 hover:text-white transition">🌍 Tourist Favorite</button>
      <button class="bg-white text-black px-4 py-2 rounded-full hover:bg-orange-500 hover:text-white transition">🎉 Friends’ Hangout</button>
    </div>
  </section>

  <!-- New Section: Explore Food Categories -->
  <section class="py-12 px-6">
    <h2 class="text-2xl font-semibold mb-6 text-orange-400">Explore Food Categories</h2>
    <div class="grid gap-6 md:grid-cols-4">
      <div class="bg-[#111] p-5 rounded-lg hover:bg-orange-500 transition text-center">
        <i class="fa-solid fa-fish-fins text-3xl mb-3"></i>
        <h3 class="font-bold">Seafood</h3>
      </div>
      <div class="bg-[#111] p-5 rounded-lg hover:bg-orange-500 transition text-center">
        <i class="fa-solid fa-drumstick-bite text-3xl mb-3"></i>
        <h3 class="font-bold">Meat</h3>
      </div>
      <div class="bg-[#111] p-5 rounded-lg hover:bg-orange-500 transition text-center">
        <i class="fa-solid fa-leaf text-3xl mb-3"></i>
        <h3 class="font-bold">Vegan</h3>
      </div>
      <div class="bg-[#111] p-5 rounded-lg hover:bg-orange-500 transition text-center">
        <i class="fa-solid fa-mug-hot text-3xl mb-3"></i>
        <h3 class="font-bold">Drinks</h3>
      </div>
    </div>
  </section>

  <!-- Footer CTA -->
  <footer class="py-14 px-6 text-center bg-[#111] mt-10">
    <h2 class="text-xl font-semibold text-orange-400 mb-6">What would you like to do next?</h2>
    <div class="flex flex-wrap justify-center gap-4">
      <button class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-full transition transform hover:scale-105">
        <i class="fa-solid fa-utensils mr-2"></i> Reserve Table
      </button>
      <button class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-full transition transform hover:scale-105">
        <i class="fa-solid fa-truck mr-2"></i> Order Now
      </button>
      <button class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-full transition transform hover:scale-105">
        <i class="fa-solid fa-book-open mr-2"></i> Explore Menu
      </button>
      <button class="bg-white hover:bg-orange-300 text-black px-6 py-2 rounded-full transition transform hover:scale-105">
        <i class="fa-regular fa-heart mr-2"></i> Save
      </button>
      <button class="bg-white hover:bg-orange-300 text-black px-6 py-2 rounded-full transition transform hover:scale-105">
        <i class="fa-solid fa-share-nodes mr-2"></i> Share
      </button>
    </div>
    <p class="mt-8 text-sm text-gray-500">&copy; 2025 SwiftDine. All rights reserved.</p>
  </footer>

</body>
</html>
