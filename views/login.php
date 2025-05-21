<!DOCTYPE html>
<html>
<head>
  <title>Login - SwiftDine</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
  <form action="../controllers/UserController.php" method="POST" class="bg-white p-8 rounded shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-orange-500 mb-6">Login</h2>
    <input type="email" name="email" placeholder="Email" required class="w-full mb-4 px-4 py-2 border rounded">
    <input type="password" name="password" placeholder="Password" required class="w-full mb-4 px-4 py-2 border rounded">
    <button type="submit" name="login" class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600">Login</button>
  </form>
</body>
</html>