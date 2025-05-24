<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - SwiftDine</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="flex font-sans text-gray-900 min-h-screen">

  <!-- Sidebar -->
  <aside class="w-64 h-screen bg-black text-white flex flex-col">
    <div class="p-6 text-2xl font-bold text-orange-500">SwiftDine Admin</div>
    <nav class="flex flex-col gap-4 p-6 text-lg">
      <a href="adminDashboard.php" class="hover:text-orange-400">🏠 Dashboard</a>
      <a href="manageUsers.php" class="hover:text-orange-400">🧑 Manage Users</a>
      <a href="manageRestaurants.php" class="hover:text-orange-400">🍽 Manage Restaurants</a>
      <a href="manageOrders.php" class="hover:text-orange-400">📦 Manage Orders</a>
      <a href="manageDiscounts.php" class="hover:text-orange-400">🏷️ Manage Discounts</a>
      <a href="manageReviews.php" class="hover:text-orange-400">📰 Manage Reviews</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 bg-white p-10 overflow-auto">
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

    <!-- Analytics Section -->
    <section>
      <h2 class="text-2xl font-bold mb-6 text-orange-600">Analytics Overview</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Orders Over Time Chart -->
        <div class="bg-gray-50 p-6 rounded-lg shadow">
          <h3 class="font-semibold mb-4">Orders Over Last 6 Months</h3>
          <canvas id="ordersChart" height="250"></canvas>
        </div>

        <!-- User Role Distribution Chart -->
        <div class="bg-gray-50 p-6 rounded-lg shadow">
          <h3 class="font-semibold mb-4">User Role Distribution</h3>
          <canvas id="usersChart" height="250"></canvas>
        </div>
      </div>
    </section>
  </main>

  <!-- Chart.js Script -->
  <script>
    // Orders Over Last 6 Months Line Chart
    const ordersCtx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ordersCtx, {
      type: 'line',
      data: {
        labels: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'],
        datasets: [{
          label: 'Orders',
          data: [350, 420, 380, 500, 480, 530],
          fill: false,
          borderColor: 'rgb(234 88 12)', // orange-600
          tension: 0.3
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

    // User Role Distribution Doughnut Chart
    const usersCtx = document.getElementById('usersChart').getContext('2d');
    const usersChart = new Chart(usersCtx, {
      type: 'doughnut',
      data: {
        labels: ['Tourist', 'Local'],
        datasets: [{
          label: 'Users',
          data: [500, 700], // example data for tourists and locals
          backgroundColor: [
            'rgb(249 115 22)', // orange-500 for Tourist
            'rgb(251 191 36)'  // yellow-400 for Local
          ],
          hoverOffset: 30
        }]
      },
      options: {
        responsive: true,
        cutout: '70%'
      }
    });
  </script>
</body>
</html>
