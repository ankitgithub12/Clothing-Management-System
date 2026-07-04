<?php
session_start();
include("config/database.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$msg = '';
$msg_type = 'red';

// Fetch current user details
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (isset($_POST['update_profile'])) {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];
    
    if (empty($name) || empty($email)) {
        $msg = "Name and Email are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format!";
    } else {
        // Check if email already registered for another user
        $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
        $check_stmt->bind_param("si", $email, $user_id);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        
        if ($check_result->num_rows > 0) {
            $msg = "Email is already in use by another user!";
        } else {
            $check_stmt->close();
            
            if (!empty($password)) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $update_stmt = $conn->prepare("UPDATE users SET Name = ?, Email = ?, CreatePassword = ? WHERE id = ?");
                $update_stmt->bind_param("sssi", $name, $email, $hashed_password, $user_id);
            } else {
                $update_stmt = $conn->prepare("UPDATE users SET Name = ?, Email = ? WHERE id = ?");
                $update_stmt->bind_param("ssi", $name, $email, $user_id);
            }
            
            if ($update_stmt->execute()) {
                $_SESSION['user_name'] = $name;
                $_SESSION['user_email'] = $email;
                $msg = "Profile updated successfully!";
                $msg_type = 'green';
                
                // Refresh local user data
                $user['Name'] = $name;
                $user['Email'] = $email;
            } else {
                $msg = "Failed to update profile! Please try again.";
            }
            $update_stmt->close();
        }
    }
}

$pageTitle = "My Profile - Fashion World";
include('includes/header.php');
?>

<main class="max-w-4xl mx-auto px-4 py-12">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden md:flex">
        <!-- Sidebar profile card -->
        <div class="md:w-1/3 bg-gradient-to-br from-primary to-secondary p-8 text-white text-center flex flex-col justify-center items-center">
            <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center text-4xl font-bold mb-4 border-2 border-white/50 uppercase shadow-inner">
                <?= htmlspecialchars(substr($user['Name'], 0, 2)) ?>
            </div>
            <h2 class="text-2xl font-bold mb-1 truncate max-w-full"><?= htmlspecialchars($user['Name']) ?></h2>
            <p class="text-white/80 text-sm mb-4 truncate max-w-full"><?= htmlspecialchars($user['Email']) ?></p>
            <span class="inline-block bg-white/20 text-xs px-3 py-1 rounded-full uppercase tracking-wider font-semibold">Customer</span>
        </div>
        
        <!-- Profile update form -->
        <div class="md:w-2/3 p-8 md:p-10">
            <h1 class="text-3xl font-bold text-dark mb-2">Profile Settings</h1>
            <p class="text-gray-500 text-sm mb-8">Update your personal account information and password.</p>
            
            <?php if ($msg): ?>
                <div class="mb-6 p-4 rounded-lg flex items-center gap-3 animate__animated animate__fadeIn <?= $msg_type === 'green' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200' ?>">
                    <i class="fas <?= $msg_type === 'green' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> text-lg"></i>
                    <span class="font-medium"><?= htmlspecialchars($msg) ?></span>
                </div>
            <?php endif; ?>
            
            <form action="" method="POST" class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-3.5 text-gray-400"></i>
                        <input type="text" name="name" value="<?= htmlspecialchars($user['Name']) ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" required>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-3.5 text-gray-400"></i>
                        <input type="email" name="email" value="<?= htmlspecialchars($user['Email']) ?>" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition" required>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">New Password (leave empty to keep current)</label>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-3.5 text-gray-400"></i>
                        <input type="password" name="password" placeholder="Enter new password" 
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition">
                    </div>
                </div>
                
                <div class="flex justify-end pt-4 border-t border-gray-100">
                    <button type="submit" name="update_profile" 
                            class="bg-primary hover:bg-secondary text-white font-bold py-3 px-8 rounded-lg shadow-md hover:shadow-lg transition duration-300 flex items-center gap-2">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
include('includes/footer.php');
?>
