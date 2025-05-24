<?php
// logout.php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Logged Out</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen bg-cover bg-center relative"
  style="background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1470&q=80');">
  
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black bg-opacity-60"></div>

  <!-- Centered Box -->
  <div class="relative z-10 flex items-center justify-center h-full">
    <div class="bg-white/10 backdrop-blur-md rounded-xl shadow-2xl p-8 w-full max-w-md text-white text-center">
      <h2 class="text-3xl font-bold mb-4">You've been logged out</h2>
      <p class="mb-6 text-sm">Thank you for using SwiftDine. See you soon!</p>
      <a href="login.php"
         class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-full font-semibold transition">
        Back to Login
      </a>
    </div>
  </div>
</body>
</html>
