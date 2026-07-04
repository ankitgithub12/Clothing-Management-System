<?php
$pageTitle = "Flying Machine Shirt - Fashion World";
include('includes/header.php');
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <section class="flex flex-col md:flex-row gap-8 lg:gap-12">
        <div class="w-full md:w-1/2 flex justify-center items-start">
            <div class="grid grid-cols-2 gap-4">
                <div class="border rounded-md hover:shadow-xl overflow-hidden bg-white">
                    <img src="assets/images/d2.4.jpg" class="object-cover rounded-md hover:scale-105 transition duration-300 w-full" alt="">
                </div>
                <div class="border rounded-md hover:shadow-xl overflow-hidden bg-white">
                    <img src="assets/images/d2.jpg" class="object-cover rounded-md hover:scale-105 transition duration-300 w-full" alt="">
                </div>
                <div class="border rounded-md hover:shadow-xl overflow-hidden bg-white">
                    <img src="assets/images/d2.1.jpg" class="object-cover rounded-md hover:scale-105 transition duration-300 w-full" alt="">
                </div>
                <div class="border rounded-md hover:shadow-xl overflow-hidden bg-white">
                    <img src="assets/images/d2.2.jpg" class="object-cover rounded-md hover:scale-105 transition duration-300 w-full" alt="">
                </div> 
            </div>
        </div>
          
        <div class="w-full md:w-1/2 space-y-6">
            <h1 class="text-3xl font-bold text-dark">Flying Machine</h1>
            <p class="text-gray-600">Drop-Shoulder Sleeves Pure Cotton Relaxed Fit T-shirt</p>

            <p class="text-2xl font-semibold border-t pt-4">₹750 
                <span class="text-gray-500 line-through text-base ml-2">₹1820</span>
                <span class="text-primary text-lg ml-2">(62% OFF)</span>
            </p>

            <div>
                <p class="font-medium py-2 text-dark">Select Size</p>
                <div class="flex gap-4 size-selector">
                    <div class="w-14 h-14 ring-1 ring-gray-300 flex justify-center items-center rounded-full hover:ring-primary cursor-pointer transition text-dark font-medium" data-size="S">S</div>
                    <div class="w-14 h-14 ring-1 ring-gray-300 flex justify-center items-center rounded-full hover:ring-primary cursor-pointer transition text-dark font-medium" data-size="M">M</div>
                    <div class="w-14 h-14 ring-1 ring-gray-300 flex justify-center items-center rounded-full hover:ring-primary cursor-pointer transition text-dark font-medium" data-size="L">L</div>
                    <div class="w-14 h-14 ring-1 ring-gray-300 flex justify-center items-center rounded-full hover:ring-primary cursor-pointer transition text-dark font-medium" data-size="XL">XL</div>
                </div>
            </div>
            
            <div class="pt-2 flex gap-3">
                <button class="bg-primary text-white px-8 py-3 rounded-lg hover:bg-secondary transition duration-300 add-to-cart-btn font-semibold shadow-md flex-grow">Add to Cart</button>
                <button class="wishlist-btn-detail border border-primary text-primary hover:bg-light font-semibold p-3 w-14 rounded-lg flex items-center justify-center transition duration-300"
                        onclick="toggleWishlist('flying-machine', 'Flying Machine Shirt', 750, 'assets/images/d2.jpg', this)" data-id="flying-machine">
                    <i class="far fa-heart text-xl"></i>
                </button>
            </div>
            
            <div class="border-t pt-6 space-y-4 text-gray-700">
                <p class="font-semibold text-dark">Delivery option</p>
                <div class="flex">
                    <input type="text" placeholder="Enter your Pincode" class="border border-gray-300 rounded-l-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary w-1/2">
                    <button class="bg-primary text-white px-4 py-2 rounded-r-md hover:bg-secondary transition">Check</button>
                </div>
                <p class="text-xs text-gray-500">Please enter PIN code to check delivery time & Pay on Delivery Availability</p>
                
                <div class="grid grid-cols-2 gap-4 text-sm pt-4 border-t">
                    <p><i class="fas fa-check-circle text-green-500 mr-2"></i>100% Original Products</p>
                    <p><i class="fas fa-truck text-primary mr-2"></i>Pay on delivery available</p>
                    <p><i class="fas fa-exchange-alt text-primary mr-2"></i>Easy 7 days returns</p>
                </div>
                
                <div class="border-t pt-6">
                    <p class="text-xl font-medium text-dark pb-2">Product Details </p>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        <li>Olive green Tshirt for men</li>
                        <li>Striped</li>
                        <li>Regular length</li>
                        <li>Polo collar</li>
                        <li>Long, regular sleeves</li>
                        <li>Knitted blended fabric</li>
                        <li>Button closure</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <div class="mt-16 border-t pt-12">
        <div class="flex justify-center mb-8">
            <h2 class="text-3xl font-bold text-dark">Featured Products</h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <!-- Item 1 -->
            <div class="border rounded-xl p-3 shadow-md relative hover:shadow-xl bg-white flex flex-col justify-between">
                <a href="#"><img src="assets/images/tshirt 10.webp" alt="" class="rounded-lg w-full h-48 object-cover transition duration-300 transform hover:scale-98"></a>
                <div class="mt-3">
                    <h5 class="text-sm font-bold text-dark">THE BEAR HOUSE</h5>
                    <p class="text-gray-500 text-xs truncate">Polo Collar Pure Cotton Slim Fit T-shirt</p>
                    <p class="font-semibold text-dark mt-2">₹618 <span class="text-gray-400 font-light text-[10px] ml-0.5"><del>₹1995</del></span><span class="text-primary ml-1 text-xs">(69% off)</span></p>
                </div>
                <button class="mt-3 w-full bg-primary hover:bg-secondary text-white py-1 rounded text-sm add-to-cart flex items-center justify-center gap-1">
                    <i class="fas fa-shopping-cart text-xs"></i> Add
                </button>
            </div>
           
            <!-- Item 2 -->
            <div class="border rounded-xl p-3 shadow-md relative hover:shadow-xl bg-white flex flex-col justify-between">
                <a href="#"><img src="assets/images/tshirt 4.webp" alt="" class="rounded-lg w-full h-48 object-cover transition duration-300 transform hover:scale-98"></a>
                <div class="mt-3">
                    <h5 class="text-sm font-bold text-dark">RARE RABBIT</h5>
                    <p class="text-gray-500 text-xs truncate">Men Ringer-2 Printed Polo</p>
                    <p class="font-semibold text-dark mt-2">₹1999 <span class="text-gray-400 font-light text-[10px] ml-0.5"><del>₹2699</del></span><span class="text-primary ml-1 text-xs">(42% off)</span></p>
                </div>
                <button class="mt-3 w-full bg-primary hover:bg-secondary text-white py-1 rounded text-sm add-to-cart flex items-center justify-center gap-1">
                    <i class="fas fa-shopping-cart text-xs"></i> Add
                </button>
            </div>
            
            <!-- Item 3 -->
            <div class="border rounded-xl p-3 shadow-md relative hover:shadow-xl bg-white flex flex-col justify-between">
                <a href="#"><img src="assets/images/tshirt 6.webp" alt="" class="rounded-lg w-full h-48 object-cover transition duration-300 transform hover:scale-98"></a>
                <div class="mt-3">
                    <h5 class="text-sm font-bold text-dark">Bewakoof</h5>
                    <p class="text-gray-500 text-xs truncate">Short Sleeves Cotton Oversized T-shirt</p>
                    <p class="font-semibold text-dark mt-2">₹799 <span class="text-gray-400 font-light text-[10px] ml-0.5"><del>₹1249</del></span><span class="text-primary ml-1 text-xs">(Rs.450 off)</span></p>
                </div>
                <button class="mt-3 w-full bg-primary hover:bg-secondary text-white py-1 rounded text-sm add-to-cart flex items-center justify-center gap-1">
                    <i class="fas fa-shopping-cart text-xs"></i> Add
                </button>
            </div>
            
            <!-- Item 4 -->
            <div class="border rounded-xl p-3 shadow-md relative hover:shadow-xl bg-white flex flex-col justify-between">
                <a href="#"><img src="assets/images/tshirt 7.webp" alt="" class="rounded-lg w-full h-48 object-cover transition duration-300 transform hover:scale-98"></a>
                <div class="mt-3">
                    <h5 class="text-sm font-bold text-dark">H&M</h5>
                    <p class="text-gray-500 text-xs truncate">Regular Fit Round-Neck T-shirt</p>
                    <p class="font-semibold text-dark mt-2">₹750 <span class="text-gray-400 font-light text-[10px] ml-0.5"><del>₹1820</del></span><span class="text-primary ml-1 text-xs">(62% off)</span></p>
                </div>
                <button class="mt-3 w-full bg-primary hover:bg-secondary text-white py-1 rounded text-sm add-to-cart flex items-center justify-center gap-1">
                    <i class="fas fa-shopping-cart text-xs"></i> Add
                </button>
            </div>
            
            <!-- Item 5 -->
            <div class="border rounded-xl p-3 shadow-md relative hover:shadow-xl bg-white flex flex-col justify-between">
                <a href="#"><img src="assets/images/tshirt 8.webp" alt="" class="rounded-lg w-full h-48 object-cover transition duration-300 transform hover:scale-98"></a>
                <div class="mt-3">
                    <h5 class="text-sm font-bold text-dark">Crazymonk</h5>
                    <p class="text-gray-500 text-xs truncate">Unisex Anime Printed Oversized T-shirt</p>
                    <p class="font-semibold text-dark mt-2">₹704 <span class="text-gray-400 font-light text-[10px] ml-0.5"><del>₹1499</del></span><span class="text-primary ml-1 text-xs">(53% off)</span></p>
                </div>
                <button class="mt-3 w-full bg-primary hover:bg-secondary text-white py-1 rounded text-sm add-to-cart flex items-center justify-center gap-1">
                    <i class="fas fa-shopping-cart text-xs"></i> Add
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        cart.init();
        
        // Size selection
        let selectedSize = null;
        document.querySelectorAll('.size-selector div').forEach(sizeDiv => {
            sizeDiv.addEventListener('click', () => {
                // Remove selection from all sizes
                document.querySelectorAll('.size-selector div').forEach(div => {
                    div.classList.remove('ring-primary', 'bg-light');
                    div.classList.add('ring-gray-300');
                });
                
                // Add selection to clicked size
                sizeDiv.classList.remove('ring-gray-300');
                sizeDiv.classList.add('ring-primary', 'bg-light');
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
                id: 'flying-machine-tshirt-' + selectedSize,
                name: 'Flying Machine Drop-Shoulder T-Shirt (' + selectedSize + ')',
                price: 750,
                size: selectedSize,
                image: 'assets/images/d2.jpg'
            };
            
            cart.addItem(product);
        });
    });
</script>

<?php
include('includes/footer.php');
?>