<?php
$pageTitle = "Ready to Ship - Fashion World";
include('includes/header.php');
?>

<style>
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .add-to-cart-btn:hover {
        background-color: #6d4c35 !important;
    }
</style>

<!-- Main Content -->
<div class="content py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-primary to-secondary rounded-xl p-8 mb-10 text-white shadow-md">
            <h1 class="text-4xl font-bold mb-4">Ready to Ship Collection</h1>
            <p class="text-lg mb-6">Get your favorite styles delivered quickly - no waiting, no delays!</p>
            <div class="flex items-center space-x-6">
                <div class="flex items-center">
                    <i class="fas fa-shipping-fast text-2xl mr-2"></i>
                    <span>Fast Delivery</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-2xl mr-2"></i>
                    <span>In Stock</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-exchange-alt text-2xl mr-2"></i>
                    <span>Easy Returns</span>
                </div>
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-6 text-dark border-b pb-2">Available Now</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product 1 -->
                <div class="product bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 product-card relative" data-id="rts-001">
                    <button class="wishlist-btn" onclick="toggleWishlist('rts-001', 'Men\'s Formal Shirt', 1299, 'assets/images/men/image1.jpg', this)" data-id="rts-001">
                        <i class="far fa-heart"></i>
                    </button>
                    <div class="relative">
                        <img src="assets/images/men/image1.jpg" alt="Men's Formal Shirt" class="w-full h-72 object-cover">
                        <span class="absolute top-3 left-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full">IN STOCK</span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-1 text-dark">Men's Formal Shirt</h3>
                        <p class="text-gray-600 text-sm mb-2">Available in all sizes</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-500 text-xs ml-2">(24 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="product-price font-bold text-lg text-dark">₹1,299</p>
                            <button class="add-to-cart-btn bg-primary text-white py-2 px-4 rounded-full hover:bg-secondary transition duration-300 flex items-center">
                                <i class="fas fa-shopping-bag mr-2"></i>
                                Add
                            </button>
                        </div>
                        <p class="product-size hidden">One Size</p>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="product bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 product-card relative" data-id="rts-002">
                    <button class="wishlist-btn" onclick="toggleWishlist('rts-002', 'Women\'s Kurti', 999, 'assets/images/women/image2.jpg', this)" data-id="rts-002">
                        <i class="far fa-heart"></i>
                    </button>
                    <div class="relative">
                        <img src="assets/images/women/image2.jpg" alt="Women's Kurti" class="w-full h-72 object-cover">
                        <span class="absolute top-3 left-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full">IN STOCK</span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-1 text-dark">Women's Kurti</h3>
                        <p class="text-gray-600 text-sm mb-2">Multiple colors available</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-gray-500 text-xs ml-2">(18 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="product-price font-bold text-lg text-dark">₹999</p>
                            <button class="add-to-cart-btn bg-primary text-white py-2 px-4 rounded-full hover:bg-secondary transition duration-300 flex items-center">
                                <i class="fas fa-shopping-bag mr-2"></i>
                                Add
                            </button>
                        </div>
                        <p class="product-size hidden">One Size</p>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="product bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 product-card relative" data-id="rts-003">
                    <button class="wishlist-btn" onclick="toggleWishlist('rts-003', 'Kids T-Shirt', 599, 'assets/images/kids/image9.jpeg', this)" data-id="rts-003">
                        <i class="far fa-heart"></i>
                    </button>
                    <div class="relative">
                        <img src="assets/images/kids/image9.jpeg" alt="Kids T-Shirt" class="w-full h-72 object-cover">
                        <span class="absolute top-3 left-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full">IN STOCK</span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-1 text-dark">Kids T-Shirt</h3>
                        <p class="text-gray-600 text-sm mb-2">Age 5-10 years</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-500 text-xs ml-2">(32 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="product-price font-bold text-lg text-dark">₹599</p>
                            <button class="add-to-cart-btn bg-primary text-white py-2 px-4 rounded-full hover:bg-secondary transition duration-300 flex items-center">
                                <i class="fas fa-shopping-bag mr-2"></i>
                                Add
                            </button>
                        </div>
                        <p class="product-size hidden">One Size</p>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="product bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 product-card relative" data-id="rts-004">
                    <button class="wishlist-btn" onclick="toggleWishlist('rts-004', 'Men\'s Casual Shirt', 1099, 'assets/images/men/image2.jpg', this)" data-id="rts-004">
                        <i class="far fa-heart"></i>
                    </button>
                    <div class="relative">
                        <img src="assets/images/men/image2.jpg" alt="Men's Casual Shirt" class="w-full h-72 object-cover">
                        <span class="absolute top-3 left-3 bg-green-500 text-white text-xs px-2 py-1 rounded-full">IN STOCK</span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-1 text-dark">Men's Casual Shirt</h3>
                        <p class="text-gray-600 text-sm mb-2">All sizes in stock</p>
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-500 text-xs ml-2">(27 reviews)</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="product-price font-bold text-lg text-dark">₹1,099</p>
                            <button class="add-to-cart-btn bg-primary text-white py-2 px-4 rounded-full hover:bg-secondary transition duration-300 flex items-center">
                                <i class="fas fa-shopping-bag mr-2"></i>
                                Add
                            </button>
                        </div>
                        <p class="product-size hidden">One Size</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefits Section -->
        <div class="bg-white rounded-xl shadow-md p-8 mb-10">
            <h2 class="text-2xl font-bold mb-6 text-dark border-b pb-2">Why Choose Ready to Ship?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex items-start">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4 text-primary">
                        <i class="fas fa-shipping-fast text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-1 text-dark">Fast Delivery</h3>
                        <p class="text-gray-600">Get your order delivered within 3-5 business days.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4 text-primary">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-1 text-dark">Ready Stock</h3>
                        <p class="text-gray-600">All items are in stock and ready to be shipped.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-full mr-4 text-primary">
                        <i class="fas fa-exchange-alt text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-1 text-dark">Easy Returns</h3>
                        <p class="text-gray-600">15 days easy return policy on all ready to ship items.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize cart
        cart.init();
        
        // Add event listeners to all "Add to Cart" buttons
        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const productCard = e.target.closest('.product');
                const productId = productCard.dataset.id;
                const productName = productCard.querySelector('h3').textContent;
                const productPrice = parseFloat(productCard.querySelector('.product-price').textContent.replace('₹', '').replace(',', ''));
                const productImage = productCard.querySelector('img').src;
                const productSize = productCard.querySelector('.product-size').textContent;
                
                const product = {
                    id: productId,
                    name: productName,
                    price: productPrice,
                    size: productSize,
                    image: productImage
                };
                
                cart.addItem(product);
                
                // Visual feedback
                const originalText = e.target.innerHTML;
                e.target.innerHTML = '<i class="fas fa-check mr-2"></i> Added';
                e.target.classList.remove('bg-primary', 'hover:bg-secondary');
                e.target.classList.add('bg-green-600', 'hover:bg-green-700');
                
                // Update cart count in navbar
                const cartCount = document.querySelector('.cart-count');
                cartCount.classList.add('animate-ping');
                setTimeout(() => {
                    cartCount.classList.remove('animate-ping');
                }, 500);
                
                // Reset button after 1.5 seconds
                setTimeout(() => {
                    e.target.innerHTML = originalText;
                    e.target.classList.remove('bg-green-600', 'hover:bg-green-700');
                    e.target.classList.add('bg-primary', 'hover:bg-secondary');
                }, 1500);
            });
        });
    });
</script>

<?php
include('includes/footer.php');
?>