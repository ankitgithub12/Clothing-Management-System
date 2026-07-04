<?php
$pageTitle = "Men's Collection - Fashion World";
include('includes/header.php');
?>

<style>
    .product-card {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        transform-style: preserve-3d;
    }
    
    .product-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 14px 28px rgba(0,0,0,0.1), 0 10px 10px rgba(0,0,0,0.08);
    }
    
    .cart-btn {
        position: absolute;
        right: 1rem;
        bottom: 1rem;
        background-color: #8b5e3c;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.875rem;
        transition: all 0.2s;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .cart-btn:hover {
        background-color: #6d4c35;
        transform: scale(1.05) translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    
    .cart-btn.added {
        background-color: #047857;
    }
    
    .slider-dot {
        width: 10px;
        height: 10px;
        background-color: rgba(255,255,255,0.5);
        border-radius: 50%;
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .slider-dot.active {
        background-color: white;
        width: 30px;
        border-radius: 5px;
    }
    
    .price-tag {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background-color: #8b5e3c;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-weight: 600;
        z-index: 5;
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    
    .pulse {
        animation: pulse 0.5s ease-in-out;
    }
</style>

<!-- Hero Banner -->
<div class="relative h-[600px] overflow-hidden rounded-lg mx-4 mt-4 shadow-2xl">
    <div class="flex transition-transform duration-500 ease-in-out h-full w-full" id="slider">
        <img src="assets/images/p1.png" class="w-full flex-shrink-0 object-cover h-full">
        <img src="assets/images/p2.png" class="w-full flex-shrink-0 object-cover h-full">
        <img src="assets/images/p3.png" class="w-full flex-shrink-0 object-cover h-full">
    </div>
    <button id="prev" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-dark/80 text-white p-3 rounded-full hover:bg-primary transition-all">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button id="next" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-dark/80 text-white p-3 rounded-full hover:bg-primary transition-all">
        <i class="fas fa-chevron-right"></i>
    </button>
    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex gap-2">
        <div class="slider-dot active" data-index="0"></div>
        <div class="slider-dot" data-index="1"></div>
        <div class="slider-dot" data-index="2"></div>
    </div>
</div>

<!-- Category Heading -->
<div class="text-center py-12">
    <h1 class="text-5xl font-bold text-dark mb-4">Men's Collection</h1>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover premium quality clothing designed for comfort and style. Elevate your wardrobe with our latest arrivals.</p>
</div>

<!-- Product Grid -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <!-- Product 1 - T-Shirt -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md product-card relative product" data-id="men1">
            <button class="wishlist-btn" onclick="toggleWishlist('men1', 'Cotton Printed T-Shirt', 499, 'assets/images/tshirt.jpg', this)" data-id="men1">
                <i class="far fa-heart"></i>
            </button>
            <a href="shop.php" class="block relative h-64 overflow-hidden">
                <img src="assets/images/tshirt.jpg" alt="T-Shirt" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                <div class="price-tag">₹499</div>
            </a>
            <div class="p-4">
                <span class="text-sm text-gray-500">T-Shirt</span>
                <h5 class="text-lg font-semibold text-dark my-1">Cotton Printed T-Shirt</h5>
                <div class="text-primary font-bold product-price">₹499</div>
                <p class="product-size hidden">M</p>
            </div>
            <button class="cart-btn add-to-cart">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </div>

        <!-- Product 2 - Cargo Pants -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md product-card relative product" data-id="men2">
            <button class="wishlist-btn" onclick="toggleWishlist('men2', 'Relaxed Fit Solid Cargo', 1299, 'assets/images/cargopants.webp', this)" data-id="men2">
                <i class="far fa-heart"></i>
            </button>
            <a href="#" class="block relative h-64 overflow-hidden">
                <img src="assets/images/cargopants.webp" alt="Cargo Pants" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                <div class="price-tag">₹1,299</div>
            </a>
            <div class="p-4">
                <span class="text-sm text-gray-500">Cargo Pants</span>
                <h5 class="text-lg font-semibold text-dark my-1">Relaxed Fit Solid Cargo</h5>
                <div class="text-primary font-bold product-price">₹1,299</div>
                <p class="product-size hidden">M</p>
            </div>
            <button class="cart-btn add-to-cart">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </div>

        <!-- Product 3 - Joggers -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md product-card relative product" data-id="men3">
            <button class="wishlist-btn" onclick="toggleWishlist('men3', 'Cotton Printed Joggers', 899, 'assets/images/joggers.jpg', this)" data-id="men3">
                <i class="far fa-heart"></i>
            </button>
            <a href="#" class="block relative h-64 overflow-hidden">
                <img src="assets/images/joggers.jpg" alt="Joggers" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                <div class="price-tag">₹899</div>
            </a>
            <div class="p-4">
                <span class="text-sm text-gray-500">Joggers</span>
                <h5 class="text-lg font-semibold text-dark my-1">Cotton Printed Joggers</h5>
                <div class="text-primary font-bold product-price">₹899</div>
                <p class="product-size hidden">M</p>
            </div>
            <button class="cart-btn add-to-cart">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </div>

        <!-- Product 4 - Suits -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md product-card relative product" data-id="men4">
            <button class="wishlist-btn" onclick="toggleWishlist('men4', 'Luxurious Wool Suit', 4999, 'assets/images/sits.jpg', this)" data-id="men4">
                <i class="far fa-heart"></i>
            </button>
            <a href="#" class="block relative h-64 overflow-hidden">
                <img src="assets/images/sits.jpg" alt="Suits" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                <div class="price-tag">₹4,999</div>
            </a>
            <div class="p-4">
                <span class="text-sm text-gray-500">Suits</span>
                <h5 class="text-lg font-semibold text-dark my-1">Luxurious Wool Suit</h5>
                <div class="text-primary font-bold product-price">₹4,999</div>
                <p class="product-size hidden">M</p>
            </div>
            <button class="cart-btn add-to-cart">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </div>

        <!-- Product 5 - Trackpants -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md product-card relative product" data-id="men5">
            <button class="wishlist-btn" onclick="toggleWishlist('men5', 'Cotton Trackpants', 1099, 'assets/images/Trackpaints.jpg', this)" data-id="men5">
                <i class="far fa-heart"></i>
            </button>
            <a href="#" class="block relative h-64 overflow-hidden">
                <img src="assets/images/Trackpaints.jpg" alt="Trackpants" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                <div class="price-tag">₹1,099</div>
            </a>
            <div class="p-4">
                <span class="text-sm text-gray-500">Trackpants</span>
                <h5 class="text-lg font-semibold text-dark my-1">Cotton Trackpants</h5>
                <div class="text-primary font-bold product-price">₹1,099</div>
                <p class="product-size hidden">M</p>
            </div>
            <button class="cart-btn add-to-cart">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </div>

        <!-- Product 6 - Sneakers -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md product-card relative product" data-id="men6">
            <button class="wishlist-btn" onclick="toggleWishlist('men6', 'Comfortable Sneakers', 2499, 'assets/images/sneakers.jpg', this)" data-id="men6">
                <i class="far fa-heart"></i>
            </button>
            <a href="#" class="block relative h-64 overflow-hidden">
                <img src="assets/images/sneakers.jpg" alt="Sneakers" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                <div class="price-tag">₹2,499</div>
            </a>
            <div class="p-4">
                <span class="text-sm text-gray-500">Sneakers</span>
                <h5 class="text-lg font-semibold text-dark my-1">Comfortable Sneakers</h5>
                <div class="text-primary font-bold product-price">₹2,499</div>
                <p class="product-size hidden">9</p>
            </div>
            <button class="cart-btn add-to-cart">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </div>

        <!-- Product 7 - Shirt -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md product-card relative product" data-id="men7">
            <button class="wishlist-btn" onclick="toggleWishlist('men7', 'Premium Cotton Shirt', 799, 'assets/images/shirt.webp', this)" data-id="men7">
                <i class="far fa-heart"></i>
            </button>
            <a href="#" class="block relative h-64 overflow-hidden">
                <img src="assets/images/shirt.webp" alt="Shirt" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                <div class="price-tag">₹799</div>
            </a>
            <div class="p-4">
                <span class="text-sm text-gray-500">Shirt</span>
                <h5 class="text-lg font-semibold text-dark my-1">Premium Cotton Shirt</h5>
                <div class="text-primary font-bold product-price">₹799</div>
                <p class="product-size hidden">M</p>
            </div>
            <button class="cart-btn add-to-cart">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </div>

        <!-- Product 8 - Shorts -->
        <div class="bg-white rounded-xl overflow-hidden shadow-md product-card relative product" data-id="men8">
            <button class="wishlist-btn" onclick="toggleWishlist('men8', 'Cotton Printed Shorts', 699, 'assets/images/shorts.webp', this)" data-id="men8">
                <i class="far fa-heart"></i>
            </button>
            <a href="#" class="block relative h-64 overflow-hidden">
                <img src="assets/images/shorts.webp" alt="Shorts" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                <div class="price-tag">₹699</div>
            </a>
            <div class="p-4">
                <span class="text-sm text-gray-500">Shorts</span>
                <h5 class="text-lg font-semibold text-dark my-1">Cotton Printed Shorts</h5>
                <div class="text-primary font-bold product-price">₹699</div>
                <p class="product-size hidden">M</p>
            </div>
            <button class="cart-btn add-to-cart">
                <i class="fas fa-shopping-cart"></i> Add to Cart
            </button>
        </div>
    </div>
</div>

<!-- Newsletter Section -->
<div class="bg-dark text-white py-16">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold mb-4">Join Our Newsletter</h2>
        <p class="text-gray-300 mb-8">Subscribe to get updates on new arrivals, special offers and more.</p>
        <div class="flex flex-col sm:flex-row gap-2 max-w-md mx-auto">
            <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary">
            <button class="bg-primary hover:bg-secondary text-white font-semibold px-6 py-3 rounded-lg transition-colors">Subscribe</button>
        </div>
    </div>
</div>

<script>
    // Slider functionality
    const slider = document.getElementById('slider');
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    const dots = document.querySelectorAll('.slider-dot');
    let index = 0;
    
    function updateSlider() {
        slider.style.transform = `translateX(-${index * 100}%)`;
        dots.forEach((dot, idx) => {
            if (idx === index) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
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

    dots.forEach(dot => {
        dot.addEventListener('click', (e) => {
            index = parseInt(e.target.dataset.index);
            updateSlider();
        });
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