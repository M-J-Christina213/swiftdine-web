<?php session_start(); if (!isset($_SESSION['user_id'])) header('Location: login.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - SwiftDine</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-center py-10">
  <h1 class="text-3xl font-bold text-green-600 mb-4">Welcome to Your Dashboard</h1>
  <p class="text-lg">Start discovering and ordering your favorite meals!</p>
  <a href="menu.php" class="inline-block mt-6 bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">View Menu</a>
  <br><br>
  <a href="logout.php" class="text-red-500 mt-6 inline-block underline">Logout</a>
</body>
</html>