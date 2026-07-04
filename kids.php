<?php
$pageTitle = "Kids Collection - Fashion World";
include('includes/header.php');
?>

<!-- Hero Section -->
<div class="bg-gradient-to-r from-primary to-secondary">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 text-center text-white">
        <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl animate__animated animate__fadeInDown">
            Kids Collection
        </h1>
        <p class="mt-6 text-xl text-light/80 max-w-3xl mx-auto">
            Adorable outfits for your little ones - comfortable, stylish, and fun!
        </p>
        <div class="mt-10 flex justify-center space-x-4">
            <div class="inline-flex rounded-md shadow">
                <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-white hover:bg-gray-100 transition-colors">
                    Shop Boys
                </a>
            </div>
            <div class="inline-flex rounded-md shadow">
                <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-white hover:bg-gray-100 transition-colors">
                    Shop Girls
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Age Categories -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold text-dark mb-6">Shop by Age</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="#" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-4 text-center">
                <div class="mx-auto h-16 w-16 rounded-full bg-light flex items-center justify-center mb-3 text-primary">
                    <i class="fas fa-baby text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-dark">Newborn (0-3M)</h3>
            </div>
        </a>
        <a href="#" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-4 text-center">
                <div class="mx-auto h-16 w-16 rounded-full bg-light flex items-center justify-center mb-3 text-primary">
                    <i class="fas fa-baby-carriage text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-dark">Infant (3-12M)</h3>
            </div>
        </a>
        <a href="#" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-4 text-center">
                <div class="mx-auto h-16 w-16 rounded-full bg-light flex items-center justify-center mb-3 text-primary">
                    <i class="fas fa-child text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-dark">Toddler (1-3Y)</h3>
            </div>
        </a>
        <a href="#" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <div class="p-4 text-center">
                <div class="mx-auto h-16 w-16 rounded-full bg-light flex items-center justify-center mb-3 text-primary">
                    <i class="fas fa-running text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-dark">Kids (4-12Y)</h3>
            </div>
        </a>
    </div>
</div>

<!-- Filter and Sort -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-dark">Featured Kids Products</h2>
        <div class="mt-4 md:mt-0 flex space-x-4">
            <div class="relative">
                <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-10 py-2 text-left focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    <option>Filter by Category</option>
                    <option>Boys</option>
                    <option>Girls</option>
                    <option>Baby</option>
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
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 relative product" data-id="product1">
            <button class="wishlist-btn" onclick="toggleWishlist('product1', 'Dinosaur Graphic Tee', 599, 'assets/images/kids/image1.jfif', this)" data-id="product1">
                <i class="far fa-heart"></i>
            </button>
            <div class="relative">
                <img src="assets/images/kids/image1.jfif" alt="Kids Graphic Tee" class="w-full h-64 object-cover">
                <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                    NEW
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-dark">Dinosaur Graphic Tee</h3>
                <p class="text-gray-600 text-sm mt-1 product-size">Boys (2-6Y)</p>
                <div class="mt-3 flex items-center justify-between">
                    <span class="text-lg font-bold text-dark product-price">₹599</span>
                    <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                        <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 relative product" data-id="product2">
            <button class="wishlist-btn" onclick="toggleWishlist('product2', 'Princess Party Dress', 1299, 'assets/images/kids/image2.webp', this)" data-id="product2">
                <i class="far fa-heart"></i>
            </button>
            <div class="relative">
                <img src="assets/images/kids/image2.webp" alt="Princess Dress" class="w-full h-64 object-cover">
                <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                    BESTSELLER
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-dark">Princess Party Dress</h3>
                <p class="text-gray-600 text-sm mt-1 product-size">Girls (3-8Y)</p>
                <div class="mt-3 flex items-center justify-between">
                    <span class="text-lg font-bold text-dark product-price">₹1,299</span>
                    <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                        <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 relative product" data-id="product3">
            <button class="wishlist-btn" onclick="toggleWishlist('product3', 'Organic Cotton Bodysuit', 499, 'assets/images/kids/image3.webp', this)" data-id="product3">
                <i class="far fa-heart"></i>
            </button>
            <div class="relative">
                <img src="assets/images/kids/image3.webp" alt="Baby Bodysuit" class="w-full h-64 object-cover">
                <div class="absolute top-2 right-2 bg-accent text-white text-xs font-bold px-2 py-1 rounded-full">
                    SALE
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-dark">Organic Cotton Bodysuit</h3>
                <p class="text-gray-600 text-sm mt-1 product-size">Baby (0-12M)</p>
                <div class="mt-3 flex items-center justify-between">
                    <div>
                        <span class="text-lg font-bold text-dark product-price">₹499</span>
                        <span class="ml-2 text-sm text-gray-500 line-through">₹799</span>
                    </div>
                    <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                        <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 relative product" data-id="product4">
            <button class="wishlist-btn" onclick="toggleWishlist('product4', 'Zip-Up Hoodie', 899, 'assets/images/kids/image4.jfif', this)" data-id="product4">
                <i class="far fa-heart"></i>
            </button>
            <div class="relative">
                <img src="assets/images/kids/image4.jfif" class="w-full h-64 object-cover">
                <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                    NEW
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-dark">Zip-Up Hoodie</h3>
                <p class="text-gray-600 text-sm mt-1 product-size">Unisex (4-10Y)</p>
                <div class="mt-3 flex items-center justify-between">
                    <span class="text-lg font-bold text-dark product-price">₹899</span>
                    <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                        <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 5 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 relative product" data-id="product5">
            <button class="wishlist-btn" onclick="toggleWishlist('product5', 'Stretch Denim Jeans', 799, 'assets/images/kids/image5.jpg', this)" data-id="product5">
                <i class="far fa-heart"></i>
            </button>
            <div class="relative">
                <img src="assets/images/kids/image5.jpg" alt="Kids Jeans" class="w-full h-64 object-cover">
                <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                    BESTSELLER
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-dark">Stretch Denim Jeans</h3>
                <p class="text-gray-600 text-sm mt-1 product-size">Boys (4-12Y)</p>
                <div class="mt-3 flex items-center justify-between">
                    <span class="text-lg font-bold text-dark product-price">₹799</span>
                    <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                        <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 6 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 relative product" data-id="product6">
            <button class="wishlist-btn" onclick="toggleWishlist('product6', 'Tutu Skirt Set', 999, 'assets/images/kids/image6.webp', this)" data-id="product6">
                <i class="far fa-heart"></i>
            </button>
            <div class="relative">
                <img src="assets/images/kids/image6.webp" alt="Tutu Skirt" class="w-full h-64 object-cover">
                <div class="absolute top-2 right-2 bg-accent text-white text-xs font-bold px-2 py-1 rounded-full">
                    SALE
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-dark">Tutu Skirt Set</h3>
                <p class="text-gray-600 text-sm mt-1 product-size">Girls (2-6Y)</p>
                <div class="mt-3 flex items-center justify-between">
                    <div>
                        <span class="text-lg font-bold text-dark product-price">₹999</span>
                        <span class="ml-2 text-sm text-gray-500 line-through">₹1,299</span>
                    </div>
                    <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                        <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 7 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 relative product" data-id="product7">
            <button class="wishlist-btn" onclick="toggleWishlist('product7', 'Animal Print Romper', 699, 'assets/images/kids/image7.webp', this)" data-id="product7">
                <i class="far fa-heart"></i>
            </button>
            <div class="relative">
                <img src="assets/images/kids/image7.webp" alt="Baby Romper" class="w-full h-64 object-cover">
                <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                    NEW
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-dark">Animal Print Romper</h3>
                <p class="text-gray-600 text-sm mt-1 product-size">Baby (3-12M)</p>
                <div class="mt-3 flex items-center justify-between">
                    <span class="text-lg font-bold text-dark product-price">₹699</span>
                    <button class="bg-primary text-white px-3 py-1 rounded-full text-sm hover:bg-secondary transition-colors add-to-cart">
                        <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 8 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 relative product" data-id="product8">
            <button class="wishlist-btn" onclick="toggleWishlist('product8', 'Space Pajama Set', 799, 'assets/images/kids/image8.webp', this)" data-id="product8">
                <i class="far fa-heart"></i>
            </button>
            <div class="relative">
                <img src="assets/images/kids/image8.webp" alt="Kids Pajamas" class="w-full h-64 object-cover">
                <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
                    BESTSELLER
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-dark">Space Pajama Set</h3>
                <p class="text-gray-600 text-sm mt-1 product-size">Unisex (2-8Y)</p>
                <div class="mt-3 flex items-center justify-between">
                    <span class="text-lg font-bold text-dark product-price">₹799</span>
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

<!-- Special Offers -->
<div class="bg-light mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-extrabold text-dark text-center mb-8">Special Offers for Kids</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 bg-light rounded-md p-3 text-primary">
                            <i class="fas fa-percentage text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-dark">Bundle Discount</h3>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        Buy any 3 items from our kids collection and get 15% off your entire order.
                    </p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 bg-light rounded-md p-3 text-primary">
                            <i class="fas fa-gift text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-dark">Free Gift</h3>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        Spend over ₹2000 on baby items and receive a free organic cotton bib.
                    </p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 bg-light rounded-md p-3 text-primary">
                            <i class="fas fa-truck text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-dark">Free Shipping</h3>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        Free standard shipping on all kids clothing orders over ₹1500.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->
<div class="bg-white border-t border-gray-250">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="lg:w-0 lg:flex-1">
                <h2 class="text-3xl font-extrabold tracking-tight text-dark sm:text-4xl">
                    Join Our Kids Club
                </h2>
                <p class="mt-3 max-w-3xl text-lg text-gray-500">
                    Get 10% off your first order and be the first to know about new arrivals and special offers for kids.
                </p>
            </div>
            <div class="mt-8 lg:mt-0 lg:ml-8">
                <form class="sm:flex">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required class="w-full px-5 py-3 border border-gray-300 shadow-sm placeholder-gray-400 focus:ring-primary focus:border-primary sm:max-w-xs rounded-md" placeholder="Enter your email">
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                        <button type="submit" class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            Sign Up
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

<?php
include('includes/footer.php');
?>