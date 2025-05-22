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

        <!-- Email Field -->
        <label class="block text-sm font-semibold mb-1">Email address</label>
        <input
          type="email"
          class="w-full px-4 py-3 mb-4 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-orange-400"
          placeholder="Enter your email"
        />

        <!-- Password Field -->
        <label class="block text-sm font-semibold mb-1">Password</label>
        <input
          type="password"
          class="w-full px-4 py-3 mb-2 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-orange-400"
          placeholder="Enter your password"
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
        <button class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-full font-semibold transition mb-4">
          Sign In
        </button>

        <!-- Divider -->
        <div class="flex items-center justify-center mb-4">
          <span class="h-px bg-white w-1/4"></span>
          <span class="px-2 text-sm">or continue with</span>
          <span class="h-px bg-white w-1/4"></span>
        </div>

        <!-- Google & Facebook Buttons -->
        <div class="flex gap-4 mb-6">
          <button class="flex-1 bg-white text-black font-semibold py-2 rounded-full hover:bg-gray-100 transition">
            Google
          </button>
          <button class="flex-1 bg-blue-600 text-white font-semibold py-2 rounded-full hover:bg-blue-700 transition">
            Facebook
          </button>
        </div>

        <!-- Sign Up Prompt -->
        <p class="text-center text-sm">
          Don’t have an account?
          <a href="#" class="text-orange-400 hover:underline">Sign up</a>
        </p>
      </div>
    </div>
  </body>
</html>
