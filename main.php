<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontier Phagwara</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        customBrown: "#8b5e3c",
                    },
                },
            },
        };
    </script>

    <style>
        /* Ensures footer stays at the bottom */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex-grow: 1;
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Top Bar -->
    <div class="bg-gray-500 text-white px-2 py-4 text-sm text-center relative">
        FREE SHIPPING - PAN INDIA | POST BILLING, REACH OUT TO +91-9814200018 FOR STITCHING / CUSTOMIZATION ASSISTANCE  
        <span class="absolute right-5">
            <a href="login.php" class="ml-4 font-bold hover:underline transition duration-300">Login</a>
            <a href="createaccount.php" class="ml-2 font-bold hover:underline transition duration-300">Create Account</a>

        </span>
    </div>

    <!-- Main Navbar -->
    <nav class="flex justify-between items-center bg-white py-4 px-5 border-b border-gray-300">
        <h1 class="text-gray-800 text-2xl font-bold">Frontier Phagwara</h1>

        <ul class="hidden lg:flex list-none space-x-6">
            <li><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">Home</a></li>
            <li><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">New Arrivals</a></li>
            <li><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">Shop</a></li>
            <li><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">Category</a></li>
            <li><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">Ready to Ship</a></li>
            <li><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">Help & Care</a></li>
        </ul>

        <div class="flex items-center">
            <input type="text" id="search-bar" class="py-1 px-2 border border-gray-300 rounded-md mr-2" placeholder="Search">
            <span class="text-xl cursor-pointer mr-2" aria-label="Search">🔍</span>
            <span class="text-xl cursor-pointer" aria-label="Cart">🛒</span>
        </div>

        <div class="menu-btn lg:hidden text-2xl cursor-pointer">☰</div>
    </nav>

    <!-- Mobile Menu -->
    <ul id="mobile-menu" class="hidden lg:hidden flex-col bg-white text-center py-4 px-2">
        <li class="py-2"><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">Home</a></li>
        <li class="py-2"><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">New Arrivals</a></li>
        <li class="py-2"><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">Shop</a></li>
        <li class="py-2"><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">Category</a></li>
        <li class="py-2"><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">Ready to Ship</a></li>
        <li class="py-2"><a href="#" class="text-black text-lg font-bold hover:text-customBrown transition duration-300">Help & Care</a></li>
    </ul>

    <!-- Main Content -->
    <div class="content p-6 text-center">
        <h2 class="text-2xl font-semibold text-gray-800">Welcome to Frontier Phagwara</h2>
        <p class="mt-2 text-gray-600">Discover the latest arrivals and shop exclusive collections.</p>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-500 to-gray-200 py-6 mt-auto">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center md:text-left">
                
                <div>
                    <h2 class="font-semibold text-lg">Online Shopping</h2>
                    <ul class="mt-2 space-y-1 text-gray-900">
                        <li class="cursor-pointer hover:underline">Men</li>
                        <li class="cursor-pointer hover:underline">Women</li>
                        <li class="cursor-pointer hover:underline">Kids</li>
                        <li class="cursor-pointer hover:underline">Gift Cards</li>
                    </ul>
                </div>

                <div>
                    <h2 class="font-semibold text-lg">Customer Services</h2>
                    <ul class="mt-2 space-y-1 text-gray-900">
                        <li class="cursor-pointer hover:underline">Contact Us</li>
                        <li class="cursor-pointer hover:underline">Terms and Conditions</li>
                        <li class="cursor-pointer hover:underline">Shipping</li>
                        <li class="cursor-pointer hover:underline">Track Order</li>
                        <li class="cursor-pointer hover:underline">Cancellation</li>
                        <li class="cursor-pointer hover:underline">Returns</li>
                        <li class="cursor-pointer hover:underline">Privacy Policy</li>
                    </ul>
                </div>

                <div>
                    <h2 class="font-semibold text-lg">Connect with Us</h2>
                    <div class="flex justify-center md:justify-start mt-3 gap-4">
                        <a href="#"><img src="icons8-facebook-logo-50.png" alt="Facebook" class="w-10"></a>
                        <a href="#"><img src="icons8-instagram-50.png" alt="Instagram" class="w-10"></a>
                        <a href="#"><img src="icons8-twitter-50.png" alt="Twitter" class="w-10"></a>
                        <a href="#"><img src="icons8-youtube-50.png" alt="YouTube" class="w-10"></a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-400 text-center text-sm text-gray-700 mt-4 pt-3">
                <p>Conditions of Use & Sale | Privacy Notice | Interest-Based Ads</p>
                <p>© 2024-2025, Inc. or its affiliates</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        const menuBtn = document.querySelector('.menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>
