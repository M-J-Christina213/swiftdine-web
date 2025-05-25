<?php
session_start();
if (!isset($_SESSION['owner_logged_in'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>

<aside class="w-64 h-screen bg-orange-500 text-white shadow-md fixed top-0 left-0 z-40 transition-transform transform duration-300">
  <div class="p-6">
    <h2 class="text-2xl font-bold mb-6">SwiftDine Owner</h2>
    <nav class="space-y-4">
      <a href="ownerDashboard.php" class="block px-4 py-2 rounded hover:bg-orange-600 transition-all duration-200"> Dashboard</a>
      <a href="manageRestaurant.php" class="block px-4 py-2 rounded hover:bg-orange-600 transition-all duration-200"> Manage Restaurant</a>
      <a href="manageMenus.php" class="block px-4 py-2 rounded hover:bg-orange-600 transition-all duration-200"> Manage Menus</a>
      <a href="manage_orders.php" class="block px-4 py-2 rounded hover:bg-orange-600 transition-all duration-200"> Manage Orders</a>
      <a href="manage_staff.php" class="block px-4 py-2 rounded hover:bg-orange-600 transition-all duration-200"> Manage Staff</a>
      <a href="manage_supplier.php" class="block px-4 py-2 rounded hover:bg-orange-600 transition-all duration-200"> Manage Supplier</a>
      <a href="logout.php" class="block px-4 py-2 rounded hover:bg-orange-700 bg-orange-600 mt-10 transition-all duration-200"> Logout</a>
    </nav>
  </div>
</aside>
