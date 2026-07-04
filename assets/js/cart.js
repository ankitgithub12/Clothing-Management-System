// cart.js
let cart = {
    items: [],
    totalItems: 0,
    totalPrice: 0,

    // Initialize cart from localStorage
    init() {
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            const parsedCart = JSON.parse(savedCart);
            this.items = parsedCart.items || [];
            this.totalItems = parsedCart.totalItems || 0;
            this.totalPrice = parsedCart.totalPrice || 0;
        }
        this.updateCartUI();
    },

    // Add item to cart
    addItem(product) {
        // Check if item already exists in cart
        const existingItem = this.items.find(item => item.id === product.id && item.size === product.size);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            product.quantity = 1;
            this.items.push(product);
        }
        
        this.totalItems += 1;
        this.totalPrice += product.price;
        
        this.saveCart();
        this.updateCartUI();
        
        // Show notification
        this.showNotification(`${product.name} (${product.size}) added to cart`);
    },

    // Show notification toast
    showNotification(message) {
        const notification = document.getElementById('cart-notification');
        const messageElement = document.getElementById('notification-message');
        
        if (notification && messageElement) {
            messageElement.textContent = message;
            notification.classList.remove('hidden');
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    notification.classList.add('hidden');
                }, 300);
            }, 3000);
        }
    },

    // Save cart to localStorage
    saveCart() {
        localStorage.setItem('cart', JSON.stringify({
            items: this.items,
            totalItems: this.totalItems,
            totalPrice: this.totalPrice
        }));
    },

    // Update cart UI (cart icon count)
    updateCartUI() {
        const cartCountElements = document.querySelectorAll('.cart-count');
        cartCountElements.forEach(element => {
            element.textContent = this.totalItems;
            if (this.totalItems > 0) {
                element.classList.add('animate-pulse');
                setTimeout(() => {
                    element.classList.remove('animate-pulse');
                }, 500);
            }
        });
    }
};

// Initialize cart when page loads
document.addEventListener('DOMContentLoaded', () => {
    cart.init();
    
    // Set up event listeners for all "Add to Cart" buttons
    document.body.addEventListener('click', (e) => {
        const button = e.target.closest('.add-to-cart');
        if (button) {
            e.preventDefault();
            const productElement = button.closest('.product') || button.closest('.product-card');
            if (productElement) {
                // Extract price
                const priceElement = productElement.querySelector('.product-price') || productElement.querySelector('.price');
                const priceText = priceElement ? priceElement.textContent : '0';
                const price = parseFloat(priceText.replace(/[^\d\.]/g, '')) || 0;
                
                // Extract name
                const nameElement = productElement.querySelector('h3') || productElement.querySelector('h5') || productElement.querySelector('.product-title') || productElement.querySelector('h2');
                const name = nameElement ? nameElement.textContent.trim() : 'Product';
                
                // Extract size
                const sizeElement = productElement.querySelector('.product-size') || productElement.querySelector('select[name="size"]');
                const size = sizeElement ? (sizeElement.value || sizeElement.textContent.trim()) : 'M';
                
                // Extract image
                const imgElement = productElement.querySelector('img');
                const image = imgElement ? imgElement.src : '';

                const product = {
                    id: productElement.dataset.id || 'prod_' + Math.random().toString(36).substr(2, 9),
                    name: name,
                    price: price,
                    size: size,
                    image: image
                };
                
                cart.addItem(product);
                
                // Visual feedback on button
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check mr-1"></i> Added';
                button.classList.add('bg-green-600');
                
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.classList.remove('bg-green-600');
                }, 1500);
            }
        }
    });
});