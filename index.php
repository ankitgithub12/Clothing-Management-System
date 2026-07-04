<?php
session_start();
include("config/database.php");

$pageTitle = "Fashion World - Premium Clothing Store";
include('includes/header.php');
?>

<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=1600');
        background-size: cover;
        background-position: center;
    }
</style>

    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Premium Clothing Collections</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">Discover timeless elegance with our exclusive range of handcrafted apparel</p>
            <a href="shop.php" class="inline-block bg-white text-primary font-bold py-3 px-8 rounded-full hover:bg-gray-100 transition duration-300 shadow-lg">
                Shop Now <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- Main Content -->
    <main class="content py-12 px-4 md:px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Featured Categories -->
            <section class="mb-16">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-dark mb-2">Shop By Category</h2>
                    <div class="w-20 h-1 bg-primary mx-auto"></div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <a href="men.php" class="category-card bg-white p-6 rounded-lg shadow-md text-center">
                        <div class="overflow-hidden rounded-md mb-4">
                            <img src="assets/images/men/image2.jpg" alt="Men's Fashion" class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-2">Men's Collection</h3>
                        <p class="text-gray-600">Premium quality menswear</p>
                        <button class="mt-4 text-primary font-medium hover:underline">Explore <i class="fas fa-arrow-right ml-1"></i></button>
                    </a>
                    
                    <a href="women.php" class="category-card bg-white p-6 rounded-lg shadow-md text-center">
                        <div class="overflow-hidden rounded-md mb-4">
                            <img src="assets/images/women/image2.jpg" alt="Women's Fashion" class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-2">Women's Collection</h3>
                        <p class="text-gray-600">Elegant womenswear</p>
                        <button class="mt-4 text-primary font-medium hover:underline">Explore <i class="fas fa-arrow-right ml-1"></i></button>
                    </a>
                    
                    <a href="kids.php" class="category-card bg-white p-6 rounded-lg shadow-md text-center">
                        <div class="overflow-hidden rounded-md mb-4">
                            <img src="assets/images/kids/2.jpeg" alt="Kids Collection" class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-2">Kid's Collection</h3>
                        <p class="text-gray-600">Adorable outfits for kids</p>
                        <button class="mt-4 text-primary font-medium hover:underline">Explore <i class="fas fa-arrow-right ml-1"></i></button>
                    </a>
                    
                    <a href="new-arrivals.php" class="category-card bg-white p-6 rounded-lg shadow-md text-center">
                        <div class="overflow-hidden rounded-md mb-4">
                            <img src="assets/images/men/image1.jpg" alt="New Arrivals" class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-2">New Arrivals</h3>
                        <p class="text-gray-600">Latest trends in fashion</p>
                        <button class="mt-4 text-primary font-medium hover:underline">Explore <i class="fas fa-arrow-right ml-1"></i></button>
                    </a>
                </div>
            </section>

            <!-- Personalized Recommendations (for logged-in users) -->
            <?php if ($isLoggedIn): ?>
            <section class="mb-16">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-dark mb-2">Recommended For You</h2>
                    <div class="w-20 h-1 bg-primary mx-auto"></div>
                    <p class="text-gray-600 mt-2">Personalized selections based on your preferences</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Recommended Product 1 -->
                    <div class="bg-white p-6 rounded-lg shadow-md text-center product" data-id="rec1">
                        <div class="overflow-hidden rounded-md mb-4">
                            <img src="assets/images/men/image3.jpg" alt="Recommended Product" class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-2">Premium Denim Jacket</h3>
                        <p class="text-gray-600 product-price">₹2,499</p>
                        <button class="mt-4 bg-primary text-white py-2 px-6 rounded-full hover:bg-secondary transition add-to-cart">
                            Add to Cart
                        </button>
                    </div>
                    
                    <!-- Recommended Product 2 -->
                    <div class="bg-white p-6 rounded-lg shadow-md text-center product" data-id="rec2">
                        <div class="overflow-hidden rounded-md mb-4">
                            <img src="assets/images/women/image3.jpg" alt="Recommended Product" class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-2">Elegant Silk Dress</h3>
                        <p class="text-gray-600 product-price">₹3,299</p>
                        <button class="mt-4 bg-primary text-white py-2 px-6 rounded-full hover:bg-secondary transition add-to-cart">
                            Add to Cart
                        </button>
                    </div>
                    
                    <!-- Recommended Product 3 -->
                    <div class="bg-white p-6 rounded-lg shadow-md text-center product" data-id="rec3">
                        <div class="overflow-hidden rounded-md mb-4">
                            <img src="assets/images/kids/3.jpeg" alt="Recommended Product" class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-2">Kids Cotton Set</h3>
                        <p class="text-gray-600 product-price">₹1,299</p>
                        <button class="mt-4 bg-primary text-white py-2 px-6 rounded-full hover:bg-secondary transition add-to-cart">
                            Add to Cart
                        </button>
                    </div>
                    
                    <!-- Recommended Product 4 -->
                    <div class="bg-white p-6 rounded-lg shadow-md text-center product" data-id="rec4">
                        <div class="overflow-hidden rounded-md mb-4">
                            <img src="assets/images/men/image4.jpg" alt="Recommended Product" class="w-full h-48 object-cover hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="text-xl font-bold text-dark mb-2">Casual Linen Shirt</h3>
                        <p class="text-gray-600 product-price">₹1,599</p>
                        <button class="mt-4 bg-primary text-white py-2 px-6 rounded-full hover:bg-secondary transition add-to-cart">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <!-- Call to Action -->
            <section class="bg-primary text-white rounded-xl p-8 md:p-12 text-center mb-16">
                <h2 class="text-2xl md:text-3xl font-bold mb-4">Ready to Elevate Your Wardrobe?</h2>
                <p class="text-lg mb-6 max-w-2xl mx-auto">Sign up for our newsletter and get 15% off your first order plus exclusive access to new arrivals.</p>
                <form class="max-w-md mx-auto flex">
                    <input type="email" placeholder="Your email address" class="flex-grow py-3 px-4 rounded-l-full focus:outline-none text-dark">
                    <button type="submit" class="bg-dark text-white py-3 px-6 rounded-r-full hover:bg-gray-800 transition duration-300">
                        Subscribe
                    </button>
                </form>
            </section>
        </div>
    </main>

<?php
include('includes/footer.php');
?>