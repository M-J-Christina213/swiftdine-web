<?php
// login.php
session_start();
require '../../config/db.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    // Basic validation
    if (empty($email) || empty($password)) {
        $error = 'Please enter both email and password.';
    } else {
        // Retrieve user
        $stmt = $conn->prepare('SELECT id, name, password, role FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $name, $stored_password, $role);
            $stmt->fetch();

            // Direct plain-text comparison, no hashing
            if ($password === $stored_password) {
                // Set session variables
                $_SESSION['user_id'] = $id;
                $_SESSION['user_name'] = $name;
                $_SESSION['user_role'] = $role;

                // Redirect based on role
                switch ($role) {
                    case 'admin':
                        header('Location: ../admin/adminDashboard.php');
                        break;
                    case 'restaurant':
                        header('Location: ../owner/ownerDashboard.php');
                        break;
                    case 'customer':
                        header('Location: ../user/home.php');
                        break;
                    default:
                        $error = 'Invalid user role.';
                }
                exit();
            } else {
                $error = 'Incorrect password.';
            }
        } else {
            $error = 'Email not found.';
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body
  class="h-screen w-screen bg-cover bg-center relative"
  style="background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1470&q=80');"
>
  <!-- Dark transparent overlay -->
  <div class="absolute inset-0 bg-black bg-opacity-60"></div>

  <!-- Centered Login Form -->
  <div class="relative z-10 flex items-center justify-center h-full">
    <div class="bg-white/10 backdrop-blur-md rounded-xl shadow-2xl p-8 w-full max-w-md text-white">
      <h2 class="text-3xl font-bold mb-6 text-center">Welcome Back</h2>

      <?php if (!empty($error)) : ?>
        <div class="bg-red-500/90 text-white p-2 mb-4 rounded text-sm text-center"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>

      <!-- FORM START -->
      <form method="POST" action="">
        <!-- Email Field -->
        <label class="block text-sm font-semibold mb-1">Email address</label>
        <input
          type="email"
          name="email"
          class="w-full px-4 py-3 mb-4 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-orange-400"
          placeholder="Enter your email"
          required
        />

        <!-- Password Field -->
        <label class="block text-sm font-semibold mb-1">Password</label>
        <input
          type="password"
          name="password"
          class="w-full px-4 py-3 mb-2 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-orange-400"
          placeholder="Enter your password"
          required
        />

        <!-- Remember + Forgot -->
        <div class="flex items-center justify-between mb-4 text-sm">
          <label class="flex items-center">
            <input type="checkbox" class="mr-2" />
            Remember me
          </label>
          <a href="#" class="text-orange-400 hover:underline">Forgot password?</a>
        </div>

        <!-- Sign In Button -->
        <button
          type="submit"
          class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-full font-semibold transition mb-4"
        >
          Sign In
        </button>
      </form>
      <!-- FORM END -->

      <!-- Sign Up Prompt -->
      <p class="text-center text-sm">
        Don’t have an account?
        <a href="register.php" class="text-orange-400 hover:underline">Sign up</a>
      </p>
    </div>
  </div>
</body>
</html>
