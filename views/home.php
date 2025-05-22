<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftDine - Discover Sri Lanka's Best Eats</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<!-- Navigation Bar -->
<header class="bg-white shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center px-6">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="assets/images/logo.png" alt="SwiftDine Logo" class="w-12 h-12">
            <span class="text-2xl font-bold text-red-600">SwiftDine</span>
        </div>
        
        <!-- Nav Links -->
        <nav class="hidden md:flex space-x-6">
            <a href="#" class="text-gray-700 hover:text-red-500">Home</a>
            <a href="#" class="text-gray-700 hover:text-red-500">Restaurants</a>
            <a href="#" class="text-gray-700 hover:text-red-500">Browse Menu</a>
            <a href="#" class="text-gray-700 hover:text-red-500">Food Guide</a>
            <a href="#" class="text-gray-700 hover:text-red-500">Special Offers</a>
            <a href="#" class="text-gray-700 hover:text-red-500">Track Order</a>
        </nav>

        <!-- Buttons (Login & Cart) -->
        <div class="flex space-x-4">
            <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">Login</button>
            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 flex items-center">
                🛒 <span class="ml-2">Cart</span>
            </button>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section class="relative bg-cover bg-center py-16" style="background-image: url('assets/images/banner.jpg');">
    <div class="container mx-auto flex items-center justify-between px-6">
        <!-- Left Side (Search & Order Button) -->
        <div class="text-white w-1/2">
            <h1 class="text-4xl font-bold">#1 Food Delivery Experience in Sri Lanka</h1>
            <p class="text-lg mt-2">Experience the flavors of Sri Lanka from street food to fine dining.</p>

            <!-- Search Bar -->
            <div class="mt-6">
                <input type="text" placeholder="Search dishes or restaurants..." class="p-3 w-2/3 rounded bg-white text-gray-700 shadow-md">
                <button class="bg-red-500 text-white px-6 py-3 rounded hover:bg-red-600 ml-2">Search</button>
            </div>

            <!-- Order Now Button -->
            <button class="mt-6 bg-orange-500 text-white px-6 py-3 rounded hover:bg-orange-600 text-lg font-semibold">Why Wait? Let's Order Now!</button>
        </div>

        <!-- Right Side (Four Images) -->
        <div class="grid grid-cols-2 gap-4 w-1/2">
            <img src="assets/images/food1.jpg" alt="Sri Lankan Dish 1" class="rounded-lg">
            <img src="assets/images/food2.jpg" alt="Sri Lankan Dish 2" class="rounded-lg">
            <img src="assets/images/food3.jpg" alt="Sri Lankan Dish 3" class="rounded-lg">
            <img src="assets/images/food4.jpg" alt="Sri Lankan Dish 4" class="rounded-lg">
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white text-center py-4">
    <p>&copy; 2025 SwiftDine. All rights reserved.</p>
</footer>

</body>
</html>