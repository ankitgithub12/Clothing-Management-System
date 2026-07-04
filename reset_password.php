<?php
session_start();
include("config/database.php");
$msg = '';
$msg_type = 'red';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if (empty($email) || empty($password) || empty($confirm_password)) {
        $msg = "All fields are required!";
    } elseif ($password !== $confirm_password) {
        $msg = "Passwords do not match!";
    } else {
        // Check if user exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 0) {
            $msg = "No account found with that email address!";
        } else {
            $stmt->close();
            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $update_stmt = $conn->prepare("UPDATE users SET CreatePassword = ? WHERE Email = ?");
            $update_stmt->bind_param("ss", $hashed, $email);
            
            if ($update_stmt->execute()) {
                $msg = "Password reset successfully! Please login.";
                $msg_type = 'green';
            } else {
                $msg = "Failed to reset password. Please try again.";
            }
            $update_stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Fashion World</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
                },
            },
        };
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #8b5e3c 0%, #6d4c35 100%);
        }
        .card-shadow {
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-300 flex items-center justify-center min-h-screen p-4">
    <div class="max-w-4xl w-full">
        <div class="bg-white/90 backdrop-blur-sm rounded-3xl overflow-hidden card-shadow md:flex">
            <!-- Sidebar info panel -->
            <div class="hidden md:block md:w-1/2 gradient-bg p-12 text-white">
                <div class="h-full flex flex-col justify-center">
                    <h2 class="text-4xl font-bold mb-6 animate__animated animate__fadeIn">Reset Password</h2>
                    <p class="text-lg mb-8">Enter your registered email address and set your new password. You'll be back shopping in no time!</p>
                    
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center">
                                <i class="fas fa-shield-alt text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold">Secured Accounts</h3>
                                <p class="text-sm opacity-80">Encryption guarantees privacy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input fields -->
            <div class="md:w-1/2 p-8 md:p-12">
                <div class="text-center mb-6">
                    <img src="assets/images/Logo.jpeg" alt="Logo" class="h-12 mx-auto mb-4">
                    <h1 class="text-3xl font-bold text-gray-800">New Credentials</h1>
                    <p class="text-gray-600">Reset your password to resume access</p>
                </div>
                
                <?php if ($msg): ?>
                    <div class="mb-4 p-3 <?= $msg_type === 'green' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?> rounded-md animate__animated animate__fadeIn">
                        <i class="fas <?= $msg_type === 'green' ? 'fa-check-circle' : 'fa-exclamation-circle'; ?> mr-2"></i><?= htmlspecialchars($msg) ?>
                    </div>
                <?php endif; ?>

                <form method="post" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Registered Email Address</label>
                        <div class="relative">
                            <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                            <input type="email" name="email" placeholder="Enter your email" required
                                   class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                            <input type="password" name="password" placeholder="Enter new password" required
                                   class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                        <div class="relative">
                            <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>
                            <input type="password" name="confirm_password" placeholder="Confirm new password" required
                                   class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                        </div>
                    </div>
                    
                    <button type="submit" name="submit" class="w-full py-3 gradient-bg text-white rounded-lg font-semibold hover:opacity-90 transition duration-300 shadow-md hover:shadow-lg flex items-center justify-center">
                        <i class="fas fa-key mr-2"></i> Reset Password
                    </button>
                    
                    <div class="text-center text-sm text-gray-600 pt-4">
                        Remember password? <a href="login.php" class="text-primary font-semibold hover:underline">Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
