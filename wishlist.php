<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$pageTitle = "My Wishlist - Fashion World";
include('includes/header.php');
?>

<main class="max-w-4xl mx-auto px-4 py-12">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-dark mb-2">My Wishlist</h1>
        <div class="w-20 h-1 bg-primary mx-auto mb-4"></div>
        <p class="text-gray-600">Your favorite styles saved in one place. Add them to your cart anytime.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-150 p-6 md:p-8">
        <div id="wishlist-items" class="divide-y divide-gray-250">
            <!-- Wishlist items will be rendered dynamically here -->
        </div>
        
        <div id="empty-wishlist-message" class="text-center py-16 hidden">
            <div class="w-20 h-20 bg-light rounded-full flex items-center justify-center mx-auto mb-4 text-primary">
                <i class="far fa-heart text-4xl"></i>
            </div>
            <h3 class="text-xl font-bold text-dark mb-2">Your wishlist is empty</h3>
            <p class="text-gray-500 mb-6">Explore our collections and save your favorite clothing items!</p>
            <a href="shop.php" class="bg-primary hover:bg-secondary text-white font-bold py-3 px-8 rounded-lg transition duration-300 inline-block shadow-md">
                Browse Shop
            </a>
        </div>
    </div>
</main>

<script>
    const wishlist = {
        items: [],
        init() {
            const saved = localStorage.getItem('wishlist');
            if (saved) {
                this.items = JSON.parse(saved);
            }
            this.displayItems();
        },
        displayItems() {
            const container = document.getElementById('wishlist-items');
            const emptyMsg = document.getElementById('empty-wishlist-message');
            
            if (this.items.length === 0) {
                if (emptyMsg) emptyMsg.classList.remove('hidden');
                if (container) container.innerHTML = '';
                return;
            }
            
            if (emptyMsg) emptyMsg.classList.add('hidden');
            if (container) {
                container.innerHTML = '';
                this.items.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'py-6 flex flex-col sm:flex-row items-center justify-between gap-4 border-b border-gray-200 last:border-0';
                    div.innerHTML = `
                        <div class="flex items-center w-full sm:w-auto">
                            <img src="${item.image}" alt="${item.name}" class="h-24 w-24 object-cover rounded-lg border border-gray-150 mr-4 shadow-sm">
                            <div>
                                <h3 class="font-bold text-dark text-lg">${item.name}</h3>
                                <p class="text-primary font-bold mt-1">₹${item.price.toFixed(2)}</p>
                            </div>
                        </div>
                        <div class="flex gap-3 w-full sm:w-auto">
                            <button onclick="wishlist.moveToCart('${item.id}', '${item.name}', ${item.price}, '${item.image}')" class="flex-grow sm:flex-grow-0 bg-primary hover:bg-secondary text-white font-bold py-2.5 px-6 rounded-lg text-sm transition duration-300 shadow flex items-center justify-center gap-2">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </button>
                            <button onclick="wishlist.removeItem('${item.id}')" class="bg-light text-red-600 hover:bg-red-50 hover:text-red-700 font-semibold py-2.5 px-4 rounded-lg text-sm transition duration-300 border border-red-200 flex items-center justify-center">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    `;
                    container.appendChild(div);
                });
            }
        },
        removeItem(id) {
            this.items = this.items.filter(item => item.id !== id);
            localStorage.setItem('wishlist', JSON.stringify(this.items));
            this.displayItems();
        },
        moveToCart(id, name, price, image) {
            cart.addItem({
                id: id,
                name: name,
                price: price,
                image: image,
                size: 'M'
            });
            this.removeItem(id);
        }
    };

    document.addEventListener('DOMContentLoaded', () => {
        wishlist.init();
    });
</script>

<?php
include('includes/footer.php');
?>
