<?php
$pageTitle = "Product Details - Fashion World";
include('includes/header.php');
?>

<style>
    .product-gallery img {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .product-gallery img:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    .size-option {
        transition: all 0.2s ease;
    }
    .size-option:hover {
        transform: translateY(-2px);
    }
    .add-to-cart-btn {
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(139, 94, 60, 0.3);
    }
    .add-to-cart-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(139, 94, 60, 0.4);
    }
    .featured-product {
        transition: all 0.3s ease;
    }
    .featured-product:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    .discount-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #8b5e3c;
        color: white;
        padding: 2px 8px;
        border-radius: 9999px;
        font-size: 12px;
        font-weight: 600;
    }
</style>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <section class="flex flex-col md:flex-row gap-8 lg:gap-12">
        <!-- Product Gallery -->
        <div class="w-full md:w-1/2">
            <div class="grid grid-cols-2 gap-4 product-gallery">
                <div class="rounded-xl overflow-hidden border border-gray-100 bg-white">
                    <img src="assets/images/d1.1.jpg" class="w-full h-full object-cover" alt="Snitch T-Shirt Front View">
                </div>
                <div class="rounded-xl overflow-hidden border border-gray-100 bg-white">
                    <img src="assets/images/d1.2.jpg" class="w-full h-full object-cover" alt="Snitch T-Shirt Side View">
                </div>
                <div class="rounded-xl overflow-hidden border border-gray-100 bg-white">
                    <img src="assets/images/d1.3.jpg" class="w-full h-full object-cover" alt="Snitch T-Shirt Detail View">
                </div>
                <div class="rounded-xl overflow-hidden border border-gray-100 bg-white">
                    <img src="assets/images/d1.jpg" class="w-full h-full object-cover" alt="Snitch T-Shirt Full View">
                </div> 
            </div>
        </div>
        
        <!-- Product Info -->
        <div class="w-full md:w-1/2">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-3xl font-bold text-dark">Snitch Polo T-Shirt</h1>
                        <p class="text-gray-600 mt-2">Men's Striped Polo Collar Pure Cotton T-Shirt</p>
                        <div class="flex items-center mt-3">
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i>
                                <span class="text-gray-700 font-medium">4.8</span>
                                <span class="text-gray-400 mx-2">|</span>
                                <span class="text-gray-500">128 Reviews</span>
                            </div>
                        </div>
                    </div>
                    <button class="text-gray-400 hover:text-primary transition">
                        <i class="far fa-heart text-xl"></i>
                    </button>
                </div>

                <div class="mt-6 pt-6 border-t border-gray-100">
                    <div class="flex items-center">
                        <span class="text-2xl font-bold text-dark">₹750</span>
                        <span class="text-gray-400 line-through ml-3">₹1820</span>
                        <span class="ml-3 bg-light text-primary px-2 py-1 rounded-md text-sm font-semibold">62% OFF</span>
                    </div>
                    <p class="text-green-600 text-sm mt-1 font-medium">
                        <i class="fas fa-check-circle mr-1"></i> In Stock
                    </p>
                </div>

                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-dark">Select Size</h3>
                    <div class="flex gap-3 mt-3 size-selector">
                        <div class="size-option w-14 h-14 flex justify-center items-center rounded-full border-2 border-gray-200 cursor-pointer hover:border-primary transition" data-size="S">
                            <span class="font-medium text-dark">S</span>
                        </div>
                        <div class="size-option w-14 h-14 flex justify-center items-center rounded-full border-2 border-gray-200 cursor-pointer hover:border-primary transition" data-size="M">
                            <span class="font-medium text-dark">M</span>
                        </div>
                        <div class="size-option w-14 h-14 flex justify-center items-center rounded-full border-2 border-gray-200 cursor-pointer hover:border-primary transition" data-size="L">
                            <span class="font-medium text-dark">L</span>
                        </div>
                        <div class="size-option w-14 h-14 flex justify-center items-center rounded-full border-2 border-gray-200 cursor-pointer hover:border-primary transition" data-size="XL">
                            <span class="font-medium text-dark">XL</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <div class="flex gap-3">
                        <button class="add-to-cart-btn flex-grow bg-primary hover:bg-secondary text-white font-semibold py-3 px-6 rounded-lg transition duration-300">
                            Add to Cart
                        </button>
                        <button class="wishlist-btn-detail border border-primary text-primary hover:bg-light font-semibold p-3 w-14 rounded-lg flex items-center justify-center transition duration-300"
                                onclick="toggleWishlist('snitch-polo', 'Snitch Polo T-Shirt', 750, 'assets/images/d1.jpg', this)" data-id="snitch-polo">
                            <i class="far fa-heart text-xl"></i>
                        </button>
                    </div>
                    <button class="w-full mt-3 bg-white border border-primary text-primary font-semibold py-3 px-6 rounded-lg hover:bg-light transition duration-300">
                        Buy Now
                    </button>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <h3 class="text-lg font-semibold text-dark">Delivery Options</h3>
                    <div class="mt-4 flex">
                        <input type="text" placeholder="Enter your Pincode" class="flex-1 border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <button class="bg-primary text-white px-4 py-2 rounded-r-lg hover:bg-secondary transition">
                            Check
                        </button>
                    </div>
                    <p class="text-gray-500 text-xs mt-2">Please enter PIN code to check delivery time & Pay on Delivery Availability</p>
                </div>

                <div class="mt-6 pt-6 border-t border-gray-100">
                    <div class="flex items-center space-x-4 text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>100% Original Products</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-truck text-primary mr-2"></i>
                            <span>Free Delivery</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 mt-3 text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-exchange-alt text-primary mr-2"></i>
                            <span>Easy 7 days returns</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-shield-alt text-accent mr-2"></i>
                            <span>1 Year Warranty</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mt-6">
                <h3 class="text-xl font-semibold text-dark mb-4">Product Details</h3>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex">
                        <span class="text-gray-500 w-32 flex-shrink-0">Color</span>
                        <span>Olive Green</span>
                    </li>
                    <li class="flex">
                        <span class="text-gray-500 w-32 flex-shrink-0">Pattern</span>
                        <span>Striped</span>
                    </li>
                    <li class="flex">
                        <span class="text-gray-500 w-32 flex-shrink-0">Neck Type</span>
                        <span>Polo Collar</span>
                    </li>
                    <li class="flex">
                        <span class="text-gray-500 w-32 flex-shrink-0">Sleeve Type</span>
                        <span>Long, Regular Sleeves</span>
                    </li>
                    <li class="flex">
                        <span class="text-gray-500 w-32 flex-shrink-0">Fabric</span>
                        <span>100% Premium Cotton</span>
                    </li>
                    <li class="flex">
                        <span class="text-gray-500 w-32 flex-shrink-0">Fit</span>
                        <span>Regular Fit</span>
                    </li>
                    <li class="flex">
                        <span class="text-gray-500 w-32 flex-shrink-0">Care Instructions</span>
                        <span>Machine Wash</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="mt-16">
        <div class="flex justify-center mb-10">
            <h2 class="text-3xl font-bold text-dark relative inline-block">
                <span class="relative z-10 px-4">You May Also Like</span>
                <span class="absolute bottom-1 left-0 right-0 h-2 bg-light z-0"></span>
            </h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="featured-product bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 relative">
                <div class="discount-badge">69% OFF</div>
                <a href="#">
                    <img src="assets/images/tshirt 2.webp" alt="Flying Machine T-Shirt" class="w-full h-64 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="font-bold text-dark">Flying Machine</h3>
                    <p class="text-gray-600 text-sm mt-1">Pure Cotton Relaxed T-Shirt</p>
                    <div class="mt-3 flex items-center justify-between">
                        <div>
                            <span class="font-bold text-dark">₹402</span>
                            <span class="text-gray-400 text-sm line-through ml-1">₹1299</span>
                        </div>
                        <button class="text-primary hover:text-secondary add-to-cart">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="featured-product bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 relative">
                <div class="discount-badge">42% OFF</div>
                <a href="#">
                    <img src="assets/images/tshirt 4.webp" alt="RARE RABBIT T-Shirt" class="w-full h-64 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="font-bold text-dark">RARE RABBIT</h3>
                    <p class="text-gray-600 text-sm mt-1">Men Ringer-2 Printed Polo</p>
                    <div class="mt-3 flex items-center justify-between">
                        <div>
                            <span class="font-bold text-dark">₹1999</span>
                            <span class="text-gray-400 text-sm line-through ml-1">₹2699</span>
                        </div>
                        <button class="text-primary hover:text-secondary add-to-cart">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="featured-product bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 relative">
                <div class="discount-badge">RS.450 OFF</div>
                <a href="#">
                    <img src="assets/images/tshirt 6.webp" alt="Bewakoof T-Shirt" class="w-full h-64 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="font-bold text-dark">Bewakoof</h3>
                    <p class="text-gray-600 text-sm mt-1">Oversized Cotton T-shirt</p>
                    <div class="mt-3 flex items-center justify-between">
                        <div>
                            <span class="font-bold text-dark">₹799</span>
                            <span class="text-gray-400 text-sm line-through ml-1">₹1249</span>
                        </div>
                        <button class="text-primary hover:text-secondary add-to-cart">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="featured-product bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 relative">
                <div class="discount-badge">53% OFF</div>
                <a href="#">
                    <img src="assets/images/tshirt 8.webp" alt="Crazymonk T-Shirt" class="w-full h-64 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="font-bold text-dark">Crazymonk</h3>
                    <p class="text-gray-600 text-sm mt-1">Anime Printed T-shirt</p>
                    <div class="mt-3 flex items-center justify-between">
                        <div>
                            <span class="font-bold text-dark">₹704</span>
                            <span class="text-gray-400 text-sm line-through ml-1">₹1499</span>
                        </div>
                        <button class="text-primary hover:text-secondary add-to-cart">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        cart.init();
        
        // Size selection
        let selectedSize = null;
        document.querySelectorAll('.size-option').forEach(sizeDiv => {
            sizeDiv.addEventListener('click', () => {
                // Remove selection from all sizes
                document.querySelectorAll('.size-option').forEach(div => {
                    div.classList.remove('border-primary', 'bg-light');
                    div.classList.add('border-gray-200');
                });
                
                // Add selection to clicked size
                sizeDiv.classList.remove('border-gray-200');
                sizeDiv.classList.add('border-primary', 'bg-light');
                selectedSize = sizeDiv.dataset.size;
            });
        });
        
        // Add to cart button
        document.querySelector('.add-to-cart-btn').addEventListener('click', () => {
            if (!selectedSize) {
                alert('Please select a size first');
                return;
            }
            
            const product = {
                id: 'snitch-tshirt-' + selectedSize,
                name: 'Snitch Polo T-Shirt (' + selectedSize + ')',
                price: 750,
                size: selectedSize,
                image: 'assets/images/d1.jpg'
            };
            
            cart.addItem(product);
        });
    });
</script>

<?php
include('includes/footer.php');
?>