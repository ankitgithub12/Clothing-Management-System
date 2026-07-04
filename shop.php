<?php
$pageTitle = "Shop - Fashion World";
include('includes/header.php');
?>

<style>
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .discount-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #8b5e3c;
        color: white;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
    }
</style>

<div id="messageBox" class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-primary text-white px-6 py-3 rounded-full shadow-lg opacity-0 transition-opacity duration-500 z-50 pointer-events-none flex items-center">
    <i class="fas fa-check-circle mr-2"></i>
    Successfully added to your cart!
</div>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-secondary py-16 text-center text-white">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Summer Collection 2024</h1>
        <p class="text-xl mb-8">Discover our latest trends at unbeatable prices</p>
        <a href="new-arrivals.php" class="bg-white text-primary px-6 py-3 rounded-full font-bold hover:bg-gray-100 transition duration-300 inline-block shadow-md">
            Shop New Arrivals
        </a>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <!-- Filter/Sort Bar -->
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h1 class="text-3xl font-bold mb-4 md:mb-0 text-dark">Men's T-Shirts Collection</h1>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <select class="appearance-none bg-white border border-gray-300 rounded-md py-2 pl-3 pr-8 focus:outline-none focus:ring-2 focus:ring-primary">
                    <option>Sort by: Featured</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Newest Arrivals</option>
                    <option>Best Selling</option>
                </select>
                <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
            </div>
            <span class="text-gray-600">42 items</span>
        </div>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Product 1 -->
        <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative product" data-id="p1">
            <div class="discount-badge">62% OFF</div>
            <button class="wishlist-btn" onclick="toggleWishlist('p1', 'Roadster', 750, 'assets/images/tshirt 3.webp', this)" data-id="p1">
                <i class="far fa-heart"></i>
            </button>
            <a href="description.php">
                <img src="assets/images/tshirt 3.webp" alt="Men's T-Shirt" class="w-full h-64 object-cover hover:opacity-90 transition duration-300">
            </a>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-lg mb-1">Roadster</h3>
                        <p class="text-gray-600 text-sm mb-2">Men stripped polo collar tshirt</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">4.2 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <div>
                        <span class="font-semibold text-dark product-price">₹750</span>
                        <span class="text-gray-500 line-through text-sm ml-2">₹1820</span>
                    </div>
                    <button class="bg-primary text-white p-2 rounded-full hover:bg-secondary transition duration-300 add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative product" data-id="p2">
            <div class="discount-badge">69% OFF</div>
            <button class="wishlist-btn" onclick="toggleWishlist('p2', 'Flying Machine', 402, 'assets/images/d2.2.jpg', this)" data-id="p2">
                <i class="far fa-heart"></i>
            </button>
            <a href="desflyingmachine.php">
                <img src="assets/images/d2.2.jpg" alt="Casual T-Shirt" class="w-full h-64 object-cover hover:opacity-90 transition duration-300">
            </a>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-lg mb-1">Flying Machine</h3>
                        <p class="text-gray-600 text-sm mb-2">Pure Cotton Relaxed T-Shirt</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">4.5 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <div>
                        <span class="font-semibold text-dark product-price">₹402</span>
                        <span class="text-gray-500 line-through text-sm ml-2">₹1299</span>
                    </div>
                    <button class="bg-primary text-white p-2 rounded-full hover:bg-secondary transition duration-300 add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative product" data-id="p3">
            <div class="discount-badge">40% OFF</div>
            <button class="wishlist-btn" onclick="toggleWishlist('p3', 'Snitch', 899, 'assets/images/d1.3.jpg', this)" data-id="p3">
                <i class="far fa-heart"></i>
            </button>
            <a href="description.php">
                <img src="assets/images/d1.3.jpg" alt="Polo T-Shirt" class="w-full h-64 object-cover hover:opacity-90 transition duration-300">
            </a>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-lg mb-1">Snitch</h3>
                        <p class="text-gray-600 text-sm mb-2">Men stripped polo collar tshirt</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">4.0 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <div>
                        <span class="font-semibold text-dark product-price">₹899</span>
                        <span class="text-gray-500 line-through text-sm ml-2">₹1499</span>
                    </div>
                    <button class="bg-primary text-white p-2 rounded-full hover:bg-secondary transition duration-300 add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative product" data-id="p4">
            <div class="discount-badge">42% OFF</div>
            <button class="wishlist-btn" onclick="toggleWishlist('p4', 'RARE RABBIT', 1999, 'assets/images/shirt.webp', this)" data-id="p4">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/shirt.webp" alt="Printed T-Shirt" class="w-full h-64 object-cover hover:opacity-90 transition duration-300">
            </a>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-lg mb-1">RARE RABBIT</h3>
                        <p class="text-gray-600 text-sm mb-2">Men Ringer-2 Printed Polo</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">4.7 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <div>
                        <span class="font-semibold text-dark product-price">₹1999</span>
                        <span class="text-gray-500 line-through text-sm ml-2">₹2699</span>
                    </div>
                    <button class="bg-primary text-white p-2 rounded-full hover:bg-secondary transition duration-300 add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 5 -->
        <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative product" data-id="p5">
            <div class="discount-badge">55% OFF</div>
            <button class="wishlist-btn" onclick="toggleWishlist('p5', 'HRX by Hrithik', 499, 'assets/images/men/HRX.webp', this)" data-id="p5">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/men/HRX.webp" alt="Solid T-Shirt" class="w-full h-64 object-cover hover:opacity-90 transition duration-300">
            </a>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-lg mb-1">HRX by Hrithik</h3>
                        <p class="text-gray-600 text-sm mb-2">Men Solid Round Neck T-Shirt</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">4.3 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <div>
                        <span class="font-semibold text-dark product-price">₹499</span>
                        <span class="text-gray-500 line-through text-sm ml-2">₹1099</span>
                    </div>
                    <button class="bg-primary text-white p-2 rounded-full hover:bg-secondary transition duration-300 add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 6 -->
        <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative product" data-id="p6">
            <div class="discount-badge">30% OFF</div>
            <button class="wishlist-btn" onclick="toggleWishlist('p6', 'Levi\'s', 899, 'assets/images/men/LEVIS.webp', this)" data-id="p6">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/men/LEVIS.webp" alt="Printed T-Shirt" class="w-full h-64 object-cover hover:opacity-90 transition duration-300">
            </a>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-lg mb-1">Levi's</h3>
                        <p class="text-gray-600 text-sm mb-2">Men Printed Round Neck T-Shirt</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">4.2 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <div>
                        <span class="font-semibold text-dark product-price">₹899</span>
                        <span class="text-gray-500 line-through text-sm ml-2">₹1299</span>
                    </div>
                    <button class="bg-primary text-white p-2 rounded-full hover:bg-secondary transition duration-300 add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 7 -->
        <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative product" data-id="p7">
            <div class="discount-badge">60% OFF</div>
            <button class="wishlist-btn" onclick="toggleWishlist('p7', 'U.S. Polo Assn.', 999, 'assets/images/men/USPOLO.webp', this)" data-id="p7">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/men/USPOLO.webp" alt="Polo T-Shirt" class="w-full h-64 object-cover hover:opacity-90 transition duration-300">
            </a>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-lg mb-1">U.S. Polo Assn.</h3>
                        <p class="text-gray-600 text-sm mb-2">Men Polo Collar T-Shirt</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">4.4 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <div>
                        <span class="font-semibold text-dark product-price">₹999</span>
                        <span class="text-gray-500 line-through text-sm ml-2">₹2499</span>
                    </div>
                    <button class="bg-primary text-white p-2 rounded-full hover:bg-secondary transition duration-300 add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 8 -->
        <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 relative product" data-id="p8">
            <div class="discount-badge">50% OFF</div>
            <button class="wishlist-btn" onclick="toggleWishlist('p8', 'Jack & Jones', 799, 'assets/images/men/JACK AND JONS.webp', this)" data-id="p8">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/men/JACK AND JONS.webp" alt="Full Sleeve T-Shirt" class="w-full h-64 object-cover hover:opacity-90 transition duration-300">
            </a>
            <div class="p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-bold text-lg mb-1">Jack & Jones</h3>
                        <p class="text-gray-600 text-sm mb-2">Men Full Sleeve Solid T-Shirt</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded">4.1 <i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-3">
                    <div>
                        <span class="font-semibold text-dark product-price">₹799</span>
                        <span class="text-gray-500 line-through text-sm ml-2">₹1599</span>
                    </div>
                    <button class="bg-primary text-white p-2 rounded-full hover:bg-secondary transition duration-300 add-to-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-12">
        <nav class="inline-flex rounded-md shadow">
            <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-light">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#" class="px-4 py-2 border-t border-b border-gray-300 bg-primary text-white font-medium">1</a>
            <a href="#" class="px-4 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-light">2</a>
            <a href="#" class="px-4 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-light">3</a>
            <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-light">
                <i class="fas fa-chevron-right"></i>
            </a>
        </nav>
    </div>
</div>

<!-- Newsletter Section -->
<div class="bg-light py-12 border-t border-gray-200">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold mb-4 text-dark">Subscribe to Our Newsletter</h2>
        <p class="text-gray-600 mb-6 max-w-2xl mx-auto">Get updates on new arrivals, special offers and fashion tips straight to your inbox.</p>
        <div class="max-w-md mx-auto flex">
            <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-l-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary">
            <button class="bg-primary text-white px-6 py-3 rounded-r-md hover:bg-secondary transition duration-300">
                Subscribe
            </button>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>