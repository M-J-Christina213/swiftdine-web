<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <title>Order Confirmation - SwiftDine</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">

<!-- Banner Section -->
<section class="relative h-60 bg-gradient-to-r from-orange-400 to-yellow-300 flex items-center justify-center text-white">
  <img src="/assets/images/banner_delivery.png" alt="Delivery" class="absolute inset-0 w-full h-full object-cover opacity-20"/>
  <h1 class="z-10 text-4xl font-bold">Your order is on its way</h1>
</section>

<!-- Nav & Confirm -->
<div class="flex justify-between items-center px-6 py-4">
  <a href="checkout.php" class="text-sm text-gray-600 hover:text-black flex items-center">
    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg> Back
  </a>
  <a href="track-order.php" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">Confirm →</a>
</div>

<!-- Delivery Summary -->
<div class="max-w-6xl mx-auto px-4 py-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
  <!-- Order Summary Left -->
  <div class="lg:col-span-2 space-y-6">
    <div class="bg-white rounded-lg shadow p-6">
      <div class="flex justify-between text-sm text-gray-700">
        <span>Order No: <strong>#123456</strong></span>
        <span>Estimated Delivery: <strong class="text-orange-600">30-40 mins</strong></span>
      </div>
      <div class="mt-1 text-gray-500 text-sm">24 May 2025 | 6:32 PM</div>
      <p class="mt-3 text-gray-700 text-sm">Thank you for your order! We are preparing your meal and will update you once it’s on the way.</p>
    </div>

    <!-- Food Items -->
    <div class="bg-white rounded-lg shadow p-6 space-y-4">
      <h2 class="text-xl font-semibold">Order Summary</h2>
      <?php foreach ($orderItems as $item): ?>
        <div class="flex justify-between items-center border-b pb-4">
          <div class="flex items-center gap-4">
            <img src="/assets/images/menus/<?= htmlspecialchars($item['image']) ?>" alt="" class="w-20 h-20 rounded" />
            <div>
              <h3 class="font-bold text-sm"><?= htmlspecialchars($item['name']) ?></h3>
              <p class="text-xs text-gray-500">Tags: <?= htmlspecialchars($item['prep_time']) ?></p>
            </div>
          </div>
          <div class="text-sm text-right">
            <p><?= $item['quantity'] ?> × Rs <?= number_format($item['price']) ?></p>
            <strong class="text-gray-800">Rs <?= number_format($item['quantity'] * $item['price']) ?></strong>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- Totals -->
      <div class="pt-4 border-t space-y-1 text-sm">
        <div class="flex justify-between"><span>Subtotal</span><span>Rs <?= number_format($subtotal) ?></span></div>
        <div class="flex justify-between"><span>Tax (10%)</span><span>Rs <?= number_format($tax) ?></span></div>
        <div class="flex justify-between"><span>Delivery Fee</span><span>Rs <?= number_format($deliveryFee) ?></span></div>
        <div class="flex justify-between font-semibold text-lg text-orange-600 border-t pt-2"><span>Total</span><span>Rs <?= number_format($total) ?></span></div>
      </div>
    </div>
  </div>

  <!-- Right Summary Card -->
  <div class="space-y-6">
    <!-- Fulfillment Card -->
    <div class="bg-white rounded-lg shadow p-6">
      <h3 class="text-lg font-semibold mb-4">Order Details</h3>
      <p class="text-sm text-gray-700 mb-2"><strong>Fulfillment:</strong> <span class="text-orange-600">Delivery</span></p>
      <p class="text-sm text-gray-700 mb-2"><strong>Delivery Address:</strong> 123 Main Street, Colombo</p>
      <p class="text-sm text-gray-700 mb-2"><strong>Estimated Arrival:</strong> 7:10 PM - 7:20 PM</p>
      <p class="text-sm text-gray-700"><strong>Instructions:</strong> Ring the bell twice</p>
    </div>

    <!-- Payment Summary -->
    <div class="bg-white rounded-lg shadow p-6">
      <h3 class="text-lg font-semibold mb-4">Payment Summary</h3>
      <div class="flex justify-between items-center text-sm">
        <div class="flex items-center gap-2">
          <img src="/assets/icons/visa.svg" class="w-6 h-6" />
          <span>Visa ending in 4242</span>
        </div>
        <span>Exp: 09/27</span>
      </div>
      <div class="flex justify-between mt-3 font-semibold text-gray-800">
        <span>Amount Paid</span><span>Rs <?= number_format($total) ?></span>
      </div>
      <div class="mt-2 text-green-600 text-sm flex items-center gap-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>
        Payment Successful
      </div>
    </div>

    <!-- Contact Info -->
    <div class="bg-white rounded-lg shadow p-6">
      <h3 class="text-lg font-semibold mb-4">Contact Information</h3>
      <p class="text-sm text-gray-700 mb-1"><strong>Name:</strong> John Doe</p>
      <p class="text-sm text-gray-700 mb-1"><strong>Phone:</strong> +94 77 123 4567</p>
      <p class="text-sm text-gray-700"><strong>Email:</strong> johndoe@example.com</p>
    </div>
  </div>
</div>

<!-- Order Status Section -->
<section class="max-w-4xl mx-auto px-4 py-8">
  <h2 class="text-lg font-semibold mb-4">Order Status</h2>
  <div class="flex flex-col gap-3 text-sm">
    <div class="flex items-center gap-2 text-green-600">
      <span class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center text-white">✓</span>
      Order received at 6:32 PM
    </div>
    <div class="flex items-center gap-2 text-green-600">
      <span class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center text-white">✓</span>
      Order confirmed at 6:35 PM
    </div>
    <div class="flex items-center gap-2 text-orange-500">
      <span class="w-5 h-5 rounded-full bg-orange-400 flex items-center justify-center text-white">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
        </svg>
      </span>
      Preparing your order...
    </div>
    <div class="flex items-center gap-2 text-gray-400">
      <span class="w-5 h-5 rounded-full bg-gray-300 flex items-center justify-center text-white">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1.5 13H4.5L3 3z" />
        </svg>
      </span>
      Out for delivery (Est: 7:15 PM)
    </div>
  </div>
</section>

<!-- Email Confirmation -->
<section class="bg-white max-w-xl mx-auto p-6 rounded shadow text-center">
  <div class="flex justify-center mb-3">
    <div class="w-10 h-10 bg-orange-500 text-white rounded-full flex items-center justify-center">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8" />
      </svg>
    </div>
  </div>
  <h3 class="text-lg font-semibold">Order Receipt Sent</h3>
  <p class="text-sm text-gray-600">A confirmation has been sent to your email address. Follow us on social media for more updates!</p>
</section>

</body>
</html>
