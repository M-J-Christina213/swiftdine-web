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
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/60 z-0"></div>

  <!-- Registration Form -->
  <div class="z-10 w-full max-w-md bg-white/10 backdrop-blur-sm rounded-xl shadow-xl p-8 text-white relative">
    <h2 class="text-3xl font-bold mb-6 text-center">Create an Account</h2>

    <form class="space-y-4">
      <div>
        <label class="block mb-1 text-sm">Name</label>
        <input type="text" placeholder="Your name" class="w-full px-4 py-2 rounded bg-white/20 text-white placeholder-white/80 focus:outline-none focus:ring-2 focus:ring-orange-400"/>
      </div>

      <div>
        <label class="block mb-1 text-sm">Email Address</label>
        <input type="email" placeholder="you@example.com" class="w-full px-4 py-2 rounded bg-white/20 text-white placeholder-white/80 focus:outline-none focus:ring-2 focus:ring-orange-400"/>
      </div>

      <div>
        <label class="block mb-1 text-sm">Phone Number <span class="text-white/60">(optional)</span></label>
        <input type="tel" placeholder="07xxxxxxxx" class="w-full px-4 py-2 rounded bg-white/20 text-white placeholder-white/80 focus:outline-none focus:ring-2 focus:ring-orange-400"/>
      </div>

      <div>
        <label class="block mb-1 text-sm">Password</label>
        <input type="password" placeholder="••••••••" class="w-full px-4 py-2 rounded bg-white/20 text-white placeholder-white/80 focus:outline-none focus:ring-2 focus:ring-orange-400"/>
        <small class="text-white/70">Use 8+ characters with a mix of letters, numbers & symbols.</small>
      </div>

      <div>
        <label class="block mb-1 text-sm">Confirm Password</label>
        <input type="password" placeholder="••••••••" class="w-full px-4 py-2 rounded bg-white/20 text-white placeholder-white/80 focus:outline-none focus:ring-2 focus:ring-orange-400"/>
      </div>

      <div class="flex items-center gap-2">
        <input type="checkbox" class="accent-orange-400">
        <label class="text-sm">I agree to the <a href="#" class="underline">Terms & Conditions</a> and <a href="#" class="underline">Privacy Policy</a>.</label>
      </div>

      <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 py-2 rounded text-white font-semibold transition">Create Account</button>
    </form>

    <div class="text-center text-sm mt-6 text-white/80">
      Already have an account? <a href="#" class="underline font-semibold">Sign In</a>
    </div>

    <!-- Thank you alert (fake example) -->
    <!-- <div class="text-green-400 text-center mt-4">Thank you for registering. A confirmation has been sent to your email.</div> -->
  </div>
</body>
</html>
    