    <!-- Footer -->
    <footer class="bg-dark text-white pt-12 pb-6 px-4 md:px-6 mt-auto">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div>
                <h3 class="text-xl font-bold mb-4 flex items-center">
                    <i class="fas fa-tshirt text-primary mr-2"></i> Frontier Phagwara
                </h3>
                <p class="text-gray-300 mb-4">Premium clothing store offering handcrafted apparel with timeless elegance.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Shop</h3>
                <ul class="space-y-2 list-none p-0">
                    <li><a href="men.php" class="text-gray-300 hover:text-white">Men</a></li>
                    <li><a href="women.php" class="text-gray-300 hover:text-white">Women</a></li>
                    <li><a href="kids.php" class="text-gray-300 hover:text-white">Kids</a></li>
                    <li><a href="new-arrivals.php" class="text-gray-300 hover:text-white">New Arrivals</a></li>
                    <li><a href="readytoship.php" class="text-gray-300 hover:text-white">Ready to Ship</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">Customer Service</h3>
                <ul class="space-y-2 list-none p-0">
                    <li><a href="help.php" class="text-gray-300 hover:text-white">Contact Us</a></li>
                    <li><a href="feedback.php" class="text-gray-300 hover:text-white">Give Feedback</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">FAQs</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Shipping Policy</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Returns & Exchanges</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Track Order</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold mb-4">About Us</h3>
                <ul class="space-y-2 list-none p-0">
                    <li><a href="#" class="text-gray-300 hover:text-white">Our Story</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Sustainability</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Careers</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Terms & Conditions</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto border-t border-gray-750 pt-8 text-center text-gray-400 text-sm">
            <p>© <?php echo date("Y"); ?> Fashion World. All rights reserved.</p>
            <p class="mt-2 text-xs">Conditions of Use & Sale | Privacy Notice | Interest-Based Ads</p>
        </div>
    </footer>

    <!-- Cart Notification -->
    <div id="cart-notification" class="cart-notification hidden">
        <i class="fas fa-check-circle mr-2"></i>
        <span id="notification-message">Item added to cart</span>
    </div>

    <!-- Mobile Menu Toggle Script -->
    <script>
        // Mobile menu toggle
        const menuBtn = document.querySelector('.menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileCategoriesToggle = document.getElementById('mobile-categories-toggle');
        const mobileCategories = document.getElementById('mobile-categories');

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        if (mobileCategoriesToggle && mobileCategories) {
            mobileCategoriesToggle.addEventListener('click', () => {
                mobileCategories.classList.toggle('hidden');
                const icon = mobileCategoriesToggle.querySelector('i');
                if (icon) {
                    icon.classList.toggle('fa-chevron-down');
                    icon.classList.toggle('fa-chevron-up');
                }
            });
        }
    </script>
</body>
</html>
