<?php include __DIR__ . '../../components/header.php'; ?>
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
  <div class="absolute inset-0 bg-black bg-opacity-60"></div>

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

<!-- Section 2: Special Offers -->
<section id="special-offers" class="bg-[var(--gold)] text-black py-14 px-6 text-center">
  <h2 class="text-3xl font-extrabold mb-8">Special Offers</h2>
  <div class="max-w-6xl mx-auto grid gap-8 sm:grid-cols-2 md:grid-cols-3">

    <?php
    include __DIR__ . '../../config/db.php';

    $stmt = $conn->prepare("SELECT description, discount, validity, image FROM deals ORDER BY created_at DESC LIMIT 3");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()):
      $imgPath = $row['image'] ? '../uploads/deals/' . $row['image'] : '../assets/images/offer-placeholder.jpg'; // fallback
    ?>
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition cursor-pointer">
        <img src="<?= htmlspecialchars($imgPath) ?>" alt="Special Offer" class="w-full h-48 object-cover">
        <div class="p-5 text-left">
          <h3 class="text-xl font-bold text-[var(--orange)] mb-2"><?= htmlspecialchars($row['description']) ?></h3>
          <p class="text-gray-700 mb-2"><span class="font-semibold text-black"><?= htmlspecialchars($row['discount']) ?>% Off</span></p>
          <p class="text-sm text-gray-600">Valid until <?= date("F j, Y", strtotime($row['validity'])) ?></p>
        </div>
      </div>
    <?php endwhile; ?>

  </div>
</section>


  <!-- Section 3: Explore Sri Lanka Map & Locations -->
  <section id="explore" class="max-w-7xl mx-auto py-14 px-6">
    <h2 class="text-3xl font-extrabold text-[var(--orange)] mb-8 text-center">Explore Sri Lanka</h2>
    <form class="max-w-3xl mx-auto flex flex-col sm:flex-row gap-4 mb-10">
      <input type="text" placeholder="Search by city or cuisine" class="flex-grow px-5 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[var(--orange)]" />
      <button type="submit" class="bg-[var(--orange)] text-white font-semibold px-8 py-3 rounded-md hover:bg-[#e46800] transition">Search</button>
    </form>

    <div class="bg-gray-100 rounded-xl h-72 max-w-5xl mx-auto mb-10 relative shadow-inner">
      <!-- You can replace this div with actual interactive map -->
      <p class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-gray-500 text-lg font-medium">[Map Placeholder]</p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 max-w-7xl mx-auto">
      <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition cursor-pointer">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="Colombo" class="w-full h-40 object-cover" />
        <div class="p-4">
          <h3 class="text-xl font-semibold text-[var(--orange)] mb-1">Colombo</h3>
          <p class="text-gray-700 mb-3">Capital city with diverse cuisines and vibrant restaurants.</p>
          <button class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-900 transition">Explore</button>
        </div>
      </article>
      <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition cursor-pointer">
        <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=crop&w=400&q=80" alt="Kandy" class="w-full h-40 object-cover" />
        <div class="p-4">
          <h3 class="text-xl font-semibold text-[var(--orange)] mb-1">Kandy</h3>
          <p class="text-gray-700 mb-3">Famous for cultural heritage and delicious street food.</p>
          <button class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-900 transition">Explore</button>
        </div>
      </article>
      <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition cursor-pointer">
        <img src="https://images.unsplash.com/photo-1526483360626-3bfa7555069d?auto=format&fit=crop&w=400&q=80" alt="Galle" class="w-full h-40 object-cover" />
        <div class="p-4">
          <h3 class="text-xl font-semibold text-[var(--orange)] mb-1">Galle</h3>
          <p class="text-gray-700 mb-3">Historic coastal town with fresh seafood delights.</p>
          <button class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-900 transition">Explore</button>
        </div>
      </article>
      <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition cursor-pointer">
        <img src="https://images.unsplash.com/photo-1502810190503-9a30deec65b8?auto=format&fit=crop&w=400&q=80" alt="Jaffna" class="w-full h-40 object-cover" />
        <div class="p-4">
          <h3 class="text-xl font-semibold text-[var(--orange)] mb-1">Jaffna</h3>
          <p class="text-gray-700 mb-3">Northern city known for spicy flavors and unique dishes.</p>
          <button class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-900 transition">Explore</button>
        </div>
      </article>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black text-white py-8 mt-12 text-center font-medium">
    &copy; 2025 Flavours of Sri Lanka. All rights reserved.
  </footer>

</body>
</html>
