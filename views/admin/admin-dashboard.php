<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - SwiftDine</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex font-sans text-gray-900">

  <!-- Sidebar -->
  <aside class="w-64 h-screen bg-black text-white flex flex-col">
    <div class="p-6 text-2xl font-bold text-orange-500">SwiftDine Admin</div>
    <nav class="flex flex-col gap-4 p-6 text-lg">
      <a href="manageUsers.php" class="hover:text-orange-400">🧑 Manage Users</a>
      <a href="manageRestaurants.php" class="hover:text-orange-400">🍽 Manage Restaurants</a>
      <a href="manageMenus.php" class="hover:text-orange-400">📋 Manage Menus</a>
      <a href="manageDiscounts.php" class="hover:text-orange-400">🏷️ Manage Discounts</a>
      <a href="manageContents.php" class="hover:text-orange-400">📰 Manage Contents</a>
      <a href="analytics.php" class="hover:text-orange-400">📊 Analytics</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 bg-white p-10">
    <!-- Header -->
    <div class="flex justify-between items-center mb-10">
      <h1 class="text-3xl font-bold">Welcome, Admin</h1>
      <a href="logout.php" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
        Logout
      </a>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-3 gap-6 mb-10">
      <div class="bg-orange-100 p-6 rounded-lg shadow text-center">
        <h2 class="text-xl font-bold text-orange-700">Total Users</h2>
        <p class="text-3xl mt-2">1,200</p>
      </div>
      <div class="bg-orange-100 p-6 rounded-lg shadow text-center">
        <h2 class="text-xl font-bold text-orange-700">Total Orders</h2>
        <p class="text-3xl mt-2">4,300</p>
      </div>
      <div class="bg-orange-100 p-6 rounded-lg shadow text-center">
        <h2 class="text-xl font-bold text-orange-700">Restaurants</h2>
        <p class="text-3xl mt-2">58</p>
      </div>
    </div>

    
  </main>
</body>
</html>
