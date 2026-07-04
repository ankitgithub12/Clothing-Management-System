<?php
session_start();
include("config/database.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$msg = '';
$success = false;
$success_order_number = '';

if (isset($_POST['place_order'])) {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));
    $city = mysqli_real_escape_string($conn, trim($_POST['city']));
    $pincode = mysqli_real_escape_string($conn, trim($_POST['pincode']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $cart_json = $_POST['cart_data'];

    if (empty($name) || empty($email) || empty($address) || empty($city) || empty($pincode) || empty($phone)) {
        $msg = "All shipping fields are required!";
    } else {
        $cart_data = json_decode($cart_json, true);
        if (!$cart_data || !isset($cart_data['items']) || count($cart_data['items']) === 0) {
            $msg = "Your cart is empty!";
        } else {
            // Calculate total price
            $total_price = 0;
            foreach ($cart_data['items'] as $item) {
                $total_price += $item['price'] * $item['quantity'];
            }
            
            // Start Transaction
            mysqli_begin_transaction($conn);
            try {
                $order_number = 'FW-' . rand(1000000, 9999999);
                $user_id = $_SESSION['user_id'];
                
                $stmt = $conn->prepare("INSERT INTO orders (user_id, order_number, name, email, address, city, pincode, phone, payment_method, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("issssssssd", $user_id, $order_number, $name, $email, $address, $city, $pincode, $phone, $payment_method, $total_price);
                $stmt->execute();
                $order_id = $conn->insert_id;
                $stmt->close();
                
                $item_stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, price, quantity, size, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
                foreach ($cart_data['items'] as $item) {
                    // Normalize relative image paths to prevent broken source paths on order details
                    $image_path = $item['image'];
                    if (strpos($image_path, 'http') === 0) {
                        $parsed_url = parse_url($image_path);
                        $image_path = ltrim($parsed_url['path'], '/');
                    }
                    
                    $item_stmt->bind_param("isssdss", $order_id, $item['id'], $item['name'], $item['price'], $item['quantity'], $item['size'], $image_path);
                    $item_stmt->execute();
                }
                $item_stmt->close();
                
                mysqli_commit($conn);
                $success = true;
                $success_order_number = $order_number;
            } catch (Exception $e) {
                mysqli_rollback($conn);
                $msg = "Failed to place order: " . $e->getMessage();
            }
        }
    }
}

$pageTitle = "Checkout - Fashion World";
include('includes/header.php');
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <?php if ($success): ?>
        <!-- Order Success State -->
        <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-xl border border-gray-150 p-8 text-center animate__animated animate__zoomIn">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 text-green-600">
                <i class="fas fa-check text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-dark mb-2">Order Confirmed!</h1>
            <p class="text-gray-500 mb-6">Thank you for shopping with us. Your order has been placed successfully.</p>
            
            <div class="bg-light rounded-xl p-4 mb-8 text-left border border-gray-200">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-500 font-medium">Order Number:</span>
                    <span class="font-bold text-primary">#<?= htmlspecialchars($success_order_number) ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 font-medium">Estimated Delivery:</span>
                    <span class="font-bold text-dark">3 - 5 Business Days</span>
                </div>
            </div>

            <div class="flex gap-4">
                <a href="orders.php" class="flex-1 bg-primary hover:bg-secondary text-white font-bold py-3 rounded-lg transition duration-300 shadow-md">
                    Track Order
                </a>
                <a href="shop.php" class="flex-1 bg-light border border-gray-300 text-dark font-bold py-3 rounded-lg hover:bg-gray-100 transition duration-300">
                    Continue Shopping
                </a>
            </div>
        </div>

        <script>
            // Clear cart from localStorage on successful order placement
            localStorage.removeItem('cart');
            if (typeof cart !== 'undefined') {
                cart.items = [];
                cart.totalItems = 0;
                cart.totalPrice = 0;
                cart.updateCartUI();
            }
        </script>
    <?php else: ?>
        <!-- Checkout Form State -->
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-dark mb-2">Secure Checkout</h1>
            <div class="w-20 h-1 bg-primary mx-auto mb-4"></div>
            <p class="text-gray-600">Please enter your shipping address and complete your order.</p>
        </div>

        <?php if ($msg): ?>
            <div class="max-w-3xl mx-auto mb-8 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg flex items-center gap-3 animate__animated animate__shakeX">
                <i class="fas fa-exclamation-circle text-lg"></i>
                <span class="font-medium"><?= htmlspecialchars($msg) ?></span>
            </div>
        <?php endif; ?>

        <form id="checkout-form" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <input type="hidden" name="cart_data" id="cart_data_input">
            
            <!-- Billing Details Form -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-md p-6 md:p-8 border border-gray-150">
                    <h2 class="text-2xl font-bold text-dark mb-6 border-b pb-2"><i class="fas fa-shipping-fast mr-2 text-primary"></i>Shipping Information</h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Receiver's Name</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($_SESSION['user_name'] ?? '') ?>" required
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['user_email'] ?? '') ?>" required
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Street Address</label>
                            <textarea name="address" rows="3" required placeholder="Apartment, suite, unit, building, street, etc."
                                      class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition"></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">City</label>
                            <input type="text" name="city" required
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">PIN Code</label>
                            <input type="text" name="pincode" required
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" name="phone" required placeholder="e.g. +91 9876543210"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                        </div>
                    </div>
                </div>

                <!-- Payment Method Panel -->
                <div class="bg-white rounded-xl shadow-md p-6 md:p-8 border border-gray-150">
                    <h2 class="text-2xl font-bold text-dark mb-6 border-b pb-2"><i class="fas fa-credit-card mr-2 text-primary"></i>Payment Method</h2>
                    <div class="space-y-4">
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-light transition">
                            <input type="radio" name="payment_method" value="Cash on Delivery" checked class="h-4 w-4 text-primary focus:ring-primary">
                            <div class="ml-4">
                                <span class="block font-bold text-dark">Cash on Delivery (COD)</span>
                                <span class="block text-gray-500 text-sm">Pay with cash upon delivery of package.</span>
                            </div>
                        </label>
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-light transition">
                            <input type="radio" name="payment_method" value="Online Card Payment" class="h-4 w-4 text-primary focus:ring-primary">
                            <div class="ml-4">
                                <span class="block font-bold text-dark">Debit/Credit Card (Mock Gateway)</span>
                                <span class="block text-gray-500 text-sm">Secure online transaction.</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Order Summary Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-150 sticky top-20">
                    <h2 class="text-2xl font-bold text-dark mb-6 border-b pb-2">Order Summary</h2>
                    
                    <!-- Items List -->
                    <div id="checkout-items-list" class="divide-y divide-gray-150 max-h-[300px] overflow-y-auto mb-6 pr-2">
                        <!-- Dynamic items loaded here -->
                    </div>
                    
                    <!-- Cost Summary -->
                    <div class="space-y-3 pt-4 border-t border-gray-250">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span id="checkout-subtotal">₹0.00</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Shipping</span>
                            <span class="text-green-600 font-semibold">FREE</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Estimated GST (18%)</span>
                            <span id="checkout-gst">₹0.00</span>
                        </div>
                        <div class="flex justify-between text-dark font-bold text-lg pt-3 border-t border-gray-200">
                            <span>Total</span>
                            <span id="checkout-total">₹0.00</span>
                        </div>
                    </div>

                    <button type="submit" name="place_order" class="w-full mt-8 bg-primary hover:bg-secondary text-white font-bold py-3 rounded-lg shadow-md hover:shadow-lg transition duration-300 flex items-center justify-center gap-2">
                        <i class="fas fa-lock"></i> Place Order
                    </button>
                </div>
            </div>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                cart.init();
                
                // If cart is empty, redirect back to cart page
                if (cart.items.length === 0) {
                    window.location.href = 'cart.php';
                    return;
                }
                
                // Populate items list
                const container = document.getElementById('checkout-items-list');
                const subtotalEl = document.getElementById('checkout-subtotal');
                const gstEl = document.getElementById('checkout-gst');
                const totalEl = document.getElementById('checkout-total');
                
                let subtotal = 0;
                container.innerHTML = '';
                
                cart.items.forEach(item => {
                    subtotal += item.price * item.quantity;
                    
                    const div = document.createElement('div');
                    div.className = 'py-3 flex justify-between items-center gap-4';
                    div.innerHTML = `
                        <div class="flex items-center">
                            <img src="${item.image}" alt="${item.name}" class="h-12 w-12 object-cover rounded border border-gray-200 mr-3">
                            <div>
                                <h4 class="font-bold text-dark text-sm truncate max-w-[150px]">${item.name}</h4>
                                <p class="text-gray-500 text-xs">Qty: ${item.quantity} | Size: ${item.size}</p>
                            </div>
                        </div>
                        <span class="font-semibold text-dark text-sm">₹${(item.price * item.quantity).toFixed(2)}</span>
                    `;
                    container.appendChild(div);
                });
                
                const gst = subtotal * 0.18;
                const total = subtotal; // Assuming GST is included in item prices, or we keep price simple
                
                subtotalEl.textContent = '₹' + (subtotal - gst).toFixed(2);
                gstEl.textContent = '₹' + gst.toFixed(2);
                totalEl.textContent = '₹' + subtotal.toFixed(2);
                
                // Bind form submit to pack localStorage data
                document.getElementById('checkout-form').addEventListener('submit', (e) => {
                    document.getElementById('cart_data_input').value = localStorage.getItem('cart');
                });
            });
        </script>
    <?php endif; ?>
</main>

<?php
include('includes/footer.php');
?>
