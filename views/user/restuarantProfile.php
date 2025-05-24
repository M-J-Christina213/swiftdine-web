<?php
include '../../config/db.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Get restaurant by ID
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM restaurants WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $restaurant = $result->fetch_assoc();
} else {
    echo "Restaurant not found.";
    exit;
}
?>

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Banner Section -->
<div class="relative h-[350px]">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo htmlspecialchars($restaurant['image'] ?: 'https://source.unsplash.com/1600x900/?restaurant'); ?>');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    </div>

    <!-- Banner Content -->
    <div class="relative z-10 flex items-center justify-between h-full px-10">
        <div class="text-white">
            <h1 class="text-4xl font-bold"><?php echo htmlspecialchars($restaurant['name']); ?></h1>
            <p class="text-lg mt-2"><?php echo htmlspecialchars($restaurant['location']); ?></p>
            <div class="mt-6 flex gap-4">
                <a href="reserve.php?id=<?php echo $restaurant['id']; ?>" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-2 rounded-full text-sm font-semibold shadow-md">
                    Reserve Table
                </a>
                <a href="menu.php?id=<?php echo $restaurant['id']; ?>" class="bg-white text-gray-800 hover:bg-gray-100 px-6 py-2 rounded-full text-sm font-semibold shadow-md">
                    View Menu
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Back Button -->
<div class="px-10 pt-4">
    <a href="javascript:history.back()" class="text-gray-600 hover:text-black flex items-center text-sm font-semibold">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Back
    </a>
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
                <div class="w-8 h-8 bg-black text-white rounded-full flex items-center justify-center font-bold">2</div>
                <span class="text-sm mt-1 text-black">View Restaurant</span>
            </div>
            <div class="w-16 h-1 bg-black"></div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-gray-300 text-gray-800 rounded-full flex items-center justify-center font-bold">3</div>
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
