<?php
session_start();
?>

<header class="bg-white text-orange-600 shadow-md py-4 px-6 flex items-center justify-between">
  <!-- Left: Logo -->
  <div class="flex items-center space-x-4">
    <img src="../../assets/images/swiftdine.jpg" alt="Logo" class="h-32 md:h-24 max-w-full" />
  </div>

  <!-- Center: Navigation -->
  <nav class="hidden md:flex space-x-8 text-base font-semibold tracking-wide">
    <a href="home.php" class="hover:text-black transition-colors duration-300 ease-in-out">Home</a>
    <a href="restaurants.php" class="hover:text-black transition-colors duration-300 ease-in-out">Restaurants</a>
    <a href="browseMenus.php" class="hover:text-black transition-colors duration-300 ease-in-out">Browse Menu</a>
    <a href="foodGuide.php" class="hover:text-black transition-colors duration-300 ease-in-out">Food Guide</a>
    <a href="specialOffers.php" class="hover:text-black transition-colors duration-300 ease-in-out">Special Offers</a>
    <a href="trackOrder.php" class="hover:text-black transition-colors duration-300 ease-in-out">Track Order</a>
  </nav>

  <!-- Right: Buttons -->
 <div class="flex space-x-4">
  <?php if (isset($_SESSION['user_id'])): ?>
    <!-- Show Logout Button -->
    <a href="/swiftdine-web/views/auth/logout.php" class="flex items-center space-x-2 bg-orange-600 hover:bg-orange-700 text-white px-5 py-2 rounded-lg text-base font-semibold transition duration-300 ease-in-out shadow-md">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H3m12 0l-4-4m4 4l-4 4m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2h6a2 2 0 012 2v1" />
      </svg>
      <span>Logout</span>
    </a>
  <?php else: ?>
    <!-- Show Login Button -->
    <a href="/swiftdine-web/views/auth/login.php" class="flex items-center space-x-2 bg-orange-600 hover:bg-orange-700 text-white px-5 py-2 rounded-lg text-base font-semibold transition duration-300 ease-in-out shadow-md">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
      </svg>
      <span>Login</span>
    </a>
  <?php endif; ?>

  <!-- Cart button always shown -->
  <a href="/swiftdine-web/views/user/menu.php" class="flex items-center space-x-2 border border-orange-600 text-orange-600 hover:bg-orange-100 px-5 py-2 rounded-lg text-base font-semibold transition duration-300 ease-in-out shadow-md">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m5-9v9m4-9v9m3-4h-8" />
    </svg>
    <span>Cart</span>
  </a>
</div>

</header>
