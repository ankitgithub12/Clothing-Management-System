<?php
$pageTitle = "Women's Collection - Fashion World";
include('includes/header.php');
?>

<style>
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .slider-image {
        height: 600px;
        object-fit: cover;
        object-position: center;
    }
    
    .add-to-cart {
        transition: all 0.3s ease;
    }
</style>

<!-- Hero Slider -->
<div class="relative h-[600px] overflow-hidden rounded-lg m-2 shadow-xl">
    <div class="flex transition-transform duration-500 ease-in-out h-full w-full" id="slider">
        <img src="assets/images/p1.png" class="w-full slider-image flex-shrink-0">
        <img src="assets/images/p2.png" class="w-full slider-image flex-shrink-0">
        <img src="assets/images/p3.png" class="w-full slider-image flex-shrink-0">
    </div>
    <button id="prev" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 text-primary p-3 rounded-full shadow-lg hover:bg-white hover:text-secondary transition-colors">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button id="next" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 text-primary p-3 rounded-full shadow-lg hover:bg-white hover:text-secondary transition-colors">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>

<!-- Category Heading -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
    <h1 class="text-5xl font-bold text-dark mb-4">Women's Collection</h1>
    <p class="text-lg text-gray-600">Discover our latest women's collection designed with elegance and comfort.</p>
</div>

<!-- Products Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Product 1 -->
        <div class="product-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 relative product" data-id="w1">
            <button class="wishlist-btn" onclick="toggleWishlist('w1', 'Women\'s Solid Top', 1299, 'assets/images/w top.webp', this)" data-id="w1">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/w top.webp" alt="Women's Solid Top" class="w-full h-80 object-cover">
            </a>
            <div class="p-4 relative">
                <span class="text-gray-500 text-sm">Tops</span>
                <h3 class="text-lg font-semibold mt-1 text-dark">Women's Solid Top</h3>
                <p class="text-primary font-bold mt-2 product-price">₹1,299</p>
                <p class="text-gray-500 text-sm mt-1 product-size">S, M, L</p>
                <button class="add-to-cart mt-4 w-full bg-primary hover:bg-secondary text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="product-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 relative product" data-id="w2">
            <button class="wishlist-btn" onclick="toggleWishlist('w2', 'Relaxed fit Solid cargo', 1799, 'assets/images/w lower.webp', this)" data-id="w2">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/w lower.webp" alt="Women Cargo" class="w-full h-80 object-cover">
            </a>
            <div class="p-4 relative">
                <span class="text-gray-500 text-sm">Women Cargo</span>
                <h3 class="text-lg font-semibold mt-1 text-dark">Relaxed fit Solid cargo</h3>
                <p class="text-primary font-bold mt-2 product-price">₹1,799</p>
                <p class="text-gray-500 text-sm mt-1 product-size">S, M, L</p>
                <button class="add-to-cart mt-4 w-full bg-primary hover:bg-secondary text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="product-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 relative product" data-id="w3">
            <button class="wishlist-btn" onclick="toggleWishlist('w3', 'Cotton and printed Joggers', 1599, 'assets/images/joggers.jpg', this)" data-id="w3">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/joggers.jpg" alt="Joggers" class="w-full h-80 object-cover">
            </a>
            <div class="p-4 relative">
                <span class="text-gray-500 text-sm">Joggers</span>
                <h3 class="text-lg font-semibold mt-1 text-dark">Cotton and printed Joggers</h3>
                <p class="text-primary font-bold mt-2 product-price">₹1,599</p>
                <p class="text-gray-500 text-sm mt-1 product-size">S, M, L</p>
                <button class="add-to-cart mt-4 w-full bg-primary hover:bg-secondary text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="product-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 relative product" data-id="w4">
            <button class="wishlist-btn" onclick="toggleWishlist('w4', 'Luxurious wool suit', 4299, 'assets/images/sits.jpg', this)" data-id="w4">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/sits.jpg" alt="Suits" class="w-full h-80 object-cover">
            </a>
            <div class="p-4 relative">
                <span class="text-gray-500 text-sm">Suits</span>
                <h3 class="text-lg font-semibold mt-1 text-dark">Luxurious wool suit</h3>
                <p class="text-primary font-bold mt-2 product-price">₹4,299</p>
                <p class="text-gray-500 text-sm mt-1 product-size">S, M, L</p>
                <button class="add-to-cart mt-4 w-full bg-primary hover:bg-secondary text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 5 -->
        <div class="product-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 relative product" data-id="w5">
            <button class="wishlist-btn" onclick="toggleWishlist('w5', 'Cotton printed Trackpants', 1499, 'assets/images/Trackpaints.jpg', this)" data-id="w5">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/Trackpaints.jpg" alt="Trackpants" class="w-full h-80 object-cover">
            </a>
            <div class="p-4 relative">
                <span class="text-gray-500 text-sm">Trackpants</span>
                <h3 class="text-lg font-semibold mt-1 text-dark">Cotton printed Trackpants</h3>
                <p class="text-primary font-bold mt-2 product-price">₹1,499</p>
                <p class="text-gray-500 text-sm mt-1 product-size">S, M, L</p>
                <button class="add-to-cart mt-4 w-full bg-primary hover:bg-secondary text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 6 -->
        <div class="product-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 relative product" data-id="w6">
            <button class="wishlist-btn" onclick="toggleWishlist('w6', 'Comfortable and Stylish', 2699, 'assets/images/sneakers.jpg', this)" data-id="w6">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/sneakers.jpg" alt="Sneakers" class="w-full h-80 object-cover">
            </a>
            <div class="p-4 relative">
                <span class="text-gray-500 text-sm">Sneakers</span>
                <h3 class="text-lg font-semibold mt-1 text-dark">Comfortable and Stylish</h3>
                <p class="text-primary font-bold mt-2 product-price">₹2,699</p>
                <p class="text-gray-500 text-sm mt-1 product-size">8, 9</p>
                <button class="add-to-cart mt-4 w-full bg-primary hover:bg-secondary text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 7 -->
        <div class="product-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 relative product" data-id="w7">
            <button class="wishlist-btn" onclick="toggleWishlist('w7', 'Cotton shirt', 1299, 'assets/images/shirt.webp', this)" data-id="w7">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/shirt.webp" alt="Shirt" class="w-full h-80 object-cover">
            </a>
            <div class="p-4 relative">
                <span class="text-gray-500 text-sm">Shirt</span>
                <h3 class="text-lg font-semibold mt-1 text-dark">Cotton shirt</h3>
                <p class="text-primary font-bold mt-2 product-price">₹1,299</p>
                <p class="text-gray-500 text-sm mt-1 product-size">S, M, L</p>
                <button class="add-to-cart mt-4 w-full bg-primary hover:bg-secondary text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                </button>
            </div>
        </div>

        <!-- Product 8 -->
        <div class="product-card bg-white rounded-xl overflow-hidden shadow-md transition-all duration-300 relative product" data-id="w8">
            <button class="wishlist-btn" onclick="toggleWishlist('w8', 'Cotton printed Shorts', 1199, 'assets/images/shorts.webp', this)" data-id="w8">
                <i class="far fa-heart"></i>
            </button>
            <a href="#">
                <img src="assets/images/shorts.webp" alt="Shorts" class="w-full h-80 object-cover">
            </a>
            <div class="p-4 relative">
                <span class="text-gray-500 text-sm">Shorts</span>
                <h3 class="text-lg font-semibold mt-1 text-dark">Cotton printed Shorts</h3>
                <p class="text-primary font-bold mt-2 product-price">₹1,199</p>
                <p class="text-gray-500 text-sm mt-1 product-size">S, M, L</p>
                <button class="add-to-cart mt-4 w-full bg-primary hover:bg-secondary text-white py-2 px-4 rounded-md transition-colors">
                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter Section -->
<div class="bg-light py-16 border-t border-gray-250">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-dark mb-4">Join Our Newsletter</h2>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">Subscribe to get updates on new arrivals, special offers and other discount information.</p>
        <div class="flex flex-col sm:flex-row justify-center max-w-md mx-auto">
            <input type="email" placeholder="Your email address" class="px-4 py-3 w-full rounded-l-md sm:rounded-r-none rounded-r-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            <button class="mt-2 sm:mt-0 sm:ml-0 px-6 py-3 bg-primary text-white font-medium rounded-r-md sm:rounded-l-none rounded-l-md hover:bg-secondary transition-colors">Subscribe</button>
        </div>
    </div>
</div>

<script>
    // Slider functionality
    const slider = document.getElementById('slider');
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    let index = 0;
    
    function updateSlider() {
        slider.style.transform = `translateX(-${index * 100}%)`;
    }
    
    next.addEventListener('click', () => {
        if (index < 2) {
            index++;
        } else {
            index = 0;
        }
        updateSlider();
    });
    
    prev.addEventListener('click', () => {
        if (index > 0) {
            index--;
        } else {
            index = 2;
        }
        updateSlider();
    });

    // Auto slide change every 5 seconds
    setInterval(() => {
        if (index < 2) {
            index++;
        } else {
            index = 0;
        }
        updateSlider();
    }, 5000);
</script>

<?php
include('includes/footer.php');
?>