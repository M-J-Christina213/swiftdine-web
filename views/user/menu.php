<?php
include '../../config/db.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

$result = $conn->query("SELECT * FROM menus"); 

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Fetch all menu rows into $menus array
$menus = [];
while ($row = $result->fetch_assoc()) {
    $menus[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Full Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<!-- Banner Section -->
<div class="relative h-[350px]">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/1600x900/?food,restaurant');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div> <!-- Transparent dark overlay -->
    </div>

    <!-- Banner Content -->
    <div class="relative z-10 flex flex-col items-center justify-center h-full px-10 text-center text-white">
        <h1 class="text-5xl font-extrabold mb-2">Where Flavor Meets Passion</h1>
        <p class="text-xl font-light italic">Delicious meals, made fresh for you</p>
    </div>
</div>

<!-- Navigation Buttons -->
<div class="flex justify-between items-center px-10 py-4">
    <!-- Back Arrow -->
    <a href="home.php" class="flex items-center text-gray-700 hover:text-black text-sm font-semibold">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Back
    </a>
    
    <a href="checkout.php" class="bg-orange-600 hover:bg-orange-700 text-white font-semibold px-4 py-2 rounded transition">Proceed to Checkout →</a>
</div>


<!-- Step Progress Section -->
<div class="flex items-center justify-center mt-12 px-10">
    
    <!-- Step 1 and 2 -->
    <div class="flex gap-6 items-center text-white">
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold">✓</div>
                <span class="text-sm mt-1 text-orange-500">Discover</span>
            </div>
            <div class="w-16 h-1 bg-orange-500"></div>
            <div class="flex flex-col items-center">
                <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold">✓</div>
                <span class="text-sm mt-1 text-orange-500">View Restaurant</span>
            </div>
            <div class="w-16 h-1 bg-orange-500"></div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center font-bold">3</div>
                <span class="text-sm mt-1 text-black">Menu</span>
            </div>
            <div class="h-1 w-14 bg-black"></div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-gray-300 text-gray-800 rounded-full flex items-center justify-center font-bold">4</div>
                <span class="text-sm mt-1 text-black">Cart</span>
            </div>
             <div class="h-1 w-14 bg-black"></div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-gray-300 text-gray-800 rounded-full flex items-center justify-center font-bold">5</div>
                <span class="text-sm mt-1 text-black">Checkout</span>
            </div>
             <div class="h-1 w-14 bg-black"></div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-gray-300 text-gray-800 rounded-full flex items-center justify-center font-bold">6</div>
                <span class="text-sm mt-1 text-black">Confirmation</span>
            </div>


        </div>
        
    
</div>
<!-- Main Container -->
<div class="flex flex-col lg:flex-row max-w-7xl mx-auto p-6 gap-6">

    <!-- Menu Items Section -->
    <div class="flex-1">
        <h1 class="text-4xl font-bold text-orange-600 mb-6">Full Menu</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($menus as $menu): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300">
                    <!-- Image -->
                    <img src="/assets/images/menus/<?= htmlspecialchars($menu['image']) ?>" alt="<?= htmlspecialchars($menu['name']) ?>" class="w-full h-48 object-cover">

                    <!-- Content -->
                    <div class="p-4">
                        <!-- Title + Price -->
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-semibold"><?= htmlspecialchars($menu['name']) ?></h3>
                            <span class="text-green-600 font-bold">LKR <?= number_format($menu['price'], 2) ?></span>
                        </div>

                        <!-- Description -->
                        <p class="text-gray-600 text-sm mb-3"><?= htmlspecialchars($menu['description']) ?></p>

                        <!-- Dietary Tags -->
                        <div class="flex flex-wrap gap-2 mb-4 text-sm">
                            <?php
                            $tagsArray = array_map('trim', explode(',', $menu['tags']));
                            foreach ($tagsArray as $tag) {
                                switch (strtolower($tag)) {
                                    case 'vegetarian':
                                        echo '<span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">🥦 Vegetarian</span>';
                                        break;
                                    case 'spicy':
                                        echo '<span class="bg-red-100 text-red-700 px-2 py-1 rounded-full">🌶️ Spicy</span>';
                                        break;
                                    case 'gluten-free':
                                        echo '<span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full">🌾 Gluten-Free</span>';
                                        break;
                                    case 'gluten':
                                        echo '<span class="bg-gray-200 text-gray-700 px-2 py-1 rounded-full">🌾 Contains Gluten</span>';
                                        break;
                                }
                            }
                            ?>
                        </div>

                        <!-- Quantity Selector -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2">
                                <button class="bg-gray-200 text-gray-700 px-2 py-1 rounded">-</button>
                                <span class="text-gray-700">1</span>
                                <button class="bg-gray-200 text-gray-700 px-2 py-1 rounded">+</button>
                            </div>
                            <button class="text-gray-500 hover:text-red-500">
                                ❤️
                            </button>
                        </div>

                        <!-- Add to Cart Button -->
                        <button class="w-full bg-black text-orange-500 font-semibold text-lg tracking-wide uppercase py-3 rounded-lg shadow-md hover:bg-gray-900 hover:shadow-lg transition duration-300">
                            Add to Cart
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Order Summary Sidebar -->
    <div class="w-full lg:w-1/3 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">Your Order</h2>
        <?php if (!empty($orderItems)): ?>
            <ul class="divide-y divide-gray-200 mb-4">
                <?php
                $subtotal = 0;
                foreach ($orderItems as $item):
                    $itemTotal = $item['price'] * $item['quantity'];
                    $subtotal += $itemTotal;
                    ?>
                    <li class="py-2 flex justify-between">
                        <span><?= htmlspecialchars($item['name']) ?> x<?= $item['quantity'] ?></span>
                        <span>LKR <?= number_format($itemTotal, 2) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
            $tax = $subtotal * 0.1; // Assuming 10% tax
            $total = $subtotal + $tax;
            ?>
            <div class="text-right mb-4">
                <p>Subtotal: LKR <?= number_format($subtotal, 2) ?></p>
                <p>Tax (10%): LKR <?= number_format($tax, 2) ?></p>
                <p class="font-bold">Total: LKR <?= number_format($total, 2) ?></p>
            </div>
            <div class="flex flex-col space-y-2">
                <a href="cart.php" class="bg-orange-500 text-white text-center py-2 rounded hover:bg-orange-600 transition">Go to Cart</a>
                <button class="bg-green-500 text-white py-2 rounded hover:bg-green-600 transition">Call to Order</button>
            </div>
        <?php else: ?>
            <p class="text-gray-600">Your order is empty.</p>
        <?php endif; ?>
    </div>
    
</div>
</body>
</html>