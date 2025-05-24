<?php
// index.php
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SwiftDine - Sri Lankan Food Journey</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">

  <!-- Header -->
  <?php include '../components/header.php'; ?>

  <!-- Hero Banner -->
  <section class="relative bg-cover bg-center h-screen" style="background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1470&q=80');">
    <!-- Dark transparent overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-12 lg:px-24 flex flex-col justify-center h-full text-center text-white">
      <h1 class="text-4xl sm:text-6xl font-extrabold drop-shadow-lg mb-4">
        Craving Something Delicious?
      </h1>
      <p class="text-lg sm:text-xl mb-12 drop-shadow-md max-w-xl mx-auto">
        From breakfast to dinner, discover your perfect meal, anytime, anywhere.
      </p>

      <!-- Meal Category Selector -->
      <div class="flex justify-center space-x-4 mb-12 overflow-x-auto no-scrollbar">
        <?php
          $meals = [
            ['icon' => '☀️', 'label' => 'Breakfast'],
            ['icon' => '🍳', 'label' => 'Brunch'],
            ['icon' => '🍛', 'label' => 'Lunch'],
            ['icon' => '🍝', 'label' => 'Dinner'],
          ];
          foreach ($meals as $meal) {
              echo '<button class="flex items-center space-x-2 bg-white bg-opacity-20 hover:bg-opacity-40 rounded-full py-2 px-5 text-white font-semibold transition cursor-pointer whitespace-nowrap">';
              echo "<span class='text-xl'>{$meal['icon']}</span>";
              echo "<span>{$meal['label']}</span>";
              echo '</button>';
          }
        ?>
      </div>

      <!-- Interaction Mode Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-4xl mx-auto">
        <?php
          $modes = [
            ['icon' => '🪑', 'title' => 'Dine-In', 'desc' => 'Reserve a table in advance', 'btn' => 'Reserve Now'],
            ['icon' => '🛵', 'title' => 'Delivery', 'desc' => 'Food at your door', 'btn' => 'Order Delivery'],
            ['icon' => '🥡', 'title' => 'Takeaway', 'desc' => 'Pick up and go', 'btn' => 'Order Takeaway'],
          ];

          foreach ($modes as $mode) {
              echo '<div class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl p-6 flex flex-col items-center text-center text-white hover:scale-105 transition-transform cursor-pointer shadow-lg">';
              echo "<div class='text-6xl mb-4'>{$mode['icon']}</div>";
              echo "<h3 class='text-2xl font-bold mb-2'>{$mode['title']}</h3>";
              echo "<p class='mb-6'>{$mode['desc']}</p>";
              echo "<button class='bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-full transition'>{$mode['btn']}</button>";
              echo '</div>';
          }
        ?>
      </div>
    </div>
  </section>

</body>
</html>
