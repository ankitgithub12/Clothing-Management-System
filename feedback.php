<?php
session_start();
include("config/database.php");

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_name'] : '';

// Process form submission
$feedbackSent = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $feedback = trim($_POST['feedback'] ?? '');
    $rating = $_POST['rating'] ?? 0;
    
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }
    
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }
    
    if (empty($feedback)) {
        $errors['feedback'] = 'Feedback is required';
    } elseif (strlen($feedback) < 10) {
        $errors['feedback'] = 'Feedback should be at least 10 characters';
    }
    
    if (empty($errors)) {
        // Save to database
        $stmt = $conn->prepare("INSERT INTO feedback (user_id, name, email, rating, feedback, created_at) 
                               VALUES (?, ?, ?, ?, ?, NOW())");
        $userId = $isLoggedIn ? $_SESSION['user_id'] : NULL;
        $stmt->bind_param("issis", $userId, $name, $email, $rating, $feedback);
        
        if ($stmt->execute()) {
            $feedbackSent = true;
        } else {
            $errors['database'] = 'There was an error submitting your feedback. Please try again.';
        }
        
        $stmt->close();
    }
}
?>

<?php
$pageTitle = "Feedback - Fashion World";
include('includes/header.php');
?>

<style>
    .rating-star {
        cursor: pointer;
        transition: all 0.2s;
    }
    .rating-star:hover {
        transform: scale(1.2);
    }
    .selected-rating {
        color: #f59e0b;
    }
</style>

    <!-- Main Content -->
    <main class="py-12 px-4 md:px-6">
        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6 md:p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-dark mb-2">Share Your Feedback</h1>
                <div class="w-20 h-1 bg-primary mx-auto mb-4"></div>
                <p class="text-gray-600">We value your opinion! Please let us know about your experience with Fashion World.</p>
            </div>

            <?php if ($feedbackSent): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <strong class="font-bold">Thank you!</strong>
                    <span class="block sm:inline">Your feedback has been submitted successfully.</span>
                    <a href="index.php" class="text-primary hover:underline font-medium mt-2 inline-block">Return to Home</a>
                </div>
            <?php elseif (!empty($errors['database'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline"><?= htmlspecialchars($errors['database']) ?></span>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                        <input type="text" id="name" name="name" 
                               value="<?= htmlspecialchars($_POST['name'] ?? ($isLoggedIn ? $userName : '')) ?>"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary <?= !empty($errors['name']) ? 'border-red-500' : '' ?>">
                        <?php if (!empty($errors['name'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['name']) ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                        <input type="email" id="email" name="email" 
                               value="<?= htmlspecialchars($_POST['email'] ?? ($isLoggedIn ? $_SESSION['user_email'] ?? '' : '')) ?>"
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary <?= !empty($errors['email']) ? 'border-red-500' : '' ?>">
                        <?php if (!empty($errors['email'])): ?>
                            <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['email']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">How would you rate your experience? *</label>
                    <div class="flex items-center space-x-2" id="rating-stars">
                        <?php 
                        $selectedRating = $_POST['rating'] ?? 0;
                        for ($i = 1; $i <= 5; $i++): 
                        ?>
                            <i class="fas fa-star text-2xl rating-star <?= $i <= $selectedRating ? 'selected-rating text-yellow-500' : 'text-gray-300' ?>" 
                               data-rating="<?= $i ?>"></i>
                        <?php endfor; ?>
                        <input type="hidden" name="rating" id="rating" value="<?= $selectedRating ?>">
                    </div>
                </div>
                
                <div>
                    <label for="feedback" class="block text-sm font-medium text-gray-700 mb-1">Your Feedback *</label>
                    <textarea id="feedback" name="feedback" rows="5" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary <?= !empty($errors['feedback']) ? 'border-red-500' : '' ?>"><?= htmlspecialchars($_POST['feedback'] ?? '') ?></textarea>
                    <?php if (!empty($errors['feedback'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?= htmlspecialchars($errors['feedback']) ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-white font-medium py-2 px-6 rounded-md hover:bg-secondary transition duration-300">
                        Submit Feedback
                    </button>
                </div>
            </form>
        </div>
    </main>

<?php
include('includes/footer.php');
?>

    <script>
        // Rating stars interaction
        document.querySelectorAll('.rating-star').forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.dataset.rating;
                document.getElementById('rating').value = rating;
                
                // Update star display
                document.querySelectorAll('.rating-star').forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('selected-rating', 'text-yellow-500');
                        s.classList.remove('text-gray-300');
                    } else {
                        s.classList.remove('selected-rating', 'text-yellow-500');
                        s.classList.add('text-gray-300');
                    }
                });
            });
            
            star.addEventListener('mouseover', function() {
                const rating = this.dataset.rating;
                document.querySelectorAll('.rating-star').forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('text-yellow-300');
                    }
                });
            });
            
            star.addEventListener('mouseout', function() {
                const selectedRating = document.getElementById('rating').value;
                document.querySelectorAll('.rating-star').forEach((s, index) => {
                    s.classList.remove('text-yellow-300');
                    if (index < selectedRating) {
                        s.classList.add('text-yellow-500');
                    }
                });
            });
        });
    </script>
</body>
</html>