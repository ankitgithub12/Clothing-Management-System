<?php
$pageTitle = "Your Cart - Fashion World";
include('includes/header.php');
?>

<style>
        .quantity-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>



    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Your Shopping Cart</h1>
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <div id="cart-items" class="divide-y divide-gray-200">
                    <!-- Cart items will be dynamically inserted here -->
                    <div class="text-center py-8 text-gray-500" id="empty-cart-message">
                        Your cart is currently empty.
                    </div>
                </div>
                
                <div class="mt-8 border-t border-gray-200 pt-6">
                    <div class="flex justify-between text-lg font-bold text-gray-900">
                        <span>Total:</span>
                        <span id="cart-total">₹0.00</span>
                    </div>
                    <div class="mt-6">
                        <button id="checkout-btn" class="w-full bg-primary text-white py-3 px-6 rounded-md hover:bg-secondary transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

<script>
// Extend the global cart object with cart page rendering functionality
cart.displayCartItems = function() {
    const cartItemsContainer = document.getElementById('cart-items');
    const emptyCartMessage = document.getElementById('empty-cart-message');
    const cartTotalElement = document.getElementById('cart-total');
    const checkoutBtn = document.getElementById('checkout-btn');
    
    if (this.items.length === 0) {
        if (emptyCartMessage) emptyCartMessage.classList.remove('hidden');
        if (cartTotalElement) cartTotalElement.textContent = '₹0.00';
        if (checkoutBtn) checkoutBtn.disabled = true;
        if (cartItemsContainer) cartItemsContainer.innerHTML = '<div class="text-center py-8 text-gray-500">Your cart is currently empty.</div>';
        return;
    }
    
    if (emptyCartMessage) emptyCartMessage.classList.add('hidden');
    if (checkoutBtn) checkoutBtn.disabled = false;
    
    if (cartItemsContainer) {
        cartItemsContainer.innerHTML = '';
        this.items.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.className = 'py-4 flex flex-col sm:flex-row';
            itemElement.innerHTML = `
                <div class="flex-shrink-0">
                    <img src="${item.image}" alt="${item.name}" class="h-24 w-24 object-cover rounded-md">
                </div>
                <div class="ml-4 flex-1 flex flex-col">
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <h3>${item.name}</h3>
                        <p class="ml-4">₹${(item.price * item.quantity).toFixed(2)}</p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">${item.size}</p>
                    <div class="mt-4 flex-1 flex items-end justify-between">
                        <div class="flex items-center border border-gray-300 rounded-md">
                            <button class="quantity-btn px-3 py-1 text-gray-600 hover:bg-gray-100" data-id="${item.id}" data-size="${item.size}" data-action="decrease" ${item.quantity <= 1 ? 'disabled' : ''}>-</button>
                            <span class="px-3 py-1 quantity">${item.quantity}</span>
                            <button class="quantity-btn px-3 py-1 text-gray-600 hover:bg-gray-100" data-id="${item.id}" data-size="${item.size}" data-action="increase">+</button>
                        </div>
                        <button class="remove-btn text-sm font-medium text-primary hover:text-secondary" data-id="${item.id}" data-size="${item.size}">
                            Remove
                        </button>
                    </div>
                </div>
            `;
            cartItemsContainer.appendChild(itemElement);
        });
    }
    
    if (cartTotalElement) {
        cartTotalElement.textContent = `₹${this.totalPrice.toFixed(2)}`;
    }
};

cart.increaseQuantity = function(productId, size) {
    const item = this.items.find(item => item.id === productId && item.size === size);
    if (item) {
        item.quantity += 1;
        this.totalItems += 1;
        this.totalPrice += item.price;
        this.saveCart();
        this.updateCartUI();
        this.displayCartItems();
    }
};

cart.decreaseQuantity = function(productId, size) {
    const item = this.items.find(item => item.id === productId && item.size === size);
    if (item && item.quantity > 1) {
        item.quantity -= 1;
        this.totalItems -= 1;
        this.totalPrice -= item.price;
        this.saveCart();
        this.updateCartUI();
        this.displayCartItems();
    }
};

cart.removeItem = function(productId, size) {
    const itemIndex = this.items.findIndex(item => item.id === productId && item.size === size);
    if (itemIndex !== -1) {
        const item = this.items[itemIndex];
        this.totalItems -= item.quantity;
        this.totalPrice -= item.price * item.quantity;
        this.items.splice(itemIndex, 1);
        this.saveCart();
        this.updateCartUI();
        this.displayCartItems();
    }
};

// Hook into saveCart to trigger display updates
const originalSaveCart = cart.saveCart;
cart.saveCart = function() {
    originalSaveCart.call(this);
    this.displayCartItems();
};

document.addEventListener('DOMContentLoaded', () => {
    cart.displayCartItems();
    
    // Handle quantity buttons
    const cartItemsContainer = document.getElementById('cart-items');
    if (cartItemsContainer) {
        cartItemsContainer.addEventListener('click', (e) => {
            const qtyBtn = e.target.closest('.quantity-btn');
            const removeBtn = e.target.closest('.remove-btn');
            
            if (qtyBtn) {
                const id = qtyBtn.dataset.id;
                const size = qtyBtn.dataset.size;
                const action = qtyBtn.dataset.action;
                
                if (action === 'increase') {
                    cart.increaseQuantity(id, size);
                } else if (action === 'decrease') {
                    cart.decreaseQuantity(id, size);
                }
            } else if (removeBtn) {
                const id = removeBtn.dataset.id;
                const size = removeBtn.dataset.size;
                cart.removeItem(id, size);
            }
        });
    }
    
    // Checkout button handler
    const checkoutBtn = document.getElementById('checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', () => {
            if (cart.items.length > 0) {
                window.location.href = 'checkout.php';
            }
        });
    }
});
</script>

<?php
include('includes/footer.php');
?>