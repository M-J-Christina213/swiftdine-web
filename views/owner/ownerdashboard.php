<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Restaurant Owner Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <?php include('../components/sidebar.php'); ?>

    <!-- Main Content -->
    <main class="flex-1 p-10">
      <!-- Header -->
      <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-orange-600">Dashboard</h1>
        <a href="logout.php" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded">Logout</a>
      </div>

      <!-- Stats Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-lg shadow text-center border-t-4 border-orange-500">
          <h2 class="text-lg font-semibold text-gray-600">Monthly Income</h2>
          <p class="text-3xl font-bold text-orange-600">$4,230</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow text-center border-t-4 border-orange-500">
          <h2 class="text-lg font-semibold text-gray-600">Monthly Expenses</h2>
          <p class="text-3xl font-bold text-orange-600">$2,100</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow text-center border-t-4 border-orange-500">
          <h2 class="text-lg font-semibold text-gray-600">Dine-In Orders</h2>
          <p class="text-3xl font-bold text-orange-600">210</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow text-center border-t-4 border-orange-500">
          <h2 class="text-lg font-semibold text-gray-600">Delivery Orders</h2>
          <p class="text-3xl font-bold text-orange-600">180</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow text-center border-t-4 border-orange-500">
          <h2 class="text-lg font-semibold text-gray-600">Takeaway Orders</h2>
          <p class="text-3xl font-bold text-orange-600">145</p>
        </div>
      </div>

      <!-- Income Chart -->
      <div class="bg-white p-6 rounded-lg shadow mb-10">
        <h2 class="text-xl font-semibold text-orange-600 mb-4">Income Over the Past 6 Months</h2>
        <canvas id="incomeChart" height="100"></canvas>
      </div>

      <!-- Call-to-Action -->
      <div class="text-center mt-10">
        <p class="text-gray-600">Manage your restaurant menus, orders, and customers from the left menu.</p>
      </div>
    </main>
  </div>

  <!-- Chart.js Script -->
  <script>
    const ctx = document.getElementById('incomeChart').getContext('2d');
    const incomeChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Monthly Income ($)',
          data: [3200, 3500, 4000, 4200, 4600, 4800],
          borderColor: 'rgb(234, 88, 12)',
          backgroundColor: 'rgba(234, 88, 12, 0.1)',
          fill: true,
          tension: 0.3,
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>
