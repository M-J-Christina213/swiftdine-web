<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body
    class="h-screen w-screen bg-cover bg-center relative"
    style="background-image: url('https://images.unsplash.com/photo-1612874742510-1b9ed3f6278c?auto=format&fit=crop&w=1470&q=80');"
  >
    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>

    <!-- Centered Registration Form -->
    <div class="relative z-10 flex items-center justify-center h-full">
      <div id="register-form" class="bg-white/10 backdrop-blur-md rounded-xl shadow-2xl p-8 w-full max-w-lg text-white">
        <h2 class="text-3xl font-bold mb-6 text-center">Create an Account</h2>

        <!-- Name -->
        <label class="block text-sm font-semibold mb-1">Full Name</label>
        <input
          type="text"
          class="w-full px-4 py-3 mb-4 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-orange-400"
          placeholder="Your full name"
        />

        <!-- Email -->
        <label class="block text-sm font-semibold mb-1">Email address</label>
        <input
          type="email"
          class="w-full px-4 py-3 mb-4 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-orange-400"
          placeholder="Enter your email"
        />

        <!-- Phone (optional) -->
        <label class="block text-sm font-semibold mb-1">Phone number <span class="text-xs">(optional)</span></label>
        <input
          type="tel"
          class="w-full px-4 py-3 mb-4 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-orange-400"
          placeholder="Optional"
        />

        <!-- Password -->
        <label class="block text-sm font-semibold mb-1">Password</label>
        <div class="relative mb-4">
          <input
            id="password"
            type="password"
            class="w-full px-4 py-3 pr-12 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-orange-400"
            placeholder="Use 8+ characters with letters, numbers & symbols"
          />
          <button
            type="button"
            onclick="togglePassword('password')"
            class="absolute right-3 top-3 text-sm text-gray-600"
          >👁</button>
        </div>

        <!-- Confirm Password -->
        <label class="block text-sm font-semibold mb-1">Confirm Password</label>
        <div class="relative mb-4">
          <input
            id="confirm-password"
            type="password"
            class="w-full px-4 py-3 pr-12 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-orange-400"
            placeholder="Re-enter your password"
          />
          <button
            type="button"
            onclick="togglePassword('confirm-password')"
            class="absolute right-3 top-3 text-sm text-gray-600"
          >👁</button>
        </div>

        <!-- Terms Checkbox -->
        <label class="flex items-center text-sm mb-4">
          <input type="checkbox" class="mr-2" required />
          I agree to the <a href="#" class="text-orange-400 underline ml-1 mr-1">Terms & Conditions</a>
          and <a href="#" class="text-orange-400 underline ml-1">Privacy Policy</a>
        </label>

        <!-- Create Account Button -->
        <button
          onclick="submitForm()"
          class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-full font-semibold transition mb-6"
        >
          Create Account
        </button>

        <!-- Sign In Link -->
        <p class="text-center text-sm">
          Already have an account?
          <a href="#" class="text-orange-400 hover:underline">Sign in</a>
        </p>
      </div>

      <!-- Thank You Message -->
      <div id="thank-you" class="hidden bg-white/10 backdrop-blur-md rounded-xl shadow-2xl p-8 w-full max-w-lg text-white text-center">
        <h2 class="text-3xl font-bold mb-4">Thank You for Registering!</h2>
        <p class="text-lg mb-6">A confirmation has been sent to your email.</p>
        <a href="#" class="text-orange-400 underline text-sm">Return to Sign in</a>
      </div>
    </div>

    <!-- JS for password toggle & form swap -->
    <script>
      function togglePassword(id) {
        const input = document.getElementById(id);
        input.type = input.type === 'password' ? 'text' : 'password';
      }

      function submitForm() {
        document.getElementById('register-form').classList.add('hidden');
        document.getElementById('thank-you').classList.remove('hidden');
      }
    </script>
  </body>
</html>
