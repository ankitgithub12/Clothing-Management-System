<?php
$pageTitle = "New Arrivals - Fashion World";
include('includes/header.php');
?>





    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-primary to-secondary">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                New Arrivals
            </h1>
            <p class="mt-6 text-xl text-indigo-100 max-w-3xl mx-auto">
                Discover our latest collection of trendy clothing for all seasons.
            </p>
            <div class="mt-10 flex justify-center">
                <div class="inline-flex rounded-md shadow">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-white hover:bg-gray-50">
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter and Sort -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Latest Products</h2>
            <div class="mt-4 md:mt-0 flex space-x-4">
                <div class="relative">
                    <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-10 py-2 text-left focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        <option>Filter by Category</option>
                        <option>Men</option>
                        <option>Women</option>
                        <option>Kids</option>
                        <option>Accessories</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-400"></i>
                </div>
                <div class="relative">
                    <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-10 py-2 text-left focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        <option>Sort by</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest</option>
                        <option>Popular</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-400"></i>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Product 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 product" data-id="na1">
                <div class="relative">
                    <img src="assets/images/men/denim1.jpeg" alt="Denim Jacket" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                        NEW
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">Classic Denim Jacket</h3>
                    <p class="text-gray-600 text-sm mt-1 product-size">Men's Fashion</p>
                    <div class="mt-3 flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-900 product-price">₹4,999</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                            <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 product" data-id="na2">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1551232864-3f0890e580d9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Summer Dress" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                        NEW
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">Floral Summer Dress</h3>
                    <p class="text-gray-600 text-sm mt-1 product-size">Women's Fashion</p>
                    <div class="mt-3 flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-900 product-price">₹3,299</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                            <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 product" data-id="na3">
                <div class="relative">
                    <img src="assets/images/men/snekars.webp" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2 bg-accent text-white text-xs font-bold px-2 py-1 rounded-full">
                        SALE
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">Urban Casual Sneakers</h3>
                    <p class="text-gray-600 text-sm mt-1 product-size">Unisex Footwear</p>
                    <div class="mt-3 flex items-center justify-between">
                        <div>
                            <span class="text-lg font-bold text-gray-900 product-price">₹4,149</span>
                            <span class="ml-2 text-sm text-gray-500 line-through">₹5,799</span>
                        </div>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                            <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 product" data-id="na4">
                <div class="relative">
                    <img src="assets/images/women/generic.webp" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                        NEW
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">Abstract Graphic T-Shirt</h3>
                    <p class="text-gray-600 text-sm mt-1 product-size">Unisex Apparel</p>
                    <div class="mt-3 flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-900 product-price">₹2,099</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                            <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 product" data-id="na5">
                <div class="relative">
                    <img src="assets/images/men/image15.webp" alt="Wool Beanie" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                        NEW
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">Knit Wool Beanie</h3>
                    <p class="text-gray-600 text-sm mt-1 product-size">Winter Accessories</p>
                    <div class="mt-3 flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-900 product-price">₹1,699</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                            <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 product" data-id="na6">
                <div class="relative">
                    <img src="assets/images/men/shopping.webp" alt="Chino Pants" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2 bg-accent text-white text-xs font-bold px-2 py-1 rounded-full">
                        SALE
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">Slim Fit Chino Pants</h3>
                    <p class="text-gray-600 text-sm mt-1 product-size">Men's Bottoms</p>
                    <div class="mt-3 flex items-center justify-between">
                        <div>
                            <span class="text-lg font-bold text-gray-900 product-price">₹3,749</span>
                            <span class="ml-2 text-sm text-gray-500 line-through">₹4,999</span>
                        </div>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                            <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 7 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 product" data-id="na7">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1554412933-514a83d2f3c8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Silk Scarf" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                        NEW
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">Luxury Silk Scarf</h3>
                    <p class="text-gray-600 text-sm mt-1 product-size">Women's Accessories</p>
                    <div class="mt-3 flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-900 product-price">₹2,899</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                            <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 product" data-id="na8">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1520367445093-50dc08a59d9d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Athletic Shorts" class="w-full h-64 object-cover">
                    <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                        NEW
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">Performance Athletic Shorts</h3>
                    <p class="text-gray-600 text-sm mt-1 product-size">Sportswear</p>
                    <div class="mt-3 flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-900 product-price">₹2,499</span>
                        <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                            <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center space-x-2">
                <a href="#" class="text-gray-500 hover:text-primary p-2 inline-flex items-center">
                    <i class="fas fa-chevron-left"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a href="#" class="w-10 h-10 bg-primary text-white rounded-full inline-flex items-center justify-center font-medium">1</a>
                <a href="#" class="w-10 h-10 text-gray-500 hover:text-primary rounded-full inline-flex items-center justify-center font-medium">2</a>
                <a href="#" class="w-10 h-10 text-gray-500 hover:text-primary rounded-full inline-flex items-center justify-center font-medium">3</a>
                <span class="text-gray-500 p-2">...</span>
                <a href="#" class="w-10 h-10 text-gray-500 hover:text-primary rounded-full inline-flex items-center justify-center font-medium">8</a>
                <a href="#" class="text-gray-500 hover:text-primary p-2 inline-flex items-center">
                    <span class="sr-only">Next</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
            </nav>
        </div>
    </div>

    <!-- Newsletter -->
    <div class="bg-gray-100 mt-16">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="lg:w-0 lg:flex-1">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Sign up for our newsletter
                    </h2>
                    <p class="mt-3 max-w-3xl text-lg text-gray-500">
                        Stay updated with our latest collections and exclusive offers.
                    </p>
                </div>
                <div class="mt-8 lg:mt-0 lg:ml-8">
                    <form class="sm:flex">
                        <label for="email-address" class="sr-only">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required class="w-full px-5 py-3 border border-gray-300 shadow-sm placeholder-gray-400 focus:ring-primary focus:border-primary sm:max-w-xs rounded-md" placeholder="Enter your email">
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                            <button type="submit" class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                Subscribe
                            </button>
                        </div>
                    </form>
                    <p class="mt-3 text-sm text-gray-500">
                        We care about your data. Read our
                        <a href="#" class="font-medium text-primary underline">Privacy Policy</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    



<?php
include('includes/footer.php');
?>