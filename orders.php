<?php
session_start();
include("config/database.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Live AJAX order tracking API endpoint
if (isset($_GET['action']) && $_GET['action'] === 'track' && isset($_GET['order_id'])) {
    header('Content-Type: application/json');
    $order_number = trim($_GET['order_id']);
    
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_number = ?");
    $stmt->bind_param("s", $order_number);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
        echo json_encode(['success' => true, 'order' => $order]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No order found with that Order ID!']);
    }
    $stmt->close();
    exit();
}

$user_id = $_SESSION['user_id'];

// Retrieve all user orders
$stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$orders_result = $stmt->get_result();
$orders = [];

while ($order_row = $orders_result->fetch_assoc()) {
    // Get items for this order
    $item_stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $item_stmt->bind_param("i", $order_row['id']);
    $item_stmt->execute();
    $items_result = $item_stmt->get_result();
    $items = [];
    while ($item_row = $items_result->fetch_assoc()) {
        $items[] = $item_row;
    }
    $item_stmt->close();
    
    $order_row['items'] = $items;
    $orders[] = $order_row;
}
$stmt->close();

$pageTitle = "My Orders - Fashion World";
include('includes/header.php');
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-dark mb-2">My Orders</h1>
        <div class="w-20 h-1 bg-primary mx-auto mb-4"></div>
        <p class="text-gray-600">Track and manage your current orders or view past purchase history.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Order History List -->
        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-2xl font-bold text-dark mb-4">Order History</h2>
            
            <?php if (count($orders) === 0): ?>
                <div class="bg-white rounded-xl shadow-md p-8 text-center border border-gray-150">
                    <div class="w-16 h-16 bg-light rounded-full flex items-center justify-center mx-auto mb-4 text-primary">
                        <i class="fas fa-shopping-bag text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-2">No orders placed yet</h3>
                    <p class="text-gray-500 mb-6">You haven't placed any orders yet. Visit our store to find your favorite styles!</p>
                    <a href="shop.php" class="bg-primary hover:bg-secondary text-white font-bold py-3 px-8 rounded-lg transition duration-300 inline-block shadow-md">
                        Browse Shop
                    </a>
                </div>
            <?php else: ?>
                <?php foreach ($orders as $order): ?>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-150">
                        <div class="bg-light px-6 py-4 flex flex-wrap justify-between items-center gap-4 border-b border-gray-200">
                            <div class="flex gap-6 text-sm text-gray-600">
                                <div>
                                    <span class="block text-xs uppercase font-semibold text-gray-500">Order Placed</span>
                                    <span class="font-medium text-dark"><?= date('F d, Y', strtotime($order['created_at'])) ?></span>
                                </div>
                                <div>
                                    <span class="block text-xs uppercase font-semibold text-gray-500">Total Price</span>
                                    <span class="font-medium text-dark">₹<?= number_format($order['total_price'], 2) ?></span>
                                </div>
                                <div>
                                    <span class="block text-xs uppercase font-semibold text-gray-500">Ship To</span>
                                    <span class="font-medium text-dark"><?= htmlspecialchars($order['name']) ?></span>
                                </div>
                            </div>
                            <div>
                                <span class="block text-xs uppercase font-semibold text-gray-500 md:text-right">Order ID</span>
                                <span class="font-semibold text-primary">#<?= htmlspecialchars($order['order_number']) ?></span>
                            </div>
                        </div>
                        
                        <div class="divide-y divide-gray-100">
                            <?php foreach ($order['items'] as $item): ?>
                                <div class="p-6">
                                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                        <div class="flex items-center">
                                            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" class="h-20 w-20 object-cover rounded-lg border border-gray-200 mr-4 shadow-sm">
                                            <div>
                                                <h3 class="font-bold text-dark text-lg"><?= htmlspecialchars($item['product_name']) ?></h3>
                                                <p class="text-gray-500 text-sm">Size: <?= htmlspecialchars($item['size']) ?> | Qty: <?= htmlspecialchars($item['quantity']) ?></p>
                                                <p class="text-primary font-bold mt-1">₹<?= number_format($item['price'], 2) ?></p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex flex-col gap-2 w-full sm:w-auto">
                                            <?php if ($order['status'] === 'Delivered'): ?>
                                                <span class="bg-green-50 text-green-700 text-xs px-3 py-1 rounded-full font-bold flex items-center justify-center gap-1 border border-green-200">
                                                    <i class="fas fa-check-circle"></i> Delivered
                                                </span>
                                            <?php elseif ($order['status'] === 'Shipped'): ?>
                                                <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1 rounded-full font-bold flex items-center justify-center gap-1 border border-blue-200">
                                                    <i class="fas fa-truck animate-bounce"></i> Shipped
                                                </span>
                                            <?php else: ?>
                                                <span class="bg-yellow-50 text-yellow-700 text-xs px-3 py-1 rounded-full font-bold flex items-center justify-center gap-1 border border-yellow-200">
                                                    <i class="fas fa-sync spinner-icon animate-spin"></i> Processing
                                                </span>
                                            <?php endif; ?>
                                            
                                            <button onclick="trackOrder('<?= htmlspecialchars($order['order_number']) ?>')" class="text-center bg-light text-primary hover:bg-primary hover:text-white border border-primary/20 px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
                                                Track Package
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Order Tracking Stepper Card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-md p-6 border border-gray-150 sticky top-20">
                <h2 class="text-2xl font-bold text-dark mb-4">Track Order</h2>
                <p class="text-gray-500 text-sm mb-6">Enter your Order ID to visualize the current tracking progress.</p>
                
                <div class="flex gap-2 mb-8">
                    <input type="text" id="orderIdInput" placeholder="e.g. FW-8219382" class="flex-grow border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <button onclick="handleTrackBtn()" class="bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded-lg text-sm shadow transition duration-300">
                        Track
                    </button>
                </div>

                <div id="trackingStepper" class="hidden">
                    <h3 class="font-bold text-dark mb-6 flex justify-between border-b pb-2">
                        <span>Status: <span id="stepperStatus" class="text-primary">In Transit</span></span>
                        <span id="stepperId" class="text-gray-400 font-medium text-sm">#FW-8219382</span>
                    </h3>
                    
                    <div class="relative pl-8 space-y-8 border-l-2 border-gray-250 ml-3 py-1">
                        <!-- Step 1 -->
                        <div class="relative tracking-step" id="step1">
                            <div class="absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-primary flex items-center justify-center text-white text-xs border-4 border-white shadow-sm">
                                <i class="fas fa-check"></i>
                            </div>
                            <h4 class="font-bold text-dark text-sm">Order Placed</h4>
                            <p class="text-gray-500 text-xs mt-1">We have received your order request.</p>
                        </div>
                        
                        <!-- Step 2 -->
                        <div class="relative tracking-step" id="step2">
                            <div id="step2-dot" class="absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-white text-xs border-4 border-white shadow-sm">
                                <i class="fas fa-sync text-[10px]"></i>
                            </div>
                            <h4 class="font-bold text-dark text-sm">Processing</h4>
                            <p class="text-gray-500 text-xs mt-1">Your items are being packed and checked.</p>
                        </div>
                        
                        <!-- Step 3 -->
                        <div class="relative tracking-step" id="step3">
                            <div id="step3-dot" class="absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-white text-xs border-4 border-white shadow-sm">
                                <i class="fas fa-truck text-[10px]"></i>
                            </div>
                            <h4 class="font-bold text-dark text-sm">Shipped</h4>
                            <p class="text-gray-500 text-xs mt-1">In transit to your local distribution center.</p>
                        </div>
                        
                        <!-- Step 4 -->
                        <div class="relative tracking-step" id="step4">
                            <div id="step4-dot" class="absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-white text-xs border-4 border-white shadow-sm">
                                <i class="fas fa-shipping-fast text-[10px]"></i>
                            </div>
                            <h4 class="font-bold text-dark text-sm">Out for Delivery</h4>
                            <p class="text-gray-500 text-xs mt-1">Delivery executive is assigned and arriving today.</p>
                        </div>
                        
                        <!-- Step 5 -->
                        <div class="relative tracking-step" id="step5">
                            <div id="step5-dot" class="absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-white text-xs border-4 border-white shadow-sm">
                                <i class="fas fa-home text-[10px]"></i>
                            </div>
                            <h4 class="font-bold text-dark text-sm">Delivered</h4>
                            <p class="text-gray-500 text-xs mt-1">Successfully signed for and delivered.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function trackOrder(orderId) {
        document.getElementById('orderIdInput').value = orderId;
        handleTrack(orderId);
    }
    
    function handleTrackBtn() {
        const val = document.getElementById('orderIdInput').value.trim();
        if (val) {
            handleTrack(val);
        } else {
            alert('Please enter a valid Order ID');
        }
    }
    
    function handleTrack(orderId) {
        // Strip out hash sign if entered
        const cleanOrderId = orderId.replace('#', '');
        
        fetch(`orders.php?action=track&order_id=${cleanOrderId}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const order = data.order;
                    document.getElementById('stepperId').textContent = '#' + order.order_number;
                    document.getElementById('stepperStatus').textContent = order.status;
                    document.getElementById('trackingStepper').classList.remove('hidden');
                    
                    updateStepperHighlight(order.status);
                    
                    // Auto scroll tracking stepper card into view on mobile
                    if (window.innerWidth < 1024) {
                        document.getElementById('trackingStepper').scrollIntoView({ behavior: 'smooth' });
                    }
                } else {
                    alert(data.message || 'Order not found');
                }
            })
            .catch(err => {
                console.error(err);
                alert('An error occurred while tracking the order.');
            });
    }
    
    function updateStepperHighlight(status) {
        const steps = {
            'Processing': 2,
            'Shipped': 3,
            'Out for Delivery': 4,
            'Delivered': 5
        };
        
        const activeStepNum = steps[status] || 1;
        
        // Reset all dots and steps first
        for (let i = 2; i <= 5; i++) {
            const stepEl = document.getElementById('step' + i);
            const dotEl = document.getElementById('step' + i + '-dot');
            
            stepEl.classList.add('opacity-40');
            dotEl.className = "absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-white text-xs border-4 border-white shadow-sm";
            
            // Set standard icon classes back inside the inner HTML
            if (i === 2) dotEl.innerHTML = '<i class="fas fa-sync text-[10px]"></i>';
            if (i === 3) dotEl.innerHTML = '<i class="fas fa-truck text-[10px]"></i>';
            if (i === 4) dotEl.innerHTML = '<i class="fas fa-shipping-fast text-[10px]"></i>';
            if (i === 5) dotEl.innerHTML = '<i class="fas fa-home text-[10px]"></i>';
        }
        
        // Activate steps up to activeStepNum
        for (let i = 1; i <= activeStepNum; i++) {
            const stepEl = document.getElementById('step' + i);
            if (stepEl) {
                stepEl.classList.remove('opacity-40');
            }
            
            // For completed previous steps, replace icons with checkmarks
            if (i < activeStepNum && i >= 2) {
                const dotEl = document.getElementById('step' + i + '-dot');
                dotEl.className = "absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-primary flex items-center justify-center text-white text-xs border-4 border-white shadow-sm animate__animated animate__fadeIn";
                dotEl.innerHTML = '<i class="fas fa-check"></i>';
            }
            
            // Highlight the current step dot
            if (i === activeStepNum && i >= 2) {
                const dotEl = document.getElementById('step' + i + '-dot');
                dotEl.className = "absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-primary flex items-center justify-center text-white text-xs border-4 border-white shadow-sm animate__animated animate__pulse animate__infinite";
            }
        }
    }
</script>

<?php
include('includes/footer.php');
?>
