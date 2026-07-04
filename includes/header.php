<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Include database configuration
$db_path = __DIR__ . '/../config/database.php';
if (file_exists($db_path)) {
    include_once($db_path);
}

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_name'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Fashion World'; ?></title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Cart JS -->
    <script src="assets/js/cart.js"></script>

    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#8b5e3c",
                        secondary: "#6d4c35",
                        accent: "#a07856",
                        dark: "#2d2d2d",
                        light: "#f8f5f2"
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                },
            },
        };
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f5f2;
        }
        .content {
            flex-grow: 1;
        }
        .nav-link {
            position: relative;
        }
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #8b5e3c;
            transition: width 0.3s ease;
        }
        .nav-link:hover:after {
            width: 100%;
        }
        .category-card {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .user-dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1000;
            border-radius: 0.5rem;
        }
        .user-dropdown a {
            display: block;
            padding: 0.75rem 1rem;
            color: #2d2d2d;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .user-dropdown a:hover {
            background-color: #f8f5f2;
        }
        .user-avatar {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #8b5e3c;
            color: white;
            font-weight: bold;
            margin-right: 0.5rem;
        }
        .cart-notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #047857;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.3s ease-out;
            z-index: 2000;
        }
        .cart-notification.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        /* Wishlist Floating Button Style */
        .wishlist-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.12);
            color: #8b5e3c;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            z-index: 10;
        }
        .wishlist-btn:hover {
            background: #8b5e3c;
            color: white !important;
            transform: scale(1.1);
        }
    </style>
    
    <!-- Global Wishlist Functionality -->
    <script>
        function updateWishlistUI() {
            const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            const countElements = document.querySelectorAll('.wishlist-count');
            countElements.forEach(el => {
                el.textContent = wishlist.length;
            });
        }
        
        function toggleWishlist(id, name, price, image, btn) {
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            const index = wishlist.findIndex(item => item.id === id);
            
            const icon = btn.querySelector('i');
            if (index > -1) {
                wishlist.splice(index, 1);
                icon.className = 'far fa-heart';
                icon.classList.remove('text-red-500');
            } else {
                wishlist.push({ id, name, price, image });
                icon.className = 'fas fa-heart text-red-500 animate__animated animate__heartBeat';
            }
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
            updateWishlistUI();
        }
        
        function initWishlistButtons() {
            const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            document.querySelectorAll('.wishlist-btn, .wishlist-btn-detail').forEach(btn => {
                const id = btn.dataset.id;
                const icon = btn.querySelector('i');
                if (id && icon) {
                    if (wishlist.some(item => item.id === id)) {
                        icon.className = 'fas fa-heart text-red-500';
                    } else {
                        icon.className = 'far fa-heart';
                    }
                }
            });
        }
        
        document.addEventListener('DOMContentLoaded', () => {
            updateWishlistUI();
            initWishlistButtons();
        });
    </script>
</head>
<body class="bg-light">

    <!-- Top Bar -->
    <div class="bg-dark text-white px-4 py-3 text-sm text-center relative z-50">
        <div class="max-w-7xl mx-auto">
            <span class="hidden md:inline-block">FREE SHIPPING - PAN INDIA | POST BILLING, REACH OUT TO +91-9814200018 FOR STITCHING / CUSTOMIZATION ASSISTANCE</span>
            <span class="inline-block md:hidden">FREE SHIPPING PAN INDIA | CALL +91-6395204834</span>
            <span class="absolute right-4 top-1/2 transform -translate-y-1/2 hidden md:inline-block">
                <?php if ($isLoggedIn): ?>
                    <div class="relative inline-block group">
                        <button class="flex items-center font-medium hover:text-accent transition duration-300">
                            <span class="user-avatar"><?= strtoupper(substr($userName, 0, 1)) ?></span>
                            <span><?= htmlspecialchars($userName) ?></span>
                            <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div class="user-dropdown group-hover:block">
                            <a href="profile.php"><i class="fas fa-user mr-2"></i> My Profile</a>
                            <a href="orders.php"><i class="fas fa-shopping-bag mr-2"></i> My Orders</a>
                            <a href="wishlist.php"><i class="fas fa-heart mr-2"></i> Wishlist</a>
                            <a href="logout.php"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="ml-4 font-medium hover:text-accent transition duration-300">
                        <i class="fas fa-user mr-1"></i>Login
                    </a>
                    <a href="createaccount.php" class="ml-3 font-medium hover:text-accent transition duration-300">
                        <i class="fas fa-user-plus mr-1"></i>Register
                    </a>
                <?php endif; ?>
            </span>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav class="bg-white shadow-md py-3 px-4 md:px-6 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="index.php" class="text-2xl font-bold text-dark hover:text-primary transition duration-300 flex items-center">
                <i class="fas fa-tshirt text-primary mr-2"></i>
                <span>Fashion World</span>
            </a>

            <ul class="hidden lg:flex list-none space-x-8 m-0 p-0">
                <li><a href="index.php" class="nav-link text-dark font-medium hover:text-primary">Home</a></li>
                <li><a href="new-arrivals.php" class="nav-link text-dark font-medium hover:text-primary">New Arrivals</a></li>
                <li><a href="shop.php" class="nav-link text-dark font-medium hover:text-primary">Shop</a></li>
                <li class="relative group">
                    <a href="men.php" class="nav-link text-dark font-medium hover:text-primary flex items-center">
                        Categories <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </a>
                    <div class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md py-2 z-10 hidden group-hover:block">
                        <a href="men.php" class="block px-4 py-2 text-dark hover:bg-primary hover:text-white">Men</a>
                        <a href="women.php" class="block px-4 py-2 text-dark hover:bg-primary hover:text-white">Women</a>
                        <a href="kids.php" class="block px-4 py-2 text-dark hover:bg-primary hover:text-white">Kids</a>
                    </div>
                </li>
                <li><a href="readytoship.php" class="nav-link text-dark font-medium hover:text-primary">Ready to Ship</a></li>
                <li><a href="help.php" class="nav-link text-dark font-medium hover:text-primary">Help</a></li>
            </ul>

            <div class="flex items-center space-x-5">
                <div class="relative hidden md:block">
                    <input type="text" id="search-bar" class="py-2 px-4 pl-10 border border-gray-200 rounded-full focus:outline-none focus:ring-1 focus:ring-primary" placeholder="Search...">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                
                <!-- Wishlist Icon -->
                <a href="wishlist.php" class="relative">
                    <i class="far fa-heart text-xl text-dark hover:text-primary transition duration-300"></i>
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-[10px] font-bold rounded-full h-4 w-4 flex items-center justify-center wishlist-count">0</span>
                </a>
                
                <!-- Cart Icon -->
                <a href="cart.php" class="relative">
                    <i class="fas fa-shopping-bag text-xl text-dark hover:text-primary transition duration-300"></i>
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-[10px] font-bold rounded-full h-4 w-4 flex items-center justify-center cart-count">0</span>
                </a>
                
                <!-- User Account Dropdown -->
                <div class="relative group hidden lg:block">
                    <a href="profile.php" class="flex items-center text-dark hover:text-primary transition duration-300">
                        <i class="fas fa-user-circle text-2xl"></i>
                    </a>
                    <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-2 z-50 hidden group-hover:block border border-gray-100">
                        <?php if ($isLoggedIn): ?>
                            <div class="px-4 py-2 border-b border-gray-100 text-xs font-semibold text-gray-500 truncate max-w-full">
                                Hi, <?= htmlspecialchars($userName) ?>
                            </div>
                            <a href="profile.php" class="block px-4 py-2 text-sm text-dark hover:bg-light hover:text-primary"><i class="fas fa-user mr-2 text-primary"></i>My Profile</a>
                            <a href="orders.php" class="block px-4 py-2 text-sm text-dark hover:bg-light hover:text-primary"><i class="fas fa-shopping-bag mr-2 text-primary"></i>My Orders</a>
                            <a href="wishlist.php" class="block px-4 py-2 text-sm text-dark hover:bg-light hover:text-primary"><i class="fas fa-heart mr-2 text-primary"></i>Wishlist</a>
                            <a href="logout.php" class="block px-4 py-2 text-sm text-red-650 hover:bg-red-50"><i class="fas fa-sign-out-alt mr-2 text-red-500"></i>Logout</a>
                        <?php else: ?>
                            <a href="login.php" class="block px-4 py-2 text-sm text-dark hover:bg-light hover:text-primary"><i class="fas fa-sign-in-alt mr-2 text-primary"></i>Login</a>
                            <a href="createaccount.php" class="block px-4 py-2 text-sm text-dark hover:bg-light hover:text-primary"><i class="fas fa-user-plus mr-2 text-primary"></i>Register</a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="menu-btn lg:hidden text-2xl cursor-pointer text-dark hover:text-primary transition duration-300">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-lg relative z-30">
        <div class="px-4 py-3 border-t border-gray-200">
            <div class="relative mb-3">
                <input type="text" class="w-full py-2 px-4 pl-10 border border-gray-200 rounded-full" placeholder="Search...">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <a href="index.php" class="block py-2 px-2 text-dark font-medium hover:bg-gray-100 rounded">Home</a>
            <a href="new-arrivals.php" class="block py-2 px-2 text-dark font-medium hover:bg-gray-100 rounded">New Arrivals</a>
            <a href="shop.php" class="block py-2 px-2 text-dark font-medium hover:bg-gray-100 rounded">Shop</a>
            <div class="py-2 px-2">
                <div class="flex justify-between items-center text-dark font-medium cursor-pointer hover:bg-gray-100 rounded" id="mobile-categories-toggle">
                    <span>Categories</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
                <div id="mobile-categories" class="hidden pl-4 mt-1">
                    <a href="men.php" class="block py-2 text-dark hover:text-primary">Men</a>
                    <a href="women.php" class="block py-2 text-dark hover:text-primary">Women</a>
                    <a href="kids.php" class="block py-2 text-dark hover:text-primary">Kids</a>
                </div>
            </div>
            <a href="readytoship.php" class="block py-2 px-2 text-dark font-medium hover:bg-gray-100 rounded">Ready to Ship</a>
            <a href="help.php" class="block py-2 px-2 text-dark font-medium hover:bg-gray-100 rounded">Help</a>
            <?php if ($isLoggedIn): ?>
                <div class="border-t border-gray-200 mt-2 pt-2 space-y-1">
                    <a href="profile.php" class="block py-2 px-2 text-dark font-medium hover:bg-gray-100 rounded"><i class="fas fa-user mr-2 text-primary"></i>My Profile</a>
                    <a href="orders.php" class="block py-2 px-2 text-dark font-medium hover:bg-gray-100 rounded"><i class="fas fa-shopping-bag mr-2 text-primary"></i>My Orders</a>
                    <a href="wishlist.php" class="block py-2 px-2 text-dark font-medium hover:bg-gray-100 rounded"><i class="fas fa-heart mr-2 text-primary"></i>Wishlist</a>
                    <a href="logout.php" class="block py-2 px-2 text-red-600 font-medium hover:bg-gray-100 rounded"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                </div>
            <?php else: ?>
                <div class="border-t border-gray-200 mt-2 pt-2 flex space-x-2">
                    <a href="login.php" class="flex-1 text-center py-2 bg-primary hover:bg-secondary text-white font-medium rounded transition duration-300"><i class="fas fa-sign-in-alt mr-1"></i>Login</a>
                    <a href="createaccount.php" class="flex-1 text-center py-2 border border-primary text-primary font-medium rounded hover:bg-light transition duration-300"><i class="fas fa-user-plus mr-1"></i>Register</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Welcome Message for Logged-in Users -->
    <?php if ($isLoggedIn && strpos($_SERVER['REQUEST_URI'], 'index.php') !== false): ?>
    <div class="bg-accent/20 text-dark py-2 px-4 text-center">
        Welcome back, <?= htmlspecialchars($userName) ?>! Enjoy your shopping experience.
    </div>
    <?php endif; ?>
