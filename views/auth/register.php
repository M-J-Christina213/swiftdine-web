<?php
include '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email    = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm  = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    $created_at = date("Y-m-d H:i:s");

    // Auto-assign role based on email
    if ($email === 'admin@swiftdine.com') {
        $role = 'admin';
    } elseif ($email === 'owner@swiftdine.com') {
        $role = 'owner';
    } else {
        $role = 'customer';
    }

    if ($password !== $confirm) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
        // Check if email already exists
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            echo "<script>alert('Email already registered! Please use a different one.');</script>";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, created_at) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $email, $hashed_password, $role, $created_at);

            if ($stmt->execute()) {
                echo "<script>alert('Registration successful! Redirecting to login...'); window.location='login.php';</script>";
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body 
  class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center relative" 
  style="background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=1470&q=80');"
>
  <div class="absolute inset-0 bg-black/60 z-0"></div>

  <div class="z-10 w-full max-w-md bg-white/10 backdrop-blur-sm rounded-xl shadow-xl p-8 text-white relative">
    <h2 class="text-3xl font-bold mb-6 text-center">Create an Account</h2>

    <form class="space-y-4" method="POST" action="register.php">
      <div>
        <label class="block mb-1 text-sm">Name</label>
        <input type="text" name="name" placeholder="Your name" class="w-full px-4 py-2 rounded bg-white/20 text-white placeholder-white/80 focus:outline-none focus:ring-2 focus:ring-orange-400" required/>
      </div>

      <div>
        <label class="block mb-1 text-sm">Email Address</label>
        <input type="email" name="email" placeholder="you@example.com" class="w-full px-4 py-2 rounded bg-white/20 text-white placeholder-white/80 focus:outline-none focus:ring-2 focus:ring-orange-400" required/>
      </div>

      <div>
        <label class="block mb-1 text-sm">Phone Number <span class="text-white/60">(optional)</span></label>
        <input type="tel" name="tel" placeholder="07xxxxxxxx" class="w-full px-4 py-2 rounded bg-white/20 text-white placeholder-white/80 focus:outline-none focus:ring-2 focus:ring-orange-400"/>
      </div>

      <div>
        <label class="block mb-1 text-sm">Password</label>
        <input type="password" name="password" placeholder="••••••••" class="w-full px-4 py-2 rounded bg-white/20 text-white placeholder-white/80 focus:outline-none focus:ring-2 focus:ring-orange-400" required/>
        <small class="text-white/70">Use 8+ characters with a mix of letters, numbers & symbols.</small>
      </div>

      <div>
        <label class="block mb-1 text-sm">Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="••••••••" class="w-full px-4 py-2 rounded bg-white/20 text-white placeholder-white/80 focus:outline-none focus:ring-2 focus:ring-orange-400" required/>
      </div>

      <div class="flex items-center gap-2">
        <input type="checkbox" class="accent-orange-400" required>
        <label class="text-sm">I agree to the <a href="#" class="underline">Terms & Conditions</a> and <a href="#" class="underline">Privacy Policy</a>.</label>
      </div>

      <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 py-2 rounded text-white font-semibold transition">Create Account</button>
    </form>

    <div class="text-center text-sm mt-6 text-white/80">
      Already have an account? <a href="login.php" class="underline font-semibold">Sign In</a>
    </div>
  </div>
</body>
</html>
