<?php include __DIR__ . '/../components/header.php'; ?>
<?php include '../../config/db.php'; ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title> Swiftdine </title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black font-poppins">
 

  <!-- Section 1: Hero full width -->
<section
  class="relative bg-cover bg-center text-white w-full p-10 md:p-20  overflow-hidden flex flex-col md:flex-row items-center gap-10"
  style="background-image: url('../../assets/images/buffet.jpg');"
>
  <!-- Overlay -->
  <div class="absolute inset-0 bg -black bg-opacity-60"></div>

  <!-- Content container to control max width inside full width section -->
  <div class="relative z-10 flex flex-col md:flex-row items-center justify-between w-full max-w-7xl mx-auto gap-10">
    <!-- Left text & search -->
    <div class="md:flex-1 max-w-xl flex flex-col justify-center w-full">
      <h1 class="text-4xl md:text-5xl font-extrabold mb-6 drop-shadow-lg">
        Discover the True Flavours of Sri Lanka
      </h1>
      <p class="text-lg md:text-xl font-medium mb-10 drop-shadow-md">
        Your gateway to authentic Sri Lankan restaurants and special offers!
      </p>

      <div class="flex max-w-md mx-auto md:mx-0">
        <input
          type="text"
          placeholder="Search your favorite food or location"
          class="flex-grow px-5 py-4 rounded-l-md text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-500"
        />
        <button
          class="bg-orange-600 hover:bg-orange-700 px-7 py-4 rounded-r-md font-semibold transition"
        >
          Search
        </button>
      </div>

      <div
        class="flex justify-center md:justify-start gap-10 mt-12 font-semibold text-lg select-none drop-shadow-md"
      >
        <div>
          <span class="block text-3xl font-extrabold">200+</span> Restaurants
        </div>
        <div>
          <span class="block text-3xl font-extrabold">3500+</span> Dishes
        </div>
        <div>
          <span class="block text-3xl font-extrabold">15+</span> Locations
        </div>
      </div>
    </div>

    <!-- Right images -->
    <div
  class="md:flex-1 grid grid-cols-2 gap-5 max-w-xl"
>
  <img
    src="../assets/images/friends.jpg"
    alt="Dish 1"
    class="w-full h-52 object-cover  shadow-lg hover:scale-105 transition-transform duration-300 cursor-pointer"

  />
  <img
    src="../../assets/images/chef.jpg"
    alt="Dish 2"
    class="w-full h-52 object-cover shadow-lg hover:scale-105 transition-transform duration-300 cursor-pointer"

  />
  <img
    src="../../assets/images/chef.jpg"
    alt="Dish 3"
    class="w-full h-52 object-cover shadow-lg hover:scale-105 transition-transform duration-300 cursor-pointer"

  />
  <img
    src="../../assets/images/friends.jpg"
    alt="Dish 4"
    class="w-full h-52 object-cover shadow-lg hover:scale-105 transition-transform duration-300 cursor-pointer"
/>
</div>

  </div>
</section>
<!-- Section 2: special offers -->

<div class="py-10 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">🎉 Special Offers</h2>
    <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6">
      <?php
        $sql = "SELECT * FROM deals";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo '
              <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-transform hover:scale-[1.02]">
                <img src="' . $row["image"] . '" alt="Offer Image" class="w-full h-48 object-cover">
                <div class="p-5">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">' . htmlspecialchars($row["description"]) . '</h3>
                  <p class="text-orange-500 font-bold text-lg mb-1">Discount: ' . htmlspecialchars($row["discount"]) . '%</p>
                  <p class="text-gray-600 text-sm mb-4">Valid till: ' . htmlspecialchars($row["validity"]) . '</p>
                  <button onclick="claimOffer(\'' . addslashes($row["description"]) . '\')" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-all">
                    Claim Now
                  </button>
                </div>
              </div>
            ';
          }
        } else {
          echo '<p class="text-gray-600">No special offers available at the moment.</p>';
        }

        $conn->close();
      ?>
    </div>
  </div>
</div>

<!-- Popup -->
<div id="offerPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
  <div class="bg-white rounded-xl shadow-lg p-6 max-w-sm text-center">
    <h2 class="text-xl font-semibold text-green-600 mb-3">🎁 Offer Claimed!</h2>
    <p id="popupText" class="text-gray-700 mb-4">You have claimed the offer.</p>
    <button onclick="closePopup()" class="mt-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
      OK
    </button>
  </div>
</div>

<!-- Script -->
<script>
  function claimOffer(description) {
    document.getElementById('popupText').innerText = `You have claimed: "${description}" 🎉`;
    document.getElementById('offerPopup').classList.remove('hidden');
  }

  function closePopup() {
    document.getElementById('offerPopup').classList.add('hidden');
  }
</script>




  <!-- 🔍 Find Food Near or Your Destination Section -->
<div class="bg-white py-12 px-4">
  <div class="text-center mb-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-2">🍽️ Find Food Near or Your Destination</h2>
    <p class="text-gray-500">Explore the best restaurants in your area or any destination of your choice.</p>
  </div>

  <!-- Google Map with Search Bar -->
  <div class="mb-10 max-w-5xl mx-auto">
    <input id="map-search" class="w-full mb-3 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Search for a location..." type="text" />
    <div id="map" class="w-full h-96 rounded-xl shadow-lg">
      <iframe 
        class="w-full h-96 rounded-xl shadow-md"
        src="https://www.google.com/maps?q=Colombo,%20Sri%20Lanka&output=embed"
        allowfullscreen 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
    

  </div>

  <!-- Destination Cards -->
  <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
    <!-- Card 1: Colombo -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col justify-between">
      <img src="images/colombo.jpg" alt="Colombo" class="w-full h-40 object-cover">
      <div class="p-4">
        <div class="flex justify-between items-center mb-1">
          <h3 class="text-lg font-bold text-gray-800">Colombo</h3>
          <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.149c.969 0 1.371 1.24.588 1.81l-3.36 2.442a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.442a1 1 0 00-1.175 0l-3.36 2.442c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.075 9.382c-.783-.57-.38-1.81.588-1.81h4.149a1 1 0 00.95-.69l1.286-3.955z"/></svg>
            <span class="text-sm font-medium text-gray-700">4.9</span>
          </div>
        </div>
        <p class="text-sm text-gray-600 mb-3 flex items-center gap-1">
          
          🍽️ 126 restaurants
        </p>
        <p class="text-gray-600 text-sm mb-4">Discover delicious meals and dining experiences across Colombo.</p>
      </div>
      <div class="p-4 pt-0">
        <a href="restaurants.php" class="block text-center w-full bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-all">Explore Restaurants</a>

      </div>
    </div>

    <!-- Card 2: Galle -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col justify-between">
      <img src="images/galle.jpg" alt="Galle" class="w-full h-40 object-cover">
      <div class="p-4">
        <div class="flex justify-between items-center mb-1">
          <h3 class="text-lg font-bold text-gray-800">Galle</h3>
          <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.149c.969 0 1.371 1.24.588 1.81l-3.36 2.442a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.442a1 1 0 00-1.175 0l-3.36 2.442c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.075 9.382c-.783-.57-.38-1.81.588-1.81h4.149a1 1 0 00.95-.69l1.286-3.955z"/></svg>
            <span class="text-sm font-medium text-gray-700">4.5</span>
          </div>
        </div>
        <p class="text-sm text-gray-600 mb-3 flex items-center gap-1">
          <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="..." /></svg>
          87 restaurants
        </p>
        <p class="text-gray-600 text-sm mb-4">Explore scenic and tasty hotspots in the heritage city of Galle.</p>
      </div>
      <div class="p-4 pt-0">
        <a href="restaurants.php" class="block text-center w-full bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-all">Explore Restaurants</a>

      </div>
    </div>

    <!-- Card 3: Ella -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col justify-between">
      <img src="images/ella.jpg" alt="Ella" class="w-full h-40 object-cover">
      <div class="p-4">
        <div class="flex justify-between items-center mb-1">
          <h3 class="text-lg font-bold text-gray-800">Ella</h3>
          <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.149c.969 0 1.371 1.24.588 1.81l-3.36 2.442a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.442a1 1 0 00-1.175 0l-3.36 2.442c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.075 9.382c-.783-.57-.38-1.81.588-1.81h4.149a1 1 0 00.95-.69l1.286-3.955z"/></svg>
            <span class="text-sm font-medium text-gray-700">4.8</span>
          </div>
        </div>
        <p class="text-sm text-gray-600 mb-3 flex items-center gap-1">
          <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="..." /></svg>
          42 restaurants
        </p>
        <p class="text-gray-600 text-sm mb-4">Taste the flavors of Ella, surrounded by misty hills and nature.</p>
      </div>
      <div class="p-4 pt-0">
        <a href="restaurants.php" class="block text-center w-full bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-all">Explore Restaurants</a>

      </div>
    </div>

    <!-- Card 4: Kandy -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col justify-between">
      <img src="images/kandy.jpg" alt="Kandy" class="w-full h-40 object-cover">
      <div class="p-4">
        <div class="flex justify-between items-center mb-1">
          <h3 class="text-lg font-bold text-gray-800">Kandy</h3>
          <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.149c.969 0 1.371 1.24.588 1.81l-3.36 2.442a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.442a1 1 0 00-1.175 0l-3.36 2.442c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.075 9.382c-.783-.57-.38-1.81.588-1.81h4.149a1 1 0 00.95-.69l1.286-3.955z"/></svg>
            <span class="text-sm font-medium text-gray-700">4.8</span>
          </div>
        </div>
        <p class="text-sm text-gray-600 mb-3 flex items-center gap-1">
          <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="..." /></svg>
          68 restaurants
        </p>
        <p class="text-gray-600 text-sm mb-4">Savor culinary delights in the cultural capital of Sri Lanka.</p>
      </div>
      <div class="p-4 pt-0">
        <a href="restaurants.php" class="block text-center w-full bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-all">Explore Restaurants</a>

      </div>
    </div>
  </div>
</div>

<section class="bg-white py-12 px-4 sm:px-8 lg:px-20">
  <div class="text-center mb-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-2">What are you craving today?</h2>
    <p class="text-gray-600">Let us help you discover the perfect meal for your mood and taste!</p>
  </div>

  <form action="browseMenu.php" method="GET" class="bg-gray-100 p-6 rounded-2xl shadow-md">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Cuisine Type -->
      <div>
        <label for="cuisine" class="block text-gray-700 font-medium mb-2">Cuisine Type</label>
        <select id="cuisine" name="cuisine" class="w-full p-3 border rounded-lg bg-white shadow-sm">
          <option value="">All Cuisines</option>
          <option value="sri-lankan">Sri Lankan</option>
          <option value="indian">Indian</option>
          <option value="chinese">Chinese</option>
          <option value="italian">Italian</option>
          <option value="thai">Thai</option>
          <option value="fast-food">Fast Food</option>
        </select>
      </div>

      <!-- Mood -->
      <div>
        <label for="mood" class="block text-gray-700 font-medium mb-2">Mood</label>
        <select id="mood" name="mood" class="w-full p-3 border rounded-lg bg-white shadow-sm">
          <option value="">Select Mood</option>
          <option value="dine-in">Dine-In</option>
          <option value="takeaway">Takeaway</option>
          <option value="delivery">Delivery</option>
        </select>
      </div>

      <!-- Price Range -->
      <div>
        <label for="price" class="block text-gray-700 font-medium mb-2">Price Range</label>
        <select id="price" name="price" class="w-full p-3 border rounded-lg bg-white shadow-sm">
          <option value="">Any Price (LKR)</option>
          <option value="500">Up to 500</option>
          <option value="1000">Up to 1,000</option>
          <option value="2000">Up to 2,000</option>
          <option value="5000">Up to 5,000</option>
        </select>
      </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-8">
      <a href="browseMenu.php" class="w-full block text-center bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl transition duration-300">
        Find My Perfect Meal
      </a>

    </div>
  </form>
</section>

  <!-- Section 3: Based on your last Order and Most Popular Foods -->
<section class="max-w-7xl mx-auto my-12 px-4">
  <div class="grid md:grid-cols-3 gap-8">

    <!-- Left Column: Based on your last Order -->
    <div class="md:col-span-1 bg-orange-100 text-orange-500 rounded-xl p-6 flex flex-col gap-6">
      <h2 class="text-xl font-bold mb-2">Based on your last Order</h2>
      <p class="text-gray-400 mb-4">Here are some dishes we think you'll love based on your previous orders.</p>

      <!-- Food Item 1 -->
      <div class="flex items-center gap-4 bg-black/60 rounded-lg p-3">
        <img src="images/crab-curry.jpg" alt="Crab Curry" class="w-20 h-20 rounded-lg object-cover" />
        <div class="flex-1">
          <h3 class="text-orange-200 font-semibold">Crab Curry</h3>
          <p class="text-gray-400 text-sm">Spicy Sri Lankan crab curry cooked to perfection.</p>
          <div class="flex items-center gap-1 text-yellow-400 mt-1">
            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.149c.969 0 1.371 1.24.588 1.81l-3.36 2.442a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.442a1 1 0 00-1.175 0l-3.36 2.442c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.075 9.382c-.783-.57-.38-1.81.588-1.81h4.149a1 1 0 00.95-.69l1.286-3.955z"/>
            </svg>
            <span class="text-sm text-gray-300">(120)</span>
          </div>
        </div>
        
      </div>

      <!-- Food Item 2 -->
      <div class="flex items-center gap-4 bg-black/60 rounded-lg p-3">
        <img src="images/prawn-curry.jpg" alt="Prawn Curry" class="w-20 h-20 rounded-lg object-cover" />
        <div class="flex-1">
          <h3 class="text-orange-200 font-semibold">Prawn Curry</h3>
          <p class="text-gray-400 text-sm">Delicious prawn curry with rich coconut flavors.</p>
          <div class="flex items-center gap-1 text-yellow-400 mt-1">
            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.149c.969 0 1.371 1.24.588 1.81l-3.36 2.442a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.442a1 1 0 00-1.175 0l-3.36 2.442c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.075 9.382c-.783-.57-.38-1.81.588-1.81h4.149a1 1 0 00.95-.69l1.286-3.955z"/>
            </svg>
            <span class="text-sm text-gray-300">(120)</span>
          </div>
        </div>
       
      </div>

      <!-- Food Item 3 -->
      <div class="flex items-center gap-4 bg-black/60 rounded-lg p-3">
        <img src="images/fish-ambul-thiyal.jpg" alt="Fish Ambul Thiyal" class="w-20 h-20 rounded-lg object-cover" />
        <div class="flex-1">
          <h3 class="text-orange-200 font-semibold">Fish Ambul Thiyal</h3>
          <p class="text-gray-400 text-sm">Traditional sour fish curry from Sri Lanka.</p>
          <div class="flex items-center gap-1 text-yellow-400 mt-1">
            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.149c.969 0 1.371 1.24.588 1.81l-3.36 2.442a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.442a1 1 0 00-1.175 0l-3.36 2.442c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.075 9.382c-.783-.57-.38-1.81.588-1.81h4.149a1 1 0 00.95-.69l1.286-3.955z"/>
            </svg>
            <span class="text-sm text-gray-300">(120)</span>
          </div>
        </div>
        
      </div>
    </div>


    <!-- RIGHT COLUMN: Most Popular Foods -->
    <div class="md:col-span-2 py-6 bg-green-50 rounded-xl flex flex-col gap-6 px-4">
      <div class="text-center">
        <h2 class="text-3xl font-bold text-green-900 mb-2">Most Popular Foods</h2>
        <p class="text-green-700">Loved by locals and tourists — authentic Sri Lankan & Asian favorites!</p>
      </div>

      <div class="flex flex-col gap-4">

        <!-- Food Item -->
        <div class="bg-white rounded-lg shadow-md p-4 flex items-center gap-4">
          <img src="https://i.imgur.com/3zlW2qF.jpg" alt="Prawn Curry" class="w-20 h-20 object-cover rounded-lg">
          <div class="flex-1">
            <h3 class="text-lg font-bold text-green-800">Sri Lankan Prawn Curry</h3>
            <p class="text-sm text-gray-600">Juicy prawns simmered in coconut milk & spices</p>
            <div class="text-yellow-500 text-sm">★★★★☆ (4.5)</div>
          </div>
          <span class="text-green-700 font-semibold">LKR 2,300</span>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4 flex items-center gap-4">
          <img src="https://i.imgur.com/E4y3SkC.jpg" alt="Egg Hopper" class="w-20 h-20 object-cover rounded-lg">
          <div class="flex-1">
            <h3 class="text-lg font-bold text-green-800">Egg Hoppers (Appa)</h3>
            <p class="text-sm text-gray-600">Crispy bowl-shaped pancakes with egg center</p>
            <div class="text-yellow-500 text-sm">★★★★☆ (4.4)</div>
          </div>
          <span class="text-green-700 font-semibold">LKR 450</span>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4 flex items-center gap-4">
          <img src="https://i.imgur.com/s07N6X1.jpg" alt="Chicken Kottu" class="w-20 h-20 object-cover rounded-lg">
          <div class="flex-1">
            <h3 class="text-lg font-bold text-green-800">Chicken Kottu Roti</h3>
            <p class="text-sm text-gray-600">Spicy chopped roti with chicken & vegetables</p>
            <div class="text-yellow-500 text-sm">★★★★★ (4.8)</div>
          </div>
          <span class="text-green-700 font-semibold">LKR 1,200</span>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4 flex items-center gap-4">
          <img src="https://i.imgur.com/cWGyBtK.jpg" alt="Fried Rice" class="w-20 h-20 object-cover rounded-lg">
          <div class="flex-1">
            <h3 class="text-lg font-bold text-green-800">Mixed Fried Rice</h3>
            <p class="text-sm text-gray-600">Basmati rice with egg, chicken, and prawns</p>
            <div class="text-yellow-500 text-sm">★★★★☆ (4.6)</div>
          </div>
          <span class="text-green-700 font-semibold">LKR 1,600</span>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4 flex items-center gap-4">
          <img src="https://i.imgur.com/zz7nQhK.jpg" alt="Devilled Chicken" class="w-20 h-20 object-cover rounded-lg">
          <div class="flex-1">
            <h3 class="text-lg font-bold text-green-800">Devilled Chicken</h3>
            <p class="text-sm text-gray-600">Sweet & spicy stir-fried chicken chunks</p>
            <div class="text-yellow-500 text-sm">★★★★☆ (4.3)</div>
          </div>
          <span class="text-green-700 font-semibold">LKR 1,400</span>
        </div>

      </div>
    </div>

  </div>
</section>

<section class="bg-black p-6 rounded-xl">
  <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
    <!-- Left title and description -->
    <div>
      <h2 class="text-orange-500 font-bold text-2xl mb-2">Top Rated by Locals & Tourist</h2>
      <p class="text-gray-400 max-w-md">Discover the best restaurants loved by locals and tourists alike.</p>
    </div>

    <!-- Right tags -->
    <div class="flex gap-3 flex-wrap text-sm text-gray-300">
      <button class="px-3 py-1 rounded-full border border-gray-600 hover:bg-orange-500 hover:text-white transition">All</button>
      <button class="px-3 py-1 rounded-full border border-gray-600 hover:bg-orange-500 hover:text-white transition">Vegetarian</button>
      <button class="px-3 py-1 rounded-full border border-gray-600 hover:bg-orange-500 hover:text-white transition">Family Friendly</button>
      <button class="px-3 py-1 rounded-full border border-gray-600 hover:bg-orange-500 hover:text-white transition">Pet Friendly</button>
    </div>
  </div>

  <!-- Cards container -->
  <div class="grid md:grid-cols-3 gap-6">
    <!-- Card 1 -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col justify-between">
      <img src="images/rtc-randeepa.jpg" alt="RTC Randeepa" class="w-full h-48 object-cover" />
      <div class="p-5 flex flex-col flex-grow">
        <div class="flex justify-between items-center mb-2">
          <h3 class="text-lg font-semibold text-gray-800">RTC Randeepa</h3>
          <div class="flex items-center gap-1 text-yellow-400 font-semibold">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.149c.969 0 1.371 1.24.588 1.81l-3.36 2.442a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.442a1 1 0 00-1.175 0l-3.36 2.442c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.075 9.382c-.783-.57-.38-1.81.588-1.81h4.149a1 1 0 00.95-.69l1.286-3.955z"/>
            </svg>
            <span>4.0</span>
            <span class="text-gray-500 text-sm">(243)</span>
          </div>
        </div>
        <div class="mb-2">
          <span class="text-sm bg-orange-100 text-orange-600 rounded-full px-2 py-0.5 mr-2">Sri Lankan</span>
          <span class="text-sm bg-orange-100 text-orange-600 rounded-full px-2 py-0.5">Fine Dining</span>
        </div>
        <p class="text-gray-600 text-sm mb-4 flex-grow">Enjoy authentic Sri Lankan flavors in an elegant atmosphere.</p>
        <div class="flex items-center gap-1 text-gray-500 text-sm mb-4">
          <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 10c0 6-9 13-9 13S3 16 3 10a9 9 0 1 1 18 0z"/>
            <circle cx="12" cy="10" r="3"/>
          </svg>
          <span>Colombo · 2.3 Km away</span>
        </div>
        <div class="flex gap-3">
          <a href="menu.php" class="bg-orange-500 hover:bg-orange-600 text-white rounded-lg px-4 py-2 text-sm font-semibold">View Menu</a>
          <a href="resturantProfile.php" class="border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white rounded-lg px-4 py-2 text-sm font-semibold">Reserve Table</a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col justify-between">
      <img src="images/kingsburgy-honey-beach.jpg" alt="Kingsburgy (Honey Beach)" class="w-full h-48 object-cover" />
      <div class="p-5 flex flex-col flex-grow">
        <div class="flex justify-between items-center mb-2">
          <h3 class="text-lg font-semibold text-gray-800">Kingsburgy (Honey Beach)</h3>
          <div class="flex items-center gap-1 text-yellow-400 font-semibold">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.149c.969 0 1.371 1.24.588 1.81l-3.36 2.442a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.442a1 1 0 00-1.175 0l-3.36 2.442c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.075 9.382c-.783-.57-.38-1.81.588-1.81h4.149a1 1 0 00.95-.69l1.286-3.955z"/>
            </svg>
            <span>4.8</span>
            <span class="text-gray-500 text-sm">(190)</span>
          </div>
        </div>
        <div class="mb-2">
          <span class="text-sm bg-orange-100 text-orange-600 rounded-full px-2 py-0.5 mr-2">Sri Lankan</span>
          <span class="text-sm bg-orange-100 text-orange-600 rounded-full px-2 py-0.5 mr-2">Fine Dining</span>
          <span class="text-sm bg-orange-100 text-orange-600 rounded-full px-2 py-0.5">Seafood</span>
        </div>
        <p class="text-gray-600 text-sm mb-4 flex-grow">Taste exquisite seafood and fine Sri Lankan cuisine by the beach.</p>
        <div class="flex items-center gap-1 text-gray-500 text-sm mb-4">
          <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 10c0 6-9 13-9 13S3 16 3 10a9 9 0 1 1 18 0z"/>
            <circle cx="12" cy="10" r="3"/>
          </svg>
          <span>Colombo · 2.3 Km away</span>
        </div>
        <div class="flex gap-3">
          <a href="menu.php" class="bg-orange-500 hover:bg-orange-600 text-white rounded-lg px-4 py-2 text-sm font-semibold">View Menu</a>
          <a href="resturantProfile.php" class="border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white rounded-lg px-4 py-2 text-sm font-semibold">Reserve Table</a>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col justify-between">
      <img src="images/marriot-beach.jpg" alt="Marriot Beach" class="w-full h-48 object-cover" />
      <div class="p-5 flex flex-col flex-grow">
        <div class="flex justify-between items-center mb-2">
          <h3 class="text-lg font-semibold text-gray-800">Marriot Beach</h3>
          <div class="flex items-center gap-1 text-yellow-400 font-semibold">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.149c.969 0 1.371 1.24.588 1.81l-3.36 2.442a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.36-2.442a1 1 0 00-1.175 0l-3.36 2.442c-.785.57-1.84-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.075 9.382c-.783-.57-.38-1.81.588-1.81h4.149a1 1 0 00.95-.69l1.286-3.955z"/>
            </svg>
            <span>5.0</span>
            <span class="text-gray-500 text-sm">(300)</span>
          </div>
        </div>
        <div class="mb-2">
          <span class="text-sm bg-orange-100 text-orange-600 rounded-full px-2 py-0.5 mr-2">Sri Lankan</span>
          <span class="text-sm bg-orange-100 text-orange-600 rounded-full px-2 py-0.5 mr-2">Fine Dining</span>
          <span class="text-sm bg-orange-100 text-orange-600 rounded-full px-2 py-0.5">Seafood</span>
        </div>
        <p class="text-gray-600 text-sm mb-4 flex-grow">Luxury dining experience with stunning ocean views and fresh seafood.</p>
        <div class="flex items-center gap-1 text-gray-500 text-sm mb-4">
          <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 10c0 6-9 13-9 13S3 16 3 10a9 9 0 1 1 18 0z"/>
            <circle cx="12" cy="10" r="3"/>
          </svg>
          <span>Colombo · 2.3 Km away</span>
        </div>
        <div class="flex gap-3">
          <a href="menu.php" class="bg-orange-500 hover:bg-orange-600 text-white rounded-lg px-4 py-2 text-sm font-semibold">View Menu</a>
          <a href="resturantProfile.php" class="border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white rounded-lg px-4 py-2 text-sm font-semibold">Reserve Table</a>
        </div>
      </div>
    </div>
  </div>

  <!-- View all restaurants button -->
  <div class="mt-8 text-center">
    <a href="resturants.php" class="bg-orange-500 hover:bg-orange-600 text-white rounded-full px-6 py-3 font-semibold text-lg inline-block">View All Restaurants</a>
  </div>
</section>



<section class="max-w-6xl mx-auto px-4 py-12">
  <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Food Tips for Travellers</h2>
  <div class="grid md:grid-cols-3 gap-8">

    <!-- Card 1: Currency Converter -->
    <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
      <h3 class="text-xl font-semibold mb-3 text-gray-800">Currency Converter</h3>
      <p class="text-gray-600 mb-4 text-sm">Convert USD to LKR instantly with live updates.</p>
      
      <div class="flex items-center gap-3 mb-4">
        <label class="flex items-center gap-2 text-gray-700 font-medium" for="usd-input">
          From USD
        </label>
        <input id="usd-input" type="number" min="0" step="0.01" value="1" class="border border-gray-300 rounded px-3 py-1 w-24 text-right" />
      </div>

      <div class="text-gray-800 font-semibold mb-4">
        1 USD = <span id="exchange-rate">300</span> LKR
      </div>

      <div class="flex justify-between items-center bg-gray-100 rounded px-4 py-2 text-lg font-semibold">
        <span>Equivalent:</span>
        <span id="converted-lkr">300.00 LKR</span>
      </div>
    </div>

    <!-- Card 2: Eating Etiquette -->
    <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
      <h3 class="text-xl font-semibold mb-3 text-gray-800">Eating Etiquette</h3>
      <p class="text-gray-600 mb-4 text-sm">Respect local customs to enjoy your meal and company.</p>
      
      <ul class="mb-6 space-y-3 text-gray-700">
        <li class="flex items-center gap-2">
          <span class="text-orange-500 font-bold">✓</span>
          Its tradition to eat with the right hand in many local settings.
        </li>
        <li class="flex items-center gap-2">
          <span class="text-orange-500 font-bold">✓</span>
          Wait for the eldest person at the table to begin first.
        </li>
        <li class="flex items-center gap-2">
          <span class="text-orange-500 font-bold">✓</span>
          It’s polite to try a little of everything served.
        </li>
        <li class="flex items-center gap-2">
          <span class="text-orange-500 font-bold">✓</span>
          Saying <em>“bohomo sthuti”</em> (thank you) is appreciated.
        </li>
      </ul>
      
      <button class="border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white rounded px-4 py-2 font-semibold transition">
        Learn More
      </button>
    </div>

    <!-- Card 3: Food Safety Tips -->
    <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
      <h3 class="text-xl font-semibold mb-3 text-gray-800">Food Safety Tips</h3>
      <p class="text-gray-600 mb-4 text-sm">Stay healthy by following these essential food safety tips.</p>
      
      <ul class="mb-6 space-y-3 text-orange-600 font-semibold">
        <li class="flex items-center gap-2">
          <span>✓</span>
          Drink bottled or purified water only.
        </li>
        <li class="flex items-center gap-2">
          <span>✓</span>
          Avoid raw or undercooked foods.
        </li>
        <li class="flex items-center gap-2">
          <span>✓</span>
          Wash your hands before eating.
        </li>
        <li class="flex items-center gap-2">
          <span>✓</span>
          Choose busy restaurants with high turnover.
        </li>
      </ul>

      <button class="border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white rounded px-4 py-2 font-semibold transition">
        Learn More
      </button>
    </div>

  </div>
</section>

<script>
  // Simple live currency converter logic
  const usdInput = document.getElementById('usd-input');
  const exchangeRate = 300; // static example, can be replaced with live API call
  const convertedLkr = document.getElementById('converted-lkr');
  const exchangeRateDisplay = document.getElementById('exchange-rate');

  function updateConversion() {
    const usdValue = parseFloat(usdInput.value) || 0;
    const lkrValue = usdValue * exchangeRate;
    convertedLkr.textContent = lkrValue.toFixed(2) + ' LKR';
  }

  usdInput.addEventListener('input', updateConversion);

  // Initialize conversion display
  exchangeRateDisplay.textContent = exchangeRate;
  updateConversion();
</script>

<section class="bg-[#FFEEDC] py-12 px-4">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-2xl font-bold text-orange-700 mb-1">What Locals & Tourists Say</h2>
    <p class="text-gray-700 mb-8">Hear from people who’ve experienced our service</p>

    <div class="grid md:grid-cols-3 gap-6">
      <!-- Testimonial 1 -->
      <div class="bg-white p-5 rounded-lg shadow-md text-left">
        <div class="flex items-center gap-3 mb-2">
          <img src="https://via.placeholder.com/48" alt="Sarah" class="w-12 h-12 rounded-full object-cover">
          <div>
            <p class="font-semibold text-gray-800">Sarah Chen</p>
            <p class="text-sm text-gray-500">Tourist from Singapore</p>
          </div>
        </div>
        <div class="text-yellow-500 mb-2">★★★★★</div>
        <p class="text-sm text-gray-700">“As a foodie from Singapore, I'm super picky with flavor, and SwiftDine did not disappoint! Loved the ease of browsing restaurant menus and reading real reviews from other tourists and locals.”</p>
      </div>

      <!-- Testimonial 2 -->
      <div class="bg-white p-5 rounded-lg shadow-md text-left">
        <div class="flex items-center gap-3 mb-2">
          <img src="https://via.placeholder.com/48" alt="Rajitha" class="w-12 h-12 rounded-full object-cover">
          <div>
            <p class="font-semibold text-gray-800">Rajitha Perera</p>
            <p class="text-sm text-gray-500">Local</p>
          </div>
        </div>
        <div class="text-yellow-500 mb-2">★★★★★</div>
        <p class="text-sm text-gray-700">“SwiftDine is a game changer. I usually struggle to recommend good places to my foreign friends, but this made it so much easier. The app helps find hidden gems in one go. Proud to see Sri Lankan options delivering this kind of service!”</p>
      </div>

      <!-- Testimonial 3 -->
      <div class="bg-white p-5 rounded-lg shadow-md text-left">
        <div class="flex items-center gap-3 mb-2">
          <img src="https://via.placeholder.com/48" alt="David & Emma" class="w-12 h-12 rounded-full object-cover">
          <div>
            <p class="font-semibold text-gray-800">David & Emma Wilson</p>
            <p class="text-sm text-gray-500">Tourist from Australia</p>
          </div>
        </div>
        <div class="text-yellow-500 mb-2">★★★★★</div>
        <p class="text-sm text-gray-700">“We love exploring food spots during our holidays, and SwiftDine offered great local recommendations with smooth delivery tracking. A must-have for foodies visiting Sri Lanka!”</p>
      </div>
    </div>

    <button class="mt-6 px-5 py-2 border border-orange-500 text-orange-600 rounded font-semibold hover:bg-orange-100 transition">
      Leave Your Review
    </button>
  </div>
</section>

 <!-- Partner With Us Section -->
  <section class="py-12 px-4">
    <div class="max-w-6xl mx-auto text-center">
      <h2 class="text-2xl font-bold mb-2">Partner With Us</h2>
      <p class="text-gray-600 mb-10">Join our network of restaurants and grow your business with SwiftDine</p>

      <!-- Feature Cards -->
      <div class="grid md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="font-semibold mb-2">Reach More Customers</h3>
          <p class="text-sm text-gray-600">Connect with both tourists and locals during dining experiences.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="font-semibold mb-2">Boost Your Revenue</h3>
          <p class="text-sm text-gray-600">Increase profit from dine-in, takeaway, and delivery orders.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="font-semibold mb-2">Easy Management</h3>
          <p class="text-sm text-gray-600">Use our platform to manage orders, menus, and feedback.</p>
        </div>
      </div>

      <!-- Partner Options -->
      <div class="grid md:grid-cols-2 gap-6">
        <!-- Restaurant Partner -->
        <div class="relative rounded-lg overflow-hidden group">
          <img src="https://via.placeholder.com/600x400?text=Chef" class="w-full h-64 object-cover opacity-80" />
          <div class="absolute inset-0 p-6 flex flex-col justify-end bg-gradient-to-t from-black to-transparent">
            <h3 class="text-white text-xl font-bold">Become a Restaurant Partner</h3>
            <p class="text-white text-sm mb-4">Expand your business and reach more customers.</p>
            <button onclick="openForm('restaurant')" class="bg-orange-500 text-white px-4 py-2 rounded font-semibold w-fit">Join Now</button>
          </div>
        </div>

        <!-- Rider -->
        <div class="relative rounded-lg overflow-hidden group">
          <img src="https://via.placeholder.com/600x400?text=Delivery+Rider" class="w-full h-64 object-cover opacity-80" />
          <div class="absolute inset-0 p-6 flex flex-col justify-end bg-gradient-to-t from-black to-transparent">
            <h3 class="text-white text-xl font-bold">Join as a Rider</h3>
            <p class="text-white text-sm mb-4">Help us deliver with speed & care. Competitive pay awaits.</p>
            <button onclick="openForm('rider')" class="bg-white text-black px-4 py-2 rounded font-semibold w-fit">Apply Now</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Form Popup Modal -->
  <div id="formModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg relative">
      <button onclick="closeForm()" class="absolute top-3 right-4 text-xl text-gray-500 hover:text-orange-500">×</button>
      <h3 id="formTitle" class="text-xl font-bold text-orange-600 mb-4">Form Title</h3>
      <form id="partnerForm" class="space-y-4">
        <!-- Fields will be injected here -->
      </form>
    </div>
  </div>

  <!-- Confirmation Popup -->
  <div id="confirmationPopup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg text-center max-w-sm">
      <h3 class="text-xl font-bold text-orange-600 mb-2">Submission Successful</h3>
      <p class="text-gray-700">An email will be sent to you once your request is verified.</p>
      <button onclick="closeConfirmation()" class="mt-4 bg-orange-500 text-white px-4 py-2 rounded">OK</button>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    function openForm(type) {
      const form = document.getElementById("partnerForm");
      const title = document.getElementById("formTitle");
      form.innerHTML = '';

      if (type === 'restaurant') {
        title.innerText = "Restaurant Partner Form";
        form.innerHTML = `
          <input required type="text" placeholder="Owner Name" class="w-full border px-4 py-2 rounded focus:outline-orange-500" />
          <input required type="text" placeholder="Restaurant Name" class="w-full border px-4 py-2 rounded focus:outline-orange-500" />
          <input required type="email" placeholder="Email" class="w-full border px-4 py-2 rounded focus:outline-orange-500" />
          <input required type="tel" placeholder="Phone Number" class="w-full border px-4 py-2 rounded focus:outline-orange-500" />
          <input required type="text" placeholder="Location" class="w-full border px-4 py-2 rounded focus:outline-orange-500" />
          <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600">Submit</button>
        `;
      } else if (type === 'rider') {
        title.innerText = "Rider Application Form";
        form.innerHTML = `
          <input required type="text" placeholder="Full Name" class="w-full border px-4 py-2 rounded focus:outline-orange-500" />
          <input required type="email" placeholder="Email" class="w-full border px-4 py-2 rounded focus:outline-orange-500" />
          <input required type="tel" placeholder="Phone Number" class="w-full border px-4 py-2 rounded focus:outline-orange-500" />
          <input required type="text" placeholder="City / Area" class="w-full border px-4 py-2 rounded focus:outline-orange-500" />
          <input required type="text" placeholder="Vehicle Type (Bike, Scooter, etc.)" class="w-full border px-4 py-2 rounded focus:outline-orange-500" />
          <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600">Submit</button>
        `;
      }

      document.getElementById("formModal").classList.remove("hidden");
    }

    function closeForm() {
      document.getElementById("formModal").classList.add("hidden");
    }

    function closeConfirmation() {
      document.getElementById("confirmationPopup").classList.add("hidden");
    }

    document.getElementById("partnerForm").addEventListener("submit", function (e) {
      e.preventDefault();
      closeForm();
      setTimeout(() => {
        document.getElementById("confirmationPopup").classList.remove("hidden");
      }, 300);
    });
  </script>


  <?php include __DIR__ . '/../components/footer.php'; ?>

</body>
</html>
