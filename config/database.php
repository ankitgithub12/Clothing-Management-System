<?php
// Connect to MySQL server without selecting database
$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die("Connection not established: " . mysqli_connect_error());
}

// Create database if not exists
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS `login_register`");

// Select database
if (!mysqli_select_db($conn, "login_register")) {
    die("Database selection failed: " . mysqli_error($conn));
}

// Auto-create users table if it does not exist
$create_users_table = "CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `Name` VARCHAR(255) NOT NULL,
  `Email` VARCHAR(255) UNIQUE NOT NULL,
  `CreatePassword` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $create_users_table);

// Auto-create feedback table if it does not exist
$create_feedback_table = "CREATE TABLE IF NOT EXISTS `feedback` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT DEFAULT NULL,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `rating` INT NOT NULL,
  `feedback` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $create_feedback_table);

// Auto-create orders table if it does not exist
$create_orders_table = "CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT DEFAULT NULL,
  `order_number` VARCHAR(50) UNIQUE NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `address` TEXT NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `pincode` VARCHAR(20) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `payment_method` VARCHAR(50) NOT NULL,
  `total_price` DECIMAL(10, 2) NOT NULL,
  `status` VARCHAR(50) DEFAULT 'Processing',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $create_orders_table);

// Auto-create order_items table if it does not exist
$create_order_items_table = "CREATE TABLE IF NOT EXISTS `order_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `order_id` INT NOT NULL,
  `product_id` VARCHAR(50) NOT NULL,
  `product_name` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL,
  `quantity` INT NOT NULL,
  `size` VARCHAR(10) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $create_order_items_table);
?>